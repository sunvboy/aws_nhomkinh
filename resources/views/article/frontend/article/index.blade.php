@extends('homepage.layout.home')
@section('content')
<nav class="relative w-full flex flex-wrap items-center justify-between py-2 bg-[#f9f9f9] text-gray-500 hover:text-gray-700 focus:text-gray-700 navbar navbar-expand-lg navbar-light">
    <div class="container px-4 mx-auto w-full flex flex-wrap items-center justify-between">
        <nav class="bg-grey-light w-full" aria-label="breadcrumb">
            <ol class="list-reset flex flex-wrap">
                <li><a href="<?php echo url('') ?>" class="text-gray-500 hover:text-gray-600 text-f13">{{trans('index.home')}}</a></li>
                @foreach($breadcrumb as $k=>$v)
                <li><span class="text-gray-500 mx-2">/</span></li>
                <li><a href="<?php echo route('routerURL', ['slug' => $v->slug]) ?>" class="text-gray-500 hover:text-gray-600  text-f13">{{ $v->title}}</a></li>
                @endforeach
                <li><span class="text-gray-500 mx-2">/</span></li>
                <li><a href="<?php echo route('routerURL', ['slug' => $detail->slug]) ?>" class="text-primary hover:text-gray-600  text-f13">{{ $detail->title}}</a></li>
            </ol>
        </nav>
    </div>
</nav>
<main class="my-8">
    <div class="container px-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 -mx-[15px]">
            <div class="lg:col-span-9 px-[15px]">
                <div class="space-y-2">
                    <h1 class="text-f22 md:text-f25 font-bold text-center leading-[1.1]">{{$detail->title}}</h1>
                    <div class="text-center  text-f13 text-[#999]">
                        <span><?php echo \Carbon\Carbon::parse($detail['created_at'])->format('l, m d Y') ?></span>&nbsp;-&nbsp;
                        <span>{{$detail->viewed}} {{trans('index.viewed')}}</span>
                    </div>
                    <div class="font-bold italic">
                        <?php echo $detail->description; ?>
                    </div>
                    <div class="box_content">
                        <?php echo $detail->content; ?>
                    </div>
                    @if(!$sameArticle->isEmpty())
                    <div>
                        <div class="bg-[#f0f0f0] p-[10px] rounded-[5px] my-4 uppercase text-f18 font-bold">
                            {{trans('index.RelatedPosts')}}
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 -mx-[15px]">
                            @foreach($sameArticle as $key=>$item)
                            <div class="px-[15px]">
                                <?php echo htmlArticle($item); ?>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

            </div>
            <div class="lg:col-span-3 px-[15px]">
                @include('article.frontend.aside')
            </div>
        </div>
    </div>
</main>

@endsection