// Quyền new
$('.js-header-search').click(function () {
    $(".evo_sidebar_search,.backdrop__body-backdrop___1rvky").toggleClass('active');
});
$(document).on('click', '.backdrop__body-backdrop___1rvky, .evo-close-menu, .cart_btn-close, .search_close,.offcanvas-close', function (e) {
    $(".mobile-main-menu, .cart_sidebar, .evo_sidebar_search,#offcanvas-cart,.backdrop__body-backdrop___1rvky").removeClass('active');
});
$('.tp-cart').click(function () {
    $('#offcanvas-cart,.backdrop__body-backdrop___1rvky').addClass('active');
});
var placeholderText = ['Nhập tên sản phẩm...', 'Gối Đỡ Căng Đai', 'Gối Đỡ Giảm Chấn', 'Gối Đỡ'];
$('.search-auto').placeholderTypewriter({ text: placeholderText });
$('.search-auto-custom').placeholderTypewriter({ text: placeholderText });

$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() != 0) {
            $("#back-to-top").fadeIn();
        } else {
            $("#back-to-top").fadeOut();
        }
    });
    $("#back-to-top").click(function () {
        $("body,html").animate({
            scrollTop: 0
        }, 800);
    });
});

$('.slide-bannerHome').owlCarousel({

    loop: true,

    margin: 0,

    nav: false,

    dots: false,

    items: 1,

    autoplay: false,

    autoplayTimeout: 5000,

    autoplayHoverPause: true,

});
$('.slide-client').owlCarousel({

    loop: true,

    margin: 30,

    nav: false,

    dots: true,

    items: 3,

    autoplay: true,

    autoplayTimeout: 5000,

    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 2,
        },
        1000: {
            items: 3,

        }
    }

});
$('.slide-news').owlCarousel({

    loop: true,

    margin: 30,

    nav: false,

    dots: true,

    items: 2,

    autoplay: true,

    autoplayTimeout: 5000,

    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 2,
        },
        1000: {
            items: 2,

        }
    }

});
$('.slide-products').owlCarousel({

    loop: true,

    margin: 30,

    nav: false,

    dots: true,

    items: 3,

    autoplay: true,

    autoplayTimeout: 5000,

    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 2,
        },
        600: {
            items: 2,
        },
        1000: {
            items: 3,

        }
    }

});