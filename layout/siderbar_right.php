<?php
$sql	  = "SELECT * FROM `tree` ORDER BY RAND() LIMIT 0,5";
$queryran = mysqli_query($conn,$sql);

?>
<div class="widget siderbar-right">
	<div class="title">CÓ THỂ BẠN MUỐN XEM</div>
	<ul class="itemhot">
		<?php if (mysqli_num_rows($queryran)): ?>
			<?php while($result = mysqli_fetch_assoc($queryran)) : ?>
				<li>
					<a href="?options=sanpham&id=<?php echo $result['ID']; ?>">
						<img src="admin/upload/<?php echo $result['Image']; ?>" alt="<?php echo $result['Tree_name']; ?>" height="75px" width="75px">
						<div class="infor">
							<p class="name"><?php echo $result['Tree_name']; ?></p>
							<p class="gia"><?php echo number_format($result['Price']); ?></p>
						</div>
					</a>
				</li>
			<?php endwhile ?>
		<?php endif ?>
	</ul>
</div>