<?php
$k = 1;
if(isset($_GET["k"])){
    $k = $_GET["k"];
}

switch($k){
    case 1:
        include("pages/taikhoan/pDanhsachtaikhoan.php");
        break;
    case 2:
        include("pages/taikhoan/pTaotaikhoanadmin.php");
        break;
    case 3:
        include("pages/taikhoan/pThongtintaikhoan.php");
        break;
    case 4:
        include("pages/taikhoan/pCapnhattaikhoan.php");
        break;
    case 101:
        include("pages/taikhoan/exKhoataikhoan.php");
        break;
    case 102:
        include("pages/taikhoan/exPhuchoimatkhau.php");
        break;
    case 103:
        include("pages/taikhoan/exCapnhattaikhoan.php");
        break;
    default:
        Database::ChangeURL("index.php?c=404");
}
?>