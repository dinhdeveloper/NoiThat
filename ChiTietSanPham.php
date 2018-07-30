<?php
include("libs/Database.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Trang Trí Nội Thất</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Smart Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- //for-mobile-apps -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- js -->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <!-- //js -->
    <!-- single -->
    <script src="js/imagezoom.js"></script>
    <script src="js/jquery.flexslider.js"></script>
    <!-- single -->
    <!-- cart -->
    <script src="js/simpleCart.min.js"></script>
    <!-- cart -->
    <!-- for bootstrap working -->
    <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
    <!-- //for bootstrap working -->
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic'
          rel='stylesheet' type='text/css'>
    <script src="js/jquery.easing.min.js"></script>
</head>
<body>
<!-- header-bot -->
<?php
include("PagesDetail/HeaderTop.php");
include("PagesDetail/HeaderMenu.php");
?>
<div class="page-head">
    <div class="container">
        <h3>Chi Tiết Sản Phẩm</h3>
    </div>
</div>
<!-- //banner -->
<!-- single -->
<div class="single">
    <?php
    $id = 1;
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    }
    $sql = "SELECT * FROM sanpham WHERE MaSanPham = '$id'";
    $result = Database::ExecuteQuery($sql);
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <div class="container">
            <div class="col-md-6 single-right-left animated wow slideInUp animated" data-wow-delay=".5s"
                 style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
                <div class="grid images_3_of_2">
                    <div class="flexslider">
                        <!-- FlexSlider -->
                        <script>
                            // Can also be used with $(document).ready()
                            $(window).load(function () {
                                $('.flexslider').flexslider({
                                    animation: "slide",
                                    controlNav: "thumbnails"
                                });
                            });
                        </script>
                        <img src="images/sanpham/<?php echo $row["HinhURL"] ?>" data-imagezoom="true" style="width: 400px; height: auto; border: 1px solid #B6B6B6">
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated"
                 data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
                <h3><?php echo $row["TenSanPham"] ?></h3>
                <p><span class="item_price"><?php echo number_format($row["Gia"]) ?> đồng</span>
                    <!--                    <del>- $900</del>-->
                </p>
                <div class="color-quality">
                    <div class="color-quality-right">
                        <h5>Số Lượng :</h5>
                        <select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
                            <option value="null">1 sp</option>
                            <option value="null">2 sp</option>
                            <option value="null">3 sp</option>
                            <option value="null">4 sp</option>
                            <option value="null">5 sp</option>
                            <option value="null">6 sp</option>
                            <option value="null">7 sp</option>
                            <option value="null">8 sp</option>
                            <option value="null">9 sp</option>
                            <option value="null">10 sp</option>
                        </select>
                    </div>
                </div>
                <div class="occasional">
                    <h5>Types :</h5>
                    <div class="colr ert">
                        <label class="radio"><input type="radio" name="radio" checked=""><i></i>Loại Nhỏ</label>
                    </div>
                    <div class="colr">
                        <label class="radio"><input type="radio" name="radio"><i></i>Loại Vừa</label>
                    </div>
                    <div class="colr">
                        <label class="radio"><input type="radio" name="radio"><i></i>Loại Lớn</label>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="occasion-cart">
                    <a href="index.php?c=101&id=<?php echo $row["MaSanPham"]?>" class="item_add hvr-outline-out button2">Mua Hàng</a>
                </div>

            </div>
            <div class="clearfix"></div>

            <div class="bootstrap-tab animated wow slideInUp animated" data-wow-delay=".5s"
                 style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#home" id="home-tab" role="tab" data-toggle="tab"
                               aria-controls="home" aria-expanded="true">THÔNG TIN SẢN PHẨM</a>
                        </li>
                        <li role="presentation"><a href="#thuonghieu" role="tab" id="thuonghieu-tab" data-toggle="tab"
                                                   aria-controls="thuonghieu">THƯƠNG HIỆU</a></li>
                        <li role="presentation"><a href="#huongdansudung" role="tab" id="huongdansudung-tab"
                                                   data-toggle="tab"
                                                   aria-controls="huongdansudung">HƯỚNG DẨN SỬ DỤNG</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home"
                             aria-labelledby="home-tab">
                            <h5><?php echo $row["TenSanPham"] ?></h5>
                            <p>
                                <?php echo $row["MoTa"] ?>
                            </p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="thuonghieu"
                             aria-labelledby="thuonghieu-tab">
                            <h5>Tên Thương Hiệu</h5>
                            <img src="images/icon/thuonghieu.jpg">
                        </div>
                        <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="huongdansudung"
                             aria-labelledby="huongdansudung-tab">
                            <p>
                                <?php echo $row["HuongDanSuDung"] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
<?php
include("PagesHome/HoTroKhachHang.php");
include("PagesHome/Footer.php");
?>
</body>
</html>
