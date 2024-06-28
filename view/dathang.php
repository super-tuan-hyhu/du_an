<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$date = date('Y-m-d');
if(isset($_GET['id'])){
 $ma_dh = $_GET['id'];
}

$ctdh = loadctdh($ma_dh);
if(count($ctdh) < 1){
    deldh($ma_dh);
    header("location:index.php?act=cart");
}else{
    $tong = 0;
    $soluong = 0;
    foreach($ctdh as $ct){
        $tong = $ct['don_gia'] * $ct['so_luong'] + $tong;
        $soluong = $soluong + $ct['so_luong'];
    }
    $tong;
    $soluong;

    if(isset($_POST['orderProducts'])){
    if(!empty($_POST['nameuser']) && !empty($_POST['phone']) && !empty($_POST['address']) && !empty($_POST['emailForm'])){
        $name = check($_POST['nameuser']);
        $phone = check($_POST['phone']);
        $email = check($_POST['emailForm']);
        $address = check($_POST['address']);
        $ptvc = $_POST['ptvc'];
        $tt = $tong + $ptvc;
        $ptttPay = $_POST['pay'];
        if(empty($_POST['coupon-code'])){
            $voucher = "";
        }else{
            $voucher = check($_POST['coupon-code']);
            $sql = "SELECT * FROM voucher WHERE ngay_bd <= '$date' AND ngay_kt >= '$date' AND name_vc = '$voucher'";
            $listvc = pdo_query($sql);
            if(is_array($listvc) && !empty($_POST['gtVoucher'])){
                $voucher = check($_POST['coupon-code']);
                $tt = $tt - check($_POST['gtVoucher']);
            }else{
                $voucher ="";
            }
        }
        updatedh($ma_dh, $name, $phone, $email, $address, $ptttPay, $ptvc, $voucher, $tt);
        header("location:index.php?act=camon");
    }
}
}
?>
<main>
<div class="container-1">
        <form action="" method="post">
        <div class="rwo">
            <label class="dsitem">
                <span class="ds__item__labell">Địa chỉ của bạn</span>
                <div class="ds__item__contact-info">
                    <?php if(isset($_SESSION['account'])) :?>
                        <?php 
                            $acc = $_SESSION['account'];
                            $user = loadkh($acc);
                        ?>
                    <div class="roww">
                        <div class="col-6s form-group">
                            <input class="form-control" type="text"  name="nameuser" placeholder="Họ tên" value="<?php echo $user['ho_ten'] ?>">
                        </div>
                        <div class="col-6s form-group">
                            <input class="form-control " type="text" pattern="[0][9,8,3,7]{1}[0-9]{8}" name="phone" value="<?php echo $user['so_dt'] ?>" placeholder="Số điện thoại">
                        </div>
                        
                        
                        <div class="col-122 form-group">
                            <input class="form-control-1" type="text" placeholder="Địa chỉ" name="address" value="<?php echo $user['dia_chi'] ?>">
                        </div>
                        <div class="col-122 form-group">
                            <input class="form-control-1" type="email" placeholder="Email" name="emailForm" value="<?php echo $user['email'] ?>">
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if(!isset($_SESSION['account'])) :?>
                        <div class="roww">
                            <div class="col-6s form-group">
                                <input class="form-control" type="text" value="" name="nameuser" placeholder="Họ tên">
                            </div>
                            <div class="col-6s form-group">
                                <input class="form-control " pattern="[0][9,8,3,7]{1}[0-9]{8}" type="text" name="phone" value="" placeholder="Số điện thoại">
                            </div>
                            
                            
                            <div class="col-122 form-group">
                                <input class="form-control-1" type="text" placeholder="Địa chỉ" name="address" value="">
                            </div>
                            <div class="col-122 form-group">
                                <input class="form-control-1" type="email" placeholder="Email" name="emailForm" value="">
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </label>



            <div class="col-lg-4 cart-page__col-summary">
                <div class="cart-summary" id="cart-page-summary">
                    <div class="cart-summary__overview">
                        <h3>Tổng tiền giỏ hàng</h3>
                        <div class="cart-summary__overview__item">
                            <p>Tổng sản phẩm</p>
                            <p class="total-product" id="total-product"><?php echo $soluong ?></p>
                        </div>
                        <div class="cart-summary__overview__item">
                            <p>Phí Vận Chuyển</p>
                            <p class="total-product" id="total-product"><?php if(!isset($_SESSION['account'])){echo "15000";}else{echo "0";}?> VND</p>
                        </div>
                        <div class="cart-summary__overview__item">
                            <p>Tổng tiền hàng</p>
                            <p class="total-not-discount" id="total-not-discount"><?php echo number_format($tong) ?> VND</p>
                        </div>
                        <div class="cart-summary__overview__item">
                            <p>Thành tiền</p>
                            <p>
                                <b class="order-price-total" id="order-price-total"><?php if(isset($_SESSION['account'])){echo number_format($tong);}else{echo number_format($tong+15000);} ?></b>VND
                                <input type="hidden" name="" id="Voucher" value="<?php if(isset($_SESSION['account'])){echo number_format($tong);}else{echo number_format($tong+15000);} ?>">
                                <input type="hidden" name="gtVoucher" id="gtVoucher" value="0">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="s">
                    <h3>Mã giảm giá</h3>
                        <div class="col-sm-f88">
                        <div class="apply-coupon">
                            <div class="form-group">
                                <div class="g-2">
                                    <div class="col-md-6s"><input type="text" id="myVoucher" name="coupon-code" value="" placeholder="Mã giảm giá" class="form-control"></div>
                                    <div class="col-md-4s"><button type="button" class="outlinee" onclick="getAllvoucher()">Áp dụng</button></div>
                                    <div id="thongbao"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" id="purchase-step-1" class="btn btn--large" name="orderProducts" onclick="openModal()">Đặt hàng</button>
            </div>
        </div>
        <div class="checkout-payment">
            <h3 class="checkout-title">Phương thức thanh toán</h3>
            <div class="block-border">
                <p>Mọi giao dịch đều được bảo mật và mã hóa. Thông tin thẻ tín dụng sẽ không bao giờ được lưu lại.</p>
                <div class="checkout-payment__options">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <label class="ds__item">
                <input class="ds__item__input" type="radio" name="pay" id="payment_method_1" value="Thanh toán bằng thẻ tín dụng">
                <span class="ds__item__label">
                    Thanh toán bằng thẻ tín dụng
                                                                    </span>
                                                                    <span style="margin-left: 3px">
                        <img src="https://pubcdn.ivymoda.com/ivy2/images/1.png" class="">
                    </span>
                                                            </label>                                                                                                                                                                                                                                             <label class="ds__item">
                <input class="ds__item__input" type="radio" name="pay" id="payment_method_2" value="Thanh toán bằng thẻ ATM">
                <span class="ds__item__label">
                    Thanh toán bằng thẻ ATM
                                                                            <span>Hỗ trợ thanh toán online hơn 38 ngân hàng phổ biến Việt Nam.</span>
                                                                    </span>
                                                            </label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <label class="ds__item">
                <input class="ds__item__input" type="radio" name="pay" id="payment_method_5" value="Thanh toán bằng Momo">
                <span class="ds__item__label">
                    Thanh toán bằng Momo
                                                                    </span>
                                                            </label>

                                                                                                                                                                                                                                                                                                                                                        <label class="ds__item">
                <input class="ds__item__input" type="radio" name="pay" id="payment_method_3" value="Thanh toán khi giao hàng" checked="">
                <span class="ds__item__label">
                    Thanh toán khi giao hàng
                                                                    </span>
                                                            </label>
                                                                                                                                                                                                                                                        </div>
            </div>
        </div>
        <div class="checkout-payment">
    <h3 class="checkout-title">Phương thức giao hàng</h3>
    <div class="block-border">
    <p>Đơn hàng sẽ được giao đến bạn sớm nhất.</p>
            <label class="ds__item">
            <input class="ds__item__input" type="radio" name="ptvc" id="payment_method_3" value="<?php if(!isset($_SESSION['account'])){echo "15000";}else{echo "0";}?>" checked>
                                        <span class="ds__item__label">
                                            Chuyển phát nhanh                      </span>
            </label>
    </div>
</div>
    </div>
    <?php 
        $sq = "SELECT * FROM voucher WHERE ngay_bd <= '$date' AND ngay_kt >= '$date'";
        $loadlistvc = pdo_query($sq);
    ?>
    <?php foreach($loadlistvc as $lvc) :?>
        <input type="hidden" class="voucherr" value="<?php echo strtoupper($lvc['name_vc']); ?>">
        <input type="hidden" class="vlVoucher" value="<?php if($lvc['loai_km'] == "fix"){echo $lvc['gt_vc'];}else{echo ($tong*$lvc['gt_vc'])/100;} ?>">
    <?php endforeach ?>
</form>
    
    
    </main>