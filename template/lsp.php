<?php
// check action
	if(isset($_GET['action']))
	{
		if ($_GET['action'] === 'giamgia') 
		{
			$ac		 = "giamgia";
			$action  = "GIẢM GIÁ";
			$sql	 = "SELECT * FROM `sanpham` WHERE sale > 0";
			$querypt = mysqli_query($conn,$sql);
			$count   = mysqli_num_rows($querypt); 
		}
		elseif($_GET['action'] === 'moi')
		{
			$ac		 = "moi";
			$action = "MỚI";
			$sql	 = "SELECT tree.*,receipt_detail.Tree_ID FROM tree INNER JOIN receipt_detail ON tree.ID = receipt_detail.Tree_ID INNER JOIN receipt ON receipt_detail.Receipt_ID = receipt.ID ORDER BY receipt.Date DESC";
			$querypt = mysqli_query($conn,$sql);
			$count   = mysqli_num_rows($querypt); 
		}
		if($_GET['action'] === 'search')
		{
			$ac		= "search";
			$where  = " WHERE ";
			$action = "TÌM KIẾM";
			if (isset($_POST['timkiem'])) 
			{
				$_SESSION['tkmasp'] = $_POST['timkiem'];
			}

			$search = isset($_SESSION['tkmasp'])?$_SESSION['tkmasp']:"";
			$where .= "ID LIKE '%$search%' OR Tree_name LIKE '%$search%'";

			$sql	 = "SELECT * FROM `tree`".$where;
			$querypt = mysqli_query($conn,$sql);
			$count   = mysqli_num_rows($querypt);
		}
		elseif($_GET['action'] === 'lsp')
		{
			$ac 	 = '';
			$malsp   = isset($_GET['id'])?$_GET['id']:0;
			
			// lấy tên loại sản phẩm
			$sqllsp  = "SELECT Category_name FROM category WHERE ID = $malsp";
			$querylsp= mysqli_query($conn,$sqllsp);
			$tenlsp  = mysqli_fetch_assoc($querylsp);

			$action  = isset($tenlsp['Category_name'])?$tenlsp['Category_name']:"";
			$sql     = "SELECT * FROM tree WHERE  Category_ID = $malsp";
			$querypt = mysqli_query($conn,$sql);
			$count   = mysqli_num_rows($querypt); 
		}
		elseif($_GET['action'] === 'loc')
		{
			$ac = 'loc';
			$action = "SẢN PHẨM";
			// get data from form

			
			if (isset($_POST['gia'])) 
			{
				$_SESSION['gia'] = (int)$_POST['gia'];
			}

			$gia = isset($_SESSION['gia'])?$_SESSION['gia']:0;

			$where = " WHERE ";
			if ($gia === 0) 
			{
				$where .= " Price > 0 ";
			}
			if ($gia === 1) 
			{
				$where .= " Price <= 100000 ";
			}
			elseif($gia === 2)
			{
				$where .= " Price BETWEEN 100000 AND 400000 ";
			}
			elseif($gia === 3)
			{
				$where .= " Price BETWEEN 400000 AND 1000000 ";
			}
			
			$sql = "SELECT * FROM tree ".$where;
			$querypt = mysqli_query($conn,$sql);
			$count   = mysqli_num_rows($querypt);
		}
		else
		{
			$ac 	 = '';
			$action  = "SẢN PHẨM"; 
			$sql     = "SELECT * FROM tree";
			$querypt = mysqli_query($conn,$sql);
			$count   = mysqli_num_rows($querypt); 
		}
	}
	else
	{
		$ac 	 = '';
		$action  = "SẢN PHẨM"; 
		$sql     = "SELECT * FROM tree";
		$querypt = mysqli_query($conn,$sql);
		$count   = mysqli_num_rows($querypt); 
	}
// Phân trang
	if (isset($_GET['page'])) {
    	$page = $_GET['page'];
    }else{
    	$page=1;
    }

    if (isset($_GET['record'])) {
    	$sobai_mottrang = $_GET['record'];
    	if ($sobai_mottrang != 20 && $sobai_mottrang != 50) {
    		$sobai_mottrang = 20;
    	}
    }else{
    	$sobai_mottrang = 20;
    }

    $sodulieu = $count;
    $sotrang = ceil($sodulieu/$sobai_mottrang);

    if ($page < 1) {
    	$page = 1;
    }elseif ($page > $sotrang) {
    	$page = $sotrang;
    }

    $start = ($page-1)*$sobai_mottrang;
    // nếu bản ghi bắt đầu nhỏ hơn 0 thì reset về 0
    if ($start < 0) 
    {
    	$start = 0;
    }

    // thêm điều kiện phân trang sau đó lấy dữ liệu
    $sql  .= " LIMIT $start, $sobai_mottrang";
    $query = mysqli_query($conn,$sql);
?>

<div id="content-category-product">
	<div class="container product-dresses">
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-md-3">
				<?php 
					include_once('layout/siderbar_left.php');
				?>
			</div>
			<div class="col-xs-12 col-sm-8 col-md-9">
				<div class="waper_product">
					<div class="title">
						<a href="?options=home"><span>Trang chủ </span></a><i class="fas fa-chevron-right"></i>
						<span> <?php echo $action; ?> </span>
					</div>
					<!-- Search -->
					<div class="product">
						<div class="row">
							<?php if (mysqli_num_rows($query)): ?>
								<?php while($result = mysqli_fetch_assoc($query)) : ?>
									<div class="col-xs-6 col-sm-6 col-md-4">
										<div class="thumbnail product item">
											<div class="pictr">
												<img src="admin/upload/<?php echo $result["Image"] ?>">
												<div class="add-cart">
													<a class="btn btn-success" href="?options=sanpham&id=<?php echo $result['ID'] ?>" alt="<?php echo $result['Tree_name']; ?>">Xem chi tiết</a>
												</div>
											</div>
											<div class="caption info">
												<h4><?php echo $result["Tree_name"]; ?></h4>
												<div class="cost <?php if ($result['sale'] > 0) echo "sale"; ?>">
													<?php if ($result['sale'] > 0): ?>
														<?php $dongia =$result['Price'] - ($result['Price'] * $result['sale'])/100; ?>
														<p class="price througth"><?php echo number_format($result['Price']); ?></p>
														<p class="price"><?php echo number_format($dongia); ?></p>
													<?php else : ?>
														<p class="price"><?php echo number_format($result['Price']); ?></p>
													<?php endif ?>
												</div>
											</div>
										</div>
									</div>
								<?php endwhile ?>
							<?php else: ?>
								<h3>Không có sản phẩm nào</h3>
							<?php endif ?>
						</div>
					</div>
				</div>
			</div>
		<div class="page-count"> 
			<div class="container"> 
				<ul class="btn-group pagination page-navigation pull-right" role="group">
					<?php
						if ($page > 1 && $sotrang > 1){
							echo '<li><a class="icon-btn pre" href="index.php?options=lsp&action='.$ac.'&page='.($page-1).'&record='.$sobai_mottrang.'"><i class="glyphicon glyphicon-menu-left"></i></a></li>';
						}

						for ($i = 1; $i <= $sotrang; $i++){
							if ($i == $page){
								echo '<li><a href="javascript:void(0)" class="page active">'.$i.'</a></li>';
							}
							else{
								echo '<li><a class="page" href="index.php?options=lsp&action='.$ac.'&page='.$i.'&record='.$sobai_mottrang.'">'.$i.'</a></li>';
							}
						}

						if ($page < $sotrang && $sotrang > 1){
							echo '<li><a class="icon-btn next" href="index.php?options=lsp&action='.$ac.'&page='.($page+1).'&record='.$sobai_mottrang.'"><i class="glyphicon glyphicon-menu-right"></i></a></li>';
						}
					?>
				</ul>
			</div>
		</div>
	</div>
</div>