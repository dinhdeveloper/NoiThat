<?php
if(isset($_GET["id"])){
    $maSanPham = $_GET["id"];
    // Có 2 trường hợp xóa

    $sql = "SELECT COUNT(MaChiTietDonDatHang) FROM ChiTietDonDatHang WHERE MaSanPham = $maSanPham";
    $result = Database::ExecuteQuery($sql);
    $row  = mysqli_fetch_array($result);
    if($row[0] == 0){
        // TH1: Xóa luôn vì sản phẩm này chưa bán nên không có rành buộc về đơn đặt hàng.
        $sql = "DELETE FROM SanPham WHERE MaSanPham = $maSanPham";
    } else {
        // TH2: đã có chi tiết đơn đặt hàng của sản phẩm này ~ sản phẩm này đã được bán
        // ==> chỉ được đánh dấu xóa

        $sql = "UPDATE SanPham SET BiXoa = 1 WHERE MaSanPham = $maSanPham";
    }
    Database::ExecuteQuery($sql);
    Database::ChangeURL("index.php?c=4");
} else {
    Database::ChangeURL("index.php?c=404");
}
?>