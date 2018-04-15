<?php 
    // $sql_custom_show = 'SELECT * FROM user ORDER BY id ASC';
    // $res_custom_show = mysqli_query($conn,$sql_custom_show);
?>

<?php 
     // Tính tổng số dòng trong bảng category sử dụng mysqli_num_rows();
    
    $sql_count = "SELECT id FROM user";
    $res_count = mysqli_query($conn,$sql_count);
    $num_rows = mysqli_num_rows($res_count);

        // Lấy giá trị page hiện tại theo $_GET['page'] trên url
    
    $curren_page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Đặt giá trị số dòng trên 1 lần hiển thị ( trên 1 trang )
    
    $limit = isset($_REQUEST['show']) ? $_REQUEST['show'] : 5;  
    $start = ($curren_page-1) * $limit;
    $sql = "SELECT * FROM user ORDER BY id ASC LIMIT $start,$limit";

    // Mỗi lần thay đổi số dòng hiển thị thì chuyển hướng để đảm bảo không lỗi trang danh sách
    

    if (isset($_POST['show'])) {
        $show = $_POST['show'];
                
        header('location: index.php?module=accounts&page=1&show='.$show);
    }

    // Từ tổng số dòng và số số limit => số trang ( 1,2,3,4 )
    
    $total_pages = ceil($num_rows/$limit);  

    /**
    * Tính dòng bắt đàu lấy cho mỗi trang
    * VD tráng 1 sẽ lấy từ 0 -> 5, trang 2 lấy từ 5 -> 5...
    */
    
    $res_custom_show = mysqli_query($conn,$sql);

?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card   mb-3">
            <div class="card-body">
                <h5 class="card-title">Danh sách khách hàng</h5>

                <form action="" method="POST" class="form-inline pull-right" role="form">
                    <div class="form-group">
                        <select name="show" class="form-control">
                            <option value="1">1</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </form>

                <table class="table table-inverse table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ tên</th>
                            <th>Địa chỉ email</th>
                            <th>Só điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Trạng thái</th>
                            <th>Thời gian tạo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($custom = mysqli_fetch_assoc($res_custom_show)) : ?>
                        <tr>
                            <td><?php echo $custom['id']; ?></td>
                            <td><?php echo $custom['name']; ?></td>
                            <td><?php echo $custom['email']; ?></td>
                            <td><?php echo $custom['phone']; ?></td>
                            <td><?php echo $custom['address']; ?></td>
                            <td>
                                <?php if($custom['status'] == 1) : ?>
                                    Active <a href="index.php?module=accounts&action=active&status=0&id=<?php echo $custom['id'] ?>" class="badge badge-danger">Deactive</a>
                                <?php else: ?>
                                    Deactive <a href="index.php?module=accounts&action=active&status=1&id=<?php echo $custom['id'] ?>" class="badge badge-success">Active</a>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $custom['created'] ?></td>
                            <td style="text-align: right">
                                <a href="index.php?module=product&action=edit&id=<?php echo $product['id'] ?>" class="btn btn-xs btn-default"><i class="fas fa-edit"></i></a>
                                <a href="index.php?module=product&action=delete&id=<?php echo $product['id'] ?>" class="btn btn-xs btn-default" onclick="return confirm('Bạn có chắc chắn!')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
    <ul class="pagination">
        <!-- <li class="page-item"><a  class="page-link"    href="#">&laquo;</a></li> -->
            <?php for ($i = 1; $i <= $total_pages; $i++) : 
                $class_active = $curren_page == $i ? 'active' : '';
            ?>
        <li class="<?php echo $class_active;?> page-item">
            <a class="page-link" href="index.php?module=accounts&page=<?php echo $i; ?>&show=<?php echo $limit; ?>"><?php echo $i; ?></a>
        </li>
    <?php endfor; ?>
        <!-- <li class="page-item"><a class="page-link" href="#">&raquo;</a></li> -->
    </ul>
</div>
