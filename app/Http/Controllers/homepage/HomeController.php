<?php

namespace App\Http\Controllers\homepage;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Components\Comment;
use App\Components\System;
use Cache;

class HomeController extends Controller
{
    protected $comment;
    public function __construct()
    {
        $this->comment = new Comment();
        $this->system = new System();
    }
    public function index()
    {
        $fcSystem = $this->system->fcSystem();
        $slideHome = Cache::remember('slideHome', 600, function () {
            $slideHome = \App\Models\CategorySlide::select('title', 'id')->where(['alanguage' => config('app.locale'), 'keyword' => 'banner-home'])->with('slides')->first();
            return $slideHome;
        });
        $ishomeProduct = Cache::remember('ishomeProduct', 600, function () {
            $ishomeProduct = \App\Models\Product::select('id', 'title', 'slug', 'price', 'price_sale', 'price_contact', 'image')
                ->where(['alanguage' => config('app.locale'), 'publish' => 0, 'ishome' => 1])
                ->orderBy('order', 'asc')
                ->orderBy('id', 'desc')
                // ->with('getTags')
                ->get();
            return $ishomeProduct;
        });
        /*$ishomeArticle = Cache::remember('ishomeArticle', 600, function () {
            $ishomeArticle = \App\Models\Article::select('id', 'title', 'slug', 'description', 'created_at', 'image')
                ->where(['alanguage' => config('app.locale'), 'publish' => 0, 'ishome' => 1])
                ->orderBy('order', 'asc')
                ->orderBy('id', 'desc')
                ->with('getTags')
                ->get();
            return $ishomeArticle;
        });  $ishomeCategoryProduct = Cache::remember('ishomeCategoryProduct', 600, function () {
            $ishomeCategoryProduct =
                \App\Models\CategoryProduct::select('id', 'title', 'slug', 'banner')
                ->where(['alanguage' => config('app.locale'), 'publish' => 0, 'ishome' => 1])
                ->orderBy('order', 'asc')
                ->orderBy('order', 'asc')
                ->with('children')
                ->get();
            return $ishomeCategoryProduct;
        });*/


        $ishomeCategoryArticle = Cache::remember('ishomeCategoryArticle', 600, function () {
            $ishomeCategoryArticle =
                \App\Models\CategoryArticle::select('id', 'title', 'slug')
                ->where(['alanguage' => config('app.locale'), 'publish' => 0, 'ishome' => 1])
                ->orderBy('order', 'asc')
                ->orderBy('order', 'asc')
                ->with('posts')
                ->first();
            return $ishomeCategoryArticle;
        });
        //page: HOME
        $page = Page::where(['alanguage' => config('app.locale'), 'page' => 'index', 'publish' => 0])->select('id', 'title', 'image', 'meta_title', 'meta_description')->first();
        $fields = [];
        if (!empty($page->fields) && count($page->fields) > 0) {
            foreach ($page->fields as $item) {
                $fields[$item->meta_key] = $item->meta_value;
            }
        }

        $seo['canonical'] = url('/');
        $seo['meta_title'] = !empty($page['meta_title']) ? $page['meta_title'] : $page['title'];
        $seo['meta_description'] = !empty($page['meta_description']) ? $page['meta_description'] : '';
        $seo['meta_image'] = !empty($page['image']) ? url($page['image']) : '';
        return view('homepage.home.index', compact('page', 'seo', 'fcSystem', 'slideHome', 'ishomeProduct', 'ishomeCategoryArticle', 'fields'));
    }
    public function sitemap()
    {
        /*
        $Tags = \App\Models\Tag::select('id', 'slug', 'created_at')->where('alanguage', config('app.locale'))->where('publish', 0)->get();
        $Brands = \App\Models\Brand::select('id', 'slug', 'created_at')->where('alanguage', config('app.locale'))->where('publish', 0)->get(); */
        $router = DB::table('router')->select('slug', 'created_at')->get();
        return response()->view('homepage.home.sitemap', compact('router'))->header('Content-Type', 'text/xml');
    }
}
