<?php 
if (isset($_POST['pub_name'])) {
    $pub_name =$_POST['pub_name'];
    $phone =$_POST['phone'];
    $address =$_POST['address'];

    $sql = "INSERT INTO publisher(pub_name,phone, address)VALUES ('$cat_name')";
    $res = mysqli_query($conn,$sql);
    if ($res) {
        echo "Thêm mới thành công";
    }else {
        echo "Thêm mới thất bại";
    }
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card   mb-3">
            <div class="card-body">
                <h5 class="card-title">Thêm danh mục</h5>
                <form acction="" method="POST">
                    <fieldset class="form-group">
                        <label for="cat_name">Tên danh mục</label>
                        <input type="text" class="form-control" id="cat_name" name="cat_name" >
                    </fieldset>
                    <input type="submit" class="btn btn-success" value="Thêm danh  mục">
                    <input type="reset" class="btn btn-danger" >
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<?php 
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    echo "VietNam: ".date("Y-m-d H:i:s"). "<br>"; ?>
