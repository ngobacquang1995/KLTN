<?php 
if ($_GET['id']) 
{
	$mapost   = $_GET['id'];
	$sql    = "SELECT * FROM `post`  WHERE ID = '$mapost'";
	$query  = mysqli_query($conn,$sql);
	$result = mysqli_fetch_assoc($query);
	// Nếu có sản phẩm thì in ra
	if ($result != null) 
	{
		?>
<div class="section cart_detail">
	<div class="container">
		<div class="post">
			<div class="title">
				<a href="?options=home"><span>Trang chủ </span></a>/
				<span> <?php echo $result['Name']; ?></span>
			</div>
			<div class="infor">
				<div class="row">
					<div class="col-xs-5">
						<div class="img-product">
							<img src="admin/upload/<?php echo $result['Image']; ?>" alt="<?php echo $result['Name']; ?>">
						</div>
					</div>
					<div class="col-xs-7">
						<div class="profile">
							<h1><b><?php echo $result['Name']; ?></b></h1>
							<div class="description"><h4><?php echo $result['Description']; ?></h4></div>
							<div class="Infor"><h4><?php echo $result['Infor']; ?></h4></div>
							
						</div>
					</div>
				</div>
				<hr>
				<p class="ct"><b><h4>Chi tiết bài viết:</h4></b></p>
				<div class="row">
					<div class="col-sm-8 col-md-9">
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
