<?php
if(isset($_GET["id"])){
    $maNhanVien = $_GET["id"];
    $sql = "UPDATE nhanvien SET BiXoa = 1 - BiXoa WHERE MaNhanVien = $maNhanVien";
    Database::ExecuteQuery($sql);
    Database::ChangeURL("index.php?c=2");
} else {
    Database::ChangeURL("index.php?c=404");
}
?>