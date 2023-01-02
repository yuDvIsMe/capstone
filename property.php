<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");
$fmt = numfmt_create( 'vi_VN', NumberFormatter::CURRENCY );
///code								
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
    <meta name="description" content="ihome template">
    <meta name="keywords" content="">
    <meta name="author" content="Unicoder">
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
    <link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!--	Title
	=========================================================-->
    <title>iHome | Giao dịch, cho thuê nhà đất uy tín hàng đầu</title>
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
                            <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>DANH SÁCH CĂN HỘ</b></h2>
                        </div>
                    </div>
                </div>
            </div>
            <!--	Banner   --->

            <!--	Property Grid
		===============================================================-->
            <div class="full-row">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8">
                            <div class="row">
                                <?php
                                $query = mysqli_query($con, "SELECT property.*, user.uname,user.uimage FROM `property`,`user` WHERE property.uid=user.uid &&property.status='Khả dụng'");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>

                                    <div class="col-md-6">
                                        <div class="featured-thumb hover-zoomer mb-4">
                                            <div class="overlay-black overflow-hidden position-relative"> <img class="property-img" src="admin/property/<?php echo $row['17']; ?>" alt="pimage">
                                                <div class="sale text-white" style="background-color: #17c788;"><?php echo $row['5']; ?></div>
                                                <div class="price text-primary text-capitalize"><?php echo numfmt_format_currency($fmt, $row['13'], "VND");?></div>
                                            </div>
                                            <div class="featured-thumb-data shadow-one">
                                                <div class="p-3">
                                                    <h5 class="text-secondary hover-text-primary mb-2 text-capitalize" style="width: 340px;height:60px"><a href="propertydetail.php?pid=<?php echo $row['0']; ?>"><?php echo $row['1']; ?></a></h5>
                                                    <span class="location text-capitalize"><i class="fas fa-map-marker-alt text-primary"></i> <?php echo $row['14']; ?></span>
                                                </div>
                                                <div class="bg-gray quantity px-4 pt-4">
                                                    <ul>
                                                        <li>Phòng ngủ: <?php echo $row['6']; ?></li>
                                                        <li>Phòng tắm: <?php echo $row['7']; ?></li>
                                                        <li>Bếp: <?php echo $row['9']; ?></li>
                                                        <li>Bang công: <?php echo $row['8']; ?></li>
                                                        <li>Diện tích: <?php echo $row['12']; ?> m<sup>2</li>
                                                    </ul>
                                                </div>
                                                <div class="p-4 d-inline-block w-100">
                                                    <div class="float-left text-capitalize"><i class="fas fa-user text-primary mr-1"></i>Người đăng: <?php echo $row['uname']; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="sidebar-widget">
                                <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Mới thêm gần đây</h4>
                                <ul class="property_list_widget">

                                    <?php
                                    $query = mysqli_query($con, "SELECT * FROM `property` ORDER BY date DESC LIMIT 6");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <li> 
                                            <div>
                                                <img style="height: 80px;" src="admin/property/<?php echo $row['17']; ?>" alt="pimage">
                                            </div>
                                            <div class="widget-pro" style="display: flex; flex-direction: column;">
                                                <h6 class="text-secondary hover-text-primary text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0']; ?>"><?php echo $row['1']; ?></a></h6>
                                                <span class="font-14"><i class="fas fa-map-marker-alt icon-primary icon-small"></i> <?php echo $row['14']; ?></span>
                                            </div>
                                        </li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


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