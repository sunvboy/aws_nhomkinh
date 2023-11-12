<?php
$list_images_cmt = [];
foreach ($comment_view['listComment'] as $v) {
    if (!empty($v->images)) {
        $tmp_images_cmt = json_decode($v->images, TRUE);
        if (!empty($tmp_images_cmt)) {
            foreach ($tmp_images_cmt as $v) {
                $list_images_cmt[] = $v;
            }
        }
    }
}
?>
<?php

$arrayRate5 = $arrayRate4 = $arrayRate3 = $arrayRate2 = $arrayRate1 = 0;
$arrayRate5PT = $arrayRate4PT = $arrayRate3PT = $arrayRate2PT = $arrayRate1PT = 0;
if (isset($comment_view) && is_array($comment_view) && count($comment_view)) {
    $averagePoint = round($comment_view['averagePoint']);
    $totalComment = $comment_view['totalComment'];
    $arrayRate5 = $comment_view['arrayRate'][5];
    if ($arrayRate5 > 0) {
        $arrayRate5PT = ($arrayRate5 / $totalComment) * 100;
    }
    $arrayRate4 = $comment_view['arrayRate'][4];
    if ($arrayRate4 > 0) {
        $arrayRate4PT = ($arrayRate4 / $totalComment) * 100;
    }
    $arrayRate3 = $comment_view['arrayRate'][3];
    if ($arrayRate3 > 0) {
        $arrayRate3PT = ($arrayRate3 / $totalComment) * 100;
    }
    $arrayRate2 = $comment_view['arrayRate'][2];
    if ($arrayRate2 > 0) {
        $arrayRate2PT = ($arrayRate2 / $totalComment) * 100;
    }
    $arrayRate1 = $comment_view['arrayRate'][1];
    if ($arrayRate1 > 0) {
        $arrayRate1PT = ($arrayRate1 / $totalComment) * 100;
    }
}
?>
<div id="section-rating-comment" class="flex flex-col mt-6  bg-white rounded-lg">
    <div class="flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd" />
        </svg>
        <h3 class="ml-2 text-[19px] font-bold"><a href="javascript:void(0)">Đánh giá &amp; nhận xét</a></h3>
    </div>

    <div class="grid grid-cols-12">
        <div class="col-span-12 md:col-span-5">
            <div class="flex items-center space-x-2">
                <div class="text-5xl font-bold whitespace-nowrap"><?php echo e($comment_view['averagePoint']); ?></div>
                <div class="text-sm">
                    <div class="relative flex averagePoint">
                        <input type="hidden" class="rating-disabled" value="<?php echo e($comment_view['averagePoint']); ?>" disabled="disabled" />
                    </div>
                    <div>
                        <?php echo e($comment_view['totalComment']); ?> nhận xét
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <div class="flex items-center mx-1">
                    <div class="flex">
                        <input type="hidden" class="rating-disabled" value="5" disabled="disabled" />
                    </div>
                    <div class="w-[138px] h-[6px] relative mx-2 rounded-2xl bg-slate-200">
                        <div class="bg-slate-500 absolute top-0 left-0 rounded-2xl h-[6px]" style="width: <?php echo $arrayRate5PT ?>%;">
                        </div>
                    </div>
                    <div class="text-sm"><?php echo $arrayRate5 ?></div>
                </div>
                <div class="flex items-center mx-1">
                    <div class="flex">
                        <input type="hidden" class="rating-disabled" value="4" disabled="disabled" />
                    </div>
                    <div class="w-[138px] h-[6px] relative mx-2 rounded-2xl bg-slate-200">
                        <div class=" bg-slate-500 absolute top-0 left-0 rounded-2xl h-[6px]" style="width: <?php echo $arrayRate4PT ?>%;">
                        </div>
                    </div>
                    <div class="text-sm"><?php echo $arrayRate4 ?></div>

                </div>
                <div class="flex items-center mx-1">
                    <div class="flex">
                        <input type="hidden" class="rating-disabled" value="3" disabled="disabled" />
                    </div>
                    <div class="w-[138px] h-[6px] relative mx-2 rounded-2xl bg-slate-200">

                        <div class=" bg-slate-500 absolute top-0 left-0 rounded-2xl h-[6px]" style="width: <?php echo $arrayRate3PT ?>%;">
                        </div>

                    </div>
                    <div class="text-sm"><?php echo $arrayRate3 ?></div>

                </div>
                <div class="flex items-center mx-1">
                    <div class="flex">
                        <input type="hidden" class="rating-disabled" value="2" disabled="disabled" />

                    </div>
                    <div class="w-[138px] h-[6px] relative mx-2 rounded-2xl bg-slate-200">

                        <div class=" bg-slate-500 absolute top-0 left-0 rounded-2xl h-[6px]" style="width: <?php echo $arrayRate2PT ?>%;">
                        </div>

                    </div>
                    <div class="text-sm"><?php echo $arrayRate2 ?></div>

                </div>
                <div class="flex items-center mx-1">
                    <div class="flex">

                        <input type="hidden" class="rating-disabled" value="1" disabled="disabled" />

                    </div>
                    <div class="w-[138px] h-[6px] relative mx-2 rounded-2xl bg-slate-200">

                        <div class=" bg-slate-500 absolute top-0 left-0 rounded-2xl h-[6px]" style="width: <?php echo $arrayRate1PT ?>%;">
                        </div>

                    </div>
                    <div class="text-sm"><?php echo $arrayRate1 ?></div>

                </div>
            </div>
        </div>

        <div class="col-span-12 md:col-span-7 mt-5 md:mt-0">

            <?php if(empty($comment_view['totalComment'])): ?>
            <div class="flex flex-col items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-11 w-11 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd" />
                </svg>
                <span class="block text-[19px] font-bold">Chưa có đánh giá &amp; nhận xét</span>
                <span class="block text-[14px]">
                    Nên mua hay không? Hãy giúp anh em bạn nhé
                </span>
            </div>
            <?php endif; ?>
            <?php if(!empty($list_images_cmt)): ?>
            <div class="">
                <h2 class="text-lg font-medium mb-2">Tất cả hình
                    ảnh(<?php echo !empty($list_images_cmt) ? count($list_images_cmt) : 0 ?>)</h2>
                <div class="flex flex-wrap md:flex-nowrap">
                    <?php $__currentLoopData = $list_images_cmt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kimage=>$image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($kimage <= 3): ?> <div class="w-[120px] h-[60px] object-cover mr-4 cursor-pointer border border-slate-100 mb-2 review_images_item">
                        <div class="w-full h-full rounded bg-cover" style="background-image: url(<?php echo $image ?>);">
                        </div>
                </div>
                <?php endif; ?>
                <?php if($kimage == 4): ?>
                <div class="w-[120px] h-[60px] object-cover cursor-pointer bg-cover relative rounded review_images_item" style="background-image: url(<?php echo $image ?>);">
                    <?php if(count($list_images_cmt) > 5): ?>
                    <span class="absolute rounded top-1/2 left-1/2 w-full text-center text-white h-full font-bold" style="transform: translate(-50%,-50%);background-color: rgba(36, 36, 36, 0.7);    line-height: 60px;">+<?php echo count($list_images_cmt) - 5 ?>
                    </span>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>
        <button onclick="modalHandler(true)" class="mt-4 flex items-center justify-center bg-red-600 h-12 rounded-md px-6 text-white font-semibold w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
            </svg>
            Đánh giá
        </button>
    </div>
</div>

<?php if(!empty($list_images_cmt)): ?>
<!-- START: filter comment -->
<div class="col-span-12 mt-5">
    <div class="flex items-center">
        <div class="flex-shrink-0 mr-4 font-normal ">Lọc xem theo</div>
        <div class="flex flex-wrap flex-grow space-x-2">
            <div class="filter_item mb-2 md:mb-0">
                <div data-sort="id" class="filter_text flex items-center">
                    <span class="filter_check "><img src="<?php echo e(url('images/check.png')); ?>"></span>
                    <span>Mới nhất</span>
                </div>
            </div>
            <div class="filter_item mb-2 md:mb-0">
                <div data-sort="gallery" class="filter_text flex items-center">
                    <span class="filter_check "><img src="<?php echo e(url('images/check.png')); ?>"></span>
                    <span>Có hình ảnh</span>
                </div>
            </div>
            <?php /*<div class="filter_item mb-2 md:mb-0">
                    <span class="filter_check "><img src="{{url('images/check.png')}}"></span>
                    <span data-sort="payment" class="filter_text">Đã mua hàng</span>
                </div>*/ ?>
            <?php for ($i = 1; $i <= 5; $i++) { ?>
                <div class="filter_item mb-2 md:mb-0">
                    <div data-sort="<?php echo e($i); ?>" class="filter_text flex items-center">
                        <span class="filter_check "><img src="<?php echo e(asset('images/check.png')); ?>"></span>
                        <span><?php echo e($i); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="ml-1">
                            <path d="M10 2.5L12.1832 7.34711L17.5 7.91118L13.5325 11.4709L14.6353 16.6667L10 14.0196L5.36474 16.6667L6.4675 11.4709L2.5 7.91118L7.81679 7.34711L10 2.5Z" stroke="#FFD52E" fill="#FFD52E"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99996 1.66675L12.4257 7.09013L18.3333 7.72127L13.925 11.7042L15.1502 17.5177L9.99996 14.5559L4.84968 17.5177L6.07496 11.7042L1.66663 7.72127L7.57418 7.09013L9.99996 1.66675ZM9.99996 3.57863L8.10348 7.81865L3.48494 8.31207L6.93138 11.426L5.97345 15.9709L9.99996 13.6554L14.0265 15.9709L13.0685 11.426L16.515 8.31207L11.8964 7.81865L9.99996 3.57863Z" fill="#FFD52E"></path>
                        </svg>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- END: filter comment -->
<?php endif; ?>
<!-- START: comment item -->
<div class="col-span-12 mt-7">
    <div id="getListComment">
        <?php echo $__env->make('product.frontend.product.comment.data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

</div>
<!-- END: comment item -->
<div class="py-12 transition duration-150 ease-in-out z-10 fixed top-0 right-0 bottom-0 left-0 " id="modal" style="background:#0000007a;display: none">
    <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
        <div class="relative py-8 px-5  bg-white shadow-md rounded border border-gray-400">

            <h2 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4"><?php echo e($detail->title); ?></h2>
            <div class="modal-body relative pt-[15px] border-t border-[#e5e5e5]">
                <form id="form-comment">
                    <div class="write-review__heading text-lg leading-6 font-medium text-center mb-3">Vui lòng đánh giá</div>
                    <div class="write-review__stars text-center">
                        <input type="hidden" class="rating-disabled" value="5" name="rating" />
                        <input type="hidden" value="" name="images">
                    </div>
                    <div class="write-review__info flex-1 flex items-end justify-between mt-3">
                        <input value="" type="text" name="fullname" placeholder="Họ và tên" class="form-control" required>
                        <input value="" type="text" name="phone" placeholder="Số điện thoại" class="form-control">
                    </div>
                    <textarea rows="8" placeholder="Chia sẻ thêm thông tin sản phẩm" class="write-review__input" name="message" required></textarea>
                    <div class="error_comment">
                        <div class="alert-success bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mb-5" style="display: none" role="alert">
                            <div class="flex items-center">
                                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold js_text_success"></p>
                                </div>
                            </div>
                        </div>
                        <div class="alert-danger bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-5" role="alert" style="display: none">
                            <strong class="font-bold">Lỗi!</strong>
                            <span class="block sm:inline js_text_danger"></span>
                        </div>
                    </div>
                    <div class="write-review__images text-left mb-3" style="display: none;">
                    </div>
                    <div class="flex-1 flex items-end justify-between m-0 ">
                        <input class="write-review__file absolute " type="file" multiple="">
                        <input type="hidden" value="<?php echo e($detail->id); ?>" name="module_id">
                        <button type="button" class="write-review__button write-review__button--image w-1/2 h-9 leading-9 cursor-pointer rounded flex items-center justify-center text-blue-500 border-blue-500 border">
                            <img src="<?php echo e(asset('images/d8ff2d5d709c730e12e11ba0b70a1285.jpg')); ?>" alt="icon add images" class="w-[15px] mr-1"><span>Thêm ảnh</span>
                        </button>
                        <button type="submit" class="write-review__button write-review__button--submit w-1/2 bg-red-600 ml-4 h-9 leading-9 cursor-pointer rounded flex items-center justify-center text-white border-red-600 border"><span>Gửi đánh giá</span>
                        </button>
                    </div>
                </form>
            </div>
            <button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" onclick="modalHandler()" aria-label="close modal" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </button>
        </div>
    </div>
</div>
<?php if(svl_ismobile() == 'is desktop'): ?>
<div class="UNFVx" style="opacity:0;z-index: -1;">
    <a class="btn-close">
        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z">
            </path>
        </svg>
        <span>Đóng</span>
    </a>

    <div class="main-slide-wrapper">
        <div class="main-slide-container">
            <?php $list_gallery = json_decode($detail->image_json, TRUE); ?>
            <?php if(!empty($list_images_cmt)): ?>
            <div class="cSlider cSlider--single">
                <?php $__currentLoopData = $list_images_cmt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="cSlider__item"><img src="<?php echo e($v); ?>" class="img-fluid fLNLeB" alt="<?php echo e($detail->title); ?>"></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="slide-nav-wrapper">
        <div class="container">
            <div class="tab"><span class="tab-item actived">Hình ảnh thực tế từ khách hàng(<?php echo count($list_images_cmt) ?>).</span></div>
            <div class="cSlider cSlider--nav">
                <?php $__currentLoopData = $list_images_cmt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="cSlider__item cSlider__item_child">
                    <div class="cSlider__item_child_2">
                        <img src="<?php echo e($v); ?>" alt="<?php echo e($detail->title); ?>" class="kipMhU">
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </div>
</div>
<?php endif; ?>
</div>
<?php $__env->startPush('css'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel='stylesheet' href="<?php echo e(asset('product/product-gallery-slider/slick.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('javascript'); ?>
<script type="text/javascript" src="<?php echo e(asset('product/rating/bootstrap-rating.min.js')); ?>"></script>
<script src="<?php echo e(asset('product/product-gallery-slider/slick.min.js')); ?>"></script>
<?php $__env->stopPush(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/product/frontend/product/comment/index.blade.php ENDPATH**/ ?>