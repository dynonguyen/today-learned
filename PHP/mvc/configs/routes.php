<?php
$routes['default_controller'] = 'home';

// Virtual route -> real route
$routes['trang-chu'] = 'home';
$routes['danh-sach-sv'] = 'student/list';
$routes['sinh-vien/(.*)'] = 'student/index/$1';
