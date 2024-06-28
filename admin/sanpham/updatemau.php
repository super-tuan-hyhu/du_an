<?php
$check = 0;
$thongbao = "";
if(isset($_POST['themsize']) && ($_POST['themsize'])){
    if (!empty($_POST['tenmausac'])) {
        $color = $_POST['tenmausac'];
        foreach($listms as $key => $upsizee){
            if($upsizee['ten_mau'] == $color){
                $check = 1;
            }
        }if ($check == 1) {
            $thongbao = "Màu Đã tồn tại";
        } else {
            upmau($id, $color);
            foreach($listsize as $key => $value){
                addsl($id,$color,$value['ten_kt']);
                
            }
            header("location:index.php?act=suamau&id=$id");
        }
    }
}
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID SIZE</th>
                        <th>Name màu</th>
                        <th>Number oder</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody><?php foreach($listms as $key => $listms): ?>
                    <tr>
                        
                        <td><?php echo isset($listms['ma_ms']) ? $listms['ma_ms'] : ''; ?></td>
                        <td><?php echo isset($listms['ten_mau']) ? $listms['ten_mau'] : ''; ?></td>
                        <td><?php echo $listms['ma_sp']; ?></td>
                        <td>
                            <a href="index.php?act=xoamau&id=<?php echo isset($listms['ma_ms']) ? $listms['ma_ms'] : ''; ?>">
                                <button class="btn">Xóa</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            </table>
        </div>
        <form action="" method="POST">
            <input type="text" class="form-control" name="tenmausac" placeholder="Thêm size"></br>
            <input type="submit" class="btn btn-primary" value="Submit" name="themsize">
            <a href="index.php?act=viewsp" class="btn btn-dm">danh muc</a>
            <p style="color: red;"><?php if(isset($thongbao) && $thongbao != "") echo $thongbao ?></p>
        </form>
    </div>
</div>
