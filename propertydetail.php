<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");

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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js" integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg==" crossorigin=""></script>
    <script charset="UTF-8" type="text/javascript" src="https://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=6.3&mkt=en-us">
    </script>
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
                            <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Chi tiết căn hộ</b></h2>
                        </div>
                    </div>
                </div>
            </div>
            <!--	Banner   --->


            <div class="full-row">
                <div class="container">
                    <div class="row">

                        <?php
                        $id = $_REQUEST['pid'];
                        $query = mysqli_query($con, "SELECT property.*, user.* FROM `property`,`user` WHERE property.uid=user.uid and pid='$id'");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>

                            <div class="col-lg-8">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="single-property" style="width:1200px; height:700px; margin:30px auto 50px;">
                                            <?php
                                            for ($i = 17; $i <= 21; $i++) {
                                                if (!empty($row[$i])) {
                                            ?><div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row[$i]; ?>" class="ls-bg" alt="" /> </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="bg-primary d-table px-3 py-2 rounded text-white text-capitalize"><?php echo $row['5']; ?></div>
                                        <h5 class="mt-2 text-secondary text-capitalize"><?php echo $row['1']; ?></h5>
                                        <span class="mb-sm-20 d-block text-capitalize"><i class="fas fa-map-marker-alt text-primary font-12"></i> &nbsp;<?php echo $row['14']; ?></span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-primary text-left h5 my-2 text-md-right"><?php echo $row['13']; ?> VNĐ</div>
                                    </div>
                                </div>
                                <div class="property-details">
                                    <div class="table-striped font-14 pb-2">
                                        <table class="w-100">
                                            <tbody>
                                                <tr>
                                                    <td>Loại nhà ở:</td>
                                                    <td class="text-capitalize"><?php echo $row['3']; ?></td>
                                                    <td>Diện tích:</td>
                                                    <td class="text-capitalize"><?php echo $row['12']; ?> m<sup>2</td>
                                                </tr>
                                                <tr>
                                                    <td>Phòng ngủ:</td>
                                                    <td class="text-capitalize"><?php echo $row['6']; ?></td>
                                                    <td>Phòng tắm:</td>
                                                    <td class="text-capitalize"><?php echo $row['7']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Bếp:</td>
                                                    <td class="text-capitalize"><?php echo $row['9']; ?></td>
                                                    <td>Hướng:</td>
                                                    <td class="text-capitalize"><?php echo $row['8']; ?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <h4 class="text-secondary my-4">Mô tả</h4>
                                        <p><?php echo $row['2']; ?></p>

                                        <h4 class="mt-5 mb-4 text-secondary">Các tiện ích và cơ sở vật chất</h4>
                                        <div class="table-striped font-14 pb-2">
                                            <table class="w-100">
                                                <tbody>
                                                    <tr>
                                                        <td>Hồ bơi:</td>
                                                        <td class="text-capitalize"><?php echo $row['4']; ?></td>
                                                        <td>Bãi đậu xe:</td>
                                                        <td class="text-capitalize"><?php echo $row['10']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Số tầng:</td>
                                                        <td class="text-capitalize"><?php echo $row['11']; ?></td>
                                                        <td>Thành phố:</td>
                                                        <td class="text-capitalize"><?php echo $row['16']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <h4 class="mt-5 mb-4 text-secondary">Sơ đồ</h4>
                                        <div class="accordion" id="accordionExample">
                                            <button class="bg-gray hover-bg-primary hover-text-white text-ordinary py-3 px-4 mb-1 w-100 text-left rounded position-relative" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Sơ đồ</button>
                                            <div id="collapseOne" class="collapse show p-4" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <img src="admin/property/<?php echo $row['25']; ?>" alt="Not Available">
                                            </div>
                                            <button class="bg-gray hover-bg-primary hover-text-white text-ordinary py-3 px-4 mb-1 w-100 text-left rounded position-relative collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Địa chỉ cụ thể trên Google Map</button>
                                            <div id="collapseTwo" class="collapse show p-4" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div lat="<?php echo $row['lat']; ?>" long="<?php echo $row['long']; ?>" id='myMap' style="width:1000px; height:400px;"></div>
                                            </div>


                                        </div>

                                        <h4 class="mt-5 mb-4 text-secondary double-down-line-left position-relative">Liên hệ</h4>
                                        <div class="agent-contact pt-60">
                                            <div class="row">
                                                <div class="col-sm-4 col-lg-3"> <img src="admin/user/<?php echo $row['uimage']; ?>" alt="" height="200" width="170"> </div>
                                                <div class="col-sm-8 col-lg-9">
                                                    <div class="agent-data text-ordinary mt-sm-20">
                                                        <h6 class="text-primary text-capitalize"><?php echo $row['uname']; ?></h6>
                                                        <ul class="mb-3">
                                                            <li><?php echo $row['uphone']; ?></li>
                                                            <li><?php echo $row['uemail']; ?></li>
                                                        </ul>

                                                        <div class="mt-3 text-secondary hover-text-primary">
                                                            <ul>
                                                                <li class="float-left mr-3"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                                <li class="float-left mr-3"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                                <li class="float-left mr-3"><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                                                <li class="float-left mr-3"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                                <li class="float-left mr-3"><a href="#"><i class="fas fa-rss"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-12">
                                                    <form class="bg-gray-form mt-5" action="#" method="post">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <input class="form-control bg-gray" id="name" name="firstname" placeholder="Tên" type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <input class="form-control bg-gray" id="email" name="email" placeholder="Địa chỉ email" type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <input class="form-control bg-gray" id="phone" name="phone" placeholder="Số điện thoại" type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <button type="submit" id="send" value="submit" class="btn btn-primary">Gửi tin nhắn</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-lg-12">
                                                                        <div class="form-group">
                                                                            <textarea class="form-control bg-gray mt-sm-20" style="height: 182px;" id="massage" name="massage" cols="30" rows="7" placeholder="Gửi tin nhắn"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-lg-4">
                            <div class="sidebar-widget mt-5">
                                <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Đã thêm gần đây</h4>
                                <ul class="property_list_widget">

                                    <?php
                                    $query = mysqli_query($con, "SELECT * FROM `property` ORDER BY date DESC LIMIT 6");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <li> <img src="admin/property/<?php echo $row['17']; ?>" alt="pimage">
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
    <script>
        var map, infobox, currentPushpin;

        function GetMap() {
            map = new Microsoft.Maps.Map('#myMap', {});

            var layer = new Microsoft.Maps.Layer();

            const long = document.getElementById("myMap").getAttribute("long")
            const lat = document.getElementById("myMap").getAttribute("lat")

            var pinLocation = new Microsoft.Maps.Location(lat, long);

            const pin = new Microsoft.Maps.Pushpin(pinLocation);

            layer.add(pin)

            map.layers.insert(layer);

            map.setView({
                center: pinLocation,
                zoom: 18
            });
        }
    </script>

    <script>
        // Dynamic load the Bing Maps Key and Script
        // Get your own Bing Maps key at https://www.microsoft.com/maps
        (async () => {
            let script = document.createElement("script");
            let bingKey = 'AlmIeyDzBddgg5hMt7sF9PROmNTOdcynd_uNAY1MfNqqg5UbI4guFUk6YqzkyGoI'
            script.setAttribute("src", `https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=${bingKey}`);
            document.body.appendChild(script);
        })();
    </script>

    <script src="https://js.radar.com/v3/radar.min.js"></script>

</body>

</html>