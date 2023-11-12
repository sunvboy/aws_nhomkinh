<?php

namespace App\Http\Controllers\product\frontend;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Components\System;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->system = new System();
    }
    public function index(Request $request, $slug = "", $id = 0)
    {
        $segments = request()->segments();
        $slug = end($segments);
        $sort = '';
        if (!empty($_GET['sort'])) {
            $sort = $_GET['sort'];
        }
        $detail = CategoryProduct::where(['alanguage' => config('app.locale'), 'slug' => $slug, 'publish' => 0]);
        $detail = $detail->with('brands_relationships');
        $detail = $detail->with('attributes_relationships');
        $detail = $detail->first();

        if (!isset($detail)) {
            return redirect()->route('homepage.index');
        }
        // $childCategory =  CategoryProduct::where('parentid', $detail->id)->get();
        //bộ lọc
        // $attribute_catalogue = getListAttr($detail->attrid);
        //data product
        $data =  Product::join('catalogues_relationships', 'products.id', '=', 'catalogues_relationships.moduleid')->where('catalogues_relationships.module', '=', 'products');
        if (!empty($detail->id)) {
            $data =  $data->where('catalogues_relationships.catalogueid', $detail->id);
        }
        if (!empty($sort)) {
            $sort = explode('|', $sort);
            if (count($sort) == 2) {
                $data =  $data->orderBy($sort[0], $sort[1]);
            } else {
                return redirect()->route('routerURL', ['slug' => $detail->slug]);
            }
        } else {
            $data =  $data->orderBy('order', 'asc')->orderBy('id', 'desc');
        }
        /*$data = $data->with([
            'products_versions' => function ($q) {
                $q->groupBy('products_versions.product_color_id');
            }
        ]); */
        $data =  $data->paginate(18);
        // if (is($sort)) {
        //     $data->appends(['sort' => $request->sort]);
        // }
        //end
        // breadcrumb
        $breadcrumb = CategoryProduct::select('title', 'slug')->where('alanguage', config('app.locale'))->where('lft', '<=', $detail->lft)->where('rgt', '>=', $detail->lft)->orderBy('lft', 'ASC')->orderBy('order', 'ASC')->get();
        //lấy nhóm thuộc tính
        $attribute_tmp = [];
        if (!empty($detail->attributes_relationships) && count($detail->attributes_relationships) > 0) {
            foreach ($detail->attributes_relationships as $item) {
                if (!empty($item->attributes)) {
                    $attribute_tmp[] = array(
                        'id' => $item->attributes->id,
                        'title' => $item->attributes->title,
                        'titleC' => $item->attributes->titleC,
                        'keyword' => $item->attributes->slugC,
                    );
                }
            }
        }
        $attributes = collect($attribute_tmp)->groupBy('titleC')->all();
        $brandFilter = !empty($detail->brands_relationships) ? $detail->brands_relationships : [];

        $seo['canonical'] = $request->url();
        $seo['meta_title'] =  !empty($detail['meta_title']) ? $detail['meta_title'] : $detail['title'];
        $seo['meta_description'] = !empty($detail['meta_description']) ? $detail['meta_description'] : cutnchar(strip_tags($detail->description));
        $seo['meta_image'] = $detail['image'];
        $fcSystem = $this->system->fcSystem();
        return view('product.frontend.category.index', compact('fcSystem', 'detail', 'seo', 'data', 'breadcrumb', 'attributes', 'brandFilter'));
    }
    public function search(Request $request)
    {

        $keyword = removeutf8($request->keyword);
        $sort = '';
        if (!empty($_GET['sort'])) {
            $sort = $_GET['sort'];
        }
        $data =  Product::where(['alanguage' => config('app.locale'), 'publish' => 0]);
        if (!empty($keyword)) {
            $data =  $data->where('title', 'like', '%' . $keyword . '%');
        }
        if (!empty($sort)) {
            $sort = explode('|', $sort);
            if (!empty($sort) && count($sort) == 2) {
                $data =  $data->orderBy($sort[0], $sort[1]);
            } else {
                return redirect()->route('search', ['keyword' => $keyword]);
            }
        } else {
            $data =  $data->orderBy('order', 'asc')->orderBy('id', 'desc');
        }
        $data =  $data->with('getTags');
        $data =  $data->paginate(32);
        if (is($keyword)) {
            $data->appends(['keyword' => $keyword]);
        }
        if (is($sort)) {
            $data->appends(['sort' => $request->sort]);
        }
        $seo['canonical'] = $request->url();
        $seo['meta_title'] =  "Tìm kiếm sản phẩm " . $keyword;
        $seo['meta_description'] = '';
        $seo['meta_image'] = '';
        $fcSystem = $this->system->fcSystem();
        $attribute_catalogue = \App\Models\CategoryAttribute::where(['ishome' => 1, 'publish' => 0, 'alanguage' => config('app.locale')])->with('listAttr')->orderBy('order', 'asc')->orderBy('id', 'desc')->get();
        return view('product.frontend.search.index', compact('fcSystem', 'seo', 'data', 'attribute_catalogue'));
    }
    public function search_ajax(Request $request)
    {
        $keyword = $request->keyword;
        if (!empty($keyword)) {
            $data =  Product::select('products.id', 'products.title', 'products.image_json', 'products.slug', 'products.image', 'products.price', 'products.price_sale', 'products.price_contact', 'products.catalogue_id')
                ->where(['alanguage' => config('app.locale'), 'publish' => 0])->orderBy('id', 'desc');
            if (!empty($keyword)) {
                $data =  $data->where('title', 'like', '%' . $keyword . '%');
            }
            $data =  $data->paginate(3);
        }
        $html = '';
        if (!empty($data) && count($data) > 0) {
            foreach ($data as $key => $item) {
                $price = getPrice(array('price' => $item['price'], 'price_sale' => $item['price_sale'], 'price_contact' => $item['price_contact']));
                $html .= '
        <div class="flex space-x-2 border-b py-2">
            <div class="w-[70px]">
                <a href="' . $item->slug . '">
                    <img src="' . asset($item->image) . '" alt="' . $item->title . '" class="w-full">
                </a>
            </div>
            <div class="flex-1">
                <a href="' . $item->slug . '" class="text-sm">' . $item->title . '</a>
                <div class="text-sm text-primary font-semibold">' . $price['price_final'] . '</div>
            </div>
        </div>';
            }

            $html .= '<div class="py-3 flex justify-center">
            <a href="' . route('homepage.search', ['keyword' => $keyword]) . '" class="font-bold text-base hover:text-primary">
                Xem tất cả
            </a>
        </div>';
        }
        return response()->json(['html' => $html]);
    }
}
