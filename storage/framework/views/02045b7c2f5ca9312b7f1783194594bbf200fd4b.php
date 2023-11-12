<?php

$menu_header = getMenus('menu-header');

$recently_viewed = Session::get('products.recently_viewed');

if (!empty($recently_viewed)) {

    $recentlyProduct = \App\Models\Product::select('id', 'title', 'slug', 'price', 'price_sale', 'price_contact', 'image')

        ->where(['alanguage' => config('app.locale'), 'publish' => 0])

        ->whereIn('id', $recently_viewed)

        ->orderBy('order', 'asc')

        ->orderBy('id', 'desc')

        ->with('getTags')

        ->get();

}

?>

<?php if(svl_ismobile() == 'is desktop'): ?>

<header>

    <div class="bg-primary py-[10px]">

        <div class="container">

            <div class="flex justify-between">

                <div class="">

                    <ul class="flex space-x-6">

                        <li>

                            <a href="tel:<?php echo e($fcSystem['contact_hotline']); ?>" class="flex space-x-2 text-white">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">

                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />

                                </svg>

                                <span>

                                    <?php echo e($fcSystem['contact_hotline']); ?>


                                </span>

                            </a>

                        </li>

                        <li>

                            <a href="mailto:<?php echo e($fcSystem['contact_email']); ?>" class="flex space-x-2 text-white">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">

                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />

                                </svg>

                                <span>

                                    <?php echo e($fcSystem['contact_email']); ?>


                                </span>

                            </a>

                        </li>

                        <li class="hidden">

                            <a href="javascript:void(0)" class="flex space-x-2 text-white">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">

                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />

                                </svg>

                                <span>

                                    <?php echo e($fcSystem['contact_address']); ?>


                                </span>

                            </a>

                        </li>

                    </ul>



                </div>

                <div class="flex justify-end">

                    <ul class="flex space-x-4">

                        <?php if(!empty(Auth::guard('customer')->user())): ?>

                        <li><a href="<?php echo e(route('customer.dashboard')); ?>" class="uppercase text-white text-f13"><?php echo e(Auth::guard('customer')->user()->name); ?></a></li>

                        <?php else: ?>

                        <li><a href="<?php echo e(route('customer.login')); ?>" class="uppercase text-white text-f13">đăng nhập</a></li>

                        <li><a href="<?php echo e(route('customer.register')); ?>" class="uppercase text-white text-f13">đăng ký</a></li>

                        <?php endif; ?>

                        <li><a href="javascript:void(0)" class="relative tp-cart uppercase text-white text-f13">GIỎ HÀNG (<span class="cart-quantity"><?php echo e($cart['quantity']); ?></span>)</a></li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

    <div class="container py-5">

        <div class="flex items-center space-x-10">

            <div class="w-[200px]">

                <a href="<?php echo e(url('/')); ?>" class="logo-wrapper" title="<?php echo e($fcSystem['homepage_company']); ?>">

                    <img src="<?php echo e(asset($fcSystem['homepage_logo'])); ?>" alt="<?php echo e($fcSystem['homepage_company']); ?>" class="h-[70px]">

                </a>

            </div>

            <div class="flex-grow">

                <form method="GET" action="<?php echo e(route('homepage.search')); ?>" class="relative">

                    <input placeholder="Tìm kiếm sản phẩm..." class="search-auto-custom text-lg py-[9px] pl-[10px] pr-5 border rounded-full w-full outline-none focus:outline-none hover:outline-none" name="keyword">

                    <button class="absolute top-1/2 right-0 -translate-y-1/2 w-[50px]">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">

                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />

                        </svg>

                    </button>

                </form>

            </div>

            <div>

                <div class="header-support border-2 border-second px-[25px] h-[45px] relative text-second text-center rounded-l-[45px] rounded-r-none leading-5">

                    <p>Tư vấn bán hàng</p>

                    <span class="font-bold">Gọi ngay <?php echo e($fcSystem['contact_hotline']); ?></span>

                    <span class="h-[45px] w-[45px] rounded-full bg-second absolute right-[-25px] -top-[2px]"></span>

                </div>

            </div>



        </div>



    </div>

    <div class="bg-primary py-[10px]">

        <div class="container">

            <ul class="flex items-center justify-between menu-header static">

                <?php if($menu_header && count($menu_header->menu_items) > 0): ?>

                <?php $__currentLoopData = $menu_header->menu_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <li class=" relative">

                    <a href="<?php echo e(url($item->slug)); ?>" class="text-white text-lg px-5 flex items-center space-x-1">

                        <span>

                            <?php echo e($item->title); ?>


                        </span>

                        <?php if(count($item->children) > 0): ?>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">

                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />

                        </svg>

                        <?php endif; ?>

                    </a>

                    <?php if(count($item->children) > 0): ?>

                    <div class="absolute top-full left-0 bg-white p-[10px] w-[300px] shadow menu-header-child z-[999999]">

                        <ul class="">

                            <?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <li class="border-b border-dashed border-primary w-full float-left"><a href="<?php echo e(url($child->slug)); ?>" class="py-2 w-full hover:text-primary float-left"><?php echo e($child->title); ?></a></li>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>

                    </div>

                    <?php endif; ?>

                </li>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>

            </ul>



        </div>



    </div>



</header>

<?php else: ?>

<header class="relative">

    <div class="bg-primary flex justify-between py-[10px] px-4">

        <ul class="flex space-x-4">

            <?php if(!empty(Auth::guard('customer')->user())): ?>

            <li><a href="<?php echo e(route('customer.dashboard')); ?>" class="uppercase text-white text-f13"><?php echo e(Auth::guard('customer')->user()->name); ?></a></li>

            <?php else: ?>

            <li><a href="<?php echo e(route('customer.login')); ?>" class="uppercase text-white text-f13">đăng nhập</a></li>

            <li><a href="<?php echo e(route('customer.register')); ?>" class="uppercase text-white text-f13">đăng ký</a></li>

            <?php endif; ?>

        </ul>

        <ul class="flex space-x-4">

            <li><a href="javascript:void(0)" class="relative tp-cart uppercase text-white text-f13">GIỎ HÀNG (<span class="cart-quantity"><?php echo e($cart['quantity']); ?></span>)</a></li>

        </ul>

    </div>

    <div class="container px-4 mx-auto py-[10px]">

        <div class="flex justify-between items-center">

            <a href="<?php echo e(url('/')); ?>" class="logo-wrapper" title="<?php echo e($fcSystem['homepage_company']); ?>">

                <img src="<?php echo e(asset($fcSystem['homepage_logo'])); ?>" alt="<?php echo e($fcSystem['homepage_company']); ?>" class="h-[70px]">

            </a>

            <div class="flex space-x-3 md:space-x-5 items-center">

                <!-- begin mobile -->

                <div class="wrapper cf block lg:hidden">

                    <nav id="main-nav">

                        <style>

                            #main-nav {

                                display: none;

                            }

                        </style>

                        <ul class="second-nav">

                            <?php if($menu_header && count($menu_header->menu_items) > 0): ?>

                            <?php $__currentLoopData = $menu_header->menu_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <li class="menu-item">

                                <a href="<?php echo e(url($item->slug)); ?>"><?php echo e($item->title); ?></a>

                                <?php if(count($item->children) > 0): ?>

                                <ul>

                                    <?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li>

                                        <a href="<?php echo e(url($child->slug)); ?>"><?php echo e($child->title); ?></a>

                                        <?php if(count($child->children) > 0): ?>

                                        <ul>

                                            <?php $__currentLoopData = $child->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <li>

                                                <a href="<?php echo e(url($c->slug)); ?>"><?php echo e($c->title); ?></a>

                                            </li>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </ul>

                                        <?php endif; ?>

                                    </li>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>

                                <?php endif; ?>

                            </li>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php endif; ?>

                        </ul>

                    </nav>

                    <a class="toggle w-10 h-10 md:w-50px md:h-50px">

                        <span></span>

                    </a>

                </div>

                <!-- end mobile -->

                <div class="flex items-center justify-end space-x-3 md:space-x-5">

                    <a href="javascript:void(0)" class="js-header-search" aria-label="Tìm kiếm" title="Tìm kiếm">

                        <svg class="w-6 h-6 text-black" viewBox="0 0 21 21">

                            <g transform="translate(1 1)" stroke="currentColor" stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="square">

                                <path d="M18 18l-5.7096-5.7096"></path>

                                <circle cx="7.2" cy="7.2" r="7.2"></circle>

                            </g>

                        </svg>

                    </a>

                    <a href="javascript:void(0)" class="relative tp-cart" aria-label="Xem giỏ hàng" title="Giỏ hàng">

                        <svg viewBox="0 0 19 23" class="w-6 h-6 text-black">

                            <path d="M0 22.985V5.995L2 6v.03l17-.014v16.968H0zm17-15H2v13h15v-13zm-5-2.882c0-2.04-.493-3.203-2.5-3.203-2 0-2.5 1.164-2.5 3.203v.912H5V4.647C5 1.19 7.274 0 9.5 0 11.517 0 14 1.354 14 4.647v1.368h-2v-.912z" fill="#000"></path>

                        </svg>

                        <span class="text-white absolute top-[-14px] right-[-14px] w-5 h-5 border border-second rounded-full flex items-center justify-center leading-5 bg-second">0</span>

                    </a>

                </div>

            </div>

        </div>



    </div>

</header>



<?php endif; ?><?php /**PATH /home/rosta0607/domains/quyenit.com/public_html/resources/views/homepage/common/header.blade.php ENDPATH**/ ?>