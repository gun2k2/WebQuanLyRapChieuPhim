<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thêm User</title>
	<script src="<?php echo base_url(); ?>bootstrap1/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js1/app.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css1/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts1/fontawesome/css/all.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	

	<style>
		#header .nav_turquoise {
		    background-color: #009879 !important;
		}

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

		button.btn.btn_red{
			color: #ffffff;
   			background-color: #e71a0f;
		}

		.menu ul li a.selected{
			color: #fe346e;
		}

		.menu ul li a:hover{
			color: #fe346e;
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
					<a class="nav-link" href="<?php echo base_url(); ?>home_controller"><i class="fas fa-home"></i>Trang chủ <span class="sr-only">(current)</span></a>



				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>admin/loginadmin_controller"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
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
					<a class="selected" href="<?php echo base_url(); ?>admin/quanlyuser_controller"><i class="fas fa-user-friends"></i>Quản lý user</a>
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
						<h5><small>Quản lý Member</small></h5>
					</div>
					<div class="col-9">
						<ul>
							<li><a href=""><i class="fas fa-plus"></i>Thêm mới</a></li>
							<li><a href="<?php echo base_url(); ?>admin/quanlyuser_controller"><i class="fas fa-list"></i>Danh sách</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- end top -->
			<!-- wrapper -->
			<div class="wrapper mt-5">
				<div class="row">
					<div class="col-12 text-center">
						<h5>Thêm mới Member</h5>
					</div>
				</div>
				<!-- form -->
				<form id="form" class="form" action="" method="post"  enctype="multidata/form-data">

				  <div class="form-group row">
				    <label for="param_username" class="col-sm-2 col-form-label">Tên</label>
				    <div class="col-sm-5">
				      <input type="text" autocheck="true" name="name" value="<?php echo set_value('name')?>" class="form-control" id="tenNhanVien"  placeholder="Tên nhân viên" required="">
				     

				    </div>
				  </div> 

				  <div class="form-group row">
				    <label for="param_username" class="col-sm-2 col-form-label">Email</label>
				    <div class="col-sm-5">
				      <input type="email" autocheck="true" name="email" value="<?php echo set_value('email')?>" class="form-control" id="userName"  placeholder="email...">
				      <div class="error" name="name_error"><?php echo form_error('email')?></div>
				    </div>
				  </div>

				  <div class="form-group row">
				    <label for="param_username" class="col-sm-2 col-form-label">Password</label>
				    <div class="col-sm-5">
				      <input type="password" autocheck="true" name="password" class="form-control" id="PassWord" placeholder="Password">
				      <div class="error" name="name_error"><?php echo form_error('password')  ?></div>
				    </div>
				  </div>

				  <div class="form-group row">
				    <label for="param_username" class="col-sm-2 col-form-label">rePassword</label>
				    <div class="col-sm-5">
				      <input type="password" autocheck="true" name="re_password" class="form-control" id="rePassWord" placeholder="rePassword">
				      <div class="error" name="name_error"><?php echo form_error('re_password')?></div>
				    </div>
				    <div class="clear"></div>
				  </div>

				   <div class="form-group row">
				    <label for="param_ngaysinh" class="col-sm-2 col-form-label">Ngay sinh</label>
				    <div class="col-sm-5">
				      <input type="date" autocheck="true" name="ngaysinh" value="<?php echo set_value('ngaysinh')?>" class="form-control" id="param_ngaysinh"  placeholder="ngaysinh..." required="">
				     
				    </div>
				  </div>

				  <div class="form-group row">
				    <label for="param_gioitinh" class="col-sm-2 col-form-label" required="">Gioi tinh</label>
				    <div class="col-sm-5">

				      	<input type="radio" id="male" name="gioitinh" value="Nam">
						<label for="male">Nam</label>

						<input type="radio" id="female" name="gioitinh" value="Nữ">
						<label for="Nữ">Nữ</label>

						<input type="radio" id="other" name="gioitinh" value="other">
						<label for="other">Other</label>

				     
				    </div>
				  </div>


				    
				  <div class="form-group row">
				    <label for="param_sdt" class="col-sm-2 col-form-label">Số điện thoại</label>
				    <div class="col-sm-5">
				      <input type="tell" autocheck="true" name="sdt" value="<?php echo set_value('sdt')?>" class="form-control" id="param_sdt"  placeholder="sdt..." required="">
				     
				    </div>
				  </div>

				  	 <div class="form-group row">
				    <label for="param_diachi" class="col-sm-2 col-form-label">Địa chỉ</label>
				    <div class="col-sm-5">
				 <input type="text" autocheck="true" name="diachi" value="<?php echo set_value('diachi')?>" class="form-control" id="param_diachi"  placeholder="diachi..." required="">
				     
				    </div>
				  </div>


					<div class="form-group row">
						<label for="" >Tỉnh/ThànhPhố</label>
						<select name="province" id="province" required="">
							<option value="">--Chọn Tỉnh--</option>
							<?php 
							foreach ($mangtinh as $value) {
						echo '<option value="'.$value["province_id"].'">'.$value['name']. '</option>';
							} ?>
						</select>

						<label for="">Quận/Huyện</label>
						<select name="district" id="district" required="">
							<option value="">--Chọn Quận/Huyện--</option>
						
						</select>

						<label for="">Xã/Phường</label>
						<select name="ward" id="ward" >
							<option value="">--Xã/Phường--</option>
							
						</select>



					 </div>

					
				  <div class="form-group row">
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

		<script>
			
		$(document).ready(function(){

			$('#province').change(function(event){
			var	province_id = $('#province') .val();
			if (province_id != '') 
			{
				$.ajax({
					url:"<?php echo base_url(); ?>admin/quanlyuser_controller/district",
					method: "POST",
					data: {province_id:province_id},
					success:function(data)
					{
						$('#district').html(data);
						 $('#ward').html('<option value="">--Xã/Phường--</option>');
					}
				})
			}
			 else
  			{
				$('#district').html('<option value="">--Chọn Quận/Huyện--</option>');
				$('#ward').html('<option value="">--Xã/Phường--</option>');
			}
				 });

			$('#district').change(function(event){
			var district_id = $('#district').val();
			if(district_id != '')
			{
				 $.ajax({

				    url:"<?php echo base_url(); ?>admin/quanlyuser_controller/ward",
				    method:"POST",
				    data:{district_id:district_id},
				    success:function(data)
				    {
				     $('#ward').html(data);
				    }

				   });
			}
			else
			{
				$('#ward').html('<option value="">--Xã/Phường--</option>');
			}
			});
		});

		</script> 
</body>
</html>