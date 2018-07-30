<h4 style="color: red"><marquee scrollamount="1" behavior="alternate">CHÀO MỪNG BẠN ĐẾN VỚI TRANG QUẢN LÝ</marquee></h4>

<section id="content">
    <!--start container-->
    <div class="container">
        <!--card stats start-->
        <div id="card-stats">
            <div class="row">
                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-content cyan white-text">
                            <p class="card-stats-title">
                                <i class="material-icons">person_outline</i> Khách hàng mới</p>
                            <?php
                            $sql = "SELECT MaKhachHang FROM khachhang";
                            $result = Database::ExecuteQuery($sql);
                            $row = mysqli_num_rows($result);
                            ?>
                            <h4 class="card-stats-number"><?php echo $row ?> KH</h4>
                            <p class="card-stats-compare">
                                <i class="material-icons">keyboard_arrow_up</i> 15%
                                <span class="cyan text text-lighten-5">so với hôm qua</span>
                            </p>
                        </div>
                        <div class="card-action cyan darken-1">
                            <div id="clients-bar" class="center-align"></div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-content red accent-2 white-text">
                            <p class="card-stats-title">
                                <i class="material-icons">attach_money</i>Tổng doanh thu</p>
                            <h4 class="card-stats-number"><?php echo number_format(123000); ?> VNĐ</h4>
                            <p class="card-stats-compare">
                                <i class="material-icons">keyboard_arrow_up</i> 70%
                                <span class="red-text text-lighten-5">so với tháng trước</span>
                            </p>
                        </div>
                        <div class="card-action red darken-1">
                            <div id="sales-compositebar" class="center-align"></div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-content teal accent-4 white-text">
                            <p class="card-stats-title">
                                <i class="material-icons">trending_up</i> Lợi nhuận hôm nay</p>
                            <h4 class="card-stats-number"><?php echo number_format(123000); ?> VNĐ</h4>
                            <p class="card-stats-compare">
                                <i class="material-icons">keyboard_arrow_up</i> 80%
                                <span class="teal-text text-lighten-5">so với năm trước</span>
                            </p>
                        </div>
                        <div class="card-action teal darken-1">
                            <div id="profit-tristate" class="center-align"></div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-content deep-orange accent-2 white-text">
                            <p class="card-stats-title">
                                <i class="material-icons">content_copy</i> Hóa đơn mới</p>
                            <?php
                            $sql = "SELECT MaDonDatHang FROM dondathang WHERE MaTinhTrangDonDatHang =1";
                            $result = Database::ExecuteQuery($sql);
                            $row = mysqli_num_rows($result);
                            ?>
                            <h4 class="card-stats-number"><?php echo $row ?> HĐ</h4>
                            <p class="card-stats-compare">
                                <i class="material-icons">keyboard_arrow_down</i> 3%
                                <span class="deep-orange-text text-lighten-5">so với tháng trước</span>
                            </p>
                        </div>
                        <div class="card-action  deep-orange darken-1">
                            <div id="invoice-line" class="center-align"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end container-->
</section>


<form method="post" style="padding: 25px">
    <h4 style="text-align: center;color: #f1c40f">ĐƠN HÀNG CHƯA ĐƯỢC XỬ LÝ</h4><br>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">Mã Đơn Đặt Hàng</th>
            <th scope="col">Khách Hàng</th>
            <th scope="col">Số Điện Thoại</th>
            <th scope="col">Địa Chỉ</th>
            <th scope="col">Tình Trạng ĐĐH</th>
            <th scope="col">Thao Tác</th>
        </tr>
        </thead>
        <?php
        $sql = "SELECT dondathang.MaDonDatHang, khachhang.HoTen, khachhang.DiaChi, khachhang.SoDienThoai,
                tinhtrangdondathang.TenTinhTrangDonDatHang,dondathang.MaTinhTrangDonDatHang
                FROM dondathang,khachhang,tinhtrangdondathang 
                WHERE (dondathang.MaKhachHang = khachhang.MaKhachHang) AND 
                (dondathang.MaTinhTrangDonDatHang= tinhtrangdondathang.MaTinhTrangDonDatHang) AND 
                dondathang.MaTinhTrangDonDatHang =1";
        $result = Database::ExecuteQuery($sql);
        while($row = mysqli_fetch_array($result)){
            $maDonDatHang = $row["MaDonDatHang"];
            $hoTen = $row["HoTen"];
            $diaChi = $row["DiaChi"];
            $soDienThoai = $row["SoDienThoai"];
            $tenTinhTrangDonDatHang = $row["TenTinhTrangDonDatHang"];
            include("modules/tDanhSachDonDatHangChuaXuLy.php");
        }
        ?>
    </table>
</form>