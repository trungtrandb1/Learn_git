<?php 
ob_start();
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$status = isset($_GET['status']) ? $_GET['status'] : 0;

$sql = "UPDATE user set status = $status WHERE id = $id";
$res = mysqli_query($conn,$sql);
header('location: index.php?module=accounts');
?>