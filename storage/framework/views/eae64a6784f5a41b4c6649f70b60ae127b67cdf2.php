<?php $__env->startSection('content'); ?>
<?php
$listAlbums = json_decode($detail->image_json, true);
$price = getPrice(array('price' => $detail->price, 'price_sale' => $detail->price_sale, 'price_contact' => $detail->price_contact));
if (count($detail->product_versions) > 0) {
    $type = 'variable';
} else {
    $type = 'simple';
}

$version = json_decode(base64_decode($detail['version_json']), true);
$attribute_tmp = [];
$attributesID =  [];
if (!empty($version) && !empty($version[2])) {
    foreach ($version[2] as $item) {
        foreach ($item as $val) {
            $attributesID[] = $val;
        }
    }
    if (!empty($attributesID)) {
        $attribute_tmp = \App\Models\Attribute::whereIn('id', $attributesID)->select('id', 'title', 'catalogueid')->with('catalogue')->get();
    }
}
$attributes = [];
if (!empty($attribute_tmp)) {
    foreach ($attribute_tmp as $item) {
        $attributes[] = array(
            'id' => $item->id,
            'title' => $item->title,
            'titleC' => $item->catalogue->title,
        );
    }
}
$attributes = collect($attributes)->groupBy('titleC')->all();

?>
<input type="hidden" value="<?php echo $detail->id ?>" id="detailProductID">
<nav class="relative w-full flex flex-wrap items-center justify-between py-3 bg-gray-100 text-gray-500 hover:text-gray-700 focus:text-gray-700 navbar navbar-expand-lg navbar-light">
    <div class="container px-4 mx-auto w-full flex items-center justify-between">
        <nav class="bg-grey-light w-full" aria-label="breadcrumb">
            <ol class="list-reset flex flex-wrap">
                <li><a href="<?php echo url('') ?>" class="text-blue font-bold"><?php echo e(trans('index.home')); ?></a></li>
                <?php $__currentLoopData = $breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><span class="text-gray-500 mx-2">/</span></li>
                <li><a href="<?php echo route('routerURL', ['slug' => $v->slug]) ?>" class="text-gray-500 hover:text-gray-600"><?php echo e($v->title); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <li><span class="text-gray-500 mx-2">/</span></li>
                <li><a href="<?php echo route('routerURL', ['slug' => $detail->slug]) ?>" class="text-primary"><?php echo e($detail->title); ?></a></li>
            </ol>
        </nav>
    </div>
</nav>
<main class="py-8">
    <div class=" container mx-auto px-4">
        <section class="grid grid-cols-1 md:grid-cols-2 -mx-[15px] space-y-8 md:space-y-0">

            <div class=" px-[15px]">
                <!-- START: slide images product PC-->
                <div class="overflow-hidden ">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2 mySwiperProduct2 overflow-hidden">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide ">
                                <img src="<?php echo e(asset($detail->image)); ?>" alt="<?php echo e($detail->title); ?>" class="w-full object-cover h-full" />
                            </div>
                            <?php if(!empty($listAlbums)): ?>
                            <?php $__currentLoopData = $listAlbums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide ">
                                <img src="<?php echo e($item); ?>" alt="<?php echo e($detail->title); ?>" class="w-full object-cover h-full" />
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper mySwiperProduct mt-2">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide ">
                                <img src="<?php echo e(asset($detail->image)); ?>" alt="<?php echo e($detail->title); ?>" />
                            </div>
                            <?php if(!empty($listAlbums)): ?>
                            <?php $__currentLoopData = $listAlbums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide ">
                                <img src="<?php echo e($item); ?>" alt="<?php echo e($detail->title); ?>" />
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>

                </div>
                <!-- Swiper JS -->
            </div>
            <div class=" px-[15px]">
                <div class="flex-1 overflow-auto">
                    <div class="flex flex-col space-y-4">
                        <div class="flex flex-col space-y-3">
                            <div class="flex flex-col">
                                <div class="section-subtitle">
                                    <h1 class="font-bold text-2xl pb-2 leading-[1.1]"><?php echo e($detail->title); ?></h1>
                                    <div class="flex items-center">
                                        <span class="mr-3 text-ui">
                                            <?php echo e(trans('index.Code')); ?>: <span class="js_product_code text-d61c1f"><?php echo e(!empty($detail->code)?$detail->code:trans('index.Updating').'...'); ?></span>
                                        </span>
                                        <?php if($brand): ?>
                                        <span class="mr-3 text-ui">
                                            <?php echo e(trans('index.Brands')); ?>: <a href="<?php echo e(route('brandURL',['slug' => $brand->slug])); ?>" class=" text-d61c1f"><?php echo e($brand->title); ?></a>
                                        </span>
                                        <?php endif; ?>
                                        <div class="flex items-center space-x-4">
                                            <div class="flex items-center space-x-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                                <a href="javascript:void(0)" class="text-blue-400 cursor-pointer scrollCmt">
                                                    <?php echo e($comment_view['totalComment']); ?> <?php echo e(trans('index.Comment')); ?>

                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="mt-1 flex items-center">
                                    <span class="text-red-600 text-2xl font-extrabold js_product_price_final">
                                        <?php echo e($price['price_final']); ?>

                                    </span>
                                    <div class="ml-2">
                                        <span class="line-through text-lg js_product_price_old">
                                            <?php echo e($price['price_old']); ?>

                                        </span>

                                        <span class="text-2xl text-red-600 ml-1 js_product_percent">
                                            <?php if(!empty($price['percent'])): ?>
                                            -<?php echo e($price['percent']); ?>

                                            <?php endif; ?>
                                        </span>

                                    </div>
                                </div>
                            </div>
                            <?php if($detail->description): ?>
                            <div class="bg-red-50 rounded-lg px-4 py-3">
                                <?php echo $detail->description ?>
                            </div>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="mt-3">
                        <!--START: product version -->
                        <?php if ($type == 'variable' && !empty($attributes)) { ?>
                            <?php $i = 0;
                            foreach ($attributes as $key => $item) {
                                $i++;
                            ?>
                                <?php if (count($item) > 0) { ?>
                                    <div class="box-variable mb-3">
                                        <div class="font-bold text-base mb-1"><?php echo e($key); ?></div>
                                        <div class="flex flex-wrap space-x-2">
                                            <?php foreach ($item as $k => $val) { ?>
                                                <a href="javascript:void(0)" class="js_item_variable js_item_variable_<?php echo e($val['id']); ?> py-1 px-5 border 
                                                <?php if ($k == 0) { ?>checked<?php } ?> " data-id="<?php echo e($val['id']); ?>" data-stt="<?php echo !empty($i == count($attributes)) ? 1 : 0 ?>">
                                                    <?php echo e($val['title']); ?>

                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php
                            } ?>
                        <?php } ?>
                        <?php if ($type == 'simple') { ?>
                            <?php
                            $hiddenAddToCart = 0;
                            $product_stock_title = '';
                            $quantityStock = '';
                            if ($detail->inventory == 1) {
                                if ($detail->inventoryPolicy == 0) {
                                    if ($detail->inventoryQuantity == 0) {
                                        $hiddenAddToCart = 1;
                                        $product_stock_title =  '<span class="product_stock">' . trans('index.OutOfStock') . '</span>';
                                    } else {
                                        $quantityStock = $detail->inventoryQuantity;
                                        $product_stock_title = '<span class="product_stock">' . $detail->inventoryQuantity . '</span> ' . trans('index.InOfStock');
                                    }
                                } else {
                                    $product_stock_title = '<span class="product_stock"></span> ' . trans('index.InOfStock');
                                }
                            } else {
                                $product_stock_title = '<span class="product_stock"></span> ' . trans('index.InOfStock');
                            }
                            ?>
                        <?php } ?>
                        <!--END: product version -->
                    </div>
                    <div class="product-details w-full py-4 ">
                        <div class="font-black mb-2"><?php echo e(trans('index.Amount')); ?></div>
                        <div class="flex items-center">
                            <div class="custom-number-input h-10 w-32 flex flex-row rounded-lg relative bg-transparent mt-1">
                                <button class="card-dec bg-gray-200 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none flex items-center justify-center">
                                    <span class="m-auto text-2xl font-thin">−</span>
                                </button>
                                <input type="number" max="<?php echo e(!empty($quantityStock)?$quantityStock:''); ?>" class="card-quantity outline-none focus:outline-none text-center w-full bg-gray-100 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="custom-input-number" value="1"></input>
                                <button class="card-inc bg-gray-200 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer flex items-center justify-center">
                                    <span class="m-auto text-2xl font-thin">+</span>
                                </button>
                            </div>
                            <div class="ml-2 text-red-600 font-bold">
                                <?php if($type == 'simple'): ?>
                                <?php
                                echo $product_stock_title;
                                ?>
                                <?php else: ?>
                                <span class="js_product_stock"><?php echo e(trans('index.InOfStock')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="mt-5 flex items-center w-full space-x-2">
                            <button data-quantity="1" data-id="<?php echo e($detail->id); ?>" data-title="<?php echo e($detail->title); ?>" data-price="<?php echo !empty($price['price_final_none_format']) ? $price['price_final_none_format'] : 0 ?>" data-cart="0" data-src="" data-type="<?php echo e($type); ?>" class="addtocart uppercase font-black h-12 w-1/2 text-white bg-red-600 flex-1 cursor-pointer items-center inline-flex rounded-md px-6 justify-center">
                                <?php echo e(trans('index.AddToCart')); ?>

                            </button>
                            <button data-quantity="1" data-id="<?php echo e($detail->id); ?>" data-title="<?php echo e($detail->title); ?>" data-price="<?php echo !empty($price['price_final_none_format']) ? $price['price_final_none_format'] : 0 ?>" data-cart="1" data-src="" data-type="<?php echo e($type); ?>" class="addtocart uppercase font-black h-12 w-1/2 text-white bg-black flex-1 cursor-pointer items-center inline-flex rounded-md px-6 justify-center">
                                <?php echo e(trans('index.BuyNow')); ?>

                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                .svg-bg {
                    filter: drop-shadow(rgba(0, 0, 0, 0.15) 0px 1px 3px);
                    width: 100%;
                    height: 104px;
                }
            </style>
        </section>
        <section class="mt-8">
            <div class="grid grid-cols-1 md:grid-cols-12 md:gap-8 space-y-8 md:space-y-0">
                <div class="col-span-1 md:col-span-8 section-description">
                    <div class="flex flex-wrap items-center space-x-5">
                        <h3 class="changeActiveTab uppercase font-medium cursor-pointer  tab-1 py-2 mb-2 inline-block active" onclick="changeActiveTab(event,'tab-1')"><?php echo e(trans('index.ProductInformation')); ?></h3>
                    </div>
                    <div class="content-detail-product mt-2 relative overflow-hidden tab-content">
                        <div class="space-y-2 tab box_content" id="tab-1">
                            <?php echo $detail->content ?>
                        </div>
                    </div>
                    <!-- START: đánh giá sản phẩm -->
                    <?php echo $__env->make('product.frontend.product.comment.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!-- END: đánh giá sản phẩm -->
                </div>
                <div class="col-span-1 md:col-span-4">
                    <?php echo $__env->make('article.frontend.aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>
            </div>
        </section>
        <section class="mt-8">
            <h2 class="font-bold text-2xl mb-5"><?php echo e(trans('index.RelatedProducts')); ?></h2>
            <div class="grid grid-cols-2 md:grid-cols-3 -mx-[15px]">
                <?php $__currentLoopData = $productSame; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="px-[15px]">
                    <?php echo htmlItemProduct($k, $item, 'category'); ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<link rel="stylesheet" href="<?php echo e(asset('frontend/library/css/products.css')); ?>" />

<?php $__env->stopPush(); ?>
<?php $__env->startPush('javascript'); ?>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="<?php echo e(asset('frontend/library/js/common.js')); ?>"></script>
<script>
    var swiper = new Swiper(".mySwiperProduct", {
        loop: false,
        spaceBetween: 15,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    var swiper2 = new Swiper(".mySwiperProduct2", {
        loop: false,
        spaceBetween: 5,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });
</script>
<style>
    .mySwiperProduct .swiper-button-next:after,
    .mySwiperProduct .swiper-button-prev:after {
        font-size: 25px;
    }

    .content-detail-product img {
        height: auto !important;
        max-width: 100% !important;
    }

    .content-detail-product p {
        margin-bottom: 10px;
    }

    .content-detail-product ul {
        list-style: disc;
        padding-left: 20px;
    }

    .content-detail-product h2 {
        font-size: 18px;
    }

    .content-detail-product h3 {
        font-size: 17px;
    }

    .content-detail-product h4 {
        font-size: 16px;
    }

    .content-detail-product h5 {
        font-size: 15px;
    }
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/product/frontend/product/index.blade.php ENDPATH**/ ?>