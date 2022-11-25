<?php

$con = mysqli_connect("localhost","root","","ihome");
	if (mysqli_connect_errno())
	{
		echo "Kết nối SQL thất bại: " . mysqli_connect_error();
	}
?>