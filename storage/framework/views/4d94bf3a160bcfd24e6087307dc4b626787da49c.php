<?php $__env->startSection('content'); ?>
<nav class="relative w-full flex flex-wrap items-center justify-between py-2 bg-[#f9f9f9] text-gray-500 hover:text-gray-700 focus:text-gray-700 navbar navbar-expand-lg navbar-light">
    <div class="container px-4 mx-auto w-full flex flex-wrap items-center justify-between">
        <nav class="bg-grey-light w-full" aria-label="breadcrumb">
            <ol class="list-reset flex flex-wrap">
                <li><a href="<?php echo url('') ?>" class="text-gray-500 hover:text-gray-600 text-f13"><?php echo e(trans('index.home')); ?></a></li>
                <?php $__currentLoopData = $breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><span class="text-gray-500 mx-2">/</span></li>
                <li><a href="<?php echo route('routerURL', ['slug' => $v->slug]) ?>" class="text-gray-500 hover:text-gray-600  text-f13"><?php echo e($v->title); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <li><span class="text-gray-500 mx-2">/</span></li>
                <li><a href="<?php echo route('routerURL', ['slug' => $detail->slug]) ?>" class="text-primary hover:text-gray-600  text-f13"><?php echo e($detail->title); ?></a></li>
            </ol>
        </nav>
    </div>
</nav>
<main class="my-8">
    <div class="container px-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 -mx-[15px]">
            <div class="lg:col-span-9 px-[15px]">
                <div class="space-y-2">
                    <h1 class="text-f22 md:text-f25 font-bold text-center leading-[1.1]"><?php echo e($detail->title); ?></h1>
                    <div class="text-center  text-f13 text-[#999]">
                        <span><?php echo \Carbon\Carbon::parse($detail['created_at'])->format('l, m d Y') ?></span>&nbsp;-&nbsp;
                        <span><?php echo e($detail->viewed); ?> <?php echo e(trans('index.viewed')); ?></span>
                    </div>
                    <div class="font-bold italic">
                        <?php echo $detail->description; ?>
                    </div>
                    <div class="box_content">
                        <?php echo $detail->content; ?>
                    </div>
                    <?php if(!$sameArticle->isEmpty()): ?>
                    <div>
                        <div class="bg-[#f0f0f0] p-[10px] rounded-[5px] my-4 uppercase text-f18 font-bold">
                            <?php echo e(trans('index.RelatedPosts')); ?>

                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 -mx-[15px]">
                            <?php $__currentLoopData = $sameArticle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="px-[15px]">
                                <?php echo htmlArticle($item); ?>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

            </div>
            <div class="lg:col-span-3 px-[15px]">
                <?php echo $__env->make('article.frontend.aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</main>
<style>
    .box_content img {
        margin: 10px auto;
        max-width: 100%;
        height: auto !important;
    }

    .box_content ul {
        list-style: disc;
        padding-left: 20px;
        margin-bottom: 10px;
    }

    .box_content p {
        margin-bottom: 10px;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/article/frontend/article/index.blade.php ENDPATH**/ ?>