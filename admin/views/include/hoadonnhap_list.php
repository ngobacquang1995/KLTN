
<div class="maintb">
	<div class="head">
		<div class="row search">
		  <div class="col-xs-6">
		  	<h2 class="title">Danh sách hóa đơn nhập</h2>
		  </div>
		  <div class="col-xs-6 head-right">
		    <a href="?options=nhacungcap_list" class="btn btn-success" role="button">Danh Sách NCC</a>
		    <a href="?options=hoadonnhap_add" class="btn btn-success" role="button">Thêm Hóa Đơn Nhập</a>
		  </div>
		</div>
	</div>
	<div class="table">
		<form action="index.php?options=hoadonnhap_list&action=delete" method="post" id="frdelete">
			<table class="table table-hover">
				<thead>
				<tr>
					<td>Mã hóa đơn</td>
					<td>Tên nhân viên</td>
					<td>Tên NCC</td>
					<td>Ngày lập</td>
					<td>Tổng tiền</td>
					<td>Xem CT</td>
					<td>Sửa</td>
					<td>Xóa</td>
				</tr>
				</thead>
				<tbody>
				<?php
					$sql = "SELECT receipt.*,managers.Name,supplier.* FROM receipt INNER JOIN managers ON receipt.Manager_ID=managers.ID INNER JOIN supplier ON receipt.Supplier_ID=supplier.ID_Supplier ORDER BY ID_receipt DESC ";
					$kq = mysqli_query($conn,$sql);
					if (mysqli_num_rows($kq)) {
						while ($row = mysqli_fetch_assoc($kq)) {
				?>
				<tr>
					<td data-toggle="modal" data-target="#hdn<?php echo $row['ID_receipt'] ?>"><?php echo $row['ID_receipt']; ?></td>
					<td data-toggle="modal" data-target="#hdn<?php echo $row['ID_receipt'] ?>"><?php echo $row['Name']; ?></td>
					<td data-toggle="modal" data-target="#hdn<?php echo $row['ID_receipt'] ?>"><?php echo $row['Supplier_name']; ?></td>
					<td data-toggle="modal" data-target="#hdn<?php echo $row['ID_receipt'] ?>"><?php echo $row['Date']; ?></td>
					<td data-toggle="modal" data-target="#hdn<?php echo $row['ID_receipt'] ?>"><?php echo number_format($row['Sum_money']); ?></td>
					<td>
						<a href="?options=cthoadonnhap_list&mahdnhap=<?php echo $row['ID_receipt']; ?>" title="Xem chi tiết hóa đơn nhập."><i class="material-icons">dashboard</i></a>
					</td>
					<td>
						<a href="?options=hoadonnhap_edit&mahdn=<?php echo $row['ID_receipt']; ?>" title="Chỉnh sửa hóa đơn nhập có mã [<?php echo $row['ID_receipt'] ?>]"><i class="material-icons">edit</i></a>
					</td>
					<td>
						<a href="#" onClick="if(confirm('Bạn có chắc chắn muốn xóa hóa đơn có mã là [<?php echo $row['ID_receipt'];?>] không?')){ location.href='?options=hoadonnhap_list&action=delete&mahdn=<?php echo $row['ID_receipt'];?>'}" title="Xóa hóa đơn nhập có mã [<?php echo $row['ID_receipt'] ?>]"><i class="material-icons">delete</i></a>
					</td>
				</tr>
						<!-- Modal -->
					<div class="modal fade in" id="hdn<?php echo $row['ID_receipt'] ?>" role="dialog">
						<div class="modal-dialog">
						  <div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Thông tin hóa đơn nhập</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>
							<div class="modal-body sp">
								<div class="row">
									<label for="description" class="col-sm-5 control-label">Mã hóa đơn nhập</label>
									<div class="col-sm-7">
										<span><?php echo $row['ID_receipt'] ?></span>
									</div>
								</div>
								<div class="row">
									<label for="description" class="col-sm-5 control-label">Tên nhà cung cấp</label>
									<div class="col-sm-7">
										<span><?php echo $row['Supplier_name'] ?></span>
									</div>
								</div>
								<div class="row">
									<label for="description" class="col-sm-5 control-label">Tên nhân viên lập</label>
									<div class="col-sm-7">
										<span><?php echo $row['Name'] ?></span>
									</div>
								</div>
								<div class="row">
									<label for="description" class="col-sm-5 control-label">Ngày lập hóa đơn</label>
									<div class="col-sm-7">
										<span><?php echo $row['Date'] ?></span>
									</div>
								</div>
								<div class="row">
									<label for="description" class="col-sm-5 control-label">Tổng tiền</label>
									<div class="col-sm-7">
										<span><?php echo number_format($row['Sum_money']) ?></span>
									</div>
								</div>
							</div>
							<div class="modal-footer">
							  <a href="?options=hoadonnhap_edit&mahdn=<?php echo $row['ID_receipt'] ?>" class="btn btn-default" type="submit">Chỉnh sửa</a>
							  <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
							</div>
						  </div>
						</div>
					</div>

				<?php }
				}else{
					echo "Không có hóa đơn nhập nào !";
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
			$mhdnc = $_GET['mahdn'];
			
			$sql2 = "DELETE FROM receipt_detail WHERE Receipt_ID=$mhdnc";
			mysqli_query($conn,$sql2);
			$sql = "DELETE FROM receipt WHERE ID_receipt = $mhdnc";
			$check = mysqli_query($conn,$sql);
			if ( $check) {
				echo "<script> alert('Xóa dữ liệu thành công');";
				echo "location.href='?options=hoadonnhap_list';</script>";
			}else{
				echo "<script> alert('Xóa dữ liệu không thành công');<script>";
			}
		}
	}
?>

