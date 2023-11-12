
<?php $__env->startSection('content'); ?>
<?php $cart = json_decode($detail->cart, TRUE); ?>
<?php $coupon = json_decode($detail->coupon, TRUE); ?>
<nav class="relative w-full flex flex-wrap items-center justify-between py-2 bg-[#f9f9f9] text-gray-500 hover:text-gray-700 focus:text-gray-700 navbar navbar-expand-lg navbar-light">
    <div class="container px-4 mx-auto w-full flex flex-wrap items-center justify-between">
        <nav class="bg-grey-light w-full" aria-label="breadcrumb">
            <ol class="list-reset flex">
                <li><a href="<?php echo url('') ?>" class="text-gray-500 hover:text-gray-600 text-f13"><?php echo e(trans('index.home')); ?></a></li>
                <li><span class="text-gray-500 mx-2">/</span></li>
                <li><a href="<?php echo e(route('customer.orders')); ?>" class="text-gray-500 hover:text-gray-600 text-f13"><?php echo e(trans('index.PurchaseHistory')); ?></a></li>
                <li><span class="text-gray-500 mx-2">/</span></li>
                <li><a href="javascript:void(0)" class="text-gray-500 hover:text-gray-600 text-f13"><?php echo e(trans('index.OrderDetails')); ?> #<?php echo e($detail->code); ?></a></li>
            </ol>
        </nav>
    </div>
</nav>
<div class="bg-amber-500 bg-sky-500 bg-green-500 bg-red-500 bg-orange-600"></div>
<main class="py-[30px]">
    <div class="container px-4 mx-auto">
        <div class="mt-4 flex flex-col md:flex-row items-start md:space-x-4">
            <?php echo $__env->make('customer/frontend/auth/common/sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="flex-1 w-full md:w-auto order-1 md:order-1">
                <div class="overflow-x-hidden shadowC rounded-xl p-6 space-y-4">
                    <div class="flex bg-white md:items-center flex-col md:flex-row justify-between space-y-2 md:space-y-0">
                        <div>
                            <h1 class="text-black font-bold text-xl"><?php echo e(trans('index.OrderDetails')); ?></h1>
                            <div class="text-sm"><?php echo e(trans('index.BookingDate')); ?>: <?php echo e($detail->created_at); ?></div>
                        </div>
                        <!-- Slider main container -->
                        <div>
                            <div class="flex items-center space-x-1 flex-wrap">
                                <?php echo e(trans('index.ProductCode')); ?>: <b>#<?php echo e($detail->code); ?></b> |
                                <span class="text-white font-bold rounded-xl p-1 text-xs <?php echo config('cart.class')[$detail->status] ?>"><?php echo e(config('cart.status')[$detail->status]); ?></span>
                                <?php /*@if(!empty($detail->order_returns->status) == 1)
                                <span class="text-white font-bold rounded-xl p-1 text-xs bg-green-500">
                                    #{{trans('index.SuccessApproved')}}
                                </span>
                                @else
                                <span class="text-white font-bold rounded-xl p-1 text-xs bg-red-500">
                                    #{{trans('index.PendingApproved')}}
                                </span>
                                @endif*/ ?>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <b class="text-sm uppercase"><?php echo e(trans('index.ShipmentDetails')); ?></b>
                                <div class="text-sm mt-2">
                                    <p><?php echo e($detail->fullname); ?></p>
                                    <p><?php echo e($detail->address); ?> - <?php echo e($detail->ward_name->name); ?> - <?php echo e($detail->district_name->name); ?> - <?php echo e($detail->city_name->name); ?></p>
                                    <p><?php echo e(trans('index.Phone')); ?> : <?php echo e($detail->phone); ?></p>
                                </div>
                            </div>
                            <div>
                                <b class="text-sm uppercase"><?php echo e(trans('index.DeliveryMethod')); ?></b>
                                <div class="text-sm mt-2">
                                    <?php echo e($detail['title_ship']); ?>

                                </div>
                            </div>
                            <div>
                                <b class="text-sm uppercase"><?php echo e(trans('index.PaymentMethods')); ?></b>
                                <div class="text-sm mt-2">
                                    <?php echo e(config('cart.payment')[$detail->payment]); ?>

                                </div>
                            </div>
                            <?php if($detail->note): ?>
                            <div class="md:col-span-3">
                                <b class="text-sm uppercase"><?php echo e(trans('index.Note')); ?></b>
                                <div class="text-sm mt-2">
                                    <?php echo e($detail->note); ?>

                                </div>
                            </div>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="mt-5">
                        <h1 class="text-black font-bold text-xl"><?php echo e(trans('index.Products')); ?></h1>
                        <div class="overflow-x-auto relative mt-2">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6 uppercase">
                                            <?php echo e(trans('index.TitleProduct')); ?>

                                        </th>
                                        <th scope="col" class="py-3 px-6 uppercase">
                                            <?php echo e(trans('index.Price')); ?>

                                        </th>
                                        <th scope="col" class="py-3 px-6 text-center uppercase">
                                            <?php echo e(trans('index.Amount')); ?>

                                        </th>
                                        <th scope="col" class="py-3 px-6 text-center uppercase">
                                            <?php echo e(trans('index.Provisional')); ?>

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0 ?>
                                    <?php if($cart): ?>
                                    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $total += $v['price'] * $v['quantity'];
                                    $slug = !empty($v['slug']) ? $v['slug'] : '';
                                    $options = !empty($v['options']['title_version']) ? $v['options']['title_version'] : '';
                                    ?>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="py-4 px-2 text-gray-900 whitespace-nowrap dark:text-white ">
                                            <?php echo e($v['title']); ?><br>
                                            <?php if($options): ?>
                                            Phân loại: <?php echo e($options); ?>

                                            <?php endif; ?>
                                        </th>
                                        <td class="py-4 px-2">
                                            <?php echo e(number_format($v['price'],0,',','.')); ?>₫
                                        </td>
                                        <td class="py-4 px-2 text-center">
                                            <?php echo e($v['quantity']); ?>

                                        </td>
                                        <td class="py-4 px-2 text-center">
                                            <?php echo e(number_format($v['price']*$v['quantity'],0,',','.')); ?>₫
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr class="">
                                        <th colspan="3" class="p-2 text-right text-base">
                                            <?php echo e(trans('index.Provisional')); ?>

                                        </th>
                                        <td class="p-2">
                                            <span class="price"><?php echo e(number_format($detail->total_price,0,',','.')); ?>₫</span>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <th colspan="3" class="p-2 text-right text-base">
                                            <?php echo e(trans('index.TransportFee')); ?>

                                        </th>
                                        <td class="p-2">
                                            <span class="price"><?php echo e(number_format($detail['fee_ship'],0,',','.')); ?>₫</span>
                                        </td>
                                    </tr>
                                    <?php if(isset($coupon)): ?>
                                    <?php $__currentLoopData = $coupon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="">
                                        <th colspan="3" class="p-2 text-right text-base">
                                            <?php echo e(trans('index.DiscountCode')); ?><span class="font-semibold text-danger">(<?php echo e($v['name']); ?>)</span>
                                        </th>
                                        <td class="p-2">
                                            <span class="price">-<?php echo e(number_format($v['price'],0,',','.')); ?>₫</span>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <tr class="">
                                        <th colspan="3" class="p-2 text-right text-base">
                                            <strong><?php echo e(trans('index.TotalPrice')); ?></strong>
                                        </th>
                                        <td class="p-2">
                                            <strong><span class="text-red-500 font-bold text-2xl"><?php echo e(number_format($detail->total_price-$detail->total_price_coupon+$detail->fee_ship,0,',','.')); ?>₫</span></strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                    <?php /*<div class="mt-3 flex space-x-2 justify-between md:justify-end hidden">
                        <a href="{{route('customer.copyOrder',['id' => $detail->id])}}" class="float-right font-bold h-9 leading-9  text-white bg-global cursor-pointer items-center rounded-md px-10 text-[16px]">{{trans('index.Repurchase')}}</a>
                    </div>*/ ?>

                </div>
            </div>
        </div>
    </div>
</main>
<script>
    var aurl = window.location.href; // Get the absolute url
    $('.menu_order').filter(function() {
        return $(this).prop('href') === aurl;
    }).addClass('active');
    $(".menu_item_auth:eq(2)").addClass('active');
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/customer/frontend/manager/order/detail.blade.php ENDPATH**/ ?>