<?php

require_once ROOT . DS . 'services' . DS . 'AdminServices.php';
$service = new AdminServices();
$banners = $service->getAllBanners();


$bannerId = "";
$image = "";
$categoryId = "";

if (array_key_exists("bannerId", $_POST)) {
    $bannerId = strtolower($_POST['bannerId']);
}
if (array_key_exists("image", $_POST)) {
    $image = strtolower($_POST['image']);
}
if (array_key_exists("categoryId", $_POST)) {
    $categoryId = strtolower($_POST['categoryId']);
}

$users = array();
$listBill = array();

foreach ($banners as $b) {
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/base.css" type="text/css">
    <link rel="stylesheet" href="../public/css/layout/admin/account_management.css" type="text/css">
    <link rel="stylesheet" href="/selling-book/public/css/layout/admin/dashboard.css" type="text/css">
    <script src="https://kit.fontawesome.com/4326137641.js" crossorigin="anonymous"></script>
    <title>Dashboard</title>

</head>



<body>
    <div class='dashboard'>
        <div class='top-nav-bar'>
            <div class='logo'>
                <img src="../public/images/logo/logo_icon.png" />

            </div>
            <div class="search-box">
                <form class="relative w100p">
                    <label htmlFor="search" class="hidden"></label>
                    <input class="search-text" name="search" id="search" type="search" placeholder="Tìm kiếm ..."></input>
                    <button type="submit" class="search-btn absolute">
                        <i class="fa fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>

            <div class='time'> <?php

                                $dt = new DateTime("now", new DateTimeZone('Asia/Ho_Chi_Minh'));
                                echo 'Ngày hôm nay : ';
                                echo  $dt->format('m/d/Y')
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
                <h1>Quản lý banner </h1>




                <table style="width:100%; border:1px solid black">
                    <tr>
                        <th>Banner Id</th>
                        <th>Image</th>
                        <th>Category Id</th>

                    </tr>
                    <?php
                    foreach ($banners as $b) {
                        $imgSrc = $b->getImage()

                    ?>
                        <tr style="text-align: center">
                            <td><?php echo $b->getBannerId() ?></td>
                            <td><img src=<?php echo $b->getImage() ?> /></td>

                            <td><?php echo $b->getCategoryId() ?></td>

                        </tr>
                    <?php } ?>
                </table>

                <button class="btn btn-primary" style='margin-top: 20px' onclick={renderForm}>Thêm banner mới</button>

            </div>

        </div>
    </div>


</body>

</html>