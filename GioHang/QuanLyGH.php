<div class="checkout">
    <div class="container">
        <h3>Giỏ Hàng Của Tôi</h3>
        <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
            <table class="timetable_sub">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên Sản Phẩm</th>
                    <th scope="col">Hình</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Thao Tác</th>
                </tr>
                </thead>
                    <?php
                    $gioHang = unserialize ($_SESSION["GioHang"]);
                    $TongThanhTien = 0;
                    $SoSanPham = count ($gioHang -> arrSanPham);
                    for ($i = 0; $i < $SoSanPham; $i ++) {
                        $STT = $i + 1;
                        $id = $gioHang -> arrSanPham[$i] -> MaSanPham;
                        $sql = "SELECT MaSanPham, TenSanPham, HinhURL, Gia FROM sanpham WHERE BiXoa = 0 AND MaSanPham = $id";
                        $result = Database ::ExecuteQuery ($sql);
                        $row = mysqli_fetch_array ($result);
                        $tenSanPham = $row["TenSanPham"];
                        $hinhURL = $row["HinhURL"];
                        $gia = $row["Gia"];
                        $_SESSION['tensanpham'] = $row["TenSanPham"];
                        $soLuong = $gioHang -> arrSanPham[$i] -> SoLuong;
                        $TongThanhTien += $gia * $soLuong;
                        $_SESSION['soluong'] = $soLuong;
                        $_SESSION['gia'] = $gia;
                        $_SESSION['hinhurl'] = $hinhURL;
                        $_SESSION['tongthanhtien'] = $TongThanhTien;
                        ?>
                        <form name="frmGioHang" action="index.php?c=102" method="post">
                            <tbody>
                            <tr>
                                <th scope="row"><?php echo $STT; ?></th>
                                <td><?php echo $tenSanPham; ?></td>
                                <td>
                                    <img src="images/sanpham/<?php echo $hinhURL; ?>" width="50">
                                </td>
                                <td><?php echo number_format ($gia); ?></td>
                                <td>
                                    <input type="number" min="0" max="20" name="txtSoLuong"
                                           value="<?php echo $soLuong; ?>" width="20">
                                    <input type="hidden" name="hdMaSanPham" value="<?php echo $id; ?>"/>
                                </td>
                                <td>
                                    <input type="submit" value="Cập nhật số lượng"/>
                                </td>
                            </tr>
                            </tbody>
                        </form>
                        <?php
                    }
                    ?>
            </table>
        </div>
        <div class="checkout-left">

            <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                <a href="../mens.html"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
            </div>
            <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                <h4>TỔNG THÀNH TIỀN</h4>
                <h3 style="text-align: center"><?php echo number_format ($TongThanhTien) ?><br><br>Đồng</h3>
                <?php
                if ($SoSanPham != 0) {
                    ?>
                    <a href="index.php">
                        <button type="button" class="btn btn-success" style="margin-left: 100px;margin-bottom: 40px">Thanh Toán</button>
                    </a>
                    <?php
                }
                ?>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<?php

include("PagesHome/HoTroKhachHang.php");
include("PagesHome/Footer.php");
?>
</body>
</html>
