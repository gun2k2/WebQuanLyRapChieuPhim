<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LOGIN </title>
	<script src="<?php echo base_url(); ?>bootstrap/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/app.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/login.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/login_2.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>fonts/Roboto/Roboto-Light.ttf">
</head>
<style>
  .links i{
    margin-top: 12px;
  }

  .error p{
    color: #E1306C;
  }
</style>
<body>

  <div id="fb-root"></div>
<script type="text/javascript">
//<![CDATA[
window.fbAsyncInit = function() {
   FB.init({
     appId      : '860602481093739', // App ID
     channelURL : '', // khong bat buoc
     status     : true, // kiem tra trang thai dang nhap
     cookie     : true, // kích hoạt cookie để cho phép máy chủ truy cập phiên
     oauth      : true, //  kích hoạt OAuth 2.0
     xfbml      : false  // phân tích XFBML
   });
};
//dang nhap facebook :)))
function login(){
FB.getLoginStatus(function(r){
     if(r.status === 'connected'){
            window.location = 'trang-chu';
     }

     // chua login thi xuat hien man hinh dang nhap fb
     else{
        FB.login(function(response) {
                if(response.authResponse)
                 {
       
                  window.location = 'trang-chu';
                 } 
                 else
                 {
                  //chua dang nhap vao;
                 }
               
     },{scope:'email'}); // du lieu truy cap vao ho so member
 }
});
}
// Load SDK KHONG DONG BO
(function() {
   var e = document.createElement('script'); e.async = true;
   e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
   document.getElementById('fb-root').appendChild(e);
}());
//]]>
</script>
	
	<div class="">
    <div class="content row">

      <div class="left col-6">
        <header style="font-size: 28px; font-weight: 300; color: dimgray;">Login</header>
        <form name="user_id_login" method="post"  enctype="multidata/form-data">
          <div class="field">
            <span class="fa fa-user"></span>
            <input class="pad" type="text" id="email" name="email" required="" placeholder="Email">
          </div>
          <div class="field space">
            <span class="fa fa-lock"></span>
            <input class="pad" type="password" id="password" name="password" class="pass-key" required="" placeholder="Password">
            <span class="show">SHOW</span>
            
          </div>

          <div class="pass">
            <a style="color: gray; margin-left: 48px;" href="<?php echo base_url(); ?>forgotpassword"><small>Forgot Password?</small></a>
          </div>

          <div class="error" style="font-weight: italic; text-align: center;"> <?php echo form_error('login'); ?> </div>
          <div class="field">
            
            <input type="submit" value="LOGIN">
          </div>
        </form>
      </div>
      <!-- end left -->


      <div class="right col-6">
        <div class="login">
          Login with social network
        </div>
        <div class="links">
          <div class="facebook">
            
           <a href="#" onclick="login();"> <i class="fab fa-facebook-f"><span>Facebook</span></i> </a>
          </div>
          <div class="instagram">
            <i class="fab fa-instagram"><span>Instagram</span></i>
          </div>
        </div>
        <div class="signup">
          Don't have account?
          <a href="<?php echo base_url(); ?>dang-ky">Signup Now</a>
        </div>
      </div>
      <!-- end rihgt -->
  </div>    
</div>        

<!-- <script>
    const pass = document.querySelector('.pass-key');
    const showpass = document.querySelector('.show');
    showpass.addEventListener('click', function(){
      if(pass.type === "password"){
        pass.type = "text";
        showpass.textContent = "HIDE";
        showpass.style.color = "#3498db";
      }else{
        pass.type = "password";
       showpass.textContent = "SHOW";
        showpass.style.color = "#222";
      }
    });
  </script>   -->
	
</body>
</html>

