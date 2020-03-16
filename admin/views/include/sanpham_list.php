
<div class="maintb">
	<div class="head">
		<div class="row search">
		  <div class="col-xs-6">
		  	<h3>Danh sách sản phẩm</h3>
		  </div>
		  <div class="col-xs-6 head-right">
		    <a href="?options=sanpham_add" class="btn btn-success pull-right" role="button">Thêm sản phẩm</a>
			
		  </div>
		</div>
	</div>
	<div class="table">
		<table class="table table-hover">
			<thead>
			<tr>
				<td>Hình ảnh</td>
				<td>Mã SP</td>
				<td>Tên sản phẩm</td>
				<td>Loại sản phẩm</td>
				<td>Số lượng</td>
				<td>Đơn giá bán</td>
				<td>Sửa</td>
				<td>Xóa</td>
			</tr>
			</thead>
			<tbody>
			<?php
				$sql = "SELECT tree.*,category.Category_name FROM tree INNER JOIN category ON tree.Category_ID=category.ID ORDER BY tree.ID ASC";
				$kq = mysqli_query($conn,$sql);

				if (mysqli_num_rows($kq)) {
					while ($row = mysqli_fetch_assoc($kq)) {
			?>
			<tr>
				<td data-toggle="modal" data-target="#masp<?php echo $row['ID'] ?>"><img width="50" src="upload/<?php echo $row['Image']; ?>" /></td>
				<td data-toggle="modal" data-target="#masp<?php echo $row['ID'] ?>"><?php echo $row['ID']; ?></td>
				<td data-toggle="modal" data-target="#masp<?php echo $row['ID'] ?>"><?php echo $row['Tree_name']; ?></td>
				<td data-toggle="modal" data-target="#masp<?php echo $row['ID'] ?>"><?php echo $row['Category_name']; ?></td>
				<td data-toggle="modal" data-target="#masp<?php echo $row['ID'] ?>"><?php echo $row['Amount']; ?></td>
				<td data-toggle="modal" data-target="#masp<?php echo $row['ID'] ?>"><?php echo number_format($row['Price']); ?></td>
				<td>
					<a href="?options=sanpham_edit&masp=<?php echo $row['ID']; ?>" title="Chỉnh sửa  sản phẩm có mã [<?php echo $row['ID'] ?>]"><i class="material-icons">edit</i></a>
				</td>
				<td>
					<a href="#" onClick="if(confirm('Bạn có chắc chắn muốn xóa cây có mã là [<?php echo $row['ID'];?>] không?')){ location.href='?options=sanpham_list&action=delete&macay=<?php echo $row['ID'];?>'}" title="Xóa cây có mã [<?php echo $row['ID'] ?>]"><i class="material-icons">delete</i></a>
				</td>
			</tr>

			
			 <?php } //end while
			}else{
				echo "Không có sản phẩm nào !";
				} ?>
			</tbody>
		</table>
	</div>
</div>
<?php 
	if (isset($_GET['action'])) 
	{
		$action = $_GET['action'];
		// Nếu có hành động delete thì thực hiện
		if ($action == 'delete') 
		{
			$macay = $_GET['macay'];
			var_dump($macay);
			$sql = "DELETE FROM `tree` WHERE `ID` = '$macay'";
			$check = mysqli_query($conn,$sql);
			if ( $check) 
			{
				echo "<script> alert('Xóa dữ liệu thành công');";
				echo "location.href='?options=sanpham_list';</script>";
			}
			else
			{
				echo "<script> alert('Xóa dữ liệu không thành công');<script>";
			}
			
		}
	}
?>

