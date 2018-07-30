<?php
if (isset($_POST['capnhatloaisanpham'])) {
    $tenloaisanpham = $_POST['tenloaisanpham'];
    $maloaisanpham = $_POST['maloaisanpham'];
    $sql = "SELECT * FROM loaisanpham WHERE MaLoaiSanPham = '$maloaisanpham'";
    $result = Database::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
    if (isset($_FILES['hinhanh'])) {
        $errors = array();
        $file_name = $_FILES['hinhanh']['name'];
        if ($file_name == "") {
            $hinhanh = $row['HinhMinhHoaLSP'];
        } else {
            $file_size = $_FILES['hinhanh']['size'];
            $file_tmp = $_FILES['hinhanh']['tmp_name'];
            $file_type = $_FILES['hinhanh']['type'];
            if ($file_size > 2097152) {
                $errors[] = 'Kích cỡ file nên là 2 MB';
            }
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "images/sanpham/loaisanpham/" . $file_name);
            } else {
                print_r($errors);
            }
            $hinhanh = $_FILES['hinhanh']['name'];
        }
    }
    if ($tenloaisanpham == "" || $maloaisanpham == "") {
        echo '<script>alert("Vui lòng nhập đầy đủ trường thông tin")</script>';
    } else {
        $sql = "UPDATE loaisanpham SET HinhMinhHoaLSP = '$hinhanh',TenLoaiSanPham = '$tenloaisanpham',
					MaLoaiSanPham = '$maloaisanpham' WHERE MaLoaiSanPham = '$maloaisanpham'";
        $result = Database::ExecuteQuery($sql);
        if ($result) {
            echo '<script>alert("Cập nhật thành công")</script>';
            Database::ChangeURL("index.php?c=3");
        } else {
            echo '<script>alert("Cập nhật không thành công")</script>';
            Database::ChangeURL("index.php?c=3&k=3");
        }
    }
}
?>