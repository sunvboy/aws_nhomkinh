<?php

$menu_footer = getMenus('menu-footer');

?>

<footer class="bg-primary text-white">

    <div class="pt-[30px] md:pt-20 pb-5">

        <div class="container px-4">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 -mx-[15px]">

                <div class="space-y-[30px] mb-[30px] px-[15px]">

                    <a href="{{url('/')}}"><img src="{{asset($fcSystem['homepage_logo_footer'])}}" alt="logo" style="filter: brightness(0) invert(1);
    width: 50%;"></a>

                    <div class="space-y-3">
                         <p>
                            {!! $fcSystem['homepage_aboutus'] !!}
                        </p>

                        <p class="space-x-2"><i class="fa fa-map-marker-alt"></i><span>{{$fcSystem['contact_address']}}

                            </span></p>

                        <p class="space-x-2"><i class="fa fa-phone"></i><span>{{$fcSystem['contact_hotline']}}</span></p>

                        <p class="space-x-2"><i class="fa fa-envelope"></i><span>{{$fcSystem['contact_email']}}</span></p>


                    </div>

                </div>

                @if($menu_footer && count($menu_footer->menu_items) > 0)

                @foreach($menu_footer->menu_items as $key=>$item)

                @if (count($item->children) > 0)

                <div class="mb-[30px] px-[15px]">

                    <h2 class="footer-title text-xl font-bold text-white pb-[10px] mb-[30px] relative">{{$item->title}}</h2>

                    <ul class="footer-menu text-gray-600 dark:text-gray-400 font-medium space-y-[10px]">

                        @foreach($item->children as $child)

                        <li class="pb-[10px] border-b">

                            <a href="{{url($child->slug)}}" class="text-white">{{$child->title}}</a>

                        </li>

                        @endforeach

                    </ul>

                </div>

                @endif

                @endforeach

                @endif

                @include('homepage.common.subscribers')

            </div>

        </div>

    </div>

    <div class="border-t border-white py-5">

        <div class="container px-4 text-center">

            <p>Copyright © 2023. <a target="_blank" href="https://zalo.me/0348464081">Powered by ONYX</a></p>

        </div>

    </div>



</footer>



<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{asset('frontend/js/placeholderTypewriter.js')}}"></script>



<!-- search -->

<div class="evo_sidebar_search fixed w-[340px] top-0 bottom-0 bg-white overflow-hidden z-[99999] translate-x-full invisible right-0">

    <div class="flex items-center justify-between p-4">

        <h4 class="uppercase font-semibold text-base">Tìm kiếm sản phẩm</h4>

        <a href="" class="search_close">

            <svg class="w-4 h-4 text-black" viewBox="0 0 16 14">

                <path d="M15 0L1 14m14 0L1 0" stroke="currentColor" fill="none" fill-rule="evenodd"></path>

            </svg>

        </a>

    </div>

    <div class="p-4">

        <form class="relative">

            <input type="text" class="search-auto border w-full h-11 px-3 outline-none hover:outline-none focus:outline-none  rounded-lg" name="fullname" aria-describedby="emailHelp" placeholder="Tìm sản phẩm">

            <button class="absolute top-0 right-0 bg-primary h-11 w-12 flex items-center justify-center" type="submit" aria-label="Tìm kiếm">

                <svg class="w-6 h-6 text-white" viewBox="0 0 21 21">

                    <g transform="translate(1 1)" stroke="currentColor" stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="square">

                        <path d="M18 18l-5.7096-5.7096"></path>

                        <circle cx="7.2" cy="7.2" r="7.2"></circle>

                    </g>

                </svg>

            </button>

        </form>

    </div>

    <div class="results-box px-4">



    </div>

</div>

<div id="fixed-social-network" class="d-none d-sm-block">

    <a href="https://zalo.me/{{$fcSystem['social_zalo']}}" class="zalo-icon" target="_blank">

        <img class="img-fluid" alt="Icon-Zalo" src="https://file.hstatic.net/200000259495/file/zalo_d9dc3417eb744b91a44643f29b8c7161.svg">

        Zalo

    </a>

    <a href="{{$fcSystem['social_facebook']}}" target="_blank">

        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 " fill="currentColor" style="color: #1877f2" viewBox="0 0 24 24">

            <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path>

        </svg>

        <span class="ml-[15px]">Facebook</span>



    </a>



    <a href="{{$fcSystem['social_facebookm']}}" class="messenger-icon" target="_blank">

        <img class="img-fluid" alt="Icon-Messager" src="https://file.hstatic.net/200000259495/file/messager_208d7389c4ac46b5a01afad457684cd6.svg">

        Messenger

    </a>



    <a href="{{$fcSystem['social_youtube']}}" target="_blank">

        <img class="img-fluid" alt="Icon-Youtube" src="https://file.hstatic.net/200000259495/file/youtube_479e81022bcb432f89376b2fea8f08ef.svg">

        Youtube

    </a>



    <a href="javascript:;" id="back-to-top">

        <i class="fa fa-angle-up"></i>

        Lên đầu trang

    </a>

</div>

<script>

    $(document).on('keyup change', '.search-auto', function() {

        let keyword = $(this).val();

        time = setTimeout(function() {

            let ajaxUrl = '<?php echo route('homepage.search_ajax') ?>';

            $.get(ajaxUrl, {

                    keyword: keyword,

                    "_token": $('meta[name="csrf-token"]').attr("content")

                },

                function(data) {

                    $('.results-box').html(data.html)

                });

        }, 500);

        return false;

    });

    var activeurl = "<?php echo url('') ?>" + location.pathname;

    console.log(activeurl)

    $('a[href="' + activeurl + '"]').parent('li').addClass('active');

</script>

<style>

    #back-to-top i {

        font-size: 32px;

        margin-right: 15px;

    }



    #fixed-social-network {

        top: 25%;

        right: -125px;

        position: fixed;

        z-index: 9999;

    }



    #fixed-social-network>a {

        border-radius: 3px;

        width: 165px;

        height: 40px;

        line-height: 40px;

        padding: 8px;

        display: -webkit-box;

        display: -webkit-flex;

        display: -ms-flexbox;

        display: flex;

        -webkit-box-align: center;

        -ms-flex-align: center;

        -webkit-align-items: center;

        align-items: center;

        background: #fff;

        color: #333;

        border: 1px solid #e1e1e1;

        margin-bottom: 5px;

        -webkit-transform: translateX(0px);

        transform: translateX(0px);

        -webkit-transition: all 0.6s ease;

        -o-transition: all 0.6s ease;

        transition: all 0.6s ease;

    }



    #fixed-social-network a img {

        height: 100%;

        margin-right: 15px;

    }



    #fixed-social-network>a:hover {

        transform: translateX(-120px);

    }



    @media (max-width: 767px) {

        #fixed-social-network {

            top: 25%;

            right: -125px;

            position: fixed;

            z-index: 9999;

            top: auto;

            bottom: 10%;

        }

    }

</style>

@if(svl_ismobile() != 'is desktop')

<script src="{{asset('frontend/js/hc-offcanvas-nav.js')}}"></script>

<script>

    /*js icon menu bar*/

    function myFunction(x) {

        x.classList.toggle("change")

    }(function($) {

        var $main_nav = $('#main-nav');

        var $toggle = $('.toggle');

        var defaultData = {

            maxWidth: !1,

            customToggle: $toggle,

            levelTitles: !0,

            pushContent: '#container'

        };

        $main_nav.find('li.add').children('a').on('click', function() {

            var $this = $(this);

            var $li = $this.parent();

            var items = eval('(' + $this.attr('data-add') + ')');

            $li.before('<li class="new"><a>' + items[0] + '</a></li>');

            items.shift();

            if (!items.length) {

                $li.remove()

            } else {

                $this.attr('data-add', JSON.stringify(items))

            }

            Nav.update(!0)

        });

        var Nav = $main_nav.hcOffcanvasNav(defaultData);

        const update = (settings) => {

            if (Nav.isOpen()) {

                Nav.on('close.once', function() {

                    Nav.update(settings);

                    Nav.open()

                });

                Nav.close()

            } else {

                Nav.update(settings)

            }

        };

        $('.actions').find('a').on('click', function(e) {

            e.preventDefault();

            var $this = $(this).addClass('active');

            var $siblings = $this.parent().siblings().children('a').removeClass('active');

            var settings = eval('(' + $this.data('demo') + ')');

            update(settings)

        });

        $('.actions').find('input').on('change', function() {

            var $this = $(this);

            var settings = eval('(' + $this.data('demo') + ')');

            if ($this.is(':checked')) {

                update(settings)

            } else {

                var removeData = {};

                $.each(settings, function(index, value) {

                    removeData[index] = !1

                });

                update(removeData)

            }

        })

    })(jQuery)

    //end mobile

</script>

@endif