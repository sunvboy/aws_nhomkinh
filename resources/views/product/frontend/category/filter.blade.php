<div class="tp_scroll w-[274px] side-left h-[100vh] sticky inset-0 overflow-auto pr-1">
    <div class="flex items-center space-x-2 pb-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
        </svg>
        <span class="font-bold text-gray-600">{{trans('index.Filter')}}</span>
    </div>
    <div class="flex flex-col pb-6">
        <div class="w-full py-4">
            <div class="flex justify-between items-center ">
                <h4 class="text-base font-semibold uppercase">{{trans('index.PriceRange')}}</h4>
            </div>
        </div>
        <div>
            <input type="text" class="js-range-slider" name="my_range" value="" />
            <div class="mt-1">
                <div class="flex  gap-4">
                    <div class="w-1/2">
                        <label class="">{{trans('index.Start')}} (tr)</label>
                        <input placeholder=".000" type="text" value="" class="filter border w-full h-11 px-2 focus:outline-none  hover:outline-none" name="price_start">
                    </div>
                    <div class="w-1/2">
                        <label class="">{{trans('index.End')}} (tr)</label>
                        <input placeholder=".000" type="text" value="" class="filter border w-full h-11 px-2 focus:outline-none  hover:outline-none " name="price_end">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(!empty($brandFilter) && count($brandFilter) > 0)
    <div class="filter-box flex flex-col pb-6 border-b">
        <div class="w-full py-4">
            <div class="flex justify-between items-center ">
                <h4 class="text-base font-semibold uppercase">{{trans('index.Brands')}}</h4>
            </div>
        </div>
        <div class="flex flex-wrap gap-4">
            @foreach ($brandFilter as $item)
            <label for="brand-{{$item->brands->id}}" class="js_brand relative px-4 py-2 text-center bg-white hover:bg-red-100 hover:border-red-100 rounded-md cursor-pointer border">
                <input id="brand-{{$item->brands->id}}" type="checkbox" data-title="{{$item->brands->title}}" value="{{$item->brands->id}}" class="js_input_brand filter hidden" name="brands[]">
                <span class="">{{$item->brands->title}}</span>
                <div class="product-filter-tick">
                    <svg enable-background="new 0 0 12 12" viewBox="0 0 12 12" x="0" y="0" class="shopee-svg-icon icon-tick-bold">
                        <g>
                            <path d="m5.2 10.9c-.2 0-.5-.1-.7-.2l-4.2-3.7c-.4-.4-.5-1-.1-1.4s1-.5 1.4-.1l3.4 3 5.1-7c .3-.4 1-.5 1.4-.2s.5 1 .2 1.4l-5.7 7.9c-.2.2-.4.4-.7.4 0-.1 0-.1-.1-.1z"></path>
                        </g>
                    </svg>
                </div>
            </label>
            @endforeach
        </div>
    </div>
    @endif

    @if(!empty($attributes) && count($attributes) > 0)
    @foreach ($attributes as $key=>$item)
    @if(count($item) > 0)
    <div class="filter-box flex flex-col pb-6 border-b">
        <div class="w-full py-4">
            <div class="flex justify-between items-center ">
                <h4 class="text-base font-semibold uppercase">{{$key}}</h4>
            </div>
        </div>
        <div class="flex flex-wrap gap-4">
            @foreach ($item as $val)
            <label for="attr-{{$val['id']}}" class="js_attr relative px-4 py-2 text-center bg-white hover:bg-red-100 hover:border-red-100 rounded-md cursor-pointer border">
                <input id="attr-{{$val['id']}}" type="checkbox" value="{{$val['id']}}" data-title="{{$val['title']}}" data-keyword="{{$val['keyword']}}" class="js_input_attr filter hidden" name="attr[]">
                <span>{{$val['title']}}</span>
                <div class="product-filter-tick">
                    <svg enable-background="new 0 0 12 12" viewBox="0 0 12 12" x="0" y="0" class="shopee-svg-icon icon-tick-bold">
                        <g>
                            <path d="m5.2 10.9c-.2 0-.5-.1-.7-.2l-4.2-3.7c-.4-.4-.5-1-.1-1.4s1-.5 1.4-.1l3.4 3 5.1-7c .3-.4 1-.5 1.4-.2s.5 1 .2 1.4l-5.7 7.9c-.2.2-.4.4-.7.4 0-.1 0-.1-.1-.1z"></path>
                        </g>
                    </svg>
                </div>
            </label>
            @endforeach
        </div>
    </div>
    @endif
    @endforeach
    @endif
    <input id="choose_attr" class="w-full hidden" type="text" name="attr">
</div>
@include('product.frontend.category.script')