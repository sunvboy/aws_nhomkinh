<?php
if (!function_exists('callApiRequest')) {
    function callApiRequest($url = '', $data = '', $dataHeader = '')
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => $dataHeader,
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
if (!function_exists('getMenus')) {

    function getMenus($keyword = "")
    {
        $data = Cache::remember($keyword, 600, function () use ($keyword) {
            $data = \App\Models\Menu::select('id', 'title')->where(['slug' => $keyword])->with(['menu_items' => function ($query) {

                $query->select('menu_items.id', 'menu_items.menu_id', 'menu_items.parentid', 'menu_items.title', 'menu_items.image', 'menu_items.slug', 'menu_items.target')

                    ->where(['alanguage' => config('app.locale'), 'parentid' => 0])

                    ->with(['children' => function ($query) {

                        $query->select('menu_items.id', 'menu_items.menu_id', 'menu_items.parentid', 'menu_items.title', 'menu_items.image', 'menu_items.slug', 'menu_items.target')->where('alanguage', config('app.locale'))

                            ->orderBy('menu_items.order', 'asc')->orderBy('menu_items.id', 'desc');
                    }])

                    ->orderBy('menu_items.order', 'asc')->orderBy('menu_items.id', 'desc');
            }])->first();
            return $data;
        });
        return $data;
    }
}
if (!function_exists('getHtmlMenus')) {
    function getHtmlMenus($data = [], $arr = [])
    {
        $html = '';
        $html .= '<ul class="' . $arr['ul'] . '">';
        if ($data) {
            if (count($data->menu_items) > 0) {
                foreach ($data->menu_items as $item) {
                    $_blank = !empty($item->target === '_blank') ? 'target="_blank"' : '';
                    $html .= '<li class="' . $arr['li'] . ' group relative ">';
                    $html .= '<a href="' . url($item->slug) . '" class="' . $arr['a'] . ' ' . $arr['hover_color'] . ' flex items-center" ' . $_blank . '>';
                    $html .= '<span class="lg:mt-0 ' . $arr['hover_color'] . '">' . $item->title . '</span>';

                    if (count($item->children) > 0) {
                        $html .= '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>';
                    }

                    $html .= '</a>';
                    if (count($item->children) > 0) {
                        //menu cấp 2
                        $html .= '<ul class="' . $arr['ul_2'] . ' group-hover:block hidden absolute dropdown left-0 top-full w-[200px] bg-white text-left rounded z-10 ">';
                        foreach ($item->children as $item2) {
                            $_blank_2 = !empty($item2->target === '_blank') ? 'target="_blank"' : '';
                            $html .= '<li class="' . $arr['li_2'] . ' group2 relative">';
                            $html .= '<a href="' . url($item2->slug) . '" class="' . $arr['hover_color'] . '" ' . $_blank_2 . '>' . $item2->title . '';
                            if (count($item2->children) > 0) {
                                $html .= ' <span class="float-right"><i class="fa fa-angle-right " aria-hidden="true"></i></span>';
                            }
                            $html .= '</a>';
                            if (count($item2->children) > 0) {
                                $html .= '<ul class="' . $arr['ul_3'] . ' group2-hover:block hidden absolute dropdown left-full top-0 w-[200px]">';
                                foreach ($item2->children as $item3) {
                                    $_blank_3 = !empty($item3->target === '_blank') ? 'target="_blank"' : '';
                                    $html .= '<li class="' . $arr['li_3'] . '"><a href=" ' . url($item3->slug) . '" class="' . $arr['hover_color'] . '" ' . $_blank_3 . '>' . $item3->title . '</a></li>';
                                }
                                $html .= '</ul>';
                            }
                            $html .= '</li>';
                        }
                        $html .= '</ul>';
                        //end
                    }
                    $html .= '</li>';
                }
            }
        }
        $html .= '</ul>';
        return $html;
    }
}
if (!function_exists('getHtmlMenusFooter')) {
    function getHtmlMenusFooter($data = [], $arr = [])
    {
        $html = '';
        if ($data) {
            if (count($data->menu_items) > 0) {
                foreach ($data->menu_items as $item) {
                    if (count($item->children) > 0) {
                        $html .= '<div class="' . $arr['class'] . '">';
                        $html .= '<div class="item">';
                        $html .= '<div class="' . $arr['class_title'] . '">' . $item->title . '';
                        $html .= '</div>';
                        $html .= ' <ul class="' . $arr['class_ul'] . '">';
                        foreach ($item->children as $item2) {
                            $_blank = !empty($item2->target === '_blank') ? 'target="_blank"' : '';
                            $html .= ' <li class="' . $arr['class_li'] . '">';
                            $html .= ' <a href="' . url($item2->slug) . '" class="' . $arr['class_a'] . '" ' . $_blank . '>' . $item2->title . '</a>';
                            $html .= ' </li>';
                        }
                        $html .= ' </ul>';
                        $html .= '</div>';
                        $html .= '</div>';
                    }
                }
            }
        }
        return $html;
    }
}
if (!function_exists('getHtmlFormSearch')) {

    function getHtmlFormSearch($arr = [])
    {
        $html = '';
        $html .= '<form class="' . $arr['classForm'] . '" action="' . $arr['action'] . '" method="GET" enctype="multipart/form">';
        $html .= '<div class="relative">';
        $html .= '<input placeholder="' . $arr['placeholder'] . '" type="text" value="" class="' . $arr['classInput'] . '" name="keyword" />';
        $html .= '<button class="absolute right-1 rounded-full bg-d61c1f h-9 w-10 text-white top-1/2 ' . $arr['classButton'] . '" style="transform: translateY(-50%) " type="submit">';
        $html .= '<svg
  width="24"
  height="24"
  viewBox="0 0 24 24"
  fill="none"
  class="' . $arr['classSvg'] . '"
  xmlns="http://www.w3.org/2000/svg"
>
  <path
    fill-rule="evenodd"
    clip-rule="evenodd"
    d="M18.319 14.4326C20.7628 11.2941 20.542 6.75347 17.6569 3.86829C14.5327 0.744098 9.46734 0.744098 6.34315 3.86829C3.21895 6.99249 3.21895 12.0578 6.34315 15.182C9.22833 18.0672 13.769 18.2879 16.9075 15.8442C16.921 15.8595 16.9351 15.8745 16.9497 15.8891L21.1924 20.1317C21.5829 20.5223 22.2161 20.5223 22.6066 20.1317C22.9971 19.7412 22.9971 19.1081 22.6066 18.7175L18.364 14.4749C18.3493 14.4603 18.3343 14.4462 18.319 14.4326ZM16.2426 5.28251C18.5858 7.62565 18.5858 11.4246 16.2426 13.7678C13.8995 16.1109 10.1005 16.1109 7.75736 13.7678C5.41421 11.4246 5.41421 7.62565 7.75736 5.28251C10.1005 2.93936 13.8995 2.93936 16.2426 5.28251Z"
    fill="currentColor"
  />
</svg>';
        $html .= '</button>';
        $html .= '</div>';
        $html .= '</form>';
        return $html;
    }
}
if (!function_exists('checkStock')) {

    function checkStock($item = [], $type = 'variable')
    {
        $data = array(
            'status' => 0,
            'title' => 0,
            'quantity' => '',
        );
        if ($type == 'simple') {
            if ($item['inventory'] == 1 && $item['inventoryPolicy'] == 0) {
                if ($item['inventoryQuantity'] == 0) {
                    $data['status'] = 1;
                    $data['title'] =  '<span class="product_stock">' . trans('index.OutOfStock') . '</span>';
                } else {
                    $data['quantity'] = $item['inventoryQuantity'];
                    $data['title'] = '<span class="product_stock">' . $item['inventoryQuantity'] . '</span> ' . trans('index.InOfStock');
                }
            } else {
                $data['title'] = '<span class="product_stock"></span> ' . trans('index.InOfStock');
            }
        } else {
            if ($item['_stock_status'] == 1 && $item['_outstock_status']  == 0) {
                if ($item['_stock'] == 0) {
                    $data['title'] =  '<span class="product_stock">' . trans('index.OutOfStock') . '</span>';
                    $data['status'] = 1;
                } else {
                    $data['title'] = '<span class="product_stock">' . $item['_stock'] . '</span> ' . trans('index.InOfStock');
                }
            } else {
                $data['title'] =  '<span class="product_stock">' . trans('index.InOfStock') . '</span>';
            }
        }

        return $data;
    }
}
if (!function_exists('checkCart')) {

    function checkCart($data = [], $quantity = 0, $type = 'variable')
    {
        $return = array(
            'status' => 0,
            'message' => ''
        );
        $_stock = checkStock($data, 'simple');
        if ($type == 'simple') {
            if ($_stock['status'] == 1) {
                $return['status'] = 1;
                $return['message'] = 'Hết hàng';
            }
            if ($data['inventory'] == 1 && $data['inventoryPolicy'] == 0) {
                if ($quantity > $data['inventoryQuantity']) {
                    $return['status'] = 1;
                    if ($data['inventoryQuantity'] == 0) {
                        $return['message'] = 'Hết hàng';
                    } else {
                        $return['message'] = trans('index.YouCanOnlyBuyUpTo', ['quantity' => $data['inventoryQuantity']]);
                    }
                }
            }
        } else {
            if ($_stock['status'] == 1) {
                $return['status'] = 1;
                $return['message'] = 'Hết hàng';
            }
            if ($data['_stock_status'] == 1 && $data['_outstock_status']  == 0) {
                if ($quantity > $data['_stock']) {
                    $return['status'] = 1;
                    if ($data['_stock'] == 0) {
                        $return['message'] = 'Hết hàng';
                    } else {
                        $return['message'] = trans('index.YouCanOnlyBuyUpTo', ['quantity' => $data['_stock']]);
                    }
                }
            }
        }
        return $return;
    }
}
if (!function_exists('getFeeShip')) {

    function getFeeShip($cityID = '', $districtID = '')
    {
        $html = '';
        $html_ghn = [];
        $ships = \App\Models\Ship::where(['publish' => 0])->get();
        $shipsAddress = \App\Models\ShipAddress::select('cityid', 'districtid')->with('city_name')->with('district_name')->where(['publish' => 1])->orderBy('id', 'desc')->first();
        $district_name =  \App\Models\VNDistrict::select('name', 'ProvinceID')->where('id', (int)$districtID)->with('city')->first();
        $priceShipShop =  \App\Models\VNCity::select('price')->where('id', (int)$cityID)->first();
        $DistrictID = (int)$districtID;
        $total = $price_coupon = $totalCoupon = 0;
        $totalWeight = $totalLength = $totalWidth = $totalHeight = 0;
        $start_fee_shipping = 0;
        $cartController = Session::get('cart');
        $coupon = Session::get('coupon');
        if ($cartController) {
            foreach ($cartController as $k => $item) {
                $total += $item['price'] * $item['quantity'];
                $totalWeight += $item['ships']['weight'] * $item['quantity'];
                // $totalLength += $item['ships']['length'] * $item['quantity'];
                // $totalWidth += $item['ships']['width'] * $item['quantity'];
                // $totalHeight += $item['ships']['height'] * $item['quantity'];
            }
        }
        if (isset($coupon)) {
            foreach ($coupon as $item) {
                $price_coupon += !empty($item['price']) ? $item['price'] : 0;
            }
        }

        $totalCoupon = $total - $price_coupon;
        if (!empty($DistrictID)) {
            if (!$ships->isEmpty()) {
                foreach ($ships as $item) {
                    if ($item->id == 1) {
                        //tính phí vận chuyển giao hàng tiết kiệm
                        if (!empty($shipsAddress->city_name->name) && !empty($shipsAddress->district_name->name)) {
                            $dataHeaderGHTK = array(
                                "Token: $item->TOKEN_API"
                            );
                            $dataGHTKRoad = array(
                                "pick_province" => $shipsAddress->city_name->name,
                                "pick_district" =>  $shipsAddress->district_name->name,
                                "province" => $district_name->city->name,
                                "district" => $district_name->name,
                                "address" => "",
                                "weight" => !empty($totalWeight) ? (int)$totalWeight : 200,
                                "value" => $totalCoupon,
                                "transport" => "road",
                                "deliver_option" => "none",
                            );
                            $getServiceGHTKRoad = json_decode(callApiRequest($item->URL_API . 'services/shipment/fee?' . http_build_query($dataGHTKRoad), '', $dataHeaderGHTK));
                        }
                    } else if ($item->id == 2) {
                        //tính phí vận chuyển giao hàng nhanh
                        /*lấy gói dịch vụ*/
                        if (!empty($shipsAddress->districtid)) {
                            $dataService = array(
                                "shop_id" => 119290,
                                "from_district" => (int)$shipsAddress->districtid,
                                "to_district" => $DistrictID
                            );
                            $dataHeader = array(
                                'token: ' . $item->TOKEN_API . '',
                                'Content-Type: application/json',
                                'ShopId: 119290',
                                'Content-Type: text/plain'
                            );
                            $getService = json_decode(callApiRequest($item->URL_API . 'shipping-order/available-services', json_encode($dataService), $dataHeader));
                            if ($getService->code == 200) {
                                if (!empty($getService->data)) {
                                    foreach ($getService->data as $item) {
                                        $data = array(
                                            "from_district_id" => (int)$shipsAddress->districtid,
                                            "service_id" => $item->service_id,
                                            "service_type_id" => $item->service_type_id,
                                            "to_district_id" => $DistrictID,
                                            "to_ward_code" => "",
                                            "height" => $totalHeight,
                                            "length" => $totalLength,
                                            "weight" => !empty($totalWeight) ? (int)$totalWeight : 200,
                                            "width" => $totalWeight,
                                            "insurance_value" =>  $totalCoupon,
                                            "coupon" => null
                                        );
                                        $getFeeShip = json_decode(callApiRequest('https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/fee', json_encode($data), $dataHeader));
                                        if ($getFeeShip->code == 200) {
                                            if (!empty($getFeeShip->data)) {
                                                $html_ghn[] = array(
                                                    'short_name' => $item->short_name,
                                                    'total' => $getFeeShip->data->total,
                                                    'service_fee' => $getFeeShip->data->service_fee,
                                                );
                                            }
                                        }
                                    }
                                }
                            }
                        }

                        //end 
                    }
                }
            }
            if ($priceShipShop) {
                $start_fee_shipping = $priceShipShop->price;
                $html .= '<div class="js_change_fee_shipping list_shipping_item flex justify-between items-center cursor-pointer" data-fee="' . $priceShipShop->price . '" data-title="Shop giao hàng">
                        <div class="flex space-x-3 w-full">
                           <label class="flex space-x-3 w-full cursor-pointer p-5" for="shopGH-0">
                                <span class="font-bold">Shop giao hàng</span>
                                <div class="font-bold priceA">₫' . number_format($priceShipShop->price, 0, ',', '.') . '</div>
                            </label>
                        </div>
                        <div class="js_checked_ship">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stardust-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                    </div>
                </div>';
            }
            if (!empty($getServiceGHTKRoad->fee) && !empty($getServiceGHTKRoad->fee->fee) && $getServiceGHTKRoad->fee->fee > 0) {
                $html .= '<div class="js_change_fee_shipping list_shipping_item flex justify-between items-center cursor-pointer" data-fee="' . $getServiceGHTKRoad->fee->fee . '" data-title="Giao hàng tiết kiệm">
                        <div class="flex space-x-3 w-full">
                           <label class="flex space-x-3 w-full cursor-pointer p-5" for="ghtk-0">
                                <span class="font-bold">Giao hàng tiết kiệm</span>
                                <div class="font-bold priceA">₫' . number_format($getServiceGHTKRoad->fee->fee, 0, ',', '.') . '</div>
                            </label>
                        </div>
                        <div class="js_checked_ship hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stardust-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                    </div>
                </div>';
            }
            if (!empty($html_ghn)) {
                foreach ($html_ghn as $key => $item) {
                    $html .= '<div class="js_change_fee_shipping list_shipping_item flex justify-between items-center cursor-pointer" data-fee="' . $item['total'] . '" data-title="Giao hàng nhanh - ' . $item['short_name'] . '">
                        <div class="w-full">
                            <label class="flex space-x-3 w-full cursor-pointer p-5" for="ghn-' . $key . '">
                                <span class="font-bold">Giao hàng nhanh - ' . $item['short_name'] . '</span>
                                <div class="font-bold priceA">₫' . number_format($item['total'], 0, ',', '.') . '</div>
                            </label>
                        </div>
                        <div class="js_checked_ship hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stardust-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                        </div>
                </div>';
                }
            }
        }
        return ['html' => $html, 'totalCart' => $total + $start_fee_shipping - $price_coupon, 'fee_ship' => $start_fee_shipping, 'title_ship' => 'Shop giao hàng'];
    }
}
