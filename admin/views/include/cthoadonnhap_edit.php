<?php 
	$mahdnhap = $_GET['mahdnhap'];
?>

<?php
	$masp = $_GET['masp'];
	$sql = "SELECT receipt_detail.*,tree.Tree_name,tree.Amount as slcu FROM receipt_detail INNER JOIN tree ON receipt_detail.Tree_ID=tree.ID WHERE receipt_detail.Receipt_ID=$mahdnhap and receipt_detail.Tree_ID = '$masp'";
	$kq = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($kq);
	$thanhtien_cu=$row['Total_money'];
	$slsp	= $row['slcu'];
	$slcu	= $row['Amount'];

	if (isset($_POST['edit'])) {
		$masp=$_REQUEST['masp'];
		$slmoi=$_REQUEST['soluong'];
		$dongianhap=$_REQUEST['dongianhap'];
		$soluong = $slsp + $slmoi - $slcu;
		$thanhtien=$slmoi*$dongianhap;

		$sql = "UPDATE receipt_detail SET Tree_ID = '$masp',Price = '$dongianhap',Amount = '$slmoi',Total_money = '$thanhtien' WHERE Receipt_ID=$mahdnhap AND Tree_ID = '$masp'";
		$kq = mysqli_query($conn,$sql);
		if ($kq) {
			$sql4="SELECT * FROM receipt WHERE ID_receipt='$mahdnhap'";
			$kq4 = mysqli_query($conn,$sql4);
			$row4 = mysqli_fetch_assoc($kq4);
			$tongtien=$row4['Sum_money']+$thanhtien-$thanhtien_cu;
			$sql3="UPDATE tree SET Amount = $soluong WHERE ID='$masp'";
			$kq3 = mysqli_query($conn,$sql3);
			mysqli_query($conn,$sql3);
			echo "<script> alert('Cập nhật dữ liệu thành công');location.href='?options=cthoadonnhap_list&mahdnhap=".$mahdnhap."';</script>";  
		}else{
			echo "<script> alert('Lỗi sửa đổi dữ liệu!!!');</script>";  
		}
	}
?>
<div class="maintb">
	<div class="head">
		<h4>Sửa hóa đơn nhập có mã [<?php echo $mahdnhap ?>]</h4>
	</div>
	<div class="table">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-3"><label>Tên sản phẩm</label></div>
				<div class="col-md-9">
					<select required name="masp" id="masp" class="form-control" style="width:200px">
						<option value="<?php echo $row['masp'] ?>"><?php echo $row['tensp'] ?></option>
						<?php 
							$sql1 = "SELECT * FROM tree";
							$kq1 = mysqli_query($conn,$sql1);
					  		if (mysqli_num_rows($kq1)) {
					  			while ($row1 = mysqli_fetch_assoc($kq1)){ ?>
					  				<option value="<?php echo $row1['ID']; ?>" <?php if($row1['ID'] == $row['Tree_ID']) echo "selected"; ?> ><?php echo $row1['Tree_name'] ?></option>
					  			<?php }
					  		}
						?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Đơn giá nhập</label></div>
				<div class="col-md-9">
					<input  required type="number" class="form-control" id="dongianhap" name="dongianhap" value="<?php echo $row['Price']; ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Số lượng</label></div>
				<div class="col-md-9">
					<input  required type="number" class="form-control" id="soluong" name="soluong" value="<?php echo $row['Amount']; ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<button type="submit" class="btn btn-primary" name="edit">Cập nhật</button>
					<button type="reset" class="btn btn-warning" onClick="location.href='?options=cthoadonnhap_list&mahdnhap=<?php echo $mahdnhap; ?>'">Quay lại</button>
				</div>
			</div>
		</form>
	</div>
</div>