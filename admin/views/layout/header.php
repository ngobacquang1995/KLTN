<?php 
	$sql = "SELECT * FROM managers WHERE managers.ID = '$manv' ";
	$kq = mysqli_query($conn,$sql);
	$tt = mysqli_fetch_assoc($kq);
?>
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
	<div class="container-fluid">
		<div class="navbar-wrapper">
			 <h2 class="name-user"> Xin chào <?php echo $tt['Name']; ?></h2>
		</div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="sr-only">Toggle navigation</span>
		  <span class="navbar-toggler-icon icon-bar"></span>
		  <span class="navbar-toggler-icon icon-bar"></span>
		  <span class="navbar-toggler-icon icon-bar"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end">
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a class="nav-link avarta" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  <img src="upload/<?php echo $tt['Avarta']; ?>">
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
					  <a class="dropdown-item" href="?options=profile">Thông tin cá nhân</a>
					  <a class="dropdown-item" href="?options=logout">Đăng xuất</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>