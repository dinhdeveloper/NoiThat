<?php
//include ("../../../../libs/database.php");
?>
<body>
<div>
    <form method="post">
        <input type="text" name="search" placeholder="Tên Khách Hàng"/>
        <input type="submit" name="ok" value="search"/>
    </form>
</div>
<?php
// Nếu người dùng submit form thì thực hiện
if (isset($_REQUEST['ok'])) {
    // Gán hàm addslashes để chống sql injection
    $search = ($_POST['search']);

    // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
    if (empty($search)) {
        echo "Yêu cầu dữ liệu nhập vào trống";
    } else {
        // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
        $sql = "select * from khachhang where HoTen like '%$search%'";
        $result = Database::ExecuteQuery($sql);
        $num = mysqli_fetch_row($result);
        // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
        if ($num > 0 && $search != "") {
            // Dùng $num để đếm số dòng trả về.
            echo "<h5>Từ Khóa: <b>$search</b></h5>";

            ?>
            <table>
                <thead class="thead-light">
                <tr>
                    <th scope="col">Mã Khách Hàng</th>
                    <th scope="col">Họ Tên KH</th>
                    <th scope="col">Địa Chỉ</th>
                    <th scope="col">Số Điện Thoại</th>
                    <th scope="col">Trạng Thái</th>
                </tr>
                </thead>
            <?php


            // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo "<td>{$row['MaKhachHang']}</td>";
                echo "<td>{$row['HoTen']}</td>";
                echo "<td>{$row['DiaChi']}</td>";
                echo "<td>{$row['SoDienThoai']}</td>";
                echo "<td>{$row['BiXoa']}</td>";
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo "Khong tim thay ket qua!";
        }
    }
}
?>
</body>