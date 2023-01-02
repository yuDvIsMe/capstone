<?php
session_start();
require("config.php");
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
	<title>Tin nhắn | Admin</title>

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
						<?php
						if (isset($_GET['msg']))
							echo $_GET['msg'];

						?>
						<h3 class="page-title">Quản lý tin nhắn của người dùng</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
							<li class="breadcrumb-item active">Tin nhắn</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Danh sách tin nhắn mới</h4>

						</div>
						<div class="card-body">
							<table id="basic-datatable" class="table">
								<thead>
									<tr>
										<th>UID</th>
										<th>PID</th>
										<th>Tiêu đề</th>
										<th>Nội dung</th>
										<th>Thời gian</th>
										<th>Trạng thái</th>
										<th>Thao tác</th>
									</tr>
								</thead>


								<tbody>
									<?php

									$query = mysqli_query($con, "select * from message where status = 0");
									$cnt = 1;
									while ($row = mysqli_fetch_row($query)) {
									?>
										<tr>
											<td><?php echo $row['3']; ?></td>
											<td><?php echo $row['6']; ?></td>
											<td><?php echo $row['1']; ?></td>
											<td><?php echo $row['2']; ?></td>
											<td><?php echo $row['5']; ?></td>
											<td class="text-success"><?php if ($row['4'] == 0) echo "Chưa phản hồi"; ?></td>
											<td><a href="messagestatus.php?id=<?php echo $row['0']; ?>">Đánh dấu đã phản hồi</a></td>
										</tr>
									<?php
									}
									?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Danh sách tin nhắn đã phản hồi</h4>
						</div>
						<div class="card-body">

							<table id="basic-datatable" class="table">
								<thead>
									<tr>
										<th>UID</th>
										<th>PID</th>
										<th>Tiêu đề</th>
										<th>Nội dung</th>
										<th>Thời gian gửi</th>
										<th>Trạng thái</th>
										<th>Thao tác</th>
									</tr>
								</thead>


								<tbody>
									<?php

									$query = mysqli_query($con, "select * from message where status = 1");
									while ($row = mysqli_fetch_row($query)) {
									?>
										<tr style="line-height: 38px;">
											<td><?php echo $row['3']; ?></td>
											<td><?php echo $row['6']; ?></td>
											<td><?php echo $row['1']; ?></td>
											<td><?php echo $row['2']; ?></td>
											<td><?php echo $row['5']; ?></td>
											<td class="text-danger"><?php if ($row['4'] == 1) echo "Đã phản hồi"; ?></td>
											<td><a class="btn btn-primary" href="messagedelete.php?id=<?php echo $row['0']; ?>" onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')">Xóa</a></td>
										</tr>
									<?php
									}
									?>

								</tbody>
							</table>
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