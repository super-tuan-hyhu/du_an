
<?php 
if(isset($listsp) && is_array($listsp)){
  extract($listsp);
}
?>
<div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <h2>Thêm Sản Phẩm</h2>
<form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label for="exampleInputPassword1">Tên Sản Phẩm</label>
    <input type="text" class="form-control" name="tensp" value="<?php echo isset($listsp['ten_sp']) ? $listsp['ten_sp'] : ''; ?>">
  <?php if(isset($thongBao)&& $thongBao!="") echo $thongBao ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Giá Cũ</label>
    <input type="text" class="form-control" name="gia" aria-describedby="emailHelp" value="<?php echo isset($listsp['don_gia']) ? $listsp['don_gia'] : ''; ?>">
    <?php if(isset($thongBao1)&& $thongBao1!="") echo $thongBao1 ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Giá Mới</label>
    <input type="text" class="form-control" name="gianew" aria-describedby="emailHelp" value="<?php echo isset($listsp['giam_gia']) ? $listsp['giam_gia'] : ''; ?>">
    
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Chọn hình ảnh</label>
    <img src="../upload/<?php echo $listsp['hinh_anh'] ?>" alt="" width="70px" height="80px">
    <input type="file" class="form-control-file" name="hinh">
    <?php if(isset($thongBao2)&& $thongBao2!="") echo $thongBao2 ?>
    
  </div>



 

  <div class="form-group">
    <label for="exampleFormControlSelect1">Danh Mục</label>
    <select class="form-control" id="exampleFormControlSelect1" name="mHang">
        <option value="0">Chọn Danh Mục</option>
        <?php $dm = loadAll(); foreach($dm as $ddm): ?>
            <option value="<?php echo $ddm['ma_dm'] ?>" <?php if($ddm['ma_dm'] == $listsp['ma_dm']) echo 'selected' ?>><?php echo $ddm['ten_dm'] ?></option>
        <?php endforeach ?>
    </select></br>
    <p style="color: red;"><?php if(isset($thongBao3) && $thongBao3 != "") echo $thongBao3 ?></p>
</div>


  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" name="mota" id="exampleFormControlTextarea1" rows="3" ><?php echo isset($listsp['mo_ta']) ? $listsp['mo_ta'] : ''; ?></textarea>
  </div>

  <div class="form-group"> 
    <input type="hidden" name="id" value="<?php echo $listsp['ma_sp'] ?>">
    <button type="submit" class="btn btn-primary" name="themmois">Submit</button>
  <a href="index.php?act=viewsp" class="btn btn-dm">Danh Sách Sản Phẩm</a>
  </div>
  
  <?php if(isset($thongBao6)&& $thongBao6!="") echo $thongBao6 ?>

</form>
            </table>
        </div>
    </div>