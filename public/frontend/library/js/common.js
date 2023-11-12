/*modal form comment*/
let modal = document.getElementById("modal");
function modalHandler(val) {
    if (val) {
        fadeIn(modal);
    } else {
        fadeOut(modal);
    }
}
function fadeOut(el) {
    el.style.opacity = 1;
    (function fade() {
        if ((el.style.opacity -= 0.1) < 0) {
            el.style.display = "none";
        } else {
            requestAnimationFrame(fade);
        }
    })();
}
function fadeIn(el, display) {
    el.style.opacity = 0;
    el.style.display = display || "flex";
    (function fade() {
        let val = parseFloat(el.style.opacity);
        if (!((val += 0.2) > 1)) {
            el.style.opacity = val;
            requestAnimationFrame(fade);
        }
    })();
}

/*END: modal form comment*/
$("input.rating-disabled").rating({
    filled: 'fa fa-star rating-color',
    empty: 'fa fa-star-o'
 });
$(document).ready(function () {
    $(document).on('click', '.review_images_item', function (e) {
        $(".UNFVx").css('opacity', 1);
        $(".UNFVx").css('z-index', 99999999);
    });
    $(document).on('click', '.btn-close', function (e) {
        $(".UNFVx").css('opacity', 0);
        $(".UNFVx").css('z-index', -1);

    });
    $('.cSlider--single').slick({
        slide: '.cSlider__item',
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: false,
        adaptiveHeight: true,
        infinite: false,
        useTransform: true,
        speed: 400,
        cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
        prevArrow: '<div class="slick-prev"><i class="fa fa-right></i></div>',
        nextArrow: '<div class="slick-next"><i class="ion-ios-arrow-right"></i><span class="sr-only sr-only-focusable">></span></div>'
    });

    $('.cSlider--nav').on('init', function (event, slick) {
        $(this).find('.slick-slide.slick-current').addClass('is-active');
    }).slick({
        slide: '.cSlider__item',
        slidesToShow: 12,
        slidesToScroll: 12,
        dots: false,
        focusOnSelect: false,
        infinite: false,
        arrows: true,
        prevArrow: '<div class="slick-prev-1"><i class="fa fa-angle-right></i></div>',
        nextArrow: '<div class="slick-next-1"><i class="fa fa-angle-left></i></div>',
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 5,
            }
        }, {
            breakpoint: 640,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4,
            }
        }, {
            breakpoint: 420,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
            }
        }]
    });

    $('.cSlider--single').on('afterChange', function (event, slick, currentSlide) {
        $('.cSlider--nav').slick('slickGoTo', currentSlide);
        $('.cSlider--nav').find('.slick-slide.is-active').removeClass('is-active');
        $('.cSlider--nav').find('.slick-slide[data-slick-index="' + currentSlide + '"]').addClass(
            'is-active');
    });

    $('.cSlider--nav').on('click', '.slick-slide', function (event) {
        event.preventDefault();
        var goToSingleSlide = $(this).data('slick-index');

        $('.cSlider--single').slick('slickGoTo', goToSingleSlide);
    });
    /*product version */
    var attr = [];
    $('.js_item_variable.checked').each(function (i, obj) {
        var id = parseInt($(this).attr('data-id'));
        attr.push(id);
    });
    $.post(BASE_URL_AJAX + 'ajax/product/product-version', {
            attr: JSON.stringify(attr),
            module_id: $('#detailProductID').val(),
            "_token": $('meta[name="csrf-token"]').attr("content")
        },
        function (data) {
            var result = JSON.parse(data);
            if(result.type == 'variable'){
                loadDataVersion(result);
            }
        }
    );
    $(document).on('click', '.js_item_variable:not(.disabled)', function (e) {
        $('.js_item_variable:not(.disabled)').removeClass('disabled');
        $(this).parent().find('.js_item_variable').removeClass('checked');
        $(this).addClass('checked');
        var stt = $(this).attr('data-stt');
        var attr = [];
        $('.js_item_variable.checked').each(function (i, obj) {
            var id = parseInt($(this).attr('data-id'));
            attr.push(id);
        });
        $.post(BASE_URL_AJAX + 'ajax/product/product-version', {
                stt: stt,
                attr: JSON.stringify(attr),
                module_id: $('#detailProductID').val(),
                "_token": $('meta[name="csrf-token"]').attr("content")
            },
            function (data) {
                var result = JSON.parse(data);
                loadDataVersion(result);
            }
        );
    })

    function loadDataVersion(result) {
        $('.addtocart').removeClass('disabled');
        /*array id het hang*/
        if (result.idOutStock.length > 0) {
            console.log(1);
            result.idOutStock.forEach(element => {
                $('.js_item_variable_' + element + '').removeClass('checked').addClass('disabled');
            });
        }
        if (result.idStock > 0) {
            var _inStock = $('.js_item_variable_' + result.idStock + '');
            _inStock.parent().find('.js_item_variable').removeClass('checked');
            $('.js_item_variable_' + result.idStock + '').addClass('checked');
            if (result.data._stock > 0) {
                $('input.card-quantity').attr('max',result.data._stock)
                $('.js_product_stock').text(result.data._stock + ' sản phẩm có sẵn');
            } else {
                $('input.card-quantity').attr('max',1000)
                $('.js_product_stock').text('sản phẩm có sẵn');
            }
        } else {
            console.log('Het hang');
            var arr = result.idOutStock;
            arr.sort();
            for (let index = 0; index < arr.length; ++index) {
                if (index == 0) {
                    $('.js_item_variable_' + arr[index] + '').addClass('checked');
                }
            }
            $('.addtocart').addClass('disabled');
            $('.js_product_stock').text('Hết hàng');
        }
        /*array id con hang*/
      var title = JSON.parse(result.data.title_version).join(', ');
            var price_version = parseFloat(result.data.price_version);
            var price_sale_version = parseFloat(result.data.price_sale_version);
            $('.addtocart').attr('data-title-version', title);
            $('.addtocart').attr('data-src', result.data.image_version);
            $('.addtocart').attr('data-id-version', result.data.id_version);
            $('.js_product_code').text(result.data.code_version);
        
        if (price_sale_version > 0) {
            $('.addtocart').attr('data-price', price_sale_version);
            $('.js_product_price_final').text(numberWithCommas(price_sale_version) + 'đ');
            $('.js_product_price_old').text(numberWithCommas(price_version) + 'đ');
            var percent = Math.round((price_version - price_sale_version) * 100 / price_version);
            $('.js_product_percent').text('-' + percent + '%');
        } else {
            $('.addtocart').attr('data-price', price_version);
        }
    }
});
