<?php
// Kiểm tra xem có tài khoản không

$soluong = 0;
if (isset($_SESSION['makh'])) 
{	
	$makh  = $_SESSION['makh'];
	$sql = "SELECT Tree_ID FROM `cart` WHERE User_ID = '$makh'";
	$kq = mysqli_query($conn,$sql);
	$tt = mysqli_num_rows($kq);
	if (count($tt) == 0) {
		echo "<script>alert('Tài khoản hoặc mật khẩu không đúng');</script>";
	
	}else{
		$soluong = $tt;
	}
}

?>


<div class="container-fluid top-fixd">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-3">
				<div class="logo-phuongthao">
					<a href="?options=home"><img src="images/logo_PT.png"></a>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
				<form class="input-group " method="POST" action="index.php?options=lsp&action=search" id="main-search">
					<input type="text" class="field-no-border input-s" name="timkiem" placeholder="Từ khóa">
					<input type="hidden" name="search" value="cay">
					<div class="input-group-append">
					  <button class="search-submit bg_transparent float-right field-no-border" type="submit" name="btnSearch" value="search"><i class="fa fa-search font20"></i></button>
					</div>
				</form>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-4">
				<ul class="list_option f-left contac-company">
					<li>
						<a href="#"><i class="fas fa-envelope"></i>support.com</a>
					</li>
					<li>
						<a href="#"><i class="fas fa-phone-volume"></i>0342.995.395</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<nav class="navbar navbar-inverse desktop" data-spy="affix" data-offset-top="97">
	<div class="container">
		<div class="menumenu-container">
			<div class="menu-bar">
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li class="nav-item home"><a class="nav-link" href="?options=home">Trang Chủ</a></li>
						<li class="nav-item category dropdown">
							<a class="nav-link" href="?options=category">
								Cây
							</a>
							<div class="dropdown-menu">
								<div class="container">
									<div class="wapper">
										<div class="row">
										<?php
										$sql = "SELECT * FROM `category`";
											$query = mysqli_query($conn,$sql);
											while($result = mysqli_fetch_assoc($query)){
												?>
												<div class="col-sm-12 col-md-3">
													<div class="content">
														<a href="?options=lsp&action=lsp&id=<?php echo $result['ID']; ?>"><?php echo $result['Category_name'] ?></a>
													</div>
												</div>
												<?php
											}
										?>
											
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item lienhe"><a class="nav-link" href="?options=lienhe">Liên hệ</a></li>
					</ul>
				</div>
			</div>
			<div class="contai-navba-top">
				<div class="cart-form">
					<a href="?options=giohang"><i class="fa fa-shopping-cart" aria-hidden="true"><span class="amount"><?php echo $soluong; ?></span></i></a>
				</div>
				<div class="curent-user">
					<?php
					// if logged then show user
					if (isset($_SESSION['name_kh'])) 
					{ ?>
						<span class="dropdown">
						    <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-tie"></i></a>
					    	<ul class="dropdown-menu">
					            <li><a href="?options=tttk">Thông tin tài khoản</a></li>
					            <li><a href="?options=lsmuahang">Lịch sử mua hàng</a></li>
					            <li><a href="?options=dangxuat">Đăng xuất</a></li>
					        </ul>
						</span
					<?php }else{ ?>
						<a href="?options=dangnhap"><i class="fa fa-sign-in-alt"></i></a>
				<?php }	?>
				</div>
			</div>
		</div>
	</div>
</nav>
<!--navbar mobi-->
<nav class="navbar navbar-inverse mobi">
	<div class="navbar-list-bottom">
		<ul>
			<li class="active"><a href="home.php"><img class="logo" src="images/logo_PT.png"> <span>Trang Chủ</a></span></li>
			<li><a href="category.php"><i class="fas fa-list"></i> <span>Danh mục</span></a></li>
			<li><a href="#"><i class="fas fa-shopping-cart"></i> <span>Giỏ hàng</span></a></li>
			<li><a href="#"><i class="fas fa-user"></i> <span>Tài khoản</span></a></li>
		</ul>
	</div>
</nav>
<div class="section-fluid">
</div>

<!--kiểm tra active-->
<?php 
if(isset($_GET['options'])){
$ck=$_GET['options']; 

?>
<script>
	$('.navbar .navbar-nav .nav-item.<?php echo $ck; ?>').addClass('activee');
</script>
<?php 
}else { 
?>
<script>
	$('.navbar .navbar-nav .nav-item.home').addClass('activee');
</script>
<?php
}
?>
<!--kết thúc-->