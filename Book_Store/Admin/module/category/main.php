<?php 
    $sql = 'SELECT * FROM category ORDER BY cat_id ASC';
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
                            <th>Mã danh mục</th>
                            <th>Tên danh mục</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($category = mysqli_fetch_assoc($res)) : ?>
                        <tr>
                            <td><?php echo $category['cat_id']; ?></td>
                            <td><?php echo $category['cat_name']; ?></td>
                            <td style="text-align: right">
                                <a href="#" class="btn btn-xs btn-default"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
                <a href="index.php?module=category&action=add" class="btn btn-success">Thêm danh mục</a>
              </div>
            </div>
        </div>
    </div>
</div>
<?php 
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    echo "VietNam: ".date("Y-m-d H:i:s"). "<br>"; ?>
