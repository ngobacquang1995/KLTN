<?php 
	if ($quyen == 1) {// Nếu là admin mới được phép truy cập
?>

<div class="maintb">
	<div class="head">
		<div class="row search">
		  <div class="col-xs-6">
		  	<h4>Danh sách nhà cung cấp</h4>
		  </div>
		  <div class="col-xs-6 head-right">
		    <a href="?options=nhacungcap_add" class="btn btn-success" role="button">Thêm nhà cung cấp</a>
		  </div>
		</div>
	</div>
	<div class="table">
		<form action="index.php?options=nhacungcap_list&action=delete" method="post" id="frdelete">
		<table class="table table-hover">
			<thead>
		  	<tr>
		  		<td>Mã NCC</td>
		  		<td>Tên nhà cung cấp</td>
		  		<td>Email</td>
		  		<td>SDT</td>
		  		<td>Địa chỉ</td>
		  		<td>Thao tác</td>
		  	</tr>
		  	</thead>
		  	<tbody>
		  	<?php
		  		$sql = "SELECT * FROM supplier ORDER BY ID_Supplier DESC";
				$kq = mysqli_query($conn,$sql);
		  		if (mysqli_num_rows($kq)) {
		  			while ($row = mysqli_fetch_assoc($kq)) {
		  	?>
		  	<tr>
		  		<td><?php echo $row['ID_Supplier']; ?></td>
		  		<td><?php echo $row['Supplier_name']; ?></td>
		  		<td><?php echo $row['Email']; ?></td>
		  		<td><?php echo $row['Phone']; ?></td>
		  		<td><?php echo $row['Address']; ?></td>
		  		<td>
					<a href="?options=nhacungcap_edit&mancc=<?php echo $row['ID_Supplier']; ?>" title="Chỉnh sửa nhà cung cấp có mã [<?php echo $row['ID_Supplier'] ?>]"><i class="material-icons">edit</i></a>
					<a href="#" onClick="if(confirm('Bạn có chắc chắn muốn xóa khách hàng có mã là [<?php echo $row['ID_Supplier'];?>] không?')){ location.href='?options=nhacungcap_list&action=del&mancc=<?php echo $row['ID_Supplier'];?>'}" title="Xóa hóa đơn có mã [<?php echo $row['ID_Supplier'] ?>]"><i class="material-icons">delete</i></a>
				</td>
		  	</tr>
		  	<?php }}else{
		  		echo "Không có nhà cung cấp nào";
		  		} ?>
			</tbody>
		</table>
		</form>
	</div>
</div>
<?php 
	if (isset($_GET['action'])) {
		$action = $_GET['action'];
		
		// Nếu có hành động delete thì thực hiện
		if ($action == 'del') 
		{
			$mancc = $_GET['mancc'];
			$sql = "DELETE FROM supplier WHERE ID_Supplier = $mancc";
			$check = mysqli_query($conn,$sql);
			if ( $check) {
				echo "<script> alert('Xóa dữ liệu thành công');";
				echo "location.href='?options=nhacungcap_list';</script>";
			}else{
				echo "<script> alert('Xóa dữ liệu không thành công');<script>";
			}
		}
	}
?>

<?php 
	}else{ // else check quyền
		echo "<script> alert('Bạn không có quền truy cập trang này! Vui lòng quay lại!');";
		echo "location.href='index.php';</script>";
	}
?>