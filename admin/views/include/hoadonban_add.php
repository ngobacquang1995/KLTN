<?php 
	if (isset($_POST['add'])) {
		$makh=$_REQUEST['makh'];
		$ngaylaphd=$_REQUEST['ngaylaphd'];
		$ghichu=$_REQUEST['ghichu'];
		$trangthai=$_REQUEST['trangthai'];
		$ptthanhtoan=$_REQUEST['ptthanhtoan'];
		if ($makh == "" || $ngaylaphd == "" || $ptthanhtoan == "" ) {
			echo "<script> alert('Bạn cần nhập đủ dữ liệu!!!');</script>";
		}else{
			$sql = "INSERT INTO `order`(`ID`, `User_ID`, `Manager_ID`, `Date`, `Total_money`, `Payment`, `Status`, `note`) VALUES ('','$makh','$manv','$ngaylaphd','0','$ptthanhtoan','$trangthai', '$ghichu')";
			$kq = mysqli_query($conn,$sql);
			if ($kq) 
			{
				echo "<script> alert('Thêm mới dữ liệu thành công');location.href='?options=hoadonban_list';</script>";
			}
			else
			{
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
		<form action="" method="POST">
			<div class="row">
				<div class="col-md-3"><label>Tên khách hàng</label></div>
				<div class="col-md-9">
					<select name="makh" id="makh" class="form-control" style="width:200px">
						<?php 
							$sql1 = "SELECT * FROM user";
							$kq1 = mysqli_query($conn,$sql1);
					  		if (mysqli_num_rows($kq1)) {
					  			while ($row1 = mysqli_fetch_assoc($kq1)){
					  				echo "<option value=".$row1['ID'].">".$row1['Name']."</option>";
					  			}
					  		}
						?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Ngày bán</label></div>
				<div class="col-md-9">
					<input  required type="date" class="form-control" id="ngaylaphd" name="ngaylaphd">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Ghi chú</label></div>
				<div class="col-md-9">
					<textarea rows="4" cols="50" type="text" class="form-control" id="ghichu" name="ghichu" ></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Trạng thái</label></div>
				<div class="col-md-9">
					<select name="trangthai" id="trangthai" class="form-control" style="width:200px">
						<option value="Chờ xét duyệt">Chờ xét duyệt</option>
						<option value="Đã xác nhận">Đã xác nhận</option>
						<option value="Đang giao">Đang giao</option>
						<option value="Hoàn thành">Hoàn thành</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Phương thức thanh toán</label></div>
				<div class="col-md-9">
					<select name="ptthanhtoan" id="ptthanhtoan" class="form-control" style="width:200px">
						<option value="Thanh toán khi giao hàng">Thanh toán khi giao hàng</option>
						<option value="Thanh toán chuyển khoản">Thanh toán chuyển khoản</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<button type="submit" class="btn btn-primary" name="add">Thêm mới</button>
					<button type="reset" class="btn btn-warning" onClick="location.href='?options=hoadonban_list'">Quay lại</button>
				</div>
			</div>
		</form>
	</div>
</div>