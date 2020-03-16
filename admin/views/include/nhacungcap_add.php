<?php 
	if ($quyen == 1) {// Nếu là admin mới được phép truy cập
?>

<?php 
	if (isset($_POST['add'])) {
		$tenncc=$_REQUEST['tenncc'];
		$email=$_REQUEST['email'];
		$sdt=$_REQUEST['sdt'];
		$diachi=$_REQUEST['diachi'];
		if ($tenncc == "" || $email == "" || $sdt == "" || $diachi == "" ) {
			echo "<script> alert('Bạn cần nhập đủ dữ liệu!!!');</script>";
		}else{
			$sql = "INSERT INTO `supplier`(`ID_Supplier`, `Supplier_name`, `Address`, `Phone`, `Email`) VALUES('','$tenncc','$diachi','$sdt','$email')";
			$kq = mysqli_query($conn,$sql);
			if ($kq) {
				echo "<script> alert('Thêm mới dữ liệu thành công');
	        location.href='?options=nhacungcap_list';</script>";  
			}else{
				echo "<script> alert('Lỗi thêm mới dữ liệu!!!');</script>";  
			}
		}
	}
?>
<div class="maintb">
	<div class="head">
		<h4>Thêm mới nhà cung cấp</h4>
	</div>
	<div class="table">
		<form action="" method="POST">
			<div class="row">
				<div class="col-md-3"><label>Tên nhà cung cấp</label></div>
				<div class="col-md-9">
					<input  required type="text" class="form-control" id="tenncc" name="tenncc">
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
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<button type="submit" class="btn btn-primary" name="add">Thêm mới</button>
					<button type="reset" class="btn btn-warning" onClick="location.href='?options=nhacungcap_list'">Quay lại</button>
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