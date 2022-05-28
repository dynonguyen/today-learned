<?php
$menu = [
    ['to' => '/danh-sach-cau-thu', 'icon' => 'bi bi-card-list', 'label' => 'Danh sách cầu thủ'],
    ['to' => '/danh-sach-clb', 'icon' => 'bi bi-card-checklist', 'label' => 'Danh sách câu lạc bộ'],
    ['to' => '/tim-kiem-cau-thu', 'icon' => 'bi bi-search', 'label' => 'Tìm kiếm cầu thủ'],
    ['to' => '/them-cau-thu', 'icon' => 'bi bi-plus-square', 'label' => 'Thêm cầu thủ'],
    ['to' => '/them-clb', 'icon' => 'bi bi-plus-circle', 'label' => 'Thêm câu lạc bộ'],
    ['to' => '/dang-nhap', 'icon' => 'bi bi-box-arrow-in-right', 'label' => 'Đăng nhập'],
    ['to' => '/gioi-thieu', 'icon' => 'bi bi-info-circle', 'label' => 'Giới thiệu'],
];
?>

<div class='container py-5'>
    <ul class='row g-5'>
        <?php
        foreach ($menu as $menuItem) {
            ['to' => $to, 'icon' => $icon, 'label' => $label] = $menuItem;

            echo "<li class='col col-12 col-sm-6 col-md-4 col-lg-3'>
                    <a href='$to' class='menu-item'>
                        <i class='$icon'></i>
                        <span>$label</span>
                    </a>
                </li>";
        }
        ?>

    </ul>
</div>