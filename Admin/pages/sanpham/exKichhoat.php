<?php
if(isset($_GET["id"])){
    $maSanPham = $_GET["id"];

    $sql = "UPDATE SanPham SET BiXoa = 1 - BiXoa WHERE MaSanPham = $maSanPham";

    Database::ExecuteQuery($sql);
    Database::ChangeURL("index.php?c=4");
} else {
    Database::ChangeURL("index.php?c=404");
}
?>