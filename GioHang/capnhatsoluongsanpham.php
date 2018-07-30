<?php
	if(isset($_POST["hdMaSanPham"]) == false){
		Database::ChangeURL("index.php?c=404");
	} else {
		$id = $_POST["hdMaSanPham"];
		$soLuong = $_POST["txtSoLuong"];
		$gioHang = unserialize($_SESSION["GioHang"]);
		$gioHang->CapNhat($id, $soLuong);
		$_SESSION["GioHang"] = serialize($gioHang);
		
		Database::ChangeURL("index.php?c=3");
	}
?>