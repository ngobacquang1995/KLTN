<?php 
	if ($quyen == 1) {// Nếu là admin mới được phép truy cập
?>

<div class="maintb">
	<div class="head">
		<div class="row search">
			<div class="col-xs-6">
			  	<h4>Danh sách khách hàng</h4>
			</div>
			<div class="col-xs-6 head-right">
				<a href="?options=khachhang_add" class="btn btn-success" role="button">Thêm khách hàng</a>
			</div>
		</div>
	</div>
	<div class="table">
		<form action="index.php?options=khachhang_list&action=delete" method="post" id="frdelete">
		<table class="table table-hover">
		<thead>
		  	<tr>
		  		<td>Mã khách hàng</td>
		  		<td>Tên khách hàng</td>
		  		<td>Tài khoản</td>
		  		<td>Email</td>
		  		<td>Thao tác</td>
		  	</tr>
		  	</thead>
		  	<tbody>
		  	<?php
		  		$sql = "SELECT * FROM user ORDER BY ID DESC ";
				$kq = mysqli_query($conn,$sql);
		  		if (mysqli_num_rows($kq)) {
		  			while ($row = mysqli_fetch_assoc($kq)) {
		  	?>
		  	<tr>
		  		<td data-toggle="modal" data-target="#makh<?php echo $row['ID'] ?>"><?php echo $row['ID']; ?></td>
		  		<td data-toggle="modal" data-target="#makh<?php echo $row['ID'] ?>"><?php echo $row['Name']; ?></td>
		  		<td data-toggle="modal" data-target="#makh<?php echo $row['ID'] ?>"><?php echo $row['User_name']; ?></td>
		  		<td data-toggle="modal" data-target="#makh<?php echo $row['ID'] ?>"><?php echo $row['email']; ?></td>
		  		
		  		<td>
					<a href="?options=khachhang_edit&makh=<?php echo $row['ID']; ?>" title="Chỉnh sửa khách hàng có mã [<?php echo $row['ID'] ?>]"><i class="material-icons">edit</i></a>
					<a href="#" onClick="if(confirm('Bạn có chắc chắn muốn xóa khách hàng có mã là [<?php echo $row['ID'];?>] không?')){ location.href='?options=khachhang_list&action=del&makh=<?php echo $row['ID'];?>'}" title="Xóa hóa đơn có mã [<?php echo $row['ID'] ?>]"><i class="material-icons">delete</i></a>
		  		</td>
		  	</tr>
				<!-- Modal -->
				<div class="modal fade in" id="makh<?php echo $row['ID'] ?>" role="dialog">
					<div class="modal-dialog">
					  <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Thông tin khách hàng</h4>
						</div>
						<div class="modal-body sp">
							<div class="row">
								<label for="description" class="col-sm-3 control-label">Mã khách hàng</label>
								<div class="col-sm-9">
									<span><?php echo $row['ID'] ?></span>
								</div>
							</div>
							<div class="row">
								<label for="description" class="col-sm-3 control-label">Tài khoản</label>
								<div class="col-sm-9">
									<span><?php echo $row['User_name']; ?></span>
								</div>
							</div>
							<div class="row">
								<label for="description" class="col-sm-3 control-label">Tên khách hàng</label>
								<div class="col-sm-9">
									<span><?php echo $row['Name'] ?></span>
								</div>
							</div>
							<div class="row">
								<label for="description" class="col-sm-3 control-label">Địa chỉ</label>
								<div class="col-sm-9">
									<span><?php echo $row['Address'] ?></span>
								</div>
							</div>
							<div class="row">
								<label for="description" class="col-sm-3 control-label">Số điện thoại</label>
								<div class="col-sm-9">
									<span><?php echo $row['Phone'] ?></span>
								</div>
							</div>
							<div class="row">
								<label for="description" class="col-sm-3 control-label">Email</label>
								<div class="col-sm-9">
									<span><?php echo $row['email'] ?></span>
								</div>
							</div>
						</div>
						<div class="modal-footer">
						  <a href="?options=khachhang_edit&makh=<?php echo $row['ID']; ?>" class="btn btn-default" type="submit">Chỉnh sửa</a>
						  <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
						</div>
					  </div>
					</div>
				</div>
		  	<?php }}else{
		  		echo "Không có khách hàng nào";
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
			$makh = $_GET['makh'];
			$sql = "DELETE FROM user WHERE ID = $makh";
			$check = mysqli_query($conn,$sql);
			if ( $check) {
				echo "<script> alert('Xóa dữ liệu thành công');";
				echo "location.href='?options=khachhang_list';</script>";
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