<?php $__env->startSection('content'); ?>
<nav class="px-4 relative w-full flex flex-wrap items-center justify-between py-3 bg-gray-100 text-gray-500 hover:text-gray-700 focus:text-gray-700  navbar navbar-expand-lg navbar-light">
    <div class="container mx-auto w-full flex flex-wrap items-center justify-between">
        <nav class="bg-grey-light w-full" aria-label="breadcrumb">
            <ol class="list-reset flex">
                <li><a href="<?php echo url('') ?>" class="text-gray-500 hover:text-gray-600"><?php echo e(trans('index.home')); ?></a></li>
                <li><span class="text-gray-500 mx-2">/</span></li>
                <li><a href="javascript:void(0)" class="text-gray-500 hover:text-gray-600"><?php echo e($page->title); ?></a></li>
            </ol>
        </nav>
    </div>
</nav>
<div class="py-9 bg-white px-4">
    <div class="container mx-auto">
        <div class="grid grid-cols-12 -mx-4">
            <div class="col-span-12 lg:col-span-3 px-4 order-last mt-8 lg:mt-0">
                <div class="mt-4 lg:mt-0">
                    <div class="bg-slate-100 p-2">
                        <ul class="flex flex-wrap items-center justify-between">
                            <li class="text-base font-semibold"><?php echo e(trans('index.TotalNumberOfProducts')); ?></li>
                            <li class="text-base font-semibold cart-quantity"><?php echo $cart['quantity'] ?>
                            </li>
                        </ul>
                        <?php $price_coupon = 0; ?>

                        <?php $price_coupon += !empty($v['price']) ? $v['price'] : 0; ?>
                        <input type="hidden" name="fee_ship" value="0">

                        <div class="cart-coupon-html">
                            <?php if(isset($coupon)): ?>
                            <?php $__currentLoopData = $coupon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $price_coupon += !empty($v['price']) ? $v['price'] : 0; ?>
                            <table>
                                <tr>
                                    <th><?php echo e(trans('index.DiscountCode')); ?> : <span class="cart-coupon-name"><?php echo e($v['name']); ?></span></th>
                                    <td>-<span class="amount cart-coupon-price"><?php echo number_format($v['price'], 0, ',', '.') . '₫' ?></span>
                                        <a href="javascript:void(0)" data-id="<?php echo e($v['id']); ?>" class="remove-coupon text-global font-bold">[<?php echo e(trans('index.Delete')); ?>]</a>
                                    </td>
                                </tr>
                            </table>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>

                        <div class="border-t  border-white py-5 mt-5">

                            <ul class="flex flex-wrap items-center justify-between">
                                <li class="text-base font-semibold"><?php echo e(trans('index.TotalPrice')); ?></li>
                                <li class="text-base font-semibold text-orange cart-total-final">
                                    <?php echo number_format($cart['total'] - $price_coupon, 0, ',', '.') . '₫' ?>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <?php if (in_array('coupons', $dropdown)) { ?>
                        <!-- START: mã giảm giá -->
                        <div class="mt-3">
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
                                <input id="coupon_code" class="border border-solid border-gray-300 w-full px-5 mb-5 placeholder-current text-dark h-12 focus:outline-none text-base" placeholder="" type="text">
                                <button type="button" id="apply_coupon" class="absolute top-0 right-0 h-12 inline-block bg-global leading-none py-4 px-2 text-sm text-white transition-all hover:bg-orange uppercase font-semibold hover:text-white"><?php echo e(trans('index.Apply')); ?></button>
                            </div>
                        </div>
                    <?php } ?>

                    <!-- END: mã giảm giá -->
                    <div class="mt-3">
                        <a href="<?php echo e(route('cart.checkout')); ?>" class="bg-global w-full text-center inline-block bg-dark leading-none py-4 px-5 md:px-8 text-sm text-white transition-all hover:bg-orange uppercase font-semibold hover:text-white"><?php echo e(trans('index.Pay')); ?></a>
                    </div>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-9 px-4">
                <div class="overflow-x-auto relative">
                    <table class="w-full min-w-max table-aut">
                        <thead>
                            <tr>
                                <th class="bg-slate-100 p-3 border border-solid  text-center font-medium text-sm capitalize">
                                    <?php echo e(trans('index.ImageProduct')); ?>

                                </th>
                                <th class="bg-slate-100 p-3 border border-solid  text-center font-medium text-sm capitalize" style="width:200px">
                                    <?php echo e(trans('index.TitleProduct')); ?>

                                </th>
                                <th class="bg-slate-100 p-3 border border-solid  text-center font-medium text-sm capitalize">
                                    <?php echo e(trans('index.Price')); ?>

                                </th>
                                <th class="bg-slate-100 p-3 border border-solid  text-center font-medium text-sm capitalize">
                                    <?php echo e(trans('index.Amount')); ?>

                                </th>
                                <th class="bg-slate-100 p-3 border border-solid  text-center font-medium text-sm capitalize">
                                    <?php echo e(trans('index.intomoney')); ?>

                                </th>
                                <th class="bg-slate-100 p-3 border border-solid  text-center font-medium text-sm capitalize">
                                    <?php echo e(trans('index.Delete')); ?>

                                </th>
                            </tr>
                        </thead>
                        <tbody class="cart-html-cart">
                            <?php $__currentLoopData = $cartController; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            echo htmlItemCart($k, $item);
                            ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    input[type='number']::-webkit-inner-spin-button,
    input[type='number']::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/cart/index.blade.php ENDPATH**/ ?>