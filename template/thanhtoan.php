<style>
	.infor .row{
		margin: 0px;
	}
	.infor .row>div{
		margin-top: 10px;
	}
	.thongbao{
		display: none;
	}
</style>
<?php
if (!isset($_SESSION['makh'])) {
	echo "<script>location.href='index.php?options=dangnhap';</script>";
}
else
{
	$makh = $_SESSION['makh'];
	$sql 	= "SELECT cart.*,tree.Tree_name,tree.Price,tree.sale FROM cart INNER JOIN tree ON cart.Tree_ID = tree.ID WHERE User_ID = ".$_SESSION['makh'];
	$query  = mysqli_query($conn,$sql);
	$i 			= 0;
	$tongtien   = 0;
	$sql1	 = "SELECT * FROM user WHERE ID = ".$_SESSION['makh'];
	$query1  = mysqli_query($conn,$sql1);
	
	
?>
<div class="section order_detail">
	<div class="container">
		<div class="post">
			<div class="title">
				<a href="index?options=trangchu"><span>Trang chủ </span></a><i class="fas fa-chevron-right"></i>
				<span> Thanh toán </span>
			</div>
			<h3>Thông tin đơn hàng</h3>
			<div class="infor">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên sản phẩm</th>
							<th>Số lượng</th>
							<th>Đơn giá bán</th>
							<th>Thành tiền</th>
						</tr>
					</thead>
					<tbody>
						<?php if (mysqli_num_rows($query)): ?>
							<?php while($result = mysqli_fetch_assoc($query)) :
								$sp[] = $result;
								$i++;
								if ($result['sale'] > 0) {
									$dongia    = $result['Price'] - $result['Price']*$result['sale']/100;
									$thanhtien = $dongia * $result['Amount'];
								}
								else
								{	
									$thanhtien = $result['Price'] * $result['Amount'];
								}

								$tongtien += $thanhtien;
							?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $result['Tree_name']; ?></td>
									<td><?php echo $result['Amount']; ?></td>
									<td><?php echo number_format($result['Price']); ?></td>
									<td><?php echo number_format($thanhtien); ?></td>
								</tr>
							<?php endwhile ?>
								<tr>
									<th colspan="3"></th>
									<th><b>Tổng tiền</b></th>
									<th><b><?php echo number_format($tongtien); ?></b></th>
									<?php $_SESSION['tongtien'] = $tongtien; ?>
								</tr>
						<?php endif ?>
					</tbody>
				</table>
				<form method="post" action="?options=thanhtoan&action=thanhtoan">
					<div class="row">
						<h3>Thông tin khách hàng</h3>
						<?php if (mysqli_num_rows($query)): ?>
							<?php while($ttkh = mysqli_fetch_assoc($query1)) : ?>
								<div class="col-xs-3"><b>Tên khách hàng:</b> </div>
								<div class="col-xs-9"><?php echo $ttkh['Name']; ?></div>
								<div class="col-xs-3"><b>Địa chỉ:</b> </div>
								<div class="col-xs-9"><?php echo $ttkh['Address']; ?></div>
								<div class="col-xs-3"><b>Số điên thoại:</b> </div>
								<div class="col-xs-9"><?php echo $ttkh['Phone']; ?></div>
								<div class="col-xs-3"><b>Email:</b> </div>
								<div class="col-xs-9"><?php echo $ttkh['email']; ?></div>
							<?php endwhile ?>
						<?php endif ?>
							<div class="col-md-3"><b>Ghi chú giao hàng: </b></div>
							<div class="col-md-9">
								<textarea rows="4" cols="50" type="text" class="form-control" id="ghichu" name="ghichu"></textarea>
							</div>
					</div>
					<div class="row">
						<h3>Phương Thức Thanh Toán</h3>
						<div class="col-xs-12 col-sm-12 col-md-12">
							
								<div class="radio">
									<label>
										<input type="radio" name="pttt" id="blankRadio1" value="thanh toán khi giao hàng">Thanh toán khi giao hàng
									</label>
									<br>
									<br>
									<label>
										<input type="radio" name="pttt" id="blankRadio2" value="thanh toán chuyển khoản">Chuyển khoản ngân hàng
									</label>
									<p>Nếu thanh toán chuyển khoản, quý khách vui lòng chuyển khoản trước.</p>
									<p>Tên tài khoản: Trần Phương Thảo</p>
									<p>Số tài khoản: 03125611400</p>
									<p>Ngân hàng Vietcombank, chi nhánh Long Biên</p>
								</div>
								
								<button class="btn ht" type="submit">Hoàn tất</button>
								<a class="btn" href="?options=thanhtoan&action=huydon">Huy đơn hàng</a>
								<a class="btn" href="?options=giohang">Quay lại</a>
						</div>
					</div>
				</form>
			</div>
		</div>
		
		<div class="thongbao">
			<h3>Bạn vừa tạo thành công đơn hàng.</h3>
			<h3>Chúng tôi sẽ liên hệ với bạn để xác nhận. Xin cảm ơn!</h3>
		</div>
	</div>
</div>



<?php
	if (isset($_GET['action'])) {
		if ($_GET['action'] === "thanhtoan")
		{
			$pttt      = $_POST["pttt"];
			$ghichu      = $_POST["ghichu"];
			$trangthai = "Chờ xét duyệt";
			$ngaylaphd = date('Y-m-d');

			$sql = "INSERT INTO `order`(`ID`, `User_ID`, `Date`, `Total_money`, `Payment`, `Status`, `note`) VALUES ('','$makh','$ngaylaphd','$tongtien','$pttt','$trangthai','$ghichu')";
					
			$ck  = mysqli_query($conn,$sql);
			
			
			//$ck = true;
			if ($ck)
			{
				// lấy mã hóa đơn bán vừa tạo
				$query = mysqli_query($conn,"SELECT MAX(ID) as ma FROM `order` WHERE User_ID = ".$makh);
				$mahdb = mysqli_fetch_assoc($query);

				foreach ($sp as $row) 
				{
					if ($row['sale'] > 0) 
					{
						$dongiaban = $row['Price'] - $row['Price'] * $row['sale']/100;
					}
					else
					{
						$dongiaban = $row['Price'];
					}
					$thanhtien = $row['Amount'] * $dongiaban;
					$values[]  = "('".$mahdb['ma']."','".$row['Tree_ID']."','".$row['Amount']."','".$dongiaban."','".$thanhtien."')";
					
				}
				$values = implode(", ", $values);
				$sql = "INSERT INTO `order_detail`(`Order_ID`, `Tree_ID`, `Amount`, `Price`, `Sum_money`) VALUES $values";
				$query = mysqli_query($conn,$sql);

				if ($query) 
				{
					// xóa giỏ hàng
					$sql = "DELETE FROM `cart` WHERE User_ID = $makh ";
					$query = mysqli_query($conn,$sql);
					echo "<script>alert('Tạo đơn hàng thành công!');location.href='index.php?options=thanhtoan&action=thanhcong';</script>";
				}
				else
				{
					echo "<script>alert('Lỗi');location.href='index.php?options=giohang';</script>";
				}
			}
			else
			{
				echo "<script>alert('Lỗi cập nhật giỏ hàng');location.href='index.php?options=giohang';</script>";
			}
		}

		if ($_GET['action'] === "huydon")
		{
			$sql = "DELETE FROM `cart` WHERE User_ID = $makh ";
			$query = mysqli_query($conn,$sql);
			echo "<script>alert('Hủy thành công');location.href='index.php?options=giohang';</script>";
		}
		if ($_GET['action'] === "thanhcong")
		{
			echo "<script>
					$(document).ready(function(){
					   $('.post').css('display', 'none');
					   $('.thongbao').css('display', 'block');
					});
				</script>";
		}
	}
} //end if check logged
?>

