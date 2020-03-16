<?php
	include("admin/config.php");
	// check login
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Trang chủ</title>
	<link rel="shortcut icon" href="images/logo_PT.png" type="image/x-icon">
	<!--file css-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/slick.css">
	<link rel="stylesheet" type="text/css" href="css/slick-theme.css">
	
	
	<link href="css/camera-slider-master/camera.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<!--file scrip-->
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>
	<!--Camera JS Plugin-->
	<script src="js/camera-slider-master/easing.min.js" type="text/javascript"></script>
	<script src="js/camera-slider-master/camera.min.js" type="text/javascript"></script>
	<!--scroll top-->
	<script type="text/javascript" async src="js/scroll-top.js"></script>
	<!--my jquery-->
    <script type="text/javascript" src="js/myjquery.js"></script>
</head>
<body>
	<div id="wapper">
		<header>
			<?php include("layout/header.php"); ?>
		</header>

		<main>
			<?php include("layout/main.php"); ?>
		</main>
	</div>

	<footer>
		<?php include("layout/footer.php"); ?>
	</footer>
	
	<p class="tscroll"><a href="#" class="scrollToTop"><i class="fa fa-angle-double-up"></i></a></p>
	
</body>
</html>