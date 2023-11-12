<?php $__env->startSection('content'); ?>
<?php
$fullname = $phone = $addres = $email = '';
$city_id = $district_id = $ward_id = '';
if (old('fullname')) {
    $fullname = old('fullname');
} else {
    if (!empty($orderInfo['fullname'])) {
        $fullname = $orderInfo['fullname'];
    } else {
        if (!empty($addressCustomer)) {
            $fullname = $addressCustomer->name;
        } else {
            $fullname = !empty(Auth::guard('customer')->user()) ? Auth::guard('customer')->user()->name : '';
        }
    }
}
if (old('phone')) {
    $phone = old('phone');
} else {
    if (!empty($orderInfo['phone'])) {
        $phone = $orderInfo['phone'];
    } else {
        if (!empty($addressCustomer)) {
            $phone = $addressCustomer->phone;
        } else {
            $phone = !empty(Auth::guard('customer')->user()) ? Auth::guard('customer')->user()->phone : '';
        }
    }
}
if (old('address')) {
    $address = old('address');
} else {
    if (!empty($orderInfo['address'])) {
        $address = $orderInfo['address'];
    } else {
        if (!empty($addressCustomer)) {
            $address = $addressCustomer->address;
        } else {
            $address = !empty(Auth::guard('customer')->user()) ? Auth::guard('customer')->user()->address : '';
        }
    }
}
if (old('email')) {
    $email = old('email');
} else {
    if (!empty($orderInfo['email'])) {
        $email = $orderInfo['email'];
    } else {
        $email = !empty(Auth::guard('customer')->user()) ? Auth::guard('customer')->user()->email : '';
    }
}


if (old('city_id')) {
    $city_id = old('city_id');
} else {
    if (!empty($orderInfo['city_id'])) {
        $city_id = $orderInfo['city_id'];
    } else {
        if (!empty($addressCustomer)) {
            $city_id = $addressCustomer->city_id;
        }
    }
}
if (old('district_id')) {
    $district_id = old('district_id');
} else {
    if (!empty($orderInfo['district_id'])) {
        $district_id = $orderInfo['district_id'];
    } else {
        if (!empty($addressCustomer)) {
            $district_id = $addressCustomer->district_id;
        }
    }
}
if (old('ward_id')) {
    $ward_id = old('ward_id');
} else {
    if (!empty($orderInfo['ward_id'])) {
        $ward_id = $orderInfo['ward_id'];
    } else {
        if (!empty($addressCustomer)) {
            $ward_id = $addressCustomer->ward_id;
        }
    }
}

?>
<nav class="px-4 relative w-full flex flex-wrap items-center justify-between py-3 bg-gray-100 text-gray-500 hover:text-gray-700 focus:text-gray-700 navbar navbar-expand-lg navbar-light">
    <div class="container mx-auto">
        <nav class="bg-grey-light w-full flex justify-center" aria-label="breadcrumb">
            <ol class="list-reset flex">
                <li><a href="<?php echo url('') ?>" class="text-gray-500 hover:text-gray-600"><?php echo e(trans('index.home')); ?></a></li>
                <li><span class="text-gray-500 mx-2">/</span></li>
                <li><a href="javascript:void(0)" class="text-gray-500 hover:text-gray-600"><?php echo e($page->title); ?></a></li>
            </ol>
        </nav>
    </div>
</nav>
<div class="py-9 bg-white px-4">
    <form class="checkout" action="<?php echo e(route('cart.order')); ?>" method="POST">
        <div class="container mx-auto">
            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-12 lg:col-span-7">
                    <div>
                        <h3 class="text-lg font-semibold mb-5"><?php echo e(trans('index.BillingInformation')); ?></h3>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-5">
                            <?php if($errors->any()): ?>
                            <div class="col-span-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-2 print-error-msg">
                                <strong class="font-bold">ERROR!</strong>
                                <span class="block sm:inline">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($error); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </span>
                            </div>
                            <?php endif; ?>
                            <?php if(session('error')): ?>
                            <div class="col-span-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-2 print-error-msg">
                                <strong class="font-bold">ERROR!</strong>
                                <span class="block sm:inline">
                                    <?php echo e(session('error')); ?>

                                </span>
                            </div>
                            <?php endif; ?>
                            <?php if(session('success')): ?>
                            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mb-2 print-success-msg" style="display: none">
                                <div class="flex items-center mb-">
                                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="font-bold"><?php echo e(session('success')); ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if(isset($arrStock)): ?>
                            <div class="col-span-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-2 ">
                                <strong class="font-bold">ERROR!</strong>
                                <div class="block sm:inline">
                                    <?php $__currentLoopData = $arrStock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($item); ?> /
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php echo csrf_field(); ?>
                            <div class="lg:col-span-2">
                                <div>
                                    <label class="mb-3 inline-block font-bold"><?php echo e(trans('index.Fullname')); ?></label>
                                    <?php echo Form::text('fullname', $fullname, ['class' => 'border border-solid border-gray-300 w-full py-1 px-2 mb-5 placeholder-current text-dark h-12 focus:outline-none text-base', 'autocomplete' => 'off']); ?>
                                </div>
                            </div>
                            <div class="">
                                <div>
                                    <label class="mb-3 inline-block font-bold">Email</label>

                                    <?php echo Form::text('email', $email, ['class' => 'border border-solid border-gray-300 w-full py-1 px-2 mb-5 placeholder-current text-dark h-12 focus:outline-none text-base', 'autocomplete' => 'off']); ?>
                                </div>
                            </div>
                            <div class="">
                                <div>
                                    <label class="mb-3 inline-block font-bold"><?php echo e(trans('index.Phone')); ?></label>

                                    <?php echo Form::text('phone', $phone, ['class' => 'border border-solid border-gray-300 w-full py-1 px-2 mb-5 placeholder-current text-dark h-12 focus:outline-none text-base', 'autocomplete' => 'off']); ?>
                                </div>
                            </div>
                            <div class="lg:col-span-2 mb-5">
                                <div>
                                    <label class="mb-3 inline-block font-bold"><?php echo e(trans('index.Address')); ?></label>
                                    <?php
                                    echo Form::text('address', $address, ['class' => 'border border-solid border-gray-300 w-full py-1 px-2 placeholder-current text-dark h-12 focus:outline-none text-base', 'autocomplete' => 'off']);
                                    ?>
                                </div>
                            </div>
                            <div class="lg:col-span-2 mb-5 grid grid-cols-3 gap-4">
                                <div>
                                    <label class="mb-3 inline-block font-bold"><?php echo e(trans('index.City')); ?></label>
                                    <?php
                                    echo Form::select('city_id', $listCity, $city_id, ['class' => 'bg-transparent border border-solid border-gray-300 w-full py-1 px-2 mb-5 placeholder-current text-dark h-12 focus:outline-none text-base', 'id' => 'city']);
                                    ?>
                                </div>
                                <div>
                                    <label class="mb-3 inline-block font-bold"><?php echo e(trans('index.District')); ?></label>
                                    <?php
                                    echo Form::select('district_id', [], old('district_id'), ['class' => 'bg-transparent border border-solid border-gray-300 w-full py-1 px-2 mb-5 placeholder-current text-dark h-12 focus:outline-none text-base', 'id' => 'district', 'placeholder' => trans('index.District')]);
                                    ?>
                                </div>
                                <div>
                                    <label class="mb-3 inline-block font-bold"><?php echo e(trans('index.Ward')); ?></label>
                                    <?php
                                    echo Form::select('ward_id', [], old('ward_id'), ['class' => 'bg-transparent border border-solid border-gray-300 w-full py-1 px-2 mb-5 placeholder-current text-dark h-12 focus:outline-none text-base', 'id' => 'ward', 'placeholder' => trans('index.Ward')]);
                                    ?>
                                </div>
                            </div>
                            <div class="js_box_shipping mb-5 lg:col-span-2 hidden">
                                <div class="space-y-2">
                                    <div>
                                        <label class="mb-3 inline-block font-bold"><?php echo e(trans('index.ShippingUnit')); ?></label>
                                        <div><?php echo e(trans('index.SHIPPINGCHANNEL',[ 'name' => $fcSystem['homepage_brandname']])); ?></div>
                                    </div>
                                    <div class="list_shipping space-y-2">
                                    </div>
                                </div>
                            </div>
                            <?php if(!$payments->isEmpty()): ?>
                            <div class="lg:col-span-2">
                                <label class="mb-3 inline-block font-bold"><?php echo e(trans('index.PaymentMethods')); ?></label>
                                <div class="space-y-4">
                                    <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div>
                                        <label class="flex items-center cursor-pointer" onclick="handleSelectPayment(<?php echo $val->id ?>)">
                                            <input name="payment" type="radio" class="mr-1 option-input radio" value="<?php echo e($val->keyword); ?>" <?php echo !empty(old('payment') && old('payment') == $val->keyword) ? 'checked' : (!empty($orderInfo['payment']) && !empty($orderInfo['payment'] == $val->keyword) ? 'checked' : (!empty($key == 0) ? 'checked' : '')) ?>>
                                            <span><?php echo e($val->title); ?></span>
                                        </label>
                                        <div class="shadow shadow_payment shadow_payment_<?php echo $val->id ?> p-4 mt-2 <?php echo !empty(old('payment') && old('payment') != $val->keyword) ? 'hidden' : (!empty($orderInfo['payment']) && !empty($orderInfo['payment'] != $val->keyword) ? 'hidden' : (empty($key == 0) ? 'hidden' : '')) ?>">
                                            <?php echo $val->description ?>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <?php endif; ?>


                        </div>
                        <style>
                            .stardust-icon {
                                color: #ee4d2d;
                            }

                            .list_shipping_item {
                                display: flex;
                                flex: 1;
                                background-color: #fafafa;
                                box-shadow: inset 4px 0 0 #ee4d2d;
                            }

                            .list_shipping_item .priceA {
                                color: #ee4d2d;
                            }
                        </style>
                        <div class="additional-info-wrap mt-3">
                            <h4 class="text-base font-bold mb-3"><?php echo e(trans('index.OrderNotes')); ?></h4>
                            <div class="additional-info">
                                <?php echo Form::textarea('note', !empty(old('note')) ? old('note') : (!empty($orderInfo['note']) ? $orderInfo['note'] : ''), ['class' => 'border border-solid border-gray-300 w-full py-1 px-2 placeholder-current text-dark h-36 focus:outline-none text-base', 'autocomplete' => 'off']); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-5 mt-4 mt-lg-0">
                    <div>
                        <h3 class="text-lg font-semibold mb-5"><?php echo e(trans('index.InformationLine')); ?></h3>
                        <div class="bg-slate-100 p-10">
                            <div class="your-order-product-info">
                                <ul class="flex flex-wrap items-center justify-between">
                                    <li class="text-base font-semibold"><?php echo e(trans('index.Products')); ?></li>
                                    <li class="text-base font-semibold text-orange"><?php echo e(trans('index.intomoney')); ?></li>
                                </ul>
                                <ul class="border-t border-b  py-5 my-5">
                                    <?php $total = $price_coupon = 0; ?>
                                    <?php if($cartController): ?>
                                    <?php $__currentLoopData = $cartController; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $total += $v['price'] * $v['quantity'];
                                    $slug = !empty($v['slug']) ? $v['slug'] : '';
                                    $title_version = !empty($v['options']['title_version']) ? '<i class="font-medium">(' . $v['options']['title_version'] . ')</i>' : '';
                                    ?>
                                    <li class="flex flex-wrap items-center justify-between">
                                        <span class="w-1/2"><?php echo e($v['title']); ?> <?php echo $title_version ?> X <b class="text-orange"><?php echo e($v['quantity']); ?></b></span>
                                        <span class="w-1/2 text-right text-orange font-semibold"><?php echo e(number_format($v['quantity'] * $v['price'],0,',','.')); ?>₫</span>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </ul>
                                <ul class="flex flex-wrap items-center justify-between ">
                                    <li class="text-base font-semibold"><?php echo e(trans('index.Provisional')); ?></li>
                                    <li class="text-base font-semibold text-orange">
                                        <?php echo e(number_format($total,0,',','.')); ?>₫
                                    </li>
                                </ul>
                                <ul class="flex flex-wrap items-center justify-between ">
                                    <li class="text-base font-semibold"><?php echo e(trans('index.TransportFee')); ?></li>
                                    <li class="js_fee_shipping text-base font-semibold text-orange">
                                    </li>
                                    <input name="title_ship" class="hidden">
                                    <input name="fee_ship" class="hidden">
                                </ul>
                                <?php if (in_array('coupons', $dropdown)) { ?>
                                    <div class="cart-coupon-html">
                                        <?php if(isset($coupon)): ?>
                                        <?php $__currentLoopData = $coupon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $price_coupon += !empty($v['price']) ? $v['price'] : 0; ?>
                                        <ul class="flex flex-wrap items-center justify-between">
                                            <li class="w-1/2 text-base font-semibold"><?php echo e(trans('index.DiscountCode')); ?> <?php echo e($v['name']); ?></li>
                                            <li class="w-1/2 text-base font-semibold text-orange text-right">
                                                <span class="cart-coupon-price">
                                                    - <?php echo e(number_format($v['price'],0,',','.')); ?>₫ <a href="javascript:void(0)" data-id="<?php echo e($v['id']); ?>" class="remove-coupon text-red-600 font-bold">[<?php echo e(trans('index.Delete')); ?>]</a>
                                                </span>
                                            </li>
                                        </ul>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                    <!-- START: mã giảm giá -->
                                    <div class="mt-5">
                                        <h3 class="text-md font-semibold capitalize mb-2"><?php echo e(trans('index.EnterDiscountCode')); ?></h3>
                                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative message-danger mb-2 hidden">
                                            <strong class="font-bold">ERROR!</strong>
                                            <span class="block sm:inline danger-title"></span>
                                        </div>
                                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md message-success mb-2 hidden">
                                            <div class="flex">
                                                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="font-bold success-title"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="relative">
                                            <input id="coupon_code" class="border border-solid border-gray-300 w-full px-2 mb-5 placeholder-current text-dark h-12 focus:outline-none text-base" placeholder="" type="text">
                                            <button type="button" id="apply_coupon" class="absolute top-0 right-0 h-12 inline-block bg-global leading-none py-4 px-2 text-sm text-white transition-all hover:bg-orange uppercase font-semibold hover:text-white"><?php echo e(trans('index.Apply')); ?></button>
                                        </div>
                                    </div>
                                    <!-- END: mã giảm giá -->
                                <?php } ?>

                                <ul class="flex flex-wrap items-center justify-between border-t border-b  py-5 my-5">
                                    <li class="text-base font-semibold"><?php echo e(trans('index.TotalPrice')); ?></li>
                                    <li class="text-base font-semibold text-orange cart-total-final">
                                        <?php echo e(number_format($total-$price_coupon,0,',','.')); ?>₫
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="block w-full text-center leading-none uppercase bg-global text-white text-sm bg-dark px-2 py-5 transition-all hover:bg-orange font-semibold"><?php echo e(trans('index.Order')); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('javascript'); ?>
<script>
    var cityid = '<?php echo $city_id ?>';
    var districtid = '<?php echo $district_id ?>';
    var wardid = '<?php echo $ward_id ?>';
    $.post(BASE_URL_AJAX + 'gio-hang/get-shipping', {
            cityID: cityid,
            districtID: districtid,
            "_token": $('meta[name="csrf-token"]').attr("content")
        },
        function(data) {
            var json = JSON.parse(data);
            $('.list_shipping').html(json.html);
            $('.js_fee_shipping').html(numberWithCommas(json.fee_ship) + '₫');
            $('input[name="fee_ship"]').val(json.fee_ship);
            $('input[name="title_ship"]').val(json.title_ship);
            $('.cart-total-final').html(numberWithCommas(json.totalCart) + '₫');
            $('.js_box_shipping').removeClass('hidden')
        });
</script>
<style>
    .option-input {
        -webkit-appearance: none;
        -moz-appearance: none;
        -ms-appearance: none;
        -o-appearance: none;
        appearance: none;
        position: relative;
        height: 25px;
        width: 25px;
        transition: all 0.15s ease-out 0s;
        background: #cbd1d8;
        border: none;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        margin-right: 0.5rem;
        outline: none;
        position: relative;
        z-index: 1000;
    }

    .option-input:hover {
        background: #9faab7;
    }

    .option-input:checked {
        background: #40e0d0;
    }

    .option-input:checked::before {
        display: flex;
        content: '';
        font-size: 25px;
        font-weight: bold;
        position: absolute;
        align-items: center;
        justify-content: center;
        width: 8px;
        height: 12px;
        border-width: 0 2px 2px 0;
        border-style: solid;
        border-color: #fff;
        transform-origin: bottom left;
        transform: rotate(45deg);
        top: 0px;
        left: 6px;
    }

    .option-input:checked::after {
        -webkit-animation: click-wave 0.65s;
        -moz-animation: click-wave 0.65s;
        animation: click-wave 0.65s;
        background: #40e0d0;
        content: '';
        display: block;
        position: relative;
        z-index: 100;
    }

    .option-input.radio {
        border-radius: 50%;
    }

    .option-input.radio::after {
        border-radius: 50%;
    }

    @keyframes  click-wave {
        0% {
            height: 40px;
            width: 40px;
            opacity: 0.35;
            position: relative;
        }

        100% {
            height: 200px;
            width: 200px;
            margin-left: -80px;
            margin-top: -80px;
            opacity: 0;
        }
    }
</style>
<!-- loading -->
<style>
    .lds-ring {
        width: 80px;
        height: 80px;
        position: fixed;
        z-index: 9999;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .lds-ring div {
        box-sizing: border-box;
        display: block;
        position: absolute;
        width: 64px;
        height: 64px;
        margin: 8px;
        border: 8px solid #000;
        border-radius: 50%;
        animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        border-color: #000 transparent transparent transparent;
    }

    .lds-ring div:nth-child(1) {
        animation-delay: -0.45s;
    }

    .lds-ring div:nth-child(2) {
        animation-delay: -0.3s;
    }

    .lds-ring div:nth-child(3) {
        animation-delay: -0.15s;
    }

    @keyframes  lds-ring {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .lds-show {
        width: 100%;
        height: 100vh;
        float: left;
        position: fixed;
        z-index: 999999999999999999999;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #0000004f;
    }
</style>
<div class="lds-show lds-show-1">
    <div class="lds-ring ">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<script>
    $(document).ajaxStart(function() {
        $('.lds-show-1').removeClass('hidden');
    }).ajaxStop(function() {
        $('.lds-show-1').addClass('hidden');
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/cart/checkout.blade.php ENDPATH**/ ?>