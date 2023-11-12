
<?php $__env->startSection('content'); ?>
<main>

    <?php if(!empty($slideHome->slides) && count($slideHome->slides) > 0): ?>
    <section>
        <div class="slide-bannerHome owl-carousel relative">
            <?php $__currentLoopData = $slideHome->slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item relative">
                <a href="<?php echo e(url($slide->link)); ?>">
                    <img class="w-full h-full object-cover" src="<?php echo e(asset($slide->src)); ?>" alt="banner">
                </a>
                <div class="hidden lg:block w-full absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                    <div class="container mx-auto">
                        <div class="w-2/5 rounded-[5px] p-5 space-y-2 float-left" style="background: rgba(0, 0, 0, 0.1);">
                            <h3 class="leading-[45px] text-f36 text-white mb-0"><?php echo e($slide->title); ?></h3>
                            <p class="text-white">
                                <?php echo e($slide->description); ?>

                            </p>
                            <div>
                                <a href="" class="h-[50px] leading-[50px] border-2 border-white float-left w-[150px] text-center text-white text-base hover:bg-primary hover:border-primary">Xem thêm</a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
    <?php endif; ?>
    <section class="pt-[50px] pb-[140px] home-about">
        <div class="container px-4 space-y-[30px]">
            <div class="text-center">
                <h2 class="section-title">
                    <span><?php echo e($fcSystem['aboutus_1']); ?></span>
                </h2>
                <div>
                    <?php echo $fcSystem['aboutus_2']; ?>

                </div>
            </div>
            <div class="space-x-8 flex">
                <div class="w-full lg:w-1/2">
                    <div class="border-[5px] border-primary px-10 py-[55px] space-y-[30px] float-left">
                        <h3 class="text-f30 leading-[28px] font-medium text-primary"><?php echo e($fcSystem['aboutus_sub']); ?></h3>
                        <div>
                            <?php echo $fcSystem['aboutus_3']; ?>

                        </div>
                        <div>
                            <a href="ve-chung-toi" class="float-left border-primary border-2 px-[30px] py-[10px] font-bold rounded-full text-primary hover:bg-primary hover:text-white">Xem thêm</a>
                        </div>
                    </div>
                </div>
                <div class="w-1/2 hidden lg:flex">
                    <div class="h-full bg-primary flex items-center mt-[90px]">
                        <img class="ml-[94px] max-w-full" src="<?php echo e(asset($fcSystem['aboutus_4'])); ?>" alt="<?php echo e($fcSystem['aboutus_1']); ?>">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    $services = json_decode($fields['config_colums_json_service_json'], TRUE);
    ?>
    <?php if(!empty($services) && !empty($services['title'])): ?>
    <section class="py-[50px]">
        <div class="container px-4 space-y-[30px]">
            <div class="text-center">
                <h2 class="section-title">
                    <span><?php echo e($fields['config_colums_input_service_title']); ?></span>
                </h2>
                <div>
                    <?php echo e($fields['config_colums_textarea_service_description']); ?>

                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 -mx-[15px]">
                <?php $__currentLoopData = $services['title']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="px-[15px]">
                    <div class="mb-[30px] py-[50px] px-[15px] rounded-[10px] shadowC text-center space-y-[45px]">
                        <div class="flex">
                            <img src="<?php echo e(!empty($services['image'][$key])?$services['image'][$key]:''); ?>" alt="<?php echo e($item); ?>" class="mx-auto">
                        </div>
                        <div class="space-y-4">
                            <div class="home-service-title">
                                <a href="" class="text-f22 text-primary font-bold"><?php echo e($item); ?></a>
                            </div>
                            <div>
                                <?php echo e(!empty($services['description'][$key])?$services['description'][$key]:''); ?>

                            </div>
                            <div class="flex items-center justify-center">
                                <a href="<?php echo e(!empty($services['link'][$key])?$services['link'][$key]:''); ?>" class="float-left border-primary border-2 px-[30px] py-[10px] font-bold rounded-full text-primary hover:bg-primary hover:text-white">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if(!empty($ishomeProduct)): ?>
    <section class="home-featured-product bg-primary py-[50px]">
        <div class="container space-y-[30px] px-4">
            <div class="text-center">
                <h2 class="section-title text-white">
                    <span class="!text-white">Sản phẩm nổi bật</span>
                </h2>
                <div class="text-white">
                    Cập nhật những sản phẩm mới nhất
                </div>
            </div>
            <div class="slide-products owl-carousel relative">
                <?php $__currentLoopData = $ishomeProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo htmlItemProduct($key,$item); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <?php
    $clients = json_decode($fields['config_colums_json_client_json'], TRUE);
    ?>
    <?php if(!empty($clients) && !empty($clients['title'])): ?>

    <section class="home-client bg-[#f1f1f1] py-[50px]">
        <div class="container px-4 space-y-[30px]">
            <div class="text-center">
                <h2 class="section-title">
                    <span>
                        <?php echo e($fields['config_colums_input_client']); ?>

                    </span>
                </h2>
                <div>
                    <?php echo e($fields['config_colums_textarea_client_description']); ?>

                </div>
            </div>
            <div class="slide-client owl-carousel relative">

                <?php $__currentLoopData = $clients['title']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                    <div class="p-[30px] pb-[50px] mb-[150px] client-item text-center bg-white relative">
                        <i class="fa fa-quote-left text-[80px] text-primary mb-5" aria-hidden="true"></i>
                        <p class="description mb-7" style="opacity: 0.8;">
                            <?php echo e(!empty($clients['description'][$key])?$clients['description'][$key]:''); ?>

                        </p>
                        <div class="absolute w-full left-0">
                            <div class="inline-block border-2 border-white rounded-full overflow-hidden z-1 relative" style="box-shadow: 0 0 2px 2px #daad86;">
                                <img src=" <?php echo e(!empty($clients['image'][$key])?$clients['image'][$key]:''); ?>" alt="image" class="!w-[90px] h-auto text-center mx-auto overflow-hidden">
                            </div>
                            <h3 class="text-lg font-bold capitalize mb-1"><?php echo e($item); ?></h3>
                            <span class="post"><?php echo e(!empty($clients['sub_title'][$key])?$clients['sub_title'][$key]:''); ?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <?php if(!empty($ishomeCategoryArticle)): ?>
    <?php if(!empty($ishomeCategoryArticle->posts)): ?>
    <section class="home-client py-[50px]">
        <div class="container px-4 space-y-[30px]">
            <div class="text-center">
                <h2 class="section-title">
                    <span><?php echo e($ishomeCategoryArticle->title); ?> mới nhất</span>
                </h2>
                <?php if(!empty($ishomeCategoryArticle->description)): ?>
                <div>
                    <?php echo $ishomeCategoryArticle->description; ?>

                </div>
                <?php endif; ?>
            </div>
            <div class="slide-news owl-carousel relative">
                <?php $__currentLoopData = $ishomeCategoryArticle->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo htmlArticle($item); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <?php endif; ?>
</main>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('javascript'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rosta0607/domains/quyenit.com/public_html/resources/views/homepage/home/index.blade.php ENDPATH**/ ?>