	<div class="card border-primary" >
		<div class="card-header bg-primary " style="color:white; font-weight: bold; font-size: 16px;">
			Đăng ký tài khoản
		</div>
		<form class="card-body" method="POST" acction="#">
			<fieldset class="form-group">
				<label for="name">Họ và tên</label>
				<input type="text" class="form-control" id="name" name="name" placeholder="Họ và tên">
				<div class="name-erro text-danger font-italic"></div>
			</fieldset>
			<fieldset class="form-group">
				<label for="email">Email (Tên đăng nhập)</label>
				<input type="text" class="form-control" id="email" name="email" placeholder="Địa chỉ email">
				<div class="email-erro text-danger font-italic"></div>
			</fieldset>
			<fieldset class="form-group">
				<label for="password">Mật khẩu</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" >
				<div class="password-erro text-danger font-italic"></div>
			</fieldset>
			<fieldset class="form-group">
				<label for="cpassword">Nhập lại mật khẩu</label>
				<input type="password" class="form-control" id="cpassword" placeholder="Nhập lại mật khẩu" >
				<div class="cpassword-erro text-danger font-italic"></div>
			</fieldset>
			<fieldset class="form-group">
				<label for="phone">Số điện thoại</label>
				<input type="text" class="form-control" id="phone" name="phone" placeholder="Số điện thoại">
				<div class="phone-erro text-danger font-italic"></div>
			</fieldset>
			<fieldset class="form-group">
				<label for="address">Địa chỉ</label>
				<input type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ">
				<div class="address-erro text-danger font-italic"></div>
			</fieldset>
			<input type="submit" class="btn btn-primary" value="Đăng kí" name="su_btn" onclick=" return check()">
			<input type="reset" class="btn btn-danger">
		</form>		  		
	</div>

	<?php  
		if (isset($_POST['su_btn'])) 
		{
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];

			$sql_check_acc = "SELECT * FROM user WHERE email = '$email'";
			$res_check_acc = mysqli_query($conn,$sql_check_acc);

			if (mysqli_num_rows($res_check_acc) > 0) 
			{
				echo "Tài khoản này đã tồn tại";
			}else{
				$sql_insert_acc = "INSERT INTO user(name, email, password, phone, address) VALUES ('$name', '$email', '$password', '$phone', '$address')";
				$res_insert_acc = mysqli_query($conn, $sql_insert_acc);

				if ($res_insert_acc) 
				{
					echo "Thêm mới tài khoản thành công!";
				}else {
					echo "Thêm mới tài khoản thất bại!";
				}
			}

		}
	?>