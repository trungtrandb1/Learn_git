<?php 
$id = $_GET['id'];
$view_pro_detail ="SELECT * FROM book  WHERE id = '$id'";
$res_view_detail = mysqli_query($conn,$view_pro_detail);
$view_detail = mysqli_fetch_assoc($res_view_detail);
if (isset($_SESSION['old_time'])) {
	$old_time = $_SESSION['old_time'];
}else{
	$_SESSION['old_time'] = time();
	$old_time = time();
	$update_bstatus = "UPDATE book SET viewd = viewd + 1 WHERE id = $id";
	$res_ud = mysqli_query($conn ,$update_bstatus);

}

$curent_tme = time();
// echo $old_time;
// echo '<br />';
// echo $curent_tme;
// echo '<br />';
$phut = round(($curent_tme - $old_time)/60);
if ($phut > 1) {
	$_SESSION['old_time'] = time();
	$update_bstatus = "UPDATE book SET viewd = viewd + 1 WHERE id = $id";
	$res_ud = mysqli_query($conn ,$update_bstatus);
}

										
?>
<div class="card border-primary" >
	<div class="card-header bg-primary " style="color:white; font-weight: bold; font-size: 16px;">
		Chi tiết sản phẩm
	</div>
	<div class="row my-5 mx-2">
		<div class="col-lg-5">
			<img style="max-width: 100%"  src=" <?php echo $view_detail['img_link'] ?>" alt="">
		</div>	
		<div class="col-lg-7 mt-3">
			<table class="table table-inverse">
				<tr>- Tên sách: <b><?php echo $view_detail['name'] ?></b></tr><br>
				<tr>- Giá :
					<?php 
					$view_detail['price'] = $view_detail['price_sale'] > 0 ? $view_detail['price_sale'] : $view_detail['price'];
					echo number_format($view_detail['price']);
					?> đ
				</tr><br>
				<tr>- Tác giả :<?php echo $view_detail['author'] ?></tr><br>
				<tr>- Nhà xuất bản :<?php echo $view_detail['pub_id'] ?></tr><br>
				<tr>- Số lượt xem :<?php echo $view_detail['viewd'] ?></tr><br>
				
			</table>
			<form action="process_cart.php?" method="get">
				<fieldset class="form-group">
					<label for="formGroupExampleInput">Số lượng</label>
					<input type="text" size="5" name="qty" value="1">
				</fieldset>
				<input type="hidden" value="<?php echo $view_detail['id']; ?>" name="id">
				<button type="submit" class="btn btn-success"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
			</form>
			
		</div>
	</div>
	<div class="row my-5 mx-2">
		<h4>Giới thiệu</h4>
			<p style="font-size: 14px;"><?php echo $view_detail['description']; ?></p>
	</div>
</div>