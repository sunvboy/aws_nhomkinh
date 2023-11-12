<?php if (!empty(Auth::user())) { ?>
    <div class="w-full bg-[#282828] text-center z-50">
        <a href="<?php echo e(route('homepage.clearCache')); ?>" class="text-white font-bold py-2 px-4 rounded neonShadow flex justify-center items-center">Xóa cache</a>
    </div>
<?php } ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/homepage/common/cache.blade.php ENDPATH**/ ?>