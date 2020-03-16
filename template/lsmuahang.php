<?php
if (!isset($_SESSION['makh'])) {
	echo "<script>location.href='index.php?options=dangnhap';</script>";
}



$sql	= "SELECT * FROM `order` WHERE `User_ID` =".$_SESSION['makh']."";
$query  = mysqli_query($conn,$sql);
$i=0;
?>
<div class="section">
	<div class="container">
		<div class="post">
			<div class="title">
				<a href="?options=trangchu"><span>Trang chủ </span></a>/
				<span> Lịch sử mua hàng </span>
			</div>
			<div class="infor">
				<?php if (mysqli_num_rows($query)): ?>
				<?php while($hdb = mysqli_fetch_assoc($query)): $i++; ?>
				<?php if ($hdb['Status'] != 'Hoàn thành'){ ?>
				<p>Mã hóa đơn: <?php echo $hdb['ID']; ?>&nbsp;&nbsp;&nbsp;&nbsp; Ngày lập hóa đơn : <?php echo $hdb['Date']; ?>&nbsp;&nbsp;&nbsp;&nbsp; Trạng thái: <?php echo $hdb['Status']; ?></p>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Tên sản phẩm</th>
							<th>Số lượng</th>
							<th>Đơn giá bán</th>
							<th>Thành tiền</th>
						</tr>
					</thead>
					<tbody>
						
									<?php
										$sql1  = "SELECT order_detail.*,tree.Tree_name FROM `order_detail` INNER JOIN `tree` ON order_detail.Tree_ID = tree.ID WHERE Order_ID = ".$hdb['ID'];
										$query1 = mysqli_query($conn,$sql1);
										
										if (mysqli_num_rows($query1)) 
										{
											while ($cthd = mysqli_fetch_assoc($query1)) { ?>
												<tr>
													<td><?php echo $cthd['Tree_name']; ?></td>
													<td><?php echo $cthd['Amount']; ?></td>
													<td><?php echo number_format($cthd['Price']); ?></td>
													<td><?php echo number_format($cthd['Sum_money']); ?></td>
												</tr>
											<?php }
										}
										
										else
										{ ?>
											<td colspan="5" style="text-align:center"><b>Không có sản phẩm nào</b></td>
										<?php } 
									?>
								<tr>
									<td colspan="3" style="text-align:center"><b>Tổng tiền: </b></td>
									<td style="color: #ff9900"><b><?php echo number_format($hdb['Total_money']); ?></b></td>
								</tr>
							
					</tbody>
				</table>
				<br>
				<?php 
				}
				endwhile ?>
						<?php else : ?>
							Không có hóa đơn nào
						<?php endif ?>
			</div>
	
		</div>
	</div>
</div>
<?php  //end if check logged ?>