


<?php
$makhachhang = "";
if (isset($_POST["makhachhang"]) == true) {
    //Kiểm tra Mã khách hàng có tồn tại trong hệ thống chưa?
    $maKhachHang = $_POST["makhachhang"];

    $sql = "SELECT MaKhachHang FROM khachhang WHERE BiXoa = 0 AND MaKhachHang = '$makhachhang'";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
    if ($row == null) {
        DataProvider::ChangeURL("index.php?c=404&err_id=2");
    }
} else {
    if (isset($_SESSION["makhachhang"]) == true) {
        $makhachhang = $_SESSION["makhachhang"];
    } else {
        DataProvider::ChangeURL("index.php?c=404&err_id=2");
    }
}

//Tạo thông tin đơn đặt hàng
$ngayDatHang = date('Y-m-d');
$tongThanhTien = $_SESSION["tongthanhtien"];
$maTinhTrangDonDatHang = 1; //Dòng này đang code cứng (Hard code) => Không tốt

$sql = "INSERT INTO dondathang(MaKhachHang, NgayDatHang, TongThanhTien, MaTinhTrangDonDatHang)
 			VALUES ('$makhachhang', '$ngayDatHang', '$tongThanhTien', '$maTinhTrangDonDatHang')";
DataProvider::ExecuteQuery($sql);

$sql = "SELECT MaDonDatHang FROM dondathang ORDER BY MaDonDatHang DESC LIMIT 0, 1";
$result = DataProvider::ExecuteQuery($sql);
$row = mysqli_fetch_array($result);

$maDonDatHang = $row["MaDonDatHang"];

//Tạo chi tiết đơn đặt hàng
$gioHang = unserialize($_SESSION["GioHang"]);
foreach ($gioHang->arrSanPham as $sp) {
    //Insert thông tin của một chi tiết đơn đặt hàng trong giỏ hàng vào CSDL
    $maSanPham = $sp->MaSanPham;
    $soLuong = $sp->SoLuong;
    //Lấy giá bán hiện tại của sản phẩm
    $sql = "SELECT Gia FROM sanpham WHERE MaSanPham = $maSanPham";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
    $gia = $row["Gia"];
    //Thực hiện Insert vào bảng ChiTietDonDatHang:
    $sql = "INSERT INTO chitietdondathang(MaDonDatHang, MaSanPham, SoLuong, GiaBan)
 				VALUES($maDonDatHang, $maSanPham, $soLuong, $gia)";
    DataProvider::ExecuteQuery($sql);
}
//Xóa thông tin giỏ hàng sau khi đã đặt hàng
unset($_SESSION["GioHang"]);
$_SESSION["TongThanhTien"] = 0;
DataProvider::ChangeURL("index.php?c=7&id=$maDonDatHang");
?>