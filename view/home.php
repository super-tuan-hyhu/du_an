<?php 
if(!isset($_GET['page'])){
	$paga = 1;
}else{
	$paga = $_GET['page'];
}

$listSpp = loadall_sanpham_home(); 
$listYt = spyeuthich();
$bd = ($paga-1)*7;
$kt = $paga + 7;
$sql = "SELECT * FROM san_pham order by ma_sp desc limit $bd, $kt";
$listSp = pdo_query($sql);
 ?>
<main>
	<?php include "view/banner.php"; ?>
		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Top Selling</h2>
			</div>
			<div class="row small-gutters">
			<?php foreach($listSp as $key => $row) :?>
				<?php 
					$mau = load_mau_by_product_id($row['ma_sp']);
                 	$kt = load_sizes_by_product_id($row['ma_sp']); 
				?>
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<figure>
							<span class="ribbon off">-30%</span>
							<a href="index.php?act=ct&id=<?php echo $row['ma_sp'] ?>&ms=<?php echo $mau[0]['ma_ms'] ?>">
							<img src="upload/<?php echo $row['hinh_anh'] ?>" alt="" width="300px" height="430px">
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
						<ul id="modelonl">
							<li><a  class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-target="#m<?php echo $key ?>" ><i class="ti-shopping-cart" title="Add to cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
					<div class="modal product-modal" tabindex="-1" id="m<?php echo $key ?>">
						<div class="modal-dialog">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title"><?php echo mb_strtoupper($row['ten_sp']) ?></h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
						<div class="modal-body">
						<img src="upload/<?php echo $row['hinh_anh'] ?>" alt="" width="150px" height="130px">
							<form class="body" method="post">
								<div class="nameSP">
								<label for="">Chọn màu:</label>

									<?php foreach($mau as $key => $ro):?>
									<div class="divclass">
										<input type="radio" name="color" id="" value="<?php echo $ro['ten_mau']?>" <?php if($key==0) echo "checked" ?>><br> <?php echo $ro['ten_mau']?>
									</div>
								<?php endforeach ?>
								
								</div>

								<div class="nameSP">
								<label for="">Chọn size:</label>
								<?php foreach($kt as $key => $ros):?>
								<div class="divclass">
								<input type="radio" name="size" id="" value="<?php echo $ros['ten_kt']?>" <?php if($key==0) echo "checked" ?>><br> <?php echo $ros['ten_kt']?>
								</div>
								<?php endforeach ?>
								</div>
								<input type="hidden" name="id" value="<?php echo $row['ma_sp']?>">
								<input type="hidden" name="price" value="<?php if($row['giam_gia']>0){
								echo $row['giam_gia'];}else{ echo $row['don_gia'];}?>">
								<div class="modal-footer">
								<a href="<?php $row['ma_sp'] ?>"><button type="submit" class="btn btn-primary" name="addTocart">Save changes</button></a>
								</div>
								</form>
						</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>
			<div class="paginationn">
                <?php for($i=1;$i<=ceil(count($listSpp)/7);$i++): ?>
                    <a href="index.php?act=viewsp&page=<?php echo $i?>" class="page-linkk"><?php echo $i?></a>
                <?php endfor ?>
            </div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->


		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Featured</h2>
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
			</div>
			<div class="owl-carousel owl-theme products_carousel">
				<?php foreach($listYt as $key => $row) : ?>
				<?php 
					$mau = load_mau_by_product_id($row['ma_sp']);
                 	$kt = load_sizes_by_product_id($row['ma_sp']); 
				?>
				<div class="item">
				<div class="grid_item">
						<figure>
							<span class="ribbon off">-30%</span>
							<a href="index.php?act=ct&id=<?php echo $row['ma_sp'] ?>&ms=<?php echo $mau[0]['ma_ms'] ?>">
							<img src="upload/<?php echo $row['hinh_anh'] ?>" alt="" width="300px" height="430px">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="product-detail-1.html">
							<h3><?php echo $row['ten_sp']; ?></h3>
						</a>
						<div class="price_box">
							<span class="new_price"><?php echo number_format($row['giam_gia']); ?> VND</span>
							<span class="old_price"><?php echo number_format($row['don_gia']); ?> VND</span>
						</div>
						<ul id="modelonl">
							<li><a  class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-target="#m<?php echo $key ?>" ><i class="ti-shopping-cart" title="Add to cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
					<div class="modal product-modal" tabindex="-1" id="m<?php echo $key ?>">
						<div class="modal-dialog">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Modal title</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
							<form class="body" method="post">
								<div class="nameSP">
								<label for="">Chọn màu:</label>
							
									<?php foreach($mau as $key => $ro):?>
									<div class="divclass">
								<input type="radio" name="color" id="" value="<?php echo $ro['ten_mau']?>" <?php if($key==0) echo "checked" ?>><br> <?php echo $ro['ten_mau']?>
								</div>
								<?php endforeach ?>
								
								</div>

								<div class="nameSP">
								<label for="">Chọn size:</label>
								<?php foreach($kt as $key => $ros):?>
								<div class="divclass">
								<input type="radio" name="size" id="" value="<?php echo $ros['ten_kt']?>" <?php if($key==0) echo "checked" ?>><br> <?php echo $ros['ten_kt']?>
								</div>
								<?php endforeach ?>
								</div>
								<input type="hidden" name="id" value="<?php echo $row['ma_sp']?>">
								<input type="hidden" name="price" value="<?php if($row['giam_gia']>0){
								echo $row['giam_gia'];}else{ echo $row['don_gia'];}?>">
								<div class="modal-footer">
								<a href="<?php $row['ma_sp'] ?>"><button type="submit" class="btn btn-primary" name="addTocart">Save changes</button></a>
								</div>
								</form>
						</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>	
			</div>

		</div>

	</main>