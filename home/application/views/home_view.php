<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trang chủ</title>
 
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/trangchu.css">
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
		.account-wrapper ul li a:hover{
			background-color: #fdfcf0;
			color: #e52125;
		}

		.popup{
			position: sticky;
			width: 100%;
			height: 100%;
			top: 0;
			left: 0;
			background-color: #000;
			opacity: .9;
			z-index: 100000;
			overflow: hidden;
			visibility: visible;
			transition: 0.4s;
			cursor: pointer;
		}

		.hidden{
			width: 0%;
			height: 0%;
			opacity: 0;
			visibility: hidden;
			display: none;
			transition: .4s;
		}
		
		.anhnoibat{
			width: 100%;
			position: absolute;
			top: 70px;
			z-index: 1500;
			left: 50%;
			transform: translateX(-50%);
			background-color: transparent;
		}

		a.navbar-brand img:hover{
			opacity: .5;
			transition: .4s;
		}
	</style>
	
</head>
<body>

	<div id="popup" class="popup">
		<div class="anhnoibat container ">
			<a href="<?php echo base_url() ?>/home_controller/phim/29"><img class="img-fluid" src="images/conmuatinhdau.jpg" alt=""></a>
		</div>
	</div>
	
	<a href="#" class="back-to-top">
		<i class="fas fa-chevron-circle-up"></i>
	</a> <!-- end backtotop -->

	<div class="head">
				<div class="container">
					<!-- account -->
					<div class="account-wrapper">
						<ul>
							<li>
								<a  href="<?php echo base_url(); ?>home_controller/profile/<?= $mangketqua ?>" class="dropdown-item"><small>Thông tin</small></a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>home_controller/logout" class="dropdown-item"><small>ĐĂNG XUẤT</small></a>
							</li>
						</ul>
					</div>
					<!-- end account -->
				</div>
				<div class="menu">
					<!-- navbar -->
					<nav class="navbar navbar-expand-lg navbar-light bg_kem">
						<div class="container">
							  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
							    <span class="navbar-toggler-icon"></span>
							  </button>
							  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
							    <a class="navbar-brand" href="<?php echo base_url(); ?>trang-chu"><img style="width: 100px; height: 27px;" src="images/brand.png" alt=""></a>
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
 
	<div class="header">
		<div class="container">
			<div class="slider">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					</ol>
					
					<div style="height: 624px;" class="carousel-inner" role="listbox">
						<div class="carousel-item active">
							<img src="images/midway.jpg" alt="First slide">
						</div>
						<div class="carousel-item">
							<img src="images/naoca.jpg" alt="First slide">
						</div>
						<div class="carousel-item">
							<img src="images/kaiji.jpg" alt="First slide">
						</div>
					</div>
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="icon-prev" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="icon-next" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div> <!-- end slider -->
		</div>
	</div> <!-- end header -->

	<div class="main pb-5">

		<div class="phimdangchieu">
			<div class="container">

				<!-- Dòng cần thiết để chuyển số thành chữ -->
					<?php 
						$CI =& get_instance(); 
						$CI->load->model('phimchieu'); 	
						$CI->load->model('admin/showlichchieu_model'); 					
					?> 
<!--END Dòng cần thiết để chuyển số thành chữ -->	
				<?php  foreach ($phimdangchieu as $key => $value) 
				{	
					if($CI->showlichchieu_model->checkexist($value['id']) )
					{
						$khongcophim = false;
						break;
					}	
					else $khongcophim = true; 

					
					
				}?>	
				<?php if(!$khongcophim): ?>				
					<div class="row justify-content-center">
						<div class="phimdangchieu-title mt-5 mb-3 ml-3 ">
							<h3 >Phim Đang Chiếu</h3>
						</div> <!-- end phimdangchieu-title -->
					</div>	
					<div class="row phimdangchieu-list">
					<?php  foreach ($phimdangchieu as $key => $value): ?>
					<?php if(!$khongcophim & $CI->showlichchieu_model->checkexist($value['id'])): ?>
						<div class="col-4">
							<div class="card text-center bg-black mt-5">
								<img  class="card-img-top" src="images/<?=$value['image'] ?>" alt="Card image cap">
								<div class="card-body">
									<h4  class="card-title"><?= $value['tenphim'] ?></h4>
									<p class="card-text"><?= $value['tentienganh'] ?></p>
									<?php if($CI->phimchieu->check_conve_tong($value['id'])): ?>
										<a  href="http://localhost/home/home_controller/phim/<?=$value['id']?>" class="btn btn-primary datve">Còn vé</a>
									<?php else: ?> <a href="http://localhost/home/home_controller/phim/<?=$value['id']?>" class="btn btn-primary datve">Hết vé !!!</a>
									<?php endif ?>
								</div>
							</div>
						</div> <!-- end col-4 -->
					<?php endif ?>
					<?php endforeach ?>
					</div> <!-- end phimdangchieu-list -->
				<?php endif ?>	
					
					
					<div class="row justify-content-center">
						<div class="phimdangchieu-title mt-5 mb-3 ml-3 ">
							<h3 >Phim Sắp Chiếu</h3>
						</div> <!-- end phimdangchieu-title -->
					</div>			
					<div class="row phimdangchieu-list">
					<?php foreach ($phimsapchieu as $value): ?>
					
						<div class="col-4">
			 				<div class="card text-center bg-black mt-5">
								<img class="card-img-top" src="http://localhost/home/images/<?=$value['image']?>" alt="Card image cap">
								<div class="card-body">
									<h4 class="card-title"><?=$value['tenphim']?></h4>
									<p class="card-text"><?=$value['tentienganh']?></p>
									<a href="<?php echo base_url()."home_controller/phim/".$value['id']; ?>" class="btn btn-primary datve">Xem chi tiết</a>
								</div>
							</div>
						</div> <!-- end col-3 -->
										
					<?php endforeach; ?>	
					</div>			
				
				
			</div> <!-- end container -->
		</div> <!-- end phim dang chieu -->
		

		<div class="phimsapchieu">
			<div class="container mt-5">
				<div class="row">
					<div class="col-6 left">
						<div class="row">
							<div class="left-title mb-5 ml-3">
								<h4>Review phim</h4>
							</div> <!-- end left title -->
						</div>
						<div class="row">
							<div class="col-4 img-fluid">
								<a href="#"><img  src="images/bo-ba-quai-nhan.jpeg" alt=""></a>
							</div> <!-- end col-4 -->
							<div class="col-8">
								<div class="left-content">
									<p>Được dịch từ tiếng Anh-Glass là một bộ phim kinh dị siêu anh hùng tâm lý Mỹ năm 2019 được viết và đạo diễn bởi M. Night Shyamalan, người cũng sản xuất cùng Jason Blum, Marc Bienstock và Ashwin Rajan.</p>
								</div>
							</div> <!-- end col-8 -->
						</div> <!-- end row -->
					</div> <!-- end phimsapchieu left -->
					<div class="col-6 right">
						<div class="row">
							<div class="right-title mb-5 ml-3">
								<h4>Blog</h4>
							</div> <!-- end left title -->
						</div>
						<div class="row">
							<div class="col-4 img-fluid">
								<a href="#"><img src="images/godzilla.jpg" alt=""></a>
							</div> <!-- end col-4 -->
							<div class="col-8">
								<div class="left-content">
									<p>Chúa tể Godzilla là một bộ phim quái vật 2019 của Mỹ do Michael Dougherty đạo diễn và đồng sáng tác. Nó là phần phim tiếp theo của Godzilla và sẽ là bộ phim thứ 35 của thương hiệu Godzilla, bộ phim thứ ba trong MonsterVerse của Legendary và phim Godzilla thứ ba được sản xuất hoàn toàn bởi một studio Hollywood.</p>
								</div>
							</div> <!-- end col-8 -->
						</div> <!-- end row -->
					</div> <!-- end phimsapchieu left -->
				</div> <!-- end row -->
			</div> <!-- end container -->
		</div> <!-- end phimsapchieu -->

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