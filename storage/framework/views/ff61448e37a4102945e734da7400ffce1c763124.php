<?php $__env->startSection('title'); ?>
<title>Thêm mới sản phẩm</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<?php
$array = array(
    [
        "title" => "Danh sách sản phẩm",
        "src" => route('products.index'),
    ],
    [
        "title" => "Thêm mới sản phẩm",
        "src" => 'javascript:void(0)',
    ]
);
echo breadcrumb_backend($array);
?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class=" flex items-center mt-8">
        <h1 class="text-lg font-medium mr-auto">
            Thêm mới sản phẩm
        </h1>
    </div>
    <form class="grid grid-cols-12 gap-6 mt-5" role="form" action="<?php echo e(route('products.store')); ?>" method="post" enctype="multipart/form-data">
        <div class=" col-span-12 lg:col-span-8">
            <ul class="nav nav-link-tabs flex-wrap" role="tablist">
                <li id="example-homepage-tab" class="nav-item" role="presentation">
                    <button class="nav-link w-full py-2 active" data-tw-toggle="pill" data-tw-target="#example-tab-homepage" type="button" role="tab" aria-controls="example-tab-homepage" aria-selected="true">Thông tin chung</button>
                </li>
                <?php if(!$field->isEmpty()): ?>
                <li id="example-contact-tab" class="nav-item " role="presentation">
                    <button class="nav-link w-full py-2 " data-tw-toggle="pill" data-tw-target="#example-tab-contact" type="button" role="tab" aria-controls="example-tab-contact" aria-selected="true">Custom field</button>
                </li>
                <?php endif; ?>
                <li id="example-attr-tab" class="nav-item" role="presentation">
                    <button class="nav-link w-full py-2 " data-tw-toggle="pill" data-tw-target="#example-tab-attr" type="button" role="tab" aria-controls="example-tab-attr" aria-selected="true">Bộ lọc sản phẩm</button>
                </li>
            </ul>
            <?php echo $__env->make('components.alert-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo csrf_field(); ?>
            <div class="tab-content">
                <div id="example-tab-homepage" class="tab-pane leading-relaxed active" role="tabpanel" aria-labelledby="example-homepage-tab">
                    <!-- START: thông tin sản phẩm -->
                    <?php echo $__env->make('product.backend.product.common._detail',['action' => 'create'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!-- START: thông tin sản phẩm -->
                    <!-- START: lọc sản phẩm -->
                    <div class="<?php if (!in_array('attributes', $dropdown)) { ?>hidden<?php } ?>">
                    </div>
                    <!-- END: lọc sản phẩm -->
                </div>
                <div id="example-tab-contact" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="example-contact-tab">
                    <?php echo $__env->make('components.field.index', ['module' => $module], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div id="example-tab-attr" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="example-attr-tab">
                    <?php echo $__env->make('product.backend.product.common.attribute',['action' => 'create'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class=" box p-5 mt-3">
                <!-- start: SEO -->
                <?php echo $__env->make('components.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- end: SEO -->
                <div class="text-right mt-5">
                    <button type="submit" class="btn btn-primary w-24">Lưu</button>
                </div>
            </div>
        </div>
        <div class=" col-span-12 lg:col-span-4">
            <div class="hidden">
                <input type="text" name="polylang_group_id" value="<?php echo e(!empty(request()->get('groupID'))?request()->get('groupID'):''); ?>">
                <input type="text" name="polylang_language" value="<?php echo e(!empty(request()->get('language'))?request()->get('language'):''); ?>">
            </div>
            <div class=" box p-5 pt-3">
                <div>
                    <label class="form-label text-base font-semibold">Chọn danh mục chính</label>
                    <?php echo Form::select('catalogue_id', $htmlCatalogue, old('catalogue_id'), ['class' => 'tom-select tom-select-custom w-full', 'data-placeholder' => "Tìm kiếm danh mục...", 'required']); ?>
                </div>
                <div class="mt-3">
                    <label class="form-label text-base font-semibold">Chọn danh mục phụ</label>
                    <?php echo Form::select('catalogue[]', $htmlCatalogue, null, ['multiple', 'class' => 'tom-select tom-select-custom w-full', 'data-placeholder' => "Tìm kiếm danh mục..."]); ?>
                </div>
                <div class="mt-3 <?php if (!in_array('brands', $dropdown)) { ?>hidden<?php } ?>">
                    <label class="form-label text-base font-semibold">Thương hiệu</label>
                    <?php echo Form::select('brand_id', $htmlBrands, null, ['class' => 'tom-select tom-select-custom w-full', 'data-placeholder' => "Tìm kiếm thương hiệu..."]); ?>

                </div>
            </div>
            <?php echo $__env->make('components.image',['action' => 'create','name' => 'image','title'=> 'Ảnh đại diện'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('components.tag',['module' => $module], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('components.publish', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </form>
</div>
<?php echo $__env->make('product.backend.product.common.script',['action' => 'create'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .dz-preview {
        border-radius: 10px;
        -webkit-box-shadow: -8px -4px 57px -34px rgb(66 68 90);
        -moz-box-shadow: -8px -4px 57px -34px rgba(66, 68, 90, 1);
        box-shadow: -8px -4px 57px -34px rgb(66 68 90);
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layout.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rosta0607/domains/rosta.vn/public_html/resources/views/product/backend/product/create.blade.php ENDPATH**/ ?>