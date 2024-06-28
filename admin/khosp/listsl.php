<?php
if(!isset($_GET['page'])){
    $page = 1;
  }else{
    $page = $_GET['page'];
  }
   $bd = ($page-1)*8;
   $kt = $bd + 8;
$sql = "SELECT ma_sp, sum(so_luong) as tong from so_luong group by ma_sp order by ma_sp desc limit $bd, $kt";
$kho = pdo_query($sql);

$sql = "select ma_sp,sum(so_luong) as tong from so_luong group by ma_sp order by ma_sp desc";
$khos = pdo_query($sql);
?>

<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Quản lý số lượng kho hàng</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="text-align: center;">Number oder</th>
                        <th style="text-align: center;">Name products</th>
                        <th style="text-align: center;">Tồn kho</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($kho as $sl): ?>
                        <?php $sp = loadsp($sl['ma_sp']); ?>
                    <tr>
                            <td style="text-align: center;"><?php echo $sl['ma_sp']; ?></td>
                            <td style="text-align: center;"><?php echo $sp['ten_sp']; ?></td>
                            <td style="text-align: center;"><?php echo $sl['tong']; ?></td>
                            <td style="text-align: center;">
                                <a href="index.php?act=addkho&id=<?php echo $sp['ma_sp']; ?>">
                                    <button class="btn">Thêm</button>
                                </a>
                            </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <div class="pagination">
                <?php for($i=1;$i<=ceil(count($khos)/8);$i++): ?>
                    <a href="index.php?act=litskho&page=<?php echo $i?>" class="page-link"><?php echo $i?></a>
                <?php endfor ?>
            </div>
        </div>
    </div>
</div>

</div>