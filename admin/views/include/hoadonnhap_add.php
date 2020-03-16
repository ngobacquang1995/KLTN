
<?php 
	if (isset($_POST['add'])) {
		$mancc=$_REQUEST['mancc'];
		$ngaylap=$_REQUEST['ngaylap'];
		if ($mancc == "" || $ngaylap == "") {
			echo "<script> alert('Bạn cần nhập đủ dữ liệu!!!');</script>";
		}else{
			$sql = "INSERT INTO `receipt`(`ID_receipt`, `Sum_money`, `Date`, `Manager_ID`, `Supplier_ID`) VALUES ('','0','$ngaylap','$manv','$mancc')";
			$kq = mysqli_query($conn,$sql);
			if ($kq) {
				echo "<script> alert('Thêm mới dữ liệu thành công');location.href='?options=hoadonnhap_list';</script>";
			}else{
				echo "<script> alert('Lỗi thêm mới dữ liệu!!!');</script>";  
			}
		}
	}
?>
<div class="maintb">
	<div class="head">
		<h4>Thêm hóa đơn bán</h4>
	</div>
	<div class="table">
		<form action="" method="POST" enctype="multipart/form-data">
<!-- 			<div class="row">
				<div class="col-md-3"><label>Tên nhân viên</label></div>
				<div class="col-md-9">
					<select name="manv" id="manv" class="form-control" style="width:200px">
						<?php 
							$sql1 = "select * from nhanvien";
							$kq1 = mysqli_query($conn,$sql1);
					  		if (mysqli_num_rows($kq1)) {
					  			while ($row1 = mysqli_fetch_assoc($kq1)){
					  				echo "<option value=".$row1['manv'].">".$row1['TenNV']."</option>";
					  			}
					  		}
						?>
					</select>
				</div>
			</div> -->
			<div class="row">
				<div class="col-md-3"><label>Tên nhà cung cấp</label></div>
				<div class="col-md-9">
					<select name="mancc" id="mancc" class="form-control" style="width:200px">
						<?php 
							$sql1 = "SELECT * FROM supplier	";
							$kq1 = mysqli_query($conn,$sql1);
					  		if (mysqli_num_rows($kq1)) {
					  			while ($row1 = mysqli_fetch_assoc($kq1)){
					  				echo "<option value=".$row1['ID_Supplier'].">".$row1['Supplier_name']."</option>";
					  			}
					  		}
						?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Ngày lập hóa đơn</label></div>
				<div class="col-md-9">
					<input  required type="date" class="form-control" id="ngaylap" name="ngaylap" value="">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<button type="submit" class="btn btn-primary" name="add">Thêm mới</button>
					<button type="reset" class="btn btn-warning" onClick="location.href='?options=hoadonnhap_list'">Quay lại</button>
				</div>
			</div>
		</form>
	</div>
</div>
