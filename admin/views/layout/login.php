<?php
session_start();
?>
<?php include ("../../config.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang chủ</title>
	<link rel="stylesheet" type="text/css" href="../../css/font-awesome.min.css">
	<link rel="stylesheet" href="../../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/style.admin.css">
</head>
<?php 
if (isset($_POST['dangnhap'])) {
	$taikhoan = $_POST['user'];
	$matkhau = md5($_POST['pass']);
	if ($taikhoan == "" || $matkhau == "") {
		echo "<script>alert('Tài khoản và mật khẩu không được để trống');</script>";
	}
	else{
		$sql = "SELECT managers.*,permission.Permiss FROM managers INNER JOIN permission ON managers.ID=permission.User_ID WHERE managers.User_name = '$taikhoan' and managers.User_pass = '$matkhau' ";
		$kq = mysqli_query($conn,$sql);
		
		$row = mysqli_num_rows($kq);
		$tt = mysqli_fetch_assoc($kq);
		
		if ($row == 0) {
			echo "<script>alert('Tài khoản hoặc mật khẩu không đúng');</script>";
			
		}else{
			$_SESSION['taikhoan'] = $taikhoan;
			$_SESSION['tennv'] = $tt['Name'];
			$_SESSION['quyen'] = $tt['Permiss'];
			$_SESSION['manv'] = $tt['ID'];
			header("Location: ../../");
			// /var_dump($_SESSION);
		}
	}
}
?>
<body>
	<div class="container">
		<fieldset>
			<legend>Đăng nhập vào hệ thống</legend>
			<form action="" method="POST">
				<div class="login">
					<p>Điền thông tin đăng nhập Quản trị viên</p>
					<div class="input-group">
					  <span class="input-group-addon" id="basic-addon1"><div class="icon-user">user</div></span>
					  <input  required type="text" class="form-control" placeholder="Tài khoản" name="user" aria-describedby="basic-addon1">
					</div>
					<div class="input-group">
					  <span class="input-group-addon" id="basic-addon1"><div class="icon-lock">pass</div></span>
					  <input  required type="password" class="form-control" placeholder="Mật khẩu" name="pass" aria-describedby="basic-addon1">
					</div>
					<p style="margin-top:10px;"><input type="checkbox"> Ghi nhớ thông tin đăng nhập</p>
					<button type="submit" class="btn btn-success" name="dangnhap">Đăng nhập</button>
				</div>
			</form>		
		</fieldset>
	</div>
</body>
</html>