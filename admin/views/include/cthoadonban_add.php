<?php
if (isset($_GET['mahdban'])) //Kiểm tra dữ liệu
{
	$mahdban = $_GET['mahdban'];
	if (isset($_POST['add']))
	{
		$masp=$_REQUEST['masp'];
		$soluong=$_REQUEST['soluong'];
		$ghichu=$_REQUEST['ghichu'];

		$sql1 = "SELECT * FROM tree WHERE ID='$masp'";
		$kq1  = mysqli_query($conn,$sql1);
		$row1 = mysqli_fetch_assoc($kq1);

		$soluongcu =$row1['Amount']; 
		$sale =$row1['sale'];
		if ($sale > 0) 
		{
			$dongiaban = $row1['Price'] - $row1['Price'] * $row1['sale']/100;
		}
		else
		{
			$dongiaban = $row1['Price'];
		}
		$thanhtien =$soluong*$dongiaban;

		if ($mahdban == "" || $masp == "" || $dongiaban == "" || $soluong == "" )
		{
			echo "<script> alert('Bạn cần nhập đủ dữ liệu!!!');</script>";
		}
		else
		{
			// Kiểm tra nếu đã có sản phẩm này thì cộng thêm vào số lượng đã có.
			$sql    = "SELECT * FROM `order_detail` WHERE Tree_ID = '$masp' AND Order_ID = '$mahdban'";
			$query  = mysqli_query($conn,$sql);

			if (mysqli_num_rows($query) == 0)
			{
				$sql = "INSERT INTO `order_detail`(`Order_ID`, `Tree_ID`, `Amount`, `Price`, `Sum_money`) VALUES( '$mahdban', '$masp','$soluong','$dongiaban','$thanhtien')";

				$kq = mysqli_query($conn,$sql);
				//$kq = 1;
				if ($kq) {
					// cập nhật giá hóa đơn bán
					$sql2="SELECT * FROM `order` WHERE `ID`= $mahdban";
					$kq2 = mysqli_query($conn,$sql2);
					$row2 = mysqli_fetch_assoc($kq2);
					$tongtien=$row2['Total_money']+$thanhtien;
					$sql3="UPDATE `order` SET `Total_money` = $tongtien WHERE ID=$mahdban";
					$kq3 = mysqli_query($conn,$sql3);

					//echo $sql4;
					echo "<script> alert('Thêm mới dữ liệu thành công');location.href='?options=cthoadonban_list&mahdban=".$mahdban."';</script>";
				}else{
					echo "<script> alert('Lỗi thêm mới dữ liệu!!!');</script>";
				}
			}
			else
			{
				echo "<script> alert('Sản phẩm này đã có trong hóa đơn!');</script>";
			}
		}
	}
?>
<div class="maintb">
	<div class="head">
		<h4>Thêm chi tiết hóa đơn bán có mã[<?php echo $mahdban; ?>]</h4>
	</div>
	<div class="table">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-3"><label>Tên sản phẩm</label></div>
				<div class="col-md-9">
					<select name="masp" id="masp" class="form-control" style="width:200px">
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
				<div class="col-md-3"><label>Số lượng</label></div>
				<div class="col-md-9">
					<input  required type="number" class="form-control" id="soluong" name="soluong">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Ghi chú</label></div>
				<div class="col-md-9">
					<input type="text" class="form-control" id="ghichu" name="ghichu">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<button type="submit" class="btn btn-primary" name="add">Thêm mới</button>
					<button type="reset" class="btn btn-warning" onClick="location.href='?options=cthoadonban_list&mahdban=<?php echo $mahdban; ?>'">Quay lại</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php
}//end if $_GET['mahdb']
else
{
	echo "<script> alert('Truy cập sai đường dẫn! Vui lòng quay lại!');";
	echo "location.href='index.php';</script>";
}
?>