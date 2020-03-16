<?php
	$date_now = date("d/m/y h:i:s A");
	$day = date('d-m-Y');
	$i=0;
	$tong = 0;
?>

<div class="maintb">
	<div class="head">
		<div class="row search rpt">
			<a href="javascript:void(0)" class="btn btn-default" onclick="window.print();">In</a>
		</div>
	</div>
	<div class="head-pr">
		<div class="row">
			<div class="col-md-6">
				<p><b class="size1">Cửa hàng GIỐNG CÂY TRỒNG – PHƯƠNG THẢO</b></p>
				<p>Địa chỉ: số 285 Đường Trâu Quỳ, Huyện Gia Lâm, TP.Hà Nội</p>
				<p>Số điện thoại: 0982178595</p>
			</div>
			<div class="col-md-6 right">
				<i><span>Thống kê hàng tồn ngày&nbsp;&nbsp;</span><?php echo $date_now; ?></i>
			</div>
		</div>
		<div class="tieude">
			<p><b class="size1">THỐNG KÊ HÀNG TỒN</b></p>
			<p><i>Ngày <?php echo $day; ?></i></p>
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
						<td>Số lượng</td>
					</tr>
				</thead>
				<tbody>
				<?php
					$sql = "SELECT * FROM tree";
					$kq = mysqli_query($conn,$sql);
					$i=1;
					if (mysqli_num_rows($kq)) {
						while ($row = mysqli_fetch_assoc($kq)) { 
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $row['ID']; ?></td>
					<td><?php echo $row['Tree_name']; ?></td>
					<td><?php echo $row['Amount']; ?></td>
				</tr>
				<?php
					$i++;
					}}
					else{
					echo "Không có hóa đơn nào";
					} ?></tbody>
				
			</table>
		</form>
	</div>
</div>
<style>
	.title-rpt{
		display: none;
	}
	.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
    	text-align: left;
  	}
</style>