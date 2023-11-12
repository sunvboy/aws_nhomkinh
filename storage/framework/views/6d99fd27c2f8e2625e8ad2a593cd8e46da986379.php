<div class="mb-[30px] px-[15px]">
    <h2 class="footer-title text-xl font-bold text-white pb-[10px] mb-[30px] relative">Đăng ký nhận tin
    </h2>
    <div class="space-y-2">
        <div>
            Hãy nhập email của bạn vào đây để nhận tin mới nhất!
        </div>
        <form action="" class="relative form-subscribe">
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
            <input type="text" placeholder="Nhập email" name="email" class="h-[40px] w-full text-f14 pl-[10px] text-black bg-white outline-none focus:outline-none hover:outline-none" />
            <button class="h-[40px] absolute w-[40px] right-0 text-center btn-submit bg-black">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                </svg>
            </button>
        </form>
        <div class="flex space-x-2">
            <a href="" class="float-left w-[30px] h-[30px] flex justify-center items-center" style="background: #292a5d;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                </svg>
            </a>
            <a href="" class="float-left w-[30px] h-[30px] flex justify-center items-center" style="background: #292a5d;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M7 11v2.4h3.97c-.16 1.029-1.2 3.02-3.97 3.02-2.39 0-4.34-1.979-4.34-4.42 0-2.44 1.95-4.42 4.34-4.42 1.36 0 2.27.58 2.79 1.08l1.9-1.83c-1.22-1.14-2.8-1.83-4.69-1.83-3.87 0-7 3.13-7 7s3.13 7 7 7c4.04 0 6.721-2.84 6.721-6.84 0-.46-.051-.81-.111-1.16h-6.61zm0 0 17 2h-3v3h-2v-3h-3v-2h3v-3h2v3h3v2z" fill-rule="evenodd" clip-rule="evenodd" />
                </svg>
            </a>
            <a href="" class="float-left w-[30px] h-[30px] flex justify-center items-center" style="background: #292a5d;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                </svg>
            </a>
        </div>
    </div>
</div>
<?php $__env->startPush('javascript'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $(".btn-submit").click(function(e) {
            e.preventDefault();
            var _token = $(".form-subscribe input[name='_token']").val();
            var email = $(".form-subscribe input[name='email']").val();
            $.ajax({
                url: "<?php echo route('contactFrontend.subcribers') ?>",
                type: 'POST',
                data: {
                    _token: _token,
                    email: email,
                    type: "email",
                },
                success: function(data) {
                    if (data.status == 200) {
                        $(".form-subscribe .print-error-msg").css('display', 'none');
                        $(".form-subscribe .print-success-msg").css('display', 'block');
                        $(".form-subscribe .print-success-msg span").html(
                            "<?php echo $fcSystem['message_1'] ?>");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else {
                        $(".form-subscribe .print-error-msg").css('display', 'block');
                        $(".form-subscribe .print-success-msg").css('display', 'none');
                        $(".form-subscribe .print-error-msg span").html(data.error);
                    }
                }
            });
        });
    });
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/rosta0607/domains/quyenit.com/public_html/resources/views/homepage/common/subscribers.blade.php ENDPATH**/ ?>