<?php
    session_start();
    include("../../../NoiThat/libs/database.php");
    if (isset($_POST['login'])) {
        $adminusername = $_POST['tendangnhap'];
        $pass = $_POST['matkhau'];
        //$sql = "SELECT MaNhanVien FROM nhanvien WHERE TenDangNhap='$ddminusername' AND MatKhau='$pass' ";
        $sql = "SELECT * FROM nhanvien WHERE BiXoa =0 AND TenDangNhap = '$adminusername' AND MatKhau = '$pass'";
        $result = Database::ExecuteQuery($sql);
//        $sql1 = "SELECT MaNhanVien FROM nhanvien WHERE TenDangNhap='$ddminusername' AND MatKhau='$pass' ";
//       $result1 =  Database::ExecuteQuery($sql);
        $num = mysqli_fetch_array($result);
        if ($num > 0) {
            $_SESSION['SMaNhanVien'] = $num['MaNhanVien'];
            $_SESSION['Stendangnhap'] = $_POST['tendangnhap'];
            $_SESSION['SHoTen'] = $num['HoTen'];
            $_SESSION['SHinh'] = $num['HinhNhanVien'];
            $_SESSION['SEmail'] = $num['Email'];
            $_SESSION['SSodienthoai'] = $num['SoDienThoai'];
            $_SESSION['SQuyenAdmin'] = $num['QuyenAdmin'];
            echo "<script>window.location.href='../" . "index.php" . "'</script>";
            exit();
        } else {
            $_SESSION['action1'] = "Tên đăng nhập hoặc mật khẩu sai";
            echo '<script>alert("Tên đăng nhập hoặc mật khẩu bị sai")</script>';
            //echo '<script>alert()</script>';
            echo "<script>window.location.href='" . "index.php" . "'</script>";
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="vn">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Dashboard">
	<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<script type="text/javascript" src="../../../WebHoa/js/jquery/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../../WebHoa/js/jquery/jquery-3.3.1.js"></script>
	<title>Đăng nhập Admin</title>
	<link href="../assets/css/bootstrap.css" rel="stylesheet">
	<link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
	<link href="../assets/css/style.css" rel="stylesheet">
	<link href="../assets/css/style-responsive.css" rel="stylesheet">
	<link rel="icon" href="../../../WebHoa/images/favicon/favicon-32x32.png" sizes="32x32">
	<script>
		$(document).ready(function () {
			$("#username").blur(function () {
				var u = $(this).val();
				$.ajax({
					url: "textdn.php",
					type: "post",
					dataType: "text",
					data:{
						un:u,
					},
					success: function (data) {
						if (data == 1)
						{
							$("#kiemtrauser").css("color", "blue").html("Hợp lệ");
						}
						else {
							$("#kiemtrauser").css("color", "red").html("Không hợp lệ");
						}
					}
				})
			});
			$("#password").blur(function () {
				var value = $(this).val();
				if (value === ''){
					$("#kiemtrapass").css("color", "red").html("Vui lòng nhập mật khẩu");
				}
			});
		});
	</script>
</head>
<body>
<div id="login-page">
	<div class="container">
		<form class="form-login" action="" method="post">
			<h2 class="form-login-heading"><strong>ĐĂNG NHẬP</strong></h2>
			<div class="login-wrap">
				<input type="text" name="tendangnhap" class="form-control" id="username" placeholder="Tên đăng nhập" autofocus>
				<br>
				<div id="kiemtrauser"></div>
				<br>
				<input type="password" name="matkhau" class="form-control" id="password" placeholder="Mật khẩu"><br>
				<div id="kiemtrapass"></div><br>
				<button type="submit" class="btn btn-primary" name="login"
						style="margin-left: 190px">Đăng Nhập</button>
<!--				<a href="../pages/taikhoan/pTaotaikhoanadmin.php" style="text-align: center">Tạo tài khoản</a>-->
			</div>
		</form>
	
	</div>
</div>
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.backstretch.min.js"></script>
<script>
	$.backstretch("assets/img/login-bg.jpg", {speed: 500});
</script>
</body>
</html>
