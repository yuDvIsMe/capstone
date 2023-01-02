<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");
$fmt = numfmt_create('vi_VN', NumberFormatter::CURRENCY);
///search code

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
    <meta name="description" content="Homex template">
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
                            <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Tìm kiếm</b></h2>
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

                                if (isset($_REQUEST['filter'])) {
                                    $type = $_REQUEST['type'];
                                    $stype = $_REQUEST['stype'];
                                    $city = $_REQUEST['city'];

                                    $sql = "SELECT * FROM property WHERE type='{$type}' and stype='{$stype}' and city='{$city}'&&status='Khả dụng'";
                                    $result = mysqli_query($con, $sql);

                                    $sql1 = "SELECT * FROM property where status='Khả dụng'";
                                    $result1 = mysqli_query($con, $sql1);

                                    $sql2 = "SELECT * FROM property where city='{$city}'&&status='Khả dụng'";
                                    $result2 = mysqli_query($con, $sql2);

                                    $sql3 = "SELECT * FROM property where type='{$type}'&&status='Khả dụng'";
                                    $result3 = mysqli_query($con, $sql3);

                                    $sql4 = "SELECT * FROM property where stype='{$stype}'&&status='Khả dụng'";
                                    $result4 = mysqli_query($con, $sql4);

                                    if (!empty($stype) && empty($type) && empty($city)) {
                                        while ($row = mysqli_fetch_array($result4)) {
                                ?>
                                            <div class="col-md-6">
                                                <div class="featured-thumb hover-zoomer mb-4">
                                                    <div class="overlay-black overflow-hidden position-relative"> <img class="property-img" src="admin/property/<?php echo $row['17']; ?>" alt="pimage">
                                                        <div class="sale bg-secondary text-white text-capitalize"><?php echo $row['5']; ?></div>
                                                        <div class="price text-primary"><b><?php echo numfmt_format_currency($fmt, $row['13'], "VND"); ?></b></div>
                                                    </div>
                                                    <div class="featured-thumb-data shadow-one">
                                                        <div class="p-3">
                                                            <h5 class="text-secondary hover-text-primary mb-2 text-capitalize title-pro"><a href="propertydetail.php?pid=<?php echo $row['0']; ?>"><?php echo $row['1']; ?></a></h5>
                                                            <div class="address-pro">
                                                                <span class="location text-capitalize"><i class="fas fa-map-marker-alt text-primary"></i> <?php echo $row['14']; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="bg-gray quantity px-4 pt-4">
                                                            <ul>
                                                                <li>Loại nhà ở: <?php echo $row['3']; ?></li>
                                                                <li>Phòng ngủ: <?php echo $row['6']; ?></li>
                                                                <li>Phòng tắm: <?php echo $row['7']; ?></li>
                                                                <li>Bếp: <?php echo $row['9']; ?></li>
                                                                <li>Diện tích: <?php echo $row['12']; ?> m<sup>2</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    } elseif (empty($stype) && !empty($type) && empty($city)) {
                                        while ($row = mysqli_fetch_array($result3)) {
                                        ?>
                                            <div class="col-md-6">
                                                <div class="featured-thumb hover-zoomer mb-4">
                                                    <div class="overlay-black overflow-hidden position-relative"> <img class="property-img" src="admin/property/<?php echo $row['17']; ?>" alt="pimage">
                                                        <div class="sale bg-secondary text-white text-capitalize"><?php echo $row['5']; ?></div>
                                                        <div class="price text-primary"><b><?php echo numfmt_format_currency($fmt, $row['13'], "VND"); ?></b></div>
                                                    </div>
                                                    <div class="featured-thumb-data shadow-one">
                                                        <div class="p-3">
                                                            <h5 class="text-secondary hover-text-primary mb-2 text-capitalize title-pro"><a href="propertydetail.php?pid=<?php echo $row['0']; ?>"><?php echo $row['1']; ?></a></h5>
                                                            <span class="location text-capitalize"><i class="fas fa-map-marker-alt text-primary"></i> <?php echo $row['14']; ?></span>
                                                        </div>
                                                        <div class="bg-gray quantity px-4 pt-4">
                                                            <ul>
                                                                <li>Loại nhà ở: <?php echo $row['3']; ?></li>
                                                                <li>Phòng ngủ: <?php echo $row['6']; ?></li>
                                                                <li>Phòng tắm: <?php echo $row['7']; ?></li>
                                                                <li>Bếp: <?php echo $row['9']; ?></li>
                                                                <li>Diện tích: <?php echo $row['12']; ?> m<sup>2</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    } elseif (empty($stype) && empty($type) && !empty($city)) {
                                        while ($row = mysqli_fetch_array($result2)) {
                                        ?>
                                            <div class="col-md-6">
                                                <div class="featured-thumb hover-zoomer mb-4">
                                                    <div class="overlay-black overflow-hidden position-relative"> <img class="property-img" src="admin/property/<?php echo $row['17']; ?>" alt="pimage">
                                                        <div class="sale bg-secondary text-white text-capitalize"><?php echo $row['5']; ?></div>
                                                        <div class="price text-primary"><b><?php echo numfmt_format_currency($fmt, $row['13'], "VND"); ?></b></div>
                                                    </div>
                                                    <div class="featured-thumb-data shadow-one">
                                                        <div class="p-3">
                                                            <h5 class="text-secondary hover-text-primary mb-2 text-capitalize title-pro"><a href="propertydetail.php?pid=<?php echo $row['0']; ?>"><?php echo $row['1']; ?></a></h5>
                                                            <span class="location text-capitalize"><i class="fas fa-map-marker-alt text-primary"></i> <?php echo $row['14']; ?></span>
                                                        </div>
                                                        <div class="bg-gray quantity px-4 pt-4">
                                                            <ul>
                                                                <li>Loại nhà ở: <?php echo $row['3']; ?></li>
                                                                <li>Phòng ngủ: <?php echo $row['6']; ?></li>
                                                                <li>Phòng tắm: <?php echo $row['7']; ?></li>
                                                                <li>Bếp: <?php echo $row['9']; ?></li>
                                                                <li>Diện tích: <?php echo $row['12']; ?> m<sup>2</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    } elseif (empty($type) && empty($stype) && empty($city)) {
                                        while ($row = mysqli_fetch_array($result1)) {
                                        ?>
                                            <div class="col-md-6">
                                                <div class="featured-thumb hover-zoomer mb-4">
                                                    <div class="overlay-black overflow-hidden position-relative"> <img class="property-img" src="admin/property/<?php echo $row['17']; ?>" alt="pimage">
                                                        <div class="sale bg-secondary text-white text-capitalize"><?php echo $row['5']; ?></div>
                                                        <div class="price text-primary"><b><?php echo numfmt_format_currency($fmt, $row['13'], "VND"); ?></b></div>
                                                    </div>
                                                    <div class="featured-thumb-data shadow-one">
                                                        <div class="p-3">
                                                            <h5 class="text-secondary hover-text-primary mb-2 text-capitalize title-pro"><a href="propertydetail.php?pid=<?php echo $row['0']; ?>"><?php echo $row['1']; ?></a></h5>
                                                            <span class="location text-capitalize"><i class="fas fa-map-marker-alt text-primary"></i> <?php echo $row['14']; ?></span>
                                                        </div>
                                                        <div class="bg-gray quantity px-4 pt-4">
                                                            <ul>
                                                                <li>Loại nhà ở: <?php echo $row['3']; ?></li>
                                                                <li>Phòng ngủ: <?php echo $row['6']; ?></li>
                                                                <li>Phòng tắm: <?php echo $row['7']; ?></li>
                                                                <li>Bếp: <?php echo $row['9']; ?></li>
                                                                <li>Diện tích: <?php echo $row['12']; ?> m<sup>2</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    } elseif (mysqli_num_rows($result) > 0) {
                                        if ($result == true) {
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <div class="col-md-6">
                                                    <div class="featured-thumb hover-zoomer mb-4">
                                                        <div class="overlay-black overflow-hidden position-relative"> <img class="property-img" src="admin/property/<?php echo $row['17']; ?>" alt="pimage">
                                                            <div class="sale bg-secondary text-white text-capitalize"><?php echo $row['5']; ?></div>
                                                            <div class="price text-primary"><b><?php echo numfmt_format_currency($fmt, $row['13'], "VND"); ?></b></div>
                                                        </div>
                                                        <div class="featured-thumb-data shadow-one">
                                                            <div class="p-3">
                                                                <h5 class="text-secondary hover-text-primary mb-2 text-capitalize title-pro"><a href="propertydetail.php?pid=<?php echo $row['0']; ?>"><?php echo $row['1']; ?></a></h5>
                                                                <span class="location text-capitalize"><i class="fas fa-map-marker-alt text-primary"></i> <?php echo $row['14']; ?></span>
                                                            </div>
                                                            <div class="bg-gray quantity px-4 pt-4">
                                                                <ul>
                                                                    <li>Loại nhà ở: <?php echo $row['3']; ?></li>
                                                                    <li>Phòng ngủ: <?php echo $row['6']; ?></li>
                                                                    <li>Phòng tắm: <?php echo $row['7']; ?></li>
                                                                    <li>Bếp: <?php echo $row['9']; ?></li>
                                                                    <li>Diện tích: <?php echo $row['12']; ?> m<sup>2</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                <?php
                                            }
                                        }
                                    } else {

                                        echo "<h1 class='mb-5'><center>Không có căn hộ phù hợp</center></h1>";
                                    }
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="sidebar-widget mt-5">
                                <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Đã thêm gần đây</h4>
                                <ul class="property_list_widget">

                                    <?php
                                    $query = mysqli_query($con, "SELECT * FROM `property` ORDER BY date DESC LIMIT 6");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <li> <img class="property-img" src="admin/property/<?php echo $row['17']; ?>" alt="pimage">
                                            <h6 class="text-secondary hover-text-primary text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0']; ?>"><?php echo $row['1']; ?></a></h6>
                                            <span class="font-14"><i class="fas fa-map-marker-alt icon-primary icon-small"></i> <?php echo $row['14']; ?></span>

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