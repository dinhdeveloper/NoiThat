<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
      integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<div id="quanlygiohang">
    <h2 style="color: red">Quản Lý Giỏ Hàng</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Sản Phẩm</th>
            <th scope="col">Hình</th>
            <th scope="col">Giá</th>
            <th scope="col">Số Lượng</th>
            <th scope="col">Thao Tác</th>
        </tr>
        </thead>
		<?php
			$gioHang = unserialize ($_SESSION["GioHang"]);
			$TongThanhTien = 0;
			$SoSanPham = count ($gioHang -> arrSanPham);
			for ($i = 0; $i < $SoSanPham; $i ++) {
				$STT = $i + 1;
				$id = $gioHang -> arrSanPham[$i] -> MaSanPham;
				$sql = "SELECT MaSanPham, TenSanPham, HinhURL, Gia FROM sanpham WHERE BiXoa = 0 AND MaSanPham = $id";
				$result = DataProvider ::ExecuteQuery ($sql);
				$row = mysqli_fetch_array ($result);
				$tenSanPham = $row["TenSanPham"];
				$hinhURL = $row["HinhURL"];
				$gia = $row["Gia"];
                $_SESSION['tensanpham'] = $row["TenSanPham"];
				$soLuong = $gioHang -> arrSanPham[$i] -> SoLuong;
				$TongThanhTien += $gia * $soLuong;
				$_SESSION['soluong'] = $soLuong;
				$_SESSION['gia'] = $gia;
				$_SESSION['hinhurl'] = $hinhURL;
				$_SESSION['tongthanhtien'] = $TongThanhTien;
				?>
                <form name="frmGioHang" action="index.php?c=102" method="post">
                    <tbody>
                    <tr>
                        <th scope="row"><?php echo $STT; ?></th>
                        <td><?php echo $tenSanPham; ?></td>
                        <td>
                            <img src="images/sanpham/<?php echo $hinhURL; ?>" width="50">
                        </td>
                        <td><?php echo number_format ($gia); ?></td>
                        <td>
                            <input type="number" min="0" max="20" name="txtSoLuong"
                                   value="<?php echo $soLuong; ?>" width="20">
                            <input type="hidden" name="hdMaSanPham" value="<?php echo $id; ?>"/>
                        </td>
                        <td>
                            <input type="submit" value="Cập nhật số lượng"/>
                        </td>
                    </tr>
                    </tbody>
                </form>
				<?php
			}
		?>
    </table>
    <div class="pprice">
        <h5><strong>Tổng thành tiền: <?php echo number_format ($TongThanhTien) ?> đ</strong></h5>
    </div>
    <br>
	<?php
		if ($SoSanPham != 0) {
			?>
            <a href="index.php?c=6">
                <button type="button" class="btn btn-success">Thanh Toán</button>
            </a>
			<?php
		}
	?>
</div>

