<?php 
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$status = isset($_GET['status']) ? $_GET['status'] : 0;

$sql = "UPDATE orders set status = $status WHERE id = $id";
$res = mysqli_query($conn,$sql);
header('location: index.php?module=order');
?>