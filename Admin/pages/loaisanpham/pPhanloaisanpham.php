<body>
<form method="post" style="padding: 25px">
	<?php
        $id =1;
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        $sql = "SELECT TenLoaiSanPham FROM loaisanpham WHERE MaLoaiSanPham = $id";
        $result = Database::ExecuteQuery($sql);
        while($row1 = mysqli_fetch_array($result)) {
            ?>
			<h4 style="color: red"><?php echo $row1["TenLoaiSanPham"]?></h4>
            <?php
        }
	?>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">Mã Sản Phẩm</th>
            <th scope="col">Tên Sản Phẩm</th>
			<th scope="col">Hình Ảnh</th>
            <th scope="col">Giá</th>
            <th scope="col">Ngày Nhập</th>
            <th scope="col">Số Lượng Bán</th>
            <th scope="col">Số Lượt Xem</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col">Thao Tác</th>

        </tr>
        </thead>
        <?php
            $sql = "SELECT * FROM sanpham WHERE MaLoaiSanPham = $id";
            $result = Database::ExecuteQuery($sql);
            while($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <th scope="row"><?php echo $row["MaSanPham"];?></th>
                    <td><?php echo $row["TenSanPham"]; ?></td>
					<td><a href="#"><img src="images/sanpham/sanpham/<?php echo $row["HinhURL"]; ?>"
										 style="height: 80px;width: 80px"></a></td>
                    <td><?php echo number_format ($row["Gia"]); ?> đ</td>
                    <td><?php echo $row["NgayNhap"]; ?></td>
                    <td style="text-align: center"><?php echo $row["SoLuongBan"]; ?></td>
                    <td style="text-align: center"><?php echo $row["SoLuotXem"]; ?></td>
                    <td style="text-align: center"><img src="modules/logo/active.png" alt=""><?php //echo $row["BiXoa"]; ?></td>
                    <td><a href="index.php?c=4&k=3&id=<?php echo $row["MaSanPham"]?>"><img src="modules/logo/edit.png"></a></td>
                </tr>
                <?php
            }
        ?>
    </table>
	<a href="index.php?c=3">Quay lại</a>
</form>
<br>
<br>


