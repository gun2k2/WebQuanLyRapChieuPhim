<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Registration</title>
	<script src="<?php echo base_url(); ?>bootstrap/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/app.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/css1.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/signup.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/fontawesome/css/all.min.css">
  	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/Roboto/Roboto-Light.ttf">
  	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/Roboto/Roboto-Regular.ttf">
  	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/Roboto/Roboto-Medium.ttf">
  	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/Roboto/Roboto-Thin.ttf">
	<style>
		.textbox input{
			font-size: 16px;
			margin-top: 2px;
		}
	</style>
</head>
<body>
	
	<div class="loginbox">
		<div class="row justify-content-center">
			<h1>Registration</h1>
		</div>
		<form  method="post"  enctype="multidata/form-data">

		<div class="textbox clearfix">
			<div class="row">
				<input placeholder="Username" type="text" id="name" name="name" required>
			</div>
			<div class="error" name="name_error"><?php echo form_error('name')?></div>
		</div>

		<div class="textbox clearfix">
			<div class="row">
				<input placeholder="E-mail" type="email" id="email" name="email" required>
			</div>
			<div class="error" name="name_error"><?php echo form_error('email')?></div>
		</div>

		<div class="textbox clearfix">
			<div class="row">
				<input placeholder="Phone's number" type="text" id="phone" name="sdt" required>
			</div>
			<div class="error" name="name_error"><?php echo form_error('sdt')?></div>
		</div>
		
		<div class="textbox"> 
			<div class="row">
				<input placeholder="Password" type="Password" id="password" name="password" required>
			</div>
			<div class="error" name="name_error"><?php echo form_error('password')?></div>
			
		</div>
		<div class="textbox"> 
			<div class="row">
				<input placeholder="Retype password" type="Password" id="confirm" name="confirm" required>
			</div>
			<div class="error" name="name_error"><?php echo form_error('confirm')?></div>
		</div>
		<div class="textbox clearfix">
		
		
		<span class="wpcf7-list-item">
		<input type="checkbox" name="acceptance-886" required="" value="1" aria-invalid="false" class="check-terms" />
		
		</span>Tôi đồng ý với các điều khoản sử dụng.</div>
		
			
	
		<div style="color: red; font-weight: bold; text-align: center;"></div> 

		<div class="row">
			<input type="submit"  class="btn btn_turquoise" value="Registration" >
		</div>
		
		<div class="row">
			<a href="<?php echo base_url() ?>dang-nhap" class="btn btn-info">
				<i class="fa fa-chevron-left mr-2"></i>Back
			</a>
		</div>


		</form>
	</div>
	
	
	

	
</body>
</html>

