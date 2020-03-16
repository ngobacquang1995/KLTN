
<?php
//tim kiem san phan gan giong
$sql	  = "SELECT * FROM `tree` ORDER BY RAND() LIMIT 0,5";
$queryran = mysqli_query($conn,$sql);
//bai viet quan tam
$sql1	  = "SELECT * FROM `post` ORDER BY RAND() LIMIT 0,5";
$queryran1 = mysqli_query($conn,$sql1);
?>
<div class="widget-main siderbar-left">
	<div class="widget widget-locsp">
		<div class="locsp">
			<div class="title">LỌC THEO GIÁ</div>
			<form action="index.php?options=lsp&action=loc" method="post">
				<div class="fillter">
					<select name="gia" class="form-control">
						<option class="form-control" value="0">Mặc định</option>
						<option class="form-control" value="1">Giá dưới 100k</option>
						<option class="form-control" value="2">Giá từ 100k đến 400k</option>
						<option class="form-control" value="3">Giá từ 400k đến 1000k</option>
					</select>	
				</div>
				<div class="row">
					<div class="col-sm-12">
						<button type="submit" class="btn fillter">Lọc</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="widget widget-same-tree">
		<div class="title">CÓ THỂ BẠN MUỐN XEM</div>
		<ul class="itemhot">
			<?php if (mysqli_num_rows($queryran)): ?>
				<?php while($result = mysqli_fetch_assoc($queryran)) : ?>
					<li>
						<a href="?options=sanpham&id=<?php echo $result['ID']; ?>">
							<img src="admin/upload/<?php echo $result['Image']; ?>" alt="<?php echo $result['Tree_name']; ?>" height="75px" width="75px">
							<div class="infor">
								<p><?php echo $result['Tree_name']; ?></p>
								<p class="gia"><?php echo number_format($result['Price']); ?></p>
							</div>
						</a>
					</li>
				<?php endwhile ?>
			<?php endif ?>
		</ul>
	</div>
	<div class="widget widget-same-post">
		<div class="title">Bài viết</div>
		<ul class="itemhot">
			<?php if (mysqli_num_rows($queryran1)): ?>
				<?php while($result = mysqli_fetch_assoc($queryran1)) : ?>
					<li>
						<a href="?options=sanpham&id=<?php echo $result['ID']; ?>">
							<img src="admin/upload/<?php echo $result['Image']; ?>" alt="<?php echo $result['Name']; ?>" height="75px" width="75px">
							<div class="infor">
								<p><?php echo $result['Name']; ?></p>
							</div>
						</a>
					</li>
				<?php endwhile ?>
			<?php endif ?>
		</ul>
	</div>
</div>