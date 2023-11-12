@extends('homepage.layout.home')
@section('content')
<nav class="relative w-full flex flex-wrap items-center justify-between py-2 bg-[#f9f9f9] text-gray-500 hover:text-gray-700 focus:text-gray-700 navbar navbar-expand-lg navbar-light">
    <div class="container px-4 mx-auto w-full flex flex-wrap items-center justify-between">
        <nav class="bg-grey-light w-full" aria-label="breadcrumb">
            <ol class="list-reset flex flex-wrap">
                <li><a href="<?php echo url('') ?>" class="text-gray-500 hover:text-gray-600 text-f13">{{trans('index.home')}}</a></li>
                <li><span class="text-gray-500 mx-2">/</span></li>
                <li><a href="javascript:void(0)" class="text-primary hover:text-gray-600  text-f13">{{ $page->title}}</a></li>
            </ol>
        </nav>
    </div>
</nav>
<main class="my-8">
    <div class="container px-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 -mx-[15px]">
            <div class="lg:col-span-9 px-[15px]">
                <div class="space-y-5">
                    <h1 class="text-f22 md:text-f25 font-bold text-center leading-[1.1]">{{$page->title}}</h1>
                    <div class="box_content">
                        <?php echo $page->description; ?>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-3 px-[15px]">
                @include('article.frontend.aside')
            </div>
        </div>
    </div>
</main>
@endsection

@push('css')
<link href="{{ asset('frontend/css/bt.css') }}" rel="stylesheet" async>
@endpush