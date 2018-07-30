<?php
$k = 1;
if(isset($_GET["k"])){
    $k = $_GET["k"];
}

switch($k){
    case 1:
        include("pages/sanpham/pDanhsachtatcasanpham.php");
        break;
    case 2:
        include("pages/sanpham/pTaosanphammoi.php");
        break;
    case 3:
        include("pages/sanpham/pCapnhatsanpham.php");
        break;
    case 201:
        include("pages/sanpham/exTaosanphammoi.php");
        break;
    case 301:
        include ("pages/sanpham/exCapnhatsanpham.php");
        break;
    case 401:
        include("pages/sanpham/exXoasp.php");
        break;
    case 402:
        include("pages/sanpham/exKichhoat.php");
        break;
    default:
        Database::ChangeURL("index.php?c=404");

}
?>