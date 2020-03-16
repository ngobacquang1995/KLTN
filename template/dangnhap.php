<div class="bg-layer">
	<div class="box-login">
		<fieldset>
			<legend>Đăng nhập tài khoản</legend>
			<form action="" method="POST">
				<div class="login">
					<p>Điền thông tin đăng nhập </p>
					<div class="input-group">
					  <span class="input-group-addon" id="basic-addon1"><i class="fas fa-user"></i></span>
					  <input type="text" class="form-control" placeholder="Tài khoản" name="taikhoan" aria-describedby="basic-addon1">
					</div>
					<div class="input-group">
					  <span class="input-group-addon" id="basic-addon1"><i class="fas fa-lock"></i></span>
					  <input type="password" class="form-control" placeholder="Mật khẩu" name="matkhau" aria-describedby="basic-addon1">
					</div>
					<p style="margin-top:10px;"><input type="checkbox"> Ghi nhớ thông tin đăng nhập</p>
					<div class="btn-center">
						<button type="submit" class="btn btn-success" name="dangnhap">Đăng nhập</button>
					</div>
					<div class="links">
						<p><a href="?options=dangky">Tạo tài khoản?</a></p>
					</div>
				</div>
			</form>		
		</fieldset>
	</div>
</div>
<?php
	if(isset($_POST['dangnhap'])){
		$taikhoan = $_POST['taikhoan'];
		$matkhau = md5($_POST['matkhau']);
		if ($taikhoan == '' || $matkhau == '') {
			echo "<script>alert('Tài khoản và mật khẩu không được để trống');</script>";
		}else{
			$sql = "SELECT * FROM `user` WHERE User_name = '$taikhoan' and pass = '$matkhau' ";
			$kq = mysqli_query($conn,$sql);
			$tt = mysqli_fetch_assoc($kq);
			if (count($tt) == 0) {
				echo "<script>alert('Tài khoản hoặc mật khẩu không đúng');</script>";
			
			}else{
				$_SESSION['user'] = $taikhoan;
				$_SESSION['name_kh'] = $tt['Name'];
				$_SESSION['makh'] = $tt['ID'];
				echo "<script>location.href='index.php';</script>";
			}
		}
	}
?>