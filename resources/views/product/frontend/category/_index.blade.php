@extends('homepage.layout.home')
@section('content')
<main class="py-8 bg-gray-50">
    <div class=" container mx-auto px-4">
        <div class="rounded-xl overflow-hidden">
            <div class="w-full h-[200px] relative">
                <img alt="{{$detail->title}}" src="{{!empty($detail->banner)?asset($detail->banner):asset($fcSystem['banner_1'])}}" class="blur-up object-cover w-full h-full">
                <h2 class="text-4xl font-black absolute left-6 top-1/2 text-white uppercase" style="transform: translateY(-50%)">{{$detail->title}}</h2>
            </div>
            <div class="px-6 py-4 bg-white float-left w-full">
                <h1 class="text-3xl font-bold">{{$detail->title}}</h1>
                <div class="mt-4">
                    <div class="px-2 py-3 float-left w-auto border-b-2 border-red-600 font-bold text-base">
                        <span class=" text-red-600">Tất cả {{$detail->title}}</span>
                        <span class="text-gray-600">{{$detail->countProduct->count()}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row space-x-4 relative pt-6 " id="scrollTop">
            @include('product.frontend.category.filter')
            <div class=" flex-1 pb-6">
                <div class="flex justify-between">
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute top-1/2 left-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="transform: translateY(-50%);">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input placeholder="Tìm kiếm trong" type="text" value="" class="filter rounded-full border w-[421px] h-11 px-8 focus:outline-none focus:ring focus:ring-red-300 focus:rounded-full hover:outline-none hover:ring hover:ring-red-300 hover:rounded-full" name="keywordFilter">
                    </div>
                    <div class="">
                        <select name="sortBy" class="filter rounded-full border h-11 px-8 focus:outline-none focus:ring focus:ring-red-300 focus:rounded-full hover:outline-none hover:ring hover:ring-red-300 hover:rounded-full">
                            <option value="">Sắp xếp theo</option>
                            <option value="id|desc">Mới nhất</option>
                            <option value="id|asc">Cũ nhất</option>
                            <option value="title|asc">Tên A-Z</option>
                            <option value="title|desc">Tên Z-A</option>
                            <option value="price|asc">Giá tăng dần</option>
                            <option value="price|desc">Giá giảm dần</option>
                        </select>
                    </div>

                </div>
                <section class="p-5 bg-red-50 rounded-2xl mt-6">
                    <h3 class="font-normal text-base">
                        Có
                        <strong class="js_total_filter"><?php echo $data->total() ?></strong>
                        sản phẩm phù hợp với tiêu chí của bạn
                    </h3>
                    <div class="mt-2 t-flex-gap">
                        <div id="js_selected_attr" class="flex flex-wrap gap-4 hidden">
                        </div>
                    </div>
                </section>

                <div class="mt-4">
                    <div class="grid grid-cols-2 md:grid-cols-3  lg:grid-cols-4 gap-4" id="js_data_product_filter">
                        @if($data)
                        @foreach ($data as $key=>$item)
                        <?php echo htmlItemProduct($key, $item); ?>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="mt-5">
                    <div class="flex justify-center js_pagination_filter">
                        {{$data->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection