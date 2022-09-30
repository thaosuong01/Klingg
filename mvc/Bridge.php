<?php
define('_WEB_ROOT', 'http://' . $_SERVER['HTTP_HOST'] . '/kling');
define('_PUBLIC', _WEB_ROOT . '/public');
define('_UPLOAD', $_SERVER['DOCUMENT_ROOT'] . '/kling/upload');
define('_PATH_AVATAR', _WEB_ROOT . '/upload/avt/');
define('_PATH_IMG_PRODUCT', _WEB_ROOT . '/upload/product/');

function getNameUserGroup($gr_id)
{
    $name = '';
    switch ($gr_id) {
        case 1:
            $name = 'Admin';
            break;

        default:
            $name = 'Client';
            break;
    }
    return $name;
}


require_once './mvc/core/App.php';
require_once './mvc/core/Controller.php';
require_once './mvc/core/DB.php';
require_once './mvc/helper/getNameCate.php';


