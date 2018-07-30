<body>
<form method="post" style="padding: 25px">
    <h4 style="color: red">Danh Sách Tất Cả Sản Phẩm</h4>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">MSP</th>
            <th scope="col">Tên SP</th>
            <th scope="col">Loại Sản Phẩm</th>
			<th scope="col">Hình Ảnh</th>
            <th scope="col">Giá</th>
            <th scope="col">Ngày Nhập</th>
            <th scope="col">Số Lượng Bán</th>
            <th scope="col">Số Lượt Xem</th>
            <th scope="col">Mô Tả</th>
            <th scope="col">HDSD</th>
            <th scope="col">Tình Trạng</th>
            <th scope="col">Thao Tác</th>
        </tr>
        </thead>
		<?php
            //Lấy dữ liệu
        $sql = "SELECT MaSanPham, TenSanPham, HinhURL, TenLoaiSanPham,NgayNhap, Gia, SoLuongBan, SoLuotXem, SanPham.BiXoa, MoTa,HuongDanSuDung 
                FROM SanPham, LoaiSanPham WHERE SanPham.MaLoaiSanPham = LoaiSanPham.MaLoaiSanPham 
                ORDER BY MaSanPham";
        $result = Database::ExecuteQuery($sql);
        while($row = mysqli_fetch_array($result)){
            $maSanPham = $row["MaSanPham"];
            $tenSanPham = $row["TenSanPham"];
            $hinhURL = $row["HinhURL"];
            $tenLoaiSanPham = $row["TenLoaiSanPham"];
            $gia = $row["Gia"];
            $ngayNhap = $row["NgayNhap"];
            $soLuongBan = $row["SoLuongBan"];
            $soLuotXem = $row["SoLuotXem"];
            $hdsd = $row["HuongDanSuDung"];
            $moTa = $row["MoTa"];
            $biXoa = $row["BiXoa"];
            include("pages/sanpham/tDanhsachtatcasanpham.php");
        }
        ?>
    </table>
</form>
