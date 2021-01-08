<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chọn ghế</title>
	<script src="<?php echo base_url(); ?>bootstrap1/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap1/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js1/app.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css1/chonghe.css">
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

		label.seat-box .number-box input[disabled] ~ .number-box{
			background-color: #e71a0f;
		}

		label.seat-box .number-box input[disabled]{
			cursor: not-allowed;
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
						<h5>Chọn Ghế</h5>
					</div>
				</div>
				<div style="color: red; font-weight: bold; text-align: center;">  <?=$this->session->flashdata('message'); ?>
			</div>
				
				<!-- form -->
				<form action="<?php echo base_url(); ?>admin/quanlyve_controller/addve" id="form" class="form"  method="post"  enctype="multidata/form-data">

				<div class="tab-content">
					<div id="home" class="container tab-pane active"><br>
<!-- Dòng cần thiết để chuyển số thành chữ -->
					<?php $CI =& get_instance(); $CI->load->model('admin/showphim_model'); $CI->load->model('admin/showphong_model');?> 
<!--END Dòng cần thiết để chuyển số thành chữ -->					
							

				
				
				
			
				 <div class="form-group row justify-content-center">
				    <div class="col-4">
				    	<form  method="post">
				    		<?php foreach ($mangketqua as  $value):?>
				    			<input type="hidden" name= "lichchieu" value="<?=$value['id'] ?>">
								<input type="hidden" name= "tenphim" value="<?=$value['tenphim'] ?>">
								
								<?php $mave = $value['tenphim'].$value['id'] ?>
								<?php echo "Tên phim: ".$CI->showphim_model->ktdanhmuc($value['tenphim'])."<br>" ?>
								<?php echo $CI->showphong_model->ktdanhmuc($value['phong'])."<br>" ?>
								<?php echo "Ngày chiếu: ".$value['ngaychieu']."<br>" ?>
								<?php echo "Giờ chiếu: ".$value['thoigian']."<br>" ?>

				    		<?php endforeach ?>
				   
							
				    		<div style="margin-bottom: 50px;" class="form-group row">
							    <div class="col-sm-7">
							      <input name="ma_voucher"  type="text" class="form-control" id="maVoucher" placeholder="Mã voucher">
							    <div class="error" name="name_error"><?php echo form_error('ma_voucher')?></div>
							    </div>
							</div>
							

							
							<div style="width: 100%;height: 100px;perspective: 100px;position: relative;box-sizing: border-box; top: 7px; left: -26px;" class="screen-box mb-3">
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
								<input onClick="return confirmSubmit()" class="btn btn_red btn-sm buy" type="submit" name="confirm" value="Xác nhận">
							</div>
						</form>
				    </div>
				  </div>
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
		function confirmSubmit()
		{
		var agree=confirm("Xác nhận mua vé? ");
		if (agree)
		 return true ;
		else
		 return false ;
		}
	</script>

</body>
</html>