<?php 
    $sql = 'SELECT * FROM orders ORDER BY id ASC';
    $res = mysqli_query($conn,$sql);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card   mb-3">
            <div class="card-body">
            	 <h5 class="card-title">Danh sách đơn hàng</h5>
                <table class="table table-inverse table-hover text-center">
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
                                    Đang chờ
                                    <a href="index.php?module=order&action=active&status=1&id=<?php echo $order['id'] ?>" class="badge badge-success">Xử lý</a>
                                    <a href="index.php?module=order&action=active&status=2&id=<?php echo $order['id'] ?>" class="badge badge-danger">Hủy</a>
                                <?php elseif($order['status'] == 1) : ?>
                                    Đã xử lý <a href="index.php?module=order&action=active&status=2&id=<?php echo $order['id'] ?>" class="badge badge-danger">Hủy</a>
                                <?php else : ?>
                                    Đã từ chối
                                <?php endif; ?>
                            </td>
                            <td style="text-align: right">
                                <a href="index.php?module=order&action=order_detail&id=<?php echo $order['id'] ?>">Chi tiết</a>
                                <!-- <a href="index.php?module=order&action=delete&id=<?php echo $order['id'] ?>" class="btn btn-xs btn-default"><i class="fas fa-trash"></i></a> -->
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
