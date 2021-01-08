<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/phimdangchieu.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/datve.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/ngoisao.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/nav.css">
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/Verdana/Verdana.ttf">
	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/Verdana/Verdana Bold.ttf">
	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/Helvetica/HelveticaLTStd-Cond.otf">
	<script src="<?php echo base_url(); ?>bootstrap/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/app.js"></script>
	<link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>

	<style>
		
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

		.noidungphim{
			background-color: #fdfcf0;
			margin-top: 80px;
		}

		.chitietlich .card-body{
			padding: 0px;
		}

		.chitietlich .card-body .card-title,
		.chitietlich .card-body .card-text{
			margin-bottom: 0px;
		}

		a.btn.btn_datve{
			background-color: #e52125;
			color: #ffffff !important;
		}

		a.btn.btn_datve:hover{
			background-color: #6f0000;
		}
	</style>
</head>
<body>

		<div id="fb-root"></div>
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0"></script>

	
	
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
					    	<img style="width: 110px; height: 44px;" src="images/brand.png" alt="">
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
	

	<div class="main" style="padding-top: 150px;background-color: #fdfcf0;">
		<div class="container">
			<div class="row mb-5 justify-content-center">
				<div class="col-8">
					<h5 style="color: #e71a0f;font-size: 32px;">Liên hệ với chúng tôi</h5>
					<div style="color: red; font-weight: bold; text-align: center;">  <?=$this->session->flashdata('message'); ?>
						</div>
				</div>
			</div>
			<div class="row map justify-content-center mt-5 mb-5">
				<div class="col-8">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.5215504034413!2d106.78394331462322!3d10.847879492273073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175276bb276eaf7%3A0x56a6a0eafe0e3b09!2zOTcgxJDGsOG7nW5nIE1hbiBUaGnhu4duLCBIaeG7h3AgUGjDuiwgUXXhuq1uIDksIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1591869892759!5m2!1svi!2s" width="745" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>
			<div class="row justify-content-center pb-5">
				<div style="border-right: 1px solid gray" class="col-4">
					<div class="row">
						<div class="title col-12">
							<h6 style="border-bottom: 1px solid gray;">TRỤ SỞ CHÍNH</h6>
						</div>
						<div class="content col-12">
							<p>97 Man Thiện, P.Hiệp Phú, Q.10, Thành phố Hồ Chí Minh</p>
						</div>
					</div>
					<div class="row">
						<div class="title col-12">
							<h6 style="border-bottom: 1px solid gray;">DỊCH VỤ KHÁCH HÀNG</h6>
						</div><br>
						<div class="content col-12">
							<p>Hotline: 09091230411 <br>Giờ làm việc: 8:00 - 22:00 <br>Tất cả các ngày trong tuần <br>Email hỗ trợ: <a href="gmail.com" style="color: #e71a0f">huynguyen5212@gmail.com</a></p>
						</div>
					</div>
					<div class="row ">
						<div class="title col-12">
							<h6 style="border-bottom: 1px solid gray;">LIÊN HỆ</h6>
						</div><br>
						<div class="content col-12">
							<p>Phòng kinh doanh: +84 123-132-132 <br> Hotline: 012342131 <br>Email: <a style="color: #e71a0f" href="gmail.com">12341@gmail.com</a></p>
						</div>
					</div>
				</div>
				<div class="col-4">
					<form action="<?php echo base_url() ?>contact_controller" method="post">
						<fieldset class="form-group">
							<label style="color: black;" for="exampleInputEmail1">Tên</label>
							<input required="" type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên..">
						</fieldset>
						<fieldset class="form-group">
							<label style="color: black;" for="exampleInputEmail1">Email</label>
							<input required="" type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Nhập email..">
							<small class="text-muted">We'll never share your email with anyone else.</small>
						</fieldset>
						<fieldset class="form-group">
							<label style="color: black;" for="exampleInputEmail1">Điện thoại</label>
							<input type="tell" name="sdt" class="form-control" id="exampleInputEmail1" placeholder="Nhập số điện thoại..">
						</fieldset>
						<fieldset class="form-group">
							<label style="color: black;" for="exampleInputEmail1">Nội dung cần liên hệ</label>
							<textarea required="" placeholder="Text.." name="noidung" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
						</fieldset>
						
						
						<button onClick="return confirmSubmit()" style="color: #ffffff;background-color: #e71a0f;" type="submit" class="btn btn-sm">Gửi đi</button>
					</form>
				</div>
			</div>
		</div>
	</div>

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
		function confirmSubmit()
		{
		var agree=confirm("Xác nhận gửi?");
		if (agree)
		 return true ;
		else
		 return false ;
		}
	</script>

</body>
</html>