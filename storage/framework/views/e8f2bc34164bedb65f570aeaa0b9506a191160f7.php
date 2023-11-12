<?php
$asideCategoryArticle = Cache::remember('asideCategoryArticle', 600000, function () {
    $asideCategoryArticle = \App\Models\CategoryArticle::select('id', 'title', 'slug')
        ->where(['alanguage' => config('app.locale'), 'publish' => 0, 'ishome' => 1])
        ->with(['posts' => function ($query) {
            $query->limit(5);
        }])
        ->first();
    return $asideCategoryArticle;
});
/*$categoryProduct = Cache::remember('categoryProduct', 600000, function () {
    $categoryProduct = \App\Models\CategoryProduct::select('id', 'title', 'slug')
        ->where(['alanguage' => config('app.locale'), 'publish' => 0, 'parentid' => 0])
        ->orderBy('order', 'asc')->orderBy('id', 'desc')
        ->get();
    return $categoryProduct;
}); */
?>
<div class="md:col-span-3 px-[10px] space-y-10 order-1 md:order-0 mt-10 md:mt-0">
    <form class="relative" action="<?php echo e(route('homepage.search')); ?>">
        <input type="text" name="keyword" class="text-black w-full px-10px h-[45px] bg-[#f7f7f7] border text-sm focus:outline-none hover:outline-none outline-none" placeholder="<?php echo e(trans('index.SearchPlaceholder')); ?>">
        <button type="submit" class="text-black absolute right-2 top-1/2 -translate-y-1/2 text-[21px]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
        </button>
    </form>
    <?php if(!empty($asideCategoryArticle) && count($asideCategoryArticle->posts) > 0): ?>
    <aside class="">
        <h2 class="relative pb-[10px] mb-5 font-bold text-lg uppercase border-b-2 border-primary">Bài viết mới</h2>
        <ul class="">
            <?php $__currentLoopData = $asideCategoryArticle->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="relative py-[5px] flex space-x-[10px]">
                <a href="" class="float-left w-[30%]">
                    <img src="<?php echo e(asset($item->image)); ?>" alt="<?php echo e($item->title); ?>">
                </a>
                <a href="<?php echo e(route('routerURL',['slug' => $item->slug])); ?>" class="hover:text-primary flex-1 lg:text-f14"><?php echo e($item->title); ?></a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </aside>
    <?php endif; ?>
    <?php /*@if(!empty($categoryProduct) && count($categoryProduct) > 0)
    <aside class="space-y-2">
        <h2 class="relative h2aside capitalize pb-[10px] font-bold text-lg">Danh mục sản phẩm</h2>
        <ul class="ulAside">
            @foreach($categoryProduct as $item)
            <li class="relative pl-5 py-[5px]">
                <a href="{{route('routerURL',['slug' => $item->slug])}}" class="hover:text-global">{{$item->title}}</a>
            </li>
            @endforeach
        </ul>
    </aside>
    @endif*/ ?>
    <?php
    $asideTags = Cache::remember('asideTags', 60, function () {
        return \App\Models\Tag::select('title', 'slug')->where('alanguage', config('app.locale'))->where(array('publish' => 0))->orderBy('order', 'asc')->orderBy('id', 'desc')->limit(20)->get();
    });
    ?>
    <?php if($asideTags->count() > 0): ?>
    <div class="">
        <h2 class="relative pb-[10px] mb-5 font-bold text-lg uppercase border-b-2 border-primary">Tags</h2>
        <ul class="flex flex-wrap">
            <?php $__currentLoopData = $asideTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a href="<?php echo e(route('tagURL',['slug' => $item->slug])); ?>" class="border p-2 float-left mr-2 mb-2 hover:bg-primary hover:border-primary hover:text-white"><?php echo e($item->title); ?></a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
</div><?php /**PATH /home/rosta0607/domains/rosta.vn/public_html/resources/views/article/frontend/aside.blade.php ENDPATH**/ ?>