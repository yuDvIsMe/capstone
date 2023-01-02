<?php
$username = $_GET['email'];
$conn = new PDO("mysql:host=localhost;dbname=ihome;charset=utf8", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM user where uemail = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$username]);
$count = $stmt->rowCount();
echo json_encode(['count'=>$count]);


?>
