<?php
/**
 * Created by PhpStorm.
 * User: Dinht
 * Date: 6/22/2018
 * Time: 1:07 AM
 */
session_start();
include '../libs/database.php';
include 'Login/kiemtradangnhap.php';
check_login();
//định nghĩa biến cho từng trang:
$c = 1;

if (isset($_GET['c'])) {
    $c = $_GET['c'];
}
// session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description"
          content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords"
          content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Trang Quản Trị</title>
    <!-- Favicons-->
    <link rel="icon" href="../images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="../images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="css/themes/fixed-menu/materialize.css" type="text/css" rel="stylesheet">
    <link href="css/themes/fixed-menu/style.css" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="css/custom/custom.css" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="vendors/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">
    <link href="vendors/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet">
    <link href="vendors/flag-icon/css/flag-icon.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.min.js">
    <link rel="stylesheet" type="text/css" href="css/admin.css" />
</head>
<body>
<?php
include_once 'modules/header.php';
include_once 'modules/menu_left.php';
//include_once 'modules/menu_content.php';
?>
<div id="content">
    <?php
    switch ($c) {
//        case 0:
//            include("Error/pError.php");
//            break;
        case 1:
            include("modules/menu_content.php");
            break;
        case 2:
            include ("pages/taikhoan/pIndex.php"); //quản lý tài khoản
        break;
        case 3:
            include ("pages/loaisanpham/pIndex.php"); //quản lý loại sản phẩm
            break;
        case 4:
            include ("pages/sanpham/pIndex.php"); //quản lý sản phẩm
        break;
        case 5:
            include ("pages/dondathang/pIndex.php"); // quản lý đơn đặt hàng
        break;
        // khach hang:
//        case 601:
//            include ("pages/khachhang/pDanhsachtaikhoankhachhang.php");
//            break;
        default:
            include("Error/pError.php");
    }

    ?>
</div>
<!-- jQuery Library -->
<script type="text/javascript" src="vendors/jquery-3.2.1.min.js"></script>
<!--materialize js-->
<script type="text/javascript" src="js/materialize.min.js"></script>
<!--scrollbar-->
<script type="text/javascript" src="vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<!-- chartjs -->
<script type="text/javascript" src="vendors/chartjs/chart.min.js"></script>
<!-- sparkline -->
<script type="text/javascript" src="vendors/sparkline/jquery.sparkline.min.js"></script>
<!-- google map api -->
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZnaZBXLqNBRXjd-82km_NO7GUItyKek"></script>
<!--jvectormap-->
<script type="text/javascript" src="vendors/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script type="text/javascript" src="vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script type="text/javascript" src="vendors/jvectormap/vectormap-script.js"></script>
<!--google map-->
<script type="text/javascript" src="js/scripts/google-map-script.js"></script>
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="js/plugins.js"></script>
<!--card-advanced.js - Page specific JS-->
<script type="text/javascript" src="js/scripts/dashboard-analytics.js"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="js/custom-script.js"></script>
</body>
</html>


