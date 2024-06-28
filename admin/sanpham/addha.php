<div class="cart">
    <div class="table-norefomr">
        <h2>Thêm Hình Ảnh</h2>
    </div>


        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <h4><?php echo $mau['ten_mau']; ?></h4>
            </table>
        </div>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Ảnh Đại Diện</label>
                            <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Ảnh Chi Tiết</label>
                            <input type="file" name="imgs[]" class="form-control-file" multiple>
                            <input type="hidden" name="ma" value="<?php echo $mau['ma_ms']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary" name="addimgs">Thêm Mới</button></hr>
                        <input type="reset" class="btn btn-dm adha" value="Nhập lại">
                    </form>
        </table>
        <a href="index.php?act=viewsp"><button class="btn btn-primary" type="submit">Sản Phẩm</button></a>
        <?php
        if(isset($thongbao) && $thongbao!="") echo $thongbao;      
         ?>
</div>
