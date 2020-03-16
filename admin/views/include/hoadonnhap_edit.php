
<?php 
	$mahdn = $_GET['mahdn'];
	$sql = "SELECT receipt.*,managers.Name,supplier.Supplier_name FROM receipt INNER JOIN managers ON receipt.Manager_ID=managers.ID INNER JOIN supplier ON receipt.Supplier_ID=supplier.ID_Supplier where ID_receipt=$mahdn";
//	echo $sql;
	$kq = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($kq);
	if (isset($_POST['edit'])) {
		$mancc=$_REQUEST['mancc'];
		$ngaylap=$_REQUEST['ngaylap'];
		$sql = "UPDATE receipt SET Date = '$ngaylap',Supplier_ID = '$mancc' WHERE ID_receipt=$mahdn";
		$kq = mysqli_query($conn,$sql);
		if ($kq) {
			echo "<script> alert('Cập nhật dữ liệu thành công');location.href='?options=hoadonnhap_list';</script>";  
		}else{
			echo "<script> alert('Lỗi sửa đổi dữ liệu!!!');</script>";  
		}
	}
?>
<div class="maintb">
	<div class="head">
		<h4>Sửa hóa đơn nhập có mã [<?php echo $row['Supplier_ID'] ?>]</h4>
	</div>
	<div class="table">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-3"><label>Tên nhà cung cấp</label></div>
				<div class="col-md-9">
					<select name="mancc" id="mancc" class="form-control" style="width:200px">
						<option value="<?php echo $row['Supplier_ID'] ?>"><?php echo $row['Supplier_name'] ?></option>
						<?php 
							$ckc = $row['Supplier_ID'];
							$sql1 = "SELECT * FROM supplier WHERE ID_Supplier !=$ckc";
							$kq1 = mysqli_query($conn,$sql1);
					  		if (mysqli_num_rows($kq1)) {
					  			while ($row1 = mysqli_fetch_assoc($kq1)){ ?>
					  				<option value="<?php echo $row1['ID_Supplier'] ?>"><?php echo $row1['Supplier_name'] ?></option>
					  			<?php }
					  		}
						?>
					</select>
				</div>
			</div> 
			<div class="row">
				<div class="col-md-3"><label>Ngày lập</label></div>
				<div class="col-md-9">
					<input  required type="date" class="form-control" id="ngaylap" name="ngaylap" value="<?php echo $row['Date']; ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<button type="submit" class="btn btn-primary" name="edit">Cập nhật</button>
					<button type="reset" class="btn btn-warning" onClick="location.href='?options=hoadonnhap_list'">Quay lại</button>
				</div>
			</div>
		</form>
	</div>
</div>
