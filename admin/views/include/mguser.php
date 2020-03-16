<?php 
	if ($quyen == 1) {// Nếu là admin mới được phép truy cập
?>

<div class="maintb">
	<div class="head">
		<div class="row search">
		  <div class="col-xs-6">
		  	<h4>Danh sách nhân viên</h4>
		  </div>
		  <div class="col-xs-6 head-right">
		    <a href="?options=nhanvien_add" class="btn btn-success" role="button">Thêm nhân viên</a>
		  </div>
		</div>
	</div>
	<div class="table">
		<table class="table table-hover">
			<thead>
		  	<tr>
		  		<td>Mã nhân viên</td>
		  		<td>Tên nhân viên</td>
		  		<td>Tài khoản</td>
		  		<td>Email</td>
		  		<td>Quyền</td>
		  		<td>Trạng thái</td>
		  		<td>Thao tác</td>
		  	</tr>
		  	</thead>
		  	<tbody>
		  	<?php
		  		$sql = "select * from nhanvien ORDER BY manv DESC";
				$kq = mysqli_query($conn,$sql);
		  		if (mysqli_num_rows($kq)) {
		  			while ($row = mysqli_fetch_assoc($kq)) {
			  			$manv=$row['manv'];
		  				$sql1="SELECT * FROM `quantri` WHERE manv = $manv";
		  				$kq1 = mysqli_query($conn,$sql1);
				  		$row1 = mysqli_fetch_assoc($kq1);
		  	?>
		  	<tr>
		  		<td data-toggle="modal" data-target="#manv<?php echo $row['manv'] ?>"><?php echo $row['manv']; ?></td>
		  		<td data-toggle="modal" data-target="#manv<?php echo $row['manv'] ?>"><?php echo $row['tennv']; ?></td>
		  		<td>
					<?php 
						if ($row1['taikhoan'] != "") {
							echo $row1['taikhoan'];
						}else{ ?>
							<a href="?options=taotaikhoan&manv=<?php echo $manv; ?>" class="btn btn-success" role="button">Tạo tài khoản</a>
						<?php }
					?>
		  		</td>
		  		<td data-toggle="modal" data-target="#manv<?php echo $row['manv'] ?>"><?php echo $row['email']; ?></td>
		  		<td>
					<select name="quyen"  onChange="location.href='?options=nhanvien_list&action=editquyen&manv=<?php  echo $row1['manv'];?>&quyen='+this.value">
                        <?php 
                            if($row1['quyen']==0)
                            {
                        ?>
                            <option  value="1">Admin</option>
                            <option  value="0" selected>Nhân viên</option>
                         <?php
                            }else{
                         ?> 
                            <option  value="1" selected>Admin</option>
                            <option  value="0">Nhân viên</option>
                         <?php
                            }
                         ?> 
                    </select>
		  		</td>
		  		<td>
		  			<select name="trangthai"  onChange="location.href='?options=nhanvien_list&action=edittrangthai&manv=<?php  echo $row['manv'];?>&trangthai='+this.value">
                        <?php 
                            if($row1['trangthai']==0)
                            {
                        ?>
                            <option  value="1">Hiện</option>
                            <option  value="0" selected>Ẩn</option>
                         <?php
                            }else{
                         ?> 
                            <option  value="1" selected>Hiện</option>
                            <option  value="0">Ẩn</option>
                         <?php
                            }
                         ?> 
                    </select>
		  		</td>
		  		<td>
					<a href="?options=nhanvien_edit&manv=<?php echo $row['manv']; ?>" title="Chỉnh sửa nhân viên có mã [<?php echo $row['manv'] ?>]"><span class="glyphicon glyphicon-pencil"></span></a>
		  			<a href="#" onClick="if(confirm('Bạn có chắc chắn muốn xóa nhân viên có mã là [<?php echo $row['manv'];?>] không?')){ location.href='?options=nhanvien_list&action=del&manv=<?php echo $row['manv'];?>'}" title="Xóa nhân viên có mã [<?php echo $row['manv'] ?>]"><span class="glyphicon glyphicon-remove"></span></a>
		  		</td>
		  	</tr>
<!-- Modal -->
<div class="modal fade in" id="manv<?php echo $row['manv'] ?>" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
    	<div class="modal-header">
    		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Thông tin nhân viên</h4>
        </div>
        <div class="modal-body sp">
        	<div class="row">
        		<label for="description" class="col-sm-3 control-label">Mã nhân viên</label>
				<div class="col-sm-9">
					<span><?php echo $row['manv'] ?></span>
				</div>
        	</div>
        	<div class="row">
        		<label for="description" class="col-sm-3 control-label">Tài khoản</label>
				<div class="col-sm-9">
					<?php if ($row1['taikhoan'] != ''): ?>
						<span><?php echo $row1['taikhoan']; ?></span>
					<?php else : ?>
						<span>Chưa có tài khoản</span>
					<?php endif ?>
				</div>
        	</div>
        	<div class="row">
        		<label for="description" class="col-sm-3 control-label">Tên nhân viên</label>
				<div class="col-sm-9">
					<span><?php echo $row['tennv'] ?></span>
				</div>
        	</div>
        	<div class="row">
        		<label for="description" class="col-sm-3 control-label">Địa chỉ</label>
				<div class="col-sm-9">
					<span><?php echo $row['diachi'] ?></span>
				</div>
        	</div>
        	<div class="row">
        		<label for="description" class="col-sm-3 control-label">Số điện thoại</label>
				<div class="col-sm-9">
					<span><?php echo $row['sdt'] ?></span>
				</div>
        	</div>
        	<div class="row">
        		<label for="description" class="col-sm-3 control-label">Email</label>
				<div class="col-sm-9">
					<span><?php echo $row['email'] ?></span>
				</div>
        	</div>
        	<div class="row">
        		<label for="description" class="col-sm-3 control-label">Giới tính</label>
				<div class="col-sm-9">
					<span><?php echo $row['gioitinh'] ?></span>
				</div>
        	</div>
        	<div class="row">
        		<label for="description" class="col-sm-3 control-label">Ngày sinh</label>
				<div class="col-sm-9">
					<span><?php echo $row['ngaysinh'] ?></span>
				</div>
        	</div>
        </div>
        <div class="modal-footer">
          <a href="?options=nhanvien_edit&manv=<?php echo $row['manv']; ?>" class="btn btn-default" type="submit">Chỉnh sửa</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
</div>
		  	<?php }}else{
		  		echo "Không có nhân viên nào";
		  		}?>
	  		</tbody>
		</table>
	</div>
</div>
<?php 
	if (isset($_GET['action'])) {
		$action = $_GET['action'];
		if ($action == 'del') {
			$manv = $_GET['manv'];

			$sql1="SELECT * FROM `quantri` WHERE manv = $manv";
			$kq1 = mysqli_query($conn,$sql1);
	  		$row1 = mysqli_fetch_assoc($kq1);
	  		if (count($row1) != 0) {
	  			$sql = "DELETE FROM quantri WHERE manv = $manv";
				$kq = mysqli_query($conn,$sql);
	  		}

			$sql = "DELETE FROM nhanvien WHERE manv = $manv";
			$check = mysqli_query($conn,$sql);
			if ( $check) {
				echo "<script> alert('Xóa dữ liệu thành công');";
				echo "location.href='?options=nhanvien_list';</script>";
			}else{
				echo "<script> alert('Xóa dữ liệu không thành công');<script>";
			}
		}

		if ($action == 'edittrangthai') {
			$manv = $_GET['manv'];
			$trangthai = $_GET['trangthai'];
			$sql = "UPDATE quantri SET trangthai = $trangthai WHERE manv=$manv";
			$check = mysqli_query($conn,$sql);
				if ( $check) {
					echo "<script> alert('Cập nhật dữ liệu thành công');";
					echo "location.href='?options=nhanvien_list';</script>";
				}else{
					echo "<script> alert('Cập nhật dữ liệu không thành công');<script>";
				}
			//echo $sql;
		}

		if ($action == 'editquyen') {
			$manv = $_GET['manv'];
			$quyen = $_GET['quyen'];
			$sql = "UPDATE quantri SET quyen = '$quyen' WHERE manv='$manv'";
			$check = mysqli_query($conn,$sql);
			if ( $check) {
				echo "<script> alert('Cập nhật dữ liệu thành công');";
				echo "location.href='?options=nhanvien_list';</script>";
			}else{
				echo "<script> alert('Cập nhật dữ liệu không thành công');<script>";
			}
		}
	}
?>

<?php 
	}else{ // else check quyền
		echo "<script> alert('Bạn không có quền truy cập trang này! Vui lòng quay lại!');";
		echo "location.href='index.php';</script>";
	}
?>