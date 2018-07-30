<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];

    $sql = "SELECT TenSanPham, MaLoaiSanPham, Gia, MoTa, HinhURL,HuongDanSuDung FROM SanPham WHERE MaSanPham = $id";

    $result = Database::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);

    if($row == null){
        Database::ChangeURL("index.php?c=404");
    }
    $tenSanPham = $row["TenSanPham"];
    $maLoaiSanPham_goc = $row["MaLoaiSanPham"];
    $gia = $row["Gia"];
    $moTa = $row["MoTa"];
    $hinhURL = $row["HinhURL"];
    $hdsd = $row['HuongDanSuDung'];
} else {
    Database::ChangeURL("index.php?c=404");
}
?>
<div class="container">
    <form class="form-control" action="index.php?c=4&k=301" method="post" enctype="multipart/form-data">
        <h4 style="color: red;border-bottom: 1px solid #0b0b0b;display: inline-block;">Cập Nhật Sản Phẩm</h4>
        <input type="hidden" name="masanpham" value="<?php echo $id; ?>" />
        <div class="form-group col-md-6">
            <label for="tensanpham"><strong><h6>Tên Sản Phẩm</h6></strong></label>
            <input type="text" value="<?php echo $tenSanPham ?>" name="tensanpham" class="form-control" id="tensanpham" placeholder="Tên sản phẩm">
        </div>
        <div class="form-group col-md-6">
            <label for="maloaisanpham"><strong><h6>Loại Sản Phẩm</h6></strong></label>
            <select name="maloaisanpham">
                <?php
                $sql = "SELECT MaLoaiSanPham, TenLoaiSanPham FROM LoaiSanPham WHERE BiXoa = 0";
                $result = Database::ExecuteQuery($sql);
                while($row = mysqli_fetch_array($result)){
                    $maLoaiSanPham = $row["MaLoaiSanPham"];
                    $tenLoaiSanPham = $row["TenLoaiSanPham"];
                    if($maLoaiSanPham == $maLoaiSanPham_goc){
                        echo "<option value='$maLoaiSanPham' selected>$tenLoaiSanPham</option>";
                    } else {
                        echo "<option value='$maLoaiSanPham'>$tenLoaiSanPham</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="gia"><strong><h6>Giá</h6></strong></label>
            <input type="text" name="gia" class="form-control" id="gia" value="<?php echo $gia; ?>"
                   placeholder="Giá">
        </div>
        <div class="form-group col-md-4">
            <label for="ngaynhap"><strong><h6>Ngày Nhập</h6></strong></label>
            <input type="date" class="form-control" id="ngaynhap" name="ngaynhap">
        </div>
        <div class="form-group col-md-4">
            <label for="mota"><strong><h6>Mô tả</h6></strong></label>
            <textarea name="mota" id="mota"><?php echo $moTa; ?></textarea>
<!--            <textarea class="form-control-file" --><?php //echo $moTa; ?><!-- id="mota" rows="3" name="mota" placeholder="Mô Tả Sản Phẩm"></textarea>-->
        </div>
        <div class="form-group">
            <label for="hdsd"><strong><h6>Hướng Dẩn Sử Dụng</h6></strong></label>
            <textarea class="form-control" id="hdsd" rows="3" name="hdsd"><?php echo $hdsd; ?></textarea>
        </div>
        <div class="form-group col-md-4">
            <label for="hinhurl"><strong><h6>Hình Đại Diện Sản Phẩm</h6></strong></label>
            <input type="file" class="form-control-file" id="hinhurl" name="hinhanh">
        </div>
        <br>
        <button type="submit" class="btn btn-primary" name="capnhatsanpham">Cập Nhật</button>
        <button type="button" class="btn btn-primary" onclick="location='index.php?c=4';">Hủy</button>
    </form>
</div>
<br>