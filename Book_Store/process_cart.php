<?php  
	define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'book_store');

    $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    mysqli_set_charset($conn,'utf8');
    		// --connect

	session_start();
	$id = $_GET['id'];
	$qty = isset($_GET['qty']) ? $_GET['qty'] : 1;
	if (!is_numeric($qty) || ($qty < 1)) {
		$qty = 1;
	}

	$qty = number_format($qty,0);
	$action = isset($_GET['action']) ? $_GET['action'] : 'add';

	$sql = "SELECT * FROM book where id = '$id'";
	$row = mysqli_fetch_assoc(mysqli_query($conn,$sql));

	if ($row && $action == 'add') {
		if (isset($_SESSION['cart'][$id])) {
			$_SESSION['cart'][$id]['qty'] = $qty;
		}else {
			$_SESSION['cart'][$id] = $row;
			$_SESSION['cart'][$id]['qty'] = 1;
		}
	}

	if ($action == 'delete') {
		if (isset($_SESSION['cart'][$id])) {
			unset($_SESSION['cart'][$id]); // xóa sản phẩm trong giỏ hàng theo id
		}
	}

	if ($action == 'delete_all') {
		if (isset($_SESSION['cart'])) {
			unset($_SESSION['cart']); // xóa  toàn bộ sản phẩm trong giỏ hàng
		}
	}

		

header('location: index.php?view=cart');
?>