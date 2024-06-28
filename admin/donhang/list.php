<?php 
if(!isset($_GET['page'])){
    $page = 1;
}else{
    $page = $_GET['page'];
}
$bd = ($page-1)*4;
$kt = $bd + 4;
$sql = "SELECT * FROM don_hang WHERE trang_thai <> 'Chưa hoàn thành' order by ma_dh desc limit $bd, $kt";
$sp = pdo_query($sql);
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
                        <th>Number oder</th>
                        <th>Name Person</th>
                        <th>Start date</th>
                        <th>Start</th>
                        <th>Update Products</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($sp as $row): ?>
                    <tr>
                        <td><?php echo $row['ma_dh'] ?></td>
                        <td><?php echo $row['tai_khoan'] ?></td>
                        <td><?php echo $row['ngay_tao'] ?></td>
                        <td><?php echo $row['trang_thai'] ?></td>
                        <td>
                            <a href="index.php?act=ctdh&id=<?php echo $row['ma_dh']; ?>">
                                <button type="submit" class="btn btn-primary" name="themmois">Xem</button>
                            </a>
                            <?php if($row['trang_thai']!= "Hủy"&& $row['trang_thai']!= "Đã Nhận") :?>
                            <a href="index.php?act=huydh&id=<?php echo $row['ma_dh']; ?>">
                                <button class="btn btn-primary">Hủy</button>
                            </a>
                            <?php endif ?>

                            <?php if($row['trang_thai'] == "Chờ xác nhận") :?>
                            <a href="index.php?act=cb&id=<?php echo $row['ma_dh']; ?>">
                                <button class="btn btn-primary">Đổi trạng thái</button>
                            </a>
                            <?php endif ?>
                            
                            <?php if($row['trang_thai'] == "Chờ lấy hàng") :?>
                            <a href="index.php?act=giao&id=<?php echo $row['ma_dh']; ?>">
                                <button class="btn btn-primary">Đổi trạng thái</button>
                            </a>
                            <?php endif ?>

                            <?php if($row['trang_thai'] == "Chờ giao hàng") :?>
                            <a href="index.php?act=danhan&id=<?php echo $row['ma_dh']; ?>">
                                <button class="btn btn-primary">Đổi trạng thái</button>
                            </a>
                            <?php endif ?>
                        </td>
                    </tr>  
                <?php endforeach ?>
                </tbody>
            </table>
            <div class="pagination">
                <?php for($i=1;$i<=ceil(count($listall_dh)/4);$i++): ?>
                    <a href="index.php?act=listdh&page=<?php echo $i?>" class="page-link"><?php echo $i?></a>
                <?php endfor ?>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->