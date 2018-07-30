<?php
if (!isset($_GET["id"]))
    Database::ChangeURL("index.php?c=404");

$id = $_GET["id"];
$sql = "SELECT d.MaDonDatHang, d.NgayDatHang, d.TongThanhTien, k.HoTen, k.DiaChi,
      k.SoDienThoai , tt.TenTinhTrangDonDatHang, tt.MaTinhTrangDonDatHang FROM DonDatHang d,
       KhachHang k, TinhTrangDonDatHang tt WHERE d.MaKhachHang = k.MaKhachHang AND 
       d.MaTinhTrangDonDatHang = tt.MaTinhTrangDonDatHang AND MaDonDatHang = $id";
$result = Database::ExecuteQuery($sql);
$row = mysqli_fetch_array($result);
?>


<fieldset>
    <legend><h5>Thông Tin Đơn Đặt Hàng</h5></legend>
    <div>
        <span>Mã ĐĐH:</span>
        <?php echo $row["MaDonDatHang"]; ?>
    </div>
    <div>
        <span>Ngày Đặt Hàng:</span>
        <?php echo $row["NgayDatHang"]; ?>
    </div>
    <div>
        <span>Tên Khách Hàng:</span>
        <?php echo $row["HoTen"]; ?>
    </div>
    <div>
        <span>Số Số Điện Thoại:</span>
        <?php echo $row["SoDienThoai"]; ?>
    </div>
    <div>
        <span>Địa Chỉ Giao Hàng:
     k <?php echo $row["DiaChi"]; ?>
    </div>
    <div>
        <span>Tổng Thành Tiền:</span>
        <?php echo number_format($row["TongThanhTien"]); ?> đồng
    </div>
    <button type="button" class="btn btn-primary GiaoHang">
        <a href="index.php?c=5&k=201&t=3&id=<?php echo $id; ?>">
            Giao Hàng
        </a>
    </button>
    <button type="button" class="btn btn-primary ThanhToan">
        <a href="index.php?c=5&k=201&t=4&id=<?php echo $id; ?>">
            Thanh Toán
        </a>
    </button>
    <button type="button" class="btn btn-primary Huy">
        <a href="index.php?c=5&k=201&t=5&id=<?php echo $id; ?>">
            Hủy Đơn Hàng
        </a>
    </button>
    <button type="button" class="btn btn-primary InDonHang">
        <a href="index.php?c=5&k=2&t=5&id=<?php echo $id; ?>"
           onclick="window.print(document.write('<fieldset>\n'+
                   '    <legend><h5>Thông Tin Đơn Đặt Hàng</h5></legend>\n'+
                   '    <div>\n'+
                   '        <span>Mã ĐĐH:</span>\n'+
                   '        <?php echo $row["MaDonDatHang"]; ?>\n'+
                   '    </div>\n'+
                   '    <div>\n'+
                   '        <span>Ngày Đặt Hàng:</span>\n'+
                   '        <?php echo $row["NgayDatHang"]; ?>\n'+
                   '    </div>\n'+
                   '    <div>\n'+
                   '        <span>Tên Khách Hàng:</span>\n'+
                   '        <?php echo $row["HoTen"]; ?>\n'+
                   '    </div>\n'+
                   '    <div>\n'+
                   '        <span>Số Số Điện Thoại:</span>\n'+
                   '        <?php echo $row["SoDienThoai"]; ?>\n'+
                   '    </div>\n'+
                   '    <div>\n'+
                   '        <span>Địa Chỉ Giao Hàng:\n'+
                   '     k <?php echo $row["DiaChi"]; ?>\n'+
                   '    </div>\n'+
                   '    <div>\n'+
                   '        <span>Tổng Thành Tiền:</span>\n'+
                   '        <?php echo $row["TongThanhTien"]; ?> đồng\n'+
                   '    </div>\n'+
                   '</fieldset>'));">
            In Đơn Hàng
        </a>
    </button>
</fieldset>
<?php
// Xử lý cập nhật trạng thái đang xử lý cho đơn đặt hàng
if ($row["MaTinhTrangDonDatHang"] == 1) {
    $maNhanVien = $_SESSION["SMaNhanVien"];
    $sql = "UPDATE DonDatHang Set MaTinhTrangDonDatHang = 2, MaNhanVien = $maNhanVien WHERE MaDonDatHang = $id";
    Database::ExecuteQuery($sql);
}
?>

<form method="post" style="padding: 25px">
    <h4 style="color: red">Danh Sách Tất Cả Sản Phẩm</h4>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Sản Phẩm</th>
            <th scope="col">Hình</th>
            <th scope="col">Số Lượng</th>
            <th scope="col">Giá Bán</th>
        </tr>
        </thead>
        <?php
        $sql = "SELECT s.TenSanPham, s.HinhURL, c.SoLuong, c.GiaBan FROM ChiTietDonDatHang c, SanPham s WHERE c.MaSanPham = s.MaSanPham AND c.MaDonDatHang = $id";
        $result = Database::ExecuteQuery($sql);
        $i = 1;
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row["TenSanPham"]; ?></td>
                <td>
                    <img src="images/sanpham/sanpham/<?php echo $row["HinhURL"]; ?>" height="60" width="60"/>
                </td>
                <td><?php echo $row["SoLuong"]; ?></td>
                <td><?php echo number_format($row["GiaBan"]); ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</form>
