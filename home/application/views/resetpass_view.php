
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>RESET PASSWORD</title>
	<script src="<?php echo base_url(); ?>bootstrap/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/app.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/login.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/fontawesome/css/all.min.css">
	<style>
		
	</style>
</head>
<body>
	
	<div class="">

    <div style="width: 300px; height: 200px;" class="content">
      <header><h5>RESET PASSWORD</h5></header>
	     <form action="<?php echo base_url(); ?>login_controller/updatepass" method="post"  enctype="multidata/form-data">
	        <div class="text-center" >
	          	<div class="form-group">
	          		<input type="password" id="email" name="password" required="" placeholder="password">
					<p class="help-block text-danger"></p>
				</div>
	        </div>

	        <div class="text-center" >
	          	<div class="form-group">
	          	<input type="password" id="email" name="re_password" required="" placeholder="confirm password">
					<p class="help-block text-danger"></p>
				</div>
	        </div>

	        <div style="color: red; font-weight: bold; text-align: center;">  <?=$this->session->flashdata('message');?> </div>
	        <div class="field">
	          	<input class="phuong" type="submit" value="Submit">
	        </div>
	     </form>
	</div>
      
  </div>

 	   


	
</body>
</html>

