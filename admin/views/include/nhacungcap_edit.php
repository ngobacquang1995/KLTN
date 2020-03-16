<?php 
	if ($quyen == 1) {// Nếu là admin mới được phép truy cập
?>

<?php 
	$mancc = $_GET['mancc'];
	$sql = "SELECT * FROM supplier WHERE ID_Supplier=$mancc";
	$kq = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($kq);
	if (isset($_POST['edit'])) {
		$tenncc=$_REQUEST['tenncc'];
		$email=$_REQUEST['email'];
		$sdt=$_REQUEST['sdt'];
		$diachi=$_REQUEST['diachi'];
		$sql = "UPDATE supplier SET Supplier_name = '$tenncc',Address = '$diachi',Phone = '$sdt',Email = '$email' WHERE ID_Supplier=$mancc";
		$kq = mysqli_query($conn,$sql);
		if ($kq) {
			echo "<script> alert('Cập nhật dữ liệu thành công');
        location.href='?options=nhacungcap_list';</script>";  
		}else{
			echo "<script> alert('Lỗi sửa đổi dữ liệu!!!');</script>";  
		}
	}
?>
<div class="maintb">
	<div class="head">
		<h4>Sửa nhà cung cấp có mã [<?php echo $row['ID_Supplier'] ?>]</h4>
	</div>
	<div class="table">
		<form action="" method="POST">
			<div class="row">
				<div class="col-md-3"><label>Tên nhà cung cấp</label></div>
				<div class="col-md-9">
					<input  required type="text" class="form-control" id="tenncc" name="tenncc" value="<?php echo $row['Supplier_name']; ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Email</label></div>
				<div class="col-md-9">
					<input  required type="email" class="form-control" id="email" name="email" value="<?php echo $row['Email']; ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>SDT</label></div>
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
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<button type="submit" class="btn btn-primary" name="edit">Cập nhật</button>
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