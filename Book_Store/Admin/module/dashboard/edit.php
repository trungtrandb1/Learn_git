
<?php 
if(!empty($_POST['username'])){
     $username = $_POST['username'];    
     $password = $_POST['password'];    
     $fullname = $_POST['fullname'];    
     $phone = $_POST['phone'];    

    $sql = "INSERT INTO `admin` (`id`, `username`, `password`, `fullname`, `phone`, `created`) VALUES (NULL, '$username', '$password', '$fullname', '$phone', CURRENT_TIMESTAMP)";
    $res = mysqli_query($conn,$sql);

    if ($res) {
        echo "Thêm mới thành công";
    }else {
        echo "Thêm mới thất bại";
    }
} 

    <!-- get current admin info -->

    $sql_view = "SELECT * FROM admin WHERE id = '$id' ";
    $res_view = mysqli_query($conn,$sql_view);
    $cur = mysqli_fetch_assoc($res_view);
    
 
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card   mb-3">
            <div class="card-body">
                <h5 class="card-title">Chỉnh sửa thông tin quản trị viên</h5>
                 <form acction="" method="POST" enctype="multipart/form-data">
                    <fieldset class="form-group">
                        <label for="">Tên đăng nhập</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $cur['username'] ?>">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="">Mật khẩu</label>
                        <input type="text" class="form-control" name="password">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="">Họ và tên</label>
                        <input type="text" class="form-control" name="fullname">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone">
                    </fieldset>
                    <input type="submit" class="btn btn-success" value="Thêm mới">
                    <input type="reset" class="btn btn-danger" >
                </form>
              </div>
            </div>
        </div>
    </div>
</div>

<?php 
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    echo "VietNam: ".date("Y-m-d H:i:s"). "<br>"; 
?>
