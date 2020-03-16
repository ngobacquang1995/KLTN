<?php 
	if ($quyen == 1) {// Nếu là admin mới được phép truy cập

	if (isset($_POST['search'])) 
	{
		if ($_POST['date1'] > $_POST['date2']) 
		{
			$date1 = $_POST['date2'];
			$date2 = $_POST['date1'];
		}
		else
		{
			$date1 = $_POST['date1'];
			$date2 = $_POST['date2'];
		}
	}
	else
	{
		$date2 = date('Y-m-d');
		$date1=date_create($date2);
		date_sub($date1,date_interval_create_from_date_string("30 days"));
		$date1 = date_format($date1,"Y-m-d");
	}

	$date_now = date("d/m/y h:i:s A");
	$date_fr1 = date_create($date1);
	$date_fr2 = date_create($date2);

	$i = 0;
?>

<div class="maintb">
	<div class="head">
		<div class="search rpt">
			<form action="index.php?options=tkmhbanchay" method="post">
				<div class="row">
					<div class="col-sm-3">
						<input type="date" name="date1" value="<?php echo $date1; ?>" class="form-control">
					</div>
					<div class="col-sm-3">
						<input type="date" name="date2" value="<?php echo $date2; ?>" class="form-control">
					</div>
					<div class="col-sm-6">
						<button type="submit" class="btn btn-info" name="search">Xem</button>
						<a href="javascript:void(0)" class="btn btn-default" onclick="window.print();" style="margin-top: 0px;">In</a>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="head-pr">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
				<p><b class="size1">Cửa hàng GIỐNG CÂY TRỒNG – PHƯƠNG THẢO</b></p>
				<p>Địa chỉ: số 285 Đường Trâu Quỳ, Huyện Gia Lâm, TP.Hà Nội</p>
				<p>Số điện thoại: 0982178595</p>
			</div>
				<div class="col-sm-6">
					<p class="text-right"><i><?php echo $date_now; ?></i></p>
				</div>
			</div>
			<div class="tieude">
				<p><b class="size1">THỐNG KÊ MẶT HÀNG BÁN CHẠY</b></p>
				<p><i>Từ ngày <?php echo date_format($date_fr1,"d/m/Y"); ?> đến ngày <?php echo date_format($date_fr2,"d/m/Y"); ?></i></p>
			</div>
		</div>
	</div>
	<div class="table">
		<form action="index.php?options=loaisanpham_list&action=delete" method="post" id="frdelete">
		<table class="table table-hover" width="100%">
			<thead>
			  	<tr>
			  		<td>STT</td>
			  		<td>Mã sản phẩm</td>
			  		<td>Tên sản phẩm</td>
			  		<td>Số lượng bán</td>
			  	</tr>
		  	</thead>
		  	<tbody>
		  	<?php
		  		$sql = "SELECT SUM(order_detail.Amount) as tongsl,order_detail.Tree_ID,tree.Tree_name FROM `order_detail` INNER JOIN `tree` ON order_detail.Tree_ID = tree.ID  INNER JOIN `order` ON order_detail.Order_ID = order.ID WHERE order.Date BETWEEN '$date1' AND '$date2' GROUP BY Tree_ID ORDER BY tongsl DESC LIMIT 0,20";
				$kq = mysqli_query($conn,$sql);
		  		if (mysqli_num_rows($kq)) {
		  			while ($row = mysqli_fetch_assoc($kq)) { $i++; 
		  	?>
		  	<tr>
				<td><?php echo $i; ?></td>
		  		<td><?php echo $row['Tree_ID']; ?></td>
		  		<td><?php echo $row['Tree_name']; ?></td>
		  		<td><?php echo $row['tongsl']; ?></td>
		  	</tr>
		  	<?php }}else{
		  		echo "Không có hóa đơn nào";
		  		} ?>
		  	</tbody>
			</table>
		</form>
	</div>
</div>
<?php 
	}else{ // else check quyền
		echo "<script> alert('Bạn không có quền truy cập trang này! Vui lòng quay lại!');";
		echo "location.href='index.php';</script>";
	}
?>
<style>
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
    text-align: left;
  }
</style>