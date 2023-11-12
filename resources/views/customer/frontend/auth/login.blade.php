@extends('homepage.layout.home')
@section('content')
<nav class="relative w-full flex flex-wrap items-center justify-between py-2 bg-[#f9f9f9] text-gray-500 hover:text-gray-700 focus:text-gray-700 navbar navbar-expand-lg navbar-light">
    <div class="container px-4 mx-auto w-full flex flex-wrap items-center justify-between">
        <nav class="bg-grey-light w-full" aria-label="breadcrumb">
            <ol class="list-reset flex">
                <li><a href="<?php echo url('') ?>" class="text-gray-500 hover:text-gray-600 text-f13">{{trans('index.home')}}</a></li>
                <li><span class="text-gray-500 mx-2">/</span></li>
                <li><a href="javascript:void(0)" class="text-gray-500 hover:text-gray-600 text-f13">{{trans('index.LoginAccount')}}</a></li>
            </ol>
        </nav>
    </div>
</nav>
<main class="py-8">
    <div class="container px-4 mx-auto">
        <div class="flex items-center justify-center">
            <div class="w-[580px] max-w-full bg-[#f4f6f8] p-6 rounded-xl">
                <div class="flex border-b border-[#eee]">
                    <div class="w-1/2 text-center">
                        <a href="{{route('customer.login')}}" class="font-bold uppercase h-[50px] leading-[50px] border-b  float-left w-full border-[#3bb77e]">{{trans('index.Login')}}</a>
                    </div>
                    <div class="w-1/2 text-center border-l border[#eee]">
                        <a href="{{route('customer.register')}}" class="font-semibold uppercase h-[50px] leading-[50px] float-left w-full ">{{trans('index.Register')}}</a>
                    </div>
                </div>
                <div class="text-center py-[10px] text-f14">
                    {{trans('index.PleaseEmailPassword')}} {{$fcSystem['homepage_brandname']}}
                </div>
                <form action="{{route('customer.login-store')}}" method="POST" id="form-auth">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700-700 px-4 py-3 rounded relative mt-2" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">
                            {{session('success')}}
                        </span>
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-2" role="alert">
                        <strong class="font-bold">ERROR!</strong>
                        <span class="block sm:inline">
                            @foreach ($errors->all() as $error)
                            {{ $error }}
                            @endforeach
                        </span>
                    </div>
                    @endif
                    <div class="mt-2">
                        <label class="font-bold text-f14">Email {{trans('index.OR')}} {{trans('index.Phone')}}<span class="text-f13 text-red-600">*</span></label>
                        <input type="text" class="  border w-full h-11 px-3 focus:outline-none focus:ring focus:ring-red-300  hover:outline-none hover:ring hover:ring-red-300  rounded-lg" name="email" value="{{old('email')}}" aria-describedby="emailHelp" placeholder="">
                    </div>
                    <div class="mt-5">
                        <label class="font-bold text-f14">{{trans('index.Password')}}<span class="text-f13 text-red-600">*</span></label>
                        <input type="password" class="  border w-full h-11 px-3 focus:outline-none focus:ring focus:ring-red-300  hover:outline-none hover:ring hover:ring-red-300  rounded-lg" name="password" aria-describedby="emailHelp" placeholder="">
                    </div>
                    <div class="flex mt-5 justify-end">
                        <a href="{{route('customer.reset-password')}}" class="text-[#3bb77e] font-bold" title="{{trans('index.ForgotPassword')}}?">{{trans('index.ForgotPassword')}}?</a>
                    </div>
                    <div class="mt-5 flex justify-center">
                        <button type="submit" class="btn-submit-contact py-4 px-1 md:px-8 rounded-lg block bg-[#3bb77e]  text-white transition-all leading-none text-f15 font-bold"> {{trans('index.Login')}}</button>
                    </div>
                    <div class="mt-5 text-f13 flex justify-center leading-4"><?php echo $fcSystem['title_3'] ?></div>
                </form>

            </div>

        </div>

    </div>
</main>
@endsection