<div class="maintb">
	<div class="head">
		<div class="row search">
		  <div class="col-xs-6">
		  	<h4>Danh sách hóa đơn bán</h4>
		  </div>
		  <div class="col-xs-6 head-right">
		    <a href="?options=hoadonban_add" class="btn btn-success" role="button">Thêm HDB</a>
		  </div>
		</div>
	</div>
	<div class="table">
	<form action="index.php?options=hoadonban_list&action=delete" method="post" id="frdelete">
		<table class="table table-hover">
			<thead>
		  	<tr>
		  		<td>Mã hóa đơn</td>
		  		<td>Tên nhân viên</td>
		  		<td>Tên khách hàng</td>
		  		<td>Ngày lập</td>
		  		<td>Tổng tiền</td>
		  		<td>Phương thức thanh toán</td>
		  		<td>Trạng thái</td>
		  		<td>Xem CT</td>
		  		<td>Sửa</td>
		  		<td>Xóa</td>
		  	</tr>
		  	</thead>
		  	<tbody>
		  	<?php
		  		

		  		$sql = "SELECT * FROM `order` ORDER BY ID DESC";
				
				$kq = mysqli_query($conn,$sql);
		  		if (mysqli_num_rows($kq)) {
		  			while ($row = mysqli_fetch_assoc($kq)) {
						
						$manv = $row['Manager_ID'];
						$makh = $row['User_ID'];
						$date = $row['Date'];
						$total_money = $row['Total_money'];
						$payment = $row['Payment'];
						$status = $row['Status'];
		  	?>
		  	<tr>
		  		<td data-toggle="modal" data-target="#hdb<?php echo $row['ID'] ?>"><?php echo $row['ID']; ?></td>
		  		<td data-toggle="modal" data-target="#hdb<?php echo $row['ID'] ?>">
				<?php 
					if($manv == ''){
						echo 'abc';
					}else{
						$sqlnv = "SELECT * FROM `managers` WHERE `ID` = $manv";
						$kqnv = mysqli_query($conn,$sqlnv);
						while ($rownv = mysqli_fetch_assoc($kqnv)) {
							echo $rownv['Name'];
						}
					}
				?></td>
		  		<td data-toggle="modal" data-target="#hdb<?php echo $row['ID'] ?>">
				<?php 
					
					$sqlkh = "SELECT * FROM `user` WHERE `ID` = $makh";
					$kqkh = mysqli_query($conn,$sqlkh);
					$rowkh = mysqli_fetch_assoc($kqkh);
						echo $rowkh['Name'];
					
				?></td>
		  		<td data-toggle="modal" data-target="#hdb<?php echo $row['ID'] ?>"><?php echo $date; ?></td>
		  		<td data-toggle="modal" data-target="#hdb<?php echo $row['ID'] ?>"><?php echo $total_money; ?></td>
		  		<td data-toggle="modal" data-target="#hdb<?php echo $row['ID'] ?>"><?php echo $payment; ?></td>
		  		<td data-toggle="modal" data-target="#hdb<?php echo $row['ID'] ?>"><?php echo $status; ?></td>
		  		<td>
		  			<a href="?options=cthoadonban_list&mahdban=<?php echo $row['ID']; ?>" title="Xem chi tiết hóa đơn bán."><i class="material-icons">dashboard</i></i></a>
		  		</td>
		  		<td>
		  			<a href="?options=hoadonban_edit&mahdb=<?php echo $row['ID']; ?>" title="Chỉnh sửa hóa đơn bán có mã [<?php echo $row['ID'] ?>]"><i class="material-icons">edit</i></a>
		  		</td>
				<td>
		  			<a href="#" onClick="if(confirm('Bạn có chắc chắn muốn xóa hóa đơn có mã là [<?php echo $row['ID'];?>] không?')){ location.href='?options=hoadonban_list&action=delete&mahdb=<?php echo $row['ID'];?>'}" title="Xóa hóa đơn nhập có mã [<?php echo $row['ID'] ?>]"><i class="material-icons">delete</i></a>
		  		</td>
		  	</tr>
				<!-- Modal -->
				<div class="modal fade in" id="hdb<?php echo $row['ID'] ?>" role="dialog">
					<div class="modal-dialog">
					  <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Thông tin hóa đơn bán</h4>
						</div>
						<div class="modal-body sp">
							<div class="row">
								<label for="description" class="col-sm-5 control-label">Họ và tên</label>
								<div class="col-sm-7">
									<span><?php echo $rowkh['Name']; ?></span>
								</div>
							</div>
							<div class="row">
								<label for="description" class="col-sm-5 control-label">Tên tài khoản</label>
								<div class="col-sm-7">
									<span><?php echo $rowkh['User_name']; ?></span>
								</div>
							</div>
							<div class="row">
								<label for="description" class="col-sm-5 control-label">Địa chỉ</label>
								<div class="col-sm-7">
									<span><?php echo $rowkh['Address']; ?></span>
								</div>
							</div>
							<div class="row">
								<label for="description" class="col-sm-5 control-label">Số điên thoại</label>
								<div class="col-sm-7">
									<span><?php echo $rowkh['Phone']; ?></span>
								</div>
							</div>
							<div class="row">
								<label for="description" class="col-sm-5 control-label">Ngày lập hóa đơn</label>
								<div class="col-sm-7">
									<span><?php echo $date; ?></span>
								</div>
							</div>
							<div class="row">
								<label for="description" class="col-sm-5 control-label">Ghi chú</label>
								<div class="col-sm-7">
									<span><?php echo $row['note']; ?></span>
								</div>
							</div>
							<div class="row">
								<label for="description" class="col-sm-5 control-label">Phương thức thanh toán</label>
								<div class="col-sm-7">
									<span><?php echo $payment; ?></span>
								</div>
							</div>
							<div class="row">
								<label for="description" class="col-sm-5 control-label">Tổng tiền</label>
								<div class="col-sm-7">
									<span><?php echo $total_money; ?></span>
								</div>
							</div>
						</div>
						<div class="modal-footer">
						  <a href="?options=hoadonban_edit&mahdb=<?php echo $row['ID'] ?>" class="btn btn-default" type="submit">Chỉnh sửa</a>
						  <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
						</div>
					  </div>
					</div>
				</div>

		  	<?php }}else{
		  		echo "Không có hóa đơn nào !";
		  		} ?>
	  		</tbody>
		</table>
		</form>
	</div>
</div>
<?php 
	if (isset($_GET['action'])) {
		$action = $_GET['action'];

		// Nếu có hành động delete thì thực hiện
		if ($action == 'delete') 
		{
			$mhdb = $_GET['mahdb'];
			$sql2 = "DELETE FROM `order_detail` WHERE `Order_ID` = $mhdb";
			mysqli_query($conn,$sql2);
			$sql3 = "DELETE FROM `order` WHERE `ID` = $mhdb";
			$check = mysqli_query($conn,$sql3);
			if($check) {
				echo "<script> alert('Xóa dữ liệu thành công');";
				echo "location.href='?options=hoadonban_list';</script>";
			}else{
				echo "<script> alert('Xóa dữ liệu không thành công');<script>";
			}
			
			
		}
	}
?>