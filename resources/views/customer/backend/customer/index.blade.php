@extends('dashboard.layout.dashboard')
@section('title')
<title>Danh sách khách hàng</title>
@endsection
@section('breadcrumb')
<?php
$array = array(
    [
        "title" => "Danh sách khách hàng",
        "src" => 'javascript:void(0)',
    ]
);
echo breadcrumb_backend($array);
?>
@endsection
@section('content')
<div class="content">
    <h1 class=" text-lg font-medium mt-10">
        Danh sách khách hàng
    </h1>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class=" col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2 justify-between">
            <div class="flex space-x-2">
                <select class="form-control ajax-delete-all mr10" style="width: 150px;;height:42px" data-title="Lưu ý: Khi bạn xóa danh mục nội dung tĩnh, toàn bộ nội dung tĩnh trong nhóm này sẽ bị xóa. Hãy chắc chắn rằng bạn muốn thực hiện chức năng này!" data-module="{{$module}}">
                    <option>Hành động</option>
                    <option value="">Xóa</option>
                </select>
                <form action="" class="flex space-x-2" id="search" style="margin-bottom: 0px;">
                    @if(isset($category))
                    <div style="width:250px;" class="mr10">
                        <?php echo Form::select('catalogueid', $category, request()->get('catalogueid'), ['class' => 'form-control tom-select tom-select-custom', 'data-placeholder' => "Select your favorite actors", 'style' => 'height:42px']); ?>
                    </div>
                    @endif
                    <div class="mr10 hidden">
                        <?php echo Form::select('order', array('0' => 'Mua hàng', '1' => 'Đã mua hàng', '2' => 'Chưa mua hàng'), request()->get('order'), ['class' => 'form-control tom-select tom-select-custom', 'data-placeholder' => "Select your favorite actors", 'style' => 'height:42px']); ?>
                    </div>
                    <input type="search" name="keyword" class="keyword form-control filter" placeholder="Nhập từ khóa tìm kiếm ..." autocomplete="off" value="<?php echo request()->get('keyword') ?>" style="width: 200px;">
                    <button class="btn btn-primary">
                        <i data-lucide="search"></i>
                    </button>
                </form>
            </div>
            @can('customers_create')
            <a href="{{route('customers.create')}}" class="btn btn-primary shadow-md mr-2">Thêm mới</a>
            @endcan
        </div>
        <!-- BEGIN: Data List -->
        <div class=" col-span-12 lg:col-span-12">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th style="width:40px;">
                            <input type="checkbox" id="checkbox-all">
                        </th>
                        <th class="whitespace-nowrap">Tên khách hàng</th>
                        <th class="whitespace-nowrap">Ngày tạo</th>
                        <!-- <th class="whitespace-nowrap">Mua hàng</th> -->
                        <th class="whitespace-nowrap">Hoạt động</th>
                        <th class="whitespace-nowrap">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $v)
                    <tr class="odd " id="post-<?php echo $v->id; ?>">
                        <td>
                            <input type="checkbox" name="checkbox[]" value="<?php echo $v->id; ?>" class="checkbox-item">
                        </td>
                        <td>
                            <div class="flex space-x-2">
                                <div class="w-10 h-10 image-fit ">
                                    <img alt="{{$v->name}}" class=" rounded-full" src="{{File::exists(base_path($v->image)) ? asset($v->image) : 'https://ui-avatars.com/api/?name='.$v->name}}">
                                </div>
                                <div>
                                    {{$v->name}}<br>{{$v->email}}<br>{{$v->phone}}
                                </div>
                            </div>
                        </td>
                        <td>
                            {{$v->created_at}}
                        </td>
                        <td style="width:200px" class="hidden">
                            @if(count($v->orders) > 0)
                            <span class="btn btn-success btn-sm text-xs text-white">Đã mua hàng</span>
                            @else
                            <span class="btn btn-danger btn-sm text-xs text-white">Chưa mua hàng</span>
                            @endif
                        </td>
                        <td class="w-40">
                            @include('components.isModule',['module' => $module,'title' => 'active','id' =>
                            $v->id])
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                @can('orders_index')
                                <a class="flex items-center mr-3" href="{{ route('customers.orders',['id'=>$v->id]) }}">
                                    Xem đơn hàng
                                </a>
                                @endif

                                @can('customers_edit')
                                <a class="flex items-center mr-3" href="{{ route('customers.edit',['id'=>$v->id]) }}">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                    Edit
                                </a>
                                @endcan
                                @can('customers_destroy')
                                <a class="flex items-center text-danger ajax-delete" href="javascript:;" data-id="<?php echo $v->id ?>" data-module="<?php echo $module ?>" data-child="0" data-title="Lưu ý: Khi bạn xóa thương hiệu, thương hiệu sẽ bị xóa vĩnh viễn. Hãy chắc chắn rằng bạn muốn thực hiện hành động này!">
                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
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
        <!-- BEGIN: Pagination -->
        <div class=" col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center justify-center">
            {{$data->links()}}
        </div>
        <!-- END: Pagination -->
    </div>
</div>
@endsection
@push('javascript')
<script>
    /* CLICK VÀO THÀNH VIÊN*/
    $(document).on('click', '.choose', function() {
        let _this = $(this);
        $('.choose').removeClass('bg-choose'); //remove all trong các thẻ có class = choose
        _this.toggleClass('bg-choose');
        let data = _this.attr('data-info');
        data = window.atob(data); //decode base64
        let json = JSON.parse(data);
        setTimeout(function() {
            $('.fullname').html('').html(json.name);
            $('#image').attr('src', json.image);
            $('.phone').html('').html(json.phone);
            $('.email').html('').html(json.email);
            $('.address').html('').html(json.address);
            $('.updated').html('').html(json.created_at);
        }, 100); //sau 100ms thì mới thực hiện
    });
</script>
@endpush