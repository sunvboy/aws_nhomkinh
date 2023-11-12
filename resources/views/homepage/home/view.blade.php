<header class="md:block hidden">
    <div class="container py-4 mx-auto">
        <div class="flex items-center w-full space-x-6">
            <div class="flex-1 flex items-center space-x-6">
                <a href="{{url('/')}}" class="logo link-active">
                    <img class="h-9" src="{{asset($fcSystem['homepage_logo'])}}" alt="{{$fcSystem['homepage_company']}}" />
                </a>
                <div class="btn-group-catalog">
                    <div class="flex items-center hide_catalogue" style="display: none">
                        <button class="flex items-center justify-center rounded-full bg-gray-100 w-10 h-10 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="text-ui font-bold cursor-pointer">
                            Đóng menu
                        </div>
                    </div>
                    <div class="flex items-center show_catalogue">
                        <button class="flex items-center justify-center rounded-full bg-gray-100 w-10 h-10 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <div class="text-ui font-bold cursor-pointer">
                            Danh mục
                        </div>
                        <a href="" class="btn-promo ml-5 hover:text-blue-700 text-red-600 font-bold">
                            Khuyến mại
                        </a>
                    </div>
                </div>
                <div class="flex-1">
                    <section class="section-input-search">
                        <div class="w-full">
                            <form method="GET" action="{{route('homepage.search')}}" class="">
                                <div class="relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute top-1/2 left-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="transform: translateY(-50%);">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                    <input placeholder="Tên sản phẩm, nhu cầu, hãng" type="text" value="" class="bg-gray-200 rounded-full border w-full h-11 px-10 focus:outline-none focus:ring focus:ring-red-300 focus:rounded-full hover:outline-none hover:ring hover:ring-red-300 hover:rounded-full ovn_keyword" name="keyword">
                                    <button type="submit" class="absolute right-1 rounded-full bg-red-600 h-9 w-32 text-white top-1/2 ovn_submit_search" style="transform: translateY(-50%);display: none">
                                        Tìm kiếm
                                    </button>
                                </div>
                            </form>

                        </div>
                    </section>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div>
                    <button class="flex items-center justify-center rounded-full bg-gray-100 h-10 px-4 hover:bg-cyan-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span class="ml-2 text-base">0</span>
                    </button>
                </div>
                <div>
                    <button class="flex items-center justify-center rounded-full bg-gray-100 hover:bg-cyan-50 px-4 h-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="ml-2 text-base">Xây dựng cấu hình</span>
                    </button>
                </div>

                <div class="relative">
                    <button class="flex items-center justify-center rounded-full bg-gray-100 px-4 h-10 show_userInfo">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </button>
                    <div class="absolute right-0 top-14 hide_userInfo z-50" style="display: none">
                        <div class="flex flex-col overflow-hidden shadow-md bg-white rounded-xl">
                            <div class="items-center flex justify-between px-3 py-4">
                                <div class="text-2xl font-extrabold">Tài khoản</div>
                                <button class="hide_userInfo">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="overflow flex-1 ">
                                <div class="pt-2 pb-4 px-4 w-[408px] ovn_scroll">
                                    <div class="">
                                        <section class="flex items-center mb-1">
                                            <div class="border rounded-full h-[60px] w-[60px] overflow-hidden">
                                                <img alt="Thêm alt sau" src="{{asset('frontend/images/fallback-image.4d0336f.png')}}" class="blur-up h-full w-full t-img">
                                            </div>
                                            <div class="flex flex-col ml-3">
                                                <span class="font-extrabold text-[19px]">
                                                    Quyền
                                                </span>
                                                <a href="" class="font-bold text-xs text-red-600 hover:text-red-500">
                                                    Thêm số điện thoại
                                                </a>
                                            </div>
                                        </section>
                                        <div class="h-px bg-blue-gray-40 my-3"></div>
                                        <div class="">
                                            <a href="" class="flex justify-between items-center p-3 hover:bg-gray-100 hover:rounded-xl">
                                                <div class="flex space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                    </svg>
                                                    <span>Thông tin tài khoản</span>
                                                </div>
                                                <!---->
                                                <div class="t-list-item__arrow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </div>
                                            </a>
                                            <a href="" class="flex justify-between items-center p-3 hover:bg-gray-100 hover:rounded-xl">
                                                <div class="flex space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                                    </svg>
                                                    <span>Thông tin liên hệ & Sổ địa chỉ</span>
                                                </div>
                                                <!---->
                                                <div class="t-list-item__arrow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </div>
                                            </a>
                                            <a href="" class="flex justify-between items-center p-3 hover:bg-gray-100 hover:rounded-xl">
                                                <div class="flex space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                                    </svg>
                                                    <span>Lịch sử mua hàng</span>
                                                </div>
                                                <!---->
                                                <div class="t-list-item__arrow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="h-px bg-blue-gray-40 my-3"></div>
                                        <section class="section-purchase-history">
                                            <div class="flex space-x-2 mt-2">
                                                <a href="" class="px-1 w-1/4 rounded-xl hover:bg-gray-40 hover:bg-gray-100 hover:rounded-xl">
                                                    <div class="flex flex-col items-center justify-between">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                        </svg>
                                                        <div class="mt-1 text-sm text-center">
                                                            <span class="block">Chờ</span>
                                                            <span class="font-bold mt-[2px] block">Thanh toán</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="" class="px-1 w-1/4 rounded-xl hover:bg-gray-40 hover:bg-gray-100 hover:rounded-xl">
                                                    <div class="flex flex-col items-center justify-between">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z" />
                                                        </svg>
                                                        <div class="mt-1 text-sm text-center">
                                                            <span class="block">Có tại</span>
                                                            <span class="font-bold mt-[2px] block">Cửa hàng</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="" class="px-1 w-1/4 rounded-xl hover:bg-gray-40 hover:bg-gray-100 hover:rounded-xl">
                                                    <div class="flex flex-col items-center justify-between">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                                                        </svg>
                                                        <div class="mt-1 text-sm text-center">
                                                            <span class="block">Đang</span>
                                                            <span class="font-bold mt-[2px] block">Vận chuyển</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="" class="px-1 w-1/4 rounded-xl hover:bg-gray-40 hover:bg-gray-100 hover:rounded-xl">
                                                    <div class="flex flex-col items-center justify-between">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                        </svg>
                                                        <div class="mt-1 text-sm text-center">
                                                            <span class="block">Chờ</span>
                                                            <span class="font-bold mt-[2px] block">Đánh giá</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </section>
                                        <div class="h-px bg-blue-gray-40 my-3"></div>
                                        <div class="">
                                            <a href="" class="flex justify-between items-center p-3 hover:bg-gray-100 hover:rounded-xl">
                                                <div class="flex space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                                    </svg>
                                                    <span>Hệ thống cửa hàng</span>
                                                </div>
                                                <!---->
                                                <div class="t-list-item__arrow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </div>
                                            </a>
                                            <a href="" class="flex justify-between items-center p-3 hover:bg-gray-100 hover:rounded-xl">
                                                <div class="flex space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                    </svg>
                                                    <span>Bảo hành, đổi trả</span>
                                                </div>
                                                <!---->
                                                <div class="t-list-item__arrow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </div>
                                            </a>
                                            <a href="" class="flex justify-between items-center p-3 hover:bg-gray-100 hover:rounded-xl">
                                                <div class="flex space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                                    </svg>
                                                    <span>Vận chuyển, thanh toán</span>
                                                </div>
                                                <!---->
                                                <div class="t-list-item__arrow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </div>
                                            </a>
                                            <a href="" class="flex justify-between items-center p-3 hover:bg-gray-100 hover:rounded-xl">
                                                <div class="flex space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                                                    </svg>
                                                    <span>Bảng giá dịch vụ</span>
                                                </div>
                                                <!---->
                                                <div class="t-list-item__arrow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </div>
                                            </a>
                                            <a href="" class="flex justify-between items-center p-3 hover:bg-gray-100 hover:rounded-xl">
                                                <div class="flex space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                    </svg>
                                                    <span>Gọi hotline 1900.63.3579</span>
                                                </div>
                                                <!---->
                                                <div class="t-list-item__arrow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="h-px bg-blue-gray-40 my-3"></div>
                                        <div class="">
                                            <a href="" class="flex justify-between items-center p-3 hover:bg-gray-100 hover:rounded-xl">
                                                <div class="flex space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                                    </svg>
                                                    <span>Đăng xuất</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<header class="md:hidden block">
    <div class="container mx-auto px-4 py-3">
        <div class="flex justify-between">
            <a href="{{url('/')}}" class="logo link-active">
                <img class="h-9" src="{{asset($fcSystem['homepage_logo'])}}" alt="{{$fcSystem['homepage_company']}}" />
            </a>
            <button class="h-[44px] w-[44px]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </button>

        </div>
    </div>
</header>
<div class="ovn_catalog bg-white shadow border-t border-gray-100" style="display: none">
    <div class="ovn_dialog__overlay"></div>
    <div class="flex bg-white z-10 relative overflow-auto">
        <div class="flex container mx-auto" style="height: calc(100vh - 64px);">
            <div class="w-24">
                <div class="category-sidebar-wrapper ovn_scroll_bar">

                    <div class="ovn_category_item cursor-pointer text-center p-2 bg-gray-100 active">
                        <div class="h-[64px] w-[64px] mx-auto">
                            <div class="aspect-h-1 aspect-w-1">
                                <img alt="Laptop" class="blur-up " src="https://media-api-beta.thinkpro.vn/media/core/categories/2021/12/29/Rectangle%201461.png">
                            </div>
                        </div>
                        <span class="mt-1 block text-center text-xs font-bold">
                            Laptop
                        </span>
                    </div>

                </div>
            </div>
            <div class="flex-1 px-6 py-4">

                <div class="flex items-center space-x-3 divide-x divide-gray-30">
                    <a href="" class="text-4xl font-bold cursor-pointer hover:text-red-600">
                        Laptop
                    </a>
                    <a href="" class="text-ui font-bold underline pl-4 hover:text-red-600">
                        Tất cả
                        <span class="lowercase">Laptop</span>
                    </a>
                    <a href="" class="text-ui font-bold underline pl-4 hover:text-red-600">
                        Khuyến mại
                        <span class="lowercase">Laptop</span>
                    </a>
                </div>
                <div class="ovn_scroll_bar">
                    <div class="mt-4 grid grid-cols-4 gap-6 ">
                        <div class="section-brand">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    LG
                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                    Gram
                                </a>
                            </div>
                        </div>
                        <div class="section-brand">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    AVITA
                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                    Laptop
                                </a>
                            </div>
                        </div>
                        <div class="section-brand">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    GIGABYTE

                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <div class="mt-2 flex flex-col space-y-2">
                                    <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        AERO series
                                    </a><a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        AORUS
                                    </a><a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        GIGABYTE Gaming
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="section-brand">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    HUAWEI

                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <div class="mt-2 flex flex-col space-y-2">
                                    <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        MateBook
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    LG
                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                    Gram
                                </a>
                            </div>
                        </div>
                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    AVITA
                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                    Laptop
                                </a>
                            </div>
                        </div>
                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    GIGABYTE

                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <div class="mt-2 flex flex-col space-y-2">
                                    <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        AERO series
                                    </a><a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        AORUS
                                    </a><a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        GIGABYTE Gaming
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    HUAWEI

                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <div class="mt-2 flex flex-col space-y-2">
                                    <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        MateBook
                                    </a>
                                </div>
                            </div>
                        </div>


                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    LG
                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                    Gram
                                </a>
                            </div>
                        </div>
                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    AVITA
                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                    Laptop
                                </a>
                            </div>
                        </div>
                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    GIGABYTE

                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <div class="mt-2 flex flex-col space-y-2">
                                    <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        AERO series
                                    </a><a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        AORUS
                                    </a><a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        GIGABYTE Gaming
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    HUAWEI

                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <div class="mt-2 flex flex-col space-y-2">
                                    <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        MateBook
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    LG
                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                    Gram
                                </a>
                            </div>
                        </div>
                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    AVITA
                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                    Laptop
                                </a>
                            </div>
                        </div>
                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    GIGABYTE

                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <div class="mt-2 flex flex-col space-y-2">
                                    <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        AERO series
                                    </a><a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        AORUS
                                    </a><a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        GIGABYTE Gaming
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    HUAWEI

                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <div class="mt-2 flex flex-col space-y-2">
                                    <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        MateBook
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
<?php
$CategoryProduct = \App\Models\CategoryProduct::select('title', 'slug', 'icon')
    ->where(['alanguage' => config('app.locale'), 'publish' => 0])
    ->orderBy('order', 'asc')
    ->orderBy('id', 'desc')
    ->get();
?>
@if(!$CategoryProduct->isEmpty())
<!-- start: navigation -->
<nav class="border-y py-1">
    <div class="container mx-auto">
        <div class="owl-carousel-catalogue owl-carousel owl-theme">
            @foreach($CategoryProduct as $item)
            <div class="flex items-center space-x-2 justify-center hover:bg-gray-200 hover:rounded-lg w-full">
                <div class="w-[52px] h-[52px]">
                    <a href="{{route('routerURL',['slug' => $item->slug])}}" class="">
                        <img alt="{{$item->title}}" class="" src="{{asset($item->icon)}}">
                    </a>
                </div>
                <a href="{{route('routerURL',['slug' => $item->slug])}}" class="flex-1 whitespace-nowrap text-ui font-bold">{{$item->title}}</a>
            </div>
            @endforeach
        </div>
    </div>
</nav>
@endif
<!-- fixed: mobile -->
<nav class="fixed flex bottom-0 left-0 z-50 border-t w-full bg-white md:hidden">
    <a href="" class="text-xs flex flex-1 flex-col items-center justify-center cursor-pointer my-1">
        <div class="h-8 flex items-center justify-center mb-1 relative w-[59px]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
            </svg>
        </div>
        <div class="t-tabbar-item__text">
            Trang chủ
        </div>
    </a>
    <a href="javascript:void(0)" class="show_catalogue show_catalogue_mobile text-xs flex flex-1 flex-col items-center justify-center cursor-pointer my-1">
        <div class="h-8 flex items-center justify-center mb-1 relative w-[59px]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </div>
        <div class="t-tabbar-item__text">
            Danh mục
        </div>
    </a>
    <a href="" class="text-xs flex flex-1 flex-col items-center justify-center cursor-pointer my-1">
        <div class="h-8 flex items-center justify-center mb-1 relative w-[59px]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="t-tabbar-item__text">
            Khuyến mãi
        </div>
    </a>
    <a href="" class="text-xs flex flex-1 flex-col items-center justify-center cursor-pointer my-1">
        <div class="h-8 flex items-center justify-center mb-1 relative w-[59px]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
            </svg>
        </div>
        <div class="t-tabbar-item__text">
            Giỏ hàng
        </div>
    </a>
    <a href="" class="text-xs flex flex-1 flex-col items-center justify-center cursor-pointer my-1">
        <div class="h-8 flex items-center justify-center mb-1 relative w-[59px]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
        </div>
        <div class="t-tabbar-item__text">
            Tài khoản
        </div>
    </a>
</nav>
@extends('homepage.layout.home')
@section('content')

<h1 class="hidden">{{!empty($page['meta_title']) ? $page['meta_title'] : $page['title']}}</h1>
<main class="pt-5 md:bg-gray-50 px-4 md:px-0">
    <div class="container mx-auto">
        <section class="section-hero">
            <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
                <div class="md:col-span-4">
                    @if($slideHome)
                    @if($slideHome->slides)
                    <div class="owl-carousel-banner owl-carousel owl-theme">
                        @foreach($slideHome->slides as $slide)
                        <div class="item">
                            <a href="{{url($slide->link)}}">
                                <img class="rounded-2xl" src="{{asset($slide->src)}}" alt="{{$slide->title}}"></a>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @endif
                </div>
                <?php $services = json_decode($page->postmetas->meta_value, TRUE); ?>
                <div class="md:col-span-2 md:block hidden">
                    @if(!empty($services) && !empty($services['title']))
                    <section class="h-full flex flex-col justify-between">
                        @foreach($services['title'] as $key=>$item)
                        <div class="px-4 pt-4 py-2 bg-white rounded-2xl text-black">
                            <h3 class="text-lg font-bold">{{$item}}</h3>
                            <p class="text-sm mt-2">{{$services['description'][$key]}} </p>
                        </div>
                        @endforeach
                    </section>
                    @endif
                </div>
            </div>
        </section>
        <section class="mt-8">
            <h2 class="font-black text-lg md:text-xl uppercase">Chỉ bán online</h2>
            <div class="mt-4">
                <a href="" class="">
                    <img class="m-auto w-full" src="{{asset('frontend/images/online-only-banner.png')}}">
                </a>
            </div>
        </section>
        <section class="mt-8">
            <h2 class="font-black text-lg md:text-xl uppercase">Thương hiệu nổi bật</h2>
            <div class="mt-4">
                <div class="owl-carousel-brand owl-carousel owl-theme">
                    <?php for ($i = 1; $i <= 13; $i++) { ?>
                        <a href="" class="w-full float-left rounded-lg border h-20 flex bg-white p-2">
                            <img class="m-auto" src="{{asset('frontend/images/'.$i.'.jpg')}}">
                        </a>
                    <?php } ?>
                </div>

            </div>
        </section>
        <section class="mt-8">
            <div class="flex flex-row items-center justify-between gap-5">
                <h2 class="font-black text-lg md:text-2xl flex-1 uppercase">LAPTOP, MÁY TÍNH XÁCH TAY</h2>
                <div class="hidden md:flex">
                    <ul class="flex gap-5">
                        <li><a href="" class="hover:text-red-500">Laptop Acer</a></li>
                        <li><a href="" class="hover:text-red-500">Laptop MSI</a></li>
                        <li><a href="" class="hover:text-red-500">Laptop Lenovo</a></li>
                        <li><a href="" class="hover:text-red-500">Laptop Acer</a></li>
                        <li><a href="" class="hover:text-red-500">Laptop Asus</a></li>

                    </ul>

                </div>
            </div>
            <div class="mt-4">
                <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
                    <div class="col-span-2 rounded-2xl shadow px-3 py-4 bg-white">
                        <div class="owl-carousel-product owl-carousel owl-theme">
                            <?php for ($i = 1; $i <= 4; $i++) { ?>
                                <a href="">
                                    <img class="h-[162px] md:h-[230px] object-contain" src="{{asset('frontend/images/p_'.$i.'.jpg')}}">
                                </a>
                            <?php } ?>
                        </div>
                        <div class="flex-1">

                            <h3 class="mt-1 text-body font-bold">Asus Zenbook Q408UG</h3>
                            <div class="mt-1">
                                <div>
                                    <span class="text-label text-gray-20">
                                        Từ
                                    </span>
                                    <span class="font-bold text-red-600">
                                        17.990.000
                                    </span>
                                </div>
                                <div class="text-ui">
                                    <span class="line-through">
                                        21.990.000
                                    </span>
                                    <span class="font-bold">
                                        -18%
                                    </span>
                                </div>
                            </div>

                            <div class="mt-2 flex items-center divide-x divide-space-x-2 gap-3">
                                <div class="flex items-center space-x-2">
                                    <span class="text-label text-gray-20 font-bold">Màu</span>
                                    <div class="w-4 h-4 rounded-sm bg-black border"></div>
                                    <div class="w-4 h-4 rounded-sm bg-white border"></div>
                                </div>
                                <span class="text-black text-sm font-bold pl-3">
                                    1 phiên bản
                                </span>
                            </div>
                            <!---->
                        </div>
                        <div class="border-t mt-2 pt-2">
                            <div class="flex items-center divide-x divide-space-x-2">
                                <!---->
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                    </svg>
                                    <span class="text-xs">Giảm giá</span>
                                </div>
                            </div>
                        </div>
                        <!---->
                        <!---->
                    </div>
                    <?php for ($i = 1; $i <= 3; $i++) { ?>
                        <div class="rounded-2xl shadow-lg  px-3 py-4 bg-white">
                            <div class="flex-1">
                                <a href="">
                                    <img class="h-[147px] md:h-[230px] object-contain" src="{{asset('frontend/images/p_1.jpg')}}">
                                </a>
                                <h3 class="mt-1 text-body font-bold">Asus Zenbook Q408UG</h3>
                                <div class="mt-1">
                                    <div>
                                        <span class="text-label text-gray-20">
                                            Từ
                                        </span>
                                        <span class="font-bold text-red-600">
                                            17.990.000
                                        </span>
                                    </div>
                                    <div class="text-ui">
                                        <span class="line-through">
                                            21.990.000
                                        </span>
                                        <span class="font-bold">
                                            -18%
                                        </span>
                                    </div>
                                </div>

                                <div class="mt-2 flex items-center divide-x divide-space-x-2 gap-3">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-label text-gray-20 font-bold">Màu</span>
                                        <div class="w-4 h-4 rounded-sm bg-black border"></div>
                                        <div class="w-4 h-4 rounded-sm bg-white border"></div>
                                    </div>
                                    <span class="text-black text-sm font-bold pl-3 hidden md:block">
                                        1 phiên bản
                                    </span>
                                </div>
                                <!---->
                            </div>
                            <div class="border-t mt-2 pt-2">
                                <div class="flex items-center divide-x divide-space-x-2">
                                    <!---->
                                    <div class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                        </svg>
                                        <span class="text-xs">Giảm giá</span>
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <!---->
                        </div>
                    <?php } ?>
                </div>

            </div>

        </section>
        <section class="mt-8">
            <div class="flex flex-row items-center gap-5">
                <h2 class="font-black text-lg md:text-2xl flex-1 uppercase">LAPTOP, MÁY TÍNH XÁCH TAY</h2>
                <div class="flex hidden md:block">
                    <ul class="flex gap-5">
                        <li><a href="" class="hover:text-red-500">Laptop Acer</a></li>
                        <li><a href="" class="hover:text-red-500">Laptop MSI</a></li>
                        <li><a href="" class="hover:text-red-500">Laptop Lenovo</a></li>
                        <li><a href="" class="hover:text-red-500">Laptop Acer</a></li>
                        <li><a href="" class="hover:text-red-500">Laptop Asus</a></li>
                    </ul>

                </div>
            </div>
            <div class="mt-4">
                <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
                    <div class="col-span-2 rounded-2xl shadow px-3 py-4 bg-white">
                        <div class="owl-carousel-product owl-carousel owl-theme">
                            <?php for ($i = 1; $i <= 4; $i++) { ?>
                                <a href="">
                                    <img class="h-[162px] md:h-[230px] object-contain" src="{{asset('frontend/images/p_'.$i.'.jpg')}}">
                                </a>
                            <?php } ?>
                        </div>
                        <div class="flex-1">

                            <h3 class="mt-1 text-body font-bold">Asus Zenbook Q408UG</h3>
                            <div class="mt-1">
                                <div>
                                    <span class="text-label text-gray-20">
                                        Từ
                                    </span>
                                    <span class="font-bold text-red-600">
                                        17.990.000
                                    </span>
                                </div>
                                <div class="text-ui">
                                    <span class="line-through">
                                        21.990.000
                                    </span>
                                    <span class="font-bold">
                                        -18%
                                    </span>
                                </div>
                            </div>

                            <div class="mt-2 flex items-center divide-x divide-space-x-2 gap-3">
                                <div class="flex items-center space-x-2">
                                    <span class="text-label text-gray-20 font-bold">Màu</span>
                                    <div class="w-4 h-4 rounded-sm bg-black border"></div>
                                    <div class="w-4 h-4 rounded-sm bg-white border"></div>
                                </div>
                                <span class="text-black text-sm font-bold pl-3">
                                    1 phiên bản
                                </span>
                            </div>
                            <!---->
                        </div>
                        <div class="border-t mt-2 pt-2">
                            <div class="flex items-center divide-x divide-space-x-2">
                                <!---->
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                    </svg>
                                    <span class="text-xs">Giảm giá</span>
                                </div>
                            </div>
                        </div>
                        <!---->
                        <!---->
                    </div>
                    <?php for ($i = 1; $i <= 3; $i++) { ?>
                        <div class="rounded-2xl shadow-lg  px-3 py-4 bg-white">

                            <div class="flex-1">
                                <a href="">
                                    <img class="h-[147px] md:h-[230px] object-contain" src="{{asset('frontend/images/p_1.jpg')}}">
                                </a>
                                <h3 class="mt-1 text-body font-bold">Asus Zenbook Q408UG</h3>
                                <div class="mt-1">
                                    <div>
                                        <span class="text-label text-gray-20">
                                            Từ
                                        </span>
                                        <span class="font-bold text-red-600">
                                            17.990.000
                                        </span>
                                    </div>
                                    <div class="text-ui">
                                        <span class="line-through">
                                            21.990.000
                                        </span>
                                        <span class="font-bold">
                                            -18%
                                        </span>
                                    </div>
                                </div>

                                <div class="mt-2 flex items-center divide-x divide-space-x-2 gap-3">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-label text-gray-20 font-bold">Màu</span>
                                        <div class="w-4 h-4 rounded-sm bg-black border"></div>
                                        <div class="w-4 h-4 rounded-sm bg-white border"></div>
                                    </div>
                                    <span class="text-black text-sm font-bold pl-3 hidden md:block">
                                        1 phiên bản
                                    </span>
                                </div>
                                <!---->
                            </div>
                            <div class="border-t mt-2 pt-2">
                                <div class="flex items-center divide-x divide-space-x-2">
                                    <!---->
                                    <div class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                        </svg>
                                        <span class="text-xs">Giảm giá</span>
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <!---->
                        </div>
                    <?php } ?>
                </div>

            </div>

        </section>
        <section class="grid grid-cols-2 items-center mt-16 w-full md:gap-10 gap-4">
            <a href="" class="item bg-tint-blue-sky p-3 md:p-7 rounded-2xl h-full">
                <div class="flex md:items-center text-blue-700 flex-col md:flex-row">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span class="text-lg md:text-2xl font-extrabold md:ml-3 flex-1">
                        Kinh nghiệm chọn laptop
                    </span>
                    <button class="next rounded-full text-white p-1 bg-blue-700 hover:ease-in duration-300 hidden md:block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </button>
                </div>
            </a>
            <a href="" class="item bg-tint-green p-3 md:p-7 rounded-2xl h-full">
                <div class="flex md:items-center text-dark-green text-green-800 flex-col md:flex-row">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-lg md:text-2xl font-extrabold md:ml-3 flex-1">
                        Review laptop
                    </span>
                    <button class="next rounded-full text-white p-1 bg-green-800 hidden md:block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </button>
                </div>
            </a>
        </section>
    </div>
</main>

</div>
<?php /*@include('cart.common.style')
@include('cart.common.script')*/ ?>


@endsection
<footer class="bg-gray-50 py-10">
    <div class="container mx-auto">
        <div class="flex bg-white md:shadow md:rounded-2xl items-center">
            <div class="flex-1 p-4 md:p-10">
                <p class="font-black text-xl md:text-3xl">Tự tin mua sắm cùng ThinkPro</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                    <section>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <p class="my-2 text-lg md:text-xl text-black font-extrabold">Chế độ bảo hành tận tâm</p>
                        <p class="font-normal text-body text-black">
                            Tất cả các sản phẩm do ThinkPro bán ra đều được tuân thủ điều
                            kiện bảo hành của nhà cung cấp, hãng sản xuất. Nếu có vấn đề về
                            chất lượng sản phẩm, ThinkPro xin cam kết sẽ hỗ trợ Quý khách
                            tới cùng.
                        </p>
                        <a href="" class="flex font-bold mt-2 text-red-600 hover:text-red-800 items-center">
                            <div class="mr-2 text-body !leading-none">Chi tiết</div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </section>
                    <section>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        <p class="my-2 text-lg md:text-xl text-black font-extrabold">Hỗ trợ đổi trả 1-1 hoặc hoàn tiền 100%</p>
                        <p class="font-normal text-body text-black">
                            Với thời gian dùng thử lên tới 15 ngày, Quý khách sẽ được hỗ trợ
                            đổi trả 1-1 hoặc hoàn tiền 100% nếu phát sinh lỗi hoặc cảm thấy
                            sản phẩm chưa đáp ứng được nhu cầu.
                        </p>
                        <a href="" class="flex font-bold mt-2 text-red-600 hover:text-red-800 items-center">
                            <div class="mr-2 text-body !leading-none">Chi tiết</div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </section>
                </div>
                <div class="h-px bg-gray-30 my-6"></div>
                <section>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>

                    <p class="my-2 text-lg md:text-xl text-black font-extrabold">Thông tin hữu ích</p>
                    <div class="mt-3 grid gap-x-6 gap-y-2 grid-cols-1 md:grid-cols-2">
                        <a href="tel:" class="block cursor-pointer bg-gray-50  hover:bg-gray-100 rounded-2xl py-3 px-2">
                            <div class="flex items-center ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <div class="font-bold ml-2">Hotline: 1900.63.3579</div>
                            </div>
                        </a>
                        <a href="tel:" class="block cursor-pointer bg-gray-50  hover:bg-gray-100 rounded-2xl py-3 px-2">

                            <div class="flex items-center ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                </svg>
                                <div class="font-bold ml-2">Vận chuyển, thanh toán</div>
                            </div>
                        </a>
                        <a href="tel:" class="block cursor-pointer bg-gray-50  hover:bg-gray-100 rounded-2xl py-3 px-2">

                            <div class="flex items-cente">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 50 50" style=" fill:rgb(220 38 38 / 1);">
                                    <path d="M 25 3 C 12.861562 3 3 12.861562 3 25 C 3 36.019135 11.127533 45.138355 21.712891 46.728516 L 22.861328 46.902344 L 22.861328 29.566406 L 17.664062 29.566406 L 17.664062 26.046875 L 22.861328 26.046875 L 22.861328 21.373047 C 22.861328 18.494965 23.551973 16.599417 24.695312 15.410156 C 25.838652 14.220896 27.528004 13.621094 29.878906 13.621094 C 31.758714 13.621094 32.490022 13.734993 33.185547 13.820312 L 33.185547 16.701172 L 30.738281 16.701172 C 29.349697 16.701172 28.210449 17.475903 27.619141 18.507812 C 27.027832 19.539724 26.84375 20.771816 26.84375 22.027344 L 26.84375 26.044922 L 32.966797 26.044922 L 32.421875 29.564453 L 26.84375 29.564453 L 26.84375 46.929688 L 27.978516 46.775391 C 38.71434 45.319366 47 36.126845 47 25 C 47 12.861562 37.138438 3 25 3 z M 25 5 C 36.057562 5 45 13.942438 45 25 C 45 34.729791 38.035799 42.731796 28.84375 44.533203 L 28.84375 31.564453 L 34.136719 31.564453 L 35.298828 24.044922 L 28.84375 24.044922 L 28.84375 22.027344 C 28.84375 20.989871 29.033574 20.060293 29.353516 19.501953 C 29.673457 18.943614 29.981865 18.701172 30.738281 18.701172 L 35.185547 18.701172 L 35.185547 12.009766 L 34.318359 11.892578 C 33.718567 11.811418 32.349197 11.621094 29.878906 11.621094 C 27.175808 11.621094 24.855567 12.357448 23.253906 14.023438 C 21.652246 15.689426 20.861328 18.170128 20.861328 21.373047 L 20.861328 24.046875 L 15.664062 24.046875 L 15.664062 31.566406 L 20.861328 31.566406 L 20.861328 44.470703 C 11.816995 42.554813 5 34.624447 5 25 C 5 13.942438 13.942438 5 25 5 z"></path>
                                </svg>
                                <div class="font-bold ml-2">Group trao đổi và hỗ trợ</div>
                            </div>
                        </a>
                        <a href="" class="block cursor-pointer bg-gray-50  hover:bg-gray-100 rounded-2xl py-3 px-2">

                            <div class="flex items-center ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <div class="font-bold ml-2">Tra cứu bảo hành</div>
                            </div>
                        </a>
                        <a href="" class="block cursor-pointer bg-gray-50  hover:bg-gray-100 rounded-2xl py-3 px-2">

                            <div class="flex items-center ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                </svg>
                                <div class="font-bold ml-2">Hệ thống cửa hàng</div>
                            </div>
                        </a>
                        <a href="" class="block cursor-pointer bg-gray-50  hover:bg-gray-100 rounded-2xl py-3 px-2">

                            <div class="flex items-center ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd" />
                                </svg>
                                <div class="font-bold ml-2">Bảng giá dịch vụ</div>
                            </div>
                        </a>
                    </div>
                </section>
                <div class="h-px bg-gray-30 my-6"></div>
                <section>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 3a1 1 0 012 0v5.5a.5.5 0 001 0V4a1 1 0 112 0v4.5a.5.5 0 001 0V6a1 1 0 112 0v5a7 7 0 11-14 0V9a1 1 0 012 0v2.5a.5.5 0 001 0V4a1 1 0 012 0v4.5a.5.5 0 001 0V3z" clip-rule="evenodd" />
                    </svg>
                    <p class="my-2 text-lg md:text-xl text-black font-extrabold">ThinkPro trên social networks</p>
                    <div class="grid gap-4 md:grid-cols-4 grid-cols-2">
                        <a href="" target="_blank" class="border rounded-lg p-2 cursor-pointer hover:bg-gray-100 hover:border-gray-100">
                            <div class="flex space-x-4 items-center">
                                <div class="h-9 w-9">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="36" height="36" viewBox="0 0 48 48" style=" fill:#000000;">
                                        <path fill="#039be5" d="M24 5A19 19 0 1 0 24 43A19 19 0 1 0 24 5Z"></path>
                                        <path fill="#fff" d="M26.572,29.036h4.917l0.772-4.995h-5.69v-2.73c0-2.075,0.678-3.915,2.619-3.915h3.119v-4.359c-0.548-0.074-1.707-0.236-3.897-0.236c-4.573,0-7.254,2.415-7.254,7.917v3.323h-4.701v4.995h4.701v13.729C22.089,42.905,23.032,43,24,43c0.875,0,1.729-0.08,2.572-0.194V29.036z"></path>
                                    </svg>
                                </div>
                                <span>Facebook</span>
                            </div>
                        </a>
                        <a href="" target="_blank" class="border rounded-lg p-2 cursor-pointer hover:bg-gray-100 hover:border-gray-100">
                            <div class="flex space-x-4 items-center">
                                <div class="h-9 w-9">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="36" height="36" viewBox="0 0 48 48" style=" fill:#000000;">
                                        <path fill="#FF3D00" d="M43.2,33.9c-0.4,2.1-2.1,3.7-4.2,4c-3.3,0.5-8.8,1.1-15,1.1c-6.1,0-11.6-0.6-15-1.1c-2.1-0.3-3.8-1.9-4.2-4C4.4,31.6,4,28.2,4,24c0-4.2,0.4-7.6,0.8-9.9c0.4-2.1,2.1-3.7,4.2-4C12.3,9.6,17.8,9,24,9c6.2,0,11.6,0.6,15,1.1c2.1,0.3,3.8,1.9,4.2,4c0.4,2.3,0.9,5.7,0.9,9.9C44,28.2,43.6,31.6,43.2,33.9z"></path>
                                        <path fill="#FFF" d="M20 31L20 17 32 24z"></path>
                                    </svg>
                                </div>
                                <span>Youtube</span>
                            </div>
                        </a>
                        <a href="" target="_blank" class="border rounded-lg p-2 cursor-pointer hover:bg-gray-100 hover:border-gray-100">
                            <div class="flex space-x-4 items-center">
                                <div class="h-9 w-9">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="36" height="36" viewBox="0 0 64 64" style=" fill:#000000;">
                                        <path d="M48,8H16c-4.418,0-8,3.582-8,8v32c0,4.418,3.582,8,8,8h32c4.418,0,8-3.582,8-8V16C56,11.582,52.418,8,48,8z M50,27 c-3.964,0-6.885-1.09-9-2.695V38.5C41,44.841,35.841,50,29.5,50S18,44.841,18,38.5S23.159,27,29.5,27h2v5h-2 c-3.584,0-6.5,2.916-6.5,6.5s2.916,6.5,6.5,6.5s6.5-2.916,6.5-6.5V14h5c0.018,1.323,0.533,8,9,8V27z"></path>
                                    </svg>
                                </div>
                                <span>Tiktok</span>
                            </div>
                        </a>
                        <a href="" target="_blank" class="border rounded-lg p-2 cursor-pointer hover:bg-gray-100 hover:border-gray-100">
                            <div class="flex space-x-4 items-center">
                                <div class="h-9 w-9">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="36" height="36" viewBox="0 0 48 48" style=" fill:#000000;">
                                        <path fill="#304ffe" d="M41.67,13.48c-0.4,0.26-0.97,0.5-1.21,0.77c-0.09,0.09-0.14,0.19-0.12,0.29v1.03l-0.3,1.01l-0.3,1l-0.33,1.1 l-0.68,2.25l-0.66,2.22l-0.5,1.67c0,0.26-0.01,0.52-0.03,0.77c-0.07,0.96-0.27,1.88-0.59,2.74c-0.19,0.53-0.42,1.04-0.7,1.52 c-0.1,0.19-0.22,0.38-0.34,0.56c-0.4,0.63-0.88,1.21-1.41,1.72c-0.41,0.41-0.86,0.79-1.35,1.11c0,0,0,0-0.01,0 c-0.08,0.07-0.17,0.13-0.27,0.18c-0.31,0.21-0.64,0.39-0.98,0.55c-0.23,0.12-0.46,0.22-0.7,0.31c-0.05,0.03-0.11,0.05-0.16,0.07 c-0.57,0.27-1.23,0.45-1.89,0.54c-0.04,0.01-0.07,0.01-0.11,0.02c-0.4,0.07-0.79,0.13-1.19,0.16c-0.18,0.02-0.37,0.03-0.55,0.03 l-0.71-0.04l-3.42-0.18c0-0.01-0.01,0-0.01,0l-1.72-0.09c-0.13,0-0.27,0-0.4-0.01c-0.54-0.02-1.06-0.08-1.58-0.19 c-0.01,0-0.01,0-0.01,0c-0.95-0.18-1.86-0.5-2.71-0.93c-0.47-0.24-0.93-0.51-1.36-0.82c-0.18-0.13-0.35-0.27-0.52-0.42 c-0.48-0.4-0.91-0.83-1.31-1.27c-0.06-0.06-0.11-0.12-0.16-0.18c-0.06-0.06-0.12-0.13-0.17-0.19c-0.38-0.48-0.7-0.97-0.96-1.49 c-0.24-0.46-0.43-0.95-0.58-1.49c-0.06-0.19-0.11-0.37-0.15-0.57c-0.01-0.01-0.02-0.03-0.02-0.05c-0.1-0.41-0.19-0.84-0.24-1.27 c-0.06-0.33-0.09-0.66-0.09-1c-0.02-0.13-0.02-0.27-0.02-0.4l1.91-2.95l1.87-2.88l0.85-1.31l0.77-1.18l0.26-0.41v-1.03 c0.02-0.23,0.03-0.47,0.02-0.69c-0.01-0.7-0.15-1.38-0.38-2.03c-0.22-0.69-0.53-1.34-0.85-1.94c-0.38-0.69-0.78-1.31-1.11-1.87 C14,7.4,13.66,6.73,13.75,6.26C14.47,6.09,15.23,6,16,6h16c4.18,0,7.78,2.6,9.27,6.26C41.43,12.65,41.57,13.06,41.67,13.48z"></path>
                                        <path fill="#4928f4" d="M42,16v0.27l-1.38,0.8l-0.88,0.51l-0.97,0.56l-1.94,1.13l-1.9,1.1l-1.94,1.12l-0.77,0.45 c0,0.48-0.12,0.92-0.34,1.32c-0.31,0.58-0.83,1.06-1.49,1.47c-0.67,0.41-1.49,0.74-2.41,0.98c0,0,0-0.01-0.01,0 c-3.56,0.92-8.42,0.5-10.78-1.26c-0.66-0.49-1.12-1.09-1.32-1.78c-0.06-0.23-0.09-0.48-0.09-0.73v-7.19 c0.01-0.15-0.09-0.3-0.27-0.45c-0.54-0.43-1.81-0.84-3.23-1.25c-1.11-0.31-2.3-0.62-3.3-0.92c-0.79-0.24-1.46-0.48-1.86-0.71 c0.18-0.35,0.39-0.7,0.61-1.03c1.4-2.05,3.54-3.56,6.02-4.13C14.47,6.09,15.23,6,16,6h10.8c5.37,0.94,10.32,3.13,14.47,6.26 c0.16,0.39,0.3,0.8,0.4,1.22c0.18,0.66,0.29,1.34,0.32,2.05C42,15.68,42,15.84,42,16z"></path>
                                        <path fill="#6200ea" d="M42,16v4.41l-0.22,0.68l-0.75,2.33l-0.78,2.4l-0.41,1.28l-0.38,1.19l-0.37,1.13l-0.36,1.12l-0.19,0.59 l-0.25,0.78c0,0.76-0.02,1.43-0.07,2c-0.01,0.06-0.02,0.12-0.02,0.18c-0.06,0.53-0.14,0.98-0.27,1.36 c-0.01,0.06-0.03,0.12-0.05,0.17c-0.26,0.72-0.65,1.18-1.23,1.48c-0.14,0.08-0.3,0.14-0.47,0.2c-0.53,0.18-1.2,0.27-2.02,0.32 c-0.6,0.04-1.29,0.05-2.07,0.05H31.4l-1.19-0.05L30,37.61l-2.17-0.09l-2.2-0.09l-7.25-0.3l-1.88-0.08h-0.26 c-0.78-0.01-1.45-0.06-2.03-0.14c-0.84-0.13-1.49-0.35-1.98-0.68c-0.7-0.45-1.11-1.11-1.35-2.03c-0.06-0.22-0.11-0.45-0.14-0.7 c-0.1-0.58-0.15-1.25-0.18-2c0-0.15,0-0.3-0.01-0.46c-0.01-0.01,0-0.01,0-0.01v-0.58c-0.01-0.29-0.01-0.59-0.01-0.9l0.05-1.61 l0.03-1.15l0.04-1.34v-0.19l0.07-2.46l0.07-2.46l0.07-2.31l0.06-2.27l0.02-0.6c0-0.31-1.05-0.49-2.22-0.64 c-0.93-0.12-1.95-0.23-2.56-0.37c0.05-0.23,0.1-0.46,0.16-0.68c0.18-0.72,0.45-1.4,0.79-2.05c0.18-0.35,0.39-0.7,0.61-1.03 c2.16-0.95,4.41-1.69,6.76-2.17c2.06-0.43,4.21-0.66,6.43-0.66c7.36,0,14.16,2.49,19.54,6.69c0.52,0.4,1.03,0.83,1.53,1.28 C42,15.68,42,15.84,42,16z"></path>
                                        <path fill="#673ab7" d="M42,18.37v4.54l-0.55,1.06l-1.05,2.05l-0.56,1.08l-0.51,0.99l-0.22,0.43c0,0.31,0,0.61-0.02,0.9 c0,0.43-0.02,0.84-0.05,1.22c-0.04,0.45-0.1,0.86-0.16,1.24c-0.15,0.79-0.36,1.47-0.66,2.03c-0.04,0.07-0.08,0.14-0.12,0.2 c-0.11,0.18-0.24,0.35-0.38,0.51c-0.18,0.22-0.38,0.41-0.61,0.57c-0.34,0.26-0.74,0.47-1.2,0.63c-0.57,0.21-1.23,0.35-2.01,0.43 c-0.51,0.05-1.07,0.08-1.68,0.08l-0.42,0.02l-2.08,0.12h-0.01L27.5,36.6l-2.25,0.13l-3.1,0.18l-3.77,0.22l-0.55,0.03 c-0.51,0-0.99-0.03-1.45-0.09c-0.05-0.01-0.09-0.02-0.14-0.02c-0.68-0.11-1.3-0.29-1.86-0.54c-0.68-0.3-1.27-0.7-1.77-1.18 c-0.44-0.43-0.82-0.92-1.13-1.47c-0.07-0.13-0.14-0.25-0.2-0.39c-0.3-0.59-0.54-1.25-0.72-1.97c-0.03-0.12-0.06-0.25-0.08-0.38 c-0.06-0.23-0.11-0.47-0.14-0.72c-0.11-0.64-0.17-1.32-0.2-2.03v-0.01c-0.01-0.29-0.02-0.57-0.02-0.87l-0.49-1.17l-0.07-0.18 L9.5,25.99L8.75,24.2l-0.12-0.29l-0.72-1.73l-0.8-1.93c0,0,0,0-0.01,0L6.29,18.3L6,17.59V16c0-0.63,0.06-1.25,0.17-1.85 c0.05-0.23,0.1-0.46,0.16-0.68c0.85-0.49,1.74-0.94,2.65-1.34c2.08-0.93,4.31-1.62,6.62-2.04c1.72-0.31,3.51-0.48,5.32-0.48 c7.31,0,13.94,2.65,19.12,6.97c0.2,0.16,0.39,0.32,0.58,0.49C41.09,17.48,41.55,17.91,42,18.37z"></path>
                                        <path fill="#8e24aa" d="M42,21.35v5.14l-0.57,1.19l-1.08,2.25l-0.01,0.03c0,0.43-0.02,0.82-0.05,1.17c-0.1,1.15-0.38,1.88-0.84,2.33 c-0.33,0.34-0.74,0.53-1.25,0.63c-0.03,0.01-0.07,0.01-0.1,0.02c-0.16,0.03-0.33,0.05-0.51,0.05c-0.62,0.06-1.35,0.02-2.19-0.04 c-0.09,0-0.19-0.01-0.29-0.02c-0.61-0.04-1.26-0.08-1.98-0.11c-0.39-0.01-0.8-0.02-1.22-0.02h-0.02l-1.01,0.08h-0.01l-2.27,0.16 l-2.59,0.2l-0.38,0.03l-3.03,0.22l-1.57,0.12l-1.55,0.11c-0.27,0-0.53,0-0.79-0.01c0,0-0.01-0.01-0.01,0 c-1.13-0.02-2.14-0.09-3.04-0.26c-0.83-0.14-1.56-0.36-2.18-0.69c-0.64-0.31-1.17-0.75-1.6-1.31c-0.41-0.55-0.71-1.24-0.9-2.07 c0-0.01,0-0.01,0-0.01c-0.14-0.67-0.22-1.45-0.22-2.33l-0.15-0.27L9.7,26.35l-0.13-0.22L9.5,25.99l-0.93-1.65l-0.46-0.83 l-0.58-1.03l-1-1.79L6,19.75v-3.68c0.88-0.58,1.79-1.09,2.73-1.55c1.14-0.58,2.32-1.07,3.55-1.47c1.34-0.44,2.74-0.79,4.17-1.02 c1.45-0.24,2.94-0.36,4.47-0.36c6.8,0,13.04,2.43,17.85,6.47c0.22,0.17,0.43,0.36,0.64,0.54c0.84,0.75,1.64,1.56,2.37,2.41 C41.86,21.18,41.94,21.26,42,21.35z"></path>
                                        <path fill="#c2185b" d="M42,24.71v7.23c-0.24-0.14-0.57-0.31-0.98-0.49c-0.22-0.11-0.47-0.22-0.73-0.32 c-0.38-0.17-0.79-0.33-1.25-0.49c-0.1-0.04-0.2-0.07-0.31-0.1c-0.18-0.07-0.37-0.13-0.56-0.19c-0.59-0.18-1.24-0.35-1.92-0.5 c-0.26-0.05-0.53-0.1-0.8-0.14c-0.87-0.15-1.8-0.24-2.77-0.25c-0.08-0.01-0.17-0.01-0.25-0.01l-2.57,0.02l-3.5,0.02h-0.01 l-7.49,0.06c-2.38,0-3.84,0.57-4.72,0.8c0,0-0.01,0-0.01,0.01c-0.93,0.24-1.22,0.09-1.3-1.54c-0.02-0.45-0.03-1.03-0.03-1.74 l-0.56-0.43l-0.98-0.74l-0.6-0.46l-0.12-0.09L8.88,24.1l-0.25-0.19l-0.52-0.4l-0.96-0.72L6,21.91v-3.4 c0.1-0.08,0.19-0.15,0.29-0.21c1.45-1,3-1.85,4.64-2.54c1.46-0.62,3-1.11,4.58-1.46c0.43-0.09,0.87-0.18,1.32-0.24 c1.33-0.23,2.7-0.34,4.09-0.34c6.01,0,11.53,2.09,15.91,5.55c0.66,0.52,1.3,1.07,1.9,1.66c0.82,0.78,1.59,1.61,2.3,2.49 c0.14,0.18,0.28,0.36,0.42,0.55C41.64,24.21,41.82,24.46,42,24.71z"></path>
                                        <path fill="#d81b60" d="M42,28.72V32c0,0.65-0.06,1.29-0.18,1.91c-0.18,0.92-0.49,1.8-0.91,2.62c-0.22,0.05-0.47,0.05-0.75,0.01 c-0.63-0.11-1.37-0.44-2.17-0.87c-0.04-0.01-0.08-0.03-0.11-0.05c-0.25-0.13-0.51-0.27-0.77-0.43c-0.53-0.29-1.09-0.61-1.65-0.91 c-0.12-0.06-0.24-0.12-0.35-0.18c-0.64-0.33-1.3-0.63-1.96-0.86c0,0,0,0-0.01,0c-0.14-0.05-0.29-0.1-0.44-0.14 c-0.57-0.16-1.15-0.26-1.71-0.26l-1.1-0.32l-4.87-1.41c0,0,0,0-0.01,0l-2.99-0.87h-0.01l-1.3-0.38c-3.76,0-6.07,1.6-7.19,0.99 c-0.44-0.23-0.7-0.81-0.79-1.95c-0.03-0.32-0.04-0.68-0.04-1.1l-1.17-0.57l-0.05-0.02h-0.01l-0.84-0.42L9.7,26.35l-0.07-0.03 l-0.17-0.09L7.5,25.28L6,24.55v-3.43c0.17-0.15,0.35-0.29,0.53-0.43c0.19-0.15,0.38-0.29,0.57-0.44c0.01,0,0.01,0,0.01,0 c1.18-0.85,2.43-1.6,3.76-2.22c1.55-0.74,3.2-1.31,4.91-1.68c0.25-0.06,0.51-0.12,0.77-0.16c1.42-0.27,2.88-0.41,4.37-0.41 c5.27,0,10.11,1.71,14.01,4.59c1.13,0.84,2.18,1.77,3.14,2.78c0.79,0.83,1.52,1.73,2.18,2.67c0.05,0.07,0.1,0.14,0.15,0.2 c0.37,0.54,0.71,1.09,1.03,1.66C41.64,28.02,41.82,28.37,42,28.72z"></path>
                                        <path fill="#f50057" d="M41.82,33.91c-0.18,0.92-0.49,1.8-0.91,2.62c-0.19,0.37-0.4,0.72-0.63,1.06c-0.14,0.21-0.29,0.41-0.44,0.6 c-0.36-0.14-0.89-0.34-1.54-0.56c0,0,0,0,0-0.01c-0.49-0.17-1.05-0.35-1.65-0.52c-0.17-0.05-0.34-0.1-0.52-0.15 c-0.71-0.19-1.45-0.36-2.17-0.46c-0.6-0.1-1.19-0.16-1.74-0.16l-0.46-0.13h-0.01l-2.42-0.7l-1.49-0.43l-1.66-0.48h-0.01l-0.54-0.15 l-6.53-1.88l-1.88-0.54l-1.4-0.33l-2.28-0.54l-0.28-0.07c0,0,0,0-0.01,0l-2.29-0.53c0-0.01,0-0.01,0-0.01l-0.41-0.09l-0.21-0.05 l-1.67-0.39l-0.19-0.05l-1.42-1.17L6,27.9v-4.08c0.37-0.36,0.75-0.7,1.15-1.03c0.12-0.11,0.25-0.21,0.38-0.31 c0.12-0.1,0.25-0.2,0.38-0.3c0.91-0.69,1.87-1.31,2.89-1.84c1.3-0.7,2.68-1.26,4.13-1.66c0.28-0.09,0.56-0.17,0.85-0.23 c1.64-0.41,3.36-0.62,5.14-0.62c4.47,0,8.63,1.35,12.07,3.66c1.71,1.15,3.25,2.53,4.55,4.1c0.66,0.79,1.26,1.62,1.79,2.5 c0.05,0.07,0.09,0.13,0.13,0.2c0.32,0.53,0.62,1.08,0.89,1.64c0.25,0.5,0.47,1,0.67,1.52C41.34,32.25,41.6,33.07,41.82,33.91z"></path>
                                        <path fill="#ff1744" d="M40.28,37.59c-0.14,0.21-0.29,0.41-0.44,0.6c-0.44,0.55-0.92,1.05-1.46,1.49c-0.47,0.39-0.97,0.74-1.5,1.04 c-0.2-0.05-0.4-0.11-0.61-0.19c-0.66-0.23-1.35-0.61-1.99-1.01c-0.96-0.61-1.79-1.27-2.16-1.57c-0.14-0.12-0.21-0.18-0.21-0.18 l-1.7-0.15L30,37.6l-2.2-0.19l-2.28-0.2l-3.37-0.3l-5.34-0.47l-0.02-0.01l-1.88-0.91l-1.9-0.92l-1.53-0.74l-0.33-0.16l-0.41-0.2 l-1.42-0.69L7.43,31.9l-0.59-0.29L6,31.35v-4.47c0.47-0.56,0.97-1.09,1.5-1.6c0.34-0.32,0.7-0.64,1.07-0.94 c0.06-0.05,0.12-0.1,0.18-0.14c0.04-0.05,0.09-0.08,0.13-0.1c0.59-0.48,1.21-0.91,1.85-1.3c0.74-0.47,1.52-0.89,2.33-1.24 c0.87-0.39,1.78-0.72,2.72-0.97c1.63-0.46,3.36-0.7,5.14-0.7c4.08,0,7.85,1.24,10.96,3.37c1.99,1.36,3.71,3.08,5.07,5.07 c0.45,0.64,0.85,1.32,1.22,2.02c0.13,0.26,0.26,0.52,0.37,0.78c0.12,0.25,0.23,0.5,0.34,0.75c0.21,0.52,0.4,1.04,0.57,1.58 c0.32,1,0.56,2.02,0.71,3.08C40.21,36.89,40.25,37.24,40.28,37.59z"></path>
                                        <path fill="#ff5722" d="M38.39,39.42c0,0.08,0,0.17-0.01,0.26c-0.47,0.39-0.97,0.74-1.5,1.04c-0.22,0.12-0.44,0.24-0.67,0.34 c-0.23,0.11-0.46,0.21-0.7,0.3c-0.34-0.18-0.8-0.4-1.29-0.61c-0.69-0.31-1.44-0.59-2.02-0.68c-0.14-0.03-0.27-0.04-0.39-0.04 l-1.64-0.21h-0.02l-2.04-0.27l-2.06-0.27l-0.96-0.12l-7.56-0.98c-0.49,0-1.01-0.03-1.55-0.1c-0.66-0.06-1.35-0.16-2.04-0.3 c-0.68-0.12-1.37-0.28-2.03-0.45c-0.69-0.16-1.37-0.35-2-0.53c-0.73-0.22-1.41-0.43-1.98-0.62c-0.47-0.15-0.87-0.29-1.18-0.4 c-0.18-0.43-0.33-0.88-0.44-1.34C6.1,33.66,6,32.84,6,32v-1.67c0.32-0.53,0.67-1.05,1.06-1.54c0.71-0.94,1.52-1.8,2.4-2.56 c0.03-0.04,0.07-0.07,0.1-0.09l0.01-0.01c0.31-0.28,0.63-0.53,0.97-0.77c0.04-0.04,0.08-0.07,0.12-0.1 c0.16-0.12,0.33-0.24,0.51-0.35c1.43-0.97,3.01-1.73,4.7-2.24c1.6-0.48,3.29-0.73,5.05-0.73c3.49,0,6.75,1.03,9.47,2.79 c2.01,1.29,3.74,2.99,5.06,4.98c0.16,0.23,0.31,0.46,0.46,0.7c0.69,1.17,1.26,2.43,1.68,3.75c0.05,0.15,0.09,0.3,0.13,0.46 c0.08,0.27,0.15,0.55,0.21,0.83c0.02,0.07,0.04,0.14,0.06,0.22c0.14,0.63,0.24,1.29,0.31,1.95c0,0.01,0,0.01,0,0.01 C38.36,38.22,38.39,38.82,38.39,39.42z"></path>
                                        <path fill="#ff6f00" d="M36.33,39.42c0,0.35-0.02,0.73-0.06,1.11c-0.02,0.18-0.04,0.36-0.06,0.53c-0.23,0.11-0.46,0.21-0.7,0.3 c-0.45,0.17-0.91,0.31-1.38,0.41c-0.32,0.07-0.65,0.13-0.98,0.16h-0.01c-0.31-0.19-0.67-0.42-1.04-0.68 c-0.67-0.47-1.37-1-1.93-1.43c-0.01-0.01-0.01-0.01-0.02-0.02c-0.59-0.45-1.01-0.79-1.01-0.79l-1.06,0.04l-2.04,0.07l-0.95,0.04 l-3.82,0.14l-3.23,0.12c-0.21,0.01-0.46,0.01-0.77,0h-0.01c-0.42-0.01-0.92-0.04-1.47-0.09c-0.64-0.05-1.34-0.11-2.05-0.18 c-0.69-0.08-1.39-0.16-2.06-0.24c-0.74-0.08-1.44-0.17-2.04-0.25c-0.47-0.06-0.88-0.11-1.21-0.15c-0.28-0.32-0.53-0.65-0.77-1.01 c-0.36-0.54-0.67-1.11-0.91-1.72c-0.18-0.43-0.33-0.88-0.44-1.34c0.29-0.89,0.67-1.73,1.12-2.54c0.36-0.66,0.78-1.29,1.24-1.89 c0.45-0.59,0.94-1.14,1.47-1.64v-0.01c0.15-0.15,0.3-0.29,0.45-0.42c0.28-0.26,0.57-0.5,0.87-0.73h0.01 c0.01-0.02,0.02-0.02,0.03-0.03c0.24-0.19,0.49-0.36,0.74-0.53c1.48-1.01,3.15-1.76,4.95-2.2c1.19-0.29,2.44-0.45,3.73-0.45 c2.54,0,4.94,0.61,7.05,1.71h0.01c1.81,0.93,3.41,2.21,4.7,3.75c0.71,0.82,1.32,1.72,1.82,2.67c0.35,0.64,0.65,1.31,0.9,1.99 c0.02,0.06,0.04,0.11,0.06,0.16c0.17,0.5,0.32,1.02,0.45,1.54c0.09,0.37,0.16,0.75,0.22,1.13c0.02,0.12,0.04,0.23,0.05,0.35 C36.28,37.99,36.33,38.7,36.33,39.42z"></path>
                                        <path fill="#ff9800" d="M34.28,39.42v0.1c0,0.34-0.03,0.77-0.06,1.23c-0.03,0.34-0.06,0.69-0.09,1.02c-0.32,0.07-0.65,0.13-0.98,0.16 h-0.01C32.76,41.98,32.39,42,32,42h-1.75l-0.38-0.11l-1.97-0.6l-2-0.6l-4.63-1.39l-2-0.6c0,0-0.83,0.33-2,0.72h-0.01 c-0.45,0.15-0.94,0.31-1.46,0.47c-0.65,0.19-1.34,0.38-2.02,0.53c-0.7,0.16-1.39,0.28-2.01,0.33c-0.19,0.02-0.38,0.03-0.55,0.03 c-0.56-0.31-1.1-0.68-1.59-1.09c-0.43-0.36-0.83-0.75-1.2-1.18c-0.28-0.32-0.53-0.65-0.77-1.01c0.07-0.45,0.15-0.89,0.27-1.32 c0.3-1.19,0.77-2.33,1.39-3.37c0.34-0.59,0.72-1.16,1.16-1.69c0.01-0.03,0.04-0.06,0.07-0.08c-0.01-0.01,0-0.01,0-0.01 c0.13-0.17,0.27-0.33,0.41-0.48c0-0.01,0-0.01,0-0.01c0.41-0.44,0.83-0.86,1.29-1.25c0.16-0.13,0.31-0.26,0.48-0.39 c0.03-0.03,0.06-0.05,0.1-0.08c2.25-1.72,5.06-2.76,8.09-2.76c3.44,0,6.57,1.29,8.94,3.41c1.14,1.03,2.11,2.26,2.84,3.63 c0.06,0.1,0.12,0.21,0.17,0.32c0.09,0.18,0.18,0.37,0.26,0.57c0.33,0.72,0.59,1.48,0.77,2.26c0.02,0.08,0.04,0.16,0.06,0.24 c0.08,0.37,0.15,0.75,0.2,1.13C34.24,38.21,34.28,38.81,34.28,39.42z"></path>
                                        <path fill="#ffc107" d="M32.22,39.42c0,0.2-0.01,0.42-0.02,0.65c-0.02,0.37-0.05,0.77-0.1,1.18c-0.02,0.25-0.06,0.5-0.1,0.75h-5.48 l-1.06-0.17l-4.14-0.66l-0.59-0.09l-1.35-0.22c-0.59,0-1.87,0.26-3.22,0.51c-0.71,0.13-1.43,0.27-2.08,0.36 c-0.08,0.01-0.16,0.02-0.23,0.03h-0.01c-0.7-0.15-1.38-0.38-2.02-0.68c-0.2-0.09-0.4-0.19-0.6-0.3c-0.56-0.31-1.1-0.68-1.59-1.09 c-0.01-0.12-0.02-0.22-0.02-0.27c0-0.26,0.01-0.51,0.03-0.76c0.04-0.64,0.13-1.26,0.27-1.86c0.22-0.91,0.54-1.79,0.97-2.6 c0.08-0.17,0.17-0.34,0.27-0.5c0.04-0.08,0.09-0.15,0.13-0.23c0.18-0.29,0.38-0.57,0.58-0.85c0.42-0.55,0.89-1.07,1.39-1.54 c0.01,0,0.01,0,0.01,0c0.04-0.04,0.08-0.08,0.12-0.11c0.05-0.04,0.09-0.09,0.14-0.12c0.2-0.18,0.4-0.34,0.61-0.49 c0-0.01,0.01-0.01,0.01-0.01c1.89-1.41,4.23-2.24,6.78-2.24c1.98,0,3.82,0.5,5.43,1.38h0.01c1.38,0.76,2.58,1.79,3.53,3.03 c0.37,0.48,0.7,0.99,0.98,1.53h0.01c0.05,0.1,0.1,0.2,0.15,0.3c0.3,0.59,0.54,1.21,0.72,1.85h0.01c0.01,0.05,0.03,0.1,0.04,0.15 c0.12,0.43,0.22,0.87,0.29,1.32c0.01,0.09,0.02,0.19,0.03,0.28C32.19,38.43,32.22,38.92,32.22,39.42z"></path>
                                        <path fill="#ffd54f" d="M30.17,39.31c0,0.16,0,0.33-0.02,0.49v0.01c0,0.01,0,0.01,0,0.01c-0.02,0.72-0.12,1.43-0.28,2.07 c0,0.04-0.01,0.07-0.03,0.11h-4.67l-3.85-0.83l-0.51-0.11l-0.08,0.02l-4.27,0.88L16.27,42H16c-0.64,0-1.27-0.06-1.88-0.18 c-0.09-0.02-0.18-0.04-0.27-0.06h-0.01c-0.7-0.15-1.38-0.38-2.02-0.68c-0.02-0.11-0.04-0.22-0.05-0.33 c-0.07-0.43-0.1-0.88-0.1-1.33c0-0.17,0-0.34,0.01-0.51c0.03-0.54,0.11-1.07,0.23-1.58c0.08-0.38,0.19-0.75,0.32-1.1 c0.11-0.31,0.24-0.61,0.38-0.9c0.12-0.25,0.26-0.49,0.4-0.73c0.14-0.23,0.29-0.45,0.45-0.67c0.4-0.55,0.87-1.06,1.39-1.51 c0.3-0.26,0.63-0.51,0.97-0.73c1.46-0.96,3.21-1.52,5.1-1.52c0.37,0,0.73,0.02,1.08,0.07h0.02c1.07,0.12,2.07,0.42,2.99,0.87 c0.01,0,0.01,0,0.01,0c1.45,0.71,2.68,1.78,3.58,3.1c0.15,0.22,0.3,0.46,0.43,0.7c0.11,0.19,0.21,0.39,0.3,0.59 c0.14,0.31,0.27,0.64,0.38,0.97h0.01c0.11,0.37,0.21,0.74,0.28,1.13v0.01C30.11,38.16,30.17,38.73,30.17,39.31z"></path>
                                        <path fill="#ffe082" d="M28.11,39.52v0.03c0,0.59-0.07,1.17-0.21,1.74c-0.05,0.24-0.12,0.48-0.21,0.71h-4.48l-2.29-0.63L18.63,42H16 c-0.64,0-1.27-0.06-1.88-0.18c-0.02-0.03-0.03-0.06-0.04-0.09c-0.14-0.43-0.25-0.86-0.3-1.31c-0.04-0.29-0.06-0.59-0.06-0.9 c0-0.12,0-0.25,0.02-0.37c0.01-0.47,0.08-0.93,0.2-1.37c0.06-0.3,0.15-0.59,0.27-0.87c0.04-0.14,0.1-0.27,0.17-0.4 c0.15-0.34,0.33-0.67,0.53-0.99c0.22-0.32,0.46-0.62,0.73-0.9c0.32-0.36,0.68-0.69,1.09-0.96c0.7-0.51,1.5-0.89,2.37-1.1 c0.58-0.16,1.19-0.24,1.82-0.24c2,0,3.79,0.8,5.09,2.09c0.05,0.05,0.11,0.11,0.16,0.18h0.01c0.14,0.15,0.27,0.3,0.4,0.47 c0.37,0.47,0.68,0.98,0.92,1.54c0.12,0.26,0.22,0.53,0.3,0.81c0.01,0.04,0.02,0.07,0.03,0.11c0.14,0.49,0.23,1,0.25,1.53 C28.1,39.2,28.11,39.36,28.11,39.52z"></path>
                                        <path fill="#ffecb3" d="M26.06,39.52c0,0.41-0.05,0.8-0.16,1.17c-0.1,0.4-0.25,0.78-0.44,1.14c-0.03,0.06-0.1,0.17-0.1,0.17h-8.88 c-0.01-0.01-0.02-0.03-0.02-0.04c-0.12-0.19-0.22-0.38-0.3-0.59c-0.2-0.46-0.32-0.96-0.36-1.48c-0.02-0.12-0.02-0.25-0.02-0.37 c0-0.06,0-0.13,0.01-0.19c0.01-0.44,0.07-0.86,0.19-1.25c0.1-0.36,0.23-0.69,0.4-1.01c0,0,0.01-0.01,0.01-0.02 c0.12-0.21,0.25-0.42,0.4-0.62c0.49-0.66,1.14-1.2,1.89-1.55c0.01,0,0.01,0,0.01,0c0.24-0.12,0.49-0.22,0.75-0.29c0,0,0,0,0.01,0 c0.46-0.14,0.96-0.21,1.47-0.21c0.59,0,1.16,0.09,1.68,0.28c0.19,0.05,0.37,0.13,0.55,0.22c0,0,0,0,0.01,0 c0.86,0.41,1.59,1.05,2.09,1.85c0.1,0.15,0.19,0.31,0.27,0.48c0.04,0.07,0.08,0.15,0.11,0.22c0.23,0.52,0.37,1.09,0.41,1.69 c0.01,0.05,0.01,0.1,0.01,0.16C26.06,39.36,26.06,39.44,26.06,39.52z"></path>
                                        <g>
                                            <path fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" d="M30,11H18c-3.9,0-7,3.1-7,7v12c0,3.9,3.1,7,7,7h12c3.9,0,7-3.1,7-7V18C37,14.1,33.9,11,30,11z"></path>
                                            <circle cx="31" cy="16" r="1" fill="#fff"></circle>
                                        </g>
                                        <g>
                                            <circle cx="24" cy="24" r="6" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></circle>
                                        </g>
                                    </svg>
                                </div>
                                <span>Instagram</span>
                            </div>
                        </a>
                    </div>
                </section>
            </div>
            <div class="flex-shrink-0 w-1/3 hidden md:block">
                <img alt="ThinkPro Footer" class="h-full object-cover ls-is-cached w-full rounded-r-2xl rounded-br-2xl" src="{{asset('frontend/images/footer.d5b4dbc.png')}}">
            </div>
        </div>
        <div class="block md:flex lg:flex mt-8 t-card md:h-[234px] lg:h-[234px]  bg-white md:shadow md:rounded-2xl">
            <section class="py-4 px-4 md:py-6 md:px-10 lg:py-6 lg:px-10 md:w-1/2 lg:w-1/2 w-full h-full">
                <a href="/" aria-label="" class="logo link-active">
                    <img class="h-9" src="{{asset('frontend/images/Logo.png')}}" alt="" />
                </a>
                <div class="mt-2 text-xs text-gray-20">
                    Chân thành phục vụ từ 2013
                </div>
                <div class="mt-6 grid gap-3 grid-cols-2 md:grid-cols-3 lg:grid-cols-3">
                    <a href="" class="text-base text-blue-500 font-bold">
                        Về chúng tôi
                    </a>
                    <a href="" class="text-base text-blue-500 font-bold">
                        Vì khách hàng
                    </a>
                    <a href="" class="text-base text-blue-500 font-bold">
                        Đội ngũ
                    </a>
                    <a href="" class="text-base text-blue-500 font-bold">
                        Tin tức
                    </a>
                    <a href="" class="text-base text-blue-500 font-bold">
                        Khuyến mại
                    </a>
                    <a href="" class="text-base text-blue-500 font-bold">
                        Sản phẩm
                    </a>
                </div>
            </section>
            <div class="md:w-1/2 lg:w-1/2 w-full relative">
                <div class="owl-carousel-banner owl-carousel owl-theme">
                    <div class="item">
                        <a href="#">
                            <img class="md:rounded-tr-2xl md:rounded-br-2xl lg:rounded-tr-2xl lg:rounded-br-2xl md:h-[234px]" src="https://media-api-beta.thinkpro.vn/media/core/banners/2022/3/3/PC ĐỒNG ĐỘ.png" alt=""></a>
                    </div>
                    <div class="item">
                        <img class="md:rounded-tr-2xl md:rounded-br-2xl lg:rounded-tr-2xl lg:rounded-br-2xl md:h-[234px]" src="https://media-api-beta.thinkpro.vn/media/core/banners/2022/3/3/PC ĐỒNG ĐỘ.png" alt=""></a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</footer>