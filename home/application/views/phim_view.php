<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đặt vé</title>
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

		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0" nonce="g6SosvfD"></script>

		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0" nonce="xHcaX2YA"></script>

	
	
	<div class="head">
		<div class="menu">
			<!-- navbar -->
			<nav class="navbar navbar-expand-lg navbar-light bg_kem">
				<div class="container">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
					    <span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
					    <a class="navbar-brand" href="<?php echo base_url(); ?>trang-chu"><img style="width: 110px; height: 44px;" src="http://localhost/home/images/brand.png" alt=""></a>
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

<div class="main">

			<div class="noidungphim">
			<div class="container">

				<div class="row">
					<div class="col-9">
						<div class="row justify-content-center">
							<div class="noidungphim-title mt-5 mb-3 ml-3 ">
								<h3 >Nội dung phim</h3>
							</div> <!-- end noidungphim-title -->
						</div>
						<?php  if (isset($mangphim)) foreach ($mangphim as $key => $value): ?>
						<div class="row">
							<div class="col-3 img-fluid mt-5">
								<div class="row">
									<img src="http://localhost/home/images/<?= $value['image'] ?>" alt="">
								</div>
								

							</div> <!-- end col-3 -->
							<div class="col-9">
								<div class="content">
									<div class="row">
										<div class="col-11">
											<h3><?= $value['tenphim'] ?></h3>
										</div>
									</div>
									<div class="row">
										<div class="col-11">
											<p>Nhà sản xuất: <strong><?= $value['nsx'] ?></strong></p>
										</div>
									</div>
									<div class="row">
										<div class="col-11">
											<p>Thể loại: <strong><?= $value['theloai'] ?></strong></p>
										</div>
									</div>
									<div class="row">
										<div class="col-11">
											<p>Quốc gia: <strong> <?= $value['quocgia'] ?></strong></p>
										</div>
									</div>
									<div class="row">
										<div class="col-11">
											<p>Đạo diễn: <strong><?= $value['daodien'] ?></strong></p>
										</div>
									</div>
									<div class="row">
										<div class="col-11">
											<p>Diễn viên: <strong> <?= $value['dienvien'] ?></strong></p>
										</div>
									</div>
									<div class="row">
										<div class="col-11">
											<p>Thời lượng: <strong> <?= $value['thoiluong'] ?> phút</strong></p>
										</div>
									</div>
									<div class="row">
										<div class="col-11">
											<p>Ngày khởi chiếu: <strong><?= $value['ngaykhoichieu'] ?></strong></p>
										</div>
									</div>
									<div class="row">
		 								<div class="col-11">
											<p class="giave">Giá vé: <strong><?= $value['giave'] ?></strong></p>
											<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="" data-layout="button" data-action="like" data-size="small" data-share="true">
											</div>
											<?php echo $value['view'] ?> <i class="fa fa-eye" aria-hidden="true"></i>

										
										
											</div>
										</div>

									<!-- sao -->
									 <div class="raty_detailt"  >
										<form action="<?php echo base_url('phim/raty')?>">
										    <input class="star star-5" id="star-5" type="radio"  name="star"/>
										    <label class="star star-5" for="star-5"></label>
										    <input class="star star-4" id="star-4" type="radio" name="star"/>
										    <label class="star star-4" for="star-4" ></label>
										    <input class="star star-3" id="star-3" type="radio" name="star"/>
										    <label class="star star-3" for="star-3" ></label>
										    <input class="star star-2" id="star-2" type="radio" name="star"/>
										    <label class="star star-2" for="star-2" ></label>
										    <input class="star star-1" id="star-1" type="radio" name="star"/>
										    <label class="star star-1" for="star-1"></label>
										</form>
									</div>


									
							<!-- <h5>Đánh giá: <span class="raty_detailt" style='margin: 5px' id="<?= $value['id'] ?>" data-score='<?= $value['raty'] ?>'> </span>Tổng số:<b class="rate_count"><?= $value['rate_count'] ?></b> </h5> -->
					
									
								</div> <!-- end content -->
							</div>
						</div>

						<div class="row mt-5">
							<div class="detail">
								<p><?= $value['noidung'] ?></p>
							</div>
							<div class="trailer">
								<iframe width="560" height="315" src="<?php echo $value['trailer'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</div>
						</div>
					</div> <!-- end col-8 -->
					<div class="col-3 ">
						
						<div class="phimdangchieu-title mt-5 mb-3 ml-3">
							<h5><b> Phim đang chiếu <b></h5>
						</div> <!-- end phimdangchieu-title -->
			

						
							<div class="card text-center bg-black mt-5">
							<img class="card-img-top" src="<?php echo base_url()."images/".$phimdangchieu['image']; ?>" alt="Card image cap">
							<div class="card-body">
								<h4 class="card-title"><?=$phimdangchieu['tenphim'] ?></h4>
								<a href="<?php echo base_url()."home_controller/phim/".$phimdangchieu['id']; ?>" class="btn btn-primary datve">Xem chi tiết</a>
							</div>
							</div>
							 	
						
						

						<div class="xemthem-btn mt-3">
							<div class="row justify-content-center">
								<div class="col-7">
									<a href="<?php echo base_url(); ?>phim-dang-chieu" class="btn btn_kem">Load more <i class="fas fa-angle-double-right"></i></a>
								</div>

								<div style="width: 283px; margin-top: 20px;" class="fb-page" data-href="https://www.facebook.com/cgvcinemavietnam/" data-tabs="timeline" data-width="" data-height="70" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/cgvcinemavietnam/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/cgvcinemavietnam/">CGV Cinemas Vietnam</a></blockquote>
								</div>

							</div>
						</div>

					</div> <!-- end col-4 -->
				</div>

					<div class="row lichchieu">
						<div class="col-12">
							<ul class="nav nav-tabs" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#home">Lịch Chiếu</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#menu1">Bình Luận</a>
								</li>
							</ul>
<!-- Dòng cần thiết để chuyển số thành chữ -->
						<?php 
							$CI =& get_instance(); 
							$CI->load->model('admin/showphim_model'); 
							$CI->load->model('admin/showphong_model');
							$CI->load->model('admin/showlichchieu_model');
						?> 
<!--END Dòng cần thiết để chuyển số thành chữ -->
						<?php 
							$mang_ngaychieu = $CI->showlichchieu_model->getmang_lichchieu($value['id'], 'ngaychieu');
							$mang_phong = $CI->showlichchieu_model->getmang_lichchieu($value['id'], 'phong');
							$mang_cachieu = $CI->showlichchieu_model->getmang_lichchieu($value['id'], 'thoigian'); //$value['id'] ở đây là id của tên phim

							$mang_idlichchieu = $CI->showlichchieu_model->getmang_lichchieu($value['id'], 'id');
							
						?>
					<!-- Tab panes -->
					<div class="tab-content">
							<div id="home" class="container tab-pane active"><br>
								<div class="lich mb-4">
									<div class="phong">
										<?php if ($mangketqua != null ): ?> 
										<?php else: ?> <h5>Không có lịch chiếu !!!</h5>
										<?php endif ?>
									</div>
									<div  class="chitietlich row justify-content-center">
										<?php foreach ($mang_ngaychieu as $ngay): ?>
											<ul style="display: flex; flex-wrap: wrap;">
												<?php foreach ($mang_phong as $phong): ?>
													<?php if($CI->showlichchieu_model->checkexist($value['id'], $ngay, $phong)) : ?>
														<?php foreach ($mang_cachieu as $gio):?>
															<?php foreach ($mang_idlichchieu as $id):?>
																<?php if($CI->showlichchieu_model->checkexist($value['id'],$ngay, $phong, $gio, $id)) : ?>
																	<li style="list-style: none;">
																		<!-- card -->
																		<div class="card text-center">
																			<div class="card-body">
																				<p class="card-title"><small>Ngày chiếu: </small> <strong><?php echo $ngay; ?></strong></p>
																				<p class="card-text"><small>Phòng :</small> <strong><?= $CI->showphong_model->ktdanhmuc($phong); ?></strong></p>
																					<p class="card-text"><small>Giờ: </small> <strong><?=$gio ?></strong></p>
																					<p style="font-size: 14px;" class="card-text"><small>Còn:</small> <?=$CI->showlichchieu_model->soghe_conlai($id) ?><small> ghế</small></p>
																				<a href="http://localhost/home/home_controller/chonghe/<?=$id?>" class="btn btn_datve">Đặt vé</a>
																			</div>
																		</div>
																		<!-- end card -->
																	</li>
																<?php endif ?>
															<?php endforeach ?>
														<?php endforeach ?>
													<?php endif ?>
												<?php endforeach  ?>
											</ul>
										<?php endforeach  ?>
									</div>
								</div>
							</div>
						<div id="menu1" class="container tab-pane fade"><br>
								<div class="fb-comments" data-href="https://www.facebook.com/phuongnenenha" data-numposts="5" data-width=""></div>
						</div>
					</div>
					</div>
								<?php endforeach; ?>	
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
	

</body>
</html>