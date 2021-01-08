<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đặt vé</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/phimdangchieu.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/chonghe.css">
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
		.menu .container a.btn_red:hover{
			background-color: #e52125;
			color: #fdf7dc;
		}

		.menu .container a.btn_red{	
			border: 1px solid #e52125;
			color: #e52125;
		}

		.noidungphim{
			margin-top: 80px;
			background-color: #fdfcf0;
		}
		label.seat-box .number-box input[disabled] ~ .number-box{
			background-color: #e71a0f;
		}

		label.seat-box .number-box input[disabled]{
			cursor: not-allowed;
		}

		a.navbar-brand img:hover{
			opacity: .5;
			transition: .4s;
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

<div class="main">

			<div class="noidungphim">
			<div class="container">

				<div class="row justify-content-center">
					<div class="col-8">
						<div class="row justify-content-center">
							<div class="noidungphim-title mt-5 mb-3 ml-3 ">
								<h3 >Chọn ghế</h3>
							</div> <!-- end noidungphim-title -->
						</div>
<!-- form --><div style="color: red; font-weight: bold; text-align: center;">  <?=$this->session->flashdata('message'); ?>
			</div>

				<form action="http://localhost/home/admin/quanlyve_controller/addveuser" id="form" class="form"  method="post"  enctype="multidata/form-data">
					

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
							

			
			
				 	<div class="form-group row justify-content-center">
			    		<form  method="post">

			    			<!-- col-6 left -->
			    			<div class="col-6 left">

			    				<?php foreach ($mangketqua as  $value):?>
				    				<input type="hidden" name= "lichchieu" value="<?=$value['id'] ?>">
									<input type="hidden" name= "tenphim" value="<?=$value['tenphim'] ?>">
									<?php $mave = $value['tenphim'].$value['id'] ?>
							
									<p>Tên phim: <strong><?php echo $CI->showphim_model->ktdanhmuc($value['tenphim']) ?></strong></p>
									<p>Phòng: <strong><?php echo $CI->showphong_model->ktdanhmuc($value['phong'])."<br>" ?></strong></p>
									<p>Ngày chiếu: <strong><?php echo $value['ngaychieu'] ?></strong></p>
									<p>Giờ chiếu: <strong><?php echo $value['thoigian'] ?></strong></p>
			    				<?php endforeach ?>

			    				<div class="form-group row">
								    <label for="maVoucher" class="col-sm-5 col-form-label">Voucher</label>
								    <div class="col-sm-5">
								      	<input name="ma_voucher"  type="text" class="form-control" id="maVoucher" placeholder="Mã...">
								   	 	<div class="error" name="name_error"><?php echo form_error('ma_voucher')?></div>
								    </div>
								</div>

								<div class="form-group row">
								    <label for="eMail" class="col-sm-5 col-form-label">Email </label>
								    <div class="col-sm-5">
								      <input name="email"  type="text" class="form-control" id="eMail" placeholder="Email..."  value="<?php echo set_value('email') ?>" required="">
								     <!--  -->
								    </div>
								</div>

			    			</div>
			    			<!-- end col-6 left -->
							
							<!-- col-6 right -->
			    			<div class="col-6 right">
			    				<div style="width: 100%;height: 100px;perspective: 100px;position: relative;box-sizing: border-box;" class="screen-box mb-3">
			    					<div style="position: absolute;background-color: #fbc687;transform: rotateX(-15deg); width: 100%;height: 100%; box-shadow: 0 0 10px #fbc687, 0 0 40px #fbc687, 0 0 80px #fbc687;" class="screen">
			    						<p style="text-align: center;border: 1px solid #e71a0f; color: #e71a0f">SCREEN</p>
			    					</div>
			    				</div>
			    				<?php for ($i='A'; $i <= 'E'; $i++): ?>
									<div class="row ml-3">
										<div class="col-1">
											<p><?=$i?></p>
										</div>
										<?php for ($j=1; $j <=5; $j++): ?>
											<?php $hetve = false ?>
											<?php foreach ($mangghehet as $key => $value)
												{
													if ($mave.$i.$j == $value) {$hetve = true; break;}
												} 
											?>			
											<?php if (!$hetve) : ?>
											 
												<label class="seat-box" for="">														
													<div class="number-box">																
														<input type="radio" name="maghe" value="<?=$i.$j ?>">
														<div class="number-box"><p><?=$i.$j ?></p></div>
													</div>
												</label>
											<?php else: ?> 
												<label  class="seat-box" for="">														
													<div class="number-box">																
														<input disabled type="radio" name="maghe" value="<?=$i.$j ?>">
														<div class="number-box"><p>X</p></div>
													</div>
												</label>
											<?php endif ?>
												
												
											
										<?php endfor ?>
									</div> 

								<?php endfor ?>

								<div class="error" name="name_error"><?php echo form_error('maghe')?></div>
								
								<div class="row justify-content-center mt-3">
									<input onClick="return confirmSubmit()" class="btn btn_kem btn-sm buy" type="submit" name="confirm" value="Xác nhận">
								</div>

			    			</div>
			    			<!-- end col-6 right -->
						</form>
				  </div>

				    </div>
				  </div>
				</form>
				<!-- end form -->
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
	
	<!-- footer -->
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
		var agree=confirm("Xác nhận mua vé?");
		if (agree)
		 return true ;
		else
		 return false ;
		}
	</script>
</body>
</html>