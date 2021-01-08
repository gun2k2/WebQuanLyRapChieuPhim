
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>LOGIN ADMIN</title>
	<script src="<?php echo base_url(); ?>bootstrap/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/app.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/login.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/login_2.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/fontawesome/css/all.min.css">
</head>
<body>
	
	<div class="">
    <div class="content row">
      <!-- left -->
      <div class="left col-6">
          <header style="font-size: 28px; font-weight: 300; color: dimgray;">Login</header>
          <form method="post"  enctype="multidata/form-data">

            <div class="field">
              <span class="fa fa-user"></span>
              <input class="pad" type="text" id="username" name="username" required="" placeholder="Username">
            </div>

            <div class="field space">
              <span class="fa fa-lock"></span>
              <input class="pad" type="password" id="password" name="password" class="pass-key" required="" placeholder="Password">
              <span class="show">SHOW</span>
            </div>

            <div class="pass">
              <a style="color: gray; margin-left: 48px;" href="https://www.facebook.com/phuongnenenha"><small>Forgot Password?</small></a>
            </div>

            <div class="field">
              <div style="color: red; font-weight: bold; text-align: center;"> <?php echo form_error('login'); ?> </div> 
              <input type="submit" value="LOGIN">
            </div>

          </form>
      </div>
      <!-- end left -->
      
      <!-- right -->
      <div class="right col-6">
          <div class="login">
              Or login with
          </div>
          <div class="links">
            <div class="facebook">
              <i class="fab fa-facebook-f"><span>Facebook</span></i>
            </div>
            <div class="instagram">
              <i class="fab fa-instagram"><span>Instagram</span></i>
            </div>
          </div>
          <div class="signup">
              Don't have account?
              <a href="https://www.facebook.com/phuongnenenha">Signup Now</a>
          </div>
      </div>
      <!-- end right -->



      
  </div>            
	

	
</body>
</html>

