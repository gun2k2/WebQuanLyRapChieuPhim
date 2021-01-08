<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quản lý admin</title>
	<script src="<?php echo base_url(); ?>bootstrap1/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js1/app.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css1/home.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts1/fontawesome/css/all.min.css">
	<style> 

		.menu ul li a:hover {
	   		color: #fe346e;
	   		text-decoration: none;
		}
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
							<li><a href="<?php base_url()?>home_controller/add"><i class="fas fa-plus"></i>Thêm mới</a></li>
							<li><a href=""><i class="fas fa-list"></i>Danh sách</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="wrapper mt-5">
				<?php $this->load->view('admin/message_view', $this->data); ?>
				<div class="row">
					<div class="col-12 text-center">
						<h5>Danh sách admin</h5>
					</div>
				</div>
				<!-- table -->

				<table >

					 <form  class="form-inline" role="form" action="<?php echo base_url('admin/home_controller/search'); ?>" method="post">
					   <div class="form-group">
					    <div class="row justify-content-center">
					      	<div class="col-4">
					      		<label>Tên phim:</label>
					      		<input style="width: 200px; height: 40px;" type="text"  name="name"	 placeholder="Nhập tên cần tìm...">
					      	</div>
					      	<div class="col-4">
								<button type="submit" class="btn btn-sm btn_red" name="submit">Tìm kiếm</button>
					      	</div>
					    </div>

					  </div>

					   
					</form> 	 
					

					<!-- thead -->

					<thead >
		
						<tr class="text-center">
							
						
		
							
							
							<td style="width: 10%;">Id</td>
							<td style="width: 10%;">Name</td>
							<td style="width: 20%;">username</td>
							<td style="width: 10%;">password</td>
							<td style="width: 10%;">Action</td>
						</tr>
					</thead>
					<!-- end thead -->
					<!-- tbody -->
		 			<tbody>

						<?php  foreach ($dulieutucontroller as $key => $value): ?>
						<!-- table row -->
						<tr class="text-center">
						
							<td style="width: 10%;"><?= $value['id'] ?></td>
							<td style="width: 10%;"><?= $value['name'] ?></td>
							<td style="width: 20%;"><?= $value['username'] ?></td>
							<td style="width: 10%;"><?= $value['password'] ?></td>
							<td class="option">
								
								<a href="home_controller/editData/<?= $value['id'] ?>" ><i class="fas fa-wrench fix"></i></a>

								<a id="<?php echo $value['id'] ?>" href="" ><i class="fas fa-user-times remove verify_action"></i></a>
							</td>
						</tr>
						<!-- end table row -->
						<?php endforeach ?>
					

	           
					</tbody>
					<!-- end tbody -->
					<!-- tfoot -->
					<tfoot class="text-center">
						<tr >
					
							<td >
							<a href="<?php base_url()?>home_controller/sapxep" class="btn btn_red btn-sm"><i class="fas fa-arrows-alt-v"></i></a>
							</td>
			
						</tr>


					</tfoot>
					<!-- end tfoot -->
				</table>
				<!-- end table -->
			</div>
			<!-- end top -->
			<!-- wrapper -->

			<!-- end wrapper -->
		</div>
		<!-- end right -->
	</div>
	<!-- end main -->
	
	<script>
		$(document).ready(function() {
			$('.remove').click(function(event) {
				var id = $(this).attr("id");
				if(confirm("Bạn có muốn xóa mục này ?")){
					window.location = "home_controller/deleteData/<?= $value['id'] ?>";
				}else{
						return false;
				}
			});
		});
	</script>
	 
</body>
</html>