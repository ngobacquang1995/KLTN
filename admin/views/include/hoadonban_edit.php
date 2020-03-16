<?php 
	$mahdb = $_GET['mahdb'];
	
	$sql = "SELECT * FROM `order` WHERE `ID` = $mahdb";
	$kq = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($kq);
	if (isset($_POST['edit'])) {
		$ngaylaphd=$_REQUEST['ngaylaphd'];
		$ptthanhtoan=$_REQUEST['ptthanhtoan'];
		$trangthai=$_REQUEST['trangthai'];
		$makh=$_REQUEST['makh'];
		$ghichu=$_REQUEST['ghichu'];
		
		
		$sql = "UPDATE `order` SET `User_ID`='$makh',`Manager_ID`='$manv',`Date`='$ngaylaphd',`Payment`='$ptthanhtoan',`Status`='$trangthai',`note`='$ghichu' WHERE `ID` = $mahdb";
		$kq = mysqli_query($conn,$sql);
		if ($kq) {


			if($trangthai == 'Đang giao'){
			// cập nhật số lượng cho sản phẩm
				$sql3 = "SELECT * FROM `order_detail` WHERE `Order_ID` = $mahdb";
				$query3 = mysqli_query($conn,$sql3);
				while($row = mysqli_fetch_assoc($query3)){
					$macay = $row['Tree_ID'];
					$slmua = $row['Amount'];
					$sqlcu   = "SELECT * FROM tree WHERE ID = '$macay'";
					$querycu = mysqli_query($conn,$sqlcu);
					while($rowcu = mysqli_fetch_assoc($querycu)){
						$slcu =$rowcu['Amount'];
						$slmoi = $slcu - $slmua;
					}

					$sql   = "UPDATE tree SET Amount = $slmoi WHERE ID = '$macay'";
					mysqli_query($conn,$sql);
				}
			}
			echo "<script> alert('Cập nhật dữ liệu thành công');location.href='?options=hoadonban_list';</script>";  
		}else{
			echo "<script> alert('Lỗi sửa đổi dữ liệu!!!');</script>";
		}
	}
?>
<div class="maintb">
	<div class="head">
		<h4>Sửa hóa đơn bán có mã [<?php echo $mahdb; ?>]</h4>
	</div>
	<div class="table">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-3"><label>Khách hàng</label></div>
				<div class="col-md-9">
					<select name="makh" id="makh" class="form-control" style="width:200px">
						<?php 
							$sqlkh = "SELECT * FROM user";
							$kqkh = mysqli_query($conn,$sqlkh);
					  		if (mysqli_num_rows($kqkh)) {
					  			while ($rowkh = mysqli_fetch_assoc($kqkh)){ ?>
					  				<option value="<?php echo $rowkh['ID']; ?>" <?php if($rowkh['ID'] == $row['ID']) echo "selected"; ?> ><?php echo $rowkh['Name'] ?></option>
					  			<?php }
					  		}
						?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Ngày lập</label></div>
				<div class="col-md-9">
					<input  required type="date" class="form-control" id="ngaylaphd" name="ngaylaphd" value="<?php echo $row['Date']; ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Trạng thái</label></div>
				<div class="col-md-9">
					<select name="trangthai" id="trangthai" class="form-control" style="width:200px">
						<option value="Chờ xét duyệt" <?php if($row['Status'] == "Chờ xét duyệt") echo "selected"; ?> >Chờ xét duyệt</option>
						<option value="Đã xác nhận" <?php if($row['Status'] == "Đã xác nhận") echo "selected"; ?> >Đã xác nhận</option>
						<option value="Đang giao" <?php if($row['Status'] == "Đang giao") echo "selected"; ?>>Đang giao</option>
						<option value="Hoàn thành" <?php if($row['Status'] == "Hoàn thành") echo "selected"; ?>>Hoàn thành</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Phương thức thanh toán</label></div>
				<div class="col-md-9">
					<select name="ptthanhtoan" id="ptthanhtoan" class="form-control" style="width:200px">
						<option value="Thanh toán khi giao hàng" <?php if($row['Payment'] == "Thanh toán khi giao hàng") echo "selected"; ?> >Thanh toán khi giao hàng</option>
						<option value="Thanh toán chuyển khoản" <?php if($row['Payment'] == "Thanh toán chuyển khoản") echo "selected"; ?>>Thanh toán chuyển khoản</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Ghi chú</label></div>
				<div class="col-md-9">
					<textarea rows="4" cols="50" type="text" class="form-control" id="ghichu" name="ghichu" ><?php echo $row['note']; ?></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<button type="submit" class="btn btn-primary" name="edit">Cập nhật</button>
					<button type="reset" class="btn btn-warning" onClick="location.href='?options=hoadonban_list'">Quay lại</button>
				</div>
			</div>
		</form>
	</div>
</div>