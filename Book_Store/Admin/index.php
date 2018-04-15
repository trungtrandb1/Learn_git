<?php 
/*
    * Cấu hình kết nối CSDL
    */

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'book_store');

    $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    mysqli_set_charset($conn,'utf8');

    // end connect
  ob_start();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
	<script src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<style>
		body{
      background:#f9f9f9;
    }

    #wrapper{
      padding:90px 15px;
    }

    .navbar-expand-lg .navbar-nav.side-nav{
      flex-direction: column;
    }

    .card{
      margin-bottom: 15px; 
      border-radius:0; 
      box-shadow: 0 3px 5px rgba(0,0,0,.1); 
    }

    .header-top{
      box-shadow: 0 3px 5px rgba(0,0,0,.1)
    }

  @media(min-width:992px) {
    #wrapper{
      margin-left: 200px;
      padding: 90px 15px 15px;
    }
    .navbar-nav.side-nav{
      background: #585f66;
      box-shadow: 2px 1px 2px rgba(0,0,0,.1);
      position:fixed;top:56px;
      flex-direction: column!important;
      left:0;
      width:200px;
      overflow-y:auto;
      bottom:0;
      overflow-x:hidden;
      padding-bottom:40px
    }
  }
	</style>
</head>
<body>
 
<?php 
session_start();


if(!isset($_SESSION['admin_login'])){
  header('location: login.php');
}else{
  $admin = $_SESSION['admin_login'];
}
?>
<div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
      <a class="navbar-brand" href="#">LOGO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav side-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Bảng điều khiển<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?module=product">Quản lí sản phẩm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?module=category">Quản lí danh mục</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?module=publish">Quản lí Nhà xuất bản</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Khách hàng
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="index.php?module=accounts">Danh sách khách hàng</a>
            <a class="dropdown-item" href="index.php?module=order">Quản lí đơn hàng</a>
          </div>
        </li>
          
      </ul>
        <ul class="navbar-nav ml-md-auto d-md-flex">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">Home</a>
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Hi <?php echo $admin['fullname']; ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="index.php?module=accounts">Thông tin tài khoản</a>
            <a class="dropdown-item" href="logout.php">Đăng xuất</a>
            <div class="dropdown-divider"></div>
          </div>
        </li>  
        </ul>
      </div>
    </nav>
    <?php 
            $module = isset($_GET['module']) ? $_GET['module'] : 'dashboard';
            $action = isset($_GET['action']) ? $_GET['action'] : 'main';
            $file_name = 'module/'.$module.'/'.$action.'.php';
            include $file_name;
        ?>
  </div>
</body>
</html>