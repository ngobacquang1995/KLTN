<?php 
	if (isset($_GET['mahdban'])) //check data
	{
		$mahdban = $_GET['mahdban'];
		$sql 	 = "SELECT * FROM `order` WHERE `ID` = '$mahdban'";
		$query 	 = mysqli_query($conn,$sql);
		if ($query) {
			$hdb = mysqli_fetch_assoc($query);
			$day 	 = date_create($hdb['Date']);
			$user = $hdb['User_ID'];
			$manager = $hdb['Manager_ID'];
		}
		else
		{
			$hdb = null;
		}
?>
<div class="maintb">
	<div class="head">
		<div class="row search">
		  <div class="col-xs-6">
		  	<h4>Danh sách chi tiết hóa đơn bán có mã [<?php echo $mahdban; ?>]</h4>
		  </div>
		  <div class="col-xs-6">
		  	<a href="?options=cthoadonban_add&mahdban=<?php echo $mahdban; ?>" class="btn btn-success" role="button">Thêm CTHDB</a>
		  	<a href="javascript:void(0)" class="btn btn-default" onclick='window.print();' style="margin-top: 10px;margin-left: 12px;">In</a>
		  </div>
		</div>
	</div>
	<?php if ($hdb != null): ?>
	<div class="head-pr">
		<div class="row">
			<div class="col-md-6">
				<p><b class="size1">Cửa hàng cây cảnh Phương Thảo</b></p>
				<p>Địa chỉ: Đường Trâu Quỳ - Gia Lâm - Hà Nội</p>
				<p>Số điện thoại: 0342.995.395</p>
			</div>
			<div class="col-md-6 right">
				<i>Mã hóa đơn:&nbsp;<?php echo $mahdban; ?></i>
			</div>
		</div>
		<div class="tieude">
			<p><b class="size1">HÓA ĐƠN BÁN</b></p>
			<p>Ngày ..<?php echo date_format($day,"d") ?>.. Tháng ..<?php echo date_format($day,"m") ?>.. Năm ..<?php echo date_format($day,"Y") ?>..</p>
		</div>
		<div class="row">
		<?php 
			$sql1 	 = "SELECT * FROM `user` WHERE `ID` = '$user'";
			$query1 	 = mysqli_query($conn,$sql1);
			$hdb1 = mysqli_fetch_assoc($query1);
			
			$sql2 	 = "SELECT * FROM `managers` WHERE `ID` = '$manager'";
			$query2 	 = mysqli_query($conn,$sql2);
			$hdb2 = mysqli_fetch_assoc($query2);
		?>
			<div class="col-xs-12">Tên khách hàng:&nbsp;&nbsp;&nbsp;<?php echo $hdb1['Name'] ?></div>
			<div class="col-xs-8">Địa chỉ:&nbsp;&nbsp;&nbsp;<?php echo $hdb1['Address'] ?></div>
			<div class="col-xs-4">SDT:&nbsp;&nbsp;&nbsp;<?php echo $hdb1['Phone'] ?></div>
			<div class="col-xs-12">Tên nhân viên:&nbsp;&nbsp;&nbsp;<?php echo $hdb2['Name']; ?></div>
		
		</div>
	</div>
	<br>
	<?php endif ?>
	<div class="table">
		<table class="table table-hover" width="100%">
			<thead>
		  	<tr>
		  		<td>Mã hóa đơn</td>
		  		<td>Tên sản phẩm</td>
		  		<td>Số lượng</td>
		  		<td>Đơn giá</td>
		  		<td>Thành tiền</td>
		  		<td class="an">Thao tác</td>
		  	</tr>
		  	</thead>
		  	<tbody>
		  	<?php
		  		$sql = "SELECT * FROM order_detail WHERE Order_ID=$mahdban";
				$kq = mysqli_query($conn,$sql);
		  		if (mysqli_num_rows($kq)) {
		  			while ($row = mysqli_fetch_assoc($kq)) {
		  	?>
		  	<tr>
		  		<td><?php echo $mahdban; ?></td>
		  		<td><?php 
					$Tree_ID = $row['Tree_ID'];
					$sqltree = "SELECT * FROM `tree` WHERE `ID` = '$Tree_ID'";
					$kqtree = mysqli_query($conn,$sqltree);
					while ($rowtree = mysqli_fetch_assoc($kqtree)) {
						echo $rowtree['Tree_name'];
					}

				?></td>
		  		<td><?php echo $row['Amount']; ?></td>
		  		<td><?php echo number_format($row['Price']); ?></td>
		  		<td><?php echo number_format($row['Sum_money']); ?></td>
		  		<td class="an">
					<a href="?options=cthoadonban_edit&mahdban=<?php echo $mahdban; ?>&masp=<?php echo $row['Tree_ID']; ?>" title="Chỉnh sửa hóa đơn có mã [<?php echo $mahdban; ?>]"><i class="material-icons">edit</i></a>
		  			<a href="#" onClick="if(confirm('Bạn có chắc chắn muốn xóa hóa đơn có mã là [<?php echo $mahdban; ?>] không?')){ location.href='?options=cthoadonban_list&action=del&mahdban=<?php echo $mahdban; ?>&masp=<?php echo $row['Tree_ID'];?>'}" title="Xóa hóa đơn có mã [<?php echo $mahdban; ?>]"><i class="material-icons">delete</i></a>
		  		</td>
		  	</tr>
		  	<?php } ?>
		  	<tr>
				<td colspan="3"></td>
				<td><b>Tổng tiền:</b></td>
				<td><b> <?php 
					$sql5="SELECT * FROM `order` WHERE `ID` = $mahdban";
					$kq5 = mysqli_query($conn,$sql5);
					$row5 = mysqli_fetch_assoc($kq5);
					echo number_format($row5['Total_money']);?></b></td>
				<td></td>
				<td class="an"></td>
			</tr>
		  	<?php
			}else{
		  		echo "Không có hóa đơn !";
		  		} ?>
		  	</tbody>
		</table>
		<div class="row">
			<div class="col-xs-9"></div>
			<div class="col-xs-3"><button type="reset" class="btn btn-warning" onclick="location.href='?options=hoadonban_list'">Quay lại</button></div>
		</div>
	</div>
</div>
<?php 
	if (isset($_GET['action'])) {
		$action = $_GET['action'];
		if ($action == 'del') {
			$mahdban = $_GET['mahdban'];
			$masp = $_GET['masp'];
			$sql2 = "SELECT * FROM order_detail WHERE Order_ID = '$mahdban' and Tree_ID = '$masp'";
			$kq2 = mysqli_query($conn,$sql2);
			$row2 = mysqli_fetch_assoc($kq2);
			$sl = $row2['Amount'];
			$thanhtien = $row2['Sum_money'];
			$sql = "DELETE FROM order_detail WHERE Order_ID = '$mahdban' and Tree_ID = '$masp'";
			$check = mysqli_query($conn,$sql);
			if ( $check) {
				// Cập nhật giá hóa đơn bán
				$sql4="SELECT * FROM `order` WHERE `ID`='$mahdban'";
				$kq4 = mysqli_query($conn,$sql4);
				$row4 = mysqli_fetch_assoc($kq4);
				$tongtien=$row4['Total_money'] - $thanhtien;
				$sql1="UPDATE order SET Total_money = '$tongtien' WHERE ID =$mahdban";
				$kq1 = mysqli_query($conn,$sql1);
				
				// Cập nhật lại số lượng bảng sản phẩm
				$sql3   = "SELECT * FROM tree WHERE ID = '$masp'";
				$query3 = mysqli_query($conn,$sql3);
				$row3 	= mysqli_fetch_assoc($query3);
				$soluongmoi = $sl + $row3['Amount'];
				$sql5 = "UPDATE tree SET Amount = '$soluongmoi' WHERE ID = '$masp'";
				mysqli_query($conn,$sql5);

				echo "<script> alert('Xóa dữ liệu thành công');";
				echo "location.href='?options=cthoadonban_list&mahdban=".$mahdban	."';</script>";
			}else{
				echo "<script> alert('Xóa dữ liệu không thành công');<script>";
			}
		}
	}
}//end if $_GET['mahdb']

?>
