<?php
include '../../libs/database.php';
$un = $_POST["un"];
$sql = "SELECT * FROM nhanvien WHERE BiXoa = 0 AND TenDangNhap = '$un'";
$result = Database::ExecuteQuery($sql);
$dong = mysqli_num_rows($result);
echo $dong;
?>