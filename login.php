<?php
session_start();
include("config.php");
$error = "";
$msg = "";
if (isset($_REQUEST['login'])) {
	$email = $_REQUEST['email'];
	$pass = $_REQUEST['pass'];

	$msg = "";

	if (isset($pass)) {
		$password = $pass;
		$number = preg_match('@[0-9]@', $password);
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$specialChars = preg_match('@[^\w]@', $password);

		if (strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
			$msg = "<p class='alert alert-warning'>Mật khẩu phải có độ dài ít nhất 8 kí tự bao gồm số, chữ hoa, chữ thường và kí tự đặc biệt!";
		} else {
			if (!empty($email) && !empty($pass)) {
				$checkpass = md5($pass);
				$sql = "SELECT * FROM user where uemail='$email' && upass='$checkpass'";
				$result = mysqli_query($con, $sql);
				$row = mysqli_fetch_array($result);
				if ($row) {

					$_SESSION['uid'] = $row['uid'];
					$_SESSION['uemail'] = $email;
					header("location:index.php");
				} else {
					$error = "<p class='alert alert-warning'>Email hoặc mật khẩu không chính xác.</p> ";
				}
			} else {
				$error = "<p class='alert alert-warning'>Vui lòng điền đẩy đủ thông tin</p>";
			}
		}
	}
}

function randomPassword($size = 8)
{
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
	$length = rand(16, 22);
	$password = substr(str_shuffle(sha1(rand() . time()) . $chars), 0, $length);
	return $password;
}

$errorRe_pass = "";
function newPassSend($mail_address, $psw)
{
	require "PHPMailer/src/PHPMailer.php";
	require "PHPMailer/src/SMTP.php";
	require 'PHPMailer/src/Exception.php';
	$mail = new PHPMailer\PHPMailer\PHPMailer(true); //true:enables exceptions
	try {
		$mail->SMTPDebug = 0; //0,1,2: chế độ debug
		$mail->isSMTP();
		$mail->CharSet  = "utf-8";
		$mail->Host = 'smtp.gmail.com';  //SMTP servers
		$mail->SMTPAuth = true; // Enable authentication
		$mail->Username = 'ihome.contact.dn@gmail.com'; // SMTP username
		$mail->Password = 'cqsacnnopgxmxdqx';   // SMTP password
		$mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
		$mail->Port = 465;  // port to connect to                
		$mail->setFrom('ihome.contact.dn@gmail.com', 'iHome Support');
		$mail->addAddress($mail_address);
		$mail->isHTML(true);  // Set email format to HTML
		$mail->Subject = 'Thư gửi lại mật khẩu từ iHome';
		$noidungthu = "<p>Bạn nhận được email này từ đội ngũ support của iHome do bạn hoặc một ai đó đã yêu cầu reset mật khẩu từ website của iHome</p>
				Mật khẩu của bạn là: {$psw}";
		$mail->Body = $noidungthu;
		$mail->smtpConnect(array(
			"ssl" => array(
				"verify_peer" => false,
				"verify_peer_name" => false,
				"allow_self_signed" => true
			)
		));
		$mail->send();
		echo '<script language="javascript">alert("Mật khẩu mới đã được gửi vào địa chỉ email của bạn, vui lòng kiểm tra hộp thư đến và nhận lại mật khẩu."); window.location="login.php";</script>';
	} catch (Exception $e) {
		echo 'Error: ', $mail->ErrorInfo;
	}
}


if (isset($_POST['repass'])) {
	$re_email = $_POST['re_email'];
	$conn = new PDO("mysql:host=localhost;dbname=ihome;charset=utf8", "root", "");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "SELECT * FROM user where uemail = ?";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$re_email]);
	$count = $stmt->rowCount();
	if ($count == 0) {
		echo '<script language="javascript">alert("Email của bạn chưa đăng ký thành viên tại iHome, vui lòng kiểm tra lại địa chỉ email, hoặc đăng ký thành viên để tiếp tục."); window.location="login.php";</script>';
	} else {
		$new_pass = randomPassword();
		$hashNewPass = md5($new_pass);
		$sql = "UPDATE user SET upass = ? where uemail = ?";
		$stmt = $conn->prepare($sql);
		$stmt->execute([$hashNewPass, $re_email]);
		newPassSend($re_email, $new_pass);
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
	<title>Login to iHome - iHome | Giao dịch, cho thuê nhà đất uy tín hàng đầu</title>
</head>

<body>


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
							<h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Đăng nhập</b></h2>
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
									<h1>Đăng nhập vào iHome</h1>
									<p class="account-subtitle">Xây những giá trị, dựng những ước mơ</p>
									<?php echo $error; ?><?php echo $msg; ?>
									<!-- Form -->
									<form method="post">
										<div class="form-group">
											<input type="email" name="email" class="form-control" value="<?php if (!empty($email)) echo $email ?>" required placeholder="Email">
										</div>
										<div class="form-group showpsw">
											<input type="password" name="pass" class="form-control psw" placeholder="Mật khẩu">
											<span class="show-btn"><i class="fas fa-eye"></i></span>
										</div>
										<p class="account-forgotpass"><a href="#" data-target="#pwdModal" data-toggle="modal" style="color: #000">Quên mật khẩu?</a></p>
										<button class="btn btn-primary" name="login" value="Login" type="submit">Đăng nhập</button>
									</form>
									<div class="login-or">
										<span class="or-line"></span>
										<span class="span-or">or</span>
									</div>

									<!-- Social Login -->
									<div class="social-login">
										<span>Đăng nhập với</span>
										<a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
										<a href="#" class="google"><i class="fab fa-google-plus-g"></i></a>
										<a href="#" class="facebook"><i class="fab fa-twitter"></i></a>
									</div>
									<div class="text-center dont-have">Bạn chưa có tài khoản? <a href="register.php" style="color: #000">Đăng kí ngay!</a></div>

								</div>
							</div>
						</div>

						<div id="pwdModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="text-center">Quên mật khẩu</h1>
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									</div>

									<div class="modal-body">
										<div class="col-md-12">
											<div class="panel panel-default">
												<div class="panel-body">
													<div class="text-center">
														<div class="panel-body">
															<form action="" method="POST">
																<div class="form-group">
																	<input class="form-control input-lg" placeholder="Hãy nhập email để nhận lại mật khẩu" name="re_email" type="email">
																</div>
																<button class="btn btn-primary btn-block" name="repass" value="Xác nhận" type="submit">Xác nhận</button>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<div class="col-md-12">
											<button class="btn btn-fgp" data-dismiss="modal" aria-hidden="true">Quay lại</button>
										</div>
									</div>
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
</body>

</html>