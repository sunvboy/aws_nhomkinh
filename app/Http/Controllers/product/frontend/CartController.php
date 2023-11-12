<?php

namespace App\Http\Controllers\product\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVersion;
use Illuminate\Support\Facades\DB;
use Session;
use App\Components\Coupon as CouponHelper;
use App\Components\System;
use Auth;

class CartController extends Controller
{
    protected $coupon;
    public function __construct()
    {
        $this->coupon = new CouponHelper();
        $this->system = new System();
    }
    //trang giỏ hàng
    public function index()
    {
        $dropdown = getFunctions();
        $cartController = Session::get('cart');
        $coupon = Session::get('coupon');
        //page: giỏ hàng
        $page = Page::where(['alanguage' => config('app.locale'), 'page' => 'cart_index'])->select('meta_title', 'meta_description', 'image', 'title')->first();
        $seo['canonical'] = route('cart.index');
        $seo['meta_title'] = !empty($page['meta_title']) ? $page['meta_title'] : $page['title'];
        $seo['meta_description'] = !empty($page['meta_description']) ? $page['meta_description'] : '';
        $seo['meta_image'] = !empty($page['image']) ? url($page['image']) : '';
        $fcSystem = $this->system->fcSystem();

        return view('cart.index', compact('page', 'seo', 'fcSystem', 'cartController', 'coupon', 'dropdown'));
    }
    //trang checkout
    public function checkout()
    {
        $customer_id = Auth::guard('customer')->user()->id;
        $addressCustomer = [];
        if ($customer_id) {
            $addressCustomer = \App\Models\CustomerAddress::where(['publish' => 1, 'customer_id' => $customer_id])->first();
        }

        $cartController = Session::get('cart');
        if (!isset($cartController)) {
            return redirect()->route('homepage.index')->with('error', "Có lỗi xảy ra");
        }
        $dropdown = getFunctions();
        $orderInfo =  Session::get('orderinfo');
        $coupon = Session::get('coupon');
        $getCity = DB::table('vn_province')->orderBy('name', 'asc')->get();
        $listCity['0'] = trans('index.City');
        if (isset($getCity)) {
            foreach ($getCity as $key => $val) {
                $listCity[$val->id] = $val->name;
            }
        }
        // Session::forget('coupon');
        // Session::save();
        $detail = Page::find(4);
        //get "Phương thức thanh toán"
        $payments = \App\Models\orderConfig::select('id', 'title', 'description', 'image', 'keyword')->where('publish', 0)->orderBy('order', 'asc')->orderBy('id', 'desc')->get();

        //page: giỏ hàng
        $page = Page::where(['alanguage' => config('app.locale'), 'page' => 'cart_checkout'])->select('meta_title', 'meta_description', 'image', 'title')->first();
        $seo['canonical'] = route('cart.checkout');
        $seo['meta_title'] = !empty($page['meta_title']) ? $page['meta_title'] : $page['title'];
        $seo['meta_description'] = !empty($page['meta_description']) ? $page['meta_description'] : '';
        $seo['meta_image'] = !empty($page['image']) ? url($page['image']) : '';
        $fcSystem = $this->system->fcSystem();
        return view('cart.checkout', compact('page', 'seo', 'fcSystem', 'cartController', 'coupon', 'listCity', 'orderInfo', 'dropdown', 'payments', 'addressCustomer'));
    }
    //trang thanh toán thành công
    public function success($id)
    {
        if (empty($id)) {
            return redirect()->route('homepage.index')->with('error', trans('index.OrderDoesNotExist'));
        }
        $detail = Order::with('city_name')->with('district_name')->with('ward_name')->find($id);
        if (!isset($detail)) {
            return redirect()->route('homepage.index')->with('error', trans('index.OrderDoesNotExist'));
        }

        //page: đặt hàng thành công
        $page = Page::where(['page' => 'cart_success', 'alanguage' => config('app.locale')])->select('meta_title', 'meta_description', 'image', 'title')->first();
        $seo['canonical'] = route('cart.checkout');
        $seo['meta_title'] = !empty($page['meta_title']) ? $page['meta_title'] : $page['title'];
        $seo['meta_description'] = !empty($page['meta_description']) ? $page['meta_description'] : '';
        $seo['meta_image'] = !empty($page['image']) ? url($page['image']) : '';
        $fcSystem = $this->system->fcSystem();
        return view('cart.success', compact('page', 'fcSystem', 'seo', 'detail'));
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
            $textWard  =  '<option value="">' . trans('index.Ward') . '</option>';
            $temp = $temp . '<option value="0">' . trans('index.District') . '</option>';
        } else if ($type == 'district') {
            $table = 'vn_ward';
            $where = ['DistrictID' => $param['id']];
            $temp = $temp . '<option value="0">' . trans('index.Ward') . '</option>';
        }
        $getData = DB::table($table)->select('id', 'name')->where($where)->orderBy('name', 'asc')->get();

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
    //add to cart ajax
    public function addToCart(Request $request)
    {
        $alert = array(
            'error' => '',
            'message' => '',
            'total' => 0,
            'total_coupon' => 0,
            'total_items' => 0,
            'coupon_price' => 0
        );

        $id = $request->id;
        $quantity = $request->quantity;
        $title_version = $request->title_version;
        $id_version = $request->id_version;
        $product = Product::select('id', 'title', 'slug', 'price', 'price_sale', 'price_contact', 'inventory', 'inventoryPolicy', 'inventoryQuantity', 'catalogue_id', 'image', 'ships')->find($id);
        if (!$product) {
            $alert['error'] = trans('index.ProductDoesNotExist');
        }
        //START: check tồn kho => products_versions
        if ($request->type == 'variable') {
            $getVersionProduct = ProductVersion::where('product_id', $id)->where('id_version', $id_version)->first();
            if (!$getVersionProduct) {
                $alert['error'] = trans('index.ProductVersionDoesNotExist');
            }
            //check cart
            $checkCartVariable = checkCart($getVersionProduct, $quantity);
            if (!empty($checkCartVariable['status'])) {
                $alert['error'] = $checkCartVariable['message'];
                echo json_encode($alert);
                die();
            }
            //end
            $ships = array(
                'weight' => !empty($getVersionProduct['_ships_weight']) ? $getVersionProduct['_ships_weight'] : 200,
                'length' => !empty($getVersionProduct['_ships_length']) ? $getVersionProduct['_ships_length'] : 1,
                'width' => !empty($getVersionProduct['_ships_width']) ? $getVersionProduct['_ships_width'] : 2,
                'height' => !empty($getVersionProduct['_ships_height']) ? $getVersionProduct['_ships_height'] : 3,
            );
            $priceProduct = getPrice(array('price' => $getVersionProduct['price_version'], 'price_sale' => $getVersionProduct['price_sale_version'], 'price_contact' =>
            0));
        } else if ($request->type == 'simple') {
            //check stock
            $checkCartVariable = checkCart($product, $quantity, 'simple');
            if (!empty($checkCartVariable['status'])) {
                $alert['error'] = $checkCartVariable['message'];
                echo json_encode($alert);
                die();
            }
            //end
            $ships = json_decode($product->ships, TRUE);
            $priceProduct = getPrice(array('price' => $product['price'], 'price_sale' => $product['price_sale'], 'price_contact' =>
            $product['price_contact']));
        }
        //END: check tồn kho
        $cart = Session::get('cart');
        //tạo rowid
        $rowid = md5($product->id . $title_version);
        if (isset($cart[$rowid])) {
            $quantity = $cart[$rowid]['quantity'] + $request->quantity;
            if ($request->type == 'variable') {
                $getVersionProduct = ProductVersion::where('product_id', $id)->where('id_version', $id_version)->first();
                if (!$getVersionProduct) {
                    $alert['error'] = trans('index.ProductVersionDoesNotExist');
                }
                //check cart
                $checkCartVariable = checkCart($getVersionProduct, $quantity);
                if (!empty($checkCartVariable['status'])) {
                    $alert['error'] = $checkCartVariable['message'];
                    echo json_encode($alert);
                    die();
                }
                //end
            } else if ($request->type == 'simple') {
                //check stock
                $checkCartVariable = checkCart($product, $quantity, 'simple');
                if (!empty($checkCartVariable['status'])) {
                    $alert['error'] = $checkCartVariable['message'];
                    echo json_encode($alert);
                    die();
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
                    "image" => !empty($request->image) ? $request->image : $product->image,
                    "quantity" => $request->quantity,
                    "price" => $priceProduct['price_final_none_format'],
                    "ships" => $ships,
                ];
            } else {
                $cart[$rowid] = [
                    "id" => $product->id,
                    "title" => $product->title,
                    "slug" => $product->slug,
                    "image" => !empty($request->image) ? $request->image : $product->image,
                    "quantity" => $request->quantity,
                    "price" => $priceProduct['price_final_none_format'],
                    "options" => array(
                        'id_version' => $id_version,
                        'title_version' => $title_version,
                    ),
                    "ships" => $ships,
                ];
            }
        }
        Session::put('cart', $cart);
        Session::save();
        // dd(Session::all());die;
        $getUpdateCart = $this->getUpdateCart($cart, $alert);
        $alert['message'] = trans('index.ProductAddedToCartSuccessfully');
        $alert['total'] = !empty($getUpdateCart['total']) ? $getUpdateCart['total'] : 0;
        $alert['total_items'] = !empty($getUpdateCart['total_items']) ? $getUpdateCart['total_items'] : 0;
        $alert['total_coupon'] = !empty($getUpdateCart['total_coupon']) ? $getUpdateCart['total_coupon'] : 0;
        $alert['html_header'] = !empty($getUpdateCart['html_header']) ? $getUpdateCart['html_header'] : '';
        echo json_encode($alert);
        die();
    }
    //update: tăng giảm số lương, xóa giỏ hàng
    public function updateCart(Request $request)
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
        $cart = Session::get('cart');
        $quantity = $request->quantity;
        if ($request->type == 'update') {
            if ($request->rowid and $quantity) {
                //check tồn kho sản phẩm biến thể
                if (!empty($cart[$request->rowid]["options"])) {
                    $getVersionProduct = ProductVersion::select('id', '_stock_status', '_stock', '_outstock_status')
                        ->where('product_id', $cart[$request->rowid]["id"])
                        ->where('id_version',  $cart[$request->rowid]["options"]['id_version'])->first();
                    if (!$getVersionProduct) {
                        $alert['error'] = trans('index.ProductVersionDoesNotExist');
                    }
                    //check stock
                    $checkCartVariable = checkCart($getVersionProduct, $quantity);
                    if (!empty($checkCartVariable['status'])) {
                        $alert['error'] = $checkCartVariable['message'];
                        echo json_encode($alert);
                        die();
                    }
                    //end
                } else {
                    //check tồn kho sản phẩm đơn giản
                    $product = Product::select('inventory', 'inventoryPolicy', 'inventoryQuantity')->find($cart[$request->rowid]['id']);
                    //check stock
                    $checkCartVariable = checkCart($product, $quantity, 'simple');
                    if (!empty($checkCartVariable['status'])) {
                        $alert['error'] = $checkCartVariable['message'];
                        echo json_encode($alert);
                        die();
                    }
                    //end
                }
                //end
                $cart[$request->rowid]["quantity"] = $quantity;
                //return
                $alert = $this->getUpdateCart($cart, $alert);
            } else {
                $alert['error'] = trans('index.CartUpdateFailed');
            }
        } else if ($request->type == 'delete') {
            if ($request->rowid) {
                if (isset($cart[$request->rowid])) {
                    unset($cart[$request->rowid]);
                    //return
                    $alert = $this->getUpdateCart($cart, $alert);
                } else {
                    $alert['error'] = trans('index.CartDeletionFailed');
                }
            } else {
                $alert['error'] = trans('index.CartDeletionFailed');
            }
        } else {
            $alert['error'] = trans('index.AnErrorOccurred');
        }
        echo json_encode($alert);
        die();
    }
    //ajax thêm mã giảm giá
    public function addCoupon(Request $request)
    {
        $name = $request->name;
        $fee_ship = $request->fee_ship;
        if (!empty($name)) {
            $alert = $this->coupon->getCoupon($name, TRUE, $fee_ship);
        } else {
            $alert['error'] = trans('index.PromoCodeCannotBeBlank');
        }
        echo json_encode($alert);
        die();
    }
    //ajax xóa mã giảm giá
    public function deleteCoupon(Request $request)
    {
        $alert = array(
            'error' => '',
            'message' => '',
            'price' => 0,
            'total' =>  0
        );
        $id  = $request->id;
        $fee_ship  = $request->fee_ship;
        $cart = Session::get('cart');
        $total = 0;
        if ($cart) {
            foreach ($cart as $v) {
                $total += $v['price'] * $v['quantity'];
            }
        }
        $coupon = Session::get('coupon');
        if (!in_array($id, array_keys($coupon))) {
            $alert['error'] = trans('index.Discountcodedoesnotexist');
        } else {
            unset($coupon[$id]);
            Session::put('coupon', $coupon);
            Session::save();
            //return
            $price_counpon = 0;
            $html = '';
            if (isset($coupon)) {
                foreach ($coupon as $v) {
                    $price_counpon += $v['price'];
                    $html .= '<tr>
                        <th>' . trans('index.DiscountCode') . ' : <span class="cart-coupon-name">' . $v['name'] . '</span></th>
                        <td>-<span class="amount cart-coupon-price">' . number_format($v['price']) . '₫</span> <a href="javascript:void(0)" data-id="' . $v['id'] . '" class="remove-coupon">[' . trans('index.Delete') . ']</a></td>
                    </tr>';
                }
            }
            $alert['price'] = $price_counpon;
            $alert['html'] = $html;
            $alert['total'] = number_format($total + $fee_ship - $price_counpon) . '₫';
            $alert['message'] = trans('index.SuccessfullyDeletedDiscountCode');
        }
        echo json_encode($alert);
    }
    //cập nhập lại toàn bộ giỏ hàng nếu add coupon
    public function getUpdateCart($cart = [], $alert = [])
    {
        $coupon = Session::get('coupon');
        $html = $html_header =  '';
        Session::put('cart', $cart);
        Session::save();
        $total = 0;
        $total_items = 0;
        if ($cart) {
            foreach ($cart as $k => $v) {
                $total += $v['price'] * $v['quantity'];
                $total_items += $v['quantity'];
                $html .= htmlItemCart($k, $v);
                $html_header .= htmlItemCartHeader($k, $v);
            }
            //nếu tồn tại mã giảm giá thì tính toán lại
            $coupon_price = 0;
            $coupon_html = '';
            if (!empty($coupon)) {
                foreach ($coupon as $v) {
                    $this->coupon->getCoupon($v['name'], FALSE);
                }
            }
            $coupon = Session::get('coupon');
            if (!empty($coupon)) {
                foreach ($coupon as $v) {
                    $coupon_price += $v['price'];
                    $coupon_html .= '<tr>
                        <th>' . trans('index.DiscountCode') . ' : <span class="cart-coupon-name">' . $v['name'] . '</span></th>
                        <td>-<span class="amount cart-coupon-price">' . number_format($v['price']) . '₫</span> <a href="javascript:void(0)" data-id="' . $v['id'] . '" class="remove-coupon">[' . trans('index.Delete') . ']</a></td>
                    </tr>';
                }
            }
            //end
            $alert['html'] = $html;
            $alert['html_header'] = $html_header;
            $alert['message'] = trans('index.ProductUpdate');
            $alert['total'] = $total;
            $alert['total_coupon'] = $total - $coupon_price;
            $alert['total_items'] = $total_items;
            $alert['coupon_price'] = $coupon_price;
            $alert['coupon_html'] = $coupon_html;
        }
        return $alert;
    }
}
