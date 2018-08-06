<div class="container">
    <div class="row">
        <?php
        $a = 1;
        if (isset($_GET["a"])) {
            $a = $_GET["a"];
            settype($a, "int");
        }
        $sql = "SELECT * FROM sanpham WHERE BiXoa = 0 AND MaLoaiSanPham = $a";
        $result = Database::ExecuteQuery($sql);
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="col-lg-3 col-md-6 mb-4">
                <br>
                <div class="view overlay z-depth-1-half">
                    <a href="ChiTietSanPham.php?id=<?php echo $row["MaSanPham"] ?>"><img
                                src="images/sanpham/<?php echo $row["HinhURL"]; ?>"
                                class="img-thumbnail border border-warning"></a>
                    <div class="mask rgba-white-slight"></div>
                </div>
                <div style="text-align: center">
                    <h4 class="my-4 font-weight-bold" style="color: #04569A;text-overflow: ellipsis; overflow: hidden;
                                white-space:nowrap;width: auto;"><a
                                href="ChiTietSanPham.php?id=<?php echo $row["MaSanPham"] ?>"
                                style="text-decoration: none;"><?php echo $row["TenSanPham"]; ?></a>
                    </h4>
                    <p class="grey-text">Giá: <?php echo number_format($row["Gia"]); ?> đ</p>
                    <a href="index.php?c=101&id=<?php echo $row["MaSanPham"] ?>">
                        <button type="button" class="btn btn-success">Đặt Hàng</button>
                    </a>
                </div>
                <br>
            </div>
            <?php
        }
        ?>
    </div>
</div>