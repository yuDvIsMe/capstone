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

            <!--	Banner Start   -->
            <div class="overlay-black w-100 slider-banner1 position-relative" style="background-image: url('images/banner/04.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-lg-12">
                            <div class="text-white">
                                <h1 class="mb-4" style="text-align: center;"><span class="text-primary">Tìm kiếm</span><br></h1>
                                <form class="search-form" method="post" action="propertygrid.php">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="city" placeholder="Nhập tên thành phố">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-5">
                                            <div class="form-group">
                                                <select class="form-control" name="type">
                                                    <option value="">Loại</option>
                                                    <option value="house">Nhà phố</option>
                                                    <option value="Apartment">Chung cư</option>
                                                    <option value="penhouse">Penhouse</option>
                                                    <option value="villa">Villa</option>
                                                    <option value="office">Văn phòng</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-5">
                                            <div class="form-group">
                                                <select class="form-control" name="stype">
                                                    <option value="">Thuê/Mua</option>
                                                    <option value="Thuê">Thuê</option>
                                                    <option value="Bán">Mua</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-5">
                                            <div class="form-group">
                                                <select class="form-control" name="area">
                                                    <option value="">Diện tích</option>
                                                    <option value="">
                                                        < 30 m<sup>2
                                                    </option>
                                                    <option value="">30-60 m<sup>2</option>
                                                    <option value="">60-90 m<sup>2</option>
                                                    <option value="">90-120 m<sup>2</option>
                                                    <option value="">>120 m<sup>2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-5">
                                            <div class="form-group">
                                                <select class="form-control" name="price">
                                                    <option value="">Giá</option>
                                                    <option value="">Dưới 500.000.000</option>
                                                    <option value="">500.000.000 - 999.999.999</option>
                                                    <option value="">1.000.000.000 - 1.499.000.000</option>
                                                    <option value="">1.500.000.000 - 1.999.000.000</option>
                                                    <option value="">Trên 2.000.000.000</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-10">
                                            <div class="form-group">
                                                <button type="submit" name="filter" class="btn btn-primary w-100">Tìm kiếm</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--	Banner End  -->

            <!--	Recent Properties  -->
            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-secondary double-down-line text-center mb-4">Căn hộ mới nhất</h2>
                        </div>
                        <div class="col-md-12">
                            <div class="tab-content mt-4" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home">
                                    <div class="row">

                                        <?php $query = mysqli_query($con, "SELECT property.*, user.uname,user.uimage FROM `property`,`user` WHERE property.uid=user.uid ORDER BY date DESC LIMIT 9");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>

                                            <div class="col-md-6 col-lg-4">
                                                <div class="featured-thumb hover-zoomer mb-4">
                                                    <div class="overlay-black overflow-hidden position-relative"> <img src="admin/property/<?php echo $row['18']; ?>" alt="pimage">
                                                        <div class="featured bg-primary text-white">Mới</div>
                                                        <div class="sale bg-secondary text-white text-capitalize"><?php echo $row['5']; ?></div>
                                                        <div class="price text-primary"><b><?php echo $row['13']; ?> VNĐ</b></div>
                                                    </div>
                                                    <div class="featured-thumb-data shadow-one">
                                                        <div class="p-3">
                                                            <h5 class="text-secondary hover-text-primary mb-2 text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0']; ?>"><?php echo $row['1']; ?></a></h5>
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
                                                        <div class="p-4 d-inline-block w-100">
                                                            <div class="float-left text-capitalize"><i class="fas fa-user text-primary mr-1"></i>Người đăng: <?php echo $row['uname']; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--	Recent Properties  -->

            <!--	How it work -->
            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="text-secondary double-down-line text-center mb-5">Quy trình hoạt động</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icon-thumb-one text-center mb-5">
                                <div class="bg-primary text-white rounded-circle position-absolute z-index-9">1</div>
                                <div class="left-arrow"><i class="flaticon-investor flat-medium icon-primary" aria-hidden="true"></i></div>
                                <h5 class="text-secondary mt-5 mb-4">Thảo luận</h5>
                                <p>Việc thương lượng sẽ giúp đôi bên hiểu rõ sự mong muốn của bên còn lại, nhằm đi đến một mục đích có lợi cho cả đôi bên.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="icon-thumb-one text-center mb-5">
                                <div class="bg-primary text-white rounded-circle position-absolute z-index-9">2</div>
                                <div class="left-arrow"><i class="flaticon-search flat-medium icon-primary" aria-hidden="true"></i></div>
                                <h5 class="text-secondary mt-5 mb-4">Thủ tục</h5>
                                <p>Sau khi đã có tiếng nói chung, tiến hành việc xem nhà, xúc tiến các thủ tục cần thiết để hoàn tất quá trình chuyển nhượng.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="icon-thumb-one text-center mb-5">
                                <div class="bg-primary text-white rounded-circle position-absolute z-index-9">3</div>
                                <div><i class="flaticon-handshake flat-medium icon-primary" aria-hidden="true"></i></div>
                                <h5 class="text-secondary mt-5 mb-4">Hoàn tất</h5>
                                <p>Hoàn tất quá trình mua bán. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--	How It Work -->

            <!--	Achievement
        ============================================================-->
            <div class="full-row overlay-secondary" style="background-image: url('images/counterbg.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                <div class="container">
                    <div class="fact-counter">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="count wow text-center  mb-sm-50" data-wow-duration="300ms"> <i class="flaticon-house flat-large text-white" aria-hidden="true"></i>
                                    <?php
                                    $query = mysqli_query($con, "SELECT count(pid) FROM property");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <div class="count-num text-primary my-4" data-speed="300" data-stop="<?php
                                                                                                                $total = $row[0];
                                                                                                                echo $total; ?>">0</div>
                                    <?php } ?>
                                    <div class="text-white h5">Nhà đang rao bán</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="count wow text-center  mb-sm-50" data-wow-duration="300ms"> <i class="flaticon-house flat-large text-white" aria-hidden="true"></i>
                                    <?php
                                    $query = mysqli_query($con, "SELECT count(pid) FROM property where stype='sale'");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <div class="count-num text-primary my-4" data-speed="300" data-stop="<?php
                                                                                                                $total = $row[0];
                                                                                                                echo $total; ?>">0</div>
                                    <?php } ?>
                                    <div class="text-white h5">Nhà bán</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="count wow text-center  mb-sm-50" data-wow-duration="300ms"> <i class="flaticon-house flat-large text-white" aria-hidden="true"></i>
                                    <?php
                                    $query = mysqli_query($con, "SELECT count(pid) FROM property where stype='rent'");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <div class="count-num text-primary my-4" data-speed="300" data-stop="<?php
                                                                                                                $total = $row[0];
                                                                                                                echo $total; ?>">0</div>
                                    <?php } ?>
                                    <div class="text-white h5">Nhà thuê</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="count wow text-center mb-sm-50" data-wow-duration="300ms">
                                    <i class="flaticon-man flat-large text-white" aria-hidden="true"></i>
                                    <?php
                                    $query = mysqli_query($con, "SELECT count(uid) FROM user");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <div class="count-num text-primary my-4" data-speed="300" data-stop="<?php
                                                                                                                $total = $row[0];
                                                                                                                echo $total; ?>">0</div>
                                    <?php } ?>
                                    <div class="text-white h5">Người dùng</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!--	Popular Place -->
            <div class="full-row bg-gray" style="padding: 50px 0 0 0 ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="text-secondary double-down-line text-center mb-5">Thành phố phổ biến</h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6 col-lg-3 pb-1">
                                <div class="overflow-hidden position-relative overlay-secondary hover-zoomer mx-n13 z-index-9"> <img src="images/thumbnail4/danang_tn.jpg" alt="">
                                    <div class="text-white xy-center z-index-9 position-absolute text-center w-100">
                                        <?php
                                        $query = mysqli_query($con, "SELECT count(city), property.* FROM property where city='Đà Nẵng'");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <h4 class="hover-text-primary text-capitalize"><a href="cityproperty.php?id=<?php echo $row['17'] ?>"><?php echo $row['city']; ?></a></h4>
                                            <span><?php
                                                    $total = $row[0];
                                                    echo $total; ?> căn hiện có</span>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 pb-1">
                                <div class="overflow-hidden position-relative overlay-secondary hover-zoomer mx-n13 z-index-9"> <img src="images/thumbnail4/hanoi_tn.jpg" alt="">
                                    <div class="text-white xy-center z-index-9 position-absolute text-center w-100">
                                        <?php
                                        $query = mysqli_query($con, "SELECT count(city), property.* FROM property where city='Hà Nội'");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <h4 class="hover-text-primary text-capitalize"><a href="cityproperty.php?id=<?php echo $row['17'] ?>"><?php echo $row['city']; ?></a></h4>
                                            <span><?php
                                                    $total = $row[0];
                                                    echo $total; ?> căn hiện có</span>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 pb-1">
                                <div class="overflow-hidden position-relative overlay-secondary hover-zoomer mx-n13 z-index-9"> <img src="images/thumbnail4/saigon_tn.jpg" alt="">
                                    <div class="text-white xy-center z-index-9 position-absolute text-center w-100">
                                        <?php
                                        $query = mysqli_query($con, "SELECT count(city), property.* FROM property where city='TP Hồ Chí Minh'");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <h4 class="hover-text-primary text-capitalize"><a href="cityproperty.php?id=<?php echo $row['17'] ?>"><?php echo $row['city']; ?></a></h4>
                                            <span><?php
                                                    $total = $row[0];
                                                    echo $total; ?> căn hiện có</span>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 pb-1">
                                <div class="overflow-hidden position-relative overlay-secondary hover-zoomer mx-n13 z-index-9"> <img src="images/thumbnail4/saigon_tn.jpg" alt="">
                                    <div class="text-white xy-center z-index-9 position-absolute text-center w-100">
                                        <?php
                                        $query = mysqli_query($con, "SELECT count(city), property.* FROM property where city='Huế'");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <h4 class="hover-text-primary text-capitalize"><a href="cityproperty.php?id=<?php echo $row['17'] ?>"><?php echo $row['city']; ?></a></h4>
                                            <span><?php
                                                    $total = $row[0];
                                                    echo $total; ?> căn hiện có</span>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--	Popular Places -->
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
        <script src="js/YouTubePopUp.jquery.js"></script>
        <script src="js/validate.js"></script>
        <script src="js/jquery.cookie.js"></script>
        <script src="js/custom.js"></script>
</body>

</html>