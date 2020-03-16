<?php 

	$mahdnhap = $_GET['mahdnhap'];
	$sql 	 = "SELECT receipt.*,supplier.*,managers.Name FROM receipt INNER JOIN supplier ON receipt.Supplier_ID = supplier.ID_Supplier INNER JOIN managers ON receipt.Manager_ID = managers.ID WHERE ID_receipt = $mahdnhap";
	$query 	 = mysqli_query($conn,$sql);
	
	if ($query) {
		$hdn 	 = mysqli_fetch_assoc($query);
		$day 	 = date_create($hdn['Date']);
	}
	else
	{
		$hdn = null;
	}
?>

<div class="maintb" id="main-print">
	<div class="head">
		<div class="row search">
		  <div class="col-xs-6">
		  	<h1>Danh sách chi tiết hóa đơn</h1>
		  </div>
		  <div class="col-xs-6">
		  	<a href="?options=cthoadonnhap_add&mahdnhap=<?php echo $mahdnhap; ?>" class="btn btn-success" role="button">Thêm CTHDN</a>
		  	<a href="javascript:void(0)" class="btn btn-default" onclick='window.print();' style="margin-top: 10px;margin-left: 12px;">In</a>
		  </div>
		</div>
	</div>
	<br>
	<?php if ($hdn != null): ?>
	<div class="head-pr">
		<div class="row">
			<div class="col-md-6">
				<p><b class="size1">Cửa hàng cây cảnh Phương Thảo</b></p>
				<p>Địa chỉ: Đường Trâu Quỳ - Gia Lâm - Hà Nội</p>
				<p>Số điện thoại: 0342.995.395</p>
			</div>
			<div class="col-md-6 right">
				<i>Mã hóa đơn:&nbsp;<?php echo $mahdnhap; ?></i>
			</div>
		</div>
		<div class="tieude">
			<p><b class="size1">HÓA ĐƠN NHẬP</b></p>
			<p>Ngày ..<?php echo date_format($day,"d") ?>.. Tháng ..<?php echo date_format($day,"m") ?>.. Năm ..<?php echo date_format($day,"Y") ?>..</p>
		</div>
		<div class="row">
			<div class="col-xs-12"><p>Tên nhà cung cấp:&nbsp;&nbsp;&nbsp;<?php echo $hdn['Supplier_name'] ?></p></div>
			<div class="col-xs-12"><p>Địa chỉ:&nbsp;&nbsp;&nbsp;<?php echo $hdn['Address'] ?></p></div>
			<div class="col-xs-12"><p>SDT:&nbsp;&nbsp;&nbsp;<?php echo $hdn['Phone'] ?></p></div>
			<div class="col-xs-12"><p>Tên nhân viên:&nbsp;&nbsp;&nbsp;<?php echo $hdn['Name']; ?></p></div>
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
		  		$sql = "SELECT receipt_detail.*,tree.Tree_name FROM receipt_detail INNER JOIN tree ON receipt_detail.Tree_ID=tree.ID WHERE Receipt_ID=$mahdnhap";
				$kq = mysqli_query($conn,$sql);
		  		if (mysqli_num_rows($kq)) {
		  			while ($row = mysqli_fetch_assoc($kq)) {
		  	?>
		  	<tr>
		  		<td><?php echo $row['Receipt_ID']; ?></td>
		  		<td><?php echo $row['Tree_name']; ?></td>
		  		<td><?php echo $row['Amount']; ?></td>
		  		<td><?php echo number_format($row['Price']); ?></td>
		  		<td><?php echo number_format($row['Total_money']); ?></td>
		  		<td class="an">
					<a href="?options=cthoadonnhap_edit&mahdnhap=<?php echo $row['Receipt_ID']; ?>&masp=<?php echo $row['Tree_ID']; ?>" title="Chỉnh sửa hóa đơn có mã [<?php echo $row['Receipt_ID'] ?>]"><i class="material-icons">edit</i></a>
		  			<a href="#" onClick="if(confirm('Bạn có chắc chắn muốn xóa hóa đơn có mã là [<?php echo $row['Receipt_ID'];?>] không?')){ location.href='?options=cthoadonnhap_list&action=del&mahdnhap=<?php echo $row['Receipt_ID'];?>&masp=<?php echo $row['Tree_ID'];?>'}" title="Xóa hóa đơn có mã [<?php echo $row['Receipt_ID'] ?>]"><i class="material-icons">delete</i></a>
		  		</td>
		  	</tr>
		  	<?php }
		  	echo '
		  	<tr>
				<td colspan="3"></td>
				<td><b>Tổng tiền:</b></td>
				<td><b>'.number_format($hdn['Sum_money']).'</b></td>
				<td class="an"></td>
			</tr>';
		  	}else{
		  		echo "Không có hóa đơn !";
		  		} ?>
		  	</tbody>
		</table>
		<div class="row">
			<div class="col-xs-9"></div>
			<div class="col-xs-3"><button type="reset" class="btn btn-warning an" onclick="location.href='?options=hoadonnhap_list'">Quay lại</button></div>
		</div>
	</div>
</div>
<?php 
	if (isset($_GET['action'])) {
		$action = $_GET['action'];
		if ($action == 'del') {
			$mahdnhap = $_GET['mahdnhap'];
			$masp = $_GET['masp'];
			$sql2 = "SELECT * FROM receipt_detail WHERE Receipt_ID = '$mahdnhap' and Tree_ID = '$masp'";
			$kq2 = mysqli_query($conn,$sql2);
			$row2 = mysqli_fetch_assoc($kq2);
			//$mahdb = $row2['mahdnhap'];
			$sl = $row2['Amount'];
			$thanhtien = $row2['Total_money'];
			$sql = "DELETE FROM receipt_detail WHERE Receipt_ID = '$mahdnhap' and Tree_ID = '$masp'";
			$check = mysqli_query($conn,$sql);
			if ( $check) {
				// cập nhật giá hóa đơn
				$sql4="SELECT * FROM receipt WHERE ID_receipt='$mahdnhap'";
				$kq4 = mysqli_query($conn,$sql4);
				$row4 = mysqli_fetch_assoc($kq4);
				$tongtien=$row4['Sum_money'] - $thanhtien;
				$sql1="UPDATE receipt SET Sum_money = '$tongtien' WHERE ID_receipt=$mahdnhap";
				$kq1 = mysqli_query($conn,$sql1);

				// Cập nhật lại số lượng bảng sản phẩm
				$sql3   = "SELECT * FROM tree WHERE ID = '$masp'";
				$query3 = mysqli_query($conn,$sql3);
				$row3 	= mysqli_fetch_assoc($query3);
				$soluongmoi = $row3['Amount'] - $sl;
				$sql5 = "UPDATE tree SET Amount = '$soluongmoi' WHERE ID = '$masp'";
				mysqli_query($conn,$sql5);

				echo "<script> alert('Xóa dữ liệu thành công');";
				echo "location.href='?options=cthoadonnhap_list&mahdnhap=".$mahdnhap."';</script>";
			}else{
				echo "<script> alert('Xóa dữ liệu không thành công');<script>";
			}
		}
	}
?>
