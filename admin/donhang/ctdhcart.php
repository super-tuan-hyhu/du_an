<?php 
$id = $_GET['id'];
$dh = dh($id); 
$ctdh = loadctdh($id);
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
											<img src="../upload/<?php echo $ha[0]['hinh'] ?>"  class="lazy" alt="Image" width="100px">
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
            <a href="index.php?act=listdh"><button type="button"  class="btn btn-primary" name="themmois">Trở Về</button></a>
            <?php if($dh['trang_thai']!= "Đã Nhận" && $dh['trang_thai']!= "Chờ Giao Hàng") :?>
                <a href="index.php?act=huy&id=<?php echo $id ?>"><button type="button"  class="btn btn-primary" name="addd">Hủy Đơn hàng</button></a>
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