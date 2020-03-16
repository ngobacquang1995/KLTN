<?php
	// check logged
	if (isset($_SESSION['makh'])) {
		//get data from database
		$sql = "SELECT * FROM `user` WHERE ID = ".$_SESSION['makh'];
		$query = mysqli_query($conn,$sql);
		$result = mysqli_fetch_assoc($query);
	?>
<div class="section user_detail">
	<div class="container">
		<div class="post">
			<div class="title">
				<a href="?options=trangchu"><span>Trang chủ </span></a><i class="fas fa-chevron-right"></i>
				<span> Thông tin tài khoản </span>
			</div>
			<fieldset class="tttaikhoan">
				<legend><b>Thông tin tài khoản</b></legend>
				<div class="infor">
					<div class="top">
						<div class="row">
							<div class="col-sm-12">
								<div class="row">
									<div class="col-xs-5"><b>Họ và tên: </b></div>
									<div class="col-xs-7"><?php echo $result['Name']; ?></div>
								</div>
								<div class="row">
									<div class="col-xs-5"><b>Tên tài khoản: </b></div>
									<div class="col-xs-7"><?php echo $result['User_name']; ?></div>
								</div>
								<div class="row">
									<div class="col-xs-5"><b>Địa chỉ: </b></div>
									<div class="col-xs-7"><?php echo $result['Address']; ?></div>
								</div>
								<div class="row">
									<div class="col-xs-5"><b>Số điện thoại: </b></div>
									<div class="col-xs-7"><?php echo $result['Phone']; ?></div>
								</div>
							</div>
						</div>
						<div class="row line">
							<button type="button" class="btn btn-success " data-toggle="modal" data-target="#editprofile">Cập nhật thông tin</button>
							<button type="button" class="btn btn-success " data-toggle="modal" data-target="#editpass">Đổi mật khẩu</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal Edit Profile -->
		<div class="modal fade in" id="editprofile" role="dialog">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">×</button>
				  <h4 class="modal-title">Cập nhật thông tin</h4>
				</div>
				<form action="?options=tttk&action=editprofile" method="post">
					<div class="modal-body">
						<div class="row">
							<label for="description" class="col-sm-3 control-label">Họ và tên</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="tenkh" value="<?php echo $result['Name']; ?>" maxlength="25">
							</div>
						</div>
						<div class="row">
							<label for="description" class="col-sm-3 control-label">Địa chỉ</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" value="<?php echo $result['Address']; ?>" name="diachi">
							</div>
						</div>
						<div class="row">
							<label for="description" class="col-sm-3 control-label">Số điện thoại</label>
							<div class="col-sm-9">
								<input type="number" class="form-control" value="<?php echo $result['Phone']; ?>" name="sdt" maxlength="13">
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

		<!-- Modal edit passwork -->
		<div class="modal fade in" id="editpass" role="dialog">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">×</button>
				  <h4 class="modal-title">Đổi mật khẩu</h4>
				</div>
				<form action="?options=tttk&action=editpass" method="post">
					<div class="modal-body">
						<div class="row">
							<label for="description" class="col-sm-3 control-label">Nhập mật khẩu cũ</label>
							<div class="col-sm-9">
								<input type="password" placeholder="Nhập mật khẩu cũ" class="form-control" name="mkcu" id="mkcu" maxlength="25">
							</div>
						</div>
						<div class="row">
							<label for="description" class="col-sm-3 control-label">Nhập mật khẩu mới</label>
							<div class="col-sm-9">
								<input type="password" placeholder="Nhập mật khẩu mới" class="form-control" name="mkmoi1" id="mkmoi1" maxlength="25" required>
							</div>
						</div>
						<div class="row">
							<label for="description" class="col-sm-3 control-label">Nhập mật lại mật khẩu mới</label>
							<div class="col-sm-9">
								<input type="password" placeholder="Nhập mật lại mật khẩu mới" class="form-control" name="mkmoi2" id="mkmoi2" maxlength="25" required>
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
	</div>
</div>


<?php
	 // check action
	if (isset($_GET['action'])) {

		$action = $_GET['action'];

		if ($action == 'editprofile') {

			$tenkh = $_POST['tenkh'];
			$diachi = $_POST['diachi'];
			$sdt = $_POST['sdt'];

			$sql = "UPDATE `user` SET `Name`='$tenkh',`Address`='$diachi',`Phone`=$sdt WHERE ID = ".$_SESSION['makh'];
			$check = mysqli_query($conn,$sql);
			if ( $check) {
				echo "<script> alert('Cập nhật liệu thành công');";
				echo "location.href='?options=tttk';</script>";
			}else{
				echo "<script> alert('Lỗi');<script>";
			}
		}

		if ($action == 'editpass') {

			$mkcu   = $_POST['mkcu'];
			$mkmoi1 = $_POST['mkmoi1'];

			//check passwor old
			if ($mkcu != $result['pass'])
			{
				echo "<script> alert('Mật khẩu cũ không đúng!');";
				echo "location.href='?options=tttk';</script>";
			}
			else
			{
				$sql = "UPDATE `user` SET `pass`='$mkmoi1' WHERE ID = ".$_SESSION['makh'];
				$check = mysqli_query($conn,$sql);
				if ( $check) {
					echo "<script> alert('Đổi mật khẩu thành công');";
					echo "location.href='?options=tttk';</script>";
				}else{
					echo "<script> alert('Lỗi');<script>";
				}
			}
			
		}
	}
?>
	<?php 
	}//end check logged 
	else
	{
		echo "<script> alert('Bạn không có quền truy cập trang này! Vui lòng quay lại!');";
		echo "location.href='index.php';</script>";
	}

	?>
<script>
	// check confirm passwork
	var mkmoi1 = document.getElementById("mkmoi1")
	  , mkmoi2 = document.getElementById("mkmoi2");

	function validatePassword(){
	  if(mkmoi1.value != mkmoi2.value) {
	    mkmoi2.setCustomValidity("Hai mật khẩu mới không trùng nhau!");
	  } else {
	    mkmoi2.setCustomValidity('');
	  }
	}

	mkmoi1.onchange = validatePassword;
	mkmoi2.onkeyup = validatePassword;
</script>