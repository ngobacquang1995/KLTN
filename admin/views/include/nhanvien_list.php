<?php 
	if ($quyen == 1) {// Nếu là admin mới được phép truy cập
?>

<div class="maintb">
	<div class="head">
		<div class="row search">
		  <div class="col-xs-6">
		  	<h3>Danh sách nhân viên</h3>
		  </div>
		  <div class="col-xs-6 head-right">
		    <a href="?options=nhanvien_add" class="btn btn-success pull-right" role="button">Thêm nhân viên</a>
		  </div>
		</div>
	</div>
	<div class="table">
		<table class="table table-hover">
			<thead>
		  	<tr>
		  		<td>Mã nhân viên</td>
		  		<td>Tên nhân viên</td>
		  		<td>Tài khoản</td>
		  		<td>Email</td>
		  		<td>Quyền</td>
		  		<td>Sửa</td>
		  		<td>Xóa</td>
		  	</tr>
		  	</thead>
		  	<tbody>
		  	<?php
		  		$sql = "SELECT * FROM managers ORDER BY ID DESC";
				$kq = mysqli_query($conn,$sql);
		  		if (mysqli_num_rows($kq)) {
		  			while ($row = mysqli_fetch_assoc($kq)) {
			  			$manv=$row['ID'];
		  				$sql1="SELECT * FROM `permission` WHERE User_ID = $manv";
		  				$kq1 = mysqli_query($conn,$sql1);
				  		$row1 = mysqli_fetch_assoc($kq1);
		  	?>
		  	<tr>
		  		<td data-toggle="modal" data-target="#manv<?php echo $row['ID'] ?>"><?php echo $row['ID']; ?></td>
		  		<td data-toggle="modal" data-target="#manv<?php echo $row['ID'] ?>"><?php echo $row['Name']; ?></td>
		  		<td data-toggle="modal" data-target="#manv<?php echo $row['ID'] ?>"><?php echo $row['User_name']; ?></td>
		  		<td data-toggle="modal" data-target="#manv<?php echo $row['ID'] ?>"><?php echo $row['Email']; ?></td>
		  		<td data-toggle="modal" data-target="#manv<?php echo $row['ID'] ?>"><?php 
					if($row1['Permiss'] == 1){
						echo "Admin";
					}else {
						echo "Nhân viên";
					}
				 ?></td>
		  		<td>
					<a href="?options=nhanvien_edit&manv=<?php echo $row['ID']; ?>" title="Chỉnh sửa nhân viên có mã [<?php echo $row['ID'] ?>]"><i class="material-icons">edit</i></a>
				</td>
				<td>
					<a href="#" onClick="if(confirm('Bạn có chắc chắn muốn xóa nhân viên có mã là [<?php echo $row['ID'];?>] không?')){ location.href='?options=nhanvien_list&action=del&manv=<?php echo $row['ID'];?>'}" title="Xóa nhân viên có mã [<?php echo $row['ID'] ?>]"><i class="material-icons">delete</i></a>
		  		</td>
		  	</tr>
			<!-- Modal -->
			<div class="modal fade in" id="manv<?php echo $row['ID'] ?>" role="dialog">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Thông tin nhân viên</h4>
					</div>
					<div class="modal-body sp">
						<div class="row">
							<label for="description" class="col-sm-3 control-label">Mã nhân viên</label>
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
							<label for="description" class="col-sm-3 control-label">Tên nhân viên</label>
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
								<span><?php echo $row['Email'] ?></span>
							</div>
						</div>
					</div>
					<div class="modal-footer">
					  <a href="?options=nhanvien_edit&manv=<?php echo $row['ID']; ?>" class="btn btn-default" type="submit">Chỉnh sửa</a>
					  <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
					</div>
				  </div>
				</div>
			</div>
		  	<?php }}else{
		  		echo "Không có nhân viên nào";
		  		}?>
	  		</tbody>
		</table>
	</div>
</div>
<?php 
	if (isset($_GET['action'])) {
		$action = $_GET['action'];
		if ($action == 'del') {
			$manv = $_GET['manv'];

			
			//delete permission
			$sql11 = "DELETE FROM permission WHERE User_ID = $manv";
			$kq11 = mysqli_query($conn,$sql11);

			$sql = "DELETE FROM managers WHERE ID = $manv";
			$check = mysqli_query($conn,$sql);
			if ( $check) {
				echo "<script> alert('Xóa dữ liệu thành công');";
				echo "location.href='?options=nhanvien_list';</script>";
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