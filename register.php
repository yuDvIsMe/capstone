<?php
include("config.php");
$error = "";
$msg = "";
if (isset($_REQUEST['reg'])) {
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$phone = $_REQUEST['phone'];
	$pass = $_REQUEST['pass'];
	$repass = $_REQUEST['repass'];

	$query = "SELECT * FROM user where uemail='$email'";
	$res = mysqli_query($con, $query);
	$num = mysqli_num_rows($res);

	if (isset($pass)) {
		$password = $pass;
		$number = preg_match('@[0-9]@', $password);
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$specialChars = preg_match('@[^\w]@', $password);

		if (strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
			$msg = "<p class='alert alert-warning'>Mật khẩu phải có độ dài ít nhất 8 kí tự bao gồm số, chữ hoa, chữ thường và kí tự đặc biệt!";
		} else {
			if ($num == 1) {
				$error = "<p class='alert alert-warning'>Email đã tồn tại</p> ";
			} else {
				if ($pass == $repass) {
					$hashedpass = md5($pass);
					$sql = "INSERT INTO user (uname,uemail,uphone,upass) VALUES ('$name','$email','$phone','$hashedpass')";
					$result = mysqli_query($con, $sql);
					if ($result) {
						echo '<script language="javascript">alert("Đăng ký thành công"); window.location="login.php";</script>';
					} else {
						echo '<script language="javascript">alert("Có vấn đề gì đó, vui lòng thử lại"); window.location="register.php";</script>';
					}
				} else {
					$error = "<p class='alert alert-warning'>Mật khẩu không trùng khớp</p>";
				}
			}
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Meta Tags -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="images/favicon.ico">

	<!--	Fonts
	========================================================-->
	<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

	<!--	Css Link
	========================================================-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/layerslider.css">
	<link rel="stylesheet" type="text/css" href="css/color.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">

	<!--	Title
	=========================================================-->
	<title>Sign up - iHome | Giao dịch, cho thuê nhà đất uy tín hàng đầu</title>
</head>

<body>

	<!--	Page Loader
=============================================================
<div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
	<div class="d-flex justify-content-center y-middle position-relative">
	  <div class="spinner-border" role="status">
		<span class="sr-only">Loading...</span>
	  </div>
	</div>
</div>
-->


	<div id="page-wrapper">
		<div class="row">
			<!--	Header start  -->
			<?php include("include/header.php"); ?>
			<!--	Header end  -->

			<!--	Banner   --->
			<div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Đăng ký</b></h2>
						</div>
					</div>
				</div>
			</div>
			<!--	Banner   --->



			<div class="page-wrappers login-body full-row bg-gray">
				<div class="login-wrapper">
					<div class="container">
						<div class="loginbox">
							<div class="login-right">
								<div class="login-right-wrap">
									<h1>Đăng ký</h1>
									<p class="account-subtitle">Xây những giá trị, dựng những ước mơ</p>
									<?php echo $error; ?><?php echo $msg; ?>
									<!-- Form -->
									<form method="post" enctype="multipart/form-data">
										<div class="form-group">
											<input type="text" name="name" class="form-control" required placeholder="Họ và tên" value="<?php if(!empty($name)) echo $name?>">
										</div>
										<div class="form-group">
											<input onblur="checkun(this)" id="email" type="email" name="email" class="form-control" required placeholder="Địa chỉ email" value="<?php if(!empty($email)) echo $email?>">
											<em id="username-error" class="form-text text-danger pl-2"></em>
										</div>
										<div class="form-group">
											<input type="tel" name="phone" class="form-control" required placeholder="Số điện thoại" maxlength="10" value="<?php if(!empty($phone)) echo $phone?>">
										</div>
										<div class="form-group showpsw">
											<input type="password" name="pass" class="form-control psw" required placeholder="Mật khẩu">
											<span class="show-btn"><i class="fas fa-eye"></i></span>
										</div>
										<div class="form-group showpsw">
											<input type="password" name="repass" class="form-control psw" required placeholder="Nhập lại mật khẩu">
										</div>
										<button class="btn btn-primary" name="reg" value="Register" type="submit">Đăng ký</button>
									</form>

									<div class="text-center dont-have">Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--	login  -->


			<!--	Footer   start-->
			<?php include("include/footer.php"); ?>
			<!--	Footer   start-->

			<!-- Scroll to top -->
			<a href="#" class="bg-primary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a>
			<!-- End Scroll To top -->
		</div>
	</div>
	<!-- Wrapper End -->

	<!--	Js Link
============================================================-->
	<script src="js/jquery.min.js"></script>
	<!--jQuery Layer Slider -->
	<script src="js/greensock.js"></script>
	<script src="js/layerslider.transitions.js"></script>
	<script src="js/layerslider.kreaturamedia.jquery.js"></script>
	<!--jQuery Layer Slider -->
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/tmpl.js"></script>
	<script src="js/jquery.dependClass-0.1.js"></script>
	<script src="js/draggable-0.1.js"></script>
	<script src="js/jquery.slider.js"></script>
	<script src="js/wow.js"></script>
	<script src="js/custom.js"></script>
	<div class="modal" tabindex="-1" role="dialog">
	<script>
		const passField = document.querySelector(".psw");
		const showBtn = document.querySelector("span i");
		showBtn.onclick = (() => {
			if (passField.type === "password") {
				passField.type = "text";
				showBtn.classList.add("hide-btn");
			} else {
				passField.type = "password";
				showBtn.classList.remove("hide-btn");
			}
		});
	</script>
	<script>
		function checkun(obj){
			var email = obj.value;
			var url = "http://localhost/C1SE.41_REEW.SourceCode/register_checkun.php?email=" + email;
			fetch(url)
			.then(d=>d.json())
			.then(data=>{
				if(data.count>0){
					document.getElementById('username-error').innerText = "Email này đã được sử dụng rồi"
				}else{
					document.getElementById('username-error').innerText = "";
				} 
					
			})
		}
		
	</script>

</div>
</body>


</html>