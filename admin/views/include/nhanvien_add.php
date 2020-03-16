<?php 
	if ($quyen == 1) {// Nếu là admin mới được phép truy cập
?>

<?php 
	if (isset($_POST['add'])) {
		$tennv=$_REQUEST['tennv'];
		$user=$_REQUEST['taikhoan'];
		$pass=$_REQUEST['matkhau'];
		$email=$_REQUEST['email'];
		$sdt=$_REQUEST['sdt'];
		$diachi=$_REQUEST['diachi'];
		$avarta=$_REQUEST['img'];
		if ($tennv == "" || $email == "" || $sdt == "" || $diachi == "" || $avarta == "") {
			echo "<script> alert('Bạn cần nhập đủ dữ liệu!!!');</script>";
		}else{
			$passmd = md5($pass);
			$sql = "INSERT INTO managers(ID,Name,User_name,User_pass,Address,Phone,Email,Avarta) VALUES(null,'$tennv','$user','$passmd','$diachi','$sdt','$email','$avarta')";
			$kq = mysqli_query($conn,$sql);
			if ($kq) {
				$querypermis = mysqli_query($conn,"SELECT MAX(ID) as manv FROM `managers`");
				$mahdba = mysqli_fetch_assoc($querypermis);
				$userid = $mahdba['manv'];
				
				$sqlpq = "INSERT INTO `permission`(`ID`, `User_ID`, `Permiss`) VALUES('','$userid','0')";
				$kqpq = mysqli_query($conn,$sqlpq);
				echo "<script> alert('Thêm thành công');location.href='?options=nhanvien_list';</script>";  
			}else{
				echo "<script> alert('Lỗi thêm mới dữ liệu!!!');</script>";  
			}
			
		}
	}
?>
<div class="maintb">
	<div class="head">
		<h4>Thêm mới nhân viên</h4>
	</div>
	<div class="table">
		<form action="" method="POST">
			<div class="row">
				<div class="col-md-3"><label>Tên nhân viên</label></div>
				<div class="col-md-9">
					<input  required type="text" class="form-control" id="tennv" name="tennv">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Tài khoản</label></div>
				<div class="col-md-9">
					<input  required type="text" class="form-control" id="taikhoan" name="taikhoan">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Mật khẩu</label></div>
				<div class="col-md-9">
					<input  required type="password" class="form-control" id="matkhau" name="matkhau">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Email</label></div>
				<div class="col-md-9">
					<input  required type="email" class="form-control" id="email" name="email">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Số điện thoại</label></div>
				<div class="col-md-9">
					<input  required type="number" class="form-control" id="sdt" name="sdt">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Địa chỉ</label></div>
				<div class="col-md-9">
					<input  required type="text" class="form-control" id="diachi" name="diachi">
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
					<button type="submit" class="btn btn-primary" name="add">Thêm mới</button>
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