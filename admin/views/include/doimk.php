<?php
	if ($manv) {
?>
<div class="maintb">
	<div class="head">
		<h4>Đổi mật khẩu</h4>
	</div>

	<div class="table">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-3"><label>Mật khẩu cũ</label></div>
				<div class="col-md-9">
					<input  required type="password" class="form-control" id="matkhau1" name="matkhau1" maxlength="25">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Mật khẩu mới</label></div>
				<div class="col-md-9">
					<input  required type="password" class="form-control" id="matkhau2" name="matkhau2" maxlength="25">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Nhập lại mật khẩu mới</label></div>
				<div class="col-md-9">
					<input  required type="password" class="form-control" id="matkhau3" name="matkhau3" maxlength="25">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<button type="submit" class="btn btn-primary" name="edit">Cập nhật</button>
					<button type="reset" class="btn btn-warning" onClick="location.href='?options=profile'">Quay lại</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php 
	// Lấy dữ liệu mật khẩu cũ
	$sql= "SELECT * FROM `managers` WHERE `ID` = $manv";
	$kq=mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($kq);
	$matkhau_cu = $row['User_pass'];
	// Nếu có sự kiện edit thì thực hiện
	if (isset($_POST['edit'])) {
		$matkhau1=$_REQUEST['matkhau1'];
		$matkhau2=$_REQUEST['matkhau2'];
		$matkhau3=$_REQUEST['matkhau3'];
		if ($matkhau1 == "" || $matkhau2 == "" || $matkhau3 == "") { //kiểm tra nếu nhập thiếu
			echo "<script> alert('Bạn cần nhập đầy đủ dữ liệu!'); </script>";
		}elseif (md5($matkhau1) != $matkhau_cu)  { //so sánh với mật khẩu cũ
			echo "<script> alert('Mật khẩu cũ không đúng!'); </script>";
		}elseif ($matkhau2 != $matkhau3) {//so sánh 2 mật khẩu mới
			echo "<script> alert('Hai mật khẩu mới không trùng nhau!'); </script>";
		}else{
			$sql = "UPDATE `managers` SET User_pass = md5($matkhau2) WHERE ID = $manv";
			$kq=mysqli_query($conn,$sql);
			if($kq){
				echo "<script> alert('Đổi mật khẩu thành công!');";
				echo "location.href='?options=profile';</script>";
			}else{
				echo "<script> alert('Lỗi đổi mật khẩu không thành công!');<script>";
			}
		}
	}
?>

<?php }else{ 
	echo "<script> alert('Truy cập trái phép. Quay lại!'); </script>";
	echo "location.href='?options=home';</script>";
} ?>