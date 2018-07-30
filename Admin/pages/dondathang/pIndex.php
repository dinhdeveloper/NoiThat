<?php
$k = 1;
if(isset($_GET["k"])){
    $k = $_GET["k"];
}

switch($k){
    case 1:
        include("pages/dondathang/pDanhsachdondathang.php");
        break;
    case 2:
        include("pages/dondathang/pChitietdondathang.php");
        break;

    case 201:
        include("pages/dondathang/exDathang.php");
        break;
    default:
        Database::ChangeURL("index.php?c=404");

}
?>