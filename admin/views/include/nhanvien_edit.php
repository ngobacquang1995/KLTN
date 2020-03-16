<?php 
	if ($quyen == 1) {// Nếu là admin mới được phép truy cập
?>

<?php
	$manv = $_GET['manv'];
	$sql = "SELECT * FROM managers WHERE ID=$manv";
	$kq = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($kq);
	if (isset($_POST['edit'])) {
		$tennv=$_REQUEST['tennv'];
		$user=$_REQUEST['taikhoan'];
		$email=$_REQUEST['email'];
		$sdt=$_REQUEST['sdt'];
		$diachi=$_REQUEST['diachi'];
		$avarta=$_REQUEST['img'];
		$sql = "UPDATE managers SET Name='$tennv',User_name='$user',Address='$diachi',Phone='$sdt',Email='$email',Avarta='$avarta' WHERE ID=$manv";
		$kq = mysqli_query($conn,$sql);
		if ($kq) {
			echo "<script> alert('Cập nhật dữ liệu thành công');
        location.href='?options=nhanvien_list';</script>";  
		}else{
			echo "<script> alert('Lỗi sửa đổi dữ liệu!!!');</script>";  
		}
	}
?>
<div class="maintb">
	<div class="head">
		<h4>Sửa nhân viên có mã: <?php echo $row['ID'] ?></h4>
	</div>
	<div class="table">
		<form action="" method="POST">
			<div class="row">
				<div class="col-md-3"><label>Tên nhân viên</label></div>
				<div class="col-md-9">
					<input  required type="text" class="form-control" id="tennv" name="tennv" value="<?php echo $row['Name']; ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Tài khoản</label></div>
				<div class="col-md-9">
					<input  required type="text" class="form-control" id="taikhoan" name="taikhoan" value="<?php echo $row['User_name']; ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Email</label></div>
				<div class="col-md-9">
					<input  required type="email" class="form-control" id="email" name="email" value="<?php echo $row['Email']; ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Số điện thoại</label></div>
				<div class="col-md-9">
					<input  required type="number" class="form-control" id="sdt" name="sdt" value="<?php echo $row['Phone']; ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Địa chỉ</label></div>
				<div class="col-md-9">
					<input  required type="text" class="form-control" id="diachi" name="diachi" value="<?php echo $row['Address']; ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Ảnh đại diện</label></div>
				<div class="col-md-9">
					<input type="file" id="img" name="img">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<button type="submit" class="btn btn-primary" name="edit">Cập nhật</button>
					<button type="reset" class="btn btn-warning" onClick="location.href='?options=nhanvien_list'">Quay lại</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php 
	}else{ // else check quyền
		echo "<script> alert('Bạn không có quền truy cập trang này! Vui lòng quay lại!');";
		echo "location.href='index.php';</script>";
	}
?>