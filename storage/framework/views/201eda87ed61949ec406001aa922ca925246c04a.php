<?php $__env->startSection('content'); ?>
<nav id="scrollTop" class="relative w-full flex flex-wrap items-center justify-between py-2 bg-[#f9f9f9] text-gray-500 hover:text-gray-700 focus:text-gray-700 navbar navbar-expand-lg navbar-light">
    <div class="container px-4 mx-auto w-full flex flex-wrap items-center justify-between">
        <nav class="bg-grey-light w-full" aria-label="breadcrumb">
            <ol class="list-reset flex">
                <li><a href="<?php echo url('') ?>" class="text-gray-500 hover:text-gray-600 text-f13"><?php echo e(trans('index.home')); ?></a></li>
                <li><span class="text-gray-500 mx-2">/</span></li>
                <li><a href="javascript:void(0)" class="text-gray-500 hover:text-gray-600 text-f13"><?php echo e(trans('index.SearchResults')); ?>: <?php echo e(request()->get('keyword')); ?></a></li>
            </ol>
        </nav>
    </div>
</nav>
<main class="py-8 ">
    <div class=" container mx-auto px-4">
        <div class="flex flex-col md:flex-row space-x-4 relative ">
            <div class="flex-1 pb-6">
                <div class="flex justify-between">
                    <div class="relative">

                        <h1 class="text-3xl font-bold"><?php echo e(trans('index.SearchResults')); ?></h1>
                    </div>
                    <div class="">
                        <select name="sortBy" class="filter rounded-full border h-11 px-8 focus:outline-none focus:ring focus:ring-red-300 focus:rounded-full hover:outline-none hover:ring hover:ring-red-300 hover:rounded-full">
                            <option value=""><?php echo e(trans('index.SortedBy')); ?></option>
                            <option value="id|desc"><?php echo e(trans('index.Latest')); ?></option>
                            <option value="id|asc"><?php echo e(trans('index.Oldest')); ?></option>
                            <option value="title|asc"><?php echo e(trans('index.NameAZ')); ?></option>
                            <option value="title|desc"><?php echo e(trans('index.NameZA')); ?></option>
                            <option value="price|asc"><?php echo e(trans('index.PricesGoUp')); ?></option>
                            <option value="price|desc"><?php echo e(trans('index.PricesGoDown')); ?></option>
                        </select>
                    </div>

                </div>
                <?php /* <section class="p-5 bg-red-50 rounded-2xl mt-6">
                    <h3 class="font-normal text-base">
                        @if(config('app.locale') == 'vi')
                        Có <strong class="js_total_filter"><?php echo $data->total() ?></strong> sản phẩm phù hợp với tiêu chí của bạn
                        @elseif(config('app.locale') == 'en')
                        There is <strong class="js_total_filter"><?php echo $data->total() ?></strong> product that matches your criteria
                        @elseif(config('app.locale') == 'gm')
                        Es gibt <strong class="js_total_filter"><?php echo $data->total() ?></strong> Produkt, das Ihren Kriterien entspricht
                        @elseif(config('app.locale') == 'tl')
                        มี <strong class="js_total_filter"><?php echo $data->total() ?></strong> ผลิตภัณฑ์ที่ตรงกับเกณฑ์ของคุณ
                        @endif
                    </h3>
                    <div class="mt-2 t-flex-gap">
                        <div id="js_selected_attr" class="flex flex-wrap gap-4 hidden">
                        </div>
                    </div>
                </section>*/ ?>

                <div class="mt-4">
                    <div class="grid grid-cols-2 md:grid-cols-3 -mx-[15px]" id="js_data_product_filter">
                        <?php if($data): ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="px-[15px]">
                            <?php echo htmlItemProduct($key, $item, 'category'); ?>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mt-5">
                    <div class="flex justify-center js_pagination_filter">
                        <?php echo e($data->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('product.frontend.category.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->startSection('content'); ?>

<script>
    $(document).ready(function() {
        $(function() {
            $(document).on('change', '.SortBy', function() {
                var sort_by = $(this).val();
                window.location.href =
                    "<?php echo $seo['canonical'] ?>?keyword=<?php echo request()->get('keyword') ?>&sort=" +
                    sort_by;
            });
        });
    });
    $(document).on('change', '.attr', function() {
        let attr = '';
        $('select[name="attr[]"] option:selected').each(function(key, index) {
            let id = $(this).val();
            if (id) {
                let attr_id = $(this).parent().attr('data-keyword');
                attr = attr + attr_id + ';' + id + ';';
            }
        });
        $('#choose_attr').val(attr).change();
    })
    var time;
    $(document).on('keyup change', '.filter', function() {
        let attr = $('input[name="attr"]').val();
        if (attr) {
            $('select[name="sortBy"]').addClass('filter');
            $('select[name="sortBy"]').removeClass('SortBy');
        } else {
            $('select[name="sortBy"]').removeClass('filter');
            $('select[name="sortBy"]').addClass('SortBy');
        }
        let page = $('.pagination .active span').text();
        $('#selected_attr').removeClass('hidden');
        time = setTimeout(function() {
            get_list_object(page);
        }, 500);
        return false;
    });
    $(document).on('click', '.pagination_custom .pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        get_list_object(page);
    });

    function get_list_object(page = 1) {
        var checked_brand = [];
        $('input[name="brands[]"]:checked').each(function() {
            checked_brand.push($(this).val());
        });
        // var brandChecked = checked_brand.join(',');
        let keyword = "<?php echo request()->get('keyword') ?>";
        let sort = $('select[name="sortBy"]').val();
        let attr = $('input[name="attr"]').val();
        let ajaxUrl = BASE_URL_AJAX + 'ajax/product/product-filter';
        $.ajax({
            type: 'POST',
            url: ajaxUrl,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                keyword: keyword,
                attr: attr,
                sort: sort,
                page: page,
            },
            success: function(data) {
                let json = JSON.parse(data);
                $('#data_product').html(json.html);
                $('html, body').animate({
                    scrollTop: $("#main").offset().top
                }, 300);
            }
        });
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('homepage.layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/product/frontend/search/index.blade.php ENDPATH**/ ?>