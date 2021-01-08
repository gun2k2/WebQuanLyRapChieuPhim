<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit phim</title>
	<script src="<?php echo base_url(); ?>bootstrap1/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js1/app.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css1/edit_phim.css">
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
					<li><a  href="<?php echo base_url(); ?>admin/quanlyvoucher_controller"><i class="fas fa-sort-amount-down"></i>Quản lý voucher</a></li>
					
				</ul>
			</div>
		</div>
		<!-- end left -->

		<!-- right -->
		<?php foreach ($mangketqua as $key => $value): ?>
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
							<li><a href="<?php echo base_url(); ?>admin/quanlyphim_controller/add"><i class="fas fa-plus"></i>Thêm mới</a></li>
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
						<h5>Edit phim</h5>
					</div>
				</div>

				<!-- form -->
				<form id="form" class="form " action="http://localhost/home/admin/quanlyphim_controller/updateDulieu" method="post"  enctype="multipart/form-data">
					<div class="form-row">
						<div class="col">
							<input name="id"  type="hidden" class="form-control"  value="<?= $value['id'] ?>">
						</div>
						
					</div> <!-- end form-row -->
				  <div class="form-group row justify-content-center">
				    <label for="tenPhim" class="col-sm-2 col-form-label">Tên phim</label>
				    <div class="col-sm-5">
				      <input type="text" name="tenphim" class="form-control" id="tenPhim" placeholder="Tên phim" value="<?= $value['tenphim'] ?>">
				      <div class="error" name="name_error"><?php echo form_error('tenphim')?></div>
				    </div>
				  </div>

				  <div class="form-group row justify-content-center">
				    <label for="tenTiengAnh" class="col-sm-2 col-form-label">Tên tiếng anh</label>
				    <div class="col-sm-5">
				      <input type="text" name="tentienganh" class="form-control" id="tenTiengAnh" placeholder="Tên tiếng anh" value="<?= $value['tentienganh'] ?>" required="">
				     
				    </div>
				  </div>

				  <div class="form-group row justify-content-center">
				    <label for="anh" class="col-sm-2 col-form-label">Ảnh</label>
				    <div class="col-sm-5">
				      <input type="file" name="image" class="form-control" id="anh" placeholder="Image" value="<?= $value['image'] ?>" required="">
				    </div>
				  </div>

				  <div class="form-group row justify-content-center">
				    <label for="NSX" class="col-sm-2 col-form-label" >Nhà sản xuất</label>
				    <div class="col-sm-5">
				      <input type="text" name="nsx" class="form-control" id="NSX" placeholder="Nhà sản xuất" value="<?= $value['nsx'] ?>" required="">
				      
				    </div>
				  </div>
				  
				  <div class="form-group row justify-content-center">
				    <label for="theLoai" class="col-sm-2 col-form-label">Thể loại</label>
				    <div class="col-sm-5">
				      <input type="text" name="theloai" class="form-control" id="theLoai" placeholder="Thể loại" value="<?= $value['theloai'] ?>" required="">
				    
				    </div>
				  </div>


				  <div class="form-group row justify-content-center">
				    <label for="quocGia" class="col-sm-2 col-form-label">Quốc gia</label>
				    <div class="col-sm-5">
				      <input type="text" name="quocgia" class="form-control" id="quocGia" placeholder="Quốc gia" value="<?= $value['quocgia'] ?>" required="">
				     
				    </div>
				  </div>



				  <div class="form-group row justify-content-center">
				    <label for="daoDien" class="col-sm-2 col-form-label">Đạo diễn</label>
				    <div class="col-sm-5">
				      <input type="text" name="daodien" class="form-control" id="daoDien" value="<?= $value['daodien'] ?>" placeholder="Đạo diễn" required="">
				     
				    </div>
				  </div>

				   <div class="form-group row justify-content-center">
				    <label for="dienVien" class="col-sm-2 col-form-label">Diễn viên</label>
				    <div class="col-sm-5">
				      <input type="text" name="dienvien" class="form-control" id="dienVien" value="<?= $value['dienvien'] ?>" placeholder="Diễn viên" required="">
				     
				    </div>
				  </div>


				   <div class="form-group row justify-content-center">
				    <label for="thoiLuong" class="col-sm-2 col-form-label">Thời lượng</label>
				    <div class="col-sm-5">
				      <input type="text" name="thoiluong" class="form-control" id="thoiLuong" value="<?= $value['thoiluong'] ?>" placeholder="Thời lượng" required="">
				     
				    </div>
				  </div>


				  <div class="form-group row justify-content-center">
				    <label for="ngayKhoiChieu" class="col-sm-2 col-form-label">Ngày khởi chiếu</label>
				    <div class="col-sm-5">
				      <input type="date" name="ngaykhoichieu" class="form-control" id="ngayKhoiChieu" value="<?= $value['ngaykhoichieu'] ?>" placeholder="Ngày khởi chiếu" required="">
				     
				    </div>
				  </div>

				   <div class="form-group row justify-content-center">
				    <label for="trangThai" class="col-sm-2 col-form-label ml-4">Trạng Thái</label>
				    <select class="ml-4 custom-select mr-sm-2 col-sm-5" name="p_id"  id="trangThai" value="<?= $value['p_id'] ?>" required="">
				        <option selected="" value="2">Đang chiếu</option>
				        <option value="1">Đã chiếu</option>
				        <option value="3">Sắp chiếu</option>
				      </select>
				     
				  </div>

				  <div class="form-group row justify-content-center">
				    <label for="traiLer" class="col-sm-2 col-form-label">Trailer</label>
				    <div class="col-sm-5">
					<input type="text" name="trailer" class="form-control" id="traiLer" value="<?= $value['trailer'] ?>" >
				      
				    </div>
				  </div>


				  <div class="form-group row justify-content-center">
				    <label for="noiDung" class="col-sm-2 col-form-label">Nội dung</label>
				    <div class="col-sm-5">
				      <input type="text" name="noidung" class="form-control" id="noiDung" value="<?= $value['noidung'] ?>" placeholder="Nội dung" required="">
				     
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
			<?php endforeach ?>

		<!-- end right -->
	</div>
	<!-- end main -->

	<
</body>
</html>