<?php

namespace App\Http\Controllers\product\backend;

use App\Components\Nestedsetbie;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\CategoryProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Components\Helper;
use App\Exports\ProductExport;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    protected $Nestedsetbie;
    protected $Brands;
    protected $Lang;
    protected $table = 'products';
    public function __construct()
    {
        $this->Nestedsetbie = new Nestedsetbie(array('table' => 'category_products'));
        $this->Brands = new Nestedsetbie(array('table' => 'brands'));
        $this->Helper = new Helper();
    }
    public function index(Request $request)
    {
        $module = $this->table;
        $htmlOption = $this->Nestedsetbie->dropdown();
        $catalogue_id = $request->catalogue_id;
        $data =  Product::query()
            ->with('user:id,name')
            ->with(['relationships' => function ($query) {
                $query->select('catalogues_relationships.moduleid', 'category_products.title', 'category_products.id')
                    ->where('module', '=', $this->table)
                    ->join('category_products', 'category_products.id', '=', 'catalogues_relationships.catalogueid');
            }])
            ->where('alanguage', config('app.locale'))
            ->orderBy('order', 'ASC')
            ->orderBy('id', 'DESC');
        $data =  $data->select(
            'products.id',
            'products.title',
            'products.slug',
            'products.image',
            'products.price',
            'products.price_sale',
            'products.price_contact',
            'products.order',
            'products.publish',
            'products.ishome',
            'products.highlight',
            'products.isaside',
            'products.isfooter',
            'products.userid_created',
            'products.created_at',
            'catalogues_relationships.catalogueid',
        );
        $data = $data->join('catalogues_relationships', $this->table . '.id', '=', 'catalogues_relationships.moduleid')->where('catalogues_relationships.module', '=', $this->table);
        if (!empty($catalogue_id)) {
            $data =  $data->where('catalogues_relationships.catalogueid', $catalogue_id);
        }
        $data =  $data->groupBy('catalogues_relationships.moduleid');
        $data =  $data->paginate(env('APP_paginate'));
        if (is($catalogue_id)) {
            $data->appends(['catalogueid' => $catalogue_id]);
        }
        $dropdown = getFunctions();
        $tags = \App\Models\Tag::select('id', 'title')->orderBy('order', 'asc')->orderBy('id', 'desc')->get();
        $brands = \App\Models\Brand::select('id', 'title')->orderBy('order', 'asc')->orderBy('id', 'desc')->get();
        $configIs = \App\Models\Configis::select('title', 'type')->where(['module' => $this->table, 'active' => 1])->get();
        return view('product.backend.product.index', compact('data', 'module', 'htmlOption', 'tags', 'brands', 'dropdown', 'configIs'));
    }
    public function create()
    {
        $module = $this->table;
        $dropdown = getFunctions();
        $htmlCatalogue = $this->Nestedsetbie->dropdown();
        $htmlBrands = $this->Brands->dropdown();
        $category_attribute = DB::table('category_attributes')
            ->select('id', 'title')
            ->where('ishome', 0)
            ->where('alanguage', config('app.locale'))
            ->orderBy('order', 'asc')
            ->orderBy('id', 'desc')
            ->get();
        //tag
        $getTags = [];
        if (old('tags')) {
            $getTags = old('tags');
        }
        $tags = \App\Models\Tag::select('id', 'title')->where('module', 'products')->where('alanguage', config('app.locale'))->orderBy('order', 'asc')->orderBy('id', 'desc')->get();
        //end
        if (old('attribute')) {
            $attribute = old('attribute');
        }
        $attribute_json = [];
        if (!empty($attribute)) {
            foreach ($attribute as $key => $value) {
                if ($value == '') {
                    $attribute_json[$key] = '';
                } else {
                    // $attribute_json[$key]['json'] = base64_encode(json_encode($value));
                    $attributes =  DB::table('attributes')->orderBy('order', 'asc')->orderBy('id', 'desc')->whereIn('id', $value)->get();
                    $temp = [];
                    if (!empty($attributes)) {
                        foreach ($attributes as $val) {
                            $temp[] = array(
                                'id' => $val->id,
                                'text' => $val->title,
                            );
                        }
                    }
                    $attribute_json[$key] = $temp;
                }
            }
        }
        $htmlAttribute = $this->Nestedsetbie->DropdownCatalogue($category_attribute, 'Chọn danh mục thuộc tính');

        $field = \App\Models\ConfigColum::where(['trash' => 0, 'publish' => 0, 'module' => $module])->get();
        return view('product.backend.product.create', compact('field', 'module', 'htmlCatalogue', 'htmlAttribute', 'tags', 'getTags', 'htmlBrands', 'attribute_json', 'dropdown'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            // 'slug' => 'required|unique:router,slug,' . config('app.locale') . ',alanguage',
            'slug' =>  ['required', Rule::unique('router')->where(function ($query) use ($request) {
                return $query->where('alanguage', config('app.locale'));
            })],
            'code' => 'unique:products',
            'catalogue_id' => 'required|gt:0',
        ], [
            'title.required' => 'Tiêu đề là trường bắt buộc.',
            'slug.required' => 'Đường dẫn là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn đã tồn tại.',
            'code.unique' => 'Mã sản phẩm đã tồn tại.',
            'catalogue_id.gt' => 'Danh mục chính là trường bắt buộc.',
        ]);

        //upload image
        if (!empty($request->file('image'))) {
            $image_url = uploadImage($request->file('image'), 'san-pham');
        } else {
            $image_url = $request->image_old;
        }
        //end
        $this->submit($request, 'create', 0, $image_url);
        return redirect()->route('products.index')->with('success', "Thêm mới sản phẩm thành công");
    }
    public function edit($id)
    {
        $module = $this->table;
        $dropdown = getFunctions();
        $detail  = Product::where('alanguage', config('app.locale'))->with('product_versions')->find($id);
        if (!isset($detail)) {
            return redirect()->route('products.index')->with('error', "Sản phẩm không tồn tại");
        }
        $htmlCatalogue = $this->Nestedsetbie->dropdown();
        $category_attribute = DB::table('category_attributes')
            ->select('id', 'title')
            ->where('alanguage', config('app.locale'))
            ->where('ishome', 0)
            ->orderBy('order', 'asc')
            ->orderBy('id', 'desc')
            ->get();
        $htmlAttribute = $this->Nestedsetbie->DropdownCatalogue($category_attribute);
        //tags
        $getTags = [];
        if (old('tags')) {
            $getTags = old('tags');
        } else {
            foreach ($detail->tags as $k => $v) {
                $getTags[] = $v['tag_id'];
            }
        }
        $tags = \App\Models\Tag::select('id', 'title')->where('module', 'products')->where('alanguage', config('app.locale'))->orderBy('order', 'asc')->orderBy('id', 'desc')->get();
        //end tag
        //brands
        $htmlBrands = $this->Brands->dropdown();
        //end brand
        //attr
        if (old('attribute')) {
            $attribute = old('attribute');
        } else {
            $version_json = json_decode(base64_decode($detail->version_json), true);
            $attribute = $version_json[2];
        }
        $attribute_json = [];
        if (!empty($attribute)) {
            foreach ($attribute as $key => $value) {
                if ($value == '') {
                    $attribute_json[$key] = '';
                } else {
                    // $attribute_json[$key]['json'] = base64_encode(json_encode($value));
                    $attributes =  DB::table('attributes')->orderBy('order', 'asc')->orderBy('id', 'desc')->whereIn('id', $value)->get();
                    $temp = [];
                    if (!empty($attributes)) {
                        foreach ($attributes as $val) {
                            $temp[] = array(
                                'id' => $val->id,
                                'text' => $val->title,
                            );
                        }
                    }
                    $attribute_json[$key] = $temp;
                }
            }
        }
        //end attr
        $getCatalogue = [];
        if (old('catalogue')) {
            $getCatalogue = old('catalogue');
        } else {
            $getCatalogue = json_decode($detail->catalogue);
        }
        $field = \App\Models\ConfigColum::where(['trash' => 0, 'publish' => 0, 'module' => $module])->get();
        //polylang
        // $polylang = DB::table('polylangs')->where('module_id', $id)->first();
        return view('product.backend.product.edit', compact('field', 'module', 'getCatalogue', 'detail', 'htmlCatalogue', 'htmlAttribute', 'tags', 'getTags', 'htmlBrands',  'attribute_json', 'dropdown'));
    }
    public function copy($id)
    {
        $module = $this->table;
        $dropdown = getFunctions();
        $detail  = Product::where('alanguage', config('app.locale'))->find($id);
        if (!isset($detail)) {
            return redirect()->route('products.index')->with('error', "Sản phẩm không tồn tại");
        }
        $htmlCatalogue = $this->Nestedsetbie->dropdown();
        $category_attribute = DB::table('category_attributes')
            ->select('id', 'title')
            ->where('alanguage', config('app.locale'))
            ->where('ishome', 0)
            ->orderBy('order', 'asc')
            ->orderBy('id', 'desc')
            ->get();
        $htmlAttribute = $this->Nestedsetbie->DropdownCatalogue($category_attribute);
        //tags
        $getTags = [];
        if (old('tags')) {
            $getTags = old('tags');
        } else {
            foreach ($detail->tags as $k => $v) {
                $getTags[] = $v['tag_id'];
            }
        }
        $tags = \App\Models\Tag::select('id', 'title')->where('module', 'products')->where('alanguage', config('app.locale'))->orderBy('order', 'asc')->orderBy('id', 'desc')->get();
        //end tag
        //brands
        $htmlBrands = $this->Brands->dropdown();
        //end brand
        //attr
        if (old('attribute')) {
            $attribute = old('attribute');
        } else {
            $version_json = json_decode(base64_decode($detail->version_json), true);
            $attribute = $version_json[2];
        }
        $attribute_json = [];
        if (!empty($attribute)) {
            foreach ($attribute as $key => $value) {
                if ($value == '') {
                    $attribute_json[$key] = '';
                } else {
                    // $attribute_json[$key]['json'] = base64_encode(json_encode($value));
                    $attributes =  DB::table('attributes')->orderBy('order', 'asc')->orderBy('id', 'desc')->whereIn('id', $value)->get();
                    $temp = [];
                    if (!empty($attributes)) {
                        foreach ($attributes as $val) {
                            $temp[] = array(
                                'id' => $val->id,
                                'text' => $val->title,
                            );
                        }
                    }
                    $attribute_json[$key] = $temp;
                }
            }
        }
        //end attr
        $getCatalogue = [];
        if (old('catalogue')) {
            $getCatalogue = old('catalogue');
        } else {
            $getCatalogue = json_decode($detail->catalogue);
        }
        $field = \App\Models\ConfigColum::where(['trash' => 0, 'publish' => 0, 'module' => $module])->get();
        return view('product.backend.product.copy', compact('field', 'module', 'getCatalogue', 'detail', 'htmlCatalogue', 'htmlAttribute', 'tags', 'getTags', 'htmlBrands', 'attribute_json', 'dropdown'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            //'slug' => 'required|unique:router,slug,' . $id . ',moduleid,alanguage,' . config('app.locale') . '',
            'slug' => ['required', Rule::unique('router')->where(function ($query) use ($id) {
                return $query->where('moduleid', '!=', $id)->where('alanguage', config('app.locale'));
            })],
            'code' => 'unique:products,code,' . $id . ',id',
            'catalogue_id' => 'required|gt:0',
        ], [
            'title.required' => 'Tiêu đề là trường bắt buộc.',
            'slug.required' => 'Đường dẫn là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn đã tồn tại.',
            'code.unique' => 'Mã sản phẩm đã tồn tại.',
            'catalogue_id.gt' => 'Danh mục chính là trường bắt buộc.',
        ]);
        //upload image
        if (!empty($request->file('image'))) {
            $image_url = uploadImage($request->file('image'), 'san-pham');
        } else {
            $image_url = $request->image_old;
        }
        //end
        $this->submit($request, 'update', $id, $image_url);
        return redirect()->route('products.index')->with('success', "Cập nhập sản phẩm thành công");
    }
    public function submit($request = [], $action = '', $id = 0, $image_url = '')
    {
        if ($action == 'create') {
            $time = 'created_at';
            $user = 'userid_created';
        } else {
            $time = 'updated_at';
            $user = 'userid_updated';
        }
        //lấy danh mục phụ
        $catalogue = $request['catalogue'];
        $tmp_catalogue = [];
        if (isset($catalogue)) {
            foreach ($catalogue as $v) {
                if ($v != 0 && $v != $request['catalogue_id']) { //check id != 0 và id != danh mục chính
                    $tmp_catalogue[] = $v;
                }
            }
        }
        //lấy danh mục cha (nếu có)
        $detail = CategoryProduct::select('id', 'title', 'slug', 'lft')->where('id', $request['catalogue_id'])->first();
        $breadcrumb = CategoryProduct::select('id', 'title')->where('alanguage', config('app.locale'))->where('lft', '<=', $detail->lft)->where('rgt', '>=', $detail->lft)->orderBy('lft', 'ASC')->orderBy('order', 'ASC')->get();
        if ($breadcrumb->count() > 0) {
            foreach ($breadcrumb as $v) {
                $tmp_catalogue[] = $v->id;
            }
        }
        $tmp_catalogue = array_unique($tmp_catalogue);
        // dd($tmp_catalogue);
        //end
        //version
        $checkbox = isset($request['checkbox_val']) ? $request['checkbox_val'] : [];
        $attribute_catalogue = isset($request['attribute_catalogue']) ? $request['attribute_catalogue'] : [];
        $attribute = isset($request['attribute']) ? $request['attribute'] : [];
        //data create - update
        $alanguage = !empty($request['polylang_language']) ? $request['polylang_language'] : config('app.locale');
        $_data_product = [
            'title' => $request['title'],
            'slug' => $request['slug'],
            'description' => $request['description'],
            'content' => $request['content'],
            'code' => is($request['code']),
            'price' => isset($request['price']) ? str_replace('.', '', $request['price']) : 0,
            'price_sale' => str_replace('.', '', $request['price_sale']),
            'price_contact' => isset($request['price_contact']) ? $request['price_contact'] : 0,
            //inventory
            'inventory' => isset($request['inventory']) ? $request['inventory'] : 0,
            'inventoryPolicy' => isset($request['inventoryPolicy']) ? $request['inventoryPolicy'] : 0,
            'inventoryQuantity' =>  str_replace('.', '', $request['inventoryQuantity']),
            //ship
            'ships' => json_encode($request['ships']),
            'image_json' =>  !empty($request['album']) ? json_encode($request['album']) : '',
            'brand_id' => $request['brand_id'],
            'catalogue_id' => $request['catalogue_id'],
            'catalogue' => json_encode($tmp_catalogue),
            'image' => $image_url,
            'meta_title' => $request['meta_title'],
            'meta_description' => $request['meta_description'],
            'publish' => $request['publish'],
            $user => Auth::user()->id,
            $time => Carbon::now(),
            'version_json' => base64_encode(json_encode(array($checkbox, $attribute_catalogue, $attribute))),
            'alanguage' => $alanguage,
        ];
        if ($action == 'create') {
            $id = Product::insertGetId($_data_product);
        } else {
            DB::table('products')->where('id', '=', $id)->update($_data_product);
        }
        if (!empty($id)) {

            /*polylang */
            // if ($action == 'create') {
            //     if (!empty($request['polylang_group_id']) && !empty($request['polylang_language'])) {
            //         DB::table('polylangs')->insert([
            //             'module_id' => $id,
            //             'module' => $this->table,
            //             'group_id' => $request['polylang_group_id'],
            //             'alanguage' => $request['polylang_language'],
            //         ]);
            //     } else {
            //         DB::table('polylangs')->insert([
            //             'module_id' => $id,
            //             'module' => $this->table,
            //             'group_id' => $id,
            //             'alanguage' => $alanguage,
            //         ]);
            //     }
            // }
            /*END: polylang */

            /*xóa khi cập nhập*/
            if ($action == 'update') {
                /*xóa router*/
                DB::table('router')->where(['moduleid' => $id, 'module' => $this->table, 'alanguage' => $alanguage])->delete();
                /*xóa catalogue_relationship*/
                DB::table('catalogues_relationships')->where('moduleid', $id)->where('module', $this->table)->delete();
                /*xóa tags_relationship*/
                DB::table('tags_relationships')->where('module_id', $id)->where('module', $this->table)->delete();
                /*xóa brands_relationship*/
                DB::table('brands_relationships')->where('product_id', $id)->delete();
                /*xóa attribute_relationship*/
                DB::table('attributes_relationships')->where('product_id', $id)->delete();
                //xóa custom fields
                DB::table('config_postmetas')->where(['module_id' => $id, 'module' => $this->table])->delete();
                //xoa product_versions
                \App\Models\ProductVersion::where('product_id', $id)->delete();
            }
            //thêm router
            DB::table('router')->insert([
                'moduleid' => $id,
                'module' => $this->table,
                'slug' => $request['slug'],
                'created_at' => Carbon::now(),
                'alanguage' => $alanguage,
            ]);
            //thêm vào bảng catalogue_relationship
            $this->Helper->catalogue_relation_ship($id, $request['catalogue_id'], $tmp_catalogue, $this->table);
            //thêm vào bảng brands_relationships
            $this->Helper->brands_relationships($id, $request['brand_id'], $tmp_catalogue);
            //thêm vào bảng tags_relationships
            $this->Helper->tags_relationships($id, $request['tags'], $this->table);
            //thêm vào bảng attributes_relationships
            $this->Helper->attributes_relationships($id, $attribute, $tmp_catalogue);
            //thêm sản phẩm vào khoảng giá
            $this->Helper->price_attributes((float)str_replace('.', '', $request['price']), $id, $tmp_catalogue);
            //START: custom fields
            fieldsInsert($this->table, $id, $request);
            //Them moi phien ban san pham: product_versions
            $title_version = $request['title_version'];
            $image_version = $request['image_version'];
            $code_version = $request['code_version'];
            $_stock_status = $request['_stock_status'];

            $_ships_weight = $request['_ships_weight'];
            $_ships_length = $request['_ships_length'];
            $_ships_width = $request['_ships_width'];
            $_ships_height = $request['_ships_height'];
            $_stock = $request['_stock'];
            $_outstock_status = $request['_outstock_status'];
            $price_version =  !empty($request['price_version']) ? str_replace('.', '', $request['price_version']) : 0;
            $price_sale_version =  !empty($request['price_sale_version']) ? str_replace('.', '', $request['price_sale_version']) : 0;
            $_insert_version = [];
            if (!empty($title_version)) {
                foreach ($title_version as $key => $item) {
                    $value_id = [];
                    $value_title = [];
                    //lấy id theo title 
                    $explodeID = explode('-', $item);
                    if (!empty($explodeID)) {
                        $filtered = collect($explodeID)->filter(function ($value, $key) {
                            return $value != '';
                        });
                        $getAttrid = \App\Models\Attribute::select('id', 'title')->whereIn('title', $filtered)->orderBy('id', 'asc')->get();
                        if (!$getAttrid->isEmpty()) {
                            foreach ($getAttrid as $val) {
                                $value_id[] = $val->id;
                                $value_title[] = $val->title;
                            }
                        }
                    }
                    //end
                    $_insert_version[]  = array(
                        'product_id' => $id,
                        'id_version' => json_encode(collect($value_id)->sort()),
                        'title_version' => json_encode($value_title),
                        'code_version' => $code_version[$key],
                        'image_version' => !empty($image_version[$key]) ? $image_version[$key] : '',
                        'price_version' => $price_version[$key],
                        'price_sale_version' => $price_sale_version[$key],
                        '_stock_status' => $_stock_status[$key],
                        '_stock' => $_stock[$key],
                        '_outstock_status' => $_outstock_status[$key],
                        '_ships_weight' => $_ships_weight[$key],
                        '_ships_length' => $_ships_length[$key],
                        '_ships_width' => $_ships_width[$key],
                        '_ships_height' => $_ships_height[$key],
                        'created_at' => Carbon::now(),
                        'userid_created' => Auth::user()->id,
                    );
                }
            }
            \App\Models\ProductVersion::insert($_insert_version);
            //end
        }
    }
    public function delete(Request $request)
    {
        $id = (int) $request->id;
        $this->delete_function($id);
        return response()->json([
            'code' => 200,
        ], 200);
    }
    public function delete_all(Request $request)
    {
        $post = $request->param;
        if (isset($post['list']) && is_array($post['list']) && count($post['list'])) {
            foreach ($post['list'] as $id) {
                $this->delete_function($id);
            }
        }
        return response()->json([
            'code' => 200,
        ], 200);
    }
    public function delete_function($id = 0)
    {
        //xóa brands_relationship
        DB::table('brands_relationships')->where('product_id', $id)->delete();
        //xóa tags_relationship
        DB::table('tags_relationships')->where('module_id', $id)->where('module', $this->table)->delete();
        //xóa attribute_relationship
        DB::table('attributes_relationships')->where('product_id', $id)->delete();
        //xóa custom fields
        DB::table('config_postmetas')->where(['module_id' => $id, 'module' => $this->table])->delete();
        //xóa catalogue_relationship
        DB::table('catalogues_relationships')->where('moduleid', $id)->where('module', $this->table)->delete();
        //xóa router
        DB::table('router')->where('moduleid', $id)->where('module', $this->table)->delete();
        Product::where('id', $id)->delete();
    }
    public function get_attrid(Request $request)
    {
        $catalogue_id = $request->catalogue_id;
        $attribute_catalogue = [];
        $detailCatalogue = DB::table('attributes_relationships')->where('category_product_id', '=', $catalogue_id)->groupBy('attribute_id')->pluck('attribute_id');
        if (!$detailCatalogue->isEmpty()) {
            $detailCatalogue = DB::table('attributes')
                ->select('attributes.id', 'attributes.title', 'category_attributes.title as titleC')
                ->whereIn('attributes.id', $detailCatalogue)
                ->orderBy('attributes.order', 'asc')
                ->orderBy('attributes.id', 'desc')
                ->join('category_attributes', 'category_attributes.id', '=', 'attributes.catalogueid')
                ->get();
            if (!$detailCatalogue->isEmpty()) {
                $attribute_catalogue = $detailCatalogue->groupBy('titleC');
                $attribute_catalogue->all();
            }
        }
        $html = '';
        if ($attribute_catalogue) {
            foreach ($attribute_catalogue as $key => $val) {
                if (count($val) > 1) {
                    $html = $html . '<li class="catalogue mb-3" data-keyword = ' . slug($key) . '>';
                    $html = $html . '<label class="form-label text-base font-semibold">' . $key . '</label>';
                    $html = $html . '<div class="grid grid-cols-12 gap-6" >';
                    foreach ($val as $item) {
                        $html = $html . '<div class="col-span-3">';
                        $html = $html . '<div class="attr cursor-pointer">';
                        $html = $html . '<input disabled="disabled"  class="checkbox-item filter mr-2" type="checkbox" name="attr[]" value="' . $item->id . '"><span style="margin-left: -24px;padding-left: 24px;">';
                        $html = $html . $item->title;
                        $html = $html . '</span></div>';
                        $html = $html . '</div>';
                    }
                    $html = $html . '</div>';
                    $html = $html . '</li>';
                }
            }
        }
        echo json_encode(array(
            'attribute_catalogue' => $html,
        ));
        die();
    }
    public function listproduct(Request $request)
    {
        $module = $this->table;
        $data =  Product::query()
            ->with('user:id,name')
            ->with(['relationships' => function ($query) {
                $query->select('catalogues_relationships.moduleid', 'category_products.title', 'category_products.id')
                    ->where('module', '=', $this->table)
                    ->join('category_products', 'category_products.id', '=', 'catalogues_relationships.catalogueid');
            }])
            ->where('alanguage', config('app.locale'))
            ->orderBy('order', 'ASC')
            ->orderBy('id', 'DESC');

        $keyword = $request->keyword;
        $brand = $request->brand;
        $tag = $request->tag;
        $request_attr = $request->attr;
        $type = $request->type;
        if (!empty($keyword)) {
            $data =  $data->where('products.title', 'like', '%' . $keyword . '%');
            $data =  $data->orWhere('products.code', 'like', '%' . $keyword . '%');
        }
        if (!empty($type)) {
            $data =  $data->where('products.' . $type, 1);
        }
        //xử lý danh mục
        $data = $data->join('catalogues_relationships', 'products.id', '=', 'catalogues_relationships.moduleid')->where('catalogues_relationships.module', '=', $this->table);
        if (!empty($request->catalogue_id)) {
            $data =  $data->where('catalogues_relationships.catalogueid', $request->catalogue_id);
        }
        //xử lý khoảng giá
        $request->start_price = (int)str_replace('.', '', $request->start_price);
        $request->end_price = (int)str_replace('.', '', $request->end_price);
        if (isset($request->start_price) && !empty($request->end_price)) {
            $data =  $data->where('products.price', '>=', $request->start_price);
            $data =  $data->where('products.price', '<=', $request->end_price);
        }
        //xử lý tags
        if (!empty($brand)) {
            $data = $data->join('brands_relationships', 'products.id', '=', 'brands_relationships.product_id');
            $data =  $data->whereIn('brands_relationships.brand_id', $brand);
        }
        //xử lý tags
        if (!empty($tag)) {
            $data = $data->join('tags_relationships', 'products.id', '=', 'tags_relationships.module_id')->where('tags_relationships.module', '=', $this->table);
            $data =  $data->whereIn('tags_relationships.tag_id', $tag);
        }
        //xử lý thuộc tính
        if (!empty($request_attr)) {
            $attr = explode(';', $request_attr);
            foreach ($attr as $key => $val) {
                if ($key % 2 == 0) {
                    if ($val != '') {
                        $attribute[$val][] = $attr[$key + 1];
                    }
                } else {
                    continue;
                }
            }
            $total = 0;
            $index = 100;
            foreach ($attribute as $key => $val) {
                $total++;
                $index++;
                foreach ($val as $subs) {
                    $index = $index + $total;
                    $data = $data->join('attributes_relationships as tb' . $index . '', 'products.id', '=', 'tb' . $index . '.product_id');
                }
                $data =  $data->whereIn('tb' . $index . '.attribute_id', $val);
            }
            $data =  $data->groupBy('tb102.product_id');
        }
        $data =  $data->groupBy('catalogues_relationships.moduleid');
        $data =  $data->paginate(env('APP_paginate'));
        $configIs = \App\Models\Configis::select('title', 'type')->where(['module' => $this->table, 'active' => 1])->get();

        return view('product.backend.product.index.data', compact('data', 'configIs', 'module'))->render();
    }
    public function exportProducts(Request $request)
    {
        return Excel::download(new ProductExport, 'products.xlsx');
    }
}
