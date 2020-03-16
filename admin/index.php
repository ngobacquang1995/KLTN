<?php
session_start();
if (!isset($_SESSION['taikhoan'])) {
	header('Location: views/layout/login.php');
}else{
	$user = $_SESSION['taikhoan'];
	$name = $_SESSION['tennv'];
	$quyen = $_SESSION['quyen'];
	$manv = $_SESSION['manv'];
}
?>
<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>
	 Admin
	</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<!-- CSS Files -->
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/material-dashboard.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/datatable.css">
	<link href="css/style.admin.css" rel="stylesheet" />
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/datatable.js"></script>
	<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=ykkbh3lnq4w7c9wajzgehf3r5zjupxuhdeapqmfmcjfkd6k6"></script>
	<script>
	$(document).ready(function(){
	    $('table').DataTable();
	});
	</script>
</head>
<body class="">
	<div class="wrapper">
		<?php include("views/layout/menu-navibar.php"); ?>
		

		<div class="main-panel">
			
			<?php include("views/layout/header.php"); ?>
			

			<div class="content">
				<?php include("views/layout/main.php"); ?>
			</div>
		</div>
		
	</div>
</body>

<script>
// Check all check box
$('#select_all').change(function() {
    var checkboxes = $(this).closest('form').find(':checkbox');
    if($(this).is(':checked')) {
        checkboxes.prop('checked', true);
    } else {
        checkboxes.prop('checked', false);
    }
});

$(document).ready(function($) {
	$('#cldelete').click(function(){
    	//event onclick delete	    	

    	if (confirm("Bạn có chắc chắn muốn xóa các mục đã chọn không?")) {
    		document.getElementById("frdelete").submit();
    	};
    });
});


</script>
<script language="javascript" type="text/javascript">
  tinyMCE.init({
    
	selector: "#mytextarea",  // change this value according to your HTML
		plugins: 'image media link tinydrive code imagetools',
		height: 600,
		tinydrive_token_provider: 'URL_TO_YOUR_TOKEN_PROVIDER',
		toolbar: 'insertfile image link | code'
});

</script>
</html>