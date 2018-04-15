
<?php 
if(!empty($_FILES['img'])){
     $p_name = $_POST['p_name'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $description = $_POST['description'];
    $author = $_POST['author'];
    $pub_id = $_POST['pub_id'];
    $cat_name =$_POST['cate_name'];
    $f = $_FILES['img'];
    $img_link = 'Uploads/'.$f['name'];

    
    $mvf =  move_uploaded_file($f['tmp_name'], '../Uploads/'.$f['name']);

    $sql = "INSERT INTO `book` (`id`, `cat_name`, `name`, `author`, `price`, `price_sale`, `pub_id`, `description`, `img_link`,`p_status`,`viewd`, `created`) VALUES (NULL, '$cat_name', '$p_name', '$author', '$price', ' $discount', '$pub_id', '$description', '$img_link',1,0, CURRENT_TIMESTAMP)";
    $res = mysqli_query($conn,$sql);

    if ($res && $mvf) {
        echo "Thêm mới thành công";
    }else {
        echo "Thêm mới thất bại";
        echo $sql;
    }
}    
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card   mb-3">
            <div class="card-body">
                <h5 class="card-title">Thêm sản phẩm</h5>
                 <form acction="" method="POST" enctype="multipart/form-data">
                    <fieldset class="form-group">
                        <label for="">Ảnh sản phẩm</label>
                        <input type="file" class="form-control" name="img">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="p_name">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="p_name" id="p_name" >
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
                        <input type="text" class="form-control" name="author" >
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="">Nhà xuất bản</label>
                        <?php 
                            $get_pub= 'SELECT * FROM publisher ORDER BY  pub_id ASC';
                            $res_pub = mysqli_query($conn,$get_pub);
                        ?>  
                        <select name="pub_id" id="pub_id" class="form-control">
                        <?php while($pub = mysqli_fetch_assoc($res_pub)) : ?>
                            <option value="<?php echo $pub['pub_id']; ?>"> <?php echo $pub['pub_name']; ?></option>
                        <?php endwhile; ?>
                        </select>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="price">Giá sản phẩm</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="discount">Giảm giá</label>
                        <input type="text" class="form-control" id="discount" name="discount">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="description">Chi tiết sản phẩm</label>
                        <input type="text" class="form-control" id="description" name="description" >
                    </fieldset>
                    <input type="submit" class="btn btn-success" value="Thêm sản phẩm">
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
