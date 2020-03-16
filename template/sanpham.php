<?php 
if ($_GET['id']) 
{
	$masp   = $_GET['id'];
	$sql    = "SELECT tree.*,category.Category_name FROM `tree` INNER JOIN category ON tree.Category_ID = category.ID WHERE tree.ID = '$masp'";
	$query  = mysqli_query($conn,$sql);
	$result = mysqli_fetch_assoc($query);
	// Nếu có sản phẩm thì in ra
	if ($result != null) 
	{
		?>
<div class="section product_detail">
	<div class="container">
		<div class="post">
			<div class="title">
				<a href="?options=home"><span>Trang chủ </span></a><i class="fas fa-chevron-right"></i>
				<a href="?options=lsp&amp;action=lsp&amp;id=<?php echo $result['Category_ID']; ?>"><span> <?php echo $result['Category_name']; ?> </span></a><i class="fas fa-chevron-right"></i>
				<span> <?php echo $result['Tree_name']; ?></span>
			</div>
			<div class="infor">
				<div class="section-1">
					<div class="row">
						<div class="col-sm-12 col-md-9 ">
							<div class="row">
								<div class="col-xs-5">
									<div class="img-product">
										<img src="admin/upload/<?php echo $result['Image']; ?>" alt="<?php echo $result['Tree_name']; ?>">
									</div>
								</div>
								<div class="col-xs-7">
									<div class="profile">
										<p class="meta">
											<span class="float-left">Tình trạng: 
												<?php
													if ($result['Amount'] > 0)
													{
														echo "Còn hàng";
													}
													else
													{
														echo "Hết hàng";
													}

												?>
											</span>
											<span class="float-right">Mã sản phẩm: <?php echo $result['ID']; ?></span>
										</p>
										<h1><b><?php echo $result['Tree_name']; ?></b></h1>
										<div class="description"><p><?php echo $result['Description']; ?></p></div>
										<div class="action-price">
											<div class="action float-left">
												<form action="index.php?options=giohang&action=add" method="post">
													<input type="hidden" name="masp" value="<?php echo $result['ID']; ?>">
													<div class="row">
														<div class="col-sm-5">Số lượng: </div>
														<div class="col-sm-6"><input type="number" name="soluong" class="form-control" value="1" min="1" step="1"></div>
													</div>
													<div class="row">
														<div class="col-sm-12"><button type="submit" class="btn dh btn-success">Thêm vào giỏ hàng</button></div>
													</div>
												</form>
											</div>
											<?php if ($result['sale'] > 0): ?>
												<?php $dongia =$result['Price'] - ($result['Price'] * $result['sale'])/100; ?>
												<div class="cost sale float-right">
													<p class="price througth"><?php echo number_format($result['Price']); ?>  VND</p>
													<p class="price"><?php echo number_format($dongia); ?>  VND</p>
												</div>
											<?php else : ?>
												<div class="cost float-right">
													<p class="price"><?php echo number_format($result['Price']); ?>  VND</p>
												</div>
											<?php endif ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-3">
							<?php include_once('layout/widget_nav_menu.php'); ?>
						</div>
					</div>
				</div>
				<hr>
				<div class="section-2">
					<div class="row">
						<div class="col-sm-8 col-md-9">
							<p class="ct"><b><h4>Chi tiết sản phẩm:</h4></b></p>
							<div class="infor"><h4><?php echo $result['Infor']; ?></h4></div>
						</div>
						<div class="col-sm-4 col-md-3">
							<?php include_once('layout/siderbar_right.php'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		<?php
	}
	// Nếu không có sản phẩm hoặc sản phẩm này bị khóa
	else
	{
		echo "<script> alert('Không có sản phẩm này!');location.href='index.php';</script>";
	}
}
else
{
	echo "<script> alert('Truy cập trái phép!');location.href='index.php';</script>";
}
?>
