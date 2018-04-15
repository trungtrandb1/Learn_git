<div class="mb-3">					
	<div class="card border-primary" >
		<div class="card-header bg-primary " style="color:white; font-weight: bold; font-size: 16px;">
			Sản phẩm nổi bật
		</div>
		<div class="row">
		<?php  
			$cat_id = $_GET['cat_id'];
			$get_product = "SELECT * FROM book JOIN category ON book.cat_name=category.cat_name WHERE category.cat_id = $cat_id ";
			$res_product = mysqli_query($conn,$get_product);

			while ($book = mysqli_fetch_assoc($res_product)) : 
		?>
			<div class="card-body col-lg-3 col-md-4 col-sm-6" style="display: flex;flex-wrap: wrap;">
				<div class="thumbnail">
				  <a href="index.php?view=detail&id=<?php echo $book['id'] ?>">
				  	<img class="img_pro" src=" <?php echo $book['img_link'] ?> " alt="" data-toggle="tooltip" data-placement="top" title="<?php echo $book['name'] ?>">
				  </a>
					<div class="caption text-center" style="margin-bottom: 10px; margin-top: auto">
						<p>
							<b>Price: <?php echo number_format($book['price']); ?> đ</b>
						</p>
						<p>
							<a href="index.php?view=detail&id=<?php echo $book['id'] ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
							<a href="process_cart.php?id=<?php echo	$book['id']; ?>" class="btn btn-default  add-cart"><i class="fas fa-shopping-cart"></i></a>
						</p>
					</div>
				</div>
			</div>
			<?php endwhile; ?> <!--  /card body --> 
		</div><!-- /row -->
	</div>
</div>