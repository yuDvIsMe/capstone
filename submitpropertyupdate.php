<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");
if (!isset($_SESSION['uemail'])) {
	header("location:login.php");
}

//// code insert
//// add code

$msg = "";
if (isset($_POST['add'])) {
	$pid = $_REQUEST['id'];

	$title = $_POST['title'];
	$content = $_POST['content'];
	$ptype = $_POST['ptype'];
	$pool = $_POST['pool'];
	$bed = $_POST['bed'];
	$direction = $_POST['direction'];
	$parkinglot = $_POST['parkinglot'];
	$stype = $_POST['stype'];
	$bath = $_POST['bath'];
	$kitc = $_POST['kitc'];
	$floor = $_POST['floor'];
	$price = $_POST['price'];
	$city = $_POST['city'];
	$asize = $_POST['asize'];
	$loc = $_POST['loc'];
	$status = $_POST['status'];
	$uid = $_SESSION['uid'];

	$security = $_POST['security'];
	$lat = $_POST['lat'];
	$long = $_POST['long'];

	$aimage = $_FILES['aimage']['name'];
	$aimage1 = $_FILES['aimage1']['name'];
	$aimage2 = $_FILES['aimage2']['name'];
	$aimage3 = $_FILES['aimage3']['name'];
	$aimage4 = $_FILES['aimage4']['name'];

	$fimage = $_FILES['fimage']['name'];

	$temp_name  = $_FILES['aimage']['tmp_name'];
	$temp_name1 = $_FILES['aimage1']['tmp_name'];
	$temp_name2 = $_FILES['aimage2']['tmp_name'];
	$temp_name3 = $_FILES['aimage3']['tmp_name'];
	$temp_name4 = $_FILES['aimage4']['tmp_name'];

	$temp_name5 = $_FILES['fimage']['tmp_name'];

	move_uploaded_file($temp_name, "admin/property/$aimage");
	move_uploaded_file($temp_name1, "admin/property/$aimage1");
	move_uploaded_file($temp_name2, "admin/property/$aimage2");
	move_uploaded_file($temp_name3, "admin/property/$aimage3");
	move_uploaded_file($temp_name4, "admin/property/$aimage4");

	move_uploaded_file($temp_name5, "admin/property/$fimage");


	$sql = "UPDATE property SET title= '{$title}', pcontent= '{$content}', type='{$ptype}', pool='{$pool}', stype='{$stype}',
	bedroom='{$bed}', bathroom='{$bath}', direction='{$direction}', kitchen='{$kitc}', parkinglot='{$parkinglot}', floor='{$floor}', 
	size='{$asize}', price='{$price}', location='{$loc}', city='{$city}',
	pimage='{$aimage}', pimage1='{$aimage1}', pimage2='{$aimage2}', pimage3='{$aimage3}', pimage4='{$aimage4}',
	uid='{$uid}', status='{$status}', mapimage='{$fimage}', 
	security='{$security}', lat = '{$lat}', long = '{$long}' WHERE pid = {$pid}";

	$result = mysqli_query($con, $sql);
	if ($result == true) {
		$msg = "<p class='alert alert-success'>Cập nhật thành công</p>";
		header("Location:feature.php?msg=$msg");
	} else {
		$msg = "<p class='alert alert-warning'>Cập nhật không thành công</p>";
		header("Location:feature.php?msg=$msg");
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
							<h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Cập nhật thông tin</b></h2>
						</div>
					</div>
				</div>
			</div>
			<!--	Banner   --->


			<!--	Submit property   -->
			<div class="full-row">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">Cập nhật thông tin</h2>
						</div>
					</div>
					<div class="row p-5 bg-white">
						<form method="post" enctype="multipart/form-data">

							<?php

							$pid = $_REQUEST['id'];
							$query = mysqli_query($con, "select * from property where pid='$pid'");
							while ($row = mysqli_fetch_row($query)) {
							?>

								<div class="description">
									<div class="row">
										<div class="col-xl-12">
											<div class="form-group row">
												<label class="col-lg-2 col-form-label">Tiêu đề</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" name="title" required value="<?php echo $row['1']; ?>">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-2 col-form-label">Mô tả</label>
												<div class="col-lg-9">
													<textarea class="tinymce form-control" name="content" rows="10" cols="30"><?php echo $row['2']; ?></textarea>
												</div>
											</div>

										</div>
										<div class="col-xl-6">
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Loại nhà ở</label>
												<div class="col-lg-9">
													<select class="form-control" required name="ptype">
														<option value="">Loại</option>
														<option value="Nhà phố">Nhà phố</option>
														<option value="Chung cư">Chung cư</option>
														<option value="Penhouse">Penhouse</option>
														<option <?php if($row['3']=='Villa') echo "selected='selected'"?> value="Villa">Villa</option>
														<option value="Văn phòng">Văn phòng</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Tình trạng</label>
												<div class="col-lg-9">
													<select class="form-control" required name="stype">
														<option value="">Chọn</option>
														<option value="Thuê">Thuê</option>
														<option value="Bán">Bán</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Phòng tắm</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" name="bath" required value="<?php echo $row['7']; ?>">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Bếp</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" name="kitc" required value="<?php echo $row['9']; ?>">
												</div>
											</div>

										</div>
										<div class="col-xl-6">
											<div class="form-group row mb-3">
												<label class="col-lg-3 col-form-label">Hồ bơi</label>
												<div class="col-lg-9">
													<select class="form-control" required name="pool">
														<option value="">Chọn</option>
														<option value="Có">Có</option>
														<option value="Không">Không</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Bãi đậu xe</label>
												<div class="col-lg-9">
													<select class="form-control" required name="parkinglot">
														<option value="">Chọn</option>
														<option value="Có">Có</option>
														<option value="Không">Không</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Phòng ngủ</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" name="bed" required value="<?php echo $row['6']; ?>">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Hướng</label>
												<div class="col-lg-9">
													<select class="form-control" required name="direction">
														<option value="">Chọn</option>
														<option value="Đông">Đông</option>
														<option value="Tây">Tây</option>
														<option value="Nam">Nam</option>
														<option value="Bắc">Bắc</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<h5 class="text-secondary">Địa điểm và giá cả</h5>
									<hr>
									<div class="row">
										<div class="col-xl-6">
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Số tầng</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" name="floor" required value="<?php echo $row['11']; ?>">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Giá</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" name="price" required value="<?php echo $row['13']; ?>">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Thành phố</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" name="city" required value="<?php echo $row['16']; ?>">
												</div>
											</div>
										</div>
										<div class="col-xl-6">
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">An ninh</label>
												<div class="col-lg-9">
													<select class="form-control" required name="security">
														<option value="">Chọn</option>
														<option value="Có">Có</option>
														<option value="Không">Không</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Diện tích</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" name="asize" required value="<?php echo $row['12']; ?>">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Địa chỉ</label>
												<div class="col-lg-9">
													<input type="hidden" class="form-control" id="address-long" name="long">
													<input type="hidden" class="form-control" id="address-lat" name="lat">
													<input type="text" class="form-control" name="loc" required value="<?php echo $row['14']; ?>">
												</div>
											</div>

										</div>
									</div>
									<h5 class="text-secondary">Hình ảnh</h5>
									<hr>
									<div class="row">
										<div class="col-xl-6">

											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Hình ảnh</label>
												<div class="col-lg-9">
													<input class="form-control" name="aimage" type="file">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Hình ảnh</label>
												<div class="col-lg-9">
													<input class="form-control" name="aimage2" type="file">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Hình ảnh</label>
												<div class="col-lg-9">
													<input class="form-control" name="aimage4" type="file">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Trạng thái</label>
												<div class="col-lg-9">
													<select class="form-control" required name="status">
														<!-- <option value="">Chọn</option> -->
														<option value="Khả dụng">Khả dụng</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-xl-6">

											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Hình ảnh</label>
												<div class="col-lg-9">
													<input class="form-control" name="aimage1" type="file">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Hình ảnh</label>
												<div class="col-lg-9">
													<input class="form-control" name="aimage3" type="file">
												</div>
											</div>

											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Ảnh cắt</label>
												<div class="col-lg-9">
													<input class="form-control" name="fimage" type="file">
												</div>
											</div>
										</div>
									</div>
									<input type="submit" value="Chỉnh sửa" class="btn btn-primary" name="add" style="margin-left:142px;">

								</div>
						</form>

					<?php
							}
					?>
					</div>
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
	<script src="js/tinymce/tinymce.min.js"></script>
	<script src="js/tinymce/init-tinymce.min.js"></script>
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
		const addressInput = document.getElementById("address")

		const addressList = document.getElementById("address-list")
		const addressLong = document.getElementById("address-long")
		const addressLat = document.getElementById("address-lat")

		const search = _.debounce(async (value) => {
			const res = await axios.post('http://localhost/testcapstone1/search-map.php', {
				query: value
			})

			const resources = _.get(res, 'data.resourceSets.0.resources', []);

			if (!_.isEmpty(resources)) {
				addressList.classList.add("shown");

				addressList.innerHTML = ""

				const els = _.map(resources, (resource) => {
					const a = document.createElement("a")

					a.addEventListener("click", () => completeResult(resource));

					a.innerText = resource.name

					a.classList.add('dropdown-item')

					a.href = '#'

					addressList.appendChild(a)
				});

			} else {
				addressList.classList.remove("shown");
			}
		}, 500)

		const completeResult = (resource) => {
			event.preventDefault();
			addressInput.value = resource.name;
			addressLat.value = resource.geocodePoints[0].coordinates[0];
			addressLong.value = resource.geocodePoints[0].coordinates[1];
			addressList.innerHTML = ""
			addressList.classList.remove("shown");
		}

		addressInput.addEventListener("keyup", async (event) => {
			const value = event.target.value;

			await search(value)
		})
	</script>
</body>

</html>