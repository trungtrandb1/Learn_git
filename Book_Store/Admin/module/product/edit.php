
<?php 
$id = $_GET['id'];
if(!empty($_FILES['img'])){
    $p_name = $_POST['p_name'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $author = $_POST['author'];
    $pub_id = $_POST['pub_id'];
    $cat_name =$_POST['cate_name'];
    $f = $_FILES['img'];
    $img_link = 'Uploads/'.$f['name'];

    
    $mvf =  move_uploaded_file($f['tmp_name'], '../Uploads/'.$f['name']);

    $sql = "UPDATE book SET cat_name = '$cat_name',
                            name = '$p_name',
                            author = '$author',
                            price = '$price',
                            price_sale = '$discount',
                            pub_id = '$pub_id',
                            img_link = '$img_link' 
            WHERE id = '$id'";
    $res = mysqli_query($conn,$sql);

    if ($res) {
        echo "Chỉnh sửa thành công";
    }else {
        echo "Chỉnh sửa thất bại";
    }
}    
?>

<!-- get current product -->
<?php 
    $sql_view = "SELECT * FROM book WHERE id = '$id' ";
    $res_view = mysqli_query($conn,$sql_view);
    $cur = mysqli_fetch_assoc($res_view);
    
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card   mb-3">
            <div class="card-body">
                <h5 class="card-title">Chỉnh sửa chi tiết sản phẩm</h5>
                 <form acction="" method="POST" enctype="multipart/form-data">
                    <fieldset class="form-group">
                        <label for="">Ảnh sản phẩm</label>
                        <input type="file" class="form-control" name="img" value="<?php echo $cur['img_link'] ?>">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="p_name">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="p_name" id="p_name" value="<?php echo $cur['name'] ?>">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="cat_name">Danh mục </label>
                        <?php 
                            $get_cat= 'SELECT * FROM category ORDER BY  cat_id ASC';
                            $res_cat = mysqli_query($conn,$get_cat);
                        ?>  
                        <select name="cate_name" id="cat_name" class="form-control">
                        <?php while($category = mysqli_fetch_assoc($res_cat)) : ?>
                            <option value="<?php echo $category['cat_name']; ?>"> <?php echo $category['cat_name']; ?></option>
                        <?php endwhile; ?>
                        </select>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="">Tác giả</label>
                        <input type="text" class="form-control" name="author" value="<?php echo $cur['author']; ?>" >
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="">Nhà xuất bản</label>
                        <input type="text" class="form-control" name="pub_id" value="<?php echo $cur['pub_id']; ?>">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="price">Giá sản phẩm</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo $cur['price']; ?>">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="discount">Giảm giá</label>
                        <input type="text" class="form-control" id="discount" name="discount" value="<?php echo $cur['price_sale']; ?>">
                    </fieldset>
                    <input type="submit" class="btn btn-success" value="Cập nhật chỉnh sửa">
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
