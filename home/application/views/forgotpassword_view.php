
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Forgotpassword</title>
	<script src="<?php echo base_url(); ?>bootstrap/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/app.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/login.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/forgot.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/fontawesome/css/all.min.css">
	<style>
		body{
			background-color: #ddd;
		}
		.content{height: 185px;}
	</style>
</head>
<body> 
	 

	<div class="">
	    <div class="content">
		      <form action="<?=base_url('login_controller/resetlink')?>" method="post"  enctype="multidata/form-data">
		      	<div class="field">
		   			<h5>FORGOT YOUR PASSWORD?</h5>
		      	</div>

		        <div class="field">
		          <input type="text" id="email" name="email" required="" placeholder="Email">
		        </div>
		       
		       	<div style="color: red; font-weight: bold; text-align: center;">  <?=$this->session->flashdata('message'); ?> 
		         </div>

		        <div class="field">
		          <input type="submit" value="Send Reset Link">
		        </div>

		        <div class="field">
			    	<a href="<?php echo base_url() ?>dang-nhap" class="btn btn-info"><i class="fa fa-chevron-left"></i>		</a>
		        </div>
		      </form>
	  	</div>
	</div>
</body>
</html>

