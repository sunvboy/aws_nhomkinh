  
  <?php $__env->startSection('content'); ?>
  <nav class="relative w-full flex flex-wrap items-center justify-between py-2 bg-[#f9f9f9] text-gray-500 hover:text-gray-700 focus:text-gray-700 navbar navbar-expand-lg navbar-light">
      <div class="container px-4 mx-auto w-full flex flex-wrap items-center justify-between">
          <nav class="bg-grey-light w-full" aria-label="breadcrumb">
              <ol class="list-reset flex">
                  <li><a href="<?php echo url('') ?>" class="text-gray-500 hover:text-gray-600 text-f13"><?php echo e(trans('index.home')); ?></a></li>
                  <li><span class="text-gray-500 mx-2">/</span></li>
                  <li><a href="javascript:void(0)" class="text-gray-500 hover:text-gray-600 text-f13"><?php echo e($page->title); ?></a></li>
              </ol>
          </nav>
      </div>
  </nav>
  <main class="pt-3 ">
      <div class="container px-4 py-5">
          <h1 class="text-2xl mb-[30px] font-bold"><?php echo e($page->title); ?></h1>
          <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
              <div>
                  <img src="<?php echo e(asset('frontend/images/contact_icon_1.svg')); ?>" alt="<?php echo e($page->title); ?>" class="lazy mx-auto w-10 mb-4">
                  <div class="font-medium text-f15 text-center">
                      <?php echo e($fcSystem['contact_address']); ?>

                  </div>
              </div>
              <div>
                  <img src="<?php echo e(asset('frontend/images/contact_icon_2.svg')); ?>" alt="<?php echo e($page->title); ?>" class="lazy mx-auto w-10 mb-4">
                  <div class="font-medium text-f15 text-center">
                      <a href="tel:<?php echo e($fcSystem['contact_hotline']); ?>"><?php echo e($fcSystem['contact_hotline']); ?></a>
                  </div>
              </div>
              <div>
                  <img src="<?php echo e(asset('frontend/images/contact_icon_3.svg')); ?>" alt="<?php echo e($page->title); ?>" class="lazy mx-auto w-10 mb-4">
                  <div class="font-medium text-f15 text-center">
                      <a href="mailto:<?php echo e($fcSystem['contact_email']); ?>"><?php echo e($fcSystem['contact_email']); ?></a>
                  </div>
              </div>
              <div>
                  <img src="<?php echo e(asset('frontend/images/contact_icon_4.svg')); ?>" alt="<?php echo e($page->title); ?>" class="lazy mx-auto w-10 mb-4">
                  <div class="font-medium text-f15 text-center">
                      <?php echo $fcSystem['contact_time'] ?>
                  </div>
              </div>

          </div>
          <div class="my-8">
              <div class="grid md:grid-cols-2 gap-8">
                  <div class="bg-[#f4f6f8] rounded-2xl p-6">
                      <h3 class="font-bold text-lg">
                          <?php echo e(trans('index.Questions')); ?>

                      </h3>
                      <p class="text-f14 mb-[10px]">
                          <?php echo e(trans('index.information')); ?>

                      </p>
                      <form id="form-submit-contact">
                          <?php echo csrf_field(); ?>
                          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-2 print-error-msg " style="display: none">
                              <strong class="font-bold">ERROR!</strong>
                              <span class="block sm:inline"></span>
                          </div>
                          <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mt-2 print-success-msg" style="display: none">
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
                          <div class="mt-2">
                              <label class="font-bold text-f14"><?php echo e(trans('index.Fullname')); ?><span class="text-f13 text-red-600">*</span></label>
                              <input type="text" class="  border w-full h-11 px-3 focus:outline-none focus:ring focus:ring-red-300  hover:outline-none hover:ring hover:ring-red-300  rounded-lg" name="fullname" aria-describedby="emailHelp" placeholder="<?php echo e(trans('index.Fullname')); ?>">
                          </div>
                          <div class="mt-2">
                              <label class="font-bold text-f14">Email<span class="text-f13 text-red-600">*</span></label>
                              <input type="email" class="border w-full h-11 px-3 focus:outline-none focus:ring focus:ring-red-300  hover:outline-none hover:ring hover:ring-red-300  rounded-lg" name="email" placeholder="Email">
                          </div>
                          <div class="mt-2">

                              <label class="font-bold text-f14"><?php echo e(trans('index.Phone')); ?><span class="text-f13 text-red-600">*</span></label>
                              <input type="text" class="border w-full h-11 px-3 focus:outline-none focus:ring focus:ring-red-300  hover:outline-none hover:ring hover:ring-red-300  rounded-lg" name="phone" placeholder="<?php echo e(trans('index.Phone')); ?>">
                          </div>
                          <div class="mt-2">
                              <label class="font-bold text-f14"><?php echo e(trans('index.Address')); ?></label>
                              <input type="text" class="border w-full h-11 px-3 focus:outline-none focus:ring focus:ring-red-300  hover:outline-none hover:ring hover:ring-red-300  rounded-lg" name="address" placeholder="<?php echo e(trans('index.Address')); ?>">
                          </div>
                          <div class="mt-2">
                              <label class="font-bold text-f14"><?php echo e(trans('index.Message')); ?><span class="text-f13 text-red-600">*</span></label>
                              <textarea rows="6" class="border w-full px-3 focus:outline-none focus:ring focus:ring-red-300  hover:outline-none hover:ring hover:ring-red-300  rounded-lg" name="message" placeholder="<?php echo e(trans('index.Message')); ?>"></textarea>
                          </div>
                          <button type="submit" class="btn-submit-contact py-4 px-1 md:px-8 rounded-lg block bg-primary  text-white transition-all leading-none text-f15 font-bold"> <?php echo e(trans('index.SendContactInformation')); ?></button>
                      </form>
                  </div>
                  <div>
                      <?php echo $fcSystem['contact_map'] ?>
                  </div>
              </div>
          </div>
      </div>
  </main>
  <style>
      iframe {
          height: 100%
      }
  </style>
  <?php $__env->stopSection(); ?>
  <?php $__env->startPush('javascript'); ?>
  <script type="text/javascript">
      $(document).ready(function() {
          $(".btn-submit-contact").click(function(e) {
              e.preventDefault();
              var _token = $("#form-submit-contact input[name='_token']").val();
              var fullname = $("#form-submit-contact input[name='fullname']").val();
              var phone = $("#form-submit-contact input[name='phone']").val();
              var email = $("#form-submit-contact input[name='email']").val();
              var address = $("#form-submit-contact input[name='address']").val();
              var message = $("#form-submit-contact textarea[name='message']").val();
              $.ajax({
                  url: "<?php echo route('contactFrontend.store') ?>",
                  type: 'POST',
                  data: {
                      _token: _token,
                      fullname: fullname,
                      phone: phone,
                      email: email,
                      address: address,
                      message: message
                  },
                  success: function(data) {
                      if (data.status == 200) {
                          $("#form-submit-contact .print-error-msg").css('display', 'none');
                          $("#form-submit-contact .print-success-msg").css('display', 'block');
                          $("#form-submit-contact .print-success-msg span").html(
                              "<?php echo $fcSystem['message_2'] ?>");
                          setTimeout(function() {
                              location.reload();
                          }, 3000);
                      } else {
                          $("#form-submit-contact .print-error-msg").css('display', 'block');
                          $("#form-submit-contact .print-success-msg").css('display', 'none');
                          $("#form-submit-contact .print-error-msg span").html(data.error);
                      }
                  }
              });
          });
      });
  </script>
  <?php $__env->stopPush(); ?>
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rosta0607/domains/rosta.vn/public_html/resources/views/contact/frontend/index.blade.php ENDPATH**/ ?>