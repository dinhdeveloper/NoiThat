<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];

    $sql = "SELECT TenLoaiSanPham FROM LoaiSanPham WHERE MaLoaiSanPham = $id";

    $result = Database::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);

    if($row == null){
        Database::ChangeURL("index.php?c=404");
    }
} else {
    Database::ChangeURL("index.php?c=404");
}
?>
<div class="container">
    <form class="form-control" action="index.php?c=3&k=301" method="post" enctype="multipart/form-data">
        <h4 style="color: red;border-bottom: 1px solid #0b0b0b;display: inline-block;">Cập Nhật Loại Sản Phẩm Mới</h4>
        <div class="form-group col-md-6">
            <label for="tenloaisanpham"><strong><h6>Tên Loại Sản Phẩm</h6></strong></label>
            <input type="text" value="<?php echo $row["TenLoaiSanPham"]; ?>" name="tenloaisanpham" class="form-control" id="tenloaisanpham"
                   placeholder="Tên loại sản phẩm">
        </div>
        <div class="form-group col-md-6">
            <input type="hidden" value="<?php echo $id; ?>" name="maloaisanpham" class="form-control">
        </div>
        <div class="form-group col-md-4">
            <label for="hinhurl"><strong><h6>Hình Đại Diện Loại Sản Phẩm</h6></strong></label>
            <input type="file" class="form-control-file" id="hinhurl" name="hinhanh">
        </div>
        <br>
        <button type="submit" class="btn btn-primary" name="capnhatloaisanpham">Cập Nhật</button>
        <button type="button" class="btn btn-primary" onclick="location='index.php?c=3';">Hủy</button>
    </form>
</div>
<br>