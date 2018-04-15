<?php 
	$sql_admin_show = 'SELECT * FROM admin ORDER BY id ASC';
	$res_admin_show = mysqli_query($conn,$sql_admin_show);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card   mb-3">
            <div class="card-body">
                <h5 class="card-title">Danh sách quản trị viên</h5>
                <table class="table table-inverse table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên đăng nhập</th>
                            <!-- <th>Mật khẩu</th> -->
                            <th>Tên đầy đủ</th>
                            <th>Số điện thoại</th>
                            <th>Ngày tạo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($admin = mysqli_fetch_assoc($res_admin_show)) : ?>
                        <tr>
                            <td><?php echo $admin['id']; ?></td>
                            <td><?php echo $admin['username']; ?></td>
                            
                            <td><?php echo $admin['fullname']; ?></td>
                            <td><?php echo $admin['phone'] ?></td>
                            <td><?php echo $admin['created'] ?></td>
                            <td style="text-align: right">
                                <a href="index.php?module=dashboard&action=edit&id=<?php echo $admin['id'] ?>" class="btn btn-xs btn-default"><i class="fas fa-edit"></i></a>
                                <a href="index.php?module=dashboard&action=delete&id=<?php echo $admin['id'] ?>" class="btn btn-xs btn-default" onclick="return confirm('Bạn có chắc chắn!')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
                <a href="index.php?module=dashboard&action=add" class="btn btn-success">Thêm mới quản trị viên</a>
              </div>
            </div>
        </div>
    </div>
</div>

<?php 
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    echo "VietNam: ".date("Y-m-d H:i:s"). "<br>"; ?>