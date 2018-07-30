<?php
if (isset($_POST["taosanpham"])) {
    $tensanpham = $_POST['tensanpham'];
    $maloaisanpham = $_POST['maloaisanpham'];
    $gia = $_POST['gia'];
    $mota = $_POST['mota'];
    $hdsd = $_POST['hdsd'];
    $ngaynhap = $_POST['ngaynhap'];
    if (isset($_FILES['hinhanh'])) {// kiểm tra file
        $errors = array();
        $file_name = $_FILES['hinhanh']['name'];
        $sql = "SELECT HinhURL FROM sanpham";
        $result = Database::ExecuteQuery($sql);
        while ($row = mysqli_fetch_array($result)) { //kiểm tra nếu up hình trùng tên sẽ thay đổi tên hình bằng cách thêm 1 vào trước.
            if ($row["HinhURL"] === $file_name){
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
            move_uploaded_file($file_tmp, "images/sanpham/sanpham/" . $file_name);
        } else {
            print_r($errors);
        }
    }
    $hinhanh = $file_name;
    if ($tensanpham == "" || $maloaisanpham == "" || $gia == "" || $ngaynhap == "") {
        echo '<script>alert("Vui lòng nhập đầy đủ trường thông tin")</script>';
    }
    else {
        $sql = "INSERT INTO sanpham(MaSanPham,TenSanPham,MaLoaiSanPham,Gia,NgayNhap,SoLuongBan, SoLuotXem,MoTa,BiXoa,HinhURL,HuongDanSuDung)
					VALUES(null,'$tensanpham','$maloaisanpham','$gia','$ngaynhap',0,0,'$mota',0,'$hinhanh','$hdsd')";
        $result = Database::ExecuteQuery($sql);
        if ($result) {
            echo '<script>alert("Tạo SP thành công")</script>';
            Database::ChangeURL("index.php?c=4");
        } else {
            echo '<script>alert("Tạo SP không thành công")</script>';
            Database::ChangeURL("index.php?c=4&k=2");
        }
    }
}
?>