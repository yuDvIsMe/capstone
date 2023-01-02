<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");
////code

if (!isset($_SESSION['auser'])) {
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>iHome - Dashboard</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="assets/css/feathericon.min.css">

	<link rel="stylesheet" href="assets/plugins/morris/morris.css">

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
	<!-- /Header -->

	<!-- Page Wrapper -->
	<div class="page-wrapper">

		<div class="content container-fluid">

			<!-- Page Header -->
			<div class="page-header">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="page-title">Welcome!</h3>
						<p></p>
						<ul class="breadcrumb">
							<li class="breadcrumb-item active">Dashboard</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<div class="row">
				<div class="col-xl-3 col-sm-6 col-12">
					<div class="card">
						<div class="card-body">
							<div class="dash-widget-header">
								<span class="dash-widget-icon bg-primary">
									<i class="fe fe-users"></i>
								</span>
							</div>
							<div class="dash-widget-info fact-counter">
								<h3 class="count wow" data-wow-duration="300ms"><?php
									$query = mysqli_query($con, "SELECT count(uid) FROM user");
									while ($row = mysqli_fetch_array($query)) {
									?>
										<div class="count-num" data-speed="300" data-stop="<?php
																			$total = $row[0];
																			echo $total; ?>">0</div>
									<?php } ?>
								</h3>
								<h6 class="text-muted">Người dùng</h6>
								<div class="progress progress-sm">
									<div class="progress-bar bg-primary w-50"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6 col-12">
					<div class="card">
						<div class="card-body">
							<div class="dash-widget-header">
								<span class="dash-widget-icon bg-success">
									<i class="fe fe-home"></i>
								</span>
							</div>
							<div class="dash-widget-info fact-counter">

								<h3 class="count wow" data-wow-duration="300ms"><?php
									$query = mysqli_query($con, "SELECT count(pid) FROM property  where status='Khả dụng' && stype='Thuê'");
									while ($row = mysqli_fetch_array($query)) {
									?>
										<div class="count-num" data-speed="300" data-stop="<?php
											$total = $row[0];
											echo $total; ?>">0</div>
									<?php } ?>
								</h3>

								<h6 class="text-muted">Nhà thuê khả dụng</h6>
								<div class="progress progress-sm">
									<div class="progress-bar bg-success w-50"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6 col-12">
					<div class="card">
						<div class="card-body">
							<div class="dash-widget-header">
								<span class="dash-widget-icon bg-danger">
									<i class="fe fe-home"></i>
								</span>

							</div>
							<div class="dash-widget-info fact-counter">

								<h3 class="count wow" data-wow-duration="300ms"><?php
									$query = mysqli_query($con, "SELECT count(pid) FROM property where status='Khả dụng' && stype='Bán'");
									while ($row = mysqli_fetch_array($query)) {
									?>
										<div class="count-num" data-speed="300" data-stop="<?php
																			$total = $row[0];
																			echo $total; ?>">0</div>
									<?php } ?>
								</h3>

								<h6 class="text-muted">Nhà bán khả dụng</h6>
								<div class="progress progress-sm">
									<div class="progress-bar bg-danger w-50"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6 col-12">
					<div class="card">
						<div class="card-body">
							<div class="dash-widget-header ">
								<span class="dash-widget-icon bg-warning">
									<i class="fe fe-check-circle"></i>
								</span>

							</div>
							<div class="dash-widget-info fact-counter">

								<h3 class="count wow" data-wow-duration="300ms"><?php
									$query = mysqli_query($con, "SELECT count(pid) FROM property where status ='Đã bán'");
									while ($row = mysqli_fetch_array($query)) {
									?>
										<div class="count-num" data-speed="300" data-stop="
										<?php
										$total = $row[0];
										echo $total; ?>">0</div>
									<?php } ?>
								</h3>

								<h6 class="text-muted">Nhà đã bán</h6>
								<div class="progress progress-sm">
									<div class="progress-bar bg-warning w-50"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>

			<div class="row">
				<div class="col-md-12 col-lg-6">

					<!-- Sales Chart -->
					<div class="card card-chart">
						<div class="card-header">
							<h4 class="card-title">Sales Overview</h4>
						</div>
						<div class="card-body">
							<div id="morrisArea"></div>
						</div>
					</div>
					<!-- /Sales Chart -->

				</div>
				<div class="col-md-12 col-lg-6">

					<!-- Invoice Chart -->
					<div class="card card-chart">
						<div class="card-header">
							<h4 class="card-title">Order Status</h4>
						</div>
						<div class="card-body">
							<div id="morrisLine"></div>
						</div>
					</div>
					<!-- /Invoice Chart -->

				</div>
			</div>
		</div>
	</div>
	<!-- /Page Wrapper -->


	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- Slimscroll JS -->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

	<script src="assets/plugins/raphael/raphael.min.js"></script>
	<script src="assets/plugins/morris/morris.min.js"></script>
	<script src="assets/js/chart.morris.js"></script>
	<script src="../js/wow.js"></script> 


	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>
	<script src="assets/js/custom.js"></script>


</body>

</html>