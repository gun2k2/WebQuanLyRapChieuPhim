<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit lịch chiếu</title>
	<script src="<?php echo base_url(); ?>bootstrap1/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js1/app.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css1/edit_lichchieu.css">
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
					<li><a class="selected" href="<?php echo base_url(); ?>admin/quanlylichchieu_controller"><i class="fas fa-calendar-alt"></i>Quản lý lịch chiếu</a></li>
					<li><a href="<?php echo base_url(); ?>admin/quanlyphong_controller"><i class="fas fa-igloo"></i>Quản lý phòng</a></li>
					<li><a  href="<?php echo base_url(); ?>admin/quanlyvoucher_controller"><i class="fas fa-sort-amount-down"></i>Quản lý voucher</a></li>
				
				</ul>
			</div>
		</div>
		<!-- end left -->

		<!-- right -->
		  
		<?php foreach ($mangketqua as $value):  ?>
		<div class="right clearfix">
			
			<!-- top -->
			<div class="top">
				<div class="row">
					<div class="col-3">
						<h5>Quản trị viên</h5>
						<h5><small>Quản lý bán vé</small></h5>
					</div>
					<div class="col-9">
						<ul>
							<li><a href="<?php echo base_url(); ?>admin/quanlylichchieu_controller/add"><i class="fas fa-plus"></i>Thêm mới</a></li>
							<li><a href="<?php echo base_url(); ?>admin/quanlylichchieu_controller"><i class="fas fa-list"></i>Danh sách</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- end top -->

			<!-- wrapper -->
			<div class="wrapper mt-5">
				<div class="row">

					<div class="col-12 text-center">
						<h5>EDIT lịch chiếu</h5>
					</div>
				</div>
		<div style="color: red; font-weight: bold; text-align: center;">  <?=$this->session->flashdata('message'); ?>
			</div>
				<!-- form -->
				<form action="http://localhost/home/admin/quanlylichchieu_controller/updateDulieu" method="post"  enctype="multidata/form-data">
					<div class="form-row">
							<input name="id"  type="hidden" class="form-control"  value="<?= $value['id'] ?>">
						
						
					</div> <!-- end form-row -->

			
				<div class="form-group row justify-content-center">
					    <label class="col-sm-2 col-form-label" for="tenPhim">Phim</label>

						      <select class="ml-3 custom-select mr-sm-2 col-sm-4" name="tenphim" id="tenPhim" value="<?php echo set_value('tenphim')?>" required="" >
								<option selected value="">Chọn phim</option>
								<?php foreach ($mangphim as $key => $value): ?>
									
									<option value="<?=$value['id']; ?>"><?=$value['tenphim']; ?> </option>
								
								<?php endforeach ?>

						      </select>
					    
					  </div>
	<!-- Chọn phòng -->
					  <div class="form-group row justify-content-center">
				    	<label class="col-sm-2 col-form-label" for="tenRap">Phòng</label>
					    
					      <select class="ml-3 custom-select mr-sm-2 col-sm-4" name="phong" id="tenPhong" value="<?php echo set_value('phong')?>" required="">
					        
					        <option selected value="">Chọn phòng</option>
							<?php foreach ($mangphong as $key => $value): ?>
								
								<option value="<?=$value['id']; ?>"><?=$value['phong']; ?> </option>
							
							<?php endforeach ?>
					      </select>
					    	
					    
					  	</div>

	<!-- Chọn ngày --><?php foreach ($mangketqua as $value):  ?>
					  <div class="form-group row justify-content-center">
					    <label for="ngayChieu" class="col-sm-2 ml-5 col-form-label">Ngày chiếu</label>
					    <div class="col-sm-5">
					      <input type="date" name="ngaychieu" class="ml-3 form-control" id="ngayChieu" placeholder="Ngày chiếu" value="<?= $value['ngaychieu'] ?>" required="">
					     
					    </div>
					  </div>
					  <?php endforeach ?>
	<!-- Chọn giờ -->
						  


					<div class="form-group row justify-content-center">
					    <label for="thoiGian" class="col-sm-2 col-form-label ml-5">Giờ chiếu</label>
					    <div class="col-sm-5">
							<select class="ml-5 custom-select mr-sm-2 col-sm-5" name="thoigian" id="thoiGian" value="<?=$value['thoigian'] ?>" >
					        
					        <option selected value="">Chọn giờ</option>
								
									
							<option value="09:00">09:00</option>
							<option value="13:00">11:00</option>
							<option value="17:00">13:40</option>
							<option value="17:00">15:00</option>
							<option value="17:00">17:00</option>
							<option value="17:00">18:30</option>
							<option value="17:00">20:00</option>
							<option value="17:00">21:45</option>

								
								
					      	</select>
					      	 <div class="error" name="name_error"><?php echo form_error('thoigian')?></div>
					      	
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
			<?php endforeach ?>

		<!-- end right -->
	</div>
	<!-- end main -->

	
</body>
</html>