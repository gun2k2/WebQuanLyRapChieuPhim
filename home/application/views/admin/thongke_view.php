<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thống kê</title>
	<script src="<?php echo base_url(); ?>bootstrap1/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js1/app.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css1/thongke.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts1/fontawesome/css/all.min.css">
	<style> 
		

		input[type=text] {
		  width: 130px;
		  box-sizing: border-box;
		  border: 2px solid #ccc;
		  border-radius: 4px;
		  font-size: 16px;
		  background-color: white;
		  background-position: 10px 10px; 
		  background-repeat: no-repeat;
		  padding: 12px 20px 12px 40px;
		  -webkit-transition: width 0.4s ease-in-out;
		  transition: width 0.4s ease-in-out;
		}

		input[type=text]:focus {
		  width: 100%;
		}
		tr td a:hover{
			text-decoration: none;
		}
	</style>
</head>

<body>
 
	<!-- header -->
	<div id="header">
		<nav class="navbar navbar-dark bg-dark nav_turquoise">
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


					<li><a class="selected" href="<?php echo base_url(); ?>admin/thongke_controller"><i class="fas fa-chart-area"></i>Thống kê</a></li>
					<li><a href="<?php echo base_url(); ?>admin/quanlyve_controller"><i class="fas fa-ticket-alt"></i>Quản lý vé</a></li>
					<li><a href="<?php echo base_url(); ?>admin/home_controller"><i class="fas fa-male"></i>Quản lý admin</a></li>
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
		<div class="right clearfix">
			
			<!-- top -->
			<div class="top">
				<div class="row">
					<div class="col-3">
						<h5>Quản trị viên</h5>
						<h5><small>Thống kê</small></h5>
					</div>
					<div class="col-9">
						<ul>
							<li><a href=""><i class="fas fa-plus"></i>Thêm mới</a></li>
							<li><a href="<?php echo base_url()?>admin/thongke_controller"><i class="fas fa-list"></i>Danh sách</a></li>
							
						</ul>
					</div>
				</div>
			</div>

			<div class="wrapper mt-5">
				
				<center>
		
		<h5 class="mb-3">Thống kê bán vé</h5>
		<br>
		<form action="http://localhost/home/admin/thongke_controller/thongke" method="POST" class="mb-3">
			<div class="row justify-content-center">
				<div class="col-3">
					<label>Từ ngày:</label>
					<input type="date" name="ngaybatdau">
				</div>
				<div class="col-3">
					<label>Đến ngày:</label>
					<input type="date" name="ngayketthuc">
				</div>
				<div class="col-3">
					<label>Phim:</label>
					<input style="width: 200px; height: 40px;" placeholder="Tìm theo phim" type="text" name="tenphim">
				</div>

				<div class="col-3">
					<input class="btn btn-sm btn_red" type="submit" value="Xem thống kê">
				</div>
				
			</div>
			
		</form>
		<br>
		
		<table>
			<!-- thead -->
			<thead >
				<tr class="text-center">
					
					<td style="width: 5%;">STT</td>
					<td style="width: 20%;">Phim</td>
					<td style="width: 10%;">Số lượng vé đã bán</td>
					<td style="width: 10%;">Doanh thu</td>
					
				</tr>

			</thead>
			<!-- end thead -->
			<!-- tbody -->
			<tbody>
<!-- Dòng cần thiết để chuyển số thành chữ -->
					<?php $CI =& get_instance(); 
						$CI->load->model('admin/showphim_model'); 
						$CI->load->model('admin/showphong_model'); 
						$CI->load->model('admin/showlichchieu_model');
					?> 
<!--END Dòng cần thiết để chuyển số thành chữ -->					
				<?php $tongcong = 0; $i =1?>

				<?php foreach ($mangphim as  $phim ) : ?>
				<!-- table row -->
				<tr class="text-center">
					<td style="width: 5%;"><?=$i?></td>
					<td style="width: 20%;"><a style="color: black;" href="http://localhost/home/admin/thongke_controller/thongke/<?=$phim ?>"><?= $CI->showphim_model->ktdanhmuc($phim)  ?></a></td>
					<td style="width: 10%;"><?=$mangsoluong[$i] ?></td>
					<td style="width: 10%;"><?=number_format($mangtongcong[$i]) ?></td>
				
				</tr>
				<?php  $tongcong = $tongcong + $mangtongcong[$i] ; $i++?>
				<!-- end table row -->
				<?php endforeach ?>

				
			</tbody>
			<!-- end tbody -->
			<!-- tfoot -->
			<tfoot >
				<tr>
					
					<td style="width: 5%;"></td>
					<td style="width: 10%;"></td>
					<td style="width: 10%;"></td>
					
					<td style="width: 10%;font-weight: bold; text-align: center;">Tổng cộng: <?=number_format($tongcong)?></td>
				</tr>
			</tfoot>
			<!-- end tfoot -->
		</table>
	</center>

			</div>

		</div>
		<!-- end right -->


	</div>
	<!-- end main -->

	
</body>
</html>