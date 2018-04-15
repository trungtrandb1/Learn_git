<?php 
$id = $_GET['id'];
$sql = "DELETE FROM category
WHERE cat_id = $id";

$res = mysqli_query($conn,$sql);
if (!$res) {
	echo "Xóa danh mục thất bại";	
}else {
	
	
	echo "<script>
	alert('Xóa danh mục thành công!');
	</script>";
header('location: index.php?module=category');
}
?>