<?php
if (isset($_POST['capnhat'])) {
    //định nghĩa
    $fullname = $_POST['hovatenmoi'];
    $username = $_POST['tendangnhapmoi'];
    $password = $_POST['matkhaumoi'];
    $email = $_POST['emailmoi'];
    $phone = $_POST['sodienthoaimoi'];
    //lưu session:
    $id = $_SESSION['SMaNhanVien'];
    $_SESSION['Stendangnhap'] = $_POST['tendangnhapmoi'];
    $_SESSION['SHoTen'] = $_POST['hovatenmoi'];
    $_SESSION['SEmail'] = $_POST['emailmoi'];
    $_SESSION['SSodienthoai'] = $_POST['sodienthoaimoi'];
    $_SESSION['SMatkhau'] = $_POST['matkhaumoi'];
    if (isset($_FILES['hinhanhmoi'])) { // kiểm tra file tải lên
        $errors = array();
        $file_name = $_FILES['hinhanhmoi']['name'];
        if ($file_name == "") {
            $hinhanh = $_SESSION['SHinh'];
        } else {
            $file_size = $_FILES['hinhanhmoi']['size'];
            $file_tmp = $_FILES['hinhanhmoi']['tmp_name'];
            $file_type = $_FILES['hinhanhmoi']['type'];
            if ($file_size > 2097152) {
                $errors[] = 'Kích cỡ file lớn hơn 2 MB';
            }
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "modules/logo/" . $file_name);
            } else {
                print_r($errors);
            }
            $hinhanh = $_FILES['hinhanhmoi']['name'];
        }
    }
    $_SESSION['SHinh'] = $hinhanh;
    if ($fullname == "" || $username == "" || $password == "" || $email == "" || $phone == "") {
        echo '<script>alert("Vui lòng nhập đầy đủ trường thông tin")</script>';
    } else { //update dũ liệu:
        $sql1 = "UPDATE nhanvien
SET HinhNhanVien = '$hinhanh',TenDangNhap='$username',MatKhau='$password',HoTen='$fullname',
Email='$email',SoDienThoai='$phone' WHERE MaNhanVien = '$id'";
        $result = Database::ExecuteQuery($sql1);
        if ($result) {
            echo '<script>alert("Cập nhật thành công")</script>';
            Database::ChangeURL("index.php?c=2");
        } else {
            echo '<script>alert("Cập nhật không thành công")</script>';
        }
    }
}
?>