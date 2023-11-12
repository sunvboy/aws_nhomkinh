<!-- <script src="<?php echo e(asset('frontend/js/owl.carousel.min.js')); ?>"></script> -->
<script rel="preload" src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<!-- <script src="<?php echo e(asset('frontend/js/wow.min.js')); ?>"></script> -->
<script rel="preload" src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>
<?php if(svl_ismobile() != 'is desktop'): ?>
<script rel="preload" src="<?php echo e(asset('frontend/js/menu-mobile.js')); ?>"></script>
<?php endif; ?>

<!-- <script>
    //hieu ung wow------------------------------------------
    wow = new WOW({
        animateClass: "animated",
        offset: 100,
        callback: function(box) {
            console.log("WOW: animating <" + box.tagName.toLowerCase() + ">");
        },
    });
    wow.init();
</script> --><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/homepage/common/script.blade.php ENDPATH**/ ?>