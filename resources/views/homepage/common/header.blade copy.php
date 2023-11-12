<?php $menu_header = getMenus('menu-header'); ?>
@if(svl_ismobile() == 'is desktop')
<header class="py-[15px] bg-black relative">
    <div class="container px-4 mx-auto">
        <div class="grid grid-cols-12 gap-8 items-center">
            <div class="col-span-2">
                <a href="{{url('/')}}" class="logo-wrapper" title="{{$fcSystem['homepage_company']}}">
                    <img src="{{asset($fcSystem['homepage_logo'])}}" alt="{{$fcSystem['homepage_company']}}">
                </a>
            </div>
            <div class="col-span-8">
                <ul class="flex items-center gap-5 menu-header static">
                    @if($menu_header && count($menu_header->menu_items) > 0)
                    @foreach($menu_header->menu_items as $key=>$item)
                    <li class=" relative">
                        <a href="{{url($item->slug)}}" class="text-white uppercase font-semibold flex items-center space-x-1">
                            <span>
                                {{$item->title}}
                            </span>
                            @if (count($item->children) > 0)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                            @endif
                        </a>
                        @if (count($item->children) > 0)
                        <div class=" absolute top-full left-0 bg-white p-[10px] w-[300px] shadow menu-header-child z-[999999]">
                            <ul class="">
                                @foreach($item->children as $child)
                                <li class="border-b border-dashed border-primary w-full float-left"><a href="{{url($child->slug)}}" class="py-2 w-full hover:text-primary float-left">{{$child->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </li>
                    @endforeach
                    @endif
                </ul>

            </div>
            <div class="col-span-2">
                <div class="flex items-center justify-end space-x-5">
                    <a href="" class="relative hidden" aria-label="Sản phẩm Yêu thích" title="Sản phẩm Yêu thích">
                        <svg viewBox="0 0 512 512" class="w-6 h-6 text-white">
                            <path d="M438.482,58.61c-24.7-26.549-59.311-41.655-95.573-41.711c-36.291,0.042-70.938,15.14-95.676,41.694l-8.431,8.909
			l-8.431-8.909C181.284,5.762,98.662,2.728,45.832,51.815c-2.341,2.176-4.602,4.436-6.778,6.778
			c-52.072,56.166-52.072,142.968,0,199.134l187.358,197.581c6.482,6.843,17.284,7.136,24.127,0.654
			c0.224-0.212,0.442-0.43,0.654-0.654l187.29-197.581C490.551,201.567,490.551,114.77,438.482,58.61z M413.787,234.226h-0.017
			L238.802,418.768L63.818,234.226c-39.78-42.916-39.78-109.233,0-152.149c36.125-39.154,97.152-41.609,136.306-5.484
			c1.901,1.754,3.73,3.583,5.484,5.484l20.804,21.948c6.856,6.812,17.925,6.812,24.781,0l20.804-21.931
			c36.125-39.154,97.152-41.609,136.306-5.484c1.901,1.754,3.73,3.583,5.484,5.484C453.913,125.078,454.207,191.516,413.787,234.226
			z" class="active-path" fill="#fff"></path>
                        </svg>
                        <span class="text-white absolute top-[-14px] right-[-14px] w-5 h-5 border border-second rounded-full flex items-center justify-center leading-5 bg-[#333] text-xs">0</span>
                    </a>
                    @if(!empty(Auth::guard('customer')->user()))
                    <a href="{{route('customer.dashboard')}}" class="" aria-label="Tài khoản" title="Tài khoản">
                        <svg viewBox="0 0 512 512" class="w-6 h-6 text-white">
                            <path d="M437.02,330.98c-27.883-27.882-61.071-48.523-97.281-61.018C378.521,243.251,404,198.548,404,148    C404,66.393,337.607,0,256,0S108,66.393,108,148c0,50.548,25.479,95.251,64.262,121.962    c-36.21,12.495-69.398,33.136-97.281,61.018C26.629,379.333,0,443.62,0,512h40c0-119.103,96.897-216,216-216s216,96.897,216,216    h40C512,443.62,485.371,379.333,437.02,330.98z M256,256c-59.551,0-108-48.448-108-108S196.449,40,256,40    c59.551,0,108,48.448,108,108S315.551,256,256,256z" data-original="#fff" class="active-path" fill="#fff"></path>
                        </svg>
                    </a>
                    @else
                    <a href="{{route('customer.login')}}" class="" aria-label="Tài khoản" title="Tài khoản">
                        <svg viewBox="0 0 512 512" class="w-6 h-6 text-white">
                            <path d="M437.02,330.98c-27.883-27.882-61.071-48.523-97.281-61.018C378.521,243.251,404,198.548,404,148    C404,66.393,337.607,0,256,0S108,66.393,108,148c0,50.548,25.479,95.251,64.262,121.962    c-36.21,12.495-69.398,33.136-97.281,61.018C26.629,379.333,0,443.62,0,512h40c0-119.103,96.897-216,216-216s216,96.897,216,216    h40C512,443.62,485.371,379.333,437.02,330.98z M256,256c-59.551,0-108-48.448-108-108S196.449,40,256,40    c59.551,0,108,48.448,108,108S315.551,256,256,256z" data-original="#fff" class="active-path" fill="#fff"></path>
                        </svg>
                    </a>

                    @endif

                    <a href="javascript:void(0)" class="js-header-search" aria-label="Tìm kiếm" title="Tìm kiếm">
                        <svg class="w-6 h-6 text-white" viewBox="0 0 21 21">
                            <g transform="translate(1 1)" stroke="currentColor" stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="square">
                                <path d="M18 18l-5.7096-5.7096"></path>
                                <circle cx="7.2" cy="7.2" r="7.2"></circle>
                            </g>
                        </svg>
                    </a>
                    <a href="javascript:void(0)" class="relative tp-cart" aria-label="Xem giỏ hàng" title="Giỏ hàng">
                        <svg viewBox="0 0 19 23" class="w-6 h-6 text-white">
                            <path d="M0 22.985V5.995L2 6v.03l17-.014v16.968H0zm17-15H2v13h15v-13zm-5-2.882c0-2.04-.493-3.203-2.5-3.203-2 0-2.5 1.164-2.5 3.203v.912H5V4.647C5 1.19 7.274 0 9.5 0 11.517 0 14 1.354 14 4.647v1.368h-2v-.912z" fill="#fff"></path>
                        </svg>
                        <span class="text-white absolute top-[-14px] right-[-14px] w-5 h-5 border border-second rounded-full flex items-center justify-center leading-5 bg-[#333] cart-quantity text-xs">{{$cart['quantity']}}</span>
                    </a>

                </div>
            </div>
        </div>

    </div>
</header>
@else
<header class="py-[15px] bg-black relative">
    <div class="container px-4 mx-auto">
        <div class="grid grid-cols-12 items-center">
            <div class="col-span-3">
                <!-- begin mobile -->
                <div class="wrapper cf block lg:hidden">
                    <nav id="main-nav">
                        <style>
                            #main-nav {
                                display: none;
                            }
                        </style>
                        <ul class="second-nav">
                            @if($menu_header && count($menu_header->menu_items) > 0)
                            @foreach($menu_header->menu_items as $key=>$item)
                            <li class="menu-item">
                                <a href="{{url($item->slug)}}">{{$item->title}}</a>
                                @if (count($item->children) > 0)
                                <ul>
                                    @foreach($item->children as $child)
                                    <li>
                                        <a href="{{url($child->slug)}}">{{$child->title}}</a>
                                        @if (count($child->children) > 0)
                                        <ul>
                                            @foreach($child->children as $c)
                                            <li>
                                                <a href="{{url($c->slug)}}">{{$c->title}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </nav>
                    <a class="toggle w-10 h-10 md:w-50px md:h-50px">
                        <span></span>
                    </a>
                </div>
                <!-- end mobile -->
            </div>
            <div class="col-span-6">
                <a href="{{url('/')}}" class="logo-wrapper" title="{{$fcSystem['homepage_company']}}">
                    <img src="{{asset($fcSystem['homepage_logo'])}}" alt="{{$fcSystem['homepage_company']}}">
                </a>
            </div>
            <div class="col-span-3 ">
                <div class="flex items-center justify-end space-x-3 md:space-x-5">
                    <?php /*<a href="" class="relative hidden md:block" aria-label="Sản phẩm Yêu thích" title="Sản phẩm Yêu thích">
                         <svg viewBox="0 0 512 512" class="w-6 h-6 text-white">
                             <path d="M438.482,58.61c-24.7-26.549-59.311-41.655-95.573-41.711c-36.291,0.042-70.938,15.14-95.676,41.694l-8.431,8.909
			l-8.431-8.909C181.284,5.762,98.662,2.728,45.832,51.815c-2.341,2.176-4.602,4.436-6.778,6.778
			c-52.072,56.166-52.072,142.968,0,199.134l187.358,197.581c6.482,6.843,17.284,7.136,24.127,0.654
			c0.224-0.212,0.442-0.43,0.654-0.654l187.29-197.581C490.551,201.567,490.551,114.77,438.482,58.61z M413.787,234.226h-0.017
			L238.802,418.768L63.818,234.226c-39.78-42.916-39.78-109.233,0-152.149c36.125-39.154,97.152-41.609,136.306-5.484
			c1.901,1.754,3.73,3.583,5.484,5.484l20.804,21.948c6.856,6.812,17.925,6.812,24.781,0l20.804-21.931
			c36.125-39.154,97.152-41.609,136.306-5.484c1.901,1.754,3.73,3.583,5.484,5.484C453.913,125.078,454.207,191.516,413.787,234.226
			z" class="active-path" fill="#fff"></path>
                         </svg>
                         <span class="text-white absolute top-[-14px] right-[-14px] w-5 h-5 border border-second rounded-full flex items-center justify-center leading-5 bg-[#333] text-xs">0</span>
                     </a>*/ ?>
                    @if(!empty(Auth::guard('customer')->user()))
                    <a href="{{route('customer.dashboard')}}" class="hidden md:block" aria-label="Tài khoản" title="Tài khoản">
                        <svg viewBox="0 0 512 512" class="w-6 h-6 text-white">
                            <path d="M437.02,330.98c-27.883-27.882-61.071-48.523-97.281-61.018C378.521,243.251,404,198.548,404,148    C404,66.393,337.607,0,256,0S108,66.393,108,148c0,50.548,25.479,95.251,64.262,121.962    c-36.21,12.495-69.398,33.136-97.281,61.018C26.629,379.333,0,443.62,0,512h40c0-119.103,96.897-216,216-216s216,96.897,216,216    h40C512,443.62,485.371,379.333,437.02,330.98z M256,256c-59.551,0-108-48.448-108-108S196.449,40,256,40    c59.551,0,108,48.448,108,108S315.551,256,256,256z" data-original="#fff" class="active-path" fill="#fff"></path>
                        </svg>
                    </a>
                    @else
                    <a href="{{route('customer.login')}}" class="hidden md:block" aria-label="Tài khoản" title="Tài khoản">
                        <svg viewBox="0 0 512 512" class="w-6 h-6 text-white">
                            <path d="M437.02,330.98c-27.883-27.882-61.071-48.523-97.281-61.018C378.521,243.251,404,198.548,404,148    C404,66.393,337.607,0,256,0S108,66.393,108,148c0,50.548,25.479,95.251,64.262,121.962    c-36.21,12.495-69.398,33.136-97.281,61.018C26.629,379.333,0,443.62,0,512h40c0-119.103,96.897-216,216-216s216,96.897,216,216    h40C512,443.62,485.371,379.333,437.02,330.98z M256,256c-59.551,0-108-48.448-108-108S196.449,40,256,40    c59.551,0,108,48.448,108,108S315.551,256,256,256z" data-original="#fff" class="active-path" fill="#fff"></path>
                        </svg>
                    </a>
                    @endif

                    <a href="javascript:void(0)" class="js-header-search" aria-label="Tìm kiếm" title="Tìm kiếm">
                        <svg class="w-6 h-6 text-white" viewBox="0 0 21 21">
                            <g transform="translate(1 1)" stroke="currentColor" stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="square">
                                <path d="M18 18l-5.7096-5.7096"></path>
                                <circle cx="7.2" cy="7.2" r="7.2"></circle>
                            </g>
                        </svg>
                    </a>
                    <a href="javascript:void(0)" class="relative tp-cart" aria-label="Xem giỏ hàng" title="Giỏ hàng">
                        <svg viewBox="0 0 19 23" class="w-6 h-6 text-white">
                            <path d="M0 22.985V5.995L2 6v.03l17-.014v16.968H0zm17-15H2v13h15v-13zm-5-2.882c0-2.04-.493-3.203-2.5-3.203-2 0-2.5 1.164-2.5 3.203v.912H5V4.647C5 1.19 7.274 0 9.5 0 11.517 0 14 1.354 14 4.647v1.368h-2v-.912z" fill="#fff"></path>
                        </svg>
                        <span class="text-white absolute top-[-14px] right-[-14px] w-5 h-5 border border-second rounded-full flex items-center justify-center leading-5 bg-[#333] cart-quantity text-xs">{{$cart['quantity']}}</span>
                    </a>

                </div>
            </div>
        </div>

    </div>
</header>

@endif