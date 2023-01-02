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
$file_type_allow = array('png','jpg','gif','jpeg');

$error = "";
$msg = "";
if (isset($_POST['add'])) {

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
	


	$sql = "insert into property (title,pcontent,type,pool,stype,bedroom,bathroom,direction,kitchen,parkinglot,floor,size,price,location,city,pimage,pimage1,pimage2,pimage3,pimage4,uid,status,mapimage,security,lat,`long`) 
	values('$title','$content','$ptype','$pool','$stype','$bed','$bath','$direction','$kitc','$parkinglot','$floor','$asize','$price',
	'$loc','$city','$aimage','$aimage1','$aimage2','$aimage3','$aimage4','$uid','$status','$fimage','$security','$lat','$long')";
	$result = mysqli_query($con, $sql);
	if ($result) {
		echo '<script language="javascript">alert("Đăng tin thành công"); window.location="property.php";</script>';
	} else {
		$error = "<p class='alert alert-warning'>Có vấn đề khi đăng tin, vui lòng thử lại!</p>";
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
							<h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Đăng tin</b></h2>
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
							<h2 class="text-secondary double-down-line text-center">Thông tin căn hộ</h2>
						</div>
					</div>
					<div class="row p-5 bg-white">
						<form method="post" enctype="multipart/form-data">
							<div class="description">
								<?php echo $error; ?>
								<?php echo $msg; ?>

								<div class="row">
									<div class="col-xl-12">
										<div class="form-group row">
											<label class="col-lg-2 col-form-label">Tiêu đề</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" value="<?php if(!empty($title)) echo $title?>" name="title" required placeholder="Nhập tiêu đề">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-2 col-form-label">Mô tả</label>
											<div class="col-lg-9">
												<textarea class="tinymce form-control" name="content" rows="10" cols="30"></textarea>
											</div>
										</div>

									</div>
									<div class="col-xl-6">
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Loại nhà ở</label>
											<div class="col-lg-9">
												<select class="form-control" required name="ptype">
													<option value="">Loại</option>
													<option <?php if(!empty($ptype)&& $ptype=='Nhà phố') echo "selected ='selected" ?>value="Nhà phố">Nhà phố</option>
													<option <?php if(!empty($ptype)&& $ptype=='Chung cư') echo "selected ='selected" ?>value="Chung cư">Chung cư</option>
													<option <?php if(!empty($ptype)&& $ptype=='Penhouse') echo "selected ='selected" ?>value="Penhouse">Penhouse</option>
													<option <?php if(!empty($ptype)&& $ptype=='Villa') echo "selected ='selected" ?>value="Villa">Villa</option>
													<option <?php if(!empty($ptype)&& $ptype=='Văn phòng') echo "selected ='selected" ?>value="Văn phòng">Văn phòng</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Tình trạng</label>
											<div class="col-lg-9">
												<select class="form-control" required name="stype">
													<option value="">Chọn</option>
													<option <?php if(!empty($stype)&& $stype=='Thuê') echo "selected ='selected" ?> value="Thuê">Thuê</option>
													<option <?php if(!empty($stype)&& $stype=='Bán') echo "selected ='selected" ?> value="Bán">Bán</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Phòng tắm</label>
											<div class="col-lg-9">
												<input type="number" class="form-control" name="bath" value="<?php if(!empty($bath)) echo $bath?>" required placeholder="Nhập số phòng">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Bếp</label>
											<div class="col-lg-9">
												<input type="number" class="form-control" name="kitc" value="<?php if(!empty($kitc)) echo $kitc?>" required placeholder="Nhập số phòng">
											</div>
										</div>

									</div>
									<div class="col-xl-6">
										<div class="form-group row mb-3">
											<label class="col-lg-3 col-form-label">Hồ bơi</label>
											<div class="col-lg-9">
												<select class="form-control" required name="pool">
													<option  value="">Chọn</option>
													<option <?php if(!empty($pool)&& $pool=='Có') echo "selected ='selected" ?> value="Có">Có</option>
													<option <?php if(!empty($pool)&& $pool=='Không') echo "selected ='selected" ?> value="Không">Không</option>
												</select>
											</div>
										</div>
										<div class="form-group row mb-3">
											<label class="col-lg-3 col-form-label">Bãi đậu xe</label>
											<div class="col-lg-9">
												<select class="form-control" required name="parkinglot">
													<option value="">Chọn</option>
													<option <?php if(!empty($parkinglot)&& $parkinglot=='Có') echo "selected ='selected" ?> value="Có">Có</option>
													<option <?php if(!empty($parkinglot)&& $parkinglot=='Không') echo "selected ='selected" ?> value="Không">Không</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Phòng ngủ</label>
											<div class="col-lg-9">
												<input type="number" class="form-control" name="bed" value="<?php if(!empty($bed)) echo $bed?>" required placeholder="Nhập số phòng">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Hướng</label>
											<div class="col-lg-9">
												<select class="form-control" required name="direction">
													<option value="">Chọn</option>
													<option <?php if(!empty($direction)&& $direction=='Đông') echo "selected ='selected" ?> value="Đông">Đông</option>
													<option <?php if(!empty($direction)&& $direction=='Tây') echo "selected ='selected" ?> value="Tây">Tây</option>
													<option <?php if(!empty($direction)&& $direction=='Nam') echo "selected ='selected" ?> value="Nam">Nam</option>
													<option <?php if(!empty($direction)&& $direction=='Bắc') echo "selected ='selected" ?>value="Bắc">Bắc</option>
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
												<input type="number" class="form-control" name="floor" value="<?php if(!empty($floor)) echo $floor?>" required placeholder="Nhập số tầng">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Giá</label>
											<div class="col-lg-9">
												<input type="number" class="form-control" name="price" value="<?php if(!empty($price)) echo $price?>" required placeholder="Nhập giá">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Thành phố</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="city" value="<?php if(!empty($city)) echo $city?>" required placeholder="Nhập tên thành phố">
											</div>
										</div>
									</div>
									<div class="col-xl-6">
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">An ninh</label>
											<div class="col-lg-9">
												<select class="form-control" required name="security">
													<option value="">Chọn</option>
													<option <?php if(!empty($security)&& $security=='Có') echo "selected ='selected" ?> value="Có">Có</option>
													<option <?php if(!empty($security)&& $security=='Không') echo "selected ='selected" ?> value="Không">Không</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Diện tích</label>
											<div class="col-lg-9">
												<input type="number" class="form-control" name="asize" value="<?php if(!empty($asize)) echo $asize?>" required placeholder="Nhập diện tích">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Địa chỉ</label>
											<div class="col-lg-9 position-relative">
												<input type="hidden" class="form-control" id="address-long" name="long" required placeholder="Enter Address">
												<input type="hidden" class="form-control" id="address-lat" name="lat" required placeholder="Enter Address">
												<input type="text" class="form-control" id="address" name="loc" required placeholder="Enter Address">
												<div id="address-list" class="dropdown-menu">
												</div>
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
								<input type="submit" value="Đăng bài" class="btn btn-primary" name="add" style="margin-left:142px;">
							</div>
						</form>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js" integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js" integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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