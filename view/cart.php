<?php 
$mauHang = "";
if (isset($_POST['order'])) {
    $check = 0;
    $soluong = $_POST['sl'];

    foreach ($_SESSION['cart'] as $key => $cart) {
        $ma_sp = $cart[0];
        $mau = $cart[4];
        $kt = $cart[5];
        $sl = $soluong[$key];
        $loadtkh = loadkhoHang($ma_sp, $mau, $kt);

        if ($loadtkh['so_luong'] < $sl) {
            $check = 1;
        }
    }

    if ($check == 0) {
        if (isset($_SESSION['account'])) {
            $acc = $_SESSION['account'];
        } else {
            $acc = "";
        }

        adddh0($acc);
        $sql = "SELECT * FROM don_hang ORDER BY ma_dh DESC LIMIT 100";
        $madh = pdo_query_one($sql);
        $ma_dh = $madh['ma_dh'];

        foreach ($_SESSION['cart'] as $key => $cart) {
            $ma_sp = $cart[0];
            $name = $cart[2];
            $mau = $cart[4];
            $kt = $cart[5];
            $sl = $soluong[$key];
            $gia = $cart[3];
            $loadtkh = loadkhoHang($ma_sp, $mau, $kt);
            $kho = $loadtkh['so_luong'] - $sl;

            if ($sl > 0) {
                addctdh($ma_sp, $name, $gia, $mau, $kt, $sl, $ma_dh);
                updatekho($ma_sp, $mau, $kt, $kho);
            }
        }

        header("location:model/deletecart.php?ma_dh=$ma_dh");
    } else {
        $mauHang = "Số Lượng Hàng Không Đủ";
    }
}

?>

<main class="bg_gray">
	<?php if($_SESSION['cart']==[] || !isset($_SESSION['cart'])): ?>
		<h1 class="h1full">Bạn Chưa có đơn hàng nào vui lòng quay lại mua hàng!!!</h1>
		<a href="index.php"><button type="submit" class="btn btn-primary" name="themmois">Trở lại</button></a>
	<?php endif ?>
	<?php if($_SESSION['cart']!=[]) :?>
		<div class="container margin_30">
			<form action="" method="post">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Category</a></li>
					<li>Page active</li>
				</ul>
			</div>
			<h1>Cart page</h1>
		</div>
		<!-- /page_header -->
		<table class="table table-striped cart-list">
							<thead>
								<tr>
									<th>
										Product
									</th>
									<th>
										Price
									</th>
									<th>
										Quantity
									</th>
									<th>
										Subtotal
									</th>
									<th>
										
									</th>
								</tr>
							</thead>
							<tbody>
                                <?php $tong = 0; $so = 0 ?>
                                <?php foreach($_SESSION['cart'] as $key => $cart) :?>
                                    <?php $kho = loadkhoHang($cart[0], $cart[4], $cart[5]); ?>
								<tr>
									<td>
										<div class="thumb_cart">
											<img src="upload/<?php echo $cart[1] ?>"  class="lazy" alt="Image">
										</div>
										
										<span class="item_cart">Màu: <?php echo $cart[4] ?></span>
                                        <span class="item_cart"><?php echo mb_strtoupper($cart[2]); ?></span>
										<span class="item_cart">Size: <?php echo $cart[5] ?></span>
									</td>
									<td>
										<strong><?php echo number_format($cart[3]) ?></strong>
                                        <input type="hidden" name="" value="<?php echo $cart[3] ?>" class="pr0">
									</td>
									<td>
                                        <?php if($kho['so_luong']==0) :?>
											<input type="hidden" value="0" id="quantity_2" class="qty2" name="sl[]">
                                            Hết Hàng
                                        <?php endif ?>
                                        <?php if($kho['so_luong']>0) :?>
                                            <div class="numbers-row-all">
											<input type="text" value="<?php echo $cart[6] ?>" id="quantity_2" class="qty2 sl0" name="sl[]" min="1" max="<?php echo $kho['so_luong'] ?>">
                                            <div class="inc button_inc" onclick="tangTotal(<?php echo $key ?>)">+</div>
                                            <div class="dec button_inc" onclick="giamTotal(<?php echo $key ?>)">-</div></div>
                                        <?php endif ?>
										
									</td>
									<td>
										<strong class="price_0"><?php if($kho['so_luong']==0){echo  0;}else{echo number_format($cart[3]*$cart[6]);}?> VND</strong>
									</td>
									<td class="options">
                                        <a href="model/deletecart.php?id=<?php echo $key ?>" onclick="return confirm('Do you really want to delete this products')"><i class="fa-solid fa-trash"></i></a>
									</td>
								</tr>
                                <?php if($kho['so_luong']==0){
                                    $tong = $tong;
                                    $so = $so;
                                }else{
                                    $tong = $tong + $cart[3] * $cart[6];
                                    $so = $so + $cart[6];
                                }
                                ?>
                                <?php endforeach ?>
							</tbody>
						</table>

						<div class="row add_top_30 flex-sm-row-reverse cart_actions">
						<div class="col-sm-4 text-end">
							
						</div>
							<div class="col-sm-8">
							<div class="apply-coupon">
								<div class="form-group">
									<div class="row g-2">
										<div class="col-md-6"><input type="text" name="coupon-code" value="" placeholder="Promo code" class="form-control"></div>
										<div class="col-md-4"><button type="button" class="btn_1 outline">Apply Coupon</button></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /cart_actions -->
	
		</div>
		<!-- /container -->
		
		<div class="box_cart">
			<div class="container">
			<div class="row justify-content-end">
				<div class="col-xl-4 col-lg-4 col-md-6">
						<ul>
							<li class="totalFullm">
								<p>Tổng Tiền</p>
								<span id="total-not-discount"><?php echo number_format($tong) ?> VND</span> 
							</li>
							<li class="totalFullm">
								<p>Số Lượng</p>
								<span id="total-product"><?php echo $so ?></span> 
							</li>
							<li class="totalFullm">
								<p>Thành TIền</p>
								<span id="order-price-total"><?php echo number_format($tong) ?> VND</span> 
							</li>
						</ul>
						<button type="submit" class="btn_1 full-width cart" name="order">Order Products</button>
					</div>
				</div>
			</div>
			</form>
		</div>
		<?php endif ?>
		
	</main>