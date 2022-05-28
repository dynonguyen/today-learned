<?php
$routes['default_controller'] = 'home';

// Virtual route -> real route
$routes['trang-chu'] = 'home';
$routes['gioi-thieu'] = 'home/introPage';

$routes['danh-sach-cau-thu'] = 'player/showList';
$routes['xoa-cau-thu'] = 'player/deletePlayerApi';
$routes['tim-kiem-cau-thu'] = 'player/searchPlayerPage';
$routes['tim-kiem-cau-thu-api'] = 'player/searchPlayerApi';
$routes['them-cau-thu'] = 'player/addPlayer';
$routes['thuc-hien-them-cau-thu'] = 'player/postAddPlayer';

$routes['danh-sach-clb'] = 'club/showList';
$routes['danh-sach-clb-api'] = 'club/getClubsApi';
$routes['them-clb'] = 'club/addClub';
$routes['thuc-hien-them-clb'] = 'club/postAddClub';

$routes['dang-nhap'] = 'account/getLogin';
$routes['dang-xuat'] = 'account/logout';
