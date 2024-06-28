<?php
$id = $_GET['id'];
$ha = load4ha($ms);
if(count($ha)>0){
	$img = $ha[0]['hinh'];
}else{
	$img="";
}

if(isset($_POST['comment'])){
	if(!empty($_POST['addbl'])){
		$iduser = $user['ma_kh'];
		$bl = $_POST['addbl'];
		$date = date('Y-m-d');
		addbl($iduser, $id, $bl, $date);
		header("location: index.php?act=ct&id=$id&ms=$ms");
	}
}
if(!isset($_SESSION['cart'])) $_SESSION['cart']=[];

if($sp['giam_gia']>0){
	$price = $sp['giam_gia'];
}else{
	$price = $sp['giam_gia'];
}
$name = $sp['ten_sp'];
$color = $maus['ten_mau'];
if(isset($_POST['addcart'])){
	$sl = $_POST['quantity_1'];
	if(empty($_POST['size'])){
		$thongbao = "Bạn Chưa chọn Size";
	}else{
		$size = $_POST['size'];
		$tkho = loadkhoHang($id, $color, $size);
		if($sl > $tkho){
			$thongbao = "Số Lượng hàng Không đủ";
		}else{
			$check = 0;
			$i = 0;
			foreach($_SESSION['cart'] as $cart){
				if($cart[0]==$id && $cart[4]==$color && $cart[5]==$size){
					$sl = $sl + $cart[6];
					$check = 1;
					$_SESSION['cart'][$i][6] = $sl;
				  }$i++;
			}
			if($check == 0){
				$cart = [$id,$img,$name,$price,$color,$size,$sl];
				array_push($_SESSION['cart'],$cart);
				$thongbao ="Thêm Thành Công";
			}
				
			}
		}
	}
if(isset($_POST['buy'])){
	$sl = $_POST['quantity_1'];
	if(empty($_POST['size'])){
		$thongbao = "Bạn Chưa chọn Size";
	}else{
		$size = $_POST['size'];
		$tkho = loadkhoHang($id, $color, $size);
		if($sl> $tkho){
			$thongbao = "Số Lượng hàng Không đủ";
		}else{
			$check = 0;
			$i = 0;
			foreach($_SESSION['cart'] as $cart){
				if($cart[0]==$id && $cart[4]==$color && $cart[5]==$size){
					$sl = $sl + $cart[6];
					$check = 1;
					$_SESSION['cart'][$i][6] = $sl;
				  }$i++;
			}
			if($check == 0){
				$cart = [$id,$img,$name,$price,$color,$size,$sl];
				array_push($_SESSION['cart'],$cart);
				header("location: index.php?act=cart");
			}
		}
	}
}

?>

<main>
	    <div class="container margin_30">
	        <div class="countdown_inner"><div class="countdown"></div>
	        </div>
	        <div class="row">
	            <div class="col-md-6">
	                <div class="all">
	                    <div class="slider">
							<div class="imgsfull">
	                        <div class="owl-carousel owl-theme main">
								
									<?php foreach($ha as  $key => $value): ?>
										<img src="upload/<?php echo $value['hinh'] ?>" alt="" width="100%" height="100%" class="item-box imgfull">
	                        		<?php endforeach ?>
								
							</div>
							</div>
							
	                        <div class="left nonl"><i class="ti-angle-left"></i></div>
	                        <div class="right"><i class="ti-angle-right"></i></div>
	                    </div>
	                    <div class="slider-two">
	                        <div class="owl-carouself owl-theme">
								<?php foreach($ha as  $key => $value): ?>
	                            <img src="upload/<?php echo $value['hinh'] ?>" alt="" width="100%" height="100%" class="item">
								<?php endforeach ?>
	                        </div>
	                       
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-6">
	                <div class="breadcrumbs">
	                    <ul>
	                        <li><a href="#">Home</a></li>
	                        <li><a href="#"><?php echo $dm['ten_dm'] ?></a></li>
	                        <li><?php echo $sp['ten_sp']; ?></li>
	                    </ul>
	                </div>
	                <!-- /page_header -->
	                <div class="prod_info">
	                    <h1><?php echo mb_strtoupper($sp['ten_sp']); ?></h1>
	                    <div class="prod_options">
	                        <div class="row">
	                            <label class="col-xl-5 col-lg-5  col-md-6 col-6 pt-0"><strong>Color : <?php echo $maus['ten_mau']; ?></strong></label>
	                            <div class="col-xl-4 col-lg-5 col-md-6 col-6 colors">
	                                <ul>
										<?php foreach($mau as $key =>$ms): ?>
	                                    <li><a href="index.php?act=ct&id=<?php echo $sp['ma_sp'] ?>&ms=<?php echo $ms['ma_ms'] ?>" class="color <?php if($ms['ten_mau']=="Trắng") echo "color_1";  if($ms['ten_mau']=="Đen") echo "color_2"; 
																																				if($ms['ten_mau']=="Xám") echo "color_3";
																																				if($ms['ten_mau']=="Đỏ") echo "color_4"; if($ms['ten_mau']=="Hồng") echo "color_5"; if($ms['ten_mau']=="Ghi") echo "color_6";?> <?php if($maus['ten_mau'] == $ms['ten_mau']) echo "active"?>"></a></li>
										<?php endforeach ?>
	                                </ul>
	                            </div>
	                        </div>
							<form action="" method="post">
	                        <div class="row">
	                            <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Size</strong> - Size Guide <a href="#0" data-bs-toggle="modal" data-bs-target="#size-modal"><i class="ti-help-alt"></i></a></label>
	                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">
	                                <div class="custom-select-form">
										<?php foreach($kt as $key => $value): ?>
											<?php $khoHang = loadkhoHang($id, $maus['ten_mau'], $value['ten_kt']); ?>
										<div class="hup">
											<input type="hidden" name="" class="khoHang" value="<?php echo $khoHang['so_luong']; ?>">
											<input type="hidden" name="" class="khohangnong" value="<?php if($khoHang['so_luong']<=0){ echo "Hết hàng!";}else{echo "Số lượng còn: ".$khoHang['so_luong'];} ?>">
											<input type="radio" name="size" id="productSize<?php echo $key ?>" value="<?php echo $value['ten_kt'] ?>" <?php if($khoHang['so_luong']<=0) echo "disabled" ?>>
											<label onclick="tang1(<?php echo $key ?>)" class="productSize <?php if($khoHang['so_luong']<=0) echo "hetHang"?>"  for="productSize<?php echo $key ?>"><?php echo $value['ten_kt'] ?></label>
										</div>
										<?php endforeach ?>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Quantity</strong></label>
	                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">
	                                <div class="numbers-row-all">
	                                    <input type="text" value="1" id="quantity_1" class="qty2" name="quantity_1">
										<input type="hidden" name="" id="slll" value="100">
										 <div class="kho" id="khoh-1"></div>
										<div class="inc button_inc" onclick="tang()">+</div>
										<div class="dec button_inc" onclick="giam()">-</div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="row">
	                        <div class="col-lg-5 col-md-6">
	                            <div class="price_main"><span class="new_price"><?php echo number_format($sp['giam_gia']); ?> VND</span><span class="percentage">-30%</span> <span class="old_price"><?php echo number_format($sp['don_gia']); ?> VND</span></div>
	                        </div>
	                        <div class="col-lg-4 col-md-65">
	                            <div class="btn_add_to_cart"><button type="submit" name="addcart" class="btn_1">Add to Cart</button></div>
	                            <div class="btn_add_to_cart"><button type="submit" name="buy" class="btn_1">Mua Hàng</button></div>
	                        </div>
	                    </div>
						<?php if(isset($thongbao)&& $thongbao!="") echo $thongbao ?>
						</form>
	                </div>
					<div class="tab_content_wrapper">

	        <div class="container">
	            <div class="tab-content" role="tablist">
	                <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
	                    <div class="card-header" role="tab" id="heading-A">
	                        <h5 class="mb-0">
	                            <a class="collapsed" data-bs-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
	                                Description
	                            </a>
	                        </h5>
	                    </div>
	                    <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
	                        <div class="card-body">
	                            <div class="row justify-content-between">
	                                <div class="col-lg-6">
	                                    <h3>Mô Tả</h3>
	                                    <p><?php echo $sp['mo_ta']; ?></p>
	                                </div>
	                                <div class="col-lg-5">
	                                    <h3>Specifications</h3>
	                                    <div class="table-responsive">
	                                        <table class="table table-sm table-striped">
	                                            <tbody>
	                                                <tr>
	                                                    <td><strong>Color </strong></td>
														<?php foreach($mau as $key => $mau ): ?>
	                                                    <td><?php echo $mau['ten_mau']; ?></td>
														<?php endforeach ?>
	                                                </tr>
	                                                <tr>
	                                                    <td><strong>Size</strong></td>
														<?php foreach($kt as $key => $kt ): ?>
	                                                    <td><?php echo $kt['ten_kt']; ?></td>
														<?php endforeach ?>
	                                                </tr>
													<tr>
	                                                    <td><strong>View</strong></td>
														
	                                                    <td><?php echo $sp['luot_xem']; ?></td>
														
	                                                </tr>
	                                            </tbody>
	                                        </table>
	                                    </div>
	                                    <!-- /table-responsive -->
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- /TAB A -->
	                
	                <!-- /tab B -->
	            </div>
	            <!-- /tab-content -->
	        </div>
	        <!-- /container -->
	    </div> 
	            </div>
	        </div>
	    </div>
	   
		<!-- comment -->
		<div class="container mt-5">
			<div class="d-flex justify-content-center row">
				<div class="col-md-8">
					<div class="d-flex flex-column comment-section">
						<?php foreach($listbl as $bl): ?>
							<?php $ac = loadtk($bl['ma_kh']); ?>
							<div class="bg-white p-2">
								<div class="d-flex flex-row user-info"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
									<div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name"><?php echo $ac['tai_khoan']; ?> </span>
									<span class="date text-black-50"><?php echo $bl['ngay_bl'] ?></span></div>
								</div>
								<div class="mt-2">
									<p class="comment-text"><?php echo $bl['noi_dung'] ?></p>
								</div>
							</div>
							<div class="bg-white">
								<div class="d-flex flex-row fs-12">
									<div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Like</span></div>
									<div class="like p-2 cursor"><i class="fa fa-commenting-o"></i><span class="ml-1">Comment</span></div>
									<div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
								</div>
							</div>
						<?php endforeach ?>	
							<div class="bg-light p-2">
								<?php if(!isset($_SESSION['account'])): ?>
									<a href="index.php?act=login" class="access_link" ><span>Vui lòng đăng nhập tài khoản để bình luận</span></a>
								<?php endif ?>

								<?php if(isset($_SESSION['account'])): ?>
								<form action="" method="post">
									<div class="d-flex flex-row align-items-start">
										<img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
										<textarea class="form-control ml-1 shadow-none textarea" style="height: 106px;" name="addbl"></textarea>
									</div>
									<div class="mt-2 text-right">
										<button class="btn btn-primary btn-sm shadow-none" type="submit" name="comment">Post comment</button>
										<button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button>
									</div>
								</form>
							<?php endif ?>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<!-- Sản phẩn tương tự -->
	    <div class="container margin_60_35">
	        <div class="main_title">
	            <h2>Sản Phẩm Tương Tự</h2>
	            <span>Products</span>
	            
	        </div>
	        <div class="owl-carousel owl-theme products_carousel">
				<?php foreach($spcl as $key => $row): ?>
					<?php 
					$mau = load_mau_by_product_id($row['ma_sp']);
                 	$kt = loadsize($row['ma_sp']); 
					?>
	            <div class="item">
	                <div class="grid_item">
	                    <span class="ribbon new">New</span>
	                    <figure>
							<a href="index.php?act=ct&id=<?php echo $row['ma_sp'] ?>&ms=<?php echo $mau[0]['ma_ms'] ?>">
							<img src="upload/<?php echo $row['hinh_anh'] ?>" alt="" >
	                        </a>
	                    </figure>
	                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
	                    <a href="index.php?act=ct&id=<?php echo $row['ma_sp'] ?>&ms=<?php echo $mau[0]['ma_ms'] ?>">
							<h3><?php echo  mb_strtoupper($row['ten_sp']); ?></h3>
						</a>
	                    <div class="price_box">
						<span class="new_price"><?php echo number_format($row['giam_gia']); ?> VND</span>
							<span class="old_price"><?php echo number_format($row['don_gia']); ?> VND</span>
	                    </div>
	                    <ul>
	                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
	                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
	                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
	                    </ul>
	                </div>
	                <!-- /grid_item -->
	            </div>
	            <?php endforeach ?>
	        </div>
	        <!-- /products_carousel -->
	    </div>

		<!-- and sản phẩm tương tự -->
	    <!-- /container -->

	  

	</main>