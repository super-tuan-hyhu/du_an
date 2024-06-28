<?php 
if(isset($_GET['id'])){
	$id = $_GET['id'];
}
if(isset($_GET['fill'])){
	if($_GET['fill']=="new") $fill = "order by ma_sp desc";
	if($_GET['fill']=="sale") $fill = "order by don_gia - giam_gia desc";
	if($_GET['fill']=="like") $fill = "order by luot_xem desc";
	if($_GET['fill']=="maxPrice") $fill = "order by giam_gia desc";
	if($_GET['fill']=="minPrice") $fill = "order by giam_gia asc";
}else{
	$fill = "";
}

if(!isset($_GET['page'])){
	$page = 1;
}else{
	$page = $_GET['page'];
}

$sql = "select * from san_pham where ma_dm = $id";

// kiểm tra xem hàm $fill có rỗng không
if (!empty($fill)) {
    $sql .= " $fill";
}

$sps = pdo_query($sql);
$dm = loaddm($id);
$bd = ($page - 1) * 6;
$kt = $bd + 6;
$sql = "select * from san_pham where ma_dm = $id";

if (!empty($fill)) {
    $sql .= " $fill";
}

$sql .= " limit $bd,$kt";

$sp = pdo_query($sql);



?>
<main style="transform: none; margin-bottom: 388.2px;">
	    <div class="container margin_30" style="transform: none;">
	        <div class="row" style="transform: none;">
	            <aside class="col-lg-3" id="sidebar_fixed" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
	                
	            <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: relative; transform: none;"><div class="filter_col">
	                    <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
	                    
	                    <!-- /filter_type -->
	                    <div class="filter_type version_2">
    <h4><a href="#filter_1" data-bs-toggle="collapse" class="opened">Categories</a></h4>
    <div class="collapse show" id="filter_1">
        <ul>
            <li>
                <label class="container_check">
                    <a href="index.php?act=dmsp&id=<?php echo $id ?>&fill=new">Mới Nhất</a>
                </label>
            </li>
            <li>
                <label class="container_check">
                    <a href="index.php?act=dmsp&id=<?php echo $id ?>&fill=sale">Mặt Hàng Giảm Giá</a>
                </label>
            </li>
            <li>
                <label class="container_check">
                    <a href="index.php?act=dmsp&id=<?php echo $id ?>&fill=like">Được Yêu thích Nhất</a>
                </label>
            </li>
            <li>
                <label class="container_check">
                    <a href="index.php?act=dmsp&id=<?php echo $id ?>&fill=maxPrice">Giá Từ Cao Đến Thấp</a>
                </label>
            </li>
            <li>
                <label class="container_check">
                    <a href="index.php?act=dmsp&id=<?php echo $id ?>&fill=minPrice">Giá Từ Thấp Đến Cao</a>
                </label>
            </li>
        </ul>
    </div>
    <!-- /filter_type -->
</div>
	                    <!-- /filter_type -->
	                    
	                </div><div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;"><div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 290px; height: 586px;"></div></div><div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div></div></div></div></aside>
	           
				
				
					
	            <div class="col-lg-9">
	                <h2><?php echo $dm['ten_dm']; ?></h2>
	                <!-- /top_banner -->
	                <div id="stick_here" style="height: 0px;"></div>
	                
	                <!-- /toolbox -->
	               <div class="row small-gutters">
				   		<?php foreach($sp as $key => $row) :?>
							<?php 
								$mau = load_mau_by_product_id($row['ma_sp']);
								$kt = load_sizes_by_product_id($row['ma_sp']);  
							?>
							<div class="col-6 col-md-4">
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
									<li>
										<a  class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-target="#m<?php echo $key ?>" ><i class="ti-shopping-cart" title="Add to cart"></i><span>Add to cart</span></a>
									</li>
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
					<!-- /row -->
	                <<div class="pagination">
                <?php for($i=1;$i<=ceil(count($sps)/4);$i++): ?>
                    <a href="index.php?act=dmsp&page=<?php echo $i?>" class="page-link"><?php echo $i?></a>
                <?php endfor ?>
            	</div>
	            </div>
	        </div>

	    </div>

	</main>