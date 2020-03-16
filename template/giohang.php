<?php
if (!isset($_SESSION['makh'])) {
	echo "<script>location.href='index.php?options=dangnhap';</script>";
}
else
{
	$tongtien = 0;
	$makh  = $_SESSION['makh'];
	$sql   = "SELECT cart.User_ID,cart.Tree_ID,cart.Amount,tree.Tree_name,tree.Image,tree.Price,tree.sale FROM cart INNER JOIN tree ON cart.Tree_ID = tree.ID WHERE User_ID = $makh";
	
	$query = mysqli_query($conn,$sql);
	
?>
<div class="section cart_detail">
	<div class="container">
		<div class="post">
			<div class="title">
				<a href="?options=home"><span>Trang chủ </span></a><i class="fas fa-chevron-right"></i>
				<span> Giỏ hàng </span>
			</div>
			<div class="infor">
			<?php if (mysqli_num_rows($query)): ?>
				<div class="cart-table">
					<table class="table table-striped table-bordered table-hover ">
						<thead>
							<tr class="head-order-info">
								<th class="product-thumbnail">
									<div>Cây</div>
								</th>
								<th class="product-price">
									<div>Giá</div>
								</th>
								<th class="product-quantity">
									<div>Số lượng</div>
								</th>
								<th class="product-subtotal">
									<div>Tổng</div>
								</th>
								<th class="product-remove">
									<div>Sửa</div>
								</th>
								<th class="product-remove">
									<div>Xóa</div>
								</th>
							</tr>
						</thead>
						<tbody>
						<?php while($result = mysqli_fetch_assoc($query)) : ?>
								<?php
									$sp[] = $result;
									// Nếu có giảm giá thì tính theo giá đã giảm
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
								<tr class="cart_item">

									<!-- The thumbnail -->
									<td class="product-thumbnail">
										<a href="?options=sanpham&id=<?php echo $result['Tree_ID']; ?>">
										<img width="146" height="150" alt="" class="attachment-shop_thumbnail wp-post-image" src="admin/upload/<?php echo $result['Image'] ?>">
										<span class="name"><?php echo $result['Tree_name']; ?></span>
										</a>
									</td>

									<!-- Product price -->
									<td class="product-price" data-toggle="modal" data-target="#edit<?php echo $result['Tree_ID']; ?>">
											<?php
												if ($result['sale'] > 0 ) {
													echo "<span class='giagoc'>".number_format($dongia);
												}
												else
												{
													echo number_format($result['Price']);
												}
											?>
									</td>

									<!-- Quantity inputs -->
									<td class="product-quantity" data-toggle="modal" data-target="#edit<?php echo $result['Tree_ID']; ?>">
										<div class="quantity">
											<span><?php echo $result['Amount']; ?></span>	
										</div>
									</td>


									<!-- Product subtotal -->
									<td class="product-subtotal" data-toggle="modal" data-target="#edit<?php echo $result['Tree_ID']; ?>">
										<span class="amount"><?php echo number_format($thanhtien); ?></span>
									</td>
									
									<!-- Edit from cart	 -->
									<td class="product-edit">
										<button type="button" class="btn" data-toggle="modal" data-target="#edit<?php echo $result['Tree_ID']; ?>"><i class="fas fa-edit"></i></button>
									</td>
									
									<!-- Remove from cart link -->
									<td class="product-remove">
										<a href="?options=giohang&action=delete&id=<?php echo $result['Tree_ID']; ?>" class="remove btn" title="Xóa sản phẩm này"><i class="fas fa-trash"></i></a>
									</td>
									
								</tr>
								
							<!-- modal edit -->
							<div class="modal fade in" id="edit<?php echo $result['Tree_ID']; ?>" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">×</button>
											<h4 class="modal-title">Cập nhật thông tin giỏ hàng</h4>
										</div>
										<form action="?options=giohang&action=edit" method="post">
											<div class="modal-body">
												<input type="hidden" name="masp" value="<?php echo $result['Tree_ID']; ?>">
												<div class="row">
													<label for="description" class="col-sm-3 control-label">Tên sản phẩm</label>
													<div class="col-sm-9">
														<span><?php echo $result['Tree_name'] ?></span>
													</div>
												</div>
												<div class="row">
													<label for="description" class="col-sm-3 control-label">Số lượng</label>
													<div class="col-sm-9">
														<input  required type="text" class="form-control" value="<?php echo $result['Amount'] ?>" name="soluong">
													</div>
												</div>
											</div>
											<div class="modal-footer">
											  <button class="btn btn-default" type="submit">Lưu</button>
											  <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- end edit -->
						<?php endwhile ?>
							<tr class="total">
								<td class="text-format-3" colspan="3">Tổng đơn hàng</td>
								<td class="text-format-4" colspan="3">
									<span class="amount total_money"><?php echo number_format($tongtien); ?>  VND</span> </td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="pull-right">
						<a href="index.php?options=thanhtoan" class="btn dh"> Đặt Hàng </a>
					</div>
				</div>
			</div>
		<?php else : ?>
				<h3>Không có sản phẩm nào</h3>
		<?php endif ?>
		</div>
	</div>
	
	
	
	
	
	

	
	<?php
		if (isset($_GET['action']))
		{
			if ($_GET['action'] === "add") 
			{
				$masp = $_POST['masp'];
				// Nếu có số lượng
				if (isset($_POST['soluong'])) 
				{
					$soluong = $_POST['soluong'];
				}
				else
				{
					$soluong = 1;
				}
				// Kiểm tra đã có sản phẩm đó trong giỏ hàng chưa, nếu có rồi thì cộng thêm số lượng
				$ck    = false;
				$sql2   = "SELECT * FROM cart WHERE User_ID = $makh";
				$query2 = mysqli_query($conn,$sql2);
				echo $sql2;
				if (mysqli_num_rows($query2))
				{
					while ($result = mysqli_fetch_assoc($query2))
					{
						if ($result['Tree_ID'] == $masp) 
						{
							$ck = true;
							$soluong = $soluong + $result['Amount'];
						}
					}
				}

				if ($ck) 
				{
					$sql = "UPDATE `cart` SET `Amount`=$soluong WHERE User_ID = $makh and Tree_ID = '$masp'";
					mysqli_query($conn,$sql);
					echo "<script>alert('Đã thêm vào giỏ hàng!');location.href='index.php?options=giohang';</script>";
				}
				else
				{
					$sql = "INSERT INTO `cart`(`User_ID`, `Tree_ID`, `Amount`) VALUES ('$makh','$masp','$soluong')";
					mysqli_query($conn,$sql);
					
					echo "<script>location.href='index.php?options=giohang';</script>";
				}
			} //end if check action add

			if ($_GET['action'] === "delete")
			{
				if (isset($_GET['id']))
				{
					if ($_GET['id'] != null)
					{
						$masp = $_GET['id'];
						$sql  = "DELETE FROM `cart` WHERE `User_ID` = $makh AND `Tree_ID` = '$masp'";
						$ck   =	mysqli_query($conn,$sql);
						if ($ck) 
						{
							echo "<script>location.href='index.php?options=giohang';</script>";
						}
						else
						{
							echo "<script>alert('Lỗi! Xóa không thành công!');location.href='index.php?options=giohang';</script>";
						}
					}
				}
				else
				{
					echo "<script>alert('Truy cập sai đường dẫn!');location.href='index.php?options=giohang';</script>";
				}
			}//end if action delete

			if ($_GET['action'] === "edit") 
			{
				$masp = $_POST['masp'];
				$soluong = $_POST['soluong'];

				$sql = "UPDATE `cart` SET `Amount`=$soluong WHERE Tree_ID = '$masp' AND User_ID = $makh";
				$ck   =	mysqli_query($conn,$sql);
				if ($ck) 
				{
					echo "<script>location.href='index.php?options=giohang';</script>";
				}
				else
				{
					echo "<script>alert('Lỗi!');location.href='index.php?options=giohang';</script>";
				}
			}
		}
	}
?>