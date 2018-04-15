<?php 
    $id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM orders WHERE user_id = $id";
    $res = mysqli_query($conn,$sql);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card mb-3 border-primary">
            <div class="card-body">
            	<h5 class="card-title">Thông tin tài khoản</h5>
                    <table class="table table-hover ">
                        <tbody>
                            <tr>
                                <td>Mã khách hàng</td>
                                <td><?php echo $_SESSION['user']['id']; ?></td>
                            </tr>
                            <tr>
                                <td>Họ và tên</td>
                                <td><?php echo $_SESSION['user']['name'] ?></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ khách hàng</td>
                                <td><?php echo $_SESSION['user']['address'] ?></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td><?php echo $_SESSION['user']['phone'] ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $_SESSION['user']['email'] ?></td>
                            </tr>
                        </tbody>
                    </table>

                <h5 class="card-title">Đơn hàng đã đặt</h5>
                <table class="table table-inverse table-hover">
                    <thead>
                        <tr>
							<th>Mã</th>
							<th>Ngày đặt</th>
                            <th>Tổng sản phẩm</th>
							<th>Tổng tiền</th>
							<th>Trạng thái</th>
                            <th></th>
						</tr>
                    </thead>
                    <tbody>
                    <?php while($order = mysqli_fetch_assoc($res)) : ?>
                        <tr>
                            <td><?php echo $order['id']; ?></td>
                            <td><?php echo $order['created']; ?></td>
                            <td><?php echo $order['total_qty'] ?> </td>
                            <td><?php echo $order['total_amount']; ?></td>
                            <td>
                                <?php if($order['status'] == 0) : ?>
                                    <span class="badge badge-warning">Đang chờ xử lý</span>
                                <?php elseif($order['status'] == 1) : ?>
                                    <span class="badge badge-success">Đã xử lý</span>
                                <?php else : ?>
                                    <span class="badge badge-danger">Đơn hàng bị từ chối</span>
                                <?php endif; ?>
                            </td>
                            <td style="text-align: right">
                                <a href="index.php?view=user_view_order&id=<?php echo $order['id'] ?>"> Xem chi tiết</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
</div>
<?php 
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    echo "VietNam: ".date("Y-m-d H:i:s"). "<br>"; ?>
