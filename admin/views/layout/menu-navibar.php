<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
	<div class="logo">
	   <a href="?options=home.admin" class="simple-text logo-normal">
	   Trang quản lý
	   </a>
	</div>
	<div class="sidebar-wrapper">
		<ul class="nav">
			<?php 
				if ($quyen == 1) {  //kiểm tra nếu quyền = 1 thì hiển thị
			?>
			<li class="nav-item ">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons">person</i> Quản lý tài khoản <span class="caret"></span></a>
				<ul class="dropdown-menu">
	            	<li><a href="?options=khachhang_list">Quản lý khách hàng</a></li>
	            	<li><a href="?options=nhanvien_list">Quản lý nhân viên</a></li>
	            </ul>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="?options=sanpham_list">
					<i class="material-icons">content_paste</i>
					<p>Quản lý thông tin cây</p>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="?options=nhacungcap_list">
					<i class="material-icons">group</i>
					<p>Quản lý nhà cung cấp</p>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="?options=hoadonnhap_list">
					<i class="material-icons">bubble_chart</i>
					<p>Quản lý nhập</p>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="?options=hoadonban_list">
					<i class="material-icons">dashboard</i>
					<p>Quản lý đơn hàng</p>
				</a>
			</li>
			<li class="nav-item ">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons">library_books</i> THỐNG KÊ - BÁO CÁO <span class="caret"></span></a>
				<ul class="dropdown-menu">
	            	<li><a href="?options=tk_doanhthu">DOANH THU</a></li>
	            	<li><a href="?options=tkmhbanchay">MẶT HÀNG BÁN CHẠY</a></li>
	            	<li><a href="?options=tk_hangton">HÀNG TỒN</a></li>
	            </ul>
			</li>
			<?php 
			}else {
			?>
			<li class="nav-item ">
				<a class="nav-link" href="?options=sanpham_list">
					<i class="material-icons">content_paste</i>
					<p>Quản lý thông tin cây</p>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="?options=hoadonnhap_list">
					<i class="material-icons">bubble_chart</i>
					<p>Quản lý nhập</p>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="?options=hoadonban_list">
					<i class="material-icons">dashboard</i>
					<p>Quản lý đơn hàng</p>
				</a>
			</li>
			<?php
			}
			?>
		</ul>
	</div>
</div>