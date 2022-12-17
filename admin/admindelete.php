<?php
include("config.php");
$uid = $_GET['id'];
$sql = "DELETE FROM user WHERE uid = {$uid} && role='admin'";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Đã xóa</p>";
	header("Location:adminlist.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>vui lòng thử lại</p>";
	header("Location:adminlist.php?msg=$msg");
}
mysqli_close($con);
?>
