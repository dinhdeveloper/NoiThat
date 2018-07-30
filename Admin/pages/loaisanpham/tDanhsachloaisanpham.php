<tr>
    <td width="100"><?php echo $maLoaiSanPham; ?></td>
    <td widtd="100"><?php echo "'<img src='images/sanpham/loaisanpham/$hinhAnh' width='80px' height='80px'>'"; ?></td>
    <td widtd="100"><?php echo "'<a href='index.php?c=3&k=4&id=$maLoaiSanPham'>$tenLoaiSanPham</a>'" ?></td>
    <td>
        <?php
        if($biXoa == 0){
            echo "<a href='index.php?c=3&k=402&id=$maLoaiSanPham'><img src='images/icon/active.png' /></a>";
        } else {
            echo "<a href='index.php?c=3&k=402&id=$maLoaiSanPham'><img src='images/icon/locked.png' /></a>";
        }
        ?>
    </td>
    <td>
        <a href="index.php?c=3&k=3&id=<?php echo $maLoaiSanPham; ?>">
            <img src="images/icon/edit.png" />
        </a>
        <a href="index.php?c=3&k=401&id=<?php echo $maLoaiSanPham; ?>" onclick="click()">
            <img src="images/icon/delete.png" />
        </a>
    </td>
</tr>