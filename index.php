<?php 
	ob_start();
	session_start();
	define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'book_store');

    $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    mysqli_set_charset($conn,'utf8');

// ajax mini-cart
  $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] :[];
	$_SESSION['cart_total'] = 0;
	if (count($cart)) {
		foreach ($cart as $c) {
			$_SESSION['cart_total'] = $_SESSION['cart_total'] + $c['qty']; 
		}
	}

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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

		

		<!-- Custom styles and js 	 -->
		<link href="asset/css/style.css" rel="stylesheet">
		<script src="asset/js/script.js"></script>	
	</head>
	<body>
		<div class="container">
			<div class="row top-bar mb-3 mt-3">
				<div class="col-lg-3 logo">
					<a href="index.php">
						<img src="asset/img/logo.png" alt="Logo">
					</a>
				</div>
				<div class="col-lg-6 search">
					<form class="input-group" action="index.php?view=search_product" method="GET">
						<input type="text" class="form-control" name="q" placeholder="Nhập vào sản phẩm">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit">Tìm kiếm <i class="fas fa-search"></i></button>
						</span>
					</form>
				</div>
				<div class="col-lg-3 cart" id="mini-cart">
					<a href="index.php?view=cart">
						<i class="fas fa-shopping-cart"></i> Giỏ hàng <span class="san_pham"><?php echo $_SESSION['cart_total']; ?></span> sản phẩm
					</a>
				</div>	
			</div>
			<div class="masthead" style="line-height: 2">
				<nav class="navbar navbar-expand-lg navbar-light rounded mb-3 p-0 ">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarCollapse">
						<ul class="navbar-nav text-md-center nav-justified w-100">
							<li class="nav-item">
								<a class="nav-link" href="index.php">Trang chủ</a>
							</li>
							<!-- <li class="nav-item">
								<a class="nav-link" href="#">Giới thiệu</a>
							</li> -->
							<li class="nav-item">
								<a class="nav-link" href="index.php?view=huongdan">Hướng dẫn</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="index.php?view=product">Sản phẩm</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Tin tức</a>
							</li>
							<!-- <li class="nav-item">
								<a class="nav-link" href="#">Liên hệ</a>
							</li> -->
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
				<div class="col-lg-3 left ">
					<div class="card border-primary mb-3">
				  		<div class="card-header bg-primary " style="color:white; font-weight: bold; font-size: 16px">
				  			<i class="fas fa-mobile-alt"></i> Danh mục sách
				  		</div>
			  			<ul class="list-group list-group-flush mb-0">
			  				<?php
			  					$sql = "SELECT * FROM category ORDER BY cat_id ASC";
			  					$res = mysqli_query($conn,$sql); 
			  					while ($catalog = mysqli_fetch_assoc($res)) : 
			  				?>
						    <li class="list-group-item"><a href="index.php?view=p_by_cat&cat_id=<?php echo $catalog['cat_id']; ?>"><?php echo $catalog['cat_name']; ?></a></li>
						    <?php endwhile; ?>
						</ul>
		  			</div>
				</div>
			<div class="col-lg-9">
				<?php 
					$view = isset($_GET['view']) ? $_GET['view'] : 'main';
					$path_view = 'views/'.$view.'.php';
					include $path_view;
				?> 
			</div>
			
		</div>
		<?php include 'views/login.php'; ?>
		<?php include 'views/footer.php' ?>
		</div><!-- /container -->

		<!-- Font awesome -->
		<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	</body>
	
</html> 
<?php  ob_end_flush(); ?>
