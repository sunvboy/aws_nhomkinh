@extends('homepage.layout.home')
@section('content')
<nav class=" relative w-full flex flex-wrap items-center justify-between py-2 bg-[#f9f9f9] text-gray-500 hover:text-gray-700 focus:text-gray-700 navbar navbar-expand-lg navbar-light">
    <div class="container px-4 mx-auto w-full flex flex-wrap items-center justify-between">
        <nav class="bg-grey-light w-full" aria-label="breadcrumb">
            <ol class="list-reset flex">
                <li><a href="<?php echo url('') ?>" class="text-gray-500 hover:text-gray-600">{{trans('index.home')}}</a></li>
                @foreach($breadcrumb as $k=>$v)
                <li><span class="text-gray-500 mx-2">/</span></li>
                <li><a href="<?php echo route('routerURL', ['slug' => $v->slug]) ?>" class="text-gray-500 hover:text-gray-600">{{ $v->title}}</a></li>
                @endforeach
            </ol>
        </nav>
    </div>
</nav>
<main class="pt-3 mb-10">
    <div class="container px-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 -mx-[15px]">
            <div class="lg:col-span-9 px-[15px]">
                <h1 class="text-2xl my-[10px] font-bold">{{$detail->title}}</h1>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 mt-8 -mx-[15px]">
                    @foreach($data as $k => $item)
                    <div class="px-[15px]">
                        <?php echo htmlArticle($item); ?>
                    </div>
                    @endforeach
                </div>
                <div class="mt-10 flex justify-center">
                    <?php echo $data->links() ?>
                </div>
            </div>
            <div class="lg:col-span-3 px-[15px]">
                @include('article.frontend.aside')
            </div>
        </div>
    </div>
</main>
@endsection

@push('javascript')

@endpush