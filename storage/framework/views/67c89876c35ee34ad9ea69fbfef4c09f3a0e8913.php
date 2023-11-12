<?php $__env->startSection('title'); ?>
<title>Thêm mới cửa hàng</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<?php
$array = array(
    [
        "title" => "Danh sách cửa hàng",
        "src" => route('addresses.index'),
    ],
    [
        "title" => "Thêm mới",
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
            Thêm mới cửa hàng
        </h1>
    </div>
    <form class="grid grid-cols-12 gap-6 mt-5" role="form" action="<?php echo e(route('addresses.store')); ?>" method="post" enctype="multipart/form-data">
        <div class=" col-span-12 lg:col-span-8 mt-3">
            <!-- BEGIN: Form Layout -->
            <div class="box p-5">
                <?php echo $__env->make('components.alert-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo csrf_field(); ?>
                <div>
                    <label class="form-label text-base font-semibold">Tên cửa hàng</label>
                    <?php echo Form::text('title', '', ['class' => 'form-control']); ?>
                </div>
                <div class="mt-3">
                    <label class="form-label text-base font-semibold">Email</label>
                    <div class="mt-2">
                        <?php echo Form::text('email', '', ['class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="mt-3">
                    <label class="form-label text-base font-semibold">Số điện thoại</label>
                    <div class="mt-2">
                        <?php echo Form::text('hotline', '', ['class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="mt-3">
                    <label class="form-label text-base font-semibold">Địa chỉ</label>
                    <div class="mt-2">
                        <?php echo Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Số 33 ngõ 629 Kim Mã']); ?>
                    </div>
                </div>
                <div class="mt-3">
                    <label class="form-label text-base font-semibold">Tỉnh/Thành phố</label>
                    <div class="mt-2">
                        <?php echo Form::select('cityid', $listCity, '', ['class' => 'form-control tom-select tom-select-custom', 'id' => 'city']); ?>
                    </div>
                </div>
                <div class="mt-3">
                    <label class="form-label text-base font-semibold">Quận/Huyện</label>
                    <div class="mt-2">
                        <?php echo Form::select('districtid', [], '', ['class' => 'form-control', 'id' => 'district', 'placeholder' => '']); ?>
                    </div>
                </div>
                <div class="mt-3">
                    <label class="form-label text-base font-semibold">Thời gian làm việc</label>
                    <div class="mt-2">
                        <?php echo Form::text('time', '', ['class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="text-right mt-5">
                    <button type="submit" class="btn btn-primary w-24">Lưu</button>
                </div>
            </div>
            <!-- END: Form Layout -->
        </div>
        <div class="col-span-12 lg:col-span-4">
            <?php echo $__env->make('components.image',['action' => 'create','name' => 'image','title'=> 'Ảnh đại diện'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('components.publish', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('address.backend.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dashboard.layout.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/address/backend/create.blade.php ENDPATH**/ ?>