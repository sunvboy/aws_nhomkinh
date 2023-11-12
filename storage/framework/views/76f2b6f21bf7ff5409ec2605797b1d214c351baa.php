<?php $__env->startSection('title'); ?>
<title>Cập nhập sản phẩm</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<?php
$array = array(
    [
        "title" => "Danh sách sản phẩm",
        "src" => route('products.index'),
    ],
    [
        "title" => "Cập nhập sản phẩm",
        "src" => 'javascript:void(0)',
    ]
);
echo breadcrumb_backend($array);
?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<script>
    function search(nameKey, myArray) {
        for (var i = 0; i < myArray.length; i++) {
            if (myArray[i].name === nameKey) {
                return myArray[i];
            }
        }
    }

    var array = [0, 1, 2, 3];

    var resultObject = search('0', array);
    console.log(resultObject);
</script>
<div class="content">
    <div class=" flex items-center mt-8">
        <h1 class="text-lg font-medium mr-auto">
            Cập nhập sản phẩm
        </h1>
    </div>
    <form class="grid grid-cols-12 gap-6 mt-5" role="form" action="<?php echo e(route('products.update',['id' => $detail->id ])); ?>" method="post" enctype="multipart/form-data">
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
            <?php echo csrf_field(); ?>
            <?php echo $__env->make('components.alert-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="tab-content">
                <div id="example-tab-homepage" class="tab-pane leading-relaxed active" role="tabpanel" aria-labelledby="example-homepage-tab">
                    <?php echo $__env->make('product.backend.product.common._detail',['action' => 'update'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="<?php if (!in_array('attributes', $dropdown)) { ?>hidden<?php } ?>">
                    </div>
                </div>
                <div id="example-tab-contact" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="example-contact-tab">
                    <?php echo $__env->make('components.field.index', ['module' => $module], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div id="example-tab-attr" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="example-attr-tab">
                    <?php echo $__env->make('product.backend.product.common.attribute',['action' => 'update'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>

            <div class=" box p-5 mt-3">
                <!-- start: SEO -->
                <?php echo $__env->make('components.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- end: SEO -->
                <div class="text-right mt-5">
                    <button type="submit" class="btn btn-primary w-24">Cập nhập</button>
                </div>
            </div>
            <!-- END: Form Layout -->
        </div>
        <div class=" col-span-12 lg:col-span-4">
            <div class="box p-5 pt-3 hidden">
                <div>
                    <label class="form-label text-base font-semibold">Languages</label>
                </div>
                <div>
                    <p><strong>Select Language</strong></p>
                    <div class="flex items-center mt-2">
                        <img src="<?php echo e(config('language')[$detail->alanguage]['image']); ?>" alt="language icon">
                        <span class="ml-2"><?php echo e(config('language')[$detail->alanguage]['title']); ?></span>
                    </div>
                </div>
                <div class="mt-3">
                    <p><strong>Translations</strong></p>
                    <?php $__currentLoopData = config('language'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($key != config('app.locale')): ?>
                    <a href="<?php echo e(route('products.create',['groupID' => $polylang->group_id, 'language' => $key])); ?>" class="flex items-center mt-2">
                        <div class="w-9">
                            <img src="<?php echo e($item['image']); ?>" alt="<?php echo e($item['title']); ?> icon">
                        </div>
                        <div class="flex-1 ml-2 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <input class="form-control w-full title" name="title" type="text" value="" disabled>
                        </div>
                    </a>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="box p-5 pt-3 mt-3">
                <div>
                    <label class="form-label text-base font-semibold">Chọn danh mục chính</label>
                    <?php echo Form::select('catalogue_id', $htmlCatalogue, $detail->catalogue_id, ['class' => 'tom-select tom-select-custom w-full', 'data-placeholder' => "Tìm kiếm danh mục...", 'required']); ?>
                </div>
                <div class="mt-3">
                    <label class="form-label text-base font-semibold">Chọn danh mục phụ</label>
                    <select name="catalogue[]" class="form-control tom-select tom-select-custom w-full" multiple>
                        <option value=""></option>
                        <?php $__currentLoopData = $htmlCatalogue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($k); ?>" <?php echo e((collect($getCatalogue)->contains($k)) ? 'selected':''); ?>>
                            <?php echo e($v); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="mt-3 <?php if (!in_array('brands', $dropdown)) { ?>hidden<?php } ?>">
                    <label class="form-label text-base font-semibold">Chọn thương hiệu</label>
                    <?php echo Form::select('brand_id', $htmlBrands, $detail->brand_id, ['class' => 'tom-select tom-select-custom w-full', 'data-placeholder' => "Tìm kiếm thương hiệu...", 'required']); ?>
                </div>
            </div>
            <?php echo $__env->make('components.image',['action' => 'update','name' => 'image','title'=> 'Ảnh đại diện'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('components.tag',['module' => $module], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('components.publish', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
    </form>
</div>
<?php echo $__env->make('product.backend.product.common.script',['action' => 'update'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .dz-preview {
        border-radius: 10px;
        -webkit-box-shadow: -8px -4px 57px -34px rgb(66 68 90);
        -moz-box-shadow: -8px -4px 57px -34px rgba(66, 68, 90, 1);
        box-shadow: -8px -4px 57px -34px rgb(66 68 90);
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layout.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/product/backend/product/edit.blade.php ENDPATH**/ ?>