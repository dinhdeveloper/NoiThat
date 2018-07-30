<form method="post" class="form" style="padding: 25px">
	<h4 style="color: red">Danh Sách Nhân Viên</h4>
    <a href="../../../../TrangTriNoiThat/Admin/pages/taikhoan/pTaotaikhoanadmin.php" target="_blank">
        <img src="modules/logo/new.png" width="13px" height="13px">Tạo mới<br>
    </a>
	<br><table class="table">
		<thead class="thead-light">
		<tr>
			<th scope="col">Mã Nhân Viên</th>
			<th scope="col">Hình ảnh</th>
			<th scope="col">Tên Đăng Nhập</th>
			<th scope="col">Họ Tên</th>
			<th scope="col">Email</th>
			<th scope="col">Số Điện Thoại</th>
			<th scope="col">Trạng Thái</th>
			<th scope="col">Thao Tác</th>
		</tr>
		</thead>
        <?php
        $sql = "SELECT * FROM nhanvien";
        $result = Database::ExecuteQuery($sql);
        while($row = mysqli_fetch_array($result)){
            $maNhanVien = $row["MaNhanVien"];
            $hinhAnh = $row["HinhNhanVien"];
            $tenDangNhap = $row["TenDangNhap"];
            $hoTen = $row["HoTen"];
            $email = $row["Email"];
            $soDienThoai = $row["SoDienThoai"];
            $biXoa = $row["BiXoa"];
            include("pages/taikhoan/tDanhsachtaikhoan.php");
        }
        ?>
	</table>
</form>
