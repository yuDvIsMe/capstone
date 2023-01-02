<?php
session_start();
require("config.php");
////code

if (!isset($_SESSION['auser'])) {
    header("location:index.php");
}

$fmt = numfmt_create('vi_VN', NumberFormatter::CURRENCY);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>iHome | Quản lý</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/css/feathericon.min.css">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables/select.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables/buttons.bootstrap4.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>

    <!-- Main Wrapper -->


    <!-- Header -->
    <?php include("header.php"); ?>
    <!-- /Sidebar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Quản lý căn hộ</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Căn hộ</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <?php
                if (isset($_GET['msg']))
                    echo $_GET['msg'];
                ?>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-4">Danh sách căn hộ khả dụng</h4>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tiêu đề</th>
                                        <th>Giá</th>
                                        <th>UserID </th>
                                        <th>Ngày đăng</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                        <th>Thành phố</th>
                                        <th>Loại nhà ở</th>
                                        <th>Hồ bơi</th>
                                        <th>Thuê/bán</th>
                                        <th>Phòng ngủ</th>
                                        <th>Phòng tắm</th>
                                        <th>Hướng</th>
                                        <th>Phòng bếp</th>
                                        <th>Bãi đậu xe</th>
                                        <th>Số tầng</th>
                                        <th>Diện tích</th>
                                        <th>Địa chỉ</th>
                                        <th>Hình ảnh</th>
                                        <th>Floor Plan</th>
                                        <th>An ninh</th>
                                        <th>Chỉnh sửa</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    <?php

                                    $query = mysqli_query($con, "select * from property where status='Khả dụng'");
                                    while ($row = mysqli_fetch_row($query)) {
                                    ?>

                                        <tr style="line-height: 38px;">
                                            <td><?php echo $row['0']; ?></td>
                                            <td><?php echo $row['1']; ?></td>
                                            <td><?php echo numfmt_format_currency($fmt, $row['13'], "VND"); ?></td>
                                            <td><?php echo $row['22']; ?></td>
                                            <td><?php echo $row['26']; ?></td>
                                            <td class="text-success"><?php echo $row['23']; ?></td>
                                            <td><a class="btn btn-primary" href="propertysold.php?id=<?php echo $row['0']; ?>">Đánh dấu đã bán</a></td>
                                            <td><?php echo $row['16']; ?></td>
                                            <td><?php echo $row['3']; ?></td>
                                            <td><?php echo $row['4']; ?></td>
                                            <td><?php echo $row['5']; ?></td>
                                            <td><?php echo $row['6']; ?></td>
                                            <td><?php echo $row['7']; ?></td>
                                            <td><?php echo $row['8']; ?></td>
                                            <td><?php echo $row['9']; ?></td>
                                            <td><?php echo $row['10']; ?></td>
                                            <td><?php echo $row['11']; ?></td>
                                            <td><?php echo $row['12']; ?></td>
                                            <td><?php echo $row['14']; ?></td>
                                            <td>
                                                <img src="property/<?php echo $row['17']; ?>" alt="pimage" height="70px" width="70px">
                                                <img src="property/<?php echo $row['18']; ?>" alt="pimage" height="70px" width="70px">
                                                <img src="property/<?php echo $row['19']; ?>" alt="pimage" height="70px" width="70px">
                                                <img src="property/<?php echo $row['20']; ?>" alt="pimage" height="70px" width="70px">
                                                <img src="property/<?php echo $row['21']; ?>" alt="pimage" height="70px" width="70px">
                                            </td>
                                            <td><img src="property/<?php echo $row['25']; ?>" alt="plan" height="70px" width="70px"></td>
                                            <td><?php echo $row['25']; ?></td>
                                            <td><a href="propertyedit.php?id=<?php echo $row['0']; ?>">Sửa</a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-4">Danh sách căn hộ đã bán</h4>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Tiêu đề</th>
                                        <th>UserID </th>
                                        <th>Giá</th>
                                        <th>Địa chỉ</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php

                                    $query = mysqli_query($con, "select * from property where status='Đã bán'");
                                    while ($row = mysqli_fetch_row($query)) {
                                    ?>

                                        <tr style="line-height: 38px;">
                                            <td><?php echo $row['1']; ?></td>
                                            <td><?php echo $row['22']; ?></td>
                                            <td><?php echo numfmt_format_currency($fmt, $row['13'], "VND"); ?></td>
                                            <td><?php echo $row['14']; ?></td>
                                            <td class="text-danger"><?php echo $row['23']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>


        </div>
    </div>
    <!-- /Main Wrapper -->


    <!-- jQuery -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Datatables JS -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <script src="assets/plugins/datatables/dataTables.select.min.js"></script>

    <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables/buttons.flash.min.js"></script>
    <script src="assets/plugins/datatables/buttons.print.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>

</html>