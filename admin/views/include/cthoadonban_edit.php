<?php 
if (isset($_GET['mahdban'])) //check data
{
	$mahdban = $_GET['mahdban'];
	$masp = $_GET['masp'];
	$sql = "select order_detail.*,tree.Tree_name,tree.Price,tree.sale,tree.Amount as slsp from order_detail INNER JOIN tree ON order_detail.Tree_ID=tree.ID WHERE order_detail.Order_ID=$mahdban and order_detail.Tree_ID = '$masp'";
	$kq = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($kq);
	
	$thanhtien_cu = $row['Sum_money'];
	$slsp_cu 	  = $row['slsp'] + $row['Amount']; 

	if (isset($_POST['edit'])) {
		
		$masp=$_REQUEST['masp'];
		$soluong=$_REQUEST['soluong'];
		$slsp_moi = $slsp_cu - $soluong;
		$sale=$row['sale'];
		if ($row['sale'] > 0) 
		{
			$dongiaban = $row['Price'] - $row['Price'] * $row['sale']/100;
		}
		else
		{
			$dongiaban = $row['Price'];
		}
		$thanhtien = $soluong * $dongiaban;

		$sql = "UPDATE order_detail SET Tree_ID = '$masp',Amount = '$soluong',Sum_money = $thanhtien WHERE Order_ID=$mahdban AND Tree_ID = '$masp'";
		$kq = mysqli_query($conn,$sql);
		if ($kq) {
			// Cập nhật giá hóa đơn bán
			$sql4="SELECT * FROM `order` WHERE `ID` = $mahdban";
			$kq4 = mysqli_query($conn,$sql4);
			$row4 = mysqli_fetch_assoc($kq4);
			$tongtien=$row4['Total_money']+$thanhtien-$thanhtien_cu;
			
			var_dump($thanhtien);
			var_dump($thanhtien_cu);
			var_dump($row4['Total_money']);
			var_dump($tongtien);
			
			$sql3="UPDATE `order` SET `Total_money`= $tongtien WHERE `ID` = $mahdban";
			$kq3 = mysqli_query($conn,$sql3);
			
			// Cập nhật số lượng
			$sql4tree = "UPDATE tree SET Amount = $slsp_moi WHERE ID = '$masp'";
			mysqli_query($conn,$sql4tree);

			echo "<script> alert('Cập nhật dữ liệu thành công');location.href='?options=cthoadonban_list&mahdban=".$mahdban."';</script>";  
		}else{
			echo "<script> alert('Lỗi sửa đổi dữ liệu!!!');</script>";  
		}
	}
?>
<div class="maintb">
	<div class="head">
		<h4>Sửa hóa đơn bán có mã [<?php echo $mahdban ?>]</h4>
	</div>
	<div class="table">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-3"><label>Tên sản phẩm</label></div>
				<div class="col-md-9">
					<select required name="masp" id="masp" class="form-control" style="width:200px">
						<option value="<?php echo $row['Tree_ID'] ?>"><?php echo $row['Tree_name'] ?></option>
						<?php 
							$sql1 = "SELECT * FROM tree";
							$kq1 = mysqli_query($conn,$sql1);
					  		if (mysqli_num_rows($kq1)) {
					  			while ($row1 = mysqli_fetch_assoc($kq1)){ ?>
					  				<option value="<?php echo $row1['ID']; ?>"<?php if($row1['ID'] == $row['Tree_ID']) echo "selected"; ?> ><?php echo $row1['Tree_name'] ?></option>
					  			<?php }
					  		}
						?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Số lượng</label></div>
				<div class="col-md-9">
					<input required type="number" class="form-control" id="soluong" name="soluong" value="<?php echo $row['Amount']; ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<button type="submit" class="btn btn-primary" name="edit">Cập nhật</button>
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