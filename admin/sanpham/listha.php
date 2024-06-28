<div class="card-body">
    <div class="table-norefomr">
        <h2><?php echo $sp['ten_sp']; ?></h2>
    </div>

    <?php foreach ($mau as $key => $ms): ?>
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <h4><?php echo $ms['ten_mau']; ?></h4>
            </table>
        </div>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <td style="text-align: center;">Image</td>
                    <td style="text-align: center;">Change Image</td>
                    <td style="text-align: center;">Update Delete</td>
                </tr>
                <tr>
                    <?php $ha = loadha($ms['ma_ms']); ?>
                    <?php if (count($ha) <= 0): ?>
                        <td colspan="3">Sản phẩm này chưa có hình ảnh nào</td>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ha as $key => $value): ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <tr>
                            <td style="text-align: center;">
                                <img src="../upload/<?php echo $value['hinh'] ?>" alt="" width="70px" height="80px">
                            </td>
                            <td style="text-align: center;">
                                <input type="file" name="img">
                                <input type="hidden" name="maha" value="<?php echo $value['ma_ha']; ?>">
                            </td>
                            <td style="text-align: center;">
                                <button class="btn btn-primary" type="submit">Sửa ảnh</button>
                                <a href="index.php?act=xoaha&id=<?php echo $value['ma_ha'] ?>&idd=<?php echo $id ?>"><button class="btn btn-primary" type="button">Xóa</button></a>
                            </td>
                        </tr>
                    </form>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="index.php?act=addha&id=<?php echo $ms['ma_ms']; ?>"><button class="btn btn-primary" type="submit">Button</button></a>
        <a href="index.php?act=viewsp"><button class="btn btn-primary" type="submit">Trở Về</button></a>
    <?php endforeach; ?>
</div>
