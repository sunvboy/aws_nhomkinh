<div class="mt-5 space-y-2 h-[400px] scrollbar">
    <?php if(!$products->isEmpty()): ?>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
    $price = getPrice(array('price' => $item->price, 'price_sale' => $item->price_sale, 'price_contact' =>
    $item->price_contact));
    ?>
    <?php
    $_stock = checkStock($item, 'simple');
    ?>
    <div class="border-b pb-2">
        <div data-id="<?php echo e($item->id); ?>" data-type="simple" class="text-sm lg:text-base grid space-x-2 lg:space-x-0 grid-cols-4 lg:grid-cols-12 items-center <?php if(count($item->product_versions) == 0 && $_stock['status'] == 0): ?> js_handle_addToCart  hover:bg-global hover:text-white cursor-pointer <?php else: ?> cursor-no-drop <?php endif; ?>">
            <div class="lg:col-span-1">
                <img alt="<?php echo e($item->title); ?>" class="w-[50px] h-[50px] object-cover border" src="<?php echo e(asset($item->image)); ?>">
            </div>
            <div class="lg:col-span-6">
                <?php echo e($item->title); ?>

            </div>
            <div class="lg:col-span-3">
                <?php echo $_stock['title'] ?>
            </div>
            <div class="lg:col-span-2">
                <?php echo e($price['price_final']); ?>

            </div>

        </div>
        <?php if(count($item->product_versions) > 0): ?>
        <!-- Sản phẩm biến thể -->
        <div class="pl-0 lg:pl-20 lg:space-y-3 text-sm lg:text-base">
            <?php $__currentLoopData = $item->product_versions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $title_version = collect(json_decode($val->title_version))->join(' - ', '');
            $price_version = getPrice(array('price' => $val->price_version, 'price_sale' => $val->price_sale_version, 'price_contact' =>
            0));
            $_stock_version = checkStock($val);
            ?>
            <div data-id="<?php echo e($item->id); ?>" data-id-version="<?php echo e($val->id_version); ?>" data-title-version="<?php echo e($val->title_version); ?>" data-type="variable" class=" grid grid-cols-3 lg:grid-cols-12 space-x-2 lg:space-x-0 lg:gap-4 items-center p-3 <?php if($_stock_version['status'] == 0): ?>  js_handle_addToCart hover:bg-global hover:text-white cursor-pointer <?php else: ?> cursor-no-drop opacity-30 <?php endif; ?>  ">
                <div class="lg:col-span-6">
                    <?php echo e($title_version); ?>

                </div>
                <div class="lg:col-span-4">
                    <?php echo $_stock_version['title'] ?>
                </div>
                <div class="lg:col-span-2">
                    <?php echo e($price_version['price_final']); ?>

                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!--END: Sản phẩm biến thể -->
        <?php endif; ?>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

</div>
<div class=" col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center justify-center">
    <?php echo e($products->links()); ?>

</div><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/customer/frontend/manager/order/dataProduct.blade.php ENDPATH**/ ?>