<?php 
	$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
	$_SESSION['total_amount'] = 0;
	$_SESSION['total_qty'] = 0;
 ?>
 	<div class="card border-primary" >
		<div class="card-header bg-primary " style="color:white; font-weight: bold; font-size: 16px;">
			Giỏ hàng của bạn
		</div>
			<div class="card-body">
				<table class="table table-inverse table-hover">
		      <thead>
				<tr>
		          <th>STT</th>
		          <th>Ảnh</th>
		          <th>Tên sản phẩm</th>
		          <th>Số lượng</th>
		          <th>Đơn giá</th>
		          <th>Thành tiền</th>
		          <th></th>
		        </tr>
				  </thead>
		      <tbody>
		      <?php $n = 1; if (count($cart)) : foreach ($cart as $product_cart) : 
		      	$_SESSION['total_amount'] = $_SESSION['total_amount'] + $product_cart['qty'] * $product_cart['price'];
		      	$_SESSION['total_qty'] = $_SESSION['total_qty'] + $product_cart['qty'];
		      ?>	
		        <tr>
		         	<td><?php echo $n; ?></td>
		          <td>
		            <img src="<?php echo $product_cart['img_link']; ?>" alt="" style="width: 50px">
		          </td>
		          <td><a href="index.php?view=detail&id=<?php echo $product_cart['id'] ?>"><?php echo $product_cart['name']; ?></a></td>
		          <td><?php echo $product_cart['qty']; ?></td>
		          <td><?php echo number_format($product_cart['price']); ?> đ</td>
		          <td><?php echo number_format($product_cart['qty'] * $product_cart['price']); ?> đ</td>
		          <td>
		            <a href="process_cart.php?action=delete&id=<?php echo $product_cart['id'] ?>" class="btn btn-xs btn-default"><i class="fas fa-trash"></i></a>
		          </td>
		      	</tr>
		  		<?php $n++; endforeach; endif; ?>
		  			<tr>
		  				<th colspan="3">Tổng cộng</th>
		  				<th colspan="2"><?php echo $_SESSION['total_qty']; ?></th>
							<th colspan="2"><?php echo number_format($_SESSION['total_amount']); ?> đ</th>
		  			</tr>
		  		</tbody>
		    </table>
		  	<a href="order.php"><input type="button" class="btn btn-primary" value="Thanh toán"></a>
		  	<a href="index.php"><input type="button" name="" class="btn btn-info" value="Tiếp tục mua hàng"></a>
		  	<a href="process_cart.php?action=delete_all"><input type="button" name="" class="btn btn-danger" value="Hủy đơn hàng" onclick="return confirm('Bạn có chắc chắn muốn hủy toàn bộ đơn hàng?')"></a>
			</div>
		</div>