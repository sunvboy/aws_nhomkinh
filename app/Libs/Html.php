<?php

if (!function_exists('svl_ismobile')) {

    function svl_ismobile()
    {
        $tablet_browser = 0;
        $mobile_browser = 0;

        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $tablet_browser++;
        }

        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $mobile_browser++;
        }

        if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
            $mobile_browser++;
        }

        $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
        $mobile_agents = array(
            'w3c ', 'acs-', 'alav', 'alca', 'amoi', 'audi', 'avan', 'benq', 'bird', 'blac',
            'blaz', 'brew', 'cell', 'cldc', 'cmd-', 'dang', 'doco', 'eric', 'hipt', 'inno',
            'ipaq', 'java', 'jigs', 'kddi', 'keji', 'leno', 'lg-c', 'lg-d', 'lg-g', 'lge-',
            'maui', 'maxo', 'midp', 'mits', 'mmef', 'mobi', 'mot-', 'moto', 'mwbp', 'nec-',
            'newt', 'noki', 'palm', 'pana', 'pant', 'phil', 'play', 'port', 'prox',
            'qwap', 'sage', 'sams', 'sany', 'sch-', 'sec-', 'send', 'seri', 'sgh-', 'shar',
            'sie-', 'siem', 'smal', 'smar', 'sony', 'sph-', 'symb', 't-mo', 'teli', 'tim-',
            'tosh', 'tsm-', 'upg1', 'upsi', 'vk-v', 'voda', 'wap-', 'wapa', 'wapi', 'wapp',
            'wapr', 'webc', 'winw', 'winw', 'xda ', 'xda-'
        );

        if (in_array($mobile_ua, $mobile_agents)) {
            $mobile_browser++;
        }

        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'opera mini') > 0) {
            $mobile_browser++;
            //Check for tablets on opera mini alternative headers
            $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA']) ? $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'] : (isset($_SERVER['HTTP_DEVICE_STOCK_UA']) ? $_SERVER['HTTP_DEVICE_STOCK_UA'] : ''));
            if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
                $tablet_browser++;
            }
        }

        if ($tablet_browser > 0) {
            // do something for tablet devices
            return 'is tablet';
        } else if ($mobile_browser > 0) {
            // do something for mobile devices
            return 'is mobile';
        } else {
            // do something for everything else
            return 'is desktop';
        }
    }
}
if (!function_exists('getFunctions')) {
    function getFunctions()
    {
        $data = [];
        $getFunctions = \App\Models\Permission::select('title')->where('publish', 0)->where('parent_id', 0)->get()->pluck('title');
        if (!$getFunctions->isEmpty()) {

            foreach ($getFunctions as $v) {
                $data[] = $v;
            }
        }
        return $data;
    }
}
if (!function_exists('htmlArticle')) {
    function htmlArticle($item = [], $viewed = 'lượt xem')
    {
        $html = '';
        $html .= ' <div class="mb-10">
        <div class="overflow-hidden zoom-effect">
            <a href="' . $item['slug'] . '" class=" overflow-hidden">
                <img src="' . asset($item['image']) . '" alt="' . $item['title'] . '" class="h-[300px] w-full object-cover">
            </a>
        </div>

        <div class="mx-[15px] relative -mt-5">
            <div class="bg-white py-5 px-[15px] shadow space-y-2">
                <h5 class="h-12">
                    <a href="' . $item['slug'] . '" class="clamp clamp-2 text-lg font-bold hover:text-primary h-12" style="line-height: 1.4;">' . $item['title'] . '</a>
                </h5>';
        /*<div class="flex items-center space-x-2 text-[#252a2b]">
                    <i class="fa fa-pencil text-[#252a2b]" aria-hidden="true"></i>
                    <span>Quyen </span>
                </div> */
        $html .= '<div class="clamp clamp-3 text-[#252a2b] h-20">' . strip_tags($item['description']) . '</div>
                <div>
                    <a href="' . $item['slug'] . '" class="hover:bg-primary hover:text-white btn btn--with-icon pr-5 bg-white font-bold outline-none overflow-hidden h-[50px] leading-[50px] inline-block p-0" style="box-shadow: 1px 1px 3px 0 rgba(0, 0, 0, 0.2);"><i class="btn-icon fa fa-long-arrow-right"></i>Xem thêm</a>
                </div>
            </div>

        </div>
    </div>';
        return $html;
    }
}
if (!function_exists('htmlAddress')) {
    function htmlAddress($data = [])
    {
        $html = '';
        if (isset($data)) {
            foreach ($data as $k => $v) {
                $html .= ' <li class="showroom-item loc_link result-item" data-brand="' . $v->title . '"
    data-address="' . $v->address . '" data-phone="' . $v->hotline . '" data-lat="' . $v->lat . '"
    data-long="' . $v->long . '">
    <div class="heading" style="display: flex">

        <p class="name-label" style="flex: 1">
            <strong>' . ($k + 1) . '. ' . $v->title . '</strong>
        </p>
    </div>
    <div class="details">
        <p class="address" style="flex:1"><em>' . $v->address . '</em>
        </p>

        <p class="button-desktop button-view hidden-xs">
            <a href="javascript:void(0)" onclick="return false;">Tìm đường</a>
            <a class="arrow-right"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
        </p>
        <p class="button-mobile button-view visible-xs">
            <a target="_blank" href="https://www.google.com/maps/dir//' . $v->lat . ',' . $v->long . '">Tìm đường</a>
            <a class="arrow-right" target="_blank"
                href="https://www.google.com/maps/dir//' . $v->lat . ',' . $v->long . '"><span><i
                        class="fa fa-angle-right" aria-hidden="true"></i></span></a>
        </p>
    </div>
</li>';
            }
        }
        return $html;
    }
}
if (!function_exists('htmlItemCart')) {
    function htmlItemCart($k = '', $item = [])
    {
        $html = '';
        if (isset($item)) {
            $stock = '';
            $slug = !empty($item['slug']) ? $item['slug'] : '';
            $title_version = !empty($item['options']['title_version']) ? $item['options']['title_version'] : '';
            $id_version = !empty($item['options']['id_version']) ? $item['options']['id_version'] : '';

            if (!empty($id_version)) {
                $getVersionproduct = \App\Models\ProductVersion::select(
                    'id',
                    '_stock_status',
                    '_stock',
                    '_outstock_status'
                )->where('product_id', $item['id'])->where('id_version', $id_version)->first();
                if ($getVersionproduct) {
                    if ($getVersionproduct['_stock_status'] == 1) {
                        if ($getVersionproduct['_outstock_status'] == 0) {
                            $stock = $getVersionproduct['_stock'];
                        }
                    }
                }
            } else {
                $product = \App\Models\Product::select('inventory', 'inventoryPolicy', 'inventoryQuantity')->find($item['id']);
                if ($product) {
                    if ($product->inventory == 1) {
                        if ($product->inventoryPolicy == 0) {
                            $stock = $product['inventoryQuantity'];
                        }
                    }
                }
            }
            $html .= '<tr class="cart_item" data-rowid="' . $k . '">
                        <td class="w-32 p-3 border border-solid  text-center">
                            <a href="' . url($slug) . '"><img src="' . $item['image'] . '" alt="' . $item['title'] . '"></a>
                        </td>
                        <td class="p-3 border border-solid ">
                            <a href="' . url($slug) . '" class="transition-all hover:text-orange text-global font-medium">' . $item['title'] . '</a>
                            <br>';
            if (!empty($title_version)) {
                $html .= '<span class="text-sm">' . trans('index.Classify') . ': ' .  $title_version . '</span>';
            }

            $html .= '</td>
                        <td class="p-3 border border-solid  text-center">
                            <span><span>' . number_format($item['price'], 0, '.', ',') . '₫</span></span>
                        </td>
                        <td class="p-3 border border-solid  text-center">
                            <div class="flex count border border-solid border-gray-300 p-2 h-11">
                                <button class="decrement flex-auto w-5 leading-none cart-minus" aria-label="button"  style="flex: auto;">-</button>
                                <input type="number" min="1" max="' . $stock . '" step="1" value="' . $item['quantity'] . '" class="quantity__input flex-auto w-8 text-center focus:outline-none input-appearance-none card-quantity">
                                <button class="increment flex-auto w-5 leading-none cart-plus" aria-label="button" style="flex: auto;">+</button>
                            </div>
                        </td>
                        <td class="p-3 border border-solid  text-center"><span>' . number_format($item['price'] * $item['quantity'], 0, '.', ',') . '₫</span></td>
                        <td class="p-3 border border-solid  text-center">
                            <a href="javascript:void(0)" class="inline-block mx-1 text-d61c1f transition-all cart-remove">
                                <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true" style="fill: red;width:20px;height20px">
                                    <path d="M8 3.994c0-1.101.895-1.994 2-1.994s2 .893 2 1.994h4c.552 0 1 .446 1 .997a1 1 0 0 1-1 .997h-12c-.552 0-1-.447-1-.997s.448-.997 1-.997h4zm-3 10.514v-6.508h2v6.508a.5.5 0 0 0 .5.498h1.5v-7.006h2v7.006h1.5a.5.5 0 0 0 .5-.498v-6.508h2v6.508a2.496 2.496 0 0 1-2.5 2.492h-5c-1.38 0-2.5-1.116-2.5-2.492z"></path>
                                </svg>
                            </a>
                        </td>
                    </tr>';
        }
        return $html;
    }
}
if (!function_exists('htmlItemCartHeader')) {
    function htmlItemCartHeader($k = '', $item = [])
    {
        $html = '';
        if (isset($item)) {

            $slug = !empty($item['slug']) ? $item['slug'] : '';
            $title_version = !empty($item['options']['title_version']) ? ' - ' . $item['options']['title_version'] : '';
            $html .= '<li class="flex flex-wrap group mb-8" data-rowid="' . $k . '">
                        <div class="mr-5 relative">
                            <a href="' . $slug . '"><img src="' . asset($item['image']) . '" alt="' . $item['title'] . '" loading="lazy" width="90" height="100" /></a>
                            <button class="absolute top-3 left-3 opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all hover:text-orange cart-remove">
                                 <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true" style="fill: red;width:20px;height20px">
                                    <path d="M8 3.994c0-1.101.895-1.994 2-1.994s2 .893 2 1.994h4c.552 0 1 .446 1 .997a1 1 0 0 1-1 .997h-12c-.552 0-1-.447-1-.997s.448-.997 1-.997h4zm-3 10.514v-6.508h2v6.508a.5.5 0 0 0 .5.498h1.5v-7.006h2v7.006h1.5a.5.5 0 0 0 .5-.498v-6.508h2v6.508a2.496 2.496 0 0 1-2.5 2.492h-5c-1.38 0-2.5-1.116-2.5-2.492z"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="flex-1">
                            <h4>
                                <a class="font-light text-sm md:text-base text-dark hover:text-orange transition-all tracking-wide" href="' . $slug . '"><span class="text-red-600 font-bold">' . $item['title'] . '</span>' . $title_version . '</a>
                            </h4>
                            <span class="font-light text-sm text-dark transition-all tracking-wide">' . $item['quantity'] . ' x <span>' . number_format($item['price'], 0, ',', '.') . '₫' . '</span></span>
                        </div>
                    </li>';
        }
        return $html;
    }
}
if (!function_exists('htmlItemCartCopyCustomer')) {
    function htmlItemCartCopyCustomer($k = '', $item = [])
    {
        $html = '';
        if (isset($item)) {
            $slug = !empty($item['slug']) ? $item['slug'] : '';
            $title_version = !empty($item['options']['title_version']) ? $item['options']['title_version'] : '';
            $html .= '<div class="flex flex-col md:flex-row space-y-2 md:space-y-0 space-x-0 md:space-x-2">
                                <div class="w-full md:w-1/2 flex space-x-3">
                                    <div class="w-[50px]">
                                        <img alt="' . $item['title'] . '" class="border w-full object-cover" src="' . asset($item['image']) . '">
                                    </div>
                                    <div class="flex-1">
                                        <a target="_blank" href="' . route('routerURL', ['slug' => $slug]) . '" class="text-blue-500">' . $item['title'] . '</a>
                                        <p class="subdued">' . $title_version . '</p>
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2 flex space-x-2 items-center justify-between">
                                    <div>' . number_format($item['price'], 0, ',', '.') . '₫ x </div>
                                    <div>
                                        <input max="1000000" min="1" size="30" type="number" class="border h-9 leading-9 text-black pl-2 focus:outline-none rounded js_change_copyCart" value="' . $item['quantity'] . '" data-rowid="' . $k . '">
                                    </div>
                                    <div>
                                        ' . number_format($item['price'] * $item['quantity'], 0, ',', '.') . '₫
                                    </div>
                                    <div>
                                        <a href="javascript:void(0)" class="js_delete_copyCart" data-rowid="' . $k . '">
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true" style="fill: red;width:20px;height:20px">
                                            <path d="M8 3.994c0-1.101.895-1.994 2-1.994s2 .893 2 1.994h4c.552 0 1 .446 1 .997a1 1 0 0 1-1 .997h-12c-.552 0-1-.447-1-.997s.448-.997 1-.997h4zm-3 10.514v-6.508h2v6.508a.5.5 0 0 0 .5.498h1.5v-7.006h2v7.006h1.5a.5.5 0 0 0 .5-.498v-6.508h2v6.508a2.496 2.496 0 0 1-2.5 2.492h-5c-1.38 0-2.5-1.116-2.5-2.492z"></path>
                                        </svg>
                                        </a>
                                    </div>

                                </div>
                            </div>';
        }
        return $html;
    }
}
if (!function_exists('htmlItemCartCopyAdmin')) {
    function htmlItemCartCopyAdmin($key = '', $item = [])
    {
        $html = '';
        if (isset($item)) {
            $slug = !empty($item['slug']) ? $item['slug'] : '';
            $title_version = !empty($item['options']['title_version']) ? $item['options']['title_version'] : '';
            $html .= '<tr><td><div class="font-medium whitespace-nowrap">' . $item['title'] . '</div>';
            if (!empty($title_version)) {
                $html .= '<div class="text-slate-500 text-sm mt-0.5 whitespace-nowrap">' . $title_version . '</div>';
            }
            $html .= '</td>
                                <td class="text-right w-32">
                                    <input type="number" class="form-control js_change_copyCart" value="' . $item['quantity'] . '" data-rowid="' . $key . '">
                                </td>
                                <td class="text-right w-32">' . number_format($item['price'], 0, ',', '.') . '₫</td>
                                <td class="text-right w-32 font-medium">' . number_format($item['price'] * $item['quantity'], 0, ',', '.') . '₫</td>
                                <td>
                                    <a href="javascript:void(0)" class="text-danger js_delete_copyCart" data-rowid="' . $key . '">
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true" style="fill: red;width:20px;height:20px;float:right">
                                            <path d="M8 3.994c0-1.101.895-1.994 2-1.994s2 .893 2 1.994h4c.552 0 1 .446 1 .997a1 1 0 0 1-1 .997h-12c-.552 0-1-.447-1-.997s.448-.997 1-.997h4zm-3 10.514v-6.508h2v6.508a.5.5 0 0 0 .5.498h1.5v-7.006h2v7.006h1.5a.5.5 0 0 0 .5-.498v-6.508h2v6.508a2.496 2.496 0 0 1-2.5 2.492h-5c-1.38 0-2.5-1.116-2.5-2.492z"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>';
        }
        return $html;
    }
}
if (!function_exists('htmlItemProduct')) {
    function htmlItemProduct($key = '', $item = [], $class = '')
    {
        $html = '';
        $price = getPrice(array('price' => $item['price'], 'price_sale' => $item['price_sale'], 'price_contact' =>
        $item['price_contact']));
        /*$html .= '<div class="' . $class . '">
                                <div class="img-box overflow-hidden rounded-t-2xl">
                                    <a href="' . route('routerURL', ['slug' => $item['slug']]) . '" class=" ">
                                        <img class=" w-full h-[193px] md:h-[216px] object-cover bg-white rounded-t-2xl" src="' . asset($item['image']) . '" alt="' . $item['title'] . '">
                                    </a>
                                </div>
                                <div class="p-[10px]">
                                    <div class="flex flex-wrap">';
        if (count($item['getTags']) > 0) {
            foreach ($item['getTags'] as $val) {
                $html .= '<a class="text-[#90908e] text-xs hover:text-green-500 mb-1" href="' . route('tagURL', ['slug' => $val->slug]) . '">#' . $val->title . '</a>';
            }
        }
        $html .= '</div>
                                    <div>
                                    <a class="text-sm font-bold clamp-2 group-hover:text-green-500 hover:text-green-500 h-10 clamp-2" href="' . route('routerURL', ['slug' => $item->slug]) . '">' . $item['title'] . '</a></div>
                                    <div class="flex justify-between items-center space-x- mt-2">
                                        <div class="flex-1">';
        if (!empty(Auth::guard('customer')->user())) {
            $html .= '<span class="text-green-500 font-semibold text-sm">' . $price['price_final'] . '</span>';
            $html .= '<span class="font-normal text-sm line-through">' . $price['price_old'] . '</span>';
        } else {
            $html .= '<span class="text-green-500 font-semibold text-sm">' . trans('index.Contact') . '</span>';
        }


        $html .= '</div>
                                        <a href="' . route('routerURL', ['slug' => $item['slug']]) . '" data-toggle="tooltip" data-placement="top" type="button" title="Thêm vào giỏ" class="hover:text-white text-green-500 rounded-full bg-[#e8f6ea] border border-green-500 w-10 h-10 text-center hover:bg-green-500 hover:border-green-500 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>'; */

        $html .= '<div class="product-item ' . $class . '">
                            <div class="zoom-effect overflow-hidden relative">
                                <a href="' . route('routerURL', ['slug' => $item['slug']]) . '">
                                    <img src="' . asset($item['image']) . '" alt="' . $item['title'] . '" loading="lazy" class="h-[165px] md:h-[350px]">
                                </a>
                                <div class="hidden button-add absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 opacity-0">
                                    <a href="' . route('routerURL', ['slug' => $item['slug']]) . '" class="w-[50px] h-[50px] flex justify-center text-white items-center" style="background: rgba(25, 25, 25, 0.7);">
                                        <i class="fa fa-info"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="py-5">
                                <h3>
                                    <a href="' . route('routerURL', ['slug' => $item['slug']]) . '" class="text-white overflow-hidden clamp clamp-2">
                                    ' . $item['title'] . '
                                    </a>
                                </h3>
                                <div class="space-x-[5px] text-white flex items-center">
                                   ';
        if (!empty($price['price_final'])) {
            $html .= '<span class="price_final text-f15 md:text-xl">' . $price['price_final'] . '</span>
            <del class="text-white">
            ' . $price['price_old'] . '
            </del>';
        }
        $html .= '</div>
                            </div>
                        </div>';
        return $html;
    }
}
