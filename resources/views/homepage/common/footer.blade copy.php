<?php
$menu_footer = getMenus('menu-footer');
$slideServices = Cache::remember('slideServices', 600, function () {
    $slideServices = \App\Models\CategorySlide::select('title', 'id')->where(['alanguage' => config('app.locale'), 'keyword' => 'services'])->with('slides')->first();
    return $slideServices;
});
?>
<footer class="bg-[#222] pt-[30px]">
    <div class="container px-4 mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 -mx-4 pb-[30px] space-y-5 lg:space-y-0">
            <div class="px-4 space-y-3">
                <a href="/" title="Evo Fishing" class="logo-wrapper">
                    <img class="h-[50px] mx-auto" src="//bizweb.dktcdn.net/100/394/912/themes/774842/assets/footer-logo.png?1685438145671" alt="">
                </a>
                <div class="text-white ">
                    Evo Fishing là một trong những nhà phân phối đồ câu cá uy tín các thương hiệu đồ câu, cần câu, máy câu Shimano, Daiwa, Rapala. Với phương châm " Chất lượng, uy tín - Bền lâu trọn đời" Sẽ đáp ứng mọi nhu cầu về Sở thích câu cá, đồ câu, phụ kiện câu.
                </div>
                <div class="space-y-2">
                    <div class="flex space-x-2 items-center">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="-61 0 443 443.288" width="20px">
                                <path d="m96.144531 136v88h32v-56c0-4.417969 3.582031-8 8-8h48c4.417969 0 8 3.582031 8 8v56h32v-88c0-4.417969 3.582031-8 8-8h8.480469l-80.480469-61.902344-80.480469 61.902344h8.480469c4.417969 0 8 3.582031 8 8zm0 0" data-original="#000000" class="active-path" data-old_color="#000000" fill="#fff"></path>
                                <path d="m144.144531 176h32v48h-32zm0 0" data-original="#000000" class="active-path" data-old_color="#000000" fill="#fff"></path>
                                <path d="m160.144531 443.289062c30.101563-37.585937 160-204.328124 160-283.289062 0-88.367188-71.636719-160-160-160-88.367187 0-160 71.632812-160 160 0 78.976562 129.894531 245.710938 160 283.289062zm-108.878906-313.601562 104-80c2.875-2.214844 6.882813-2.214844 9.757813 0l104 80c2.691406 2.097656 3.757812 5.667969 2.65625 8.894531-1.097657 3.226563-4.125 5.402344-7.535157 5.417969h-24v88c0 4.417969-3.582031 8-8 8h-144c-4.417969 0-8-3.582031-8-8v-88h-24c-3.421875 0-6.464843-2.179688-7.570312-5.421875-1.101563-3.242187-.019531-6.824219 2.691406-8.914063zm0 0" data-original="#000000" class="active-path" data-old_color="#000000" fill="#fff"></path>
                            </svg>
                        </div>
                        <div class="text-white">
                            <p>70 Lu Gia, Ward 15, District 11, Ho Chi Minh City</p>
                        </div>
                    </div>
                    <?php /*<div class="flex space-x-2 items-center">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 480.56 480.56" style="enable-background:new 0 0 480.56 480.56;" xml:space="preserve" width="20px" height="20px">
                                <path d="M365.354,317.9c-15.7-15.5-35.3-15.5-50.9,0c-11.9,11.8-23.8,23.6-35.5,35.6c-3.2,3.3-5.9,4-9.8,1.8    c-7.7-4.2-15.9-7.6-23.3-12.2c-34.5-21.7-63.4-49.6-89-81c-12.7-15.6-24-32.3-31.9-51.1c-1.6-3.8-1.3-6.3,1.8-9.4    c11.9-11.5,23.5-23.3,35.2-35.1c16.3-16.4,16.3-35.6-0.1-52.1c-9.3-9.4-18.6-18.6-27.9-28c-9.6-9.6-19.1-19.3-28.8-28.8    c-15.7-15.3-35.3-15.3-50.9,0.1c-12,11.8-23.5,23.9-35.7,35.5c-11.3,10.7-17,23.8-18.2,39.1c-1.9,24.9,4.2,48.4,12.8,71.3    c17.6,47.4,44.4,89.5,76.9,128.1c43.9,52.2,96.3,93.5,157.6,123.3c27.6,13.4,56.2,23.7,87.3,25.4c21.4,1.2,40-4.2,54.9-20.9    c10.2-11.4,21.7-21.8,32.5-32.7c16-16.2,16.1-35.8,0.2-51.8C403.554,355.9,384.454,336.9,365.354,317.9z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#fff"></path>
                                <path d="M346.254,238.2l36.9-6.3c-5.8-33.9-21.8-64.6-46.1-89c-25.7-25.7-58.2-41.9-94-46.9l-5.2,37.1    c27.7,3.9,52.9,16.4,72.8,36.3C329.454,188.2,341.754,212,346.254,238.2z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#fff"></path>
                                <path d="M403.954,77.8c-42.6-42.6-96.5-69.5-156-77.8l-5.2,37.1c51.4,7.2,98,30.5,134.8,67.2c34.9,34.9,57.8,79,66.1,127.5    l36.9-6.3C470.854,169.3,444.354,118.3,403.954,77.8z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#fff"></path>
                            </svg>
                        </div>
                        <div class="text-white">
                            <a href="tel:19006750" title="19006750">1900 6750</a>
                        </div>
                    </div>*/ ?>
                    <div class="flex space-x-2 items-center">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 437.676 437.676" style="enable-background:new 0 0 437.676 437.676;" xml:space="preserve" width="20px" height="20px" class="">
                                <polygon points="218.841,256.659 19.744,81.824 417.931,81.824  " data-original="#010002" class="active-path" data-old_color="#010002" fill="#fff"></polygon>
                                <polygon points="139.529,218.781 0,341.311 0,96.252  " data-original="#010002" class="active-path" data-old_color="#010002" fill="#fff"></polygon>
                                <polygon points="157.615,234.665 218.841,288.427 280.055,234.665 418.057,355.852 19.619,355.852  " data-original="#010002" class="active-path" data-old_color="#010002" fill="#fff"></polygon>
                                <polygon points="298.141,218.787 437.676,96.252 437.676,341.311  " data-original="#010002" class="active-path" data-old_color="#010002" fill="#fff"></polygon>
                            </svg>
                        </div>
                        <div class="text-white">

                            <a href="mailto:support@sapo.vn" title="support@sapo.vn">support@sapo.vn</a>

                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row space-y-5 md:space-y-0">
                    <div class="md:w-1/2 flex flex-col space-y-1">
                        <span class="font-bold text-white uppercase">Gọi cho chúng tôi 24/7
                        </span>
                        <a href="" class="text-primary font-black text-2xl">
                            1900 6750
                        </a>
                    </div>
                    <div class="md:w-1/2 flex flex-col space-y-1">
                        <span class="font-bold text-white uppercase">kênh mua hàng
                        </span>
                        <div class="flex space-x-3 items-center">
                            <a href="https://shopee.vn/uulttyvietnam.shop" target="_blank" class="inline-block rounded-full text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 48 48">
                                    <path fill="#f4511e" d="M36.683,43H11.317c-2.136,0-3.896-1.679-3.996-3.813l-1.272-27.14C6.022,11.477,6.477,11,7.048,11 h33.904c0.571,0,1.026,0.477,0.999,1.047l-1.272,27.14C40.579,41.321,38.819,43,36.683,43z"></path>
                                    <path fill="#f4511e" d="M32.5,11.5h-2C30.5,7.364,27.584,4,24,4s-6.5,3.364-6.5,7.5h-2C15.5,6.262,19.313,2,24,2 S32.5,6.262,32.5,11.5z"></path>
                                    <path fill="#fafafa" d="M24.248,25.688c-2.741-1.002-4.405-1.743-4.405-3.577c0-1.851,1.776-3.195,4.224-3.195 c1.685,0,3.159,0.66,3.888,1.052c0.124,0.067,0.474,0.277,0.672,0.41l0.13,0.087l0.958-1.558l-0.157-0.103 c-0.772-0.521-2.854-1.733-5.49-1.733c-3.459,0-6.067,2.166-6.067,5.039c0,3.257,2.983,4.347,5.615,5.309 c3.07,1.122,4.934,1.975,4.934,4.349c0,1.828-2.067,3.314-4.609,3.314c-2.864,0-5.326-2.105-5.349-2.125l-0.128-0.118l-1.046,1.542 l0.106,0.087c0.712,0.577,3.276,2.458,6.416,2.458c3.619,0,6.454-2.266,6.454-5.158C30.393,27.933,27.128,26.741,24.248,25.688z"></path>
                                </svg>
                            </a>
                            <a href="https://www.lazada.vn/shop/ultty?path=index.htm&amp;lang=vi&amp;pageTypeId=1" target="_blank" class="inline-block rounded-full text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 ">
                                <img src="https://u-ultty.com.vn/images/TB1iTziekWE3KVjSZSyXXXocXXa-42-42.png" alt="icom-lazada" style="width: 30px">
                            </a>
                            <a href="https://tiki.vn/cua-hang/u-ultty?t=product" target="_blank">
                                <img src="https://u-ultty.com.vn/images/270be9859abd5f5ec5071da65fab0a94.png" alt="icon tiki" style="width: 30px">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" px-4">
                <div class="grid md:grid-cols-3 -mx-4 space-y-5 lg:space-y-0">
                    <div class="px-4">
                        <h4 class="uppercase text-white mb-4 font-bold">Liên kết</h4>
                        <div class="flex flex-col space-y-1">
                            <a class="text-white" href="/" title="Trang chủ" rel="nofollow">Trang chủ</a>

                            <a class="text-white" href="/gioi-thieu" title="Giới thiệu" rel="nofollow">Giới thiệu</a>

                            <a class="text-white" href="/collections/all" title="Sản phẩm" rel="nofollow">Sản phẩm</a>

                            <a class="text-white" href="/blogs/all" title="Tin tức" rel="nofollow">Tin tức</a>

                            <a class="text-white" href="/lien-he" title="Liên hệ" rel="nofollow">Liên hệ</a>

                            <a class="text-white" href="/faq" title="FAQ" rel="nofollow">FAQ</a>

                        </div>
                    </div>
                    <div class="px-4">
                        <h4 class="uppercase text-white mb-4 font-bold">Liên kết</h4>
                        <div class="flex flex-col space-y-1">
                            <a class="text-white" href="/" title="Trang chủ" rel="nofollow">Trang chủ</a>

                            <a class="text-white" href="/gioi-thieu" title="Giới thiệu" rel="nofollow">Giới thiệu</a>

                            <a class="text-white" href="/collections/all" title="Sản phẩm" rel="nofollow">Sản phẩm</a>

                            <a class="text-white" href="/blogs/all" title="Tin tức" rel="nofollow">Tin tức</a>

                            <a class="text-white" href="/lien-he" title="Liên hệ" rel="nofollow">Liên hệ</a>

                            <a class="text-white" href="/faq" title="FAQ" rel="nofollow">FAQ</a>

                        </div>
                    </div>
                    <div class="px-4">
                        <h4 class="uppercase text-white mb-4 font-bold">Liên kết</h4>
                        <div class="flex flex-col space-y-1">
                            <a class="text-white" href="/" title="Trang chủ" rel="nofollow">Trang chủ</a>

                            <a class="text-white" href="/gioi-thieu" title="Giới thiệu" rel="nofollow">Giới thiệu</a>

                            <a class="text-white" href="/collections/all" title="Sản phẩm" rel="nofollow">Sản phẩm</a>

                            <a class="text-white" href="/blogs/all" title="Tin tức" rel="nofollow">Tin tức</a>

                            <a class="text-white" href="/lien-he" title="Liên hệ" rel="nofollow">Liên hệ</a>

                            <a class="text-white" href="/faq" title="FAQ" rel="nofollow">FAQ</a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="text-center border-t border-[#333] py-3 text-white">
        <span>© Bản quyền thuộc về <b>Evo Themes</b> <span class="s480-f">|</span> Cung cấp bởi <a href="https://zalo.me/0348464081" target="_blank">[ONYX]</a></span>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('frontend/js/placeholderTypewriter.js')}}"></script>
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
    <div class="results-box">
        <div class="flex space-x-2 border-b py-2">
            <div class="w-[70px]">
                <a href="">
                    <img src="//bizweb.dktcdn.net/thumb/compact/100/394/912/products/1-1f7eefd7-bda7-46be-ab70-31a703b614e0-png-v-1590500585.jpg?v=1593504337020">
                </a>
            </div>
            <div class="flex-1">
                <a href="" class="text-sm">Máy Câu Ngang Daiwa Steez Air TW 2020</a>
                <div class="text-sm text-primary font-semibold">15.500.000₫</div>
            </div>
        </div>
        <div class="flex space-x-2 border-b py-2">
            <div class="w-[70px]">
                <a href="">
                    <img src="//bizweb.dktcdn.net/thumb/compact/100/394/912/products/1-1f7eefd7-bda7-46be-ab70-31a703b614e0-png-v-1590500585.jpg?v=1593504337020">
                </a>
            </div>
            <div class="flex-1">
                <a href="" class="text-sm">Máy Câu Ngang Daiwa Steez Air TW 2020</a>
                <div class="text-sm text-primary font-semibold">15.500.000₫</div>
            </div>
        </div>
        <div class="flex space-x-2 border-b py-2">
            <div class="w-[70px]">
                <a href="">
                    <img src="//bizweb.dktcdn.net/thumb/compact/100/394/912/products/1-1f7eefd7-bda7-46be-ab70-31a703b614e0-png-v-1590500585.jpg?v=1593504337020">
                </a>
            </div>
            <div class="flex-1">
                <a href="" class="text-sm">Máy Câu Ngang Daiwa Steez Air TW 2020</a>
                <div class="text-sm text-primary font-semibold">15.500.000₫</div>
            </div>
        </div>
        <div class="py-3 flex justify-center">
            <a href="" class="font-bold text-base hover:text-primary">
                Xem tất cả
            </a>
        </div>
    </div>
</div>