<?php 
$sql   = "SELECT * FROM `category`";
$query = mysqli_query($conn,$sql);

?>
<div class="section list-product">
	<div class="container">
		<div class="wapper">
			<div class="head">
				<h5 class="subtitle color-fec300">Danh mục cây</h5>
				<h2 class="title">Lựa chọn danh mục tìm kiếm</h2>
				<p>Chúng tôi luôn nhóm các cây cùng loại với nhau, giúp khách hàng lựa chọn loại cây trong mong muốn tìm kiếm một cách dễ dàng.</p>
			</div>
			<div class="content">
				<div class="row">
					<?php 
						while($result = mysqli_fetch_assoc($query)){
						?>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="?options=lsp&action=lsp&id=<?php echo $result['ID']; ?>">
							<div class="product">
								<div class="portrait relative">
									<img src="admin/upload/<?php echo $result['Thumbnail'] ?>">
									<div class="masked"><div class="add"></div></div>
								</div>
								<div class="description">
									<h4 class="name"><?php echo $result['Category_name'] ?></h4>
								</div>
							</div>
						</a>
					</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>