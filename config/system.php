<?php
$data['homepage'] =  array(
    'label' => 'Thông tin chung',
    'description' => 'Cài đặt đầy đủ thông tin chung của website. Tên thương hiệu website. Logo của website và icon website trên tab trình duyệt',
    'value' => array(
        'brandname' => array('type' => 'text', 'label' => 'Tên thương hiệu'),
        'company' => array('type' => 'text', 'label' => 'Tên công ty'),
        'logo' => array('type' => 'images', 'label' => 'Logo'),
        'logo_footer' => array('type' => 'images', 'label' => 'Logo footer'),
        'favicon' => array('type' => 'images', 'label' => 'Favicon'),
        // 'copyright' => array('type' => 'text', 'label' => 'Copyright'),
        'aboutus' => array('type' => 'editor', 'label' => 'Giới thiệu footer'),
    ),
);
$data['contact'] =  array(
    'label' => 'Thông tin liên lạc',
    'description' => 'Cấu hình đầy đủ thông tin liên hệ giúp khách hàng dễ dàng tiếp cận với dịch vụ của bạn',
    'value' => array(
        'address' => array('type' => 'text', 'label' => 'Địa chỉ'),
        'hotline' => array('type' => 'text', 'label' => 'Hotline'),
        // 'phone' => array('type' => 'text', 'label' => 'Số điện thoại'),
        'email' => array('type' => 'text', 'label' => 'Email'),
        'map' => array('type' => 'textarea', 'label' => 'Bản đồ'),
        // 'website' => array('type' => 'text', 'label' => 'website'),
        'time' => array('type' => 'editor', 'label' => 'Thời gian làm việc'),

    ),
);
$data['seo'] =  array(
    'label' => 'Cấu hình thẻ tiêu đề',
    'description' => 'Cài đặt đầy đủ Thẻ tiêu đề và thẻ mô tả giúp xác định cửa hàng của bạn xuất hiện trên công cụ tìm kiếm.',
    'value' => array(
        'meta_title' => array('type' => 'text', 'label' => 'Tiêu đề trang', 'extend' => ' trên 70 kí tự', 'class' => 'meta-title', 'id' => 'titleCount'),
        'meta_description' => array('type' => 'textarea', 'label' => 'Mô tả trang', 'extend' => ' trên 320 kí tự', 'class' => 'meta-description', 'id' => 'descriptionCount'),
        'meta_images' => array('type' => 'images', 'label' => 'Ảnh'),
    ),
);
$data['social'] =  array(
    'label' => 'Cấu hình mạng xã hội',
    'description' => 'Cài đặt đầy đủ Thẻ tiêu đề và thẻ mô tả giúp xác định cửa hàng của bạn xuất hiện trên công cụ tìm kiếm.',
    'value' => array(
        'facebook' => array('type' => 'text', 'label' => 'Facebook'),
        // 'tiktok' => array('type' => 'text', 'label' => 'Tiktok'),
        'facebookm' => array('type' => 'text', 'label' => 'Facebook message'),
        // 'instagram' => array('type' => 'text', 'label' => 'Instagram'),
        // 'twitter' => array('type' => 'text', 'label' => 'Twitter'),
        // 'google_plus' => array('type' => 'text', 'label' => 'Google plus'),
        // 'pinterest' => array('type' => 'text', 'label' => 'Pinterest'),
        'youtube' => array('type' => 'text', 'label' => 'Youtube'),
        // 'rss' => array('type' => 'text', 'label' => 'RSS'),
        // 'vimeo' => array('type' => 'text', 'label' => 'Vimeo'),
        //      'skype' => array('type' => 'text', 'label' => 'Skype'),
        'zalo' => array('type' => 'text', 'label' => 'Số zalo'),
        // 'shopee' => array('type' => 'text', 'label' => 'Shopee'),
        // 'tiki' => array('type' => 'text', 'label' => 'Tiki'),
        // 'lazada' => array('type' => 'text', 'label' => 'Lazada'),
    ),
);

$data['script'] =  array(
    'label' => 'Script',
    'description' => '',
    'value' => array(
        'header' => array('type' => 'textarea', 'label' => 'Script header'),
        'body' => array('type' => 'textarea', 'label' => 'Script body'),
        'footer' => array('type' => 'textarea', 'label' => 'Script footer'),
    ),
);
$data['message'] =  array(
    'label' => 'Thông báo',
    'description' => '',
    'value' => array(
        '1' => array('type' => 'text', 'label' => 'Thông báo Đăng ký nhận tin'),
        '2' => array('type' => 'text', 'label' => 'Gửi thông tin liên hệ thành công'),
    ),
);
$data['title'] =  array(
    'label' => 'Tiêu đề',
    'description' => '',
    'value' => array(
        '1' => array('type' => 'text', 'label' => 'Sản phẩm nổi bật'),
        // '2' => array('type' => 'text', 'label' => 'Mô tả sản phẩm nổi bật'),
        '3' => array('type' => 'text', 'label' => 'Cam kết Login'),
    ),
);
// $data['banner'] =  array(
//     'label' => 'Banner',
//     'description' => '',
//     'value' => array(
//         '1' => array('type' => 'images', 'label' => 'Banner chi tiết sản phẩm'),
//     ),
// );
$data['aboutus'] =  array(
    'label' => 'Giới thiệu',
    'description' => '',
    'value' => array(
        '1' => array('type' => 'text', 'label' => 'Chúng tôi là ai'),
        'sub' => array('type' => 'text', 'label' => 'Sứ mệnh của chúng tôi là gì?'),
        '2' => array('type' => 'editor', 'label' => 'Mô tả'),
        '3' => array('type' => 'editor', 'label' => 'Nội dung'),
        '4' => array('type' => 'images', 'label' => 'Hình ảnh'),
    ),
);
$data['cart'] =  array(
    'label' => 'Đơn hàng',
    'description' => '',
    'value' => array(
        '1' => array('type' => 'editor', 'label' => 'Đặt hàng thành công'),
    ),
);
// $data['404'] =  array(
//     'label' => '404',
//     'description' => '',
//     'value' => array(
//         '1' => array('type' => 'text', 'label' => 'Tiêu đề'),
//         '3' => array('type' => 'textarea', 'label' => 'Mô tả'),
//         '4' => array('type' => 'textarea', 'label' => 'Chi tiết'),
//         '2' => array('type' => 'images', 'label' => 'Background image'),
//     ),
// );
return $data;
