<?php
if(!isset($_GET['page'])){
    $page = 1;
}else{
    $page = $_GET['page'];
}
$bd = ($page-1)*3;
$kt = $page + 3;

$sql = "SELECT * FROM voucher limit $bd, $kt";
$ltvc = pdo_query($sql);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

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
                        <th>VOUCHER</th>
                        <th>Name Voucher</th>
                        <th>Giá Trị</th>
                        <th>Ngày Bắt Đầu</th>
                        <th>Ngày Kết Thúc</th>
                        <th>Update Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($ltvc as $key => $vc) :?>
                    <tr>
                        <td><?php echo $vc['loai_km'] ?></td>
                        <td><?php echo $vc['name_vc'] ?></td>
                        <td><?php echo $vc['gt_vc'] ?></td>
                        <td><?php echo $vc['ngay_bd'] ?></td>
                        <td><?php echo $vc['ngay_kt'] ?></td>
                       
                        <td>
                            <a href="index.php?act=suavoucher&id=<?php echo $vc['ma_vc']; ?>">
                                <button class="btn">Sửa</button>
                            </a>
                            
                            <a href="index.php?act=xoavoucher&id=<?php echo $vc['ma_vc']; ?>">
                                <button class="btn">Xóa</button>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
                
            </table>
            <div class="pagination">
                <?php for($i=1;$i<=ceil(count($listvc)/8);$i++): ?>
                    <a href="index.php?act=listVourcher&page=<?php echo $i?>" class="page-link"><?php echo $i?></a>
                <?php endfor ?>
            </div>
            <a href="index.php?act=voucher"><button type="submit" class="btn btn-primary" name="themmoi">Add Voucher</button></a>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->