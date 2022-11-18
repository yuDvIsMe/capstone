<?php
session_start();
include("config.php");
$error="";
$msg=""; 
if(isset($_REQUEST['login']))
{
	$email=$_REQUEST['email'];
	$pass=$_REQUEST['pass'];
	
	$msg="";

	if(isset($pass)) {
	  $password = $pass;
	  $number = preg_match('@[0-9]@', $password);
	  $uppercase = preg_match('@[A-Z]@', $password);
	  $lowercase = preg_match('@[a-z]@', $password);
	  $specialChars = preg_match('@[^\w]@', $password);
	 
	  if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
		$msg = "<p class='alert alert-warning'>Mật khẩu phải có độ dài ít nhất 8 kí tự bao gồm số, chữ hoa, chữ thường và kí tự đặc biệt!";
	  } else
	  {
		  if(!empty($email) && !empty($pass))
	  {
		  $sql = "SELECT * FROM user where uemail='$email' && upass='$pass'";
		  $result=mysqli_query($con, $sql);
		  $row=mysqli_fetch_array($result);
			 if($row){
				 
				  $_SESSION['uid']=$row['uid'];
				  $_SESSION['uemail']=$email;
				  header("location:dashboard.php");
			 }
			 else{
				 $error = "<p class='alert alert-warning'>Email hoặc mật khẩu không chính xác.</p> ";
			 }
	  }else{
		  $error = "<p class='alert alert-warning'>Vui lòng điền đẩy đủ thông tin</p>";
	  }
	  }
	}
} 
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Moon Admin - Login</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="page-wrappers login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Đăng nhập vào iHome</h1>
								<?php echo $error; ?><?php echo $msg; ?>
								<p style="color:red;"><?php echo $error; ?></p>
								<!-- Form -->
								<form method="post">
									<div class="form-group">
										<input type="email"  name="email" class="form-control" placeholder="Email">
									</div>
									<div class="form-group">
										<input type="password" name="pass"  class="form-control" placeholder="Mật khẩu">
									</div>
									<p class="account-forgotpass"><a href="#" style="color: #000">Quên mật khẩu?</a></p>
									<button class="btn btn-primary" name="login" value="Login" type="submit">Đăng nhập</button>
								</form>
								
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								
								<!-- Social Login -->
								<div class="social-login">
									<span>Login with</span>
									<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
									<a href="#" class="google"><i class="fa fa-google"></i></a>
									<a href="#" class="facebook"><i class="fa fa-twitter"></i></a>
									<a href="#" class="google"><i class="fa fa-instagram"></i></a>
								</div>
								<!-- /Social Login -->
								
								<div class="text-center dont-have">Don't have an account? <a href="register.php">Register</a></div>
								
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
    </body>

</html>