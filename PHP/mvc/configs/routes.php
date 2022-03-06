<?php
$routes['default_controller'] = 'home';

// Virtual route -> real route
$routes['san-pham'] = 'product';
$routes['trang-chu'] = 'home';
$routes['tin-tuc/(.+)'] = 'news/category/$1';
