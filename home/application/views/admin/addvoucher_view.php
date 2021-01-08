<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thêm voucher</title>
	<script src="<?php echo base_url(); ?>bootstrap1/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js1/app.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css1/add_phong.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts1/fontawesome/css/all.min.css">

</head>
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
					<li><a href="<?php echo base_url(); ?>admin/home_controller"><i class="fas fa-male"></i>Quản lý admin</a></li>
					<li>
					<a href="<?php echo base_url(); ?>admin/quanlyuser_controller"><i class="fas fa-user-friends"></i>Quản lý user</a>
					</li>
					<li><a href="<?php echo base_url(); ?>admin/quanlyphim_controller"><i class="fas fa-film"></i>Quản lý phim</a></li>
					<li><a href="<?php echo base_url(); ?>admin/quanlylichchieu_controller"><i class="fas fa-calendar-alt"></i>Quản lý lịch chiếu</a></li>
					<li><a href="<?php echo base_url(); ?>admin/quanlyphong_controller"><i class="fas fa-igloo"></i>Quản lý phòng</a></li>
					<li><a  class="selected" href="<?php echo base_url(); ?>admin/quanlyvoucher_controller"><i class="fas fa-sort-amount-down"></i>Quản lý voucher</a></li>
				</ul>
			</div>
		</div>
		<!-- end left -->

		<!-- right -->
		<div class="right clearfix">
			<!-- top -->
			<div class="top">
				<div class="row">
					<div class="col-3">
						<h5>Quản trị viên</h5>
						<h5><small>Quản lý voucher</small></h5>
					</div>
					<div class="col-9">
						<ul>
							<li><a href=""><i class="fas fa-plus"></i>Thêm mới</a></li>
							<li><a href="<?php echo base_url(); ?>admin/quanlyvoucher_controller"><i class="fas fa-list"></i>Danh sách</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- end top -->
			<!-- wrapper -->
			<div class="wrapper mt-5">
				<div class="row">
					<div class="col-12 text-center">
						<h5>Thêm voucher</h5>
					</div>
				</div>

				<!-- form -->
				<form id="form" class="form" action="<?php echo base_url() ?>admin/quanlyvoucher_controller/add" method="post"  enctype="multidata/form-data">
				   
				   <div class="form-group row justify-content-center">
				    <label for="ma_voucher" class="col-sm-2 col-form-label">Mã voucher:</label>
				    <div class="col-sm-4">
				      <input type="text" name="ma_voucher" class="form-control" id="ma_voucher" placeholder="Mã voucher..." value="<?php echo set_value('ma_voucher')?>">
				      <div class="error" name="name_error"><?php echo form_error('ma_voucher')?></div>
				    </div>
				  </div>

				  <div class="form-group row justify-content-center">
				    <label for="nayHethan" class="col-sm-2 col-form-label">Ngày hết hạn:</label>
				    <div class="col-sm-4">
				      <input type="date" name="ngayhethan" class="form-control" id="nayHethan" placeholder="Mã voucher..." value="<?php echo set_value('ngayhethan')?>">
				      <div class="error" name="name_error"><?php echo form_error('ngayhethan')?></div>
				    </div>
				  </div>


				  <div class="form-group row justify-content-center">
				    <label for="percent" class="col-sm-2 col-form-label">% giảm:</label>
				    <div class="col-sm-4">
				      <input type="text" name="percent" class="form-control" id="percent" placeholder="% giảm..." value="<?php echo set_value('percent')?>">
				      <div class="error" name="name_error"><?php echo form_error('percent')?></div>
				    </div>
				  </div>

				  <div class="form-group row justify-content-center">
				    <div class="col-sm-4">
				      <button type="submit" class="btn btn_red btn-sm">Thêm mới</button>
				      <a href=""><i class="fa fa-eye"></i>Làm mới</a>
				    </div>
				  </div>
				</form>
				<!-- end form -->
			</div>
			<!-- end wrapper -->
		</div>
		<!-- end right -->
	</div>

</body>
</html>