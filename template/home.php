<?php
// Sản phẩm giảm giá
$sql_giamgia     = "SELECT * FROM tree WHERE sale > 0";
$query_giamgia   = mysqli_query($conn,$sql_giamgia);

// Sản phẩm mới
$sql_moi   		 = "SELECT tree.*,receipt_detail.Tree_ID FROM tree INNER JOIN receipt_detail ON tree.ID = receipt_detail.Tree_ID INNER JOIN receipt ON receipt_detail.Receipt_ID = receipt.ID_receipt ORDER BY receipt.Date DESC LIMIT 0,10";
$query_moi  	 = mysqli_query($conn,$sql_moi);

// Bài viết
$sql_post     = "SELECT * FROM post ORDER BY Date DESC LIMIT 0,10";
$query_post   = mysqli_query($conn,$sql_post);
?>
<div class="slideshow banner-main">
	
	
	<div class="camera_wrap">
	<?php
		$query = "SELECT * FROM banner";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0)
		{
			while($row = mysqli_fetch_array($result))
			{
				
			?>
		<div data-src="admin/upload/<?php echo $row["Image"]; ?>" class="banner-img-<?php echo $row["ID"]; ?>">
			<img src="admin/upload/<?php echo $row["Image"]; ?>">
			<div class="camera_caption id-<?php echo $row["ID"]; ?>">
				<h2 class="name"><?php echo $row["Name"] ?></h2>
				<p class="description"><?php echo $row["Description"] ?></p>
				<p class="xemthem"><a href="#" class="btn">Tìm hiểu thêm</a></p>
			</div>
		</div>
		<?php
			}
		}
	?>
	</div>
</div>
<!--Cây giảm giá-->
<div class="section sale-product">
	<div class="head">
		<div class="container">
			<div class="head">
				<h2 class="title">Cây giảm giá</h2>
				<p>Luôn có những chương trình khuyến mãi vào những dịp lễ tết, đảm bảo tiết kiệm tốt nhất cho khách hàng.</p>
			</div>
		</div>
	</div>
	<div class="products items">
		<div class="container">
			<div class="row">
				<div class="slider slick-show-4 autoplay">
					<?php if (mysqli_num_rows($query_giamgia)){ ?>
						<?php while($result = mysqli_fetch_assoc($query_giamgia)){ ?>
							<div class="col-xs-6 col-sm-6 col-md-3">
								<div class="thumbnail product item">
									<div class="pictr">
										<img src="admin/upload/<?php echo $result["Image"]; ?>">
										<div class="add-cart">
											<a class="btn btn-success" href="?options=sanpham&id=<?php echo $result['ID'] ?>" alt="<?php echo $result['Tree_name']; ?>">Xem chi tiết</a>
										</div>
									</div>
									<div class="caption info">
										<h4><?php echo $result["Tree_name"]; ?></h4>
										<div class="cost <?php if ($result['sale'] > 0) echo "sale"; ?>">
											<div class="row">
												<?php 
													if ($result['sale'] > 0)
													{ 
														$dongia =$result['Price'] - ($result['Price'] * $result['sale'])/100; ?>
											
												<div class="col-sm-12 col-md-6">
													<p class="price througth"><?php echo number_format($result['Price']); ?></p>
												</div>
												<div class="col-sm-12 col-md-6">
													<p class="price"><?php echo number_format($dongia); ?></p>
												</div>
												<?php 
													}
												?>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Cây mới-->
<div class="section new-product">
	<div class="head">
		<div class="container">
			<div class="head">
				<h2 class="title">Cây mới</h2>
				<p>Chúng tôi luôn đề cập những cây mới nhất, mang đến sự tiện dụng nhất có thể cho khách hàng, tìm kiếm một cách nhanh chóng</p>
			</div>
		</div>
	</div>
	<div class="products items">
		<div class="container">
			<div class="row">
				<div class="slider slick-show-4 autoplay">
					<?php 
					if (mysqli_num_rows($query_moi))
					{ 
					?>
						<?php 
						while($result = mysqli_fetch_assoc($query_moi))
						{ 
						?>
							<div class="col-xs-6 col-sm-6 col-md-3">
								<div class="thumbnail product item">
									<div class="pictr">
										<img src="admin/upload/<?php echo $result["Image"]; ?>" />
										<div class="add-cart">
											<a class="btn btn-success" href="?options=sanpham&id=<?php echo $result['ID']; ?>" alt="<?php echo $result['Tree_name']; ?>">Xem chi tiết</a>
										</div>
									</div>
									<div class="caption info">
										<h4><?php echo $result["Tree_name"]; ?></h4>
										<div class="cost <?php if ($result['sale'] > 0) echo "sale"; ?>">
											<div class="row">
												<?php if ($result['sale'] > 0){ ?>
												<?php $dongia =$result['Price'] - ($result['Price'] * $result['sale'])/100; ?>
											
												<div class="col-sm-12 col-md-6">
													<p class="price througth"><?php echo number_format($result['Price']); ?></p>
												</div>
												<div class="col-sm-12 col-md-6">
													<p class="price"><?php echo number_format($dongia); ?></p>
												</div>
												<?php }else{ ?>
												<div class="col-sm-12 col-md-12">
													<p class="price"><?php echo number_format($result['Price']); ?></p>
												</div>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php 
						} 
					} 
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section services-infor services relative">
	<div class="container relative">
		<div class="head">
			<h2 class="title">Dịch vụ <span><i class="fas fa-certificate"></i></span></h2>
			<p>Lý do lựa chọn cửa hàng chúng tôi một phần là do dịch vụ chúng tôi đem lại cho khách hàng đầy đủ và chu đáo</p>
		</div>
		<div class="wapper">
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="service item">
						<div class="cri-icon">
							<i class="fa fa-ambulance" aria-hidden="true"></i>
						</div>
						<div class="content">       
							<h4 class="name">Giao hàng</h4>
							<p>Tất cả các khách hàng mua sản phẩm tại Website hoặc khách hàng đến trực tiếp xem và mua hàng tại công ty có nhu cầu giao hàng trực tiếp tại nhà...<a href="#">Đọc thêm</a></p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="service item">
						<div class="cri-icon">
							<i class="fa fa-heart" aria-hidden="true"></i>
						</div>
						<div class="content">
							<h4 class="name">Bảo hàng và đổi trả hàng</h4>
							<p>Giao hàng không đảm bảo, không đúng mong muốn quý khách yên tâm có thể trả lại cho Web Cây Cảnh để được hoàn tiền nếu đã thanh toán...<a href="#">Đọc thêm</a></p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="service item">
						<div class="cri-icon">
							<i class="fas fa-comment-dots"></i>
						</div>
						<div class="content">   
							<h4 class="name">Tư vấn mua hàng</h4>
							<p>Mọi thắc mắc, câu hỏi của khách hàng hoặc hướng dẫn mua hàng, thanh toán đều được chuyên viên tư vấn bán hàng tại cửa hàng tư vấn miễn phí... <a href="#">Đọc thêm</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section list-post relative">
	<div class="container wapper">
		<div class="head">
			<h2 class="title">Các bài viết</h2>
			<p>Ngoài những dịch vụ cần thiết cho khách hàng, cửa hàng luôn có những chương trình có những thông tin hữu ích cập nhật thường xuyên cho khách hàng.</p>
			
		</div>
		<div class="post-list items">
			<div class="container">
				<div class="row">
					<div class="post-list-wap">
						<?php if (mysqli_num_rows($query_post)): ?>
							<?php while($result = mysqli_fetch_assoc($query_post)): ?>
								<div class="col-xs-6 col-sm-6 col-md-3">
									<div class="thumbnail item">
										<a href="?options=baiviet&id=<?php echo $result['ID']; ?>"><img src="admin/upload/<?php echo $result['Image']; ?>"></a>
										<div class="caption">
											<a href="?options=baiviet&id=<?php echo $result['ID']; ?>"><h3 class="name"><?php echo $result['Name']; ?></h3></a>
											<div class="text">
												<p><?php echo substr($result['Description'],0,150); ?> ...</p>
											</div>
										</div>
									</div>
								</div>
							<?php endwhile ?>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section sustomers-say">
	<div class="container">
		<div class="head">
			<h4 class="sub-title color-fec300">Chúng tôi rất vui khi.</h4>
			<h2 class="title">Nhận được những đánh giá tích cực của khách hàng</h2>
		</div>
		<div class="wapper">
			<div class="slider slick-show-1 autoplay">
				<div class="block-conten">
					<div class="element people-one">
						<div class="content photo">
							<img src="images/customer.jpg">
						</div>
						<div class="content text">
							<h2 class="color-fec300 cus-say">“Chất lượng và dịch vụ tốt”</h2>       
							<p>Tôi rất hài lòng khi mua cây tại cửa hàng "Phương Thảo". Tại đây tôi có thể tìm kiếm được cây mình thích mà không phải lo lắng về chất lượng của cây</p>
							<div class="name"><h3><a class="color-333" href="#">Nguyễn Phương Anh</a></h3></div>
						</div>
					</div>
				</div>
				<div class="block-conten">
					<div class="element people-two">
						<div class="row">
							<div class="col-xs-12 col-sm-5 col-md-5">
								<div class="content photo">
									<img src="images/customer1.jpg">
								</div>                                          
								<div class="name"><h4><a class="color-333" href="#">Trần Thanh Huyền</a></h4></div>
							</div>
							<div class="col-xs-12 col-sm-7 col-md-7">
								<div class="content text">
									<h2 class="color-fec300 cus-say">“Đội ngũ nhân viên nhiệt tình”</h2>        
								<p>Tại đây tôi thoải mái yêu cầu dịch vụ hoặc tư vấn từ nhân viên bán hàng mà không lo lắng về chất lượng dịch vụ hay thái độ nhân viên</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="block-conten">
					<div class="element people-three">
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="element">
									<div class="content text">
										<h2 class="color-fec300 cus-say">“Luôn lựa chọn được sản phẩm ưng ý”</h2>       
										<p>Cửa hàng có rất nhiều loại cây để tôi có thể lựa chọn theo ý thích của bản thân</p>
									</div>
									<div class="content photo">
										<img src="images/customer3.jpg">    
									</div>
									<div class="name"><h4><a class="color-333" href="#">Trần Diệu My</a></h4></div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="element reponsive">
									<div class="content text">
										<h2 class="color-fec300 cus-say">“Cách thức làm việc hiệu quả”</h2>     
										<p>Tôi không mất quá nhiều thời gian cho việc đặt hàng hoặc thanh toán, tôi hoàn toàn hài lòng về cách thức làm việc này.</p>
									</div>
									<div class="content photo">
										<img src="images/customer4.jpg">
									</div>
									<div class="name"><h4><a class="color-333" href="#">Hoàng Hương Thảo</a></h4></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="block-conten reponsive">
					<div class="element people-three">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="element">
									<div class="content text">
										<h2 class="color-fec300 cus-say">“Outstanding quality & taste. Totally recommend!”</h2>     
										<p>Understanding your requirements and objectives is important to us. We listen and work together to create a trully unique and unforgettable experience.</p>
									</div>
									<div class="content photo">
										<img src="images/customer4.jpg">
									</div>
									<div class="name"><h4><a class="color-333" href="#">Carrie Gordon</a></h4></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>