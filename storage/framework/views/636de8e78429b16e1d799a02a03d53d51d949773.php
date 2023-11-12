<?php $__env->startSection('content'); ?>
<nav class="relative w-full flex flex-wrap items-center justify-between py-2 bg-[#f9f9f9] text-gray-500 hover:text-gray-700 focus:text-gray-700 navbar navbar-expand-lg navbar-light">
    <div class="container px-4 mx-auto w-full flex flex-wrap items-center justify-between">
        <nav class="bg-grey-light w-full" aria-label="breadcrumb">
            <ol class="list-reset flex">
                <li><a href="<?php echo url('') ?>" class="text-gray-500 hover:text-gray-600 text-f13"><?php echo e(trans('index.home')); ?></a></li>
                <?php if(!$breadcrumb->isEmpty()): ?>
                <?php $__currentLoopData = $breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><span class="text-gray-500 mx-2">/</span></li>
                <li><a href="<?php echo e(route('routerURL',['slug' => $item->slug])); ?>" class="text-gray-500 hover:text-gray-600 text-f13"><?php echo e($item->title); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ol>
        </nav>
    </div>
</nav>
<main class="py-8" id="scrollTop">
    <div class=" container mx-auto px-4">
        <div class="rounded-xl overflow-hidden shadowC">
            <div class=" px-6 py-4 bg-white float-left w-full flex flex-col space-y-2">
                <h1 class="text-3xl font-bold"><?php echo e($detail->title); ?></h1>
                <div>
                    <div class="py-3 float-left w-auto border-b-2 border-red-600 font-bold text-base">
                        <span class=" text-red-600">Tất cả <?php echo e($detail->title); ?></span>
                        <span class="text-gray-600"><?php echo e($detail->countProduct->count()); ?></span>
                    </div>
                </div>
                <?php if(!empty($detail->description)): ?>
                <div>
                    <?php echo $detail->description; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="flex flex-col md:flex-row space-x-4 relative pt-6 ">
            <?php /*@include('product.frontend.category.filter')*/ ?>
            <div class=" flex-1 pb-6">
                <div class="flex justify-between">
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute top-1/2 left-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="transform: translateY(-50%);">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input placeholder="<?php echo e(trans('index.SearchPlaceholder')); ?>" type="text" value="" class="filter rounded-full border w-[421px] h-11 px-8 focus:outline-none focus:ring focus:ring-red-300 focus:rounded-full hover:outline-none hover:ring hover:ring-red-300 hover:rounded-full" name="keywordFilter">
                    </div>
                    <div class="">
                        <select name="sortBy" class="filter rounded-full border h-11 px-8 focus:outline-none focus:ring focus:ring-red-300 focus:rounded-full hover:outline-none hover:ring hover:ring-red-300 hover:rounded-full">
                            <option value=""><?php echo e(trans('index.SortedBy')); ?></option>
                            <option value="id|desc"><?php echo e(trans('index.Latest')); ?></option>
                            <option value="id|asc"><?php echo e(trans('index.Oldest')); ?></option>
                            <option value="title|asc"><?php echo e(trans('index.NameAZ')); ?></option>
                            <option value="title|desc"><?php echo e(trans('index.NameZA')); ?></option>
                            <option value="price|asc"><?php echo e(trans('index.PricesGoUp')); ?></option>
                            <option value="price|desc"><?php echo e(trans('index.PricesGoDown')); ?></option>
                        </select>
                    </div>

                </div>
                <?php /*<section class="p-5 bg-red-50 rounded-2xl mt-6">
                    <h3 class="font-normal text-base">
                        @if(config('app.locale') == 'vi')
                        Có <strong class="js_total_filter"><?php echo $data->total() ?></strong> sản phẩm phù hợp với tiêu chí của bạn
                        @elseif(config('app.locale') == 'en')
                        There is <strong class="js_total_filter"><?php echo $data->total() ?></strong> product that matches your criteria
                        @elseif(config('app.locale') == 'gm')
                        Es gibt <strong class="js_total_filter"><?php echo $data->total() ?></strong> Produkt, das Ihren Kriterien entspricht
                        @elseif(config('app.locale') == 'tl')
                        มี <strong class="js_total_filter"><?php echo $data->total() ?></strong> ผลิตภัณฑ์ที่ตรงกับเกณฑ์ของคุณ
                        @endif
                    </h3>
                    <div class="mt-2 t-flex-gap">
                        <div id="js_selected_attr" class="flex flex-wrap gap-4 hidden">
                        </div>
                    </div>
                </section>*/ ?>

                <div class="mt-4">
                    <div class="grid grid-cols-2 md:grid-cols-3 -mx-[15px]" id="js_data_product_filter">
                        <?php if($data): ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="px-[15px]">
                            <?php echo htmlItemProduct($key, $item, 'category'); ?>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mt-5">
                    <div class="flex justify-center js_pagination_filter">
                        <?php echo e($data->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/product/frontend/category/index.blade.php ENDPATH**/ ?>