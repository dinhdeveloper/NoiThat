<?php
session_start();
include '../../../libs/database.php';
if (isset($_POST['dangky'])) {
    $fullname = $_POST['hovaten'];
    $username = $_POST['tendangnhap'];
    $password = $_POST['matkhau'];
    $email = $_POST['email'];
    $phone = $_POST['sodienthoai'];
//    $_SESSION['Stendangnhap'] = $_POST['tendangnhap'];
//    $_SESSION['SHoTen'] = $_POST['hovaten'];
//    $_SESSION['SEmail'] = $_POST['email'];
//    $_SESSION['SSodienthoai'] = $_POST['sodienthoai'];
    //$_SESSION['SMatkhau'] = $_POST['matkhau'];
    if (isset($_FILES['hinhanh'])) {
        $errors = array();
        $file_name = $_FILES['hinhanh']['name'];
        $file_size = $_FILES['hinhanh']['size'];
        $file_tmp = $_FILES['hinhanh']['tmp_name'];
        $file_type = $_FILES['hinhanh']['type'];
//            $file_ext = strtolower(end(explode('.', $_FILES['hinhanh']['name'])));
//            $expensions = array("png");
//            if (in_array($file_ext, $expensions) === false) {
//                $errors[] = "Không chấp nhận định dạng ảnh có đuôi này, mời bạn chọn PNG.";
//            }
        if ($file_size > 2097152) {
            $errors[] = 'Kích cỡ file nên là 2 MB';
        }
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "../../../images/avatar/" . $file_name);
        } else {
            print_r($errors);
        }
    }
    $hinhanh = $_FILES['hinhanh']['name'];
//    $_SESSION['SHinh'] = $hinhanh;
    if ($fullname==""||$username==""||$password==""||$email==""||$phone==""){
        echo '<script>alert("Vui lòng nhập đầy đủ trường thông tin")</script>';
    }
    else{
        $sql1 = "INSERT INTO nhanvien (MaNhanVien,HinhNhanVien,TenDangNhap,MatKhau,HoTen,Email,SoDienThoai,BiXoa)
			VALUES (null,'$hinhanh','$username','$password','$fullname','$email','$phone','0')";
//        $sql1 = "INSERT INTO nhanvien HinhNhanVien ='$hinhanh',TenDangNhap='$username',MatKhau='$password',
//				HoTen ='$fullname',Email ='$email',SoDienThoai ='$phone'";
        $result = Database::ExecuteQuery($sql1);
        if ($result) {
            echo '<script>alert("Đăng ký thành công")</script>';
            //Database::ChangeURL("../../index.php");
        } else {
            echo '<script>alert("Đăng ký không thành công")</script>';
        }
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
    <script type="text/javascript" src="../../../js/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../../../js/jquery/jquery-3.3.1.js"></script>
    <title>Đăng Ký Admin</title>
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../../assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/css/style-responsive.css" rel="stylesheet">
    <link rel="icon" href="../../../images/favicon/favicon-32x32.png" sizes="32x32">
    <script>
        $(document).ready(function () {
            $("#username").blur(function () {
                var username = $("#username").val();
                $.ajax({
                    url: "exKiemtrakhitaotaikhoan.php",
                    type: "post",
                    dataType: "text",
                    data: {
                        un: username,
                    },
                    success: function (data) {
                        if (data == 1) {
                            $("#kiemtrauser").css("color", "red").html("Tên đăng nhập đã tồn tại");
                            //$("#kiemtraphone").css("color", "red").html("Co roi");
                        }
                        else {
                            $("#kiemtrauser").css("color", "blue").html("Hợp lệ");
                            //$("#kiemtraphone").css("color", "blue").html("chua co");
                        }
                    }
                })
            });
            $("#email").blur(function () {
                var email = $("#email").val();
                $.ajax({
                    url: "exKiemtrakhitaotaikhoan.php",
                    type: "post",
                    dataType: "text",
                    data: {
                        em: email,
                    },
                    success: function (data) {
                        if (data == 1) {
                            $("#kiemtraemail").css("color", "red").html("Tên đăng nhập đã tồn tại");
                        }
                        else {
                            $("#kiemtraemail").css("color", "blue").html("Hợp lệ");
                        }
                    }
                })
            });
            $("#numberphone").blur(function () {
                var phone = $("#numberphone").val();
                $.ajax({
                    url: "exKiemtrakhitaotaikhoan.php",
                    type: "post",
                    dataType: "text",
                    data: {
                        ph: phone,
                    },
                    success: function (data) {
                        if (data == 1) {
                            $("#kiemtraphone").css("color", "red").html("Số điện thoại đã tồn tại");
                        }
                        else {
                            $("#kiemtraphone").css("color", "blue").html("Hợp lệ");
                        }
                    }
                })
            });
            $("#fullname").blur(function () {
                var value = $(this).val();
                if (value === '') {
                    $("#kiemtraname").css("color", "red").html("Vui lòng nhập họ và tên");
                }
                else {
                    $("#kiemtraname").css("color", "blue").html("Hợp lệ");
                }
            });
            $("#password").blur(function () {
                var value = $(this).val();
                if (value === '') {
                    $("#kiemtrapass").css("color", "red").html("Vui lòng nhập mật khẩu");
                }
            });
        });
    </script>
</head>
<body>
<div id="login-page">
    <div class="container">
        <form class="form-login" action="" method="post" enctype="multipart/form-data">
            <h2 class="form-login-heading"><strong>ĐĂNG KÝ</strong></h2>
            <p style="color:#F00; padding-top:20px;"
               align="center"></p>
            <div class="login-wrap">
                <input type="text" name="hovaten" class="form-control" id="fullname" placeholder="Họ và tên" autofocus>
                <br>
                <div id="kiemtraname"></div>
                <br>
                <input type="text" name="tendangnhap" class="form-control" id="username" placeholder="Tên đăng nhập"
                       autofocus>
                <br>
                <div id="kiemtrauser"></div>
                <br>
                <input type="password" name="matkhau" class="form-control" id="password" placeholder="Mật khẩu"
                       autofocus>
                <br>
                <div id="kiemtrapass"></div>
                <br>
                <input type="email" name="email" class="form-control" id="email" placeholder="Địa chỉ email" required>
                <br>
                <div id="kiemtraemail"></div>
                <br>
                <input type="number" name="sodienthoai" class="form-control" id="numberphone" placeholder="Số điện thoại">
                <br>
                <div id="kiemtraphone"></div>
                <br>
                <input type="file" name="hinhanh" id="images" autofocus>
                <br>
                <div id="kiemtraimg"></div>
                <br>
                <button type="submit" class="btn btn-primary" name="dangky"
                        style="margin-left: 200px">Đăng Ký
                </button>
<!--                <a href="../../Admin/index.php"><strong>Quay lại đăng nhập</strong></a>-->
            </div>
        </form>
    </div>
</div>
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../assets/js/jquery.backstretch.min.js"></script>
</body>
</html>
