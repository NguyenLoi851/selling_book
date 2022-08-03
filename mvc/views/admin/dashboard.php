<?php
require_once ROOT . DS . 'services' . DS . 'AdminServices.php';

if (!isset($_SESSION)) {
    ob_start();
    session_start();
}
if (!isset($_SESSION['username']) || $_SESSION['username'] == '') {
    header("Location: login-admin");
}else{
    $service = new AdminServices();
    $checker = $service->checkAccount($_SESSION['username'], $_SESSION['password']);
    if(!$checker){
        header("Location: login-admin");
    }
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/selling-book/public/css/base.css" type="text/css">
    <link rel="stylesheet" href="/selling-book/public/css/layout/admin/dashboard.css" type="text/css">
    <script src="https://kit.fontawesome.com/4326137641.js" crossorigin="anonymous"></script>
    <title>Dashboard</title>

</head>



<body>
    <div class='dashboard'>
        <div class='top-nav-bar'>
            <div class='logo'>
                <img src="public/images/logo/logo_icon.png" />

            </div>

            <div class='time'> <?php
            $dt = new DateTime("now", new DateTimeZone('Asia/Ho_Chi_Minh'));
            echo 'Ngày hôm nay : ';
            echo  $dt->format('d/m/Y')
            ?></div>

            <div class='right-items'>
                <i style='vertical-align: middle; margin-right: 15px' class="fa fa-solid fa-bell fa-2x"></i>
                <i style='vertical-align: middle' class="fa fa-thin fa-user fa-2x"></i>
            </div>
        </div>
        <ul>
            <li><a href="/selling-book/admin">Home</a></li>
            <li><a href="/selling-book/admin/product-management">Sản phẩm</a></li>
            <li><a href="/selling-book/admin/account-management">Tài khoản</a></li>
            <li><a href="/selling-book/admin/blog-management">Blog</a></li>
            <li><a href="/selling-book/admin/banner-management">Banner</a></li>
            <li><a href="/selling-book/admin/order-management">Đơn hàng</a></li>
        </ul>

        <div class='content'>
            <div style='margin-top:65px'>
                <h1>Dashboard</h1>



            </div>

        </div>
    </div>


</body>

</html>