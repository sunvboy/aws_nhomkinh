
<?php $__env->startSection('title'); ?>
<title>Danh sách đơn hàng</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<?php
$array = array(
    [
        "title" => "Danh sách khách hàng",
        "src" => route('customers.index'),
    ],
    [
        "title" => "Danh sách đơn hàng",
        "src" => route('customers.orders', ['id' => $detail->id]),
    ]
);
echo breadcrumb_backend($array);
?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="content">
    <h1 class=" text-lg font-medium mt-10">
        Thêm mới đơn hàng
    </h1>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 lg:col-span-8">
            <div class="box p-2">
                <div class="overflow-x-auto">
                    <!-- START: chọn thêm sản phẩm -->
                    <div class="relative w-full">
                        <div class="input-group">
                            <div id="input-group-email" class="input-group-text" style="width:200px">Thêm sản phẩm</div>
                            <input type="text" class="js_search_product form-control" placeholder="Tìm kiếm sản phẩm..." aria-label="Email" aria-describedby="input-group-email">
                        </div>
                        <div class="js_list_product absolute w-full left-0 top-[44px] bg-white shadowC z-50 p-4" style="display: none">
                            <div class="flex justify-between items-center">
                                <div class="flex space-x-3 items-center mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                                    </svg>
                                    <h2 class="font-medium"><?php echo e(trans('index.SelectProduct')); ?></h2>
                                </div>
                                <div>
                                    <a href="javascript:void(0)" class="js_close_listProduct">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="mt-2 border-t" id="loadDataProduct">
                                <?php echo $__env->make('customer.frontend.manager.order.dataProduct', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                    <!-- END: chọn thêm sản phẩm -->

                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <th class="border-b-2 dark:border-darkmode-400 whitespace-nowrap">Tên sản phẩm</th>
                                <th class="border-b-2 dark:border-darkmode-400 text-right whitespace-nowrap">Số lượng</th>
                                <th class="border-b-2 dark:border-darkmode-400 text-right whitespace-nowrap">Giá</th>
                                <th class="border-b-2 dark:border-darkmode-400 text-right whitespace-nowrap">Thành tiền</th>
                                <th class="border-b-2 dark:border-darkmode-400 text-right whitespace-nowrap">Xóa</th>
                            </tr>
                        </thead>
                        <tbody id="listCart">

                            <?php if($cartCopy): ?>
                            <?php $__currentLoopData = $cartCopy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $title_version = !empty($item['options']['title_version']) ? $item['options']['title_version'] : '';
                            ?>
                            <?php echo htmlItemCartCopyAdmin($key, $item); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <input type="text" class="hidden js_provisional_input" value="<?php echo $detail->total_price ?>">
                                <td colspan="4" class="!pt-6 border-transparent dark:!border-transparent text-right font-medium w-32">Tạm tính</td>
                                <td class="!pt-6 border-transparent dark:!border-transparent text-right font-medium w-32 js_provisional"><?php echo e(number_format($detailOrder->total_price,0,',','.')); ?>₫</td>
                            </tr>
                            <?php
                            $fee_ship = 0;
                            $title_ship = '';
                            ?>
                            <?php if(!empty($getFeeShip['fee_ship'])): ?>
                            <?php
                            $fee_ship = $getFeeShip['fee_ship'];
                            $title_ship = $getFeeShip['title_ship'];
                            ?>
                            <tr>
                                <td colspan="4" class="border-transparent dark:!border-transparent text-right font-medium w-32">Phí vận chuyển</td>
                                <td class="border-transparent dark:!border-transparent text-right font-medium w-32 js_fee_shipping"><?php echo e(number_format($fee_ship,0,',','.')); ?>₫</td>
                            </tr>
                            <?php endif; ?>

                            <tr>
                                <td colspan="4" class="border-transparent dark:!border-transparent font-medium text-right w-32">Tổng tiền</td>
                                <td class="border-transparent dark:!border-transparent text-right w-32 text-danger text-xl font-bold cart-total-copy"><?php echo e(number_format($detailOrder->total_price+$fee_ship,0,',','.')); ?>₫</td>
                            </tr>
                        </tfoot>
                    </table>
                    <input name="title_ship" type="text" class="hidden" value="<?php echo e($title_ship); ?>">
                    <input name="fee_ship" type="text" class="hidden" value="<?php echo e($fee_ship); ?>">
                </div>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-4">
            <div class="box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Thông tin thanh toán
                    </h2>
                </div>
                <div id="input" class="p-5">
                    <div class="preview">
                        <div>
                            <label class="form-label font-bold">Họ và tên</label>
                            <input type="text" name="fullname" class="form-control" value="<?php echo $detailOrder->fullname ?>">
                        </div>
                        <div class="mt-3">
                            <label class="form-label font-bold">Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $detailOrder->email ?>">
                        </div>
                        <div class="mt-3">
                            <label class="form-label font-bold">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $detailOrder->phone ?>">
                        </div>
                        <div class="mt-3">
                            <label class="form-label font-bold">Địa chỉ</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $detailOrder->address ?>">
                        </div>
                        <div class="mt-3">
                            <label class="form-label font-bold">Tỉnh/Thành phố</label>
                            <?php
                            echo Form::select('city_id', $listCity, $detailOrder->city_id, ['class' => 'form-control', 'id' => 'city']);
                            ?>
                        </div>
                        <div class="mt-3">
                            <label class="form-label font-bold">Quận/Huyện</label>
                            <?php
                            echo Form::select('district_id', $listDistrict, $detailOrder->district_id, ['class' => 'form-control', 'id' => 'district']);
                            ?>
                        </div>
                        <div class="mt-3">
                            <label class="form-label font-bold">Phường/Xã</label>
                            <?php
                            echo Form::select('ward_id', $listWard, $detailOrder->ward_id, ['class' => 'form-control', 'id' => 'ward']);
                            ?>
                        </div>
                        <div class="mt-3">
                            <label class="form-label font-bold">Đơn vị vận chuyển</label>
                            <div class="list_shipping space-y-2">
                                <?php echo $getFeeShip['html'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('javascript'); ?>
<script>
    var cityid = '<?php echo $detailOrder->city_id ?>';
    var districtid = '<?php echo $detailOrder->district_id ?>';
    var wardid = '<?php echo $detailOrder->ward_id ?>';
</script>
<script>
    $(".js_search_product").focus(function() {
        $(".js_list_product").show()
    });
    var resultsSelected = false;
    $(".js_list_product").hover(
        function() {
            resultsSelected = true;
        },
        function() {
            resultsSelected = false;
        }
    );
    $(".js_search_product").blur(function() {
        if (!resultsSelected) { //if you click on anything other than the results
            $(".js_list_product").hide(); //hide the results
        }
    })
    $(document).on('click', '.js_close_listProduct', function() {
        $(".js_list_product").hide();
    })

    function delay(callback, ms) {
        var timer = 0;
        return function() {
            var context = this,
                args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function() {
                callback.apply(context, args);
            }, ms || 0);
        };
    }
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        console.log(1);
        var page = $(this).attr('href').split('page=')[1];
        get_list_object_copy_order(page);
    });
    $('.js_search_product').keyup(delay(function(e) {
        e.preventDefault();
        get_list_object_copy_order();
    }, 500));

    function get_list_object_copy_order(page = 1) {
        let keyword = $('.js_search_product').val();
        let ajaxUrl = "<?php echo route('customers.ajaxListProduct') ?>";
        $.post(ajaxUrl, {
                keyword: keyword,
                page: page,
                "_token": $('meta[name="csrf-token"]').attr("content")
            },
            function(data) {
                $('#loadDataProduct').html(data);
            });
    }
    /*START: handle Cart*/
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
    $(document).on('click', '.js_handle_addToCart', function(event) {
        $.post("<?php echo route('customers.addToCartCopyOrder') ?>", {
                idCopyCart: "<?php echo $detail->id ?>",
                id: $(this).data('id'),
                idVersion: $(this).attr('data-id-version'),
                titleVersion: $(this).attr('data-title-version'),
                type: $(this).data('type'),
                "_token": $('meta[name="csrf-token"]').attr("content")
            },
            function(data) {
                console.log(data.data.error)
                if (data.data.error != '') {
                    toastr.error(data.data.error, 'Thông báo')
                } else {
                    loadDataCopyCart(data)
                    toastr.success(data.data.message, 'Thông báo')
                }
            });
    });
    $(document).on('change', '.js_change_copyCart', function() {
        var quantity = $(this).val();
        $.post("<?php echo route('customers.updateCartCopyOrder') ?>", {
                quantity: quantity,
                idCopyCart: <?php echo $detail->id ?>,
                type: "update",
                rowid: $(this).attr('data-rowid'),
                "_token": $('meta[name="csrf-token"]').attr("content")
            },
            function(data) {
                if (data.data.error != '') {
                    toastr.error(data.data.error, 'Thông báo')
                } else {
                    loadDataCopyCart(data);
                    toastr.success(data.data.message, 'Thông báo')
                }
            });
    })
    $(document).on('click', '.js_delete_copyCart', function(e) {
        e.preventDefault();
        $.post("<?php echo route('customers.updateCartCopyOrder') ?>", {
                idCopyCart: <?php echo $detail->id ?>,
                type: "delete",
                rowid: $(this).attr('data-rowid'),
                "_token": $('meta[name="csrf-token"]').attr("content")
            },
            function(data) {
                loadDataCopyCart(data)
                toastr.success(data.data.message, '<?php echo trans('index.Notify') ?>')
            });
    })

    function loadDataCopyCart(data) {
        $('#listCart').html(data.html);
        var fee = $('input[name="fee_ship"]').val();
        console.log(fee);
        $('.cart-total-copy').html(numberWithCommas(parseFloat(data.provisional) + parseFloat(fee)) + '₫');
        $('.js_provisional').html(numberWithCommas(data.provisional) + '₫');
        $('.js_provisional_input').val(data.provisional);
        $(".js_list_product").hide();
    }
    /*END */
    $(document).on('change', '#city', function(e, data) {
        let _this = $(this);
        let param = {
            'id': _this.val(),
            'type': 'city',
            'trigger_district': (typeof(data) != 'undefined') ? true : false,
            'text': 'Chọn Quận/Huyện',
            'select': 'districtid'
        }
        getLocation(param, '#district');
    });
    $(document).on('change', '#district', function(e, data) {
        let _this = $(this);
        var id = _this.val();
        if (id == null) {
            id = districtid;
        }
        let param = {
            'id': id,
            'type': 'district',
            'trigger_ward': (typeof(data) != 'undefined') ? true : false,
            'text': 'Chọn Phường/Xã',
            'select': 'wardid'
        }
        getLocation(param, '#ward');
    });

    function getLocation(param, object) {
        if (districtid == '' || param.trigger_district == false) districtid = 0;
        if (wardid == '' || param.trigger_ward == false) wardid = 0;
        let formURL = "<?php echo route('customers.getLocationAdmin') ?>";
        $.post(formURL, {
                param: param,
                "_token": $('meta[name="csrf-token"]').attr("content")
            },
            function(data) {
                let json = JSON.parse(data);
                if (param.select == 'districtid') {
                    if (param.trigger_district == true) {
                        $(object).html(json.html).val(districtid);
                    } else {
                        $(object).html(json.html).val(districtid);
                        $('#ward').html('<option value="">Chọn Phường/Xã</option>')
                    }
                } else if (param.select == 'wardid') {
                    $(object).html(json.html).val(wardid);
                }
            });
    }
    /*tính phí vận chuyển*/
    $(document).on('change', '#district', function(e) {
        var cityID = $('select#city').val();
        var districtID = $(this).val();
        loadPriceShipment(cityID, districtID);
    })

    function loadPriceShipment(cityID, districtID) {
        $.post("<?php echo route('customers.getPriceShipAdmin') ?>", {
                cityID: cityID,
                districtID: districtID,
                "_token": $('meta[name="csrf-token"]').attr("content")
            },
            function(data) {
                var json = JSON.parse(data);
                $('.list_shipping').html(json.html);
                $('.js_fee_shipping').html(numberWithCommas(json.fee_ship) + '₫');
                $('input[name="fee_ship"]').val(json.fee_ship);
                $('input[name="title_ship"]').val(json.title_ship);
                $('.cart-total-final').html(numberWithCommas(json.totalCart) + '₫');
                $('.js_box_shipping').removeClass('hidden')
            });
    }
    $(document).on('click', '.js_change_fee_shipping', function(e) {
        $('.js_checked_ship').addClass('hidden');
        $(this).find('.js_checked_ship').removeClass('hidden');
        var title = $(this).attr('data-title');
        var fee = $(this).attr('data-fee');
        $('input[name="title_ship"]').val(title);
        $('input[name="fee_ship"]').val(fee);
        $('.js_fee_shipping').html(numberWithCommas(fee) + '₫');
        $.post("<?php echo route('customers.changePriceShipAdmin') ?>", {
                fee: fee,
                "_token": $('meta[name="csrf-token"]').attr("content")
            },
            function(data) {
                $('.cart-total-final').html(numberWithCommas(data.totalCart) + '₫');
            });
    });
</script>
<style>
    .lg\:pl-20 {
        padding-left: 5rem;
    }

    .pb-2 {
        padding-bottom: 0.5rem;
    }

    .cursor-no-drop {
        cursor: no-drop;
    }

    .hover\:text-white:hover {
        --tw-text-opacity: 1;
        color: rgb(255 255 255 / var(--tw-text-opacity));
    }

    .hover\:bg-global:hover {
        --tw-bg-opacity: 1;
        background-color: rgb(214 28 31 / var(--tw-bg-opacity));
    }

    .space-y-2> :not([hidden])~ :not([hidden]) {
        --tw-space-y-reverse: 0;
        margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse)));
        margin-bottom: calc(0.5rem * var(--tw-space-y-reverse));
    }

    .space-x-2> :not([hidden])~ :not([hidden]) {
        --tw-space-x-reverse: 0;
        margin-right: calc(0.5rem * var(--tw-space-x-reverse));
        margin-left: calc(0.5rem * calc(1 - var(--tw-space-x-reverse)));
    }

    .stardust-icon {
        color: #ee4d2d;
    }

    .list_shipping_item {
        display: flex;
        flex: 1;
        background-color: #fafafa;
        box-shadow: inset 4px 0 0 #ee4d2d;
    }

    .list_shipping_item .priceA {
        color: #ee4d2d;
    }
</style>
<?php echo $__env->make('homepage.common.loading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('dashboard.layout.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/customer/backend/order/create.blade.php ENDPATH**/ ?>