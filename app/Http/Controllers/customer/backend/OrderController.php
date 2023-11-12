<?php

namespace App\Http\Controllers\customer\backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class OrderController extends Controller
{
    protected $table = 'customers';

    public function orders(Request $request, $id)
    {
        $module = $this->table;
        $detail  = Customer::find($id);
        if (!isset($detail)) {
            return redirect()->route('customers.index')->with('error', "Thành viên không tồn tại");
        }
        $data = \App\Models\Order::where(['deleted_at' => '0000-00-00 00:00:00', 'publish' => 1, 'customerid' => $id])->orderBy('id', 'desc');
        if (is($request->keyword)) {
            $data =  $data->where('code', 'like', '%' . $request->keyword . '%')
                ->orWhere('fullname', 'like', '%' . $request->keyword . '%')
                ->orWhere('phone', 'like', '%' . $request->keyword . '%')
                ->orWhere('email', 'like', '%' . $request->keyword . '%');
        }
        if (is($request->status)) {
            $data =  $data->where('status', $request->status);
        }
        if (is($request->payment)) {
            $data =  $data->where('payment', $request->payment);
        }
        if (is($request->date)) {
            $date =  explode(' to ', $request->date);
            $date_start = trim($date[0] . ' 00:00:00');
            $date_end = trim($date[1] . ' 23:59:59');
            if ($date[0] != $date[1]) {
                $data =  $data->where('created_at', '>=', $date_start)->where('created_at', '<=', $date_end);
            }
        }
        $data = $data->paginate(env('APP_paginate'));
        if (is($request->keyword)) {
            $data->appends(['keyword' => $request->keyword]);
        }
        if (is($request->status)) {
            $data->appends(['status' => $request->status]);
        }
        if (is($request->payment)) {
            $data->appends(['payment' => $request->payment]);
        }
        if (is($request->date)) {
            $data->appends(['date' => $request->date]);
        }
        return view('customer.backend.order.index', compact('module', 'data', 'detail'));
    }
    public function orderCreate($id, $orderID)
    {
        $module = $this->table;
        $detail  = Customer::find($id);
        if (!isset($detail)) {
            return redirect()->route('customers.index')->with('error', "Thành viên không tồn tại");
        }
        $detailOrder = \App\Models\Order::with(['city_name', 'district_name', 'ward_name'])->find($orderID);
        if (!isset($detailOrder)) {
            return redirect()->route('customers.index')->with('error', "Đơn hàng không tồn tại");
        }
        //Tạo session
        Session::put('cartCopyAdmin' . $detail->id, json_decode($detailOrder->cart, TRUE));
        Session::save();
        $cartCopy = Session::get('cartCopyAdmin' . $detail->id);
        //end
        $products = \App\Models\Product::where(['alanguage' => config('app.locale'), 'publish' => 0])
            ->orderBy('id', 'desc')
            ->with('product_versions')
            ->paginate(20);
        //Lấy Tỉnh/Thành phố,....
        $getCity = \App\Models\VNCity::orderBy('name', 'asc')->get();
        $getDistrict = \App\Models\VNDistrict::where('ProvinceID', $detailOrder->city_id)->orderBy('name', 'asc')->get();
        $getWard = \App\Models\VNWard::where('DistrictID', $detailOrder->district_id)->orderBy('name', 'asc')->get();
        $listCity['0'] = 'Tỉnh/Thành Phố';
        $listDistrict['0'] = 'Quận/Huyện';
        $listWard['0'] = 'Phường/Xã';
        if (isset($getCity)) {
            foreach ($getCity as $key => $val) {
                $listCity[$val->id] = $val->name;
            }
        }
        if (isset($getDistrict)) {
            foreach ($getDistrict as $key => $val) {
                $listDistrict[$val->id] = $val->name;
            }
        }
        if (isset($getWard)) {
            foreach ($getWard as $key => $val) {
                $listWard[$val->id] = $val->name;
            }
        }
        //lấy phí vận chuyển
        $getFeeShip = getFeeShip($detailOrder->city_id, $detailOrder->district_id);


        $payments = \App\Models\orderConfig::select('id', 'title', 'description', 'image', 'keyword')->where('publish', 0)->orderBy('order', 'asc')->orderBy('id', 'desc')->get();
        return view('customer.backend.order.create', compact('module', 'detailOrder', 'detail', 'cartCopy', 'products', 'listCity', 'listDistrict', 'listWard', 'getFeeShip', 'payments'));
    }
    public function ajaxListProduct(Request $request)
    {
        $keyword = removeutf8($request->keyword);
        $products =  \App\Models\Product::query()
            ->where('alanguage', config('app.locale'))
            ->orderBy('order', 'ASC')
            ->orderBy('id', 'DESC')->with('product_versions');
        if (!empty($keyword)) {
            $products =  $products->where('products.title', 'like', '%' . $keyword . '%');
            $products =  $products->orWhere('products.code', 'like', '%' . $keyword . '%');
        }
        $products =  $products->paginate(20);
        return view('customer.frontend.manager.order.dataProduct', compact('products'))->render();
    }
    public function addToCartCopyOrder(Request $request)
    {
        $alert = array(
            'error' => '',
            'message' => '',
            'total' => 0,
            'total_coupon' => 0,
            'total_items' => 0,
            'coupon_price' => 0
        );
        $html = '';
        $provisional = 0;
        $cart = Session::get('cartCopyAdmin' . $request->idCopyCart);
        $quantity = 1;
        $id = $request->id;
        $idVersion = $request->idVersion;
        $titleVersion = $request->titleVersion;
        $titleVersion = collect(json_decode($request->titleVersion, TRUE))->join(',', '');
        $product = \App\Models\Product::select('id', 'title', 'slug', 'price', 'price_sale', 'price_contact', 'inventory', 'inventoryPolicy', 'inventoryQuantity', 'catalogue_id', 'image', 'ships')
            ->with('product_versions')->find($id);
        if (!$product) {
            $alert['error'] = 'Sản phẩm không tồn tại';
            return response()->json(['data' => $alert, 'html' => $html, 'provisional' => $provisional]);
        }
        if (count($product->product_versions) > 0) {
            if (!empty($idVersion)) {
                $productVersion = \App\Models\ProductVersion::where('product_id', $id)->where('id_version', $idVersion)->first();
                if (!$productVersion) {
                    $alert['error'] = 'Phiên bản sản phẩm không tồn tại';
                    return response()->json(['data' => $alert, 'html' => $html, 'provisional' => $provisional]);
                }
                //check stock
                $checkCartVariable = checkCart($productVersion, $quantity);
                if (!empty($checkCartVariable['status'])) {
                    $alert['error'] = $checkCartVariable['message'];
                    return response()->json(['data' => $alert, 'html' => $html, 'provisional' => $provisional]);
                }
                //end
                $ships = array(
                    'weight' => !empty($productVersion['_ships_weight']) ? $productVersion['_ships_weight'] : 200,
                    'length' => !empty($productVersion['_ships_length']) ? $productVersion['_ships_length'] : 1,
                    'width' => !empty($productVersion['_ships_width']) ? $productVersion['_ships_width'] : 2,
                    'height' => !empty($productVersion['_ships_height']) ? $productVersion['_ships_height'] : 3,
                );
                $priceProduct = getPrice(array('price' => $productVersion['price_version'], 'price_sale' => $productVersion['price_sale_version'], 'price_contact' =>
                0));
            } else {
                $alert['error'] = 'Chọn các tùy chọn cho sản phẩm trước khi cho sản phẩm vào giỏ hàng của bạn.';
                return response()->json(['data' => $alert, 'html' => $html, 'provisional' => $provisional]);
            }
        } else {
            //check stock
            $checkCartVariable = checkCart($product, $quantity, 'simple');
            if (!empty($checkCartVariable['status'])) {
                $alert['error'] = $checkCartVariable['message'];
                return response()->json(['data' => $alert, 'html' => $html, 'provisional' => $provisional]);
            }
            //end
            $ships = json_decode($product->ships, TRUE);
            $priceProduct = getPrice(array('price' => $product['price'], 'price_sale' => $product['price_sale'], 'price_contact' =>
            $product['price_contact']));
        }
        //tạo rowid
        $rowid = md5($product->id . $titleVersion);
        if (isset($cart[$rowid])) {
            $quantity = $cart[$rowid]['quantity'] + 1;

            if (count($product->product_versions) > 0) {
                if (!empty($idVersion)) {
                    $productVersion = \App\Models\ProductVersion::where('product_id', $id)->where('id_version', $idVersion)->first();
                    if (!$productVersion) {
                        $alert['error'] = "Phiên bản sản phẩm không tồn tại";
                        return response()->json(['data' => $alert, 'html' => $html, 'provisional' => $provisional]);
                    }
                    //check cart
                    $checkCartVariable = checkCart($productVersion, $quantity);
                    if (!empty($checkCartVariable['status'])) {
                        $alert['error'] = $checkCartVariable['message'];
                        return response()->json(['data' => $alert, 'html' => $html, 'provisional' => $provisional]);
                    }
                    //end
                } else {
                    $alert['error'] = 'Chọn các tùy chọn cho sản phẩm trước khi cho sản phẩm vào giỏ hàng của bạn.';
                    return response()->json(['data' => $alert, 'html' => $html, 'provisional' => $provisional]);
                }
            } else {
                //check stock
                $checkCartVariable = checkCart($product, $quantity, 'simple');
                if (!empty($checkCartVariable['status'])) {
                    $alert['error'] = $checkCartVariable['message'];
                    return response()->json(['data' => $alert, 'html' => $html, 'provisional' => $provisional]);
                }
                //end
            }
            //update
            $cart[$rowid]['quantity'] =  $quantity;
            $cart[$rowid]['image'] =  !empty($request->image) ? $request->image : $product->image;
            $cart[$rowid]['price'] = $priceProduct['price_final_none_format'];
            $cart[$rowid]['ships'] = $ships;
        } else {
            if ($request->type == 'simple') {
                $cart[$rowid] = [
                    "id" => $product->id,
                    "title" => $product->title,
                    "slug" => $product->slug,
                    "image" => $product->image,
                    "quantity" => 1,
                    "price" => $priceProduct['price_final_none_format'],
                    "ships" => $ships,
                ];
            } else {
                $cart[$rowid] = [
                    "id" => $product->id,
                    "title" => $product->title,
                    "slug" => $product->slug,
                    "image" => $product->image,
                    "quantity" => 1,
                    "price" => $priceProduct['price_final_none_format'],
                    "options" => array(
                        'id_version' => $idVersion,
                        'title_version' => $titleVersion,
                    ),
                    "ships" => $ships,
                ];
            }
        }
        Session::put('cartCopyAdmin' . $request->idCopyCart, $cart);
        Session::save();

        if (!empty($cart)) {
            foreach ($cart as $key => $item) {
                $provisional += $item['quantity'] * $item['price'];
                $html .= htmlItemCartCopyAdmin($key, $item);
            }
        }
        $alert['message'] = 'Thêm sản phẩm vào giỏ hàng thành công';
        return response()->json(['data' => $alert, 'html' => $html, 'provisional' => $provisional]);
    }
    public function updateCartCopyOrder(Request $request)
    {
        $alert = array(
            'error' => '',
            'message' => '',
            'html' => '',
            'total' => 0,
            'total_coupon' => 0,
            'total_items' => 0,
            'coupon_price' => 0
        );
        $quantity = $request->quantity;
        $type = $request->type;
        $cart = Session::get('cartCopyAdmin' . $request->idCopyCart);
        if ($type == 'update') {
            if (!empty($request->rowid) && !empty($quantity)) {
                //check tồn kho sản phẩm biến thể
                if (!empty($cart[$request->rowid]["options"])) {
                    $productVersion = \App\Models\ProductVersion::select('id', '_stock_status', '_stock', '_outstock_status')
                        ->where('product_id', $cart[$request->rowid]["id"])
                        ->where('id_version',  $cart[$request->rowid]["options"]['id_version'])->first();
                    if (!$productVersion) {
                        $alert['error'] = "Phiên bản sản phẩm không tồn tại";
                        return response()->json(['data' => $alert]);
                    }

                    //check stock
                    $checkCartVariable = checkCart($productVersion, $quantity);
                    if (!empty($checkCartVariable['status'])) {
                        $alert['error'] = $checkCartVariable['message'];
                        return response()->json(['data' => $alert]);
                    }
                    //end

                } else {
                    //check tồn kho sản phẩm đơn giản
                    $product = \App\Models\Product::select('inventory', 'inventoryPolicy', 'inventoryQuantity')->find($cart[$request->rowid]['id']);
                    //check stock
                    $checkCartVariable = checkCart($product, $quantity, 'simple');
                    if (!empty($checkCartVariable['status'])) {
                        $alert['error'] = $checkCartVariable['message'];
                        return response()->json(['data' => $alert]);
                    }
                    //end
                }
                //end
                $cart[$request->rowid]["quantity"] = $request->quantity;
                $alert['message'] = "Cập nhập sản phẩm thành công";
                //return
                Session::put('cartCopy' . $request->idCopyCart, $cart);
                Session::save();
                $html = '';
                $provisional = 0;
                if (!empty($cart)) {
                    foreach ($cart as $key => $item) {
                        $provisional += $item['quantity'] * $item['price'];
                        $html .= htmlItemCartCopyAdmin($key, $item);
                    }
                }
                return response()->json(['data' => $alert, 'html' => $html, 'provisional' => $provisional]);
            } else {
                $alert['error'] = trans('index.CartUpdateFailed');
                return response()->json(['data' => $alert]);
            }
        } else if ($type == 'delete') {
            if ($request->rowid) {
                if (isset($cart[$request->rowid])) {
                    unset($cart[$request->rowid]);
                    //return
                    $html = '';
                    $provisional = 0;
                    if (!empty($cart)) {
                        foreach ($cart as $key => $item) {
                            $provisional += $item['quantity'] * $item['price'];
                            $html .= htmlItemCartCopyAdmin($key, $item);
                        }
                    }
                    Session::put('cartCopyAdmin' . $request->idCopyCart, $cart);
                    Session::save();
                    $alert['message'] = trans('index.DeleteProductSuccessfully');
                    return response()->json(['data' => $alert, 'html' => $html, 'provisional' => $provisional]);
                } else {
                    $alert['error'] = trans('index.CartDeletionFailed');
                    return response()->json(['data' => $alert]);
                }
            } else {
                $alert['error'] = trans('index.CartDeletionFailed');
                return response()->json(['data' => $alert]);
            }
        } else {
            $alert['error'] = trans('index.AnErrorOccurred');
            return response()->json(['data' => $alert]);
        }
        return response()->json(['data' => $alert]);
    }

    public function getLocation(Request $request)
    {
        $param = $request->param;
        $type = $param['type'];
        $table  = '';
        $textWard  = '';
        $temp = '';
        if ($type == 'city') {
            $table = 'vn_district';
            $where = ['ProvinceID' => $param['id']];
            $textWard  =  '<option value="0">' . trans('index.Ward') . '</option>';
        } else if ($type == 'district') {
            $table = 'vn_ward';
            $where = ['DistrictID' => $param['id']];
        }
        $getData = DB::table($table)->select('id', 'name')->where($where)->orderBy('name', 'asc')->get();
        $temp = $temp . '<option value="0">' . $param['text'] . '</option>';
        if (isset($getData)) {
            foreach ($getData as  $val) {
                $temp = $temp . '<option value="' . $val->id . '">' . $val->name . '</option>';
            }
        }
        echo json_encode(array(
            'html' => $temp,
            'textWard' => $textWard,
        ));
        die();
    }
    public function getPriceShip(Request $request)
    {

        $data = getFeeShip($request->cityID, $request->districtID);
        echo json_encode($data);
        die;
        //end

    }
    public function changePriceShip(Request $request)
    {
        $fee_shipping = !empty($request->fee) ? $request->fee : 0;
        $total = $price_coupon = 0;
        $cartController = Session::get('cart');
        $coupon = Session::get('coupon');
        if ($cartController) {
            foreach ($cartController as $k => $item) {
                $total += $item['price'] * $item['quantity'];
            }
        }
        if (isset($coupon)) {
            foreach ($coupon as $item) {
                $price_coupon += !empty($item['price']) ? $item['price'] : 0;
            }
        }
        return response()->json(['totalCart' => $total + $fee_shipping - $price_coupon, 'fee_shipping' => $fee_shipping]);
    }
}
