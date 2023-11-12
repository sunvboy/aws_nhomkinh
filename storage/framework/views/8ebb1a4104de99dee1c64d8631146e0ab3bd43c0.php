 <!-- start: box 6 -->
 <?php
    $ishomeCategoryProduct = \App\Models\CategoryProduct::select('id', 'title')
        ->where(['alanguage' => config('app.locale'), 'highlight' => 1, 'publish' => 0])
        ->orderBy('order', 'asc')
        ->orderBy('id', 'desc')
        ->get();
    ?>
 <section class="oder-home pt-5 md:pt-10">
     <div class="container mx-auto px-3">
         <div class="section-title wow fadeInUp">
             <h2 class="text-f22 md:text-f30 text-center text-brown font-medium"><?php echo e($fcSystem['title_3']); ?></h2>
         </div>
         <div class="flex flex-wrap justify-between -mx-[5px] md:-mx-3 mt-0 md:mt-5">
             <div class="w-full md:w-1/3 px-[5px] md:px-3">
                 <p class="text-f15 text-brown"> <?php echo $fcSystem['title_4'] ?></p>
                 <p class="text-f15 py-[15px]">Đặt mua trực tuyến tại:</p>
                 <ul class="flex flex-wrap justify-start">
                     <li class="mr-[15px]">
                         <a href="<?php echo e($fcSystem['social_shopee']); ?>"><img src="<?php echo e(asset('frontend/images/Shopee.png.webp')); ?>" alt="shopee"></a>
                     </li>
                     <li class="mr-[15px]">
                         <a href="<?php echo e($fcSystem['social_tiki']); ?>"><img src="<?php echo e(asset('frontend/images/Tiki.png.webp')); ?>" alt="tiki"></a>
                     </li>
                     <li class="mr-[15px]">
                         <a href="<?php echo e($fcSystem['social_lazada']); ?>"><img src="<?php echo e(asset('frontend/images/Lazada.png.webp')); ?>" alt="lazada"></a>
                     </li>
                 </ul>
             </div>
             <div class="w-full md:w-2/3 px-[5px] md:px-3 mt-4 md:mt-0">
                 <form id="form-cart-now">
                     <div>
                         <?php echo csrf_field(); ?>
                         <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-2 print-error-msg " style="display: none">
                             <strong class="font-bold">ERROR!</strong>
                             <span class="block sm:inline"></span>
                         </div>
                         <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mb-2 print-success-msg" style="display: none">
                             <div class="flex items-center mb-">
                                 <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                         <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                     </svg>
                                 </div>
                                 <div>
                                     <span class="font-bold"></span>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="flex flex-wrap justify-between bg-white">
                         <div class="w-full md:w-1/2">
                             <h3 class="bg-brown text-white py-[8px] px-[10px]">HOẶC MUA NGAY TẠI ĐÂY:</h3>
                             <div class="p-4">
                                 <div class="mb-[15px]">
                                     <label for="" class="inline-block w-full mb-2 font-bold">Họ và tên</label>
                                     <input name="fullname" type="text" class="w-full h-[38px] border border-gray-400 rounded-md px-2" placeholder="Họ và tên">
                                 </div>
                                 <div class="mb-[15px]">
                                     <label for="" class="inline-block w-full mb-2 font-bold">Số điện thoại</label>
                                     <input name="phone" type="text" class="w-full h-[38px] border border-gray-400 rounded-md px-2" placeholder="Số điện thoại">
                                 </div>
                                 <div class="mb-[15px]">
                                     <label for="" class="inline-block w-full mb-2 font-bold">Địa chỉ</label>
                                     <input name="address" type="text" class="w-full h-[38px] border border-gray-400 rounded-md px-2" placeholder="Địa chỉ">
                                 </div>
                             </div>
                         </div>
                         <div class="w-full md:w-1/2  pb-[15px] md:pb-0">
                             <input type="submit" value="Đặt hàng ngay" class="bg-yellow text-black py-[8px] px-[10px] w-full uppercase font-bold hidden md:block">
                             <div class="flex flex-wrap">
                                 <div class="w-full p-4">
                                     <label for="" class="w-full mb-2 font-bold">Sản phẩm</label>

                                     <select name="product" id="select-repeated-options" class="rounded-md px-2 mt-2" placeholder="Chọn sản phẩm">
                                         <option value="">Select...</option>
                                         <?php if(!$ishomeCategoryProduct->isEmpty()): ?>
                                         <?php $__currentLoopData = $ishomeCategoryProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <?php if(count($item->listProductHome) > 0): ?>

                                         <optgroup label="<?php echo e($item->title); ?>">
                                             <?php $__currentLoopData = $item->listProductHome; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <?php
                                                $price = getPrice(array('price' => $value->price, 'price_sale' => $value->price_sale, 'price_contact' =>
                                                $value->price_contact));
                                                ?>
                                             <option value="<?php echo e($value->id); ?>" data-price="<?php echo e($price['price_final_none_format']); ?>"><?php echo e($value->title); ?></option>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         </optgroup>
                                         <?php endif; ?>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         <?php endif; ?>

                                     </select>
                                     <p class="mt-4"><span class="font-bold">Số lượng</span> <input name="quantity" type="number" min="1" value="1" class="w-[100px] h-[35px] px-2 border border-gray-300 rounded-sm ml-3"></p>
                                     <div class="mt-4 hidden js_show_price">
                                         <p class="text-f16 ">Đơn giá: <span class="text-red-600 font-bold js_price_product"> 0</span></p>
                                         <p class="text-red-600 font-bold text-f20 mt-4">TỔNG: <span class="js_total_price_product">0</span></p>
                                     </div>
                                     <button type="submit" class="btn-submit-cart-now mt-3 uppercase font-black py-2 text-white bg-red-600 flex-1 cursor-pointer items-center inline-flex rounded-md px-6 justify-center">
                                         Mua ngay
                                     </button>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </section>
 <!-- end: box 7 -->
 <?php $__env->startPush('css'); ?>
 <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.0/dist/css/tom-select.css" rel="stylesheet">
 <style>
     .ts-wrapper {
         padding: 0px !important;
     }
 </style>
 <?php $__env->stopPush(); ?>
 <?php $__env->startPush('javascript'); ?>
 <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.0/dist/js/tom-select.complete.min.js"></script>
 <script>
     new TomSelect('#select-repeated-options', {
         sortField: 'text',
         plugins: {
             remove_button: {
                 title: 'Remove this item',
             }
         },
         persist: false,
         create: true,
     });
     $(document).ready(function() {
         $(document).on('change', '#select-repeated-options', function() {
             var price = $('#select-repeated-options option:selected').attr('data-price');
             price = new Intl.NumberFormat('vi-VN', {
                 style: 'currency',
                 currency: 'VND'
             }).format(price);
             $('.js_price_product').html(price);
             loadTotalCart();
         });
         $(document).on('change keyup', 'input[name="quantity"]', function() {
             loadTotalCart();
         });

         function loadTotalCart() {
             var price = $('#select-repeated-options option:selected').attr('data-price');
             var quantity = $('input[name="quantity"]').val();
             var total = new Intl.NumberFormat('vi-VN', {
                 style: 'currency',
                 currency: 'VND'
             }).format(quantity * price);
             $('.js_total_price_product').html(total);
             $('.js_show_price').toggleClass('hidden');
         }

         $(".btn-submit-cart-now").click(function(e) {
             e.preventDefault();
             var _token = $("#form-cart-now input[name='_token']").val();
             var fullname = $("#form-cart-now input[name='fullname']").val();
             var phone = $("#form-cart-now input[name='phone']").val();
             var address = $("#form-cart-now input[name='address']").val();
             var product = $("#select-repeated-options").val();
             var quantity = $("input[name='quantity']").val();
             $.ajax({
                 url: "<?php echo route('cart.order_now') ?>",
                 type: 'POST',
                 data: {
                     _token: _token,
                     fullname: fullname,
                     phone: phone,
                     address: address,
                     product: product,
                     quantity: quantity,
                 },
                 success: function(data) {
                     if (data.status == 200) {
                         <?php /*  $("#form-cart-now .print-error-msg").css('display', 'none');
                         $("#form-cart-now .print-success-msg").css('display', 'block');
                         $("#form-cart-now .print-success-msg span").html(data.text);*/ ?>
                         window.location.href = BASE_URL_AJAX + "gio-hang/thanh-toan-thanh-cong/" + data.id;
                     } else {
                         $("#form-cart-now .print-error-msg").css('display', 'block');
                         $("#form-cart-now .print-success-msg").css('display', 'none');
                         $("#form-cart-now .print-error-msg span").html(data.error);
                     }
                 }
             });
         });
     })
 </script>
 <?php $__env->stopPush(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/homepage/common/formCart.blade.php ENDPATH**/ ?>