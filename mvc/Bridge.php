<?php
define('_WEB_ROOT', 'http://' . $_SERVER['HTTP_HOST'] . '/kling');
define('_PUBLIC', _WEB_ROOT. '/public');

require_once './mvc/core/App.php';
require_once './mvc/core/Controller.php';
require_once './mvc/core/DB.php';
?>