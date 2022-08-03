<?php

require_once ROOT . DS . 'services' . DS . 'NewsServices.php';
$service = new NewsServices();
$news = $service->getAll();



$newsId = "";
$title = "";
$content = "";
$image = "";
$adminId = "";
$createdAt = "";
$description = "";





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
                <h1>Quản lý blog </h1>


                <br>
                <br>
                <br>
                <br>
                <br>
                <hr>
                <br><br>

                <table style="width:100%; border:1px solid black">
                    <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Admin ID</th>
                        <th>Tạo lúc</th>

                    </tr>
                    <?php

                    function DeleteUser($u)
                    {
                        // $g = new GuestServices();
                        // $deleteUser = $g->delete($u);
                        // echo $deleteUser;
                    }
                    foreach ($news as $n) {


                    ?>
                        <tr style="text-align: center">
                            <td><?php echo $n->getNewsId() ?></td>
                            <td><?php echo $n->getTitle() ?></td>
                            <td><?php echo $n->getAdminId() ?></td>
                            <td><?php echo $n->getCreatedAt() ?></td>
                        </tr>
                    <?php } ?>
                </table>
                <button class="btn btn-primary" style='margin-top: 20px'>Tạo blog mới</button>



            </div>

        </div>
    </div>


</body>

</html>