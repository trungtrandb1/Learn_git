<?php 
	ob_start();
	session_start();
	define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'book_store');

    $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    mysqli_set_charset($conn,'utf8');

    $custom = isset($_SESSION['user'])? $_SESSION['user'] : []; 

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="asset/img/icon.jpg" type="image/gif" sizes="16x16">
		<title>Book Store</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

		

		<!-- Custom styles and js for this template -->
		<link href="asset/css/style.css" rel="stylesheet">
		<script src="asset/js/script.js"></script>

		
	</head>
	<style>
		
	</style>

	<body>
		<div class="container">
			<div class="row top-bar mb-3 mt-3">
				<div class="col-lg-3 logo">
					<a href="index.php">
						<img src="asset/img/logo.png" alt="Logo">
					</a>
				</div>
				<div class="col-lg-6 search">
					<div class="input-group">
					<input type="text" class="form-control" placeholder="Nhập vào sản phẩm">
					<span class="input-group-btn">
						<button class="btn btn-primary" type="button">Tìm kiếm <i class="fas fa-search"></i></button>
					</span>
				</div>

				</div>
				<div class="col-lg-3 cart">
					<a href="index.php?view=cart">
						<i class="fas fa-shopping-cart"></i> Giỏ hàng <span class="san_pham"><?php echo $_SESSION['cart_total']; ?></span> sản phẩm
					</a>
				</div>	
			</div>
			<div class="masthead" style="line-height: 2">
				<nav class="navbar navbar-expand-lg navbar-light rounded mb-3 p-0">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarCollapse">
						<ul class="navbar-nav text-md-center nav-justified w-100">
							<li class="nav-item">
								<a class="nav-link" href="index.php">Trang chủ</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Giới thiệu</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="index.php?view=huongdan">Hướng dẫn</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="index.php?view=product">Sản phẩm</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Tin tức</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Liên hệ</a>
							</li>
							<?php if (isset($_SESSION['user']['id'])) {
								echo '
								<li class="nav-item dropdown">
						          <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						            Tài khoản
						          </a>
						          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
						            <a class="dropdown-item" href="index.php?view=user_ordered">Chi tiết tài khoản</a>
						            <a class="dropdown-item" href="views/log_out.php">Đăng xuất</a>
						          </div>
						        </li>
					        ';
							}else{
								echo '
								<li class="nav-item dropdown">
						          <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						            Tài khoản
						          </a>
						          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
						            <a class="dropdown-item" href="index.php?view=sign_up">Đăng kí</a>
						            <a class="dropdown-item" href="" role="button" data-toggle="modal" data-target="#login">Đăng nhập</a>
						          </div>
						        </li>
					        ';
							} 
							?>
						</ul>
					</div>
				</nav>
			</div>

			<div class="row">
				<div class="col-lg-8 left ">
					<div class="card border-primary">
						<div class="card-header bg-primary text-white">
							Thông tin giao hàng
						</div>
						<div class="card-body">
							<p class="text-danger font-italic" id="info_erro">Không có thông tin người nhận, vui lòng <a href="" role="button" data-toggle="modal" data-target="#login">Đăng nhập</a> hoặc điền thông tin người nhận. Nếu chưa có tài khoản vui lòng <a href="index.php?view=sign_up">Đăng kí</a></p>
							<form class="card-body" method="POST" action="#">
								<fieldset class="form-group">
									<label for="name">Họ và tên</label>
									<input type="text" class="form-control" id="order_name" name="order_name" value="<?php echo $custom ? $custom['name'] : ''?> ">
									<div class="order_name-erro text-danger font-italic"></div>
								</fieldset>
								<fieldset class="form-group">
									<label for="email">Email</label>
									<input type="text" class="form-control" id="order_email" name="order_email" value="<?php echo $custom ? $custom['email'] : ''?> ">
									<div class="order_email-erro text-danger font-italic"></div>
								</fieldset>
								<fieldset class="form-group">
									<label for="phone">Số điện thoại</label>
									<input type="text" class="form-control" id="order_phone" name="order_phone" value="<?php echo $custom ? $custom['phone'] : ''?> ">
									<div class="order_phone-erro text-danger font-italic"></div>
								</fieldset>
								<fieldset class="form-group">
									<label for="address">Địa chỉ nhận hàng</label>
									<input type="text" class="form-control" id="order_address" name="order_address" value="<?php echo $custom ? $custom['address'] : ''?> ">
									<div class="order_address-erro text-danger font-italic"></div>
								</fieldset>
								<fieldset class="form-group">
									<label for="address">Ghi chú</label>
									<input type="text" class="form-control">
								</fieldset>
								
								<input type="submit" class="btn btn-primary" value="Lưu" name="add_user_btn" onclick=" return add_user()">
								<input type="reset" class="btn btn-danger">
							</form>		  
						</div>
					</div>
				</div>
			<div class="col-lg-4">
				<div class="card border-primary">
					<div class="card-header bg-primary text-white">
						Thông tin đơn hàng
					</div>
					<div class="card-body">
						<table class="table table-inverse">
							<p class="text-danger font-italic" id="empty_cart_err">Không có sản phẩm nào trong giỏ hàng</p>
						  	<tr>
						  		<td>Tạm tính(<?php echo $_SESSION['cart_total']; ?> sản phẩm):</td>
						  		<td><?php echo number_format($_SESSION['total_amount'])?> đ</td>
						  	</tr>
						  	<tr>
						  		<td>Phí vận chuyển:</td>
						  		<td class="font-italic">Miễn phí</td>
						  	</tr>
						  	<tr>
						  		<td>Phương thức thanh toán:</td>
						  		<td>Thanh toán khi nhận hàng</td>
						  	</tr>
						</table>
						<form action="#" method="POST">
						  <input type="submit" class="btn btn-primary order_btn" value="Đặt hàng" name="order_btn" >
						</form>
					</div>
				</div>
			</div>
			<?php  
			$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
				if (isset($_POST['order_btn'])) {
					$user_id = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0;  
					$full_name = $custom['name'];
					$email = $custom['email'];
					$address = $custom['address'];
					$phone = $custom['phone'];
					$order_note = isset($custom['note']) ? $custom['note'] : '';
					$total_amount = $_SESSION['total_amount'];
					$total_qty = $_SESSION['cart_total'];

					// Kiểm tra trạng thái tài khoản user, đặt hàng
					$_SESSION['user']['status'] = isset($_SESSION['user']['status']) ? $_SESSION['user']['status'] : 0;
					if($_SESSION['user']['status'] == 0){
						$sql_order = "INSERT INTO orders(user_id, full_name, email, address, phone, order_note, total_amount, total_qty) VALUES ('$user_id', '$full_name', '$email', '$address', '$phone', '$order_note', '$total_amount', '$total_qty')";
						$res_order = mysqli_query($conn, $sql_order);
						if ($res_order) {
							$order_id = mysqli_insert_id($conn);
							foreach ($cart as $product_cart) {
								$product_id = $product_cart['id'];
								$qty = $product_cart['qty'];
								$amount = number_format($product_cart['qty'] * $product_cart['price']);
								$status = 0;

								$sql_order_detail = "INSERT INTO order_detail(order_id, product_id, qty, amount, status) VALUES ('$order_id', '$product_id', '$qty', '$amount', '$status')";
								$res_order_detail = mysqli_query($conn, $sql_order_detail);

								if ($res_order_detail) {
									session_destroy();
									echo "
									<script>
									alert('Đặt hàng thành công!');
									$(location).attr('href', 'index.php')
									</script>";
								}
							}
						}else{
							echo "<script>alert('Đặt hàng thất bại!')</script>";
							// echo $sql_order;
						}
					}else{
						echo "<script>alert('Tài khoản của bạn đã bị khóa, liên hệ với quản trị viên để biết thêm chi tiết!')</script> ";
					}
			
				}

	// Kiểm tra thông tin khách hàng và giỏ hàng, thay đổi thuộc tính submit button 
				if (!isset($_SESSION['user'])) {
					echo "<script>
						 $('.order_btn').attr('disabled', true);
						 $('#info_erro').removeClass('hidden');
					</script>";
				}else {
					echo "
					<script>
						$('#info_erro').addClass('hidden');
					</script>
					";
				}

				if ($_SESSION['cart_total'] == 0) {
					echo "<script>
						$('.order_btn').attr('disabled', true);
						$('#empty_cart_err').removeClass('hidden');
					</script>";
				}else {
					echo "<script>
						$('#empty_cart_err').addClass('hidden');
					</script>";
				}

				

	// Insert thông tin người nhận nếu chưa có tài khoản
				if (isset($_POST['add_user_btn'])) {
					$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					$_SESSION['user']['name'] = $_POST['order_name'];
					$_SESSION['user']['email'] = $_POST['order_email'];
					$_SESSION['user']['address'] = $_POST['order_address'];
					$_SESSION['user']['phone'] = $_POST['order_phone'];	
					header('location: '.$actual_link);
				}
			?>
		</div>
		<?php include 'views/login.php'; ?>
		<?php include 'views/footer.php'; ?>
	</div><!-- /container -->

		<!-- Font awesome -->
		<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	</body>
</html> 
<?php  ob_end_flush(); ?>