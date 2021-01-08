<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thêm phim</title>
	<script src="<?php echo base_url(); ?>bootstrap1/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js1/app.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css1/add_phim.css">
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
					<li><a class="selected" href="<?php echo base_url(); ?>admin/quanlyphim_controller"><i class="fas fa-film"></i>Quản lý phim</a></li>
					<li><a href="<?php echo base_url(); ?>admin/quanlylichchieu_controller"><i class="fas fa-calendar-alt"></i>Quản lý lịch chiếu</a></li>
					<li><a href="<?php echo base_url(); ?>admin/quanlyphong_controller"><i class="fas fa-igloo"></i>Quản lý phòng</a></li>
					<li><a href="<?php echo base_url(); ?>admin/quanlyvoucher_controller"><i class="fas fa-sort-amount-down"></i>Quản lý voucher</a></li>
					
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
						<h5><small>Quản lý phim</small></h5>
					</div>
					<div class="col-9">
						<ul>
							<li><a href=""><i class="fas fa-plus"></i>Thêm mới</a></li>
							<li><a href="<?php echo base_url(); ?>admin/quanlyphim_controller"><i class="fas fa-list"></i>Danh sách</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- end top -->
			<!-- wrapper -->
			<div class="wrapper mt-5">
				<div class="row">
					<div class="col-12 text-center">
						<h5>Thêm mới phim</h5>
					</div>
				</div>

				<!-- form -->
				<form id="form" class="form mt-4" action="<?php echo base_url() ?>admin/quanlyphim_controller/add" method="post"  enctype="multipart/form-data">
				  <div class="form-group row justify-content-center">
				    <label for="tenPhim" class="col-sm-2 col-form-label">Tên phim</label>
				    <div class="col-sm-5">
				      <input type="text" name="tenphim" class="form-control" id="tenPhim" placeholder="Tên phim" value="<?php echo set_value('tenphim')?>">
				      <div class="error" name="name_error"><?php echo form_error('tenphim')?></div>
				    </div>
				  </div>

				  <div class="form-group row justify-content-center">
				    <label for="tenTiengAnh" class="col-sm-2 col-form-label">Tên tiếng anh</label>
				    <div class="col-sm-5">
				      <input type="text" name="tentienganh" class="form-control" id="tenTiengAnh" placeholder="Tên tiếng anh" value="<?php echo set_value('tentienganh')?>">
				      <div class="error" name="name_error"><?php echo form_error('tentienganh')?></div>
				    </div>
				  </div>

				  <div class="form-group row justify-content-center">
				    <label for="anh" class="col-sm-2 col-form-label">Ảnh</label>
				    <div class="col-sm-5">
				      <input type="file" name="image" class="form-control" id="anh" placeholder="Image" value="<?php echo set_value('image')?>">
				    </div>
				  </div>

				  <div class="form-group row justify-content-center">
				    <label for="NSX" class="col-sm-2 col-form-label">Nhà sản xuất</label>
				    <div class="col-sm-5">
				      <input type="text" name="nsx" class="form-control" id="NSX" placeholder="Nhà sản xuất" value="<?php echo set_value('nsx')?>">
				     
				    </div>
				  </div>
				  
				  <div class="form-group row justify-content-center">
				    <label for="theLoai" class="col-sm-2 col-form-label">Thể loại</label>
				    <div class="col-sm-5">
				      <input type="text" name="theloai" class="form-control" id="theLoai" placeholder="Thể loại" value="<?php echo set_value('theloai')?>">
				    
				    </div>
				  </div>


				  <div class="form-group row justify-content-center">
				    <label for="quocGia" class="col-sm-2 col-form-label">Quốc gia</label>
				    <div class="col-sm-5">
				      <input type="text" name="quocgia" class="form-control" id="quocGia" placeholder="Quốc gia" value="<?php echo set_value('quocgia')?>">
				      
				    </div>
				  </div>



				  <div class="form-group row justify-content-center">
				    <label for="daoDien" class="col-sm-2 col-form-label">Đạo diễn</label>
				    <div class="col-sm-5">
				      <input type="text" name="daodien" class="form-control" id="daoDien" value="<?php echo set_value('daodien')?>" placeholder="Đạo diễn">
				    
				    </div>
				  </div>

				   <div class="form-group row justify-content-center">
				    <label for="dienVien" class="col-sm-2 col-form-label">Diễn viên</label>
				    <div class="col-sm-5">
				      <input type="text" name="dienvien" class="form-control" id="dienVien" value="<?php echo set_value('dienvien')?>" placeholder="Diễn viên">
				      
				    </div>
				  </div>


				   <div class="form-group row justify-content-center">
				    <label for="thoiLuong" class="col-sm-2 col-form-label">Thời lượng</label>
				    <div class="col-sm-5">
				      <input type="text" name="thoiluong" class="form-control" id="thoiLuong" value="<?php echo set_value('thoiluong')?>" placeholder="Thời lượng">
				      
				    </div>
				  </div>


				  <div class="form-group row justify-content-center">
				    <label for="ngayKhoiChieu" class="col-sm-2 col-form-label">Ngày khởi chiếu</label>
				    <div class="col-sm-5">
				      <input type="date" name="ngaykhoichieu" class="form-control" id="ngayKhoiChieu" value="<?php echo set_value('ngaykhoichieu')?>" placeholder="Ngày khởi chiếu">
				      
				    </div>
				  </div>

				   <div class="form-group row justify-content-center">
				    <label for="ngayKetthuc" class="col-sm-2 col-form-label">Ngày kết thúc</label>
				    <div class="col-sm-5">
				      <input type="date" name="ngayketthuc" class="form-control" id="ngayKetthuc" value="<?php echo set_value('ngayketthuc')?>" placeholder="Ngày kết thúc">
				      
				    </div>
				  </div>

				  <div class="form-group row justify-content-center">
				    <label for="traiLer" class="col-sm-2 col-form-label">Trailer</label>
				    <div class="col-sm-5">
				      <input type="text" name="trailer" class="form-control" id="traiLer" value="<?php echo set_value('trailer')?>" placeholder="Link">
				      
				    </div>
				  </div>


				  <div class="form-group row justify-content-center">
				    <label for="noiDung" class="col-sm-2 col-form-label">Nội dung</label>
				    <div class="col-sm-5">
				      <input type="text" name="noidung" class="form-control" id="noiDung" value="<?php echo set_value('noidung')?>" placeholder="Nội dung">
				      
				    </div>
				  </div>

				  
				  <div class="form-group row justify-content-center">
				    <div class="col-sm-10">
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
	<!-- end main -->


</body>
</html>