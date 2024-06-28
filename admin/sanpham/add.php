<div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <h2>Thêm Sản Phẩm</h2>
<form action="index.php?act=adsp" method="POST" enctype="multipart/form-data">
  
  <div class="form-group">
    <label for="exampleInputPassword1">Tên Sản Phẩm</label>
    <input type="text" class="form-control" name="tensp" placeholder="Tên Sản Phẩm">
  <?php if(isset($thongBao)&& $thongBao!="") echo $thongBao ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Giá Cũ</label>
    <input type="text" class="form-control" name="gia" aria-describedby="emailHelp" placeholder="Nhập Giá Cũ">
    <?php if(isset($thongBao1)&& $thongBao1!="") echo $thongBao1 ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Giá Mới</label>
    <input type="text" class="form-control" name="gianew" aria-describedby="emailHelp" placeholder="Nhập Giá Mới">
    
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Chọn hình ảnh</label>
    <input type="file" class="form-control-file" name="hinh">
    <?php if(isset($thongBao2)&& $thongBao2!="") echo $thongBao2 ?>
    
  </div>

  <div class="form-group">
    <label for="">Chọn size</label></br>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="size[]" value="M">
      <label class="form-check-label" for="inlineCheckbox1">M</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="size[]" value="L">
      <label class="form-check-label" for="inlineCheckbox2">L</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="size[]" value="XL">
      <label class="form-check-label" for="inlineCheckbox3">XL</label>
    </div>
<?php if(isset($thongBao4)&& $thongBao4!="") echo $thongBao4 ?>

  </div>

  <div class="form-group">
    <label for="">Chọn Màu</label></br>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="mau[]" value="Trắng">
      Trắng
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="mau[]" value="Đen">
      Đen
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="mau[]" value="Xám">
      Xám
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="mau[]" value="Đỏ">
      Đỏ
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="mau[]" value="Hồng">
      Hồng
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="mau[]" value="Ghi">
      Ghi
    </div>
    <p style="coler: red;"><?php if(isset($thongBao5)&& $thongBao5!="") echo $thongBao5 ?></p>
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Danh Mục</label>
    <select class="form-control" id="exampleFormControlSelect1" name="mHang">
      <option value="0">Chọn Danh Mục</option>
      <?php foreach($dm as $ddm): ?>
      <option value="<?php echo $ddm['ma_dm'] ?>"><?php echo $ddm['ten_dm'] ?></option>
      <?php endforeach ?>
    </select></br>
<p style="coler: red;"><?php if(isset($thongBao3)&& $thongBao3!="") echo $thongBao3 ?></p>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" name="mota" id="exampleFormControlTextarea1" rows="3" placeholder="Mô Tả"></textarea>
  </div>

  <div class="form-group"> 
    <button type="submit" class="btn btn-primary" name="themmois">Submit</button>
  <a href="index.php?act=viewsp" class="btn btn-dm">Danh Sách Sản Phẩm</a>
  </div>
  
  <?php if(isset($thongBao6)&& $thongBao6!="") echo $thongBao6 ?>
</form>
            </table>
        </div>
    </div>