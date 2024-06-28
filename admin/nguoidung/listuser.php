<?php
if(!isset($_POST['page'])){
    $page = 1;
}else{
    $page = $_POST['page'];
}
$bd = ($page -1)*8;
$kt = $bd + 8;
$sql = "SELECT * FROM khach_hang limit $bd, $kt";
$kh = pdo_query($sql);
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
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Pass</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Adress</th>
                        <th>Role</th>
                        <th>Edits</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($kh as $row): ?>
                    <tr>
                        <td><?php echo $row['ma_kh'] ?></td>
                        <td><?php echo $row['tai_khoan'] ?></td>
                        <td><?php echo $row['mat_khau'] ?></td>
                        <td><?php echo $row['ho_ten'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['so_dt'] ?></td>
                        <td><?php echo $row['dia_chi'] ?></td>
                        <td><?php echo $row['vai_tro'] ?></td>
                        <td>
                            <a href="index.php?act=suauser&id=<?php echo $row['ma_kh']; ?>">
                                <button class="btn">Sửa</button>
                            </a>
                            
                            <a href="index.php?act=xoadm&id=<?php echo $dm['ma_dm']; ?>">
                                <button class="btn" onclick="return confirm('Do you really want to delete this products')">Xóa</button>
                            </a>
                        </td> 
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <div class="pagination">
                <?php for($i=1;$i<=ceil(count($listkh)/8);$i++): ?>
                    <a href="index.php?act=listuser&page=<?php echo $i?>" class="page-link"><?php echo $i?></a>
                <?php endfor ?>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->