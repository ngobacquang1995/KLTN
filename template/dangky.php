<div class="bg-layer">
	<div class="box-register">
		<fieldset class="dangky">
			<legend>Đăng ký tài khoản</legend>
			<form action="" method="POST" name="signin">
				<div class="login">
					<div class="row">
						<div class="col-sm-4">Tên tài khoản</div>
						<div class="col-sm-8"><input type="text" class="form-control" placeholder="Tên tài khoản" name="taikhoan"></div>
					</div>
					<div class="row">
						<div class="col-sm-4">Mật khẩu</div>
						<div class="col-sm-8"><input type="password" class="form-control" placeholder="Mật khẩu" name="matkhau1"></div>
					</div>
					<div class="row">
						<div class="col-sm-4">Nhập lại mật khẩu</div>
						<div class="col-sm-8"><input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="matkhau2"></div>
					</div>
					<div class="row">
						<div class="col-sm-4">Tên khách hàng</div>
						<div class="col-sm-8"><input type="text" class="form-control" placeholder="Tên" name="tenkh"></div>
					</div>
					<div class="row">
						<div class="col-sm-4">Địa chỉ</div>
						<div class="col-sm-8"><input type="text" class="form-control" placeholder="Địa chỉ" name="diachi"></div>
					</div>
					<div class="row">
						<div class="col-sm-4">Số điện thoại</div>
						<div class="col-sm-8"><input type="tel" class="form-control" placeholder="Số điện thoại" name="sdt"></div>
					</div>
					<div class="btn-center">
						<button type="submit" class="btn btn-success" name="add" >Đăng ký</button>
					</div>
				</div>
			</form>		
		</fieldset>
	</div>
</div>

<?php
	if (isset($_POST['add'])) {
		$taikhoan = $_POST['taikhoan'];
		$matkhau1 = $_POST['matkhau1'];
		$matkhau2 = $_POST['matkhau2'];
		$tenkh = $_POST['tenkh'];
		$diachi = $_POST['diachi'];
		$sdt=$_POST['sdt'];
		$ck = false;

		$sql = "SELECT * FROM `user`";
		$kq = mysqli_query($conn,$sql);
		// Count num rows
		if (mysqli_num_rows($kq)) 
		{
			while ($row = mysqli_fetch_assoc($kq)) { //loop result
				if ($row['User_name'] == $taikhoan) //if acc duplicates then assign $ck = true
				{
					$ck=true;
				}
			}
		}
		
		if ($taikhoan == "" || $matkhau1 == "" || $matkhau2 == "" || $tenkh == "" || $diachi == "" || $sdt == "" ) {
			echo "<script> alert('Bạn cần nhập đủ dữ liệu!!!');</script>";
		}elseif($matkhau1 != $matkhau2){
			echo "<script> alert('Hai mật khẩu không trùng nhau!!!');</script>";
		}elseif($ck === true){
			echo "<script> alert('Tài khoản bị trùng!!!');</script>";
		}else{
			$sql = "INSERT INTO user (`ID`, `Name`, `Address`, `Phone`, `User_name`, `pass`, `note`) VALUES ('','$tenkh','$diachi', $sdt,'$taikhoan', '$matkhau1', '')";
			$kq = mysqli_query($conn,$sql);
			if ($kq) {
				echo "<script> alert('Đăng ký thành công');location.href='?options=dangnhap';</script>";
			}else{
				echo "<script> alert('Lỗi đăng ký!!!');</script>";
			}
			echo $sql;
		}
	}
?>