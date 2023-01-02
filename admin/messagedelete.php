<?php
include("config.php");
$cid = $_GET['id'];
$sql = "DELETE FROM message WHERE message_id = {$cid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Thao tác thành công</p>";
	header("Location:messageview.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Có vấn đề gì đó, vui lòng thử lại</p>";
	header("Location:messageview.php?msg=$msg");
}
mysqli_close($con);
?>
