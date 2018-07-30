<table>
	<div class="container">
		<form class="form-login" action="index.php?c=2&k=103" method="post" enctype="multipart/form-data">
			<h4 class="form-login-heading" style="color: red"><strong>Cập Nhật Tài Khoản</strong></h4>
			<p style="color:#F00; padding-top:20px;"
			   align="center"></p>
			<div class="login-wrap">
				Họ Và Tên: <input type="text" value="<?php echo $_SESSION['SHoTen']; ?>" name="hovatenmoi"
								  class="form-control" id="fullname" placeholder="Họ Và Tên" autofocus>
				<br>
				<div id="kiemtraname"></div>
				<br>
				Tên Đăng Nhập: <input type="text" value="<?php echo $_SESSION['Stendangnhap']; ?>" name="tendangnhapmoi"
									  class="form-control" id="username" placeholder="Tên Đăng Nhập"
									  autofocus>
				<br>
				<div id="kiemtrauser"></div>
				<br>
				Mật Khẩu:<input type="password" value="<?php //echo $_SESSION['SMatkhau']; ?>" name="matkhaumoi"
								class="form-control" id="password" placeholder="Mật khẩu">
				<br>
				<div id="kiemtrapass"></div>
				<br>
				Email: <input type="email" value="<?php echo $_SESSION['SEmail']; ?>" name="emailmoi"
							  class="form-control" id="email" placeholder="Địa Chỉ Email" required>
				<br>
				<div id="kiemtraemail"></div>
				<br>
				Số Điện Thoại: <input type="number" value="<?php echo $_SESSION['SSodienthoai']; ?>" name="sodienthoaimoi"
									  class="form-control" id="numberphone" placeholder="Số Điện Thoại"
									  required>
				<br>
				<div id="kiemtraphone"></div>
				<br>
				<input type="file" name="hinhanhmoi" id="images" autofocus>
				<br>
				<div id="kiemtraimg"></div>
				<br>
				<button type="submit" class="btn btn-primary" name="capnhat">Cập Nhật
				</button>
			</div>
		</form>
		<br>
	</div>

</table>
