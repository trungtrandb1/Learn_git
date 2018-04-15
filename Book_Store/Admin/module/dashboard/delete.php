<?php 
$id = $_GET['id'];
$sql = "DELETE FROM admin
WHERE id = $id";

$res = mysqli_query($conn,$sql);
if (!$res) {
	echo "Xóa tài khoản thất bại";	
}else {
	
	
	echo "<script>
	alert('Xóa tài khoản thành công!');
	</script>";
header('location: index.php?module=dashboard');
}
?>