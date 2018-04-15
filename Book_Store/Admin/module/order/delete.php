<?php 
ob_start();
$id = $_GET['id'];
$sql = "DELETE FROM orders
WHERE id = $id";

$res = mysqli_query($conn,$sql);
if (!$res) {
	echo "Xóa đơn hàng thất bại";	
}else {
	
	
	echo "<script>
	alert('Xóa đơn hàng thành công!');
	</script>";
	header('location: index.php?module=order');
}
?>