<?php
if (isset($_POST['taoloaisanpham'])) {
    $tenloaisanpham = $_POST['tenloaisanpham'];
    if (isset($_FILES['hinhanh'])) {
        $errors = array();
        $file_name = $_FILES['hinhanh']['name'];
        $sql = "SELECT HinhMinhHoaLSP FROM loaisanpham";
        $result = Database::ExecuteQuery($sql);
        while ($row = mysqli_fetch_array($result)) { //kiểm tra nếu up hình trùng tên sẽ thay đổi tên hình bằng cách thêm 1 vào trước.
            if ($row["HinhMinhHoaLSP"] === $file_name){
                $i = 1;
                $file_name = "$i".$file_name;
            }
        }
        $file_size = $_FILES['hinhanh']['size'];
        $file_tmp = $_FILES['hinhanh']['tmp_name'];
        $file_type = $_FILES['hinhanh']['type'];
        if ($file_size > 2097152) {
            $errors[] = 'Kích cỡ file nên là 2 MB';
        }
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "images/sanpham/loaisanpham/".$file_name);
        } else {
            print_r($errors);
        }
        $hinhanh = $file_name;
    }
    if ($tenloaisanpham == "") {
        echo '<script>alert("Vui lòng nhập đầy đủ trường thông tin")</script>';
    } else {
        $sql = "INSERT INTO loaisanpham(MaLoaiSanPham,HinhMinhHoaLSP,TenLoaiSanPham)
					VALUES (null,'$hinhanh','$tenloaisanpham')";
        $result = Database::ExecuteQuery($sql);
        if ($result) {
            echo '<script>alert("Tạo LSP thành công")</script>';
            //header("location: ../../Admin/dangnhapadmin.php");
            Database::ChangeURL("index.php?c=3");
        } else {
            echo '<script>alert("Tạo LSP không thành công")</script>';
        }
    }
}
?>
<div class="container">
    <form class="form-control" method="post" enctype="multipart/form-data">
        <h4 style="color: red;border-bottom: 1px solid #0b0b0b;display: inline-block;">Tạo Loại Sản Phẩm Mới</h4>
        <div class="form-group col-md-6">
            <label for="tenloaisanpham"><strong><h6>Tên Loại Sản Phẩm</h6></strong></label>
            <input type="text" name="tenloaisanpham" class="form-control" id="tenloaisanpham"
                   placeholder="Tên sản phẩm">
        </div>
        <!--		<div class="form-group col-md-6">-->
        <!--			<label for="maloaisanpham"><strong><h6>Mã Loại Sản Phẩm</h6></strong></label>-->
        <!--			<input type="text" name="maloaisanpham" class="form-control" id="maloaisanpham"-->
        <!--				   placeholder="Mã loại sản phẩm">-->
        <!--		</div>-->
        <div class="form-group col-md-4">
            <label for="hinhurl"><strong><h6>Hình Đại Diện Loại Sản Phẩm</h6></strong></label>
            <input type="file" class="form-control-file" id="hinhurl" name="hinhanh">
        </div>
        <br>
        <button type="submit" class="btn btn-primary" name="taoloaisanpham">Tạo loại sản phẩm</button>
    </form>
</div>
<br>