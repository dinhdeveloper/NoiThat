<?php
$a = 1;
if (isset($_GET["a"])) {
    $a = $_GET["a"];
    settype($a, "int");
}
?>
<div class="product-easy">
    <div class="container">
        <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#horizontalTab').easyResponsiveTabs({
                    type: 'default', //Types: default, vertical, accordion
                    width: 'auto', //auto or any width like 600px
                    fit: true   // 100% fit in a container
                });
            });
        </script>

        <div class="sap_tabs">
            <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                <ul class="resp-tabs-list">
                    <?php
                    $sql = "SELECT * FROM loaisanpham WHERE BiXoa = 0";
                    $result = Database::ExecuteQuery($sql);
                    while ($row1 = mysqli_fetch_array($result)) {
                        ?>
                        <a href="index.php?a=<?php echo $row1["MaLoaiSanPham"] ?>">
                            <li class="resp-tab-item" aria-controls="tab_item-1" role="tab">
                                <span><?php echo $row1["TenLoaiSanPham"] ?></span>
                            </li>
                        </a>
                        <?php
                    }
                    ?>
                </ul>
                <div class="resp-tabs-container">
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                        <?php
                        $sql = "SELECT * FROM sanpham WHERE BiXoa =0 AND MaLoaiSanPham = '$a'";
                        $result = Database::ExecuteQuery($sql);
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <div class="col-md-3 product-men">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item">
                                        <a href="ChiTietSanPham.php?id=<?php echo $row["MaSanPham"] ?>"><img src="images/sanpham/<?php echo $row["HinhURL"] ?>" alt=""
                                                        class="pro-image-front">
                                            <img src="images/sanpham/<?php echo $row["HinhURL"] ?>" alt=""
                                                 class="pro-image-back">
                                        </a>
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="ChiTietSanPham.php?id=<?php echo $row["MaSanPham"] ?>"
                                                   class="link-product-add-cart">Chi Tiết</a>
                                            </div>
                                        </div>
                                        <span class="product-new-top">Mới</span>
                                    </div>
                                    <div class="item-info-product ">
                                        <h4>
                                            <a href="ChiTietSanPham.php?id=<?php echo $row["MaSanPham"] ?>"><?php echo $row["TenSanPham"] ?></a>
                                        </h4>
                                        <div class="info-product-price">
                                            <span class="item_price"><?php echo number_format($row["Gia"])?> VNĐ</span>
                                            <!--                                            <del>$69.71</del>-->
                                        </div>
                                        <a href="index.php?c=101&id=<?php echo $row["MaSanPham"]?>" class="item_add single-item hvr-outline-out button2">Mua Hàng</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>