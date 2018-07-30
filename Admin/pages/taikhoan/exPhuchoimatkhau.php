<?php
if(isset($_GET["id"])){
    $maNhanVien = $_GET["id"];
    $sql = "UPDATE NhanVien SET matkhau = '123123' WHERE manhanvien = $maNhanVien";
    Database::ExecuteQuery($sql);
    Database::ChangeURL("index.php?c=2");
} else {
    Database::ChangeURL("index.php?c=404");
}
?>