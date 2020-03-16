
<?php 
	$masp_cu = $_GET['masp'];
	$sql = "select tree.*,category.Category_name from tree INNER JOIN category ON tree.Category_ID=category.ID where tree.ID = '$masp_cu'";
	$kq = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($kq);

	if (isset($_POST['edit'])) {
		$masp=$_REQUEST['masp'];
		$tensp=$_REQUEST['tensp'];
		$malsp=$_REQUEST['malsp'];
		$dongiaban=$_REQUEST['dongiaban'];
		$soluong=$_REQUEST['soluong'];
		$mota=$_REQUEST['mota'];
		$chitiet=$_REQUEST['chitiet'];
		$giam_gia=$_REQUEST['giam_gia'];
		$link_img= $row['Image'];

		if ($_FILES['img']['size'] != "") {
			$img = $_FILES['img']['name'];
			$link_img = $img;
		}
		$sql = "UPDATE tree SET ID='$masp',Category_ID='$malsp',Tree_name='$tensp',Image='$link_img',Infor='$chitiet',Amount='$soluong',Price='$dongiaban',sale='$giam_gia',Description='$mota' WHERE ID='$masp_cu'";
		$kq = mysqli_query($conn,$sql);
		if ($kq) {
			echo "<script> alert('Cập nhật dữ liệu thành công');location.href='?options=sanpham_list';</script>";  
		}else{
			echo "<script> alert('Lỗi sửa đổi dữ liệu!!!');</script>";  
		}
	}
?>

<div class="maintb">
	<div class="head">
		<h4>Sửa sản phẩm có mã [<?php echo $row['ID'] ?>]</h4>
	</div>
	<div class="table">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-3"><label>Mã sản phẩm</label></div>
				<div class="col-md-9">
					<input  required type="text" class="form-control" id="masp" name="masp" value="<?php echo $row['ID']; ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Tên sản phẩm</label></div>
				<div class="col-md-9">
					<input  required type="text" class="form-control" id="tensp" name="tensp" value="<?php echo $row['Tree_name']; ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Loại sản phẩm</label></div>
				<div class="col-md-9">
					<select name="malsp" id="malsp" class="form-control" style="width:200px">
						<?php 
							$sql1 = "select * from category";
							$kq1 = mysqli_query($conn,$sql1);
					  		if (mysqli_num_rows($kq1)) {
					  			while ($row1 = mysqli_fetch_assoc($kq1)){ ?>
					  				<option value="<?php echo $row1['ID'] ?>" <?php if($row['Category_ID'] == $row1['ID']) echo "selected"; ?> ><?php echo $row1['Category_name'] ?></option>
					  			<?php }
					  		}
						?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Đơn giá bán</label></div>
				<div class="col-md-9">
					<input  required type="number" class="form-control" id="dongiaban" name="dongiaban" value="<?php echo $row['Price']; ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Số lượng</label></div>
				<div class="col-md-9">
					<input  required type="number" class="form-control" id="soluong" name="soluong" value="<?php echo $row['Amount']; ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Mô tả</label></div>
				<div class="col-md-9">
					<textarea rows="4" cols="50" type="text" class="form-control" id="mota" name="mota" ><?php echo $row['Description']; ?></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Chi tiết</label></div>
				<div class="col-md-9">
					<textarea id="mytextarea" name="chitiet"><?php echo $row['Infor']; ?></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Giảm giá(%)</label></div>
				<div class="col-md-9">
					<input  required type="number" class="form-control" id="giam_gia" min="0" max="100" value="<?php echo $row['sale']; ?>" name="giam_gia">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Hình ảnh</label></div>
				<div class="col-md-9">
					<input type="file" id="img" name="img">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<button type="submit" class="btn btn-primary" name="edit">Cập nhật</button>
					<button type="reset" class="btn btn-warning" onClick="location.href='?options=sanpham_list'">Quay lại</button>
				</div>
			</div>
		</form>
	</div>
</div>
