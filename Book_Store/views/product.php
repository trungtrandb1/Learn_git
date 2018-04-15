<?php 
     // Tính tổng số dòng trong bảng category sử dụng mysqli_num_rows();
    
    $sql_count = "SELECT id FROM book";
    $res_count = mysqli_query($conn,$sql_count);
    $num_rows = mysqli_num_rows($res_count);

        // Lấy giá trị page hiện tại theo $_GET['page'] trên url
    
    $curren_page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Đặt giá trị số dòng trên 1 lần hiển thị ( trên 1 trang )
    
    $limit = 8;  
    $start = ($curren_page-1) * $limit;
    $sql = "SELECT * FROM book ORDER BY created ASC LIMIT $start,$limit";

   

    // Từ tổng số dòng và số số limit => số trang ( 1,2,3,4 )
    
    $total_pages = ceil($num_rows/$limit);  

    
    $res_product = mysqli_query($conn,$sql);
?>
<div class="mb-3">					
	<div class="card border-primary" >
		<div class="card-header bg-primary " style="color:white; font-weight: bold; font-size: 16px;">
			Sách mới cập nhật
		</div>
		<div class="row">
		<?php  
			// $get_product = "SELECT * FROM book ORDER BY created DESC LIMIT 8";
			// $res_product = mysqli_query($conn,$get_product);

			while ($book = mysqli_fetch_assoc($res_product)) : 
		?>
			<div class="card-body col-lg-3 col-md-4 col-sm-6">
				<div class="thumbnail">
				  <a href="index.php?view=detail&id=<?php echo $book['id'] ?>">
				  	<img class="img_pro" src=" <?php echo $book['img_link'] ?> " alt="" data-toggle="tooltip" data-placement="top" title="<?php echo $book['name'] ?>">
				  </a>
					<div class="caption text-center" style="margin-bottom: 10px; margin-top: auto">
						<p>
							<b>Giá: <?php echo number_format($book['price']); ?> đ</b>
						</p>
						<p>
							<a href="index.php?view=detail&id=<?php echo $book['id'] ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
							<a href="process_cart.php?id=<?php echo	$book['id']; ?>" class="btn btn-default add-cart"><i class="fas fa-shopping-cart"></i></a>
						</p>
					</div>
				</div>
			</div>
			<?php endwhile; ?> <!--  /card body --> 
		</div><!-- /row -->
		<ul class="pagination" style="display: block-inline; margin: auto;">
	        <!-- <li class="page-item"><a  class="page-link"    href="#">&laquo;</a></li> -->
	            <?php for ($i = 1; $i <= $total_pages; $i++) : 
	                $class_active = $curren_page == $i ? 'active' : '';
	            ?>
	        <li class="<?php echo $class_active;?> page-item">
	            <a class="page-link" href="index.php?view=product&page=<?php echo $i; ?>&show=<?php echo $limit; ?>"><?php echo $i; ?></a>
	        </li>
	    <?php endfor; ?>
	        <!-- <li class="page-item"><a class="page-link" href="#">&raquo;</a></li> -->
	    </ul>
	</div>
</div>