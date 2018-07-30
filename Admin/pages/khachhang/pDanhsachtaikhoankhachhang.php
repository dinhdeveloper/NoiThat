<form method="post" class="form" style="padding: 25px">
    <h4 style="color: red">Danh Sách Khách Hàng</h4>
    <?php
        include ("pSearchKH.php");
    ?>
    <br>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">Mã Khách Hàng</th>
            <th scope="col">Họ Tên KH</th>
            <th scope="col">Địa Chỉ</th>
            <th scope="col">Số Điện Thoại</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col">Thao Tác</th>
        </tr>
        </thead>
        <?php
        $sql = "SELECT MaKhachHang,HoTen,DiaChi,
 					SoDienThoai,BiXoa FROM khachhang";
        $result = Database::ExecuteQuery($sql);
        while ($row = mysqli_fetch_array($result)) { // tìm và trả về một dòng kết quả của một truy vấn
            ?>
            <tr>
                <th scope="row"><?php echo $row["MaKhachHang"]; ?></th>
                <td><?php echo $row["HoTen"]; ?></td>
                <td><?php echo $row["DiaChi"]; ?></td>
                <td><?php echo $row["SoDienThoai"]; ?></td>
                <td style="text-align: center"><img src="modules/logo/active.png"><?php //echo $row["BiXoa"];
                    ?></td>
                <td>
                    <a href="#"><img src="modules/logo/edit.png"></a>
                    <a href="#"><img src="modules/logo/lock.png"></a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</form>
