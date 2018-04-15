<?php 
    $sql = 'SELECT * FROM publisher ORDER BY pub_id ASC';
    $res = mysqli_query($conn,$sql);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card   mb-3">
            <div class="card-body">
                <table class="table table-inverse table-hover">
                    <thead>
                        <tr>
                            <th>Tên NXB</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($publish = mysqli_fetch_assoc($res)) : ?>
                        <tr>
                            <td><?php echo $publish['pub_name']; ?></td>
                            <td><?php echo $publish['phone']; ?></td>
                            <td><?php echo $publish['address']; ?></td>
                            <td style="text-align: right">
                                <a href="index.php?module=publish&action=delete&id=<?php echo $publish['pub_id'] ?>" class="btn btn-xs btn-default"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
                <a href="index.php?module=publish&action=add" class="btn btn-success">Thêm Nhà xuất bản</a>
              </div>
            </div>
        </div>
    </div>
</div>
<?php 
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    echo "VietNam: ".date("Y-m-d H:i:s"). "<br>"; ?>
