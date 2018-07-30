<style>
	body {
		background: #F1F3FA;
	}
	
	.profile {
		margin: 20px 0;
	}
	
	.profile-sidebar {
		padding: 20px 0 10px 0;
		background: #fff;
	}
	
	.profile-userpic img {
		float: none;
		margin: 0 auto;
		width: 50%;
		height: 50%;
		-webkit-border-radius: 50% !important;
		-moz-border-radius: 50% !important;
		border-radius: 50% !important;
	}
	
	.profile-usertitle {
		text-align: center;
		margin-top: 20px;
	}
	
	.profile-usertitle-name {
		color: #5a7391;
		font-size: 16px;
		font-weight: 600;
		margin-bottom: 7px;
	}
	
	.profile-usertitle-job {
		text-transform: uppercase;
		color: #5b9bd1;
		font-size: 12px;
		font-weight: 600;
		margin-bottom: 15px;
	}
	
	.profile-userbuttons {
		text-align: center;
		margin-top: 10px;
	}
	
	.profile-userbuttons .btn {
		text-transform: uppercase;
		font-size: 11px;
		font-weight: 600;
		padding: 6px 15px;
		margin-right: 5px;
	}
	
	.profile-userbuttons .btn:last-child {
		margin-right: 0px;
	}
	.profile-userbuttons a:hover{
		color: red;
		text-decoration: none;
	}
</style>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
	  integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<body>
<div class="container">
	<div class="container">
		<div class="row profile">
			<div class="col-md-3">
			</div>
			<div class="col-md-6">
                <div class="profile-sidebar">
					<div class="profile-userpic" style="margin-left: 170px">
						<img src="modules/logo/<?php echo $_SESSION["SHinh"]; ?>" alt="">
					</div>
					<div class="profile-usertitle">
						<div class="profile-usertitle-name"><h4><strong><?php echo $_SESSION['SHoTen']; ?></strong></h4></div>
						<div class="profile-usertitle-name">Mã Nhân Viên: <?php echo $_SESSION['SMaNhanVien']; ?></div>
						<div class="profile-usertitle-name">Tên Đăng Nhập: <?php echo $_SESSION['Stendangnhap']; ?></div>
						<div class="profile-usertitle-name"><?php echo $_SESSION['SEmail']; ?></div>
						<div class="profile-usertitle-name"><?php echo $_SESSION['SSodienthoai']; ?></div>
					</div>
					<div class="profile-userbuttons">
						<a href="index.php?c=2&k=4"><strong>Cập Nhật</strong></a>&nbsp;&nbsp;
						<a href="../../../../NoiThat/Admin/Login/dangxuat.php"><strong>Đăng xuất</strong></a>
					</div>
				</div>
			</div>
			<div class="col-md-3">
			</div>
		</div>
	</div>
</div>
</body>