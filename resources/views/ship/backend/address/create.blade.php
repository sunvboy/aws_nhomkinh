@extends('dashboard.layout.dashboard')
@section('title')
<title>Thêm mới địa chỉ kho</title>
@endsection
@section('breadcrumb')
<?php
$array = array(
    [
        "title" => "Quản lý vận chuyển",
        "src" => route('ships.index'),
    ],
    [
        "title" => "Thêm mới",
        "src" => 'javascript:void(0)',
    ]
);
echo breadcrumb_backend($array);
?>
@endsection

@section('content')
<div class="content">
    <div class=" flex items-center mt-8">
        <h1 class="text-lg font-medium mr-auto">
            Thêm mới địa chỉ kho
        </h1>
    </div>
    <form class="grid grid-cols-12 gap-6 mt-5" role="form" action="{{route('ship_addresses.store')}}" method="post" enctype="multipart/form-data">
        <div class="col-span-12 mt-3">
            <!-- BEGIN: Form Layout -->
            <div class="box p-5">
                @include('components.alert-error')
                @csrf
                <div>
                    <label class="form-label text-base font-semibold">Địa chỉ</label>
                    <div class="mt-2">
                        <?php echo Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Số 33 ngõ 629 Kim Mã']); ?>
                    </div>
                </div>
                <div class="mt-3">
                    <label class="form-label text-base font-semibold">Tỉnh/Thành phố</label>
                    <div class="mt-2">
                        <?php echo Form::select('cityid', $listCity, '', ['class' => 'form-control tom-select tom-select-custom', 'id' => 'city']); ?>
                    </div>
                </div>
                <div class="mt-3">
                    <label class="form-label text-base font-semibold">Quận/Huyện</label>
                    <div class="mt-2">
                        <?php echo Form::select('districtid', [], '', ['class' => 'form-control', 'id' => 'district', 'placeholder' => '']); ?>
                    </div>
                </div>
                <div class="text-right mt-5">
                    <button type="submit" class="btn btn-primary w-24">Lưu</button>
                </div>
            </div>
            <!-- END: Form Layout -->
        </div>

    </form>
</div>
@endsection
@include('address.backend.script')