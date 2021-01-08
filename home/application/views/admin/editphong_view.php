<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit phòng</title>
	<script src="<?php echo base_url(); ?>bootstrap1/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js1/app.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css1/edit_phong.css">
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
					<li><a href="<?php echo base_url(); ?>admin/quanlyphim_controller"><i class="fas fa-film"></i>Quản lý phim</a></li>
					<li><a href="<?php echo base_url(); ?>admin/quanlylichchieu_controller"><i class="fas fa-calendar-alt"></i>Quản lý lịch chiếu</a></li>
					<li><a href="<?php echo base_url(); ?>admin/quanlyphong_controller"><i class="fas fa-igloo"></i>Quản lý phòng</a></li>
					<li><a  href="<?php echo base_url(); ?>admin/quanlyvoucher_controller"><i class="fas fa-sort-amount-down"></i>Quản lý voucher</a></li>
					
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
						<h5><small>Quản lý phòng chiếu</small></h5>
					</div>
					<div class="col-9">
						<ul>
							<li><a href="<?php echo base_url(); ?>admin/quanlyphong_controller/add"><i class="fas fa-plus"></i>Thêm mới</a></li>
							<li><a href="<?php echo base_url(); ?>admin/quanlyphong_controller"><i class="fas fa-list"></i>Danh sách</a></li>
						</ul>
					</div>
				</div>
			</div>
			
			<!-- wrapper -->
			<div class="wrapper mt-5">
				<div class="row">

					<div class="col-12 text-center">
						<h5>EDIT Phòng Chiếu</h5>
					</div>
				</div>
			<div style="color: red; font-weight: bold; text-align: center;">  <?=$this->session->flashdata('message'); ?>
			</div>
				<!-- form -->
				
				<form action="../updateDulieu" method="post"  enctype="multidata/form-data">
					<div class="form-row">
						<div class="col">
							<input name="id"  type="hidden" class="form-control" value="<?= $phong->id ?>">
						</div>
						
					</div> <!-- end form-row -->


			

				  <div class="form-group row justify-content-center">
				    <label for="phong" class="col-sm-2 col-form-label">Tên Phòng:</label>
				    <div class="col-sm-4">
				      <input type="text" name="phong" class="form-control" id="phong" placeholder="Tên phòng..." value="<?= $phong->data?>">
				      <div class="error" name="name_error"><?php echo form_error('phong')?></div>
				    </div>
				  </div>
	
				  <div class="form-group row justify-content-center">
				    <div class="col-sm-4">
				      <button type="submit" class="btn btn_red btn-sm">Lưu</button>

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
	<!-- end main -->

	<
</body>
</html>