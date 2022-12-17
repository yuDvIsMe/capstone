<?php
include("config.php");
$cid = $_GET['id'];
$sql = "DELETE FROM contact WHERE contact_id = {$cid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Đã xóa</p>";
	header("Location:contactview.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Có vấn đề gì đó, vui lòng thử lại</p>";
	header("Location:contactview.php?msg=$msg");
}
mysqli_close($con);
?>
