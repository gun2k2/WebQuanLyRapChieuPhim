<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/phimdangchieu.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/xemchitiet.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/profile.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/nav.css">

	
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/Verdana/Verdana.ttf">
	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/Verdana/Verdana Bold.ttf">
	
	<script src="<?php echo base_url(); ?>bootstrap/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/app.js"></script>

	<style>
		a.navbar-brand img:hover{
			opacity: .5;
			transition: .4s;
		}

		a.navbar-brand img:hover{
			opacity: .5;
			transition: .4s;
		}

		.menu .container a.btn_red:hover{
			background-color: #e52125;
			color: #fdf7dc;
		}

		.menu .container a.btn_red{
			border: 1px solid #e52125;
			color: #e52125;
		}

		label.gender {
		    margin-left: 20px;
		}

		.main .phimdangchieu{
			width: 500px;
			margin: auto;
			min-height: 500px;
			border: 1px solid #e52125;
		}

		.input-group{
			padding: 0px 25px;
		}
	</style>
</head>
<body>

	<div class="head">
		<div class="menu">
			<!-- navbar -->
			<nav class="navbar navbar-expand-lg navbar-light bg_kem">
				<div class="container">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
					    <span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
					    <a class="navbar-brand" href="<?php echo base_url(); ?>trang-chu">
					    	<img style="width: 110px; height: 44px;" src="http://localhost/home/images/brand.png" alt="">
					    </a>
					    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					    	<li class="nav-item dropdown">
								<a href="#" class="nav-link dropdown-toggle" id="menu2" data-toggle="dropdown">Phim</a>
								<div class="dropdown-menu">
									<a href="<?php echo base_url(); ?>phim-dang-chieu" class="dropdown-item">Phim đang chiếu</a>
									<a href="<?php echo base_url(); ?>phim-sap-chieu" class="dropdown-item">Phim sắp chiếu</a>
								</div>
							</li>
					      	<li class="nav-item">
					        	<a class="nav-link" href="<?php echo base_url(); ?>phim-dang-chieu">Mua vé</a>
					      	</li>
					      	<li class="nav-item">
					       		<a class="nav-link" href="<?php echo base_url(); ?>event_controller">Tin tức</a>
					      	</li>
					      	<li class="nav-item">
					       		<a class="nav-link" href="<?php echo base_url(); ?>contact_controller">Liên hệ</a>
					      	</li>
					      	
					    </ul>
					    
					    <a class="btn btn_red my-2 my-sm-0" name="but" href="<?php echo base_url(); ?>home_controller/logout">ĐĂNG XUẤT</a>

					</div>
				</div> <!-- end container -->
			</nav>
			<!-- end navbar -->
		</div>
	</div> <!-- end head -->


	<div style="padding-top: 115px; padding-bottom: 25px;" class="main"> 
		<div class="phimdangchieu">
			<div class="container" style="box-sizing: border-box;">

				<div class="row justify-content-center">
					<div class="phimdangchieu-title mt-4 mb-4 ml-3 ">
						<h5>THÔNG TIN THÀNH VIÊN</h5>
					</div> <!-- end phimdangchieu-title -->
				</div>
				<!-- form -->
				<div style="color: red; font-weight: bold; text-align: center;">  <?=$this->session->flashdata('message'); ?>
				</div>
				<?php foreach ($mangketqua as  $value): ?>
				<form action="http://localhost/home/admin/quanlyuser_controller/updateDulieuuser" id="form" class="form" action="" method="post"  enctype="multidata/form-data">
							
					<input type="hidden" autocheck="true" name="id" value="<?= $value['id']?>" class="form-control" id="id">

					<div class="row justify-content-center input-group input-group-sm mb-3">
						<label style="width: 150px;">Họ tên: </label>
						<input type="button" data-toggle="tooltip"  title="Vui long lien he phuongjav5@gmail.com de thay doi!" autocheck="true" name="name" value="<?= $value['name']?>" class="form-control" id="tenNhanVien"  placeholder="Họ tên.." required="">
							
					</div>

					<div class="row justify-content-center input-group input-group-sm mb-3">
						<label style="width: 150px;" for="">Email: </label>
						<input  type="button" title="Vui long lien he phuongjav5@gmail.com de thay doi!" data-toggle="tooltip" autocheck="true" name="email" value="<?= $value['email']?>" class="form-control" id="userName"   placeholder="email...">
					</div>
					
					<div class="row justify-content-center input-group input-group-sm mb-3">
						<label style="width: 150px;" for="">Ngày sinh:</label>
						<input style="width: 300px;" type="date" autocheck="true" name="ngaysinh" value="<?= $value['ngaysinh']?>" class="form-control" id="param_ngaysinh"  placeholder="ngaysinh..." required="">
					</div>

					<div class="row justify-content-center input-group mb-3">
						<div class="input-group-prepend">
							<label style="width: 150px; margin-left: -73px;" for="">Giới tính:</label>
						</div>
						
						<div class="input-group-prepend">
							<label class="gender" for="male">Nam</label> <!-- nam -->
							<div class="">
								<input type="radio" id="male" name="gioitinh" value="male">
							</div>
							<label class="gender" for="female">Nữ</label> <!-- nữ -->
							<div class="">
								<input type="radio" id="female" name="gioitinh" value="female">
							</div>
							<label class="gender" for="other">Khác</label> <!-- khác -->
							<div class="">
								<input type="radio" id="other" name="gioitinh" value="other">
							</div>
						</div>
					</div>

					<div class="row justify-content-center input-group input-group-sm mb-3">
						<label style="width: 150px;" for="">Địa chỉ:</label>
						<input type="text" autocheck="true" name="diachi" value="<?= $value['diachi']?>" class="form-control" id="param_diachi"  placeholder="Địa chỉ..." required="">
					</div>

					<div class="row justify-content-center input-group input-group-sm mb-3">
						<label style="width: 150px;" for="">Số điện thoại:</label>
						<input type="button" title="Vui long lien he phuongjav5@gmail.com de thay doi!" autocheck="true" name="sdt" value="<?= $value['sdt']?>" class="form-control" id="param_sdt"  placeholder="sdt..." required="">
					</div>

					<div class="row justify-content-center input-group mb-3">
						<div class="input-group-prepend">
							<label style="width: 150px;" for="province" >Tỉnh/ThànhPhố:</label>
						</div>
						<select class="custom-select" name="province" id="province" required="">
							<option value="">--Chọn Tỉnh--</option>
							<?php 
							foreach ($mangtinh as $value) {
						echo '<option value="'.$value["province_id"].'">'.$value['name']. '</option>';
							} ?>
						</select>
					</div>

					<div class="row justify-content-center input-group mb-3">
						<div class="input-group-prepend">
							<label style="width: 150px;" for="">Quận/Huyện</label>
						</div>
						<select class="custom-select" name="district" id="district" required="">
							<option value="">--Chọn Quận/Huyện--</option>
						</select>
					</div>

					<div class="row justify-content-center input-group mb-3">
						<div class="input-group-prepend">
							<label style="width: 150px;" for="ward">Xã/Phường</label>
						</div>
						<select class="custom-select" name="ward" id="ward" >
							<option value="">--Xã/Phường--</option>
						</select>
					</div>

					<div class="row justify-content-center input-group input-group-sm mb-3">
		    			<label style="width: 150px; transform: translateX(-25px);" for="" >Mật khẩu hiện tại:</label>
				      	<input  type="password"  value="" name="password1" id="PassWord" placeholder="Mật khẩu hiện tại.." required="">
				      	<div class="error" name="name_error"><?php echo form_error('password1')  ?></div>
				    </div>

				    <div class="row justify-content-center input-group input-group-sm mb-3">
		    			<label style="width: 150px; transform: translateX(-25px);" for="PassWord" >Mật khẩu mới:</label>
				      	<input type="password"  value="" name="password" id="PassWord" placeholder="Mật khẩu mới ..">
				      	<div class="error" name="name_error"><?php echo form_error('password')  ?></div>
				    </div>

				    <div class="row justify-content-center input-group input-group-sm mb-3">
		    			<label style="width: 150px; transform: translateX(-25px);" for="rePassWord" >Nhập lại mật khẩu</label>
				      	<input type="password" value="" autocheck="true" name="re_password" id="rePassWord" placeholder="Nhập lại mật khẩu ..">
				      	<div class="error" name="name_error"><?php echo form_error('re_password')?></div>
		    		</div>

					<div class="row justify-content-center input-group input-group-sm mb-3">
						<div class="col-5">
							<div class="row justify-content-center">
								<div class="col-3">
									<input onClick="return confirmSubmit()" type="submit" class="btn btn_kem btn-sm" value="Lưu">
								</div>
							</div>
						</div>
					</div>
				</form>
			<?php endforeach; ?>

				<!-- end form -->
			</div> <!-- end container -->
		</div> <!-- end phimdangchieu -->
	</div> <!-- end main -->

	<div style="background-color: #fdfcf0; border-top: 2px solid #222; border-bottom: 2px solid #222;" class="footer-brand-slide">
		<div class="container">
			<div style="background-image: url(<?php echo base_url() ?>/images/brand-slide.png); height: 44px;  " class="bar">
			</div>
		</div>
	</div>

	<div style="height: 50px; background-color: #fdfcf0; height: 50px;" class="temp"></div>

	<div class="footer">
		<div class="contact mt-3">
			<ul>
				<li><a href="http://fb.com"><i style="color: #3a589b;" class="fab fa-facebook"></i></a></li>
				<li><a href="http://youtube.com"><i style="color: #cb2027;" class="fab fa-youtube"></i></a></li>
				<li><a href="http://instagram.com"><i style="color: transparent;background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);background: -webkit-radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);background-clip: text;-webkit-background-clip: text;" class="fab fa-instagram"></i></a></li>
				<li><a href="https://www.linkedin.com/"><i style="color: #007bb6;" class="fab fa-linkedin-in"></i></a></li>
				<li><a href="https://twitter.com"><i style="color: #32ccfe;" class="fab fa-twitter"></i></a></li>
			</ul>
		</div>
		<h6>COPYRIGHT 2020 PTIT CINEMA. All RIGHTS RESERVED</h6>
	</div> <!-- end footer -->

	<div style="width: 100%; min-height: 120px; background-image: url(<?php echo base_url() ?>images/gach.jpg);" class="gach"></div>
	
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

		function confirmSubmit()
		{
		var agree=confirm("Xác nhận lưu?");
		if (agree)
		 return true ;
		else
		 return false ;
		}

</script> 
</body>
</html>