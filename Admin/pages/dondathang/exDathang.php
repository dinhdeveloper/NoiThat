<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $t = $_GET["t"];
    $maNhanVien = $_SESSION["SMaNhanVien"];

    $sql = "UPDATE DonDatHang Set MaTinhTrangDonDatHang = $t, MaNhanVien = $maNhanVien WHERE MaDonDatHang = $id";
    Database::ExecuteQuery($sql);
    Database::ChangeURL("index.php?c=5");
} else {
    Database::ChangeURL("index.php?c=404");
}
?>