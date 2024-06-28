<div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <h2>Thêm Danh Mục</h2>
<form action="index.php?act=addm" method="POST" enctype="multipart/form-data">
  
  <div class="form-group">
    <label for="exampleInputPassword1">Tên Danh Mục</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="tenloai" placeholder="Tên Danh Mục">
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Chọn hình ảnh</label>
    <input type="file" class="form-control-file" name="hinhanh">    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Trạng Thái</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="trangthai" aria-describedby="emailHelp" placeholder="Trạng Thái Đơn Hàng">
    
  </div>
  <div class="form-group"> 
    <button type="submit" class="btn btn-primary" name="themmoi">Submit</button>
  <a href="index.php?act=viewdm" class="btn btn-dm">danh muc</a>
  </div>
  
  <?php if(isset($thongBao)&& $thongBao!="") echo $thongBao ?>
</form>
            </table>
        </div>
    </div>