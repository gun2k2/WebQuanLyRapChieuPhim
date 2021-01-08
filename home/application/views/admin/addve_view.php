<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thêm vé</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css1/banve_add.css">
	<script src="<?php echo base_url(); ?>bootstrap1/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js1/app.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css1/add_ve.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts1/fontawesome/css/all.min.css">
	<style>
		ul, li{list-style: none;}

		.menu ul li a.selected {
		    color: #fe346e;
		}

		.menu ul li a:hover {
		    color: #fe346e;
		    text-decoration: none;
		}

		a.btn_red {
		    background-color: #fe346e;
		    color: #ffffff;
		}
	</style>

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
					<li><a class="selected" href="<?php echo base_url(); ?>admin/quanlyve_controller"><i class="fas fa-ticket-alt"></i>Quản lý vé</a></li>
					<li><a href="<?php echo base_url(); ?>admin/home_controller"><i class="fas fa-male"></i>Quản lý admin</a></li>
					<li>
					<a href="<?php echo base_url(); ?>admin/quanlyuser_controller"><i class="fas fa-user-friends"></i>Quản lý user</a>
					</li>
					<li><a href="<?php echo base_url(); ?>admin/quanlyphim_controller"><i class="fas fa-film"></i>Quản lý phim</a></li>
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
						<h5><small>Quản lý bán vé</small></h5>
					</div>
					<div class="col-9">
						<ul>
							<li><a href=""><i class="fas fa-plus"></i>Thêm mới</a></li>
							<li><a href="<?php echo base_url(); ?>admin/quanlyve_controller"><i class="fas fa-list"></i>Danh sách</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- end top -->
			<!-- wrapper -->
			<div class="wrapper mt-5">
				<div class="row">
					<div class="col-12 text-center">
						<h5>Thêm mới</h5>
					</div>
				</div>
				
				<!-- form -->
				<form id="form" class="form" action="" method="post"  enctype="multidata/form-data">

				<div class="tab-content">
					<div id="home" class="container tab-pane active"><br>
<!-- Dòng cần thiết để chuyển số thành chữ -->
						<?php 
							$CI =& get_instance(); 
							$CI->load->model('admin/showphim_model'); 
							$CI->load->model('admin/showphong_model');
							$CI->load->model('admin/showlichchieu_model');
						?> 
<!--END Dòng cần thiết để chuyển số thành chữ -->

						<?php $mang_phim =  $CI->showlichchieu_model->getmang_tenphim(); ?>
				<?php foreach ($mangphim as  $phim) :?>
					<?php 
						$mang_ngaychieu = $CI->showlichchieu_model->getmang_lichchieu($phim, 'ngaychieu');
						$mang_phong = $CI->showlichchieu_model->getmang_lichchieu($phim, 'phong');
						$mang_cachieu = $CI->showlichchieu_model->getmang_lichchieu($phim, 'thoigian'); //$value['id'] ở đây là id của tên phim

						$mang_idlichchieu = $CI->showlichchieu_model->getmang_lichchieu($phim, 'id');
					 ?>
					<div class="tab-content">
							<div id="home" class="container tab-pane active"><br>
								<div class="lich mb-4">
									<div class="chitietlich">
										<ul style="display: flex; flex-wrap: wrap;">
											<?php foreach ($mang_ngaychieu as $ngay): ?>
												<?php if(date('yy-m-d') <= $ngay): ?>
													<li style="list-style: none;">
													<?php if($CI->showlichchieu_model->checkexist($phim, $ngay)) : ?>
														<div class="card text-center">
															<div style="padding: 10px;" class="card-body">
																<p style="margin-bottom: 0px; font-weight: 600; color: #fe346e;" class="card-title"><?=$CI->showphim_model->ktdanhmuc($phim) ?></p>
																<p style="margin-bottom: 0px;" class="card-text"><small>Ngày: </small><?php echo $ngay; ?></p>	
																<?php foreach ($mang_phong as $phong): ?>
																	<?php if($CI->showlichchieu_model->checkexist($phim,$ngay, $phong)) : ?>
																		<p style="margin-bottom: 0px;" class="card-text"><small>Phòng: </small><?= $CI->showphong_model->ktdanhmuc($phong); ?></p>
																				<?php foreach ($mang_cachieu as $gio):?>
																					<?php foreach ($mang_idlichchieu as $id):?>
																						<?php if($CI->showlichchieu_model->checkexist($phim,$ngay, $phong, $gio, $id)) : ?>
																							<p style="margin-bottom: 0px;" class="card-text"><small>Giờ: </small><?=$gio ?></p>
																							<a class="btn btn_red" href="http://localhost/home/admin/quanlyve_controller/chonghe/<?=$id?>">Đặt vé</a>
																						<?php endif ?>

																					<?php endforeach ?>	
																				<?php endforeach ?>
																	<?php endif ?>
																<?php endforeach  ?>
															</div>
														</div>										
			<!-- Kết thúc chi tiết lịch chiếu <-->	<?php endif ?>
													</li>
												<?php endif ?>	
											<?php endforeach  ?>
										</ul>	
									</div>
								</div>
							</div>
						<?php endforeach  ?>
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