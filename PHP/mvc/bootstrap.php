<?php
//  Embed config files to load web pages
define('_DIR_ROOT', __DIR__);

// Load config
$config_files = scandir('configs');
if (!empty($config_files)) {
    foreach ($config_files as $file) {
        if ($file !== '.' && $file !== '..' && file_exists('configs/' . $file)) {
            require_once 'configs/' . $file;
        }
    }
}

// Load App
require_once 'app/App.php';

// Load Core Class
require_once 'core/Controller.php';
require_once 'core/Route.php';
require_once 'core/MySQLConnection.php';
require_once 'core/Model.php';
require_once 'core/traits/GetterSetter.php';

// Load utils
require_once 'utils/constants.php';
