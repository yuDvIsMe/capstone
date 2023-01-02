<?php
include("config.php");
$pid = $_GET['id'];
$sql = "UPDATE property SET status = 'Đã bán' WHERE pid = {$pid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Đã cập nhật</p>";
	header("Location:propertyview.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Có vấn đề gì đó, vui lòng thử lại</p>";
	header("Location:propertyview.php?msg=$msg");
}
mysqli_close($con);
?>