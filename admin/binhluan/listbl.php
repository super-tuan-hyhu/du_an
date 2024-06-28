<?php
if(!isset($_POST['page'])){
    $page = 1;
}else{
    $page = $_GET['page'];
}


$bd = ($page-1)*8;
$kt = $bd + 8;
$sql = "SELECT * FROM binh_luan limit $bd, $kt";
$bl = pdo_query($sql);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Danh Sách Bình Luận</h1>
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
                        <th>Name</th>
                        <th>Products</th>
                        <th>Comment</th>
                        <th>Start date</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($bl as $row): ?>
                    <?php 
                        $sp = loadsp($row['ma_sp']);
                        $kh = loadtk($row['ma_kh']);
                    ?>
                    <tr>
                        <td><?php echo $kh['tai_khoan'] ?></td>
                        <td><?php echo $sp['ten_sp'] ?></td>
                        <td><?php echo $row['noi_dung'] ?></td>
                        <td><?php echo $row['ngay_bl'] ?></td>
                        
                        <td>
                            <a href="index.php?act=xoadm&id=<?php echo $dm['ma_dm']; ?>">
                                <button class="btn">Xóa</button>
                            </a>
                        </td>
                        
                    </tr> 
                <?php endforeach ?>
                </tbody> 
            </table>
            <div class="pagination">
                <?php for($i=1;$i<=ceil(count($listbl)/8);$i++): ?>
                    <a href="index.php?act=listCom&page=<?php echo $i?>" class="page-link"><?php echo $i?></a>
                <?php endfor ?>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->