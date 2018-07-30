<?php
session_start();
include ("libs/Database.php");
include ("libs/GioHang.php");
if (isset($_SESSION["GioHang"]) == false) {
    $gioHang = new GioHang();
    $_SESSION["GioHang"] = serialize($gioHang);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Trang Trí Nội Thất</title>
    <!-- for-mobile-apps -->
    <link rel="icon" href="images/banner/favicon.ico" sizes="32x32">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Smart Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- //for-mobile-apps -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- pignose css -->
    <link href="css/pignose.layerslider.css" rel="stylesheet" type="text/css" media="all"/>


    <!-- //pignose css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- js -->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <!-- //js -->
    <!-- cart -->
    <script src="js/simpleCart.min.js"></script>
    <!-- cart -->
    <!-- for bootstrap working -->
    <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
    <!-- //for bootstrap working -->
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic'
          rel='stylesheet' type='text/css'>
    <script src="js/jquery.easing.min.js"></script>
</head>
<body>
<?php
include("PagesHome/HeaderTop.php");
include("PagesHome/HeaderMenu.php");
include("PagesHome/Background.php");
include("PagesHome/SanPhamMoi.php");
$c = 1;
if (isset($_GET['c']))
{
    $c = $_GET['c'];
}
switch ($c){
    case 1:
        include("PagesHome/DanhMucSanPham.php");
        break;
    case 2:
        include("PagesHome/SanPhamMoi.php");
        break;
    case 3:
        include("GioHang/QuanLyGH.php");
    break;

    case 101:
        include ("GioHang/themsanphamvaogiohang.php");
        break;
    case 102:
        include ("GioHang/capnhatsoluongsanpham.php");
        break;
    case 103:
        include ("GioHang/exThongTinGiaoHang.php"); // tạo thông tin
        break;
    case 104:
        include ("GioHang/pdathang.php"); // đặt hàng
        break;
    default:
        include("ERROR.php");
}

include("PagesHome/HoTroKhachHang.php");
include("PagesHome/Footer.php");
?>
</body>
</html>
