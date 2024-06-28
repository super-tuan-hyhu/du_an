<?php
$loaddm = loadAll(); 
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Dự án</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="view/css/bootstrap.min.css" rel="stylesheet">
    <link href="view/css/style.css" rel="stylesheet">

	<!-- SPECIFIC CSS -->
    <link href="view/css/home_1.css" rel="stylesheet">
    <link href="view/css/listing.css" rel="stylesheet">
    <link href="view/css/product_page.css" rel="stylesheet">
	<link href="view/css/cart.css" rel="stylesheet">


    <!-- YOUR CUSTOM CSS -->
    <link href="view/css/custom.css" rel="stylesheet">
    <link href="view/css/profiles.css" rel="stylesheet">
    <link href="view/css/product.css" rel="stylesheet">

</head>

<body>
	<div id="Menu">
	<div id="page">
	
	<!-- Phần header -->
	<header class="version_1">
		<div class="layer"></div><!-- Mobile menu overlay mask -->
		<div class="main_header">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
						<div id="logo">
							<a href="index.php"><img src="view/img/logo.svg" alt="" width="100" height="35"></a>
						</div>
					</div>
					<nav class="col-xl-6 col-lg-7">
						<a class="open_close" href="javascript:void(0);">
							<div class="hamburger hamburger--spin">
								<div class="hamburger-box">
									<div class="hamburger-inner"></div>
								</div>
							</div>
						</a>
						<!-- Mobile menu button -->
						<div class="main-menu">
							<div id="header_menu">
								<a href="index.html"><img src="view/img/logo_black.svg" alt="" width="100" height="35"></a>
								<a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
							</div>
							<ul>
								<li class="submenu">
									<a href="index.php" class="show-submenu">Home</a>
								</li>
								<li class="megamenu submenu">
									<a href="javascript:void(0);" class="show-submenu-mega">Pages</a>
									<div class="menu-wrapper">
										<div class="row small-gutters">
											<div class="col-lg-3">
												<h3>Listing grid</h3>
												<ul>
													<li><a href="listing-grid-1-full.html">Grid Full Width</a></li>
													
												</ul>
											</div>
											<div class="col-lg-3">
												<h3>Listing row &amp; Product</h3>
												<ul>
													<li><a href="listing-row-1-sidebar-left.html">Row Sidebar Left</a></li>
													
												</ul>
											</div>
											<div class="col-lg-3">
												<h3>Other pages</h3>
												<ul>
													<li><a href="cart.html">Cart Page</a></li>
													
												</ul>
											</div>
											<div class="col-lg-3 d-xl-block d-lg-block d-md-none d-sm-none d-none">
												<div class="banner_menu">
													<a href="#0">
														<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="view/img/banner_menu.jpg" width="400" height="550" alt="" class="img-fluid lazy">
													</a>
												</div>
											</div>
										</div>
										<!-- /row -->
									</div>
									<!-- /menu-wrapper -->
								</li>
								<li class="submenu">
									<a href="javascript:void(0);" class="show-submenu">Extra Pages</a>
									<ul>
										<li><a href="header-2.html">Header Style 2</a></li>
										
									</ul>
								</li>
								<li>
									<a href="blog.html">Blog</a>
								</li>
								<li>
									<a href="#0">Buy Template</a>
								</li>
							</ul>
						</div>
						<!--/main-menu -->
					</nav>
					<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-end">
						<a class="phone_top"><strong><span>Need Help?</span>0921876135</strong></a>
					</div>
				</div>
				<!-- /row -->
			</div>
		</div>
		<!-- /main_header -->

		<div class="main_nav Sticky">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 col-md-3">
						<nav class="categories">
							<ul class="clearfix">
								<li><span>
										<a href="#">
											<span class="hamburger hamburger--spin">
												<span class="hamburger-box">
													<span class="hamburger-inner"></span>
												</span>
											</span>
											Categories
										</a>
									</span>

									<!-- phần menu đa cấp  -->
									<div id="menu">
										<ul>
											<li><span><a href="#0">Các Danh Mục</a></span>
											</li>
											<?php foreach($loaddm as $dm): ?>
											<li><a href="index.php?act=dmsp&id=<?php echo $dm['ma_dm']; ?>"><?php echo $dm['ten_dm']; ?></a>
												
											</li>
											<?php endforeach; ?>
										</ul>
									</div>
									<!-- Kết thúc phần menu đa cấp -->

								</li>
							</ul>
						</nav>
					</div>
					<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
						<div class="custom-search-input">
							<form action="" method="post">
								<input type="text" id="key"  name="key" placeholder="Search over 10.000 products">
								<button type="submit" id="search" name="search"><i class="header-icon_search_custom"></i></button>
							</form>
							
						</div>
					</div>


					<!-- Phần cho người đăng nhập -->
					<div class="col-xl-3 col-lg-2 col-md-3">
						<ul class="top_tools">
							<li>
								<div class="dropdown dropdown-cart">
									<a href="index.php?act=cart" class="cart_bt"></a>
									<div class="dropdown-menu">
										<?php if($_SESSION['cart'] ==[] || !isset($_SESSION['cart'])) :?>
											<strong>Bạn chưa có đơn Hàng nào</strong>
										<?php endif ?>

										<?php $tong = 0; $so = 0; ?>
										<?php if($_SESSION['cart']!=[]) :?>
											<?php foreach($_SESSION['cart'] as $key => $cart) :?>
												<?php $kho = loadkhoHang($cart[0], $cart[4], $cart[5]); ?>
												<?php 
												$sp = loadsp($cart[0]);
												$mau = load_mau_by_product_id($sp['ma_sp']); 
												?>
											<ul>
												<li>
													<a href="index.php?act=ct&id=<?php echo $sp['ma_sp'] ?>&ms=<?php echo $mau[0]['ma_ms'] ?>">
														<input type="hidden" name="id" value="<?php echo $cart[0] ?>">
														<input type="hidden" name="sl" value="<?php echo $cart[6] ?>" min="1" max="<?php echo $cart[6] ?>">
														<figure><img src="upload/<?php echo $cart[1] ?>" data-src="upload/<?php echo $cart[1] ?>" alt="" width="50" height="50" class="lazy"></figure>
														<strong><span><?php echo mb_strtoupper($cart[2]) ?></span><?php echo number_format($cart[3]) ?>VND</strong>
													</a>
													<a href="model/deletecart.php?id=<?php echo $key ?>" class="action"><i class="ti-trash"></i></a>
												</li>
											
											</ul>
											<?php if($kho['so_luong']>0){
													$tong = $tong + $cart[3] * $cart[6];
												}
											?>
											<?php endforeach ?>
											<div class="total_drop">
												<div class="clearfix"><strong>Total</strong><span><?php echo number_format($tong) ?>VND</span></div>
												<a href="index.php?act=cart" class="btn_1 outline">View Cart</a>
											</div>
										<?php endif ?>
										
									</div>
								</div>
								<!-- /dropdown-cart-->
							</li>
							<li>
								<a href="#0" class="wishlist"><span>Wishlist</span></a>
							</li>
							<li>
								
									<?php if(isset($_SESSION['account'])) :?>
										<?php $acc = $_SESSION['account']; ?>
										<div class="dropdown dropdown-access">
											<a href="index.php?act=profile" class="access_link" data-toggle="dropdown" title="<?php echo $acc ?>"><span><?php echo $_SESSION['ho_ten'] ?></span></a>
										</div>
									<?php endif ?>

									<?php if(!isset($_SESSION['account'])) :?>
										<div class="dropdown dropdown-access">
											<a href="index.php?act=login" class="access_link" data-toggle="dropdown"><span>Account</span></a>
										</div>
									<?php endif ?>
								
							</li>
							<li>
								<a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
							</li>
							<li>
								<a href="#menu" class="btn_cat_mob">
									<div class="hamburger hamburger--spin" id="hamburger">
										<div class="hamburger-box">
											<div class="hamburger-inner"></div>
										</div>
									</div>
									Categories
								</a>
							</li>
						</ul>
					</div>
					<!-- Kết thúc cho người đăng nhập -->

				</div>
				<!-- /row -->
			</div>
			<div class="search_mob_wp">
				<form action="" method="post">
					<input type="text" class="form-control" id="key"  name="key" placeholder="Search over 10.000 products">
					<!-- <input type="submit" name="search" id="search" class="btn_1 full-width" value="Search"> -->
				</form>
				
			</div>
			<!-- /search_mobile -->
		</div>
		<!-- /main_nav -->
	</header>
    