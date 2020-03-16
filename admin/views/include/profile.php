<div class="maintb">
	<div class="head">
		<h4>Thông tin người dùng</h4>
	</div>

	<?php if ($manv) { 
		$sql = "SELECT managers.*,permission.* FROM `managers` INNER JOIN permission ON managers.ID=permission.User_ID WHERE managers.ID =".$manv;
		$kq = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($kq);
	?>

	<div class="table">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-xs-4"><b>Tên đăng nhập</b></div>
					<div class="col-xs-8"><?php echo $row['User_name'] ?></div>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="row">
					<div class="col-xs-4"><b>Họ tên</b></div>
					<div class="col-xs-8"><?php echo $row['Name'] ?></div>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="row">
					<div class="col-xs-4"><b>Địa chỉ</b></div>
					<div class="col-xs-8"><?php echo $row['Address'] ?></div>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="row">
					<div class="col-xs-4"><b>Email</b></div>
					<div class="col-xs-8"><?php echo $row['Email'] ?></div>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="row">
					<div class="col-xs-4"><b>Số điện thoại</b></div>
					<div class="col-xs-8"><?php echo $row['Phone'] ?></div>
				</div>
			</div>
		</div>
		<div class="row">
			<button type="button" class="btn btn-success " data-toggle="modal" data-target="#editprofile">Cập nhật thông tin</button>
			<a class="btn btn-success" href="?options=doimk">Đổi mật khẩu</a>
		</div>
	</div>

	<?php }else{ 
		echo "<script> alert('Truy cập trái phép. Quay lại!');";
		echo "location.href='index.php';</script>";
	} ?>
</div>

		<div class="modal fade in" id="editprofile" role="dialog">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">×</button>
				  <h4 class="modal-title">Cập nhật thông tin</h4>
				</div>
				<form action="?options=profile&action=editprofile" method="post">
					<div class="modal-body">
						<div class="row">
							<label for="description" class="col-sm-3 control-label">Họ và tên</label>
							<div class="col-sm-9">
								<input  required type="text" class="form-control" name="tennv" value="<?php echo $row['Name'] ?>" maxlength="25">
							</div>
						</div>
						<div class="row">
							<label for="description" class="col-sm-3 control-label">Địa chỉ</label>
							<div class="col-sm-9">
								<input  required type="text" class="form-control" value="<?php echo $row['Address'] ?>" name="diachi">
							</div>
						</div>
						<div class="row">
							<label for="description" class="col-sm-3 control-label">Email</label>
							<div class="col-sm-9">
								<input  required type="email" class="form-control" name="email" value="<?php echo $row['Email'] ?>">
							</div>
						</div>
						<div class="row">
							<label for="description" class="col-sm-3 control-label">Số điện thoại</label>
							<div class="col-sm-9">
								<input  required type="number" class="form-control" value="<?php echo $row['Phone'] ?>" name="sdt" maxlength="13">
							</div>
						</div>
						<div class="row">
							<div class="col-md-3"><label>Hình ảnh</label></div>
							<div class="col-md-9">
								<input type="file" id="img" name="img">
							</div>
						</div>
					</div>
					<div class="modal-footer">
					  <button class="btn btn-default" type="submit">Lưu</button>
					  <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
					</div>
				</form>
			  </div>
			</div>
		</div>

<?php 
	if (isset($_GET['action'])) {
		$action = $_GET['action'];
		if ($action == 'editprofile') {
			$tennv = $_POST['tennv'];
			$diachi = $_POST['diachi'];
			$email = $_POST['email'];
			$sdt = $_POST['sdt'];
			$link_img= $_POST['img'];
			if($link_img == ''){
				$sql = "UPDATE `managers` SET `Name`='$tennv',`Address`='$diachi',`Email`='$email',`Phone`=$sdt WHERE ID = $manv";
				$check = mysqli_query($conn,$sql);
			}
			else{
				$sql = "UPDATE `managers` SET `Name`='$tennv',`Address`='$diachi',`Email`='$email',`Phone`=$sdt,`Avarta`='$link_img' WHERE ID = $manv";
				$check = mysqli_query($conn,$sql);
			}
			if ( $check) {
				echo "<script> alert('Cập nhật liệu thành công');";
				echo "location.href='?options=profile';</script>";
			}else{
				echo "<script> alert('Lỗi');<script>";
			}
		}
	}
?>