<?php
require_once ROOT . DS . 'services' . DS . 'BookServices.php';

$service = new BookServices();
$books = $service->getAllSortByTimeDesc($param = NO_CATEGORY['id'], $pageIndex = 1, $pageSize = 100);

$title = '';
$author = '';
$price = '';

if (array_key_exists("title", $_POST)) {
    $title = strtolower($_POST['title']);
}
if (array_key_exists("author", $_POST)) {
    $author = strtolower($_POST['author']);
}
if (array_key_exists("price", $_POST)) {
    $price = strtolower($_POST['price']);
}

$listBooks = array();

foreach ($books as $b) {
    $btitle = strtolower($b->getTitle());
    $bauthor = strtolower($b->getAuthor());
    $bprice = strtolower($b->getPrice());
    if (($title == "" || strpos($btitle, $title) !== false) && ($author == "" || strpos($bauthor, $author) !== false) &&
        ($price == "" || strpos($bprice, $price) !== false)
    ) {
        array_push($listBooks, $b);
    }
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/base.css" type="text/css">
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
                <h1>Quản lý sản phẩm </h1>

                <form action="" method="post">
                    <div>
                        <div style="width:28%; float:left; height: 70px;">
                            <p>Tên sách</p>
                            <input class="input1" type="text" name="title">
                        </div>

                        <div style="width:28%; float:left; height: 70px;">
                            <p>Tác giả</p>
                            <input class="input1" type="text" name="author">
                        </div>
                        <div style="width:28%; float:left; height: 70px;">
                            <p>Giá bán</p>
                            <input class="input1" type="text" name="price">
                        </div>
                        <div style="width:16%; float:left; height: 70px;">
                            <input class="btn" type="submit" value="Tìm kiếm">
                        </div>



                    </div>
                </form>
                <br>
                <br>
                <br>
                <br>
                <br>
                <hr>
                <br><br>

                <table style="width:100%; border:1px solid black">
                    <tr>
                        <th>Tên sách</th>
                        <th>Tác giả</th>
                        <th>Giá bán</th>
                        <th>Thêm</th>
                    </tr>
                    <?php

                    foreach ($listBooks as $b) {


                    ?>
                        <tr style="text-align: center">
                            <td><?php echo $b->getTitle() ?></td>
                            <td><?php echo $b->getAuthor() ?></td>
                            <td><?php echo $b->getPrice() ?></td>

                            <td><button class="btn"><i style='vertical-align: middle' class="fa fa-solid fa-trash fa-2x"></i></button></td>
                        </tr>
                    <?php } ?>
                </table>

                <button class="btn btn-primary" style='margin-top: 20px' onclick={renderForm}>Thêm sách mới </button>

            </div>

        </div>




</body>

</html>