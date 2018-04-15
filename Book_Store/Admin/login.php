<?php 
session_start();


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

    if(isset($_SESSION['admin_login'])){
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Trang đăng nhập</title>


    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Include the above in your HEAD tag -->

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <style>
        body, html{
            background-repeat: no-repeat;
            background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
            height: 100%;
        }
    </style>
</head>
<body>
    <?php 
                if (isset($_POST['username'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";

                    $res = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($res) == 1) {
                        $row = mysqli_fetch_assoc($res);
                        $_SESSION['admin_login'] = $row;
                        header('location: index.php');
                    }else{
                        echo '
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Thông tin không đúng
                            </div>
                        ';
                    }
                }
            ?>

        <div class="container">
        <form class="form-horizontal" role="form" method="POST" action="">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Vui lòng đăng nhập</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                            <input type="text" name="username" class="form-control" 
                                placeholder="Tên đăng nhập" required autofocus>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder="Mật khẩu" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                        <!-- Put password error message here -->    
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6" style="padding-top: .35rem">
                    <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                        <label class="form-check-label">
                            <input class="form-check-input" name="remember"
                                   type="checkbox" >
                            <span style="padding-bottom: .15rem">Nhớ mật khẩu</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 1rem">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success"><i class="fa fa-sign-in"></i>Đăng nhập</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
