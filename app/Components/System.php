<?php

namespace App\Components;

use View;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class System
{
    function fcSystem()
    {
        $fcSystem = [];
        if (!empty(Auth::user())) {
            $system = \App\Models\General::select('keyword', 'content', 'content_en', 'content_gm', 'content_tl')->get();
        } else {
            $system = Cache::remember('system', 600, function () {
                $system = \App\Models\General::select('keyword', 'content', 'content_en', 'content_gm', 'content_tl')->get();
                return $system;
            });
        }
        if (isset($system)) {
            foreach ($system as $val) {
                if (config('app.locale') == 'en') {
                    $language = $val['content_en'];
                } else if (config('app.locale') == 'gm') {
                    $language = $val['content_gm'];
                } else if (config('app.locale') == 'tl') {
                    $language = $val['content_tl'];
                } else {
                    $language = $val['content'];
                }
                $fcSystem[$val['keyword']] = $language;
            }
        }
        $segments = request()->segments();
        $last  = end($segments);
        $first = reset($segments);
        if ($first == 'tag' || $first == 'thuong-hieu' || $first == 'lien-he' || $first == 'tim-kiem' || $first == 'thanh-vien' || $first == 'gio-hang') {
            $fcSystem['language_vi'] = route('components.language', ['vi']);
            $fcSystem['language_en'] = route('components.language', ['en']);
            $fcSystem['language_gm'] = route('components.language', ['gm']);
            $fcSystem['language_tl'] = route('components.language', ['tl']);
        } else {
            $fcSystem['language_vi'] = !empty($first) ? asset('vi/' . $last) : route('components.language', ['vi']);
            $fcSystem['language_en'] = !empty($first) ? asset('en/' . $last) : route('components.language', ['en']);
            $fcSystem['language_gm'] = !empty($first) ? asset('gm/' . $last) : route('components.language', ['gm']);
            $fcSystem['language_tl'] = !empty($first) ? asset('tl/' . $last) : route('components.language', ['tl']);
        }

        return $fcSystem;
    }
}
