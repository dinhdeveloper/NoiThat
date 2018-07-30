<?php
if(isset($_GET["id"])){
    $maLoaiSanPham = $_GET["id"];

    $sql = "UPDATE LoaiSanPham SET BiXoa = 1- BiXoa WHERE MaLoaiSanPham = $maLoaiSanPham";

    Database::ExecuteQuery($sql);
    Database::ChangeURL("index.php?c=3");
} else {
    Database::ChangeURL("index.php?c=404");
}
?>