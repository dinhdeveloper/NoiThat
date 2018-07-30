<?php
$k = 1;
if(isset($_GET["k"])){
    $k = $_GET["k"];
}

switch($k){
    case 1:
        include("pages/loaisanpham/pDanhsachloaisanpham.php");
        break;
    case 2:
        include("pages/loaisanpham/pTaoloaisanpham.php");
        break;
    case 3:
        include("pages/loaisanpham/pCapnhatloaisanpham.php");
        break;
    case 4:
        include ("pages/loaisanpham/pPhanloaisanpham.php");

    case 201:
        include("pages/loaisanpham/exTaoloaisanpham.php");
        break;
    case 301:
        include("pages/loaisanpham/exCapnhatloaisanpham.php");
        break;
    case 401:
        include("pages/loaisanpham/exXoaloaisanpham.php");
        break;
    case 402:
        include("pages/loaisanpham/exKichhoat.php");
        beak;
    default:
        Database::ChangeURL("index.php?c=404");

}
?>