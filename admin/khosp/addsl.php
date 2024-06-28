<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Quản lý số lượng kho hàng</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Số Lượng mặt hàng : <?php echo $sp['ten_sp']; ?></h6>
    </div>
<div class="card-body">
    <form action="" method="POST">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            
                <thead>
                    <tr>
                        <th style="text-align: center;">Color</th>
                        <th style="text-align: center;">Size</th>
                        <th style="text-align: center;">Số lượng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($sl as $sl1): ?>
                    <tr>
                        <td><?php echo $sl1['ten_ms']; ?></td>
                        <td><?php echo $sl1['ten_kt']; ?></td>
                        <td style="text-align: center;">
                            <input type="number" name="number[]" value="<?php echo $sl1['so_luong']; ?>" min="0">
                            <input type="hidden" name="masl[]" value="<?php echo $sl1['ma_sl']; ?>">
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
        </table>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="index.php?act=litskho" class="btn btn-dm">Danh Sách</a>
</div>    
</form>
</div>


</div>