<div class="container">
	<form class="form-control" action="index.php?c=4&k=201" enctype="multipart/form-data" method="post">
		<h4 style="color:red; border-bottom: 1px solid #0b0b0b ;display: inline-block">Tạo Sản Phẩm Mới</h4>
		<div class="form-group col-md-6">
			<label for="tensanpham"><strong><h6>Tên Sản Phẩm</h6></strong></label>
			<input type="text" name="tensanpham" class="form-control" id="tensanpham" placeholder="Tên sản phẩm">
		</div>
		<div class="form-group col-md-6">
			<label for="maloaisanpham"><strong><h6>Loại Sản Phẩm</h6></strong></label>
            <select name="maloaisanpham">
                <?php
                $sql = "SELECT MaLoaiSanPham, TenLoaiSanPham FROM LoaiSanPham WHERE BiXoa = 0";
                $result = Database::ExecuteQuery($sql);
                while($row = mysqli_fetch_array($result)){
                    $maLoaiSanPham = $row["MaLoaiSanPham"];
                    $tenLoaiSanPham = $row["TenLoaiSanPham"];
                    echo "<option value='$maLoaiSanPham'>$tenLoaiSanPham</option>";
                }
                ?>
            </select>
		</div>
		<div class="form-group col-md-4">
			<label for="gia"><strong><h6>Giá</h6></strong></label>
			<input type="number" name="gia" class="form-control" id="gia" placeholder="Giá">
		</div>
		<div class="form-group col-md-4">
			<label for="ngaynhap"><strong><h6>Ngày Nhập: </h6></strong></label>
			<input type="date" min="<?php echo date('Y-m-d'); ?>" name="ngaynhap" class="form-control" id="ngaynhap">
		</div>
		<div class="form-group col-md-4">
			<label for="hinhurl"><strong><h6>Hình URL</h6></strong></label>
			<input type="file" name="hinhanh" class="form-control-file" id="hinhurl">
		</div>
		<div class="form-group">
			<label for="mota"><strong><h6>Mô tả</h6></strong></label>
			<textarea class="form-control" id="mota" rows="3" name="mota"></textarea>
		</div>
        <div class="form-group">
            <label for="hdsd"><strong><h6>Hướng Dẩn Sử Dụng</h6></strong></label>
            <textarea class="form-control" id="hdsd" rows="3" name="hdsd"></textarea>
        </div>
		<br>
		<button type="submit" class="btn btn-primary" name="taosanpham">Tạo sản phẩm</button>
	</form>
</div>
<br>