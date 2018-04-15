<?php 
$id = $_GET['id'];
$sql = "DELETE FROM publisher
WHERE pub_id = $id";

$res = mysqli_query($conn,$sql);
if (!$res) {
	echo "Xóa thất bại";	
}else {
	
	
	echo "<script>
	alert('Xóa thành công!');
	</script>";
header('location: index.php?module=publish');
}
?>