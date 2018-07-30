<?php
	
	if(isset($_GET['id']) == null){
		header("location:index.php?c=404");
		Database::ChangeURL("index.php?c=404");
	} else {
		$id = $_GET["id"];
		$gioHang = unserialize($_SESSION["GioHang"]);
		$gioHang->Them($id);
		$_SESSION["GioHang"] = serialize($gioHang);
		
		Database::ChangeURL("index.php?c=3");
	}
?>