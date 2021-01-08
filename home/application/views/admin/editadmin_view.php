<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit admin</title>
	<script src="<?php echo base_url(); ?>bootstrap1/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js1/app.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css1/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts1/fontawesome/css/all.min.css">
</head>

<style>
	.top .col-3 h5 {
	    color: #fe346e;
	}

	.top .col-9 ul li a {
	    color: #fe346e;
	}


	.wrapper h5 {
	    color: #fe346e;
	    font-size: 48px;
	}

	#header .nav_turquoise {
	    background-color: #009879 !important;
	}

	.menu ul li a:hover {
	    color: #fe346e;
	    text-decoration: none;
	}

	.menu ul li a.selected {
	    color: #fe346e;
	}
</style>
<body> 

	<!-- header -->
	<div id="header">
		<nav class="navbar navbar-dark nav_turquoise">
			<a class="navbar-brand header_logo" href="https://www.facebook.com/phuongnenenha">Xin chào admin</a>
			<ul class="nav ">
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo base_url(); ?>admin/thongke_controller"><i class="fas fa-home"></i>Trang chủ <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>admin/home_controller/logout"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
				</li>
			</ul>
		</nav>
	</div> 
	<!-- end header -->
	
	<!-- main -->
	<div id="main">
		<!-- left -->
		<div class="left">
			<div class="left-top">
				<h5><i class="fas fa-user"></i>Xin chào admin</h5>
			</div>
			<div class="menu">
				<ul>
					<li><a href="<?php echo base_url(); ?>admin/thongke_controller"><i class="fas fa-chart-area"></i>Thống kê</a></li>
					<li><a href="<?php echo base_url(); ?>admin/quanlyve_controller"><i class="fas fa-ticket-alt"></i>Quản lý vé</a></li>
					<li><a class="selected" href="<?php echo base_url(); ?>admin/home_controller"><i class="fas fa-male"></i>Quản lý admin</a></li>
					<li>
					<a href="<?php echo base_url(); ?>admin/quanlyuser_controller"><i class="fas fa-user-friends"></i>Quản lý user</a>
					</li>
					<li><a href="<?php echo base_url(); ?>admin/quanlyphim_controller"><i class="fas fa-film"></i>Quản lý phim</a></li>
					<li><a href="<?php echo base_url(); ?>admin/quanlylichchieu_controller"><i class="fas fa-calendar-alt"></i>Quản lý lịch chiếu</a></li>
					<li><a href="<?php echo base_url(); ?>admin/quanlyphong_controller"><i class="fas fa-igloo"></i>Quản lý phòng</a></li>
					<li><a  href="<?php echo base_url(); ?>admin/quanlyvoucher_controller"><i class="fas fa-sort-amount-down"></i>Quản lý voucher</a></li>
					
				</ul>
			</div>
		</div>
		<!-- end left -->

		<!-- right -->
		<?php foreach ($mangketqua as $key =>  $value): ?>
		<div class="right clearfix">

			<!-- top -->
			<div class="top">
				<div class="row">
					<div class="col-3">
						<h5>Quản trị viên</h5>
						<h5><small>Quản lý admin</small></h5>
					</div>
					<div class="col-9">
						<ul>
							<li><a href="<?php echo base_url()?>admin/home_controller/add"><i class="fas fa-plus"></i>Thêm mới</a></li>
							<li><a href=""><i class="fas fa-list"></i>Danh sách</a></li>
						</ul>
					</div>
				</div>
			</div>
			
			<!-- wrapper -->
			<div class="wrapper mt-5">
				<div class="row">

					<div class="col-12 text-center">
						<h5>EDIT QUẢN TRỊ VIÊN</h5>
					</div>
				</div>
				<div style="color: red; font-weight: bold; text-align: center;">  <?=$this->session->flashdata('message'); ?>
			</div>

				<!-- form -->
	<form action="http://localhost/home/admin/home_controller/updateDulieu" method="post"  enctype="multidata/form-data">
					<div class="form-row">
						<div class="col">
							<label for="">ID</label>
							<input name="id"  type="hidden" class="form-control" placeholder="Nhập id nhân viên" value="<?= $value['id'] ?>">
						</div>
						
					</div> <!-- end form-row -->
				  <div class="form-group row">
				    <label for="param_username" class="col-sm-2 col-form-label">Tên</label>
				    <div class="col-sm-5">
				      <input type="text" autocheck="true" name="name" value="<?= $value['name'] ?>" class="form-control" id="name"  placeholder="Tên nhân viên" required>
				      <div class="error" name="name"><?php echo form_error('name')?></div>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="param_username" class="col-sm-2 col-form-label">Username</label>
				    <div class="col-sm-5">
				      <input type="text" autocheck="true" name="username" value="<?= $value['username'] ?>" class="form-control" id="username"  placeholder="User name" required>
				      <div class="error" name="username"><?php echo form_error('username')?></div>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="param_username" class="col-sm-2 col-form-label">Password</label>
				    <div class="col-sm-5">
				      <input type="password" autocheck="true" name="password" value="<?= $value['password'] ?>" class="form-control" id="PassWord" placeholder="Password" required>
				      <div class="error" name="password"><?php echo form_error('password')  ?></div>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="param_username" class="col-sm-2 col-form-label">rePassword</label>
				    <div class="col-sm-5">
				      <input type="password" autocheck="true" name="re_password" value="<?= $value['password'] ?>" class="form-control" id="rePassWord" placeholder="rePassword" required>
				      <div class="error" name="password"><?php echo form_error('re_password')?></div>
				    </div>
				    <div class="clear"></div>
				  </div>
	
				  <div class="form-group row">
				    <div class="col-sm-10">
				      <button type="submit" class="btn btn-success btn-sm">Lưu</button>

				      <a href=""><i class="fa fa-eye"></i>Làm mới</a>
				    </div>
				  </div>
				</form>
				<!-- end form -->
					
			</div>
			<!-- end wrapper -->
		
		</div>
			<?php endforeach ?>

		<!-- end right -->
	</div>
	<!-- end main -->

	<
</body>
</html>