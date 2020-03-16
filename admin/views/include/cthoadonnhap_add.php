<?php 
$mahdnhap = $_GET['mahdnhap'];
?>

<?php 
	if (isset($_POST['add'])) {
		$masp=$_REQUEST['masp'];
		$dongianhap=$_REQUEST['dongianhap'];
		$soluong=$_REQUEST['soluong'];

		$sql1 = "SELECT * FROM tree WHERE ID='$masp'";
		$kq1 = mysqli_query($conn,$sql1);
		$row1 = mysqli_fetch_assoc($kq1);

		$thanhtien=$soluong*$dongianhap;
		if ($mahdnhap == "" || $masp == "" || $dongianhap == "" || $soluong == "" ) {
			echo "<script> alert('Bạn cần nhập đủ dữ liệu!!!');</script>";
		}else{
			$sql = "INSERT INTO receipt_detail(Receipt_ID,Tree_ID,Amount,Price,Total_money) VALUES( '$mahdnhap', '$masp','$soluong','$dongianhap','$thanhtien')";
			$kq = mysqli_query($conn,$sql);
			$kq = true;
			if ($kq) {
				$sql2	  ="SELECT * FROM receipt WHERE ID_receipt='$mahdnhap'";
				$kq2	  = mysqli_query($conn,$sql2);
				$row2	  = mysqli_fetch_assoc($kq2);
				$tongtien =$row2['Sum_money']+$thanhtien;
				$sql3	  ="UPDATE receipt SET Sum_money = '$tongtien' WHERE ID_receipt=$mahdnhap";
				$kq3  	  = mysqli_query($conn,$sql3);
				// cap nhat so luong
				$sql4	  = mysqli_query($conn,"SELECT Amount FROM `tree` WHERE ID = '$masp'");
				$row4	  = mysqli_fetch_assoc($sql4);
				$slcu	  = $row4['Amount'];
				$slmoi	  = $soluong + $slcu;
				mysqli_query($conn,"UPDATE tree SET Amount = $slmoi WHERE ID='$masp'");

				echo "<script> alert('Thêm mới dữ liệu thành công');location.href='?options=cthoadonnhap_list&mahdnhap=".$mahdnhap."';</script>";
			}else{
				echo "<script> alert('Lỗi thêm mới dữ liệu!!!');</script>";  
			}
		}
	}

?>
<div class="maintb">
	<div class="head">
		<h4>Thêm chi tiết hóa đơn nhập</h4>
	</div>
	<div class="table">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-3"><label>Tên sản phẩm</label></div>
				<div class="col-md-9">
					<select name="masp" id="masp" class="form-control" style="width:200px" required>
						<?php 
							$sql1 = "SELECT * FROM tree";
							$kq1 = mysqli_query($conn,$sql1);
					  		if (mysqli_num_rows($kq1)) {
					  			while ($row1 = mysqli_fetch_assoc($kq1)){
					  				echo "<option value=".$row1['ID'].">".$row1['Tree_name']."</option>";
					  			}
					  		}
						?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Đơn giá nhập</label></div>
				<div class="col-md-9">
					<input  required type="number" class="form-control" id="dongianhap" name="dongianhap" required>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Số lượng</label></div>
				<div class="col-md-9">
					<input  required type="number" class="form-control" id="soluong" name="soluong" required>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<button type="submit" class="btn btn-success" name="add">Thêm mới</button>
					<button type="reset" class="btn btn-warning" onClick="location.href='?options=cthoadonnhap_list&mahdnhap=<?php echo $mahdnhap; ?>'">Quay lại</button>
				</div>
			</div>
		</form>
	</div>
</div>
