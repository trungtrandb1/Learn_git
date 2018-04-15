<div class="modal fade" id="login">
	<div class="modal-dialog mt-5">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Thông tin đăng nhập</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="#">
					<fieldset class="form-group">
					  <label for="email">Tên đăng nhập( Email)</label>
					  <input type="email" class="form-control" id="email" name="email_login" placeholder="Email" autofocus>
					</fieldset>
					<fieldset class="form-group">
					  <label for="password">Mật khẩu</label>
					  <input type="password" class="form-control" id="password" name="password_login" placeholder=" Mật khẩu">
					</fieldset>
					  <input type="submit" class="btn btn-primary" name="login" value="Đăng nhập" >
					  <input type="button" class="btn btn-danger" data-dismiss="modal" value="Hủy">
				</form>
			</div>
		</div>
	</div>
</div><!-- /.modal -->

<?php 
  if (isset($_POST['login'])) 
  {
    $email = $_POST['email_login'];
    $password = $_POST['password_login'];

    $sql_login = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $res_login = mysqli_query($conn,$sql_login);
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if (mysqli_num_rows($res_login) == 1) 
    {
      $_SESSION['user'] =  mysqli_fetch_assoc($res_login);
      // echo "
      // <script>
      // 	alert('Đăng nhập thành công');
      // 	location.assign(location.href);
      // </script>";
      header('location: '.$actual_link);
    }else{
      echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu')</script>";
    }
  }

  
?>	