@extends('dashboard.layout.dashboard')
@section('title')
<title>Quản lý vận chuyển</title>
@endsection
@section('breadcrumb')
<?php
$array = array(
    [
        "title" => "Danh sách hãng vận chuyển",
        "src" => 'javascript:void(0)',
    ]
);
echo breadcrumb_backend($array);
?>
@endsection
@section('content')
<div class="content">

    <div>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <!-- BEGIN: Data List -->
            <div class=" col-span-12 overflow-auto lg:overflow-visible">
                <div class="flex justify-between items-center">
                    <div class="">
                        <h2 class=" text-lg font-medium">Địa chỉ kho</h2>
                    </div>
                    <div class="">
                        @if(env('APP_ENV') == "local")
                        @can('ships_create')
                        <a href="{{route('ship_addresses.create')}}" class="btn btn-primary shadow-md mr-2">Thêm mới</a>
                        @endcan
                        @endif
                    </div>
                </div>
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap text-left">Địa chỉ</th>
                            <th class="whitespace-nowrap text-left">Tỉnh/Thành phố</th>
                            <th class="whitespace-nowrap text-left">Quận/Huyện</th>
                            <th class="whitespace-nowrap text-left">Đặt làm địa chỉ lấy hàng</th>
                            <th class="whitespace-nowrap text-left">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ship_addresses as $v)
                        <tr class="odd " id="post-<?php echo $v->id; ?>">
                            <td style="text-align: left;">
                                <?php echo $v->title; ?>
                            </td>
                            <td class="text-left">
                                <?php echo $v->city_name->name; ?>
                            </td>
                            <td class="text-left">
                                <?php echo $v->district_name->name; ?>
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    <input id="checkbox-switch" <?php echo ($v->publish == 1) ? 'checked=""' : ''; ?> class="form-check-input publish-ajax-shipping" type="checkbox" data-id="<?php echo $v->id; ?>">
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    @can('ships_edit')
                                    <a class="flex items-center mr-3" href="{{ route('ship_addresses.edit',['id'=>$v->id]) }}">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                        Edit
                                    </a>
                                    @endcan
                                    @can('ships_destroy')
                                    <a class="flex items-center text-danger ajax-delete" href="javascript:void(0);" data-id="<?php echo $v->id ?>" data-module="ship_addresses" data-child="0" data-title="Lưu ý: Khi bạn xóa thương hiệu, thương hiệu sẽ bị xóa vĩnh viễn. Hãy chắc chắn rằng bạn muốn thực hiện hành động này!">
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                                        Delete
                                    </a>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
            <div class=" col-span-12">
                <div class="flex justify-between flex-wrap sm:flex-nowrap items-center">
                    <div class="">
                        <h2 class=" text-lg font-medium">Hãng vận chuyển</h2>
                    </div>
                    <div class="">
                        @if(env('APP_ENV') == "local")
                        @can('ships_create')
                        <a href="{{route('ships.create')}}" class="btn btn-primary shadow-md mr-2">Thêm mới</a>
                        @endcan
                        @endif
                    </div>
                </div>
                <!-- BEGIN: Data List -->
                <div class=" col-span-12 overflow-auto lg:overflow-visible">
                    <table class="table table-report -mt-2">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">TIÊU ĐỀ</th>
                                <th class="whitespace-nowrap">HIỂN THỊ</th>
                                <th class="whitespace-nowrap">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $v)
                            <tr class="odd " id="post-<?php echo $v->id; ?>">

                                <td>
                                    <div class="flex justify-center items-center">
                                        <div class="w-10 h-10 image-fit zoom-in mr-2">
                                            @if(!empty($v->image))
                                            <img class=" rounded-full" src="{{asset($v->image)}}" style="object-fit: contain;">
                                            @else
                                            <img class=" rounded-full" src="{{asset('images/404.png')}}">
                                            @endif
                                        </div>
                                        <div class="flex-1 text-left">
                                            @if($v->id == 3)
                                            <a class="flex items-center mr-3" href="{{ route('ships.index_province') }}">
                                                <?php echo $v->title; ?>
                                            </a>
                                            @else
                                            <?php echo $v->title; ?>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                <td class="w-40">
                                    @include('components.publishTable',['module' => $module,'title' => 'publish','id' =>
                                    $v->id])
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        @if($v->id == 3)
                                        <a class="flex items-center mr-3" href="{{ route('ships.index_province') }}">
                                            <i data-lucide="plus" class="w-4 h-4 mr-1"></i>
                                            Quản lý
                                        </a>
                                        @endif
                                        @can('ships_edit')
                                        <a class="flex items-center mr-3" href="{{ route('ships.edit',['id'=>$v->id]) }}">
                                            <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                            Edit
                                        </a>
                                        @endcan
                                        @if(env('APP_ENV') == "local")
                                        @can('ships_destroy')
                                        <a class="flex items-center text-danger ajax-delete" href="javascript:;" data-id="<?php echo $v->id ?>" data-module="<?php echo $module ?>" data-child="0" data-title="Lưu ý: Khi bạn xóa thương hiệu, thương hiệu sẽ bị xóa vĩnh viễn. Hãy chắc chắn rằng bạn muốn thực hiện hành động này!">
                                            <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                                            Delete
                                        </a>
                                        @endcan
                                        @endif

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- END: Data List -->
            </div>
        </div>
    </div>

</div>

@endsection
@push('javascript')
<script type="text/javascript">
    /*START: ajax publish*/
    $(document).on('change', '.publish-ajax-shipping', function() {
        let _this = $(this);
        let param = {
            id: _this.attr("data-id")
        };
        $.ajax({
            type: 'POST',
            url: '<?php echo route('ships.publish') ?>',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                param: param
            },
            success: function(data) {
                location.reload();
            }
        });
        return false;
    });
    /*END: ajax publish*/
</script>
@endpush