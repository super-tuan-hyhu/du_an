<?php if(isset($_GET['listpro']) && $_GET['listpro'] == 'thongtin' || !isset($_GET['listpro'])): ?>
    <?php if($_SERVER['REQUEST_METHOD']== "POST"){
        if(!empty($_POST['email']) && !empty($_POST['numberphone'])){
            $name = $_POST['namecs'];
            $phone = $_POST['numberphone'];
            $email = $_POST['email'];
            $adress = $_POST['adress'];
            updateuser($acc, $name, $phone, $email,$adress);
            header("location: index.php?act=profile");
        }
    } ?>
    
<form action="" method="post">
<div class="col-lg-6-6 px-xl-10">
        <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
            <h3 class="h2 mb-0 profile-tt">Thông Tin Tài Khoản</h3>
            <span class="text-primary">Họ Và Tên</span>
        </div>
        <ul class="list-unstyled mb-1-9">
            
        </ul>
    </div>
        <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Name:<input type="text" class="form-control" name="namecs" aria-describedby="emailHelp" placeholder="Nhập Tên" value="<?php echo $user['ho_ten'] ?>">
        <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Number Phone:<input type="number" class="form-control" name="numberphone" pattern="[0][9,8,3,7]{1}[0-9]{8}" placeholder="Nhập Số điện thoại" value="<?php echo $user['so_dt'] ?>">
        <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Email:<input type="email" class="form-control" name="email" aria-describedby="emailHelp" value="<?php echo $user['email'] ?>">
        <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Adress:<input type="text" class="form-control" name="adress" aria-describedby="emailHelp" placeholder="Nhập Địa chỉ" value="<?php echo $user['dia_chi'] ?>"></br>
        <button type="submit" class="btn btn-primary" name="up">Submit</button>
</form>
<?php endif ?>


<?php if(isset($_GET['listpro']) && $_GET['listpro'] == 'lsmh'): ?>
<!-- Begin Page Content -->
<div class="container margin_30">
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Danh Mục</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Ngày Đặt Hàng</th>
                        <th>Trạng Thái</th>
                        <th>Chi Tiết</th>
                    </tr>
                </thead>
                <?php $yourdhct = dhcomplete($acc); ?>
                <tbody>
                    <?php foreach($yourdhct as $row): ?>
                    <tr>
                        <td>TUAN<?php echo $row['ma_dh']; ?></td>
                        <td><?php echo $row['ngay_tao']; ?></td>
                        <td><?php echo $row['trang_thai']; ?></td>
                        <td><a href="index.php?act=profile&listpro=chitiet&id=<?php echo $row['ma_dh'] ?>" class="btn btn-primary">Xem</a></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<?php endif ?>
<?php if(isset($_GET['listpro']) && $_GET['listpro'] == 'chitiet' && isset($_GET['id'])) :?>
<?php 
$id = $_GET['id'];
$dh = dh($id); 
$ctdh = loadctdh($id);
?>
<?php
$first_date = new DateTime($dh['ngay_tao']);
$second_date = new DateTime(date('Y-m-d'));
$dateinterval = $first_date->diff($second_date);
$time = $dateinterval->days;
?>

<div class="container margin_30">
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Chi tiết sản phẩm</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Bảng Hóa đơn</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Ngày</th>
                        <th>Trạng Thái</th>
                        <th>Người Nhận</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Địa Chỉ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>TUAN<?php echo $id ?></td>
                        <td><?php echo $dh['ngay_tao']; ?></td>
                        <td><?php echo $dh['trang_thai']; ?></td>
                        <td><?php echo $dh['nguoi_nhan']; ?></td>
                        <td><?php echo $dh['so_dt']; ?></td>
                        <td><?php echo $dh['email']; ?></td>
                        <td><?php echo $dh['dia_chi']; ?></td>
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
									    Total
									</th>
									<th>
										
									</th>
								</tr>
							</thead>
							<tbody>
                                <?php foreach($ctdh as $row) :?>
                                    <?php 
                                        $mau = $row['ten_mau']; 
                                        $ma_sp = $row['ma_sp'];
                                        $ms = loadmauone($ma_sp,$mau);
                                        $ha = loadha($ms['ma_ms']);
                                    ?>
								<tr>
									<td>
										<div class="thumb_cart">
											<img src="upload/<?php echo $ha[0]['hinh'] ?>"  class="lazy" alt="Image">
										</div>
										
										<span class="item_cart">Màu: <?php echo $row['ten_mau']; ?></span>
                                        <span class="item_cart">Tên: <?php echo mb_strtoupper($row['ten_sp']) ?></span>
										<span class="item_cart">Size: <?php echo $row['ten_kt'] ?></span>
									</td>
									<td>
										<strong><?php echo number_format($row['don_gia']) ?>VND</strong>
									</td>
									<td>
										<strong class="price_0"><?php echo $row['so_luong'] ?></strong>
									</td>
									<td class="options">
										<strong class="price_0"><?php echo number_format($row['don_gia'] * $row['so_luong']) ?>VND</strong>
    									</td>
								</tr>
                                <?php endforeach ?>
							</tbody>
						</table>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Phí Vận Chuyển</th>
                        <th>Mã giảm giá</th>
                        <th>Thành tiền</th>
                        <th>Phương thức thanh toán</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo number_format($dh['pt_vc']) ?>VND</td>
                        <td><?php echo mb_strtoupper($dh['voucher']) ?></td>
                        <td><?php echo number_format($dh['thanh_tien']) ?> VND</td>
                        <td><?php echo $dh['pt_tt'] ?></td>
                    </tr>
                </tbody>

            </table>
            <a href="index.php?act=profile&listpro=lsmh"><button type="button"  class="btn btn-primary" name="themmois">Trở Về</button></a>
            <?php if($dh['trang_thai']!= "Đã Nhận" && $dh['trang_thai']!= "Chờ Giao Hàng") :?>
                <a href="index.php?act=huy&id=<?php echo $id ?>"><button type="button"  class="btn btn-primary" name="addd" onclick="return confirm('Do you really want to delete this products')">Hủy Đơn hàng</button></a>
            <?php endif ?>
            <?php if($dh['nguoi_nhan'] == "") :?>
                <a href="index.php?act=dathang&id=<?php echo $id ?>"><button type="button"  class="btn btn-primary" name="buy">Điền Thông Tin</button></a>
            <?php endif ?>
            <?php if($dh['trang_thai'] == "Chờ Giao Hàng") :?>
                <a href="index.php?act=complete&id=<?php echo $id ?>"><button type="button"  class="btn btn-primary" name="buy">Đã Nhận</button></a>
            <?php endif ?>
        </div>
    </div>
</div>
</div>
<?php endif ?>