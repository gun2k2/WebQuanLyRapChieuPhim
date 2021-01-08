<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit vé</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>css1/banve_add.css">
	<script src="<?php echo base_url(); ?>bootstrap1/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js1/app.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css1/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css1/style1.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts1/fontawesome/css/all.min.css">
</head>
<body> 

	<!-- header -->
	<div id="header">
		<nav class="navbar navbar-dark bg-dark">
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
				<h4><i class="fas fa-user"></i>Xin chào admin</h4>
			</div>
			<div class="menu">
				<ul>

					<li><a href="<?php echo base_url(); ?>admin/thongke_controller"><i class="fas fa-chart-area"></i>Thống kê</a></li>
					<li><a href="<?php echo base_url(); ?>admin/quanlyve_controller"><i class="fas fa-couch"></i>Quản lý vé</a></li>
					<li><a href="<?php echo base_url(); ?>admin/home_controller"><i class="fas fa-male"></i>Quản lý admin</a></li>
					<li><a href="<?php echo base_url(); ?>admin/quanlyphim_controller"><i class="fas fa-film"></i>Quản lý phim</a></li>
					<li><a href="<?php echo base_url(); ?>admin/quanlylichchieu_controller"><i class="fas fa-calendar-alt"></i>Quản lý lịch chiếu</a></li>
					<li><a href="<?php echo base_url(); ?>admin/quanlyphong_controller"><i class="fas fa-igloo"></i>Quản lý phòng chiếu</a></li>
					<li><a  href="<?php echo base_url(); ?>admin/quanlyvoucher_controller"><i class="fas fa-sort-amount-down"></i>Quản lý voucher</a></li>
				
				</ul>
			</div>
		</div>
		<!-- end left -->

		<!-- right -->
		<?php foreach ($mangketqua as $key => $value): ?>
		<div class="right clearfix">
			
			<!-- wrapper -->
			<div class="wrapper mt-5">
				<div class="row">

					<div class="col-12 text-center">
						<h5>EDIT Vé</h5>
					</div>
				</div>

				<!-- form -->
				<form action="../updateDulieu" method="post"  enctype="multidata/form-data">


					<div class="form-row">
						<div class="col">
							<label for="">ID</label>
							<input name="id"  type="hidden" class="form-control" placeholder="id vé" value="<?= $value['id'] ?>">
						</div>
						
					</div> <!-- end form-row -->


			

				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label" for="tenPhim">Phim:</label>
				      <select class="ml-3 custom-select mr-sm-2 col-sm-4" name="tenphim" id="tenPhim" value="<?= $value['tenphim'] ?>" >
		<option selected value="X-MEN: PHƯỢNG HOÀNG BÓNG TỐI">X-MEN:PHƯỢNG HOÀNG BÓNG TỐI</option>
		<option value="FAST & FURIOUS: HOBBS & SHAW">FAST & FURIOUS: HOBBS & SHAW</option>
		<option value="CÔNG VIÊN KỲ DIỆU">CÔNG VIÊN KỲ DIỆU</option>
		<option value="YÊU NHẦM BẠN THÂN">YÊU NHẦM BẠN THÂN</option>
		<option value="HAI PHƯỢNG">HAI PHƯỢNG</option>
		<option value="CHỊ MƯỜI BA">CHỊ MƯỜI BA</option>
		<option value="Phi Vụ Triệu Đô">Phi Vụ Triệu Đô</option>
		<option value="Vượt Ngục">Vượt Ngục</option>
				      </select>
				    <div class="error" name="name_error"><?php echo form_error('tenphim')?></div>
				  </div>
					

					<div class="form-group row">
				    <label for="lichChieu" class="col-sm-2 col-form-label">Lịch Chiếu:</label>
				    <div class="col-sm-5">
				      <input type="datetime-local" name="lichchieu" class="form-control" id="lichChieu" placeholder="Lịch chiếu" value="<?= $value['lichchieu'] ?>">
				      <div class="error" name="name_error"><?php echo form_error('lichchieu')?></div>
				    </div>
				  </div>
					
					<div class="form-group row">
				    <label class="col-sm-2 col-form-label" for="phongChieu">Phòng chiếu:</label>
				      <select class="ml-3 custom-select mr-sm-2 col-sm-4" name="phongchieu" id="phongChieu" value="<?= $value['phongchieu'] ?>" >
				        <option selected value="CGV AEON Thủ Đức-P1">CGV AEON Thủ Đức-P1</option>
				        <option value="CGV AEON Thủ Đức-P2">CGV AEON Thủ Đức-P2</option>
				        <option value="CGV AEON Thủ Đức-P3">CGV AEON Thủ Đức-P3</option>
				        <option value="CGV AEON Bình Tân-P1">CGV AEON Bình Tân-P1</option>
				        <option value="CGV AEON Bình Tân-P2">CGV AEON Bình Tân-P2</option>
				        <option value="CGV AEON Bình Tân-P3">CGV AEON Bình Tân-P3</option>
				        <option value="BHD Vincom Lê Văn Việt-P1">BHD Vincom Lê Văn Việt-P1</option>
				        <option value="BHD Vincom Lê Văn Việt-P2">BHD Vincom Lê Văn Việt-P2</option>
				        <option value="BHD Vincom Lê Văn Việt-P3">BHD Vincom Lê Văn Việt-P3</option>
				        <option value="CGV Hùng Vương Plaza-P1">CGV Hùng Vương Plaza-P1</option>
				        <option value="CGV Hùng Vương Plaza-P2">CGV Hùng Vương Plaza-P2</option>
				        <option value="CGV Hùng Vương Plaza-P3">CGV Hùng Vương Plaza-P3</option>
				        <option value="CGV Giga Mall Thủ Đức-P1">CGV Giga Mall Thủ Đức-P1</option>
				        <option value="CGV Giga Mall Thủ Đức-P2">CGV Giga Mall Thủ Đức-P2</option>
				        <option value="CGV Giga Mall Thủ Đức-P3">CGV Giga Mall Thủ Đức-P3</option>
				        <option value="CGV Sư Vạn Hạnh-P1">CGV Sư Vạn Hạnh-P1</option>
				        <option value="CGV Sư Vạn Hạnh-P2">CGV Sư Vạn Hạnh-P2</option>
				        <option value="CGV Sư Vạn Hạnh-P3">CGV Sư Vạn Hạnh-P3</option>
				        <option value="CGV Thảo Điền Pearl-P1">CGV Thảo Điền Pearl-P1</option>
				        <option value="CGV Thảo Điền Pearl-P2">CGV Thảo Điền Pearl-P2</option>
				        <option value="CGV Thảo Điền Pearl-P3">CGV Thảo Điền Pearl-P3</option>
				        <option value="CGV Vincom Gò Vấp-P1">CGV Vincom Gò Vấp-P1</option>
				        <option value="CGV Vincom Gò Vấp-P2">CGV Vincom Gò Vấp-P2</option>
				        <option value="CGV Vincom Gò Vấp-P3">CGV Vincom Gò Vấp-P3</option>
				      </select>
				    	<div class="error" name="name_error"><?php echo form_error('phongchieu')?></div>
				  </div>

				    
					Chọn Ghế
				    <div class="col-9">
				    
							<div class="row ">
								<div class="col-1">
									<p>A</p>
								</div>
								<label class="seat-box" for="maGhe">
									<input type="checkbox" id="1" name="maghe" value="A1" >
									<div class="number-box">
										<p>1</p>
									</div>
								</label>
								<label class="seat-box" for="maGhe">
									<input type="checkbox" id="2" name="maghe" value="A2">
									<div class="number-box">
										<p>2</p>
									</div>
								</label>
								<label class="seat-box" for="maGhe">
									<input type="checkbox" id="3" name="maghe" value="A3">
									<div class="number-box">
										<p>3</p>
									</div>
								</label>
								<label class="seat-box" for="maGhe">
									<input type="checkbox" id="4" name="maghe" value=A4>
									<div class="number-box">
										<p>4</p>
									</div>
								</label>
								<label class="seat-box" for="maGhe">
									<input type="checkbox" id="5" name="maghe" value=A5>
									<div class="number-box">
										<p>5</p>
									</div>
								</label>
								<label class="seat-box" for="maGhe">
									<input type="checkbox" id="6" name="maghe" value=A6>
									<div class="number-box">
										<p>6</p>
									</div>
								</label>
							</div>

							<div class="error" name="name_error"><?php echo form_error('maghe')?></div>
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