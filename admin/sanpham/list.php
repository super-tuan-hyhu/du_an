<?php
    if(!isset($_GET['page'])){
        $paga = 1;
    }else{
        $paga = $_GET['page'];
    }
    $bd = ($paga-1)*4;
    $kt = $paga + 4;
    $sql = "SELECT * FROM san_pham order by ma_sp desc limit $bd, $kt";
    $list = pdo_query($sql);
?>
<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
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
                        <th>ID Products</th>
                        <th>ID Category</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Img</th>
                        <th>Date</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($list as $key => $row):
                    ?>
                        <?php $listsp = loaddm($row['ma_dm']); $i = 1; ?>
                    <tr>
                        <td><?php echo $key + 1 ?></td>
                        <td><?php echo $listsp['ma_dm'] ?></td>
                        <td><?php echo mb_strtoupper($row['ten_sp']) ?></td>
                        <td><?php echo number_format($row['don_gia']) ?></td>
                        <td><?php echo number_format($row['giam_gia']) ?></td>
                        <td><img src="../upload/<?php echo $row['hinh_anh'] ?>" alt="" width="70px" height="80px"></td>
                        
                        <td><?php echo date('Y-m-d H:i:s', strtotime($row['ngay_dang'])); ?></td>
                        <td>
                            <a href="index.php?act=suasp&id=<?php echo $row['ma_sp']; ?>">
                                <button class="btn">Sửa</button>
                            </a>
                            <a href="index.php?act=suaha&id=<?php echo $row['ma_sp']; ?>">
                                <button class="btn">Hình</button>
                            </a>
                            <a href="index.php?act=suasize&id=<?php echo $row['ma_sp']; ?>">
                                <button class="btn">Sửa Size</button>
                            </a>
                            <a href="index.php?act=suamau&id=<?php echo $row['ma_sp']; ?>">
                                <button class="btn">Sửa Màu</button>
                            </a>
                            <a href="index.php?act=xoasp&id=<?php echo $row['ma_sp']; ?>">
                                <button class="btn" onclick="return confirm('Do you really want to delete this products')">Xóa</button>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <div class="pagination">
                <?php for($i=1;$i<=ceil(count($dm)/4);$i++): ?>
                    <a href="index.php?act=viewsp&page=<?php echo $i?>" class="page-link"><?php echo $i?></a>
                <?php endfor ?>
            </div>
        </div>
    </div>
</div>
</div>