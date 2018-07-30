<?php
    session_start();
    include_once ("../../libs/database.php");
    $_SESSION['Stendangnhap']=="";
    session_destroy();
    echo '<script>alert("Bạn đã đăng xuất thành công...")</script>';
    Database::ChangeURL("index.php");
    $_SESSION['action1']="Vui lòng đăng nhập lại";
?>
<script language="javascript">
	document.location="index.php";
</script>
