<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Phim đang chiếu</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/phimdangchieu.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/xemchitiet.css">
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
		button.btn_red{
			background-color: #e71a0f;
			height: 25px;
			padding: 0 5px;
		}

		a.navbar-brand img:hover{
			opacity: .5;
			transition: .4s;
		}
	</style>
</head>
<body>
	
	<a href="#" class="back-to-top">
		<i class="fas fa-chevron-circle-up"></i>
	</a> <!-- end backtotop -->

	<div class="head">
		<div class="menu">
			<!-- navbar -->
			<nav class="navbar navbar-expand-lg navbar-light bg_kem">
				<div class="container">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
					    <span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
					    <a class="navbar-brand" href="<?php echo base_url(); ?>trang-chu"><img style="width: 110px; height: 44px;" src="images/brand.png" alt=""></a>
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
					    
					    <form class="form-inline my-2 my-lg-0" role="form" action="<?php echo base_url('phim/search'); ?>" method="get">
					      	<input class="form-control mr-sm-2" type="search" name="key-search" value="<?php echo isset($key) ? $key : ''?>" placeholder="Phim..." id="text-search" aria-label="Search">
					     	<button class="btn btn_red my-2 my-sm-0" name="but" type="submit">Search</button>
					    </form>

					</div>
				</div> <!-- end container -->
			</nav>
			<!-- end navbar -->
		</div>
	</div> <!-- end head -->


	<div class="main " style="margin-top: 81px; min-height: 420px;">

		<div class="phimdangchieu">
			<div class="container">

				<div class="row justify-content-center">
					<div class="phimdangchieu-title mt-5 mb-3 ml-3 ">
						<h3 >PHIM ĐANG CHIẾU</h3>
					</div> <!-- end phimdangchieu-title -->
				</div>

			  <div class="row phimdangchieu-list">
				



					<!-- Dòng cần thiết để chuyển số thành chữ -->
					<?php 
						$CI =& get_instance(); 
						$CI->load->model('phimchieu'); 	
						$CI->load->model('admin/showlichchieu_model'); 					
					?> 
<!--END Dòng cần thiết để chuyển số thành chữ -->	


					<?php  foreach ($phimdangchieu as $key => $value): ?>
					<?php if($CI->showlichchieu_model->checkexist($value['id'])): ?>
						<div class="col-4">
							<div class="card text-center bg-black mt-5">
								<img  class="card-img-top" src="http://localhost/home/images/<?=$value['image'] ?>" alt="Card image cap">
								<div class="card-body">
									<h4  class="card-title"><?= $value['tenphim'] ?></h4>
									<p class="card-text"><?= $value['tentienganh'] ?></p>
									<?php if($CI->phimchieu->check_conve_tong($value['id'])): ?>
										<a  href="http://localhost/home/home_controller/phim/<?=$value['id']?>" class="btn btn-primary datve">Còn vé </a>
										<?php echo $value['view'] ?> <i class="fa fa-eye" aria-hidden="true"></i>
									<?php else: ?> <a href="http://localhost/home/home_controller/phim/<?=$value['id']?>" class="btn btn-primary datve">Hết vé !!!</a>
									<?php echo $value['view'] ?> <i class="fa fa-eye" aria-hidden="true"></i>
									<?php endif ?>
								</div>
							</div>
						</div> <!-- end col-4 -->
					<?php endif ?>
					<?php endforeach ?>				</div> <!-- end phimdangchieu-list --> 
				<div class="end-phimdangchieu-title mt-5 pb-3 ml-3 "></div> <!-- end phimdangchieu-title -->
				
			</div> <!-- end container -->
		</div> <!-- end phim dang chieu -->

		

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
	

</body>
</html>