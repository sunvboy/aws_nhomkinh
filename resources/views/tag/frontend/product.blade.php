@extends('homepage.layout.home')
@section('content')
<main>
    <section class="contact_top relative">
        <img src="<?php echo asset('frontend/images/img-supporto-2.jpg') ?>" alt="" class="h-[200px] w-full object-cover" />
        <div class="absolute @if(svl_ismobile() != 'is mobile') container    @endif  top-1/2 -translate-y-1/2 left-4 md:left-1/2 md:-translate-x-1/2">
            <h2 class="text-[26px] md:text-[44px] text-white BoldC uppercase mt-2 w-auto" style="letter-spacing: 3.75px;line-height: 32px;">Giải pháp cho từng công trình</h2>
        </div>
    </section>
    <session class="">
        <div class="">

            <div class="grid md:grid-cols-12">
                @if(!$listTags->isEmpty())
                <div class="md:col-span-3 bg-[#F3F3F3]">
                    <div class="p-5 md:p-[50px]">
                        <nav class="list-type">
                            <h4 class="text-f18 border-b border-[#4ab74c] pb-[5px] BoldC text-[#333333] uppercase" style="letter-spacing: 2px;line-height: 29px;">LOẠI CÔNG TRÌNH</h4>
                            <ul class="js_ul_ct md:px-[15px] py-5">
                                @foreach($listTags as $item)
                                <li class="<?php if ($item->id == $detail->id) { ?>active<?php } ?>">
                                    <a href="{{route('tagURL',['slug'=>$item->slug])}}" class="text-base" style="letter-spacing: 2px;line-height: 29px;">{{$item->title}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
                @endif

                <div class="md:col-span-9 py-5 md:py-[50px] px-4 md:px-8">
                    <h1 class="BoldC text-[#4ab74c] uppercase text-xl md:text-f30 mb-[30px]" style="letter-spacing: 2px;line-height: 37px;">
                        GIẢI PHÁP dành cho <?php echo $detail->title ?>
                    </h1>
                    <div class="text-base" style="letter-spacing: 1px;">
                        <?php echo $detail->description ?>
                    </div>
                    @if($data)
                    <div class="grid md:grid-cols-2 md:gap-[30px] space-y-[30px] md:space-y-0">
                        @foreach($data as $k=>$item)
                        <div class="product_item">
                            <div>
                                <a href="{{route('routerURL',['slug' => $item->products->slug])}}">
                                    <img src="{{asset($item->products->image)}}" class="w-full h-[300px] object-contain" alt="{{$item->products->title}}">
                                </a>
                            </div>
                            <div class="mt-[10px]">
                                <div class="flex justify-between items-center md:gap-4 space-y-4 md:space-y-0">
                                    <div class="text-base" style="letter-spacing: 1px;">
                                        <h3>
                                            <a href="{{route('routerURL',['slug' => $item->products->slug])}}" class=" font-semibold" style="letter-spacing: 2px;line-height: 29px;">{{$item->products->title}}</a>
                                        </h3>
                                        <div>
                                            <?php echo strip_tags($item->products->description) ?>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{route('routerURL',['slug' => $item->products->slug])}}" class="py-[15px] border border-[#4ab74c] w-[115px] float-left text-center font-bold hover:bg-[#4ab74c] hover:text-white">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="my-10 flex justify-center">
                        <?php echo $data->links() ?>
                    </div>
                    @endif


                </div>
            </div>

        </div>
    </session>

</main>

@endsection

@push('css')
<style>
    .js_ul_ct li.active a {
        font-weight: bold;
    }

    .js_ul_ct li {
        margin-bottom: 5px;
    }
</style>

@endpush