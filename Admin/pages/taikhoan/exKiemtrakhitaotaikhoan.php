<?php
    include '../../../libs/database.php';
    $un = ''; //định nghĩa un là tên đăng nhập
    $ph = ''; //định nghĩa ph là số điện thoại
    $em = ''; // định nghĩa em là email
	//kiểm tra:
    if (isset($_POST["un"])){
        $un = $_POST["un"];
    }
    if (isset($_POST["ph"])){
        $ph = $_POST["ph"];
    }
    if (isset($_POST["em"])){
        $em = $_POST["em"];
    }
    $sql = "SELECT * FROM nhanvien WHERE TenDangNhap = '$un' OR SoDienThoai = '$ph' OR Email = '$em' ";
    $result = Database::ExecuteQuery($sql);
    $dong = mysqli_num_rows($result);
    echo $dong;
?>