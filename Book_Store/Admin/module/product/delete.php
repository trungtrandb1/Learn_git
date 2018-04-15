<?php 
// $id = $_GET['id'];
// $sql = "DELETE FROM book
// WHERE id = $id";

// $res = mysqli_query($conn,$sql);
// if (!$res) {
// 	echo "Xóa sản phẩm thất bại";	
// }else {
	
	
// 	echo "<script>
// 	alert('Xóa sản phẩm thành công!');
// 	</script>";
// header('location: index.php?module=product');
// }
?>


<?php 
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$status = isset($_GET['status']) ? $_GET['status'] : 1;

$sql = "UPDATE book set p_status = $status WHERE id = $id";
$res = mysqli_query($conn,$sql);
$actual_link = $_SESSION['link_r'];
header('location: '.$actual_link);
?>
