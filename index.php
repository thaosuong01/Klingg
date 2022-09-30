<?php
// Start the session
session_start();

// đặt múi giờ mặc định
date_default_timezone_set('Asia/Ho_Chi_Minh');

// nhúng mã PHP từ một tệp khác
require_once './mvc/Bridge.php';

$myApp = new App();

?>