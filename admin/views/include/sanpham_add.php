
<?php 
	if (isset($_POST['add'])) {
		$masp=$_REQUEST['masp'];
		$tensp=$_REQUEST['tensp'];
		$malsp=$_REQUEST['malsp'];
		$dongiaban=$_REQUEST['dongiaban'];
		$soluong=$_REQUEST['soluong'];
		$mota=$_REQUEST['mota'];
		$chitiet=$_REQUEST['chitiet'];
		$giam_gia=$_REQUEST['giam_gia'];
		$link_img="";
		// kiểm tra đã có sản phẩm này chưa
		$ck    = false;
		$sql   = "select * from tree";
		$query = mysqli_query($conn,$sql);
		if (mysqli_num_rows($query)) 
		{
			while ($row = mysqli_fetch_assoc($query)) 
			{
				if ($row['ID'] == $masp) {
					$ck = true;
				}
			}
		} 

		if ($tensp == "" || $malsp == ""  || $dongiaban == "" || $mota == "" || $giam_gia == "" || $chitiet == "") {
			echo "<script> alert('Bạn cần nhập đủ dữ liệu!!!');</script>";
		}elseif($ck){
			echo "<script> alert('Đã có sản phẩm thuộc mã này!');</script>";
		}elseif($_FILES['img']['size'] == ""){
			$sql = "INSERT INTO tree(ID,Category_ID,Tree_name,Image,Infor,Amount,Price,sale,Description) VALUES( '$masp', '$malsp','$tensp','$link_img','$chitiet','$soluong','$dongiaban','$giam_gia','$mota')";
			$kq = mysqli_query($conn,$sql);
			if ($kq) {
				 echo "<script> alert('Thêm mới dữ liệu thành công');location.href='?options=sanpham_list';</script>";
			}else{
				echo "<script> alert('Lỗi thêm mới dữ liệu khi k có ảnh!!!');</script>";  
			}
			echo $sql;
		}else{
			$img = $_FILES['img']['name'];
			$link_img = "".$img;
			move_uploaded_file($_FILES['img']['tmp_name'], "upload/".$img);

			$sql = "INSERT INTO tree(ID,Category_ID,Tree_name,Image,Infor,Amount,Price,sale,Description) VALUES( '$masp', '$malsp','$tensp','$link_img','$chitiet','$soluong','$dongiaban','$giam_gia','$mota')";
			$kq = mysqli_query($conn,$sql);
			
			if ($kq) {
				 echo "<script> alert('Thêm mới dữ liệu thành công');location.href='?options=sanpham_list';</script>";
			}else{
				echo "<script> alert('Lỗi thêm mới dữ liệu!!!');</script>";  
			}
		}
	}
?>
<div class="maintb">
	<div class="head">
		<div class="row search">
		  <div class="col-md-4"><h4>Thêm mới sản phẩm</h4></div>
		  <div class="col-md-8">
		  	<div class="navbar-right">
		  		<a href="?options=import" class="btn btn-success" role="button">Nhập file</a>
		  	</div>
		  </div>
		</div>
	</div>
	<div class="table">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-3"><label>Mã sản phẩm</label></div>
				<div class="col-md-9">
					<input  required type="text" class="form-control" id="masp" name="masp">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Tên sản phẩm</label></div>
				<div class="col-md-9">
					<input  required type="text" class="form-control" id="tensp" name="tensp">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Loại sản phẩm</label></div>
				<div class="col-md-9">
					<select name="malsp" id="malsp" class="form-control" style="width:200px">
						<option value=""><- Chọn Category -></option>
						<?php 
							$sql1 = "SELECT * FROM category";
							$kq1 = mysqli_query($conn,$sql1);
					  		if (mysqli_num_rows($kq1)) {
					  			while ($row1 = mysqli_fetch_assoc($kq1)){
					  				echo "<option value=".$row1['ID'].">".$row1['Category_name']."</option>";
					  			}
					  		}
						?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Đơn giá bán</label></div>
				<div class="col-md-9">
					<input  required type="number" class="form-control" id="dongiaban" name="dongiaban">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Số lượng</label></div>
				<div class="col-md-9">
					<input  required type="number" class="form-control" id="soluong" name="soluong">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Mô tả</label></div>
				<div class="col-md-9">
					<textarea rows="4" cols="50" type="text" class="form-control" id="mota" name="mota" ></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Chi tiết</label></div>
				<div class="col-md-9">
					<textarea id="mytextarea" name="chitiet"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><label>Giảm giá(%)</label></div>
				<div class="col-md-9">
					<input  required type="number" class="form-control" id="giam_gia" min="0" max="100" value="0" name="giam_gia">
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
					<button type="submit" class="btn btn-primary" name="add">Thêm mới</button>
					<button type="reset" class="btn btn-warning" onClick="location.href='?options=sanpham_list'">Quay lại</button>
				</div>
			</div>
		</form>
	</div>
</div>
