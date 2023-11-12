<?php $__env->startSection('title'); ?>
<title>Danh sách đơn hàng</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<?php
$array = array(
    [
        "title" => "Danh sách đơn hàng",
        "src" => route('orders.index'),
    ]
);
echo breadcrumb_backend($array);
?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content">
    <h1 class=" text-lg font-medium mt-10">
        Danh sách đơn hàng
    </h1>

    <form action="" class="grid grid-cols-12 gap-1 space-x-2  mt-5" id="search" style="margin-bottom: 0px;">
        <div class="col-span-2">
            <select class="form-control ajax-delete-all  " data-title="Lưu ý: Khi bạn xóa danh mục nội dung tĩnh, toàn bộ nội dung tĩnh trong nhóm này sẽ bị xóa. Hãy chắc chắn rằng bạn muốn thực hiện chức năng này!" data-module="<?php echo e($module); ?>">
                <option>Hành động</option>
                <option value="">Xóa</option>
            </select>
        </div>
        <?php
        $status = ['0' => 'Trạng thái'];
        $status = array_merge($status, config('cart')['status']);
        $payment = ['0' => 'Thanh toán'];
        $payment = array_merge($payment, config('cart')['payment']);
        ?>
        <div class="col-span-2">
            <?php echo Form::select('status', $status, request()->get('status'), ['class' => 'form-control']); ?>
        </div>
        <div class="col-span-2 hidden">
            <?php echo Form::select('payment', $payment, request()->get('payment'), ['class' => 'form-control']); ?>
        </div>
        <div class="col-span-3">
            <?php echo Form::text('date', request()->get('date'), ['class' => 'form-control',  'autocomplete' => 'off']); ?>
        </div>
        <div class="col-span-3 flex">
            <input type="search" name="keyword" class="keyword form-control filter w-full mr-1" placeholder="Nhập từ khóa tìm kiếm ..." autocomplete="off" value="<?php echo request()->get('keyword') ?>">
            <button class="btn btn-primary btn-sm">
                <i data-lucide="search"></i>
            </button>
        </div>
    </form>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Data List -->
        <div class=" col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th style="width:40px;">
                            <input type="checkbox" id="checkbox-all">
                        </th>
                        <th class="whitespace-nowrap">STT</th>
                        <th class="whitespace-nowrap">Thông tin</th>
                        <th class="whitespace-nowrap">Sản phẩm</th>
                        <th class="whitespace-nowrap">Tổng tiền</th>
                        <th class="whitespace-nowrap">Ngày tạo</th>
                        <th class="whitespace-nowrap text-center">#</th>
                    </tr>
                </thead>

                <tbody id="table_data" role="alert" aria-live="polite" aria-relevant="all">
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    if ($v->status == 'wait') {
                        $class = 'btn-secondary';
                    } else if ($v->status == 'pending') {
                        $class = 'btn-pending';
                    } else if ($v->status == 'transported') {
                        $class = 'btn-warning';
                    } else if ($v->status == 'completed') {
                        $class = 'btn-success';
                    } else if ($v->status == 'canceled') {
                        $class = 'btn-danger';
                    } else if ($v->status == 'returns') {
                        $class = 'bg-primary text-white';
                    }
                    ?>
                    <tr class="odd " id="post-<?php echo $v->id; ?>">
                        <td>
                            <input type="checkbox" name="checkbox[]" value="<?php echo $v->id; ?>" class="checkbox-item">
                        </td>
                        <td>
                            <?php echo e($data->firstItem()+$loop->index); ?>

                        </td>
                        <td>
                            <a href="<?php echo e(route('orders.edit',['id'=>$v->id])); ?>">
                                <p class="text-danger font-bold"><b>CODE:</b> #<?php echo $v->code; ?></p>
                                <p><?php echo $v->fullname; ?></p>
                                <p><?php echo $v->phone; ?></p>
                                <p><?php echo $v->address; ?></p>
                                <p><?php echo $v->email; ?></p>
                                <p class="text-primary"><?php echo config('cart')['payment'][$v->payment] ?></p>
                            </a>
                        </td>
                        <td style="box-shadow: 0px 0px 0px transparent !important;">
                            Có <?php echo $v->total_item; ?> sản phẩm
                            <?php $cart = json_decode($v->cart, TRUE); ?>
                            <table class="table_product">
                                <tbody>
                                    <?php $total = 0 ?>
                                    <?php if($cart): ?>
                                    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $options = !empty($item['options']['title_version']) ? '- ' . $item['options']['title_version'] : '';
                                    ?>
                                    <tr>
                                        <td><span class="text-danger font-bold"><?php echo e($item['title']); ?></span> <span><?php echo e($options); ?></span></td>
                                        <td><strong>SL:</strong> <?php echo e($item['quantity']); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </td>
                        <td>
                            <?php echo number_format($v->total_price - $v->total_price_coupon + $v->fee_ship); ?>₫
                        </td>
                        <td>
                            <?php echo e($v->created_at); ?>

                        </td>

                        <td class="">
                            <div class="text-center text-center-<?php echo e($v->id); ?> mb-3 ">
                                <?php if($v->status == 'returns'): ?>
                                <button class="btn btn-sm btn-primary text-white">Trả hàng/Hoàn tiền</button>
                                <?php else: ?>
                                <select class="form-control tom-select tom-select-custom <?php echo e($class); ?>" data-id="<?php echo e($v->id); ?>">
                                    <?php $__currentLoopData = config('cart')['status']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($l !== 'returns'): ?>
                                    <option value="<?php echo e($l); ?>" <?php if ($v->status == $l) { ?>selected<?php } ?>>
                                        <?php echo e($val); ?>

                                    </option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php endif; ?>
                            </div>
                            <div class="flex justify-center items-center">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('orders_edit')): ?>
                                <a class="flex items-center mr-3" href="<?php echo e(route('orders.edit',['id'=>$v->id])); ?>">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                    Edit
                                </a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('orders_destroy')): ?>
                                <a class="flex items-center text-danger ajax-delete" href="javascript:;" data-id="<?php echo $v->id ?>" data-module="<?php echo $module ?>" data-child="0" data-title="Lưu ý: Khi bạn xóa đơn hàng, đơn hàng sẽ bị xóa vĩnh viễn. Hãy chắc chắn rằng bạn muốn thực hiện hành động này!">
                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                </a>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class=" col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center justify-center">
            <?php echo e($data->links()); ?>

        </div>
        <!-- END: Pagination -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('javascript'); ?>
<script type="text/javascript" src="<?php echo e(asset('library/daterangepicker/moment.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('library/daterangepicker/daterangepicker.min.js')); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('library/daterangepicker/daterangepicker.css')); ?>" />
<script type="text/javascript">
    $(function() {
        $('input[name="date"]').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD',
                separator: " to "
            }
        });
    });
</script>
<script src="<?php echo e(asset('library/toastr/toastr.min.js')); ?>"></script>
<link href="<?php echo e(asset('library/toastr/toastr.min.css')); ?>" rel="stylesheet">
<script>
    $(document).on('change', '.tom-select-custom', function() {
        var id = $(this).attr('data-id');
        var status = $(this).val();
        var classA = 'wait';
        $.ajax({
            type: 'POST',
            url: "<?php echo e(route('orders.ajaxUploadStatus')); ?>",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id,
                status: status
            },
            success: function(data) {

                if (status == 'wait') {
                    classA = 'btn-secondary';
                } else if (status == 'pending') {
                    classA = 'btn-pending';
                } else if (status == 'transported') {
                    classA = 'btn-warning';
                } else if (status == 'completed') {
                    classA = 'btn-success';
                } else if (status == 'canceled') {
                    classA = 'btn-danger';
                }
                console.log(classA);
                $('.text-center-' + id).attr('class', 'text-center-' + id +
                    ' text-center text-center-a mb-3 ' + classA);

                toastr.success('Cập nhập đơn hàng thành công', 'Thông báo!')
            },
            error: function(jqXhr, json, errorThrown) {
                toastr.error('Cập nhập đơn hàng không thành công', 'Error!')
            },
        });

    });
</script>
<style>
    .table_product td,
    .table_product th {
        vertical-align: middle;
        border: 1px solid #e5e5e5 !important;
        border-bottom-color: rgb(229, 229, 229);
        border-bottom-style: solid;
        border-bottom-width: 1px;
        box-shadow: 0px 0px 0px transparent !important;
    }

    table td,
    table th {
        width: inherit;
    }
</style>
<style>
    .pending .ts-input {
        background: #f8dda7;
        color: #94660c;
    }

    .completed .ts-input {
        background: #c6e1c6;
        color: #5b841b;
    }

    .transported .ts-input {
        background: #8f8c8c;
        color: #e5e5e5;
    }

    .canceled .ts-input {
        background: red;
        color: #fff;
    }
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('dashboard.layout.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rosta0607/domains/quyenit.com/public_html/resources/views/order/backend/index.blade.php ENDPATH**/ ?>