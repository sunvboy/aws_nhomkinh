<!-- <script src="{{asset('frontend/js/owl.carousel.min.js') }}"></script> -->
<script rel="preload" src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<!-- <script src="{{asset('frontend/js/wow.min.js') }}"></script> -->
<script rel="preload" src="{{asset('frontend/js/main.js') }}"></script>
@if(svl_ismobile() != 'is desktop')
<script rel="preload" src="{{ asset('frontend/js/menu-mobile.js') }}"></script>
@endif

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
</script> -->