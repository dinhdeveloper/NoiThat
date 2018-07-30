<form method="post" style="padding: 25px">
	<h4 style="color: red">Danh Sách Đơn Đặt Hàng</h4>
	<table class="table">
		<thead class="thead-light">
		<tr>
			<th scope="col">Mã Đơn Đặt Hàng</th>
			<th scope="col">Khách Hàng</th>
			<th scope="col">Số Điện Thoại</th>
			<th scope="col">Địa Chỉ</th>
			<th scope="col">Tình Trạng ĐĐH</th>
			<th scope="col">Nhân Viên Xử Lý</th>
			<th scope="col">Thao Tác</th>
		</tr>
		</thead>
        <?php
        $sql = "SELECT  MaDonDatHang, HoTen, DiaChi, SoDienThoai, TenTinhTrangDonDatHang, MaTinhTrangDonDatHang, HoTenNhanVien
        FROM ((SELECT MaDonDatHang, KhachHang.HoTen, KhachHang.DiaChi, KhachHang.SoDienThoai,
        TenTinhTrangDonDatHang, DonDatHang.MaTinhTrangDonDatHang, '' As HoTenNhanVien
        FROM KhachHang, DonDatHang, TinhTrangDonDatHang, NhanVien
        WHERE KhachHang.MaKhachHang = DonDatHang.MaKhachHang AND DonDatHang.MaTinhTrangDonDatHang =
        TinhTrangDonDatHang.MaTinhTrangDonDatHang AND DonDatHang.MaNhanVien Is NULL
        ORDER BY TinhTrangDonDatHang.MaTinhTrangDonDatHang) UNION
        (SELECT MaDonDatHang, KhachHang.HoTen, KhachHang.DiaChi, KhachHang.SoDienThoai,
         TenTinhTrangDonDatHang, DonDatHang.MaTinhTrangDonDatHang, NhanVien.HoTen As HoTenNhanVien
        FROM KhachHang, DonDatHang, TinhTrangDonDatHang, NhanVien
        WHERE KhachHang.MaKhachHang = DonDatHang.MaKhachHang AND DonDatHang.MaTinhTrangDonDatHang =
        TinhTrangDonDatHang.MaTinhTrangDonDatHang AND DonDatHang.MaNhanVien = NhanVien.MaNhanVien
        ORDER BY TinhTrangDonDatHang.MaTinhTrangDonDatHang)) t";
//        $sql = "SELECT dondathang.MaDonDatHang, khachhang.HoTen, khachhang.DiaChi, khachhang.SoDienThoai,
//                tinhtrangdondathang.TenTinhTrangDonDatHang,dondathang.MaTinhTrangDonDatHang,nhanvien.HoTen as HoTenNhanVien
//                FROM dondathang,khachhang,tinhtrangdondathang,nhanvien
//                WHERE (dondathang.MaKhachHang = khachhang.MaKhachHang) AND
//                (dondathang.MaTinhTrangDonDatHang= tinhtrangdondathang.MaTinhTrangDonDatHang) AND
//                dondathang.MaTinhTrangDonDatHang";
        $result = Database::ExecuteQuery($sql);
        while($row = mysqli_fetch_array($result)){
            $maDonDatHang = $row["MaDonDatHang"];
            $hoTen = $row["HoTen"];
            $diaChi = $row["DiaChi"];
            $soDienThoai = $row["SoDienThoai"];
            $tenTinhTrangDonDatHang = $row["TenTinhTrangDonDatHang"];
            $maTinhTrangDonDatHang = $row["MaTinhTrangDonDatHang"];
            $hoTenNhanVien = $row["HoTenNhanVien"];

            $class = "";
            switch($maTinhTrangDonDatHang){
                case 1:
                    $class = "";
                    break;
                case 2:
                    $class = "classDangXuLy";
                    break;
                case 3:
                    $class = "classGiaoHang";
                    break;
                case 4:
                    $class = "classThanhToan";
                    break;
                case 5:
                    $class = "classHuy";
                    break;
            }

            include("pages/dondathang/tDanhsachdondathang.php");
        }
        ?>
	</table>
</form>