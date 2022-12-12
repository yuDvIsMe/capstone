<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");
if (!isset($_SESSION['uemail'])) {
    header("location:login.php");
}

$user_email = $_SESSION['uemail'];

$error = "";

if (isset($_POST['changepw'])) {
    $old_pass = $_POST['pass_old'];
    $new_pass = $_POST['pass_new1'];
    $re_new_pass = $_POST['pass_new2'];
    $conn = new PDO("mysql:host=localhost;dbname=ihome;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM user where uemail= ? and upass =?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user_email, $old_pass]);
    if ($stmt->rowCount() == 0) {
        $error = "<p class='alert alert-warning'>Mật khẩu cũ không đúng";
    } elseif (isset($new_pass)) {
        $number = preg_match('@[0-9]@', $new_pass);
        $uppercase = preg_match('@[A-Z]@', $new_pass);
        $lowercase = preg_match('@[a-z]@', $new_pass);
        $specialChars = preg_match('@[^\w]@', $new_pass);

        if (strlen($new_pass) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
            $error = "<p class='alert alert-warning'>Mật khẩu phải có độ dài ít nhất 8 kí tự bao gồm số, chữ hoa, chữ thường và kí tự đặc biệt!";
        } elseif ($new_pass != $re_new_pass) {
            $error = "<p class='alert alert-warning'>Mật khẩu mới chưa trùng khớp";
        } else {
            $sql = "UPDATE user SET upass =? where uemail = ? ";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$new_pass, $user_email]);
            $_SESSION = array();
            session_destroy();
            echo '<script language="javascript">alert("Đổi mật khẩu thành công, vui lòng đăng nhập lại."); window.location="login.php";</script>';
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
    <title>iHome | Giao dịch, cho thuê nhà đất uy tín hàng đầu</title>
</head>

<body>

    <div id="page-wrapper">
        <div class="row">
            <!--	Header start  -->
            <?php include("include/header.php"); ?>
            <!--	Header end  -->

            <!-- Banner   --->
            <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Đổi mật khẩu</b></h2>
                        </div>
                    </div>
                </div>
            </div>
            <!--	Banner   - -->


            <!--	Submit property   -->
            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="text-secondary double-down-line text-center">Đổi mật khẩu</h2>
                        </div>
                    </div>
                    <?php
                    $uid = $_SESSION['uid'];
                    $query = mysqli_query($con, "SELECT * FROM `user` WHERE uid='$uid'");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <div class="col-md-9 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form-horizontal" method="POST" action="">
                                        <?php echo $error; ?>
                                        <p> <label class="control-label">Email:</label>
                                            <input class="form-control" disabled value="<?php echo $row['2']; ?>">
                                        </p>
                                        <p> <label>Mật khẩu cũ</label>
                                            <input type="password" class="form-control" name="pass_old">
                                        </p>
                                        <p> <label>Mật khẩu mới:</label>
                                            <input type="password" class="form-control" name="pass_new1">
                                        </p>
                                        <p><label>Gõ lại mật khẩu mới:</label>
                                            <input type="password" class="form-control" name="pass_new2">
                                        </p>
                                        <p><button type="submit" name="changepw" class="btn btn-primary">Đổi mật khẩu</button></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!--	Submit property   -->


            <!--	Footer   start-->
            <?php include("include/footer.php"); ?>
            <!--	Footer   start-->

            <!-- Scroll to top -->
            <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a>
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
</body>

</html>