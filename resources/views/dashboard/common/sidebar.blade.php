<?php $dropdown = getFunctions(); ?>
<nav class="side-nav">
    <div class="pt-4 mb-4">
        <div class="side-nav__header flex items-center">
            <a href="{{route('admin.dashboard')}}" class=" flex items-center">
                <img alt="Rocketman Tailwind HTML Admin Template" class="side-nav__header__logo" src="{{asset('backend/images/logo.svg')}}">
                <span class="side-nav__header__text text-white pt-0.5 text-lg ml-2.5"> {{env('BE_TITLE_SEO')}} </span>
            </a>
            <a href="javascript:;" class="side-nav__header__toggler hidden xl:block ml-auto text-white text-opacity-70 hover:text-opacity-100 transition-all duration-300 ease-in-out pr-5">
                <i data-lucide="arrow-left-circle" class="w-5 h-5"></i>
            </a>
            <a href="javascript:;" class="mobile-menu-toggler xl:hidden ml-auto text-white text-opacity-70 hover:text-opacity-100 transition-all duration-300 ease-in-out pr-5">
                <i data-lucide="x-circle" class="w-5 h-5"></i>
            </a>
        </div>
    </div>
    <div class="scrollable">
        <ul class="scrollable__content">
            <li class="side-nav__devider mb-4">START MENU</li>
            <li>
                <a href="{{route('admin.dashboard')}}" class="side-menu {{ activeMenu('dashboard') }}">
                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                    <div class="side-menu__title">
                        Dashboard
                    </div>
                </a>
            </li>
            @can('articles_index')
            <?php if (in_array('articles', $dropdown) && !empty($module)) { ?>
                <li>
                    <a href="javascript:void(0)" class="side-menu {{ request()->routeIs('articles.index') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                        <div class="side-menu__title">
                            Quản lý Bài viết
                            <div class="side-menu__sub-icon <?php if ($module === 'category_articles' || $module === 'articles') { ?>transform rotate-180<?php } ?>">
                                <i data-lucide="chevron-down"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="<?php if ($module === 'category_articles' || $module === 'articles') { ?>side-menu__sub-open<?php } ?>">
                        @can('category_articles_index')
                        <li>
                            <a href="{{route('category_articles.index')}}" class="side-menu {{ activeMenu('category-articles') }}">
                                <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                                <div class="side-menu__title"> Danh mục bài viết</div>
                            </a>
                        </li>
                        @endcan
                        <li>
                            <a href="{{route('articles.index')}}" class="side-menu {{ activeMenu('articles') }}">
                                <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                                <div class="side-menu__title"> Bài viết </div>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
            @endcan
            <!-- END: Quản lý bài viết -->
            <!-- Start: Quản lý product -->
            @can('products_index')
            <?php if (in_array('products', $dropdown) && !empty($module)) { ?>
                <li>
                    <a href="javascript:void(0)" class="side-menu <?php if ($module === 'category_products' || $module === 'products' || $module === 'brands') { ?>side-menu--active<?php } ?>">
                        <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                        <div class="side-menu__title">
                            Quản lý Sản phẩm
                            <div class="side-menu__sub-icon <?php if ($module === 'category_products' || $module === 'products' || $module === 'brands') { ?>transform rotate-180<?php } ?>">
                                <i data-lucide="chevron-down"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="<?php if ($module === 'category_products' || $module === 'products' || $module === 'brands') { ?>side-menu__sub-open<?php } ?>">
                        @can('category_products_index')
                        <li>
                            <a href="{{route('category_products.index')}}" class="side-menu {{ activeMenu('category-products') }}">
                                <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                                <div class="side-menu__title"> Danh mục sản phẩm</div>
                            </a>
                        </li>
                        @endcan
                        <li>
                            <a href="{{route('products.index')}}" class="side-menu {{ activeMenu('products') }}">
                                <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                                <div class="side-menu__title"> Danh sách sản phẩm</div>
                            </a>
                        </li>
                        @can('brands_index')
                        <?php if (in_array('brands', $dropdown)) { ?>
                            <li>
                                <a href="{{route('brands.index')}}" class="side-menu {{ activeMenu('brands') }}">
                                    <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                                    <div class="side-menu__title"> Quản lý Thương hiệu</div>
                                </a>
                            </li>
                        <?php } ?>
                        @endcan
                    </ul>
                </li>
            <?php } ?>
            @endcan
            @can('orders_index')
            <?php if (in_array('orders', $dropdown) && !empty($module)) { ?>
                <li>
                    <a href="javascript:void(0)" class="side-menu <?php if ($module === 'orders' || $module === 'orders_payment' || $module === 'coupons' || $module === 'ships') { ?>side-menu--active<?php } ?>">
                        <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                        <div class="side-menu__title">
                            Quản lý Đơn hàng
                            <div class="side-menu__sub-icon <?php if ($module === 'orders' || $module === 'orders_payment' || $module === 'coupons' || $module === 'ships') { ?>transform rotate-180<?php } ?>">
                                <i data-lucide="chevron-down"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="<?php if ($module === 'orders' || $module === 'orders_payment' || $module === 'coupons' || $module === 'ships') { ?>side-menu__sub-open<?php } ?>">
                        @can('orders_index')
                        <?php if (in_array('orders', $dropdown)) { ?>
                            <li>
                                <a href="{{route('orders.index')}}" class="side-menu {{ activeMenu('orders') }}">
                                    <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                                    <div class="side-menu__title"> Quản lý Đơn hàng</div>
                                </a>
                            </li>
                            <li class="hidden">
                                <a href="{{route('orders.returns')}}" class="side-menu {{ activeMenu('orders-returns') }}">
                                    <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                                    <div class="side-menu__title"> Trả/hoàn hàng</div>
                                </a>
                            </li>
                            <li class="hidden">
                                <a href="{{route('orders.payment')}}" class="side-menu {{ activeMenu('orders-payment') }}">
                                    <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                                    <div class="side-menu__title"> Lịch sử thanh toán</div>
                                </a>
                            </li>
                        <?php } ?>
                        @endcan
                        @can('coupons_index')
                        <?php if (in_array('coupons', $dropdown)) { ?>
                            <li>
                                <a href="{{route('coupons.index')}}" class="side-menu {{ activeMenu('coupons') }}">
                                    <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                                    <div class="side-menu__title"> Quản lý Mã giảm giá</div>
                                </a>
                            </li>
                        <?php } ?>
                        @endcan
                        @can('ships_index')
                        <?php if (in_array('ships', $dropdown)) { ?>
                            <li>
                                <a href="{{route('ships.index')}}" class="side-menu {{ activeMenu('ships') }}">
                                    <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                                    <div class="side-menu__title"> Quản lý Vận chuyển</div>
                                </a>
                            </li>
                        <?php } ?>
                        @endcan
                        <li>
                            <a href="{{route('orders.config')}}" class="side-menu {{ activeMenu('orders-config') }}">
                                <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                                <div class="side-menu__title"> Cấu hình đơn hàng</div>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
            @endcan
            <!-- END: Quản lý product -->
            <!-- Start: Quản lý thuộc tính -->
            @can('attributes_index')
            <?php if (in_array('attributes', $dropdown) && !empty($module)) { ?>
                <li>
                    <a href="javascript:void(0)" class="side-menu <?php if ($module === 'category_attributes' || $module === 'attributes') { ?>side-menu--active<?php } ?>">
                        <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                        <div class="side-menu__title">
                            Quản lý Thuộc tính
                            <div class="side-menu__sub-icon <?php if ($module === 'category_attributes' || $module === 'attributes') { ?>transform rotate-180<?php } ?>">
                                <i data-lucide="chevron-down"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="<?php if ($module === 'category_attributes' || $module === 'attributes') { ?>side-menu__sub-open<?php } ?>">
                        @can('category_attributes_index')
                        <li>
                            <a href="{{route('category_attributes.index')}}" class="side-menu {{ activeMenu('category-attributes') }}">
                                <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                                <div class="side-menu__title"> Nhóm thuộc tính</div>
                            </a>
                        </li>
                        @endcan
                        <li>
                            <a href="{{route('attributes.index')}}" class="side-menu {{ activeMenu('attributes') }}">
                                <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                                <div class="side-menu__title"> Danh sách </div>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
            @endcan
            <!-- END: Quản lý thuộc tính -->
            <!-- Start: Quản lý media -->
            @can('media_index')
            <?php if (in_array('media', $dropdown) && !empty($module)) { ?>
                <li>
                    <a href="javascript:void(0)" class="side-menu <?php if ($module === 'category_media' || $module === 'media') { ?>side-menu--active<?php } ?>">
                        <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                        <div class="side-menu__title">
                            Quản lý Media
                            <div class="side-menu__sub-icon <?php if ($module === 'category_media' || $module === 'media') { ?>transform rotate-180<?php } ?>">
                                <i data-lucide="chevron-down"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="<?php if ($module === 'category_media' || $module === 'media') { ?>side-menu__sub-open<?php } ?>">
                        @can('category_media_index')
                        <li>
                            <a href="{{route('category_media.index')}}" class="side-menu {{ activeMenu('category-media') }}">
                                <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                                <div class="side-menu__title"> Danh mục media</div>
                            </a>
                        </li>
                        @endcan
                        <li>
                            <a href="{{route('media.index')}}" class="side-menu {{ activeMenu('media') }}">
                                <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                                <div class="side-menu__title"> Danh sách </div>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
            @endcan
            <!-- END: Quản lý media -->
            <!-- Start: Quản lý khách hàng -->
            @can('customers_index')
            <?php if (in_array('customers', $dropdown) && !empty($module)) { ?>
                <li>
                    <a href="javascript:void(0)" class="side-menu <?php if ($module === 'customers' || $module === 'customer_categories') { ?>side-menu--active<?php } ?>">
                        <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                        <div class="side-menu__title">
                            Quản lý khách hàng
                            <div class="side-menu__sub-icon <?php if ($module === 'customers' || $module === 'customer_categories') { ?>transform rotate-180<?php } ?>">
                                <i data-lucide="chevron-down"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="<?php if ($module === 'customers' || $module === 'customer_categories') { ?>side-menu__sub-open<?php } ?>">
                        <li>
                            <a href="{{route('customer_categories.index')}}" class="side-menu {{ activeMenu('customer-categories') }}">
                                <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                                <div class="side-menu__title"> Nhóm khách hàng</div>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('customers.index')}}" class="side-menu {{ activeMenu('customers') }}">
                                <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                                <div class="side-menu__title"> Danh sách khách hàng </div>
                            </a>
                        </li>

                    </ul>
                </li>
            <?php } ?>
            @endcan
            <!-- END: Quản lý khách hàng -->
            <!-- Start: Hệ thống cửa hàng -->
            @can('addresses_index')
            <?php if (in_array('addresses', $dropdown)) { ?>
                <li>
                    <a href="{{route('addresses.index')}}" class="side-menu {{ activeMenu('addresses') }}">
                        <div class="side-menu__icon">
                            <i data-lucide="box"></i>
                        </div>
                        <div class="side-menu__title"> Hệ thống cửa hàng </div>
                    </a>
                </li>
            <?php } ?>
            @endcan
            <!-- END: Hệ thống cửa hàng -->
            <!-- Start: Quản lý Trang -->
            @can('pages_index')
            <?php if (in_array('pages', $dropdown)) { ?>
                <li>
                    <a href="{{route('pages.index')}}" class="side-menu {{ activeMenu('pages') }}">
                        <div class="side-menu__icon">
                            <i data-lucide="box"></i>
                        </div>
                        <div class="side-menu__title"> Quản lý Trang </div>
                    </a>
                </li>
            <?php } ?>
            @endcan
            <!-- END: Quản lý Trang -->
            <!-- Start: Quản lý Liên hệ -->
            @can('contacts_index')
            <?php if (in_array('contacts', $dropdown) && !empty($module)) { ?>
                <li>
                    <a href="javascript:void(0)" class="side-menu <?php if ($module === 'contacts') { ?>side-menu--active<?php } ?>">
                        <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                        <div class="side-menu__title">
                            Quản lý Liên hệ
                            <div class="side-menu__sub-icon <?php if ($module === 'contacts') { ?>transform rotate-180<?php } ?>">
                                <i data-lucide="chevron-down"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="<?php if ($module === 'contacts') { ?>side-menu__sub-open<?php } ?>">
                        <li>
                            <a href="{{route('contacts.index')}}" class="side-menu {{ activeMenu('contacts') }}">
                                <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                                <div class="side-menu__title"> Quản lý Liên hệ</div>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('subscribers.index')}}" class="side-menu {{ activeMenu('subscribers') }}">
                                <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                                <div class="side-menu__title"> Đăng ký gửi email </div>
                            </a>
                        </li>
                        <li class="hidden">
                            <a href="{{route('books.index')}}" class="side-menu {{ activeMenu('books') }}">
                                <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                                <div class="side-menu__title"> Đặt lịch hẹn </div>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
            @endcan
            <!-- END: Quản lý Liên hệ -->
            <!-- Start: Quản lý Tag -->
            @can('tags_index')
            <?php if (in_array('tags', $dropdown)) { ?>
                <li>
                    <a href="{{route('tags.index')}}" class="side-menu {{ activeMenu('tags') }}">
                        <div class="side-menu__icon">
                            <i data-lucide="box"></i>
                        </div>
                        <div class="side-menu__title"> Quản lý Tag </div>
                    </a>
                </li>
            <?php } ?>
            @endcan
            <!-- END: Quản lý Tag -->
            <!-- Start: Quản lý Comment -->
            @can('comments_index')
            <?php if (in_array('comments', $dropdown)) { ?>
                <li>
                    <a href="{{route('comments.index')}}" class="side-menu {{ activeMenu('comments') }}">
                        <div class="side-menu__icon">
                            <i data-lucide="box"></i>
                        </div>
                        <div class="side-menu__title"> Quản lý Comment </div>
                    </a>
                </li>
            <?php } ?>
            @endcan
            <!-- END: Quản lý Comment -->
            <!-- Start: Quản lý slide -->
            @can('slides_index')
            <?php if (in_array('slides', $dropdown)) { ?>
                <li>
                    <a href="{{route('slides.index')}}" class="side-menu {{ activeMenu('slides') }}">
                        <div class="side-menu__icon">
                            <i data-lucide="box"></i>
                        </div>
                        <div class="side-menu__title"> Quản lý Banner & Slide </div>
                    </a>
                </li>
            <?php } ?>
            @endcan
            <!-- END: Quản lý slide -->
            <!-- Start: Quản lý Menu -->
            @can('menus_index')
            <?php if (in_array('menus', $dropdown)) { ?>
                <li>
                    <a href="{{route('menus.index')}}" class="side-menu {{ activeMenu('menus') }}">
                        <div class="side-menu__icon">
                            <i data-lucide="box"></i>
                        </div>
                        <div class="side-menu__title"> Quản lý Menu </div>
                    </a>
                </li>
            <?php } ?>
            @endcan
            <!-- END: Quản lý Menu -->
            <!-- Start: Cấu hình hệ thống -->
            @can('generals_index')
            <?php if (in_array('generals', $dropdown)) { ?>
                <li>
                    <a href="javascript:void(0)" class="side-menu <?php if ($module === 'generals' || $module === 'config_infos') { ?>side-menu--active<?php } ?>">
                        <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                        <div class="side-menu__title">
                            Cấu hình
                            <div class="side-menu__sub-icon <?php if ($module === 'generals' || $module === 'config_infos') { ?>transform rotate-180<?php } ?>">
                                <i data-lucide="chevron-down"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="<?php if ($module === 'generals' || $module === 'config_infos') { ?>side-menu__sub-open<?php } ?>">
                        <li>
                            <a href="{{route('generals.general')}}" class="side-menu {{ activeMenu('generals') }}">
                                <div class="side-menu__icon">
                                    <i data-lucide="box"></i>
                                </div>
                                <div class="side-menu__title"> Hệ thống </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('config_infos.index')}}" class="side-menu {{ activeMenu('config-infos') }}">
                                <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                                <div class="side-menu__title"> Email ứng dụng </div>
                            </a>
                        </li>

                    </ul>
                </li>
            <?php } ?>
            @endcan
            <!-- END: Cấu hình hệ thống -->
            <!-- Start: Quản lý thành viên -->
            @can('users_index')
            <?php if (in_array('users', $dropdown) && !empty($module)) { ?>
                <li>
                    <a href="javascript:void(0)" class="side-menu <?php if ($module === 'users' || $module === 'roles') { ?>side-menu--active<?php } ?>">
                        <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                        <div class="side-menu__title">
                            Quản lý thành viên
                            <div class="side-menu__sub-icon <?php if ($module === 'users' || $module === 'roles') { ?>transform rotate-180<?php } ?>">
                                <i data-lucide="chevron-down"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="<?php if ($module === 'users' || $module === 'roles') { ?>side-menu__sub-open<?php } ?>">
                        <li>
                            <a href="{{route('roles.index')}}" class="side-menu {{ activeMenu('roles') }}">
                                <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                                <div class="side-menu__title"> Nhóm thành viên</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('users.index')}}" class="side-menu {{ activeMenu('users') }}">
                                <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                                <div class="side-menu__title"> Thành viên </div>
                            </a>
                        </li>

                    </ul>
                </li>
            <?php } ?>
            @endcan
            <!-- END: Quản lý thành viên -->
            @if(env('APP_ENV') == "local" && !empty($module))
            <li>
                <a href="javascript:void(0)" class="side-menu <?php if ($module === 'permissions' || $module === 'configis' || $module === 'config_colums') { ?>side-menu--active<?php } ?>">
                    <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                    <div class="side-menu__title">
                        Development
                        <div class="side-menu__sub-icon <?php if ($module === 'permissions' || $module === 'configis' || $module === 'config_colums') { ?>transform rotate-180<?php } ?>">
                            <i data-lucide="chevron-down"></i>
                        </div>
                    </div>
                </a>
                <ul class="<?php if ($module === 'permissions' || $module === 'configis' || $module === 'config_colums') { ?>side-menu__sub-open<?php } ?>">
                    @can('users_index')
                    <li>
                        <a href="{{route('permissions.index')}}" class="side-menu {{ activeMenu('permissions') }}">
                            <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                            <div class="side-menu__title">Quản lý phân quyền</div>
                        </a>
                    </li>
                    @endcan
                    <li>
                        <a href="{{route('configIs.index')}}" class="side-menu {{ activeMenu('config-is') }}">
                            <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                            <div class="side-menu__title">Cấu hình hiển thị</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('config_colums.index')}}" class="side-menu {{ activeMenu('config-colums') }}">
                            <div class="side-menu__icon"> <i data-lucide="aperture"></i> </div>
                            <div class="side-menu__title">Custom field</div>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            <li class="">
                <a href="{{route('sitemap')}}" class="side-menu" target="_blank">
                    <div class="side-menu__icon">
                        <i data-lucide="box"></i>
                    </div>
                    <div class="side-menu__title">Cập nhập sitemap</div>
                </a>
            </li>
            @can('websites_index')
            <?php if (in_array('websites', $dropdown) && !empty($module) && (env('APP_ENV') == "local")) { ?>
                <li class="">
                    <a href="{{route('websites.index')}}" class="side-menu" class="side-menu {{ activeMenu('websites') }}">
                        <div class="side-menu__icon">
                            <i data-lucide="box"></i>
                        </div>
                        <div class="side-menu__title">Giao diện website</div>
                    </a>
                </li>
            <?php } ?>
            @endcan
        </ul>
    </div>
</nav>