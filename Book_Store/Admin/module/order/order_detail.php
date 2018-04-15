<?php 
	$id = $_GET['id'];
    $orderSql = "SELECT * FROM orders WHERE id = $id";
    $res_order = mysqli_query($conn, $orderSql);
    $od_r = mysqli_fetch_assoc($res_order);
	$sql_order_detail = "SELECT dt.*,b.name,b.img_link,b.price FROM order_detail dt JOIN book b ON b.id = dt.product_id WHERE dt.order_id = $id";
	$res_ordedts = mysqli_query($conn, $sql_order_detail);
    
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Chi tiết đơn hàng</h5>
                    <table class="table table-hover ">
                        <tbody>
                            <tr>
                                <td>Mã đơn hàng</td>
                                <td><?php echo $od_r['id']; ?></td>
                            </tr>
                            <tr>
                                <td>Tên khách hàng</td>
                                <td><?php echo $od_r['full_name']; ?> </td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td><?php echo $od_r['address']; ?> </td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td><?php echo $od_r['phone']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $od_r['email']; ?></td>
                            </tr>
                                <td>Tổng số mặt hàng</td>
                                <td><?php echo $od_r['total_qty']; ?> sản phẩm</td>
                            </tr>
                            <tr>
                                <td>Tổng tiền</td>
                                <td><?php echo number_format($od_r['total_amount']); ?> đ</td>
                            </tr>
                            <tr>
                                <td>Thời gian đặt hàng</td>
                                <td><?php echo $od_r['created']; ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <h5 class="card-title">Chi tiết sản phẩm</h5>
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ảnh</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $n = 1; while ($r  = mysqli_fetch_assoc($res_ordedts)) : ?>
                            <tr>
                                <td><?php echo $n; ?></td>
                                <td>
                                    <img src="../<?php echo $r['img_link'] ?>" alt="" style="width:50px; height: auto; display: block; margin: auto;">
                                </td>
                                <td>
                                    <?php echo $r['name']; ?>
                                </td>
                                <td><?php echo number_format($r['price']); ?> đ</td>
                                <td><?php echo $r['qty']; ?></td>
                            </tr>
                        <?php $n++; endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
