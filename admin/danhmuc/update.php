<?php
if(isset($dm) && is_array($dm)){
    extract($dm);
}
?>

<div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <h2>Sửa Sản Phẩm</h2>
<form action="index.php?act=updatedm" method="POST" enctype="multipart/form-data">
  
  <div class="form-group">
    <label for="exampleInputPassword1">Tên Danh Mục</label>
    <input type="text" class="form-control"  name="tenloai" placeholder="Tên Danh Mục" value="<?php echo $dm['ten_dm']; ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Chọn hình ảnh</label>
    <img src="../upload/<?php echo $dm['imgs'] ?>" alt="" width="70px" height="80px">
    <input type="file" class="form-control-file" name="uphinh">    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Trạng Thái</label>
    <input type="text" class="form-control" name="trangthai" placeholder="Trạng Thái Đơn Hàng" value="<?php if(isset($trang_thai)) echo $trang_thai; ?>">
    
  </div>
  
  <div class="form-group"> 
    <input type="hidden" name="id" value="<?php echo $dm['ma_dm'] ?>">
    <button type="submit" class="btn btn-primary" name="capnhat">Cập Nhật</button>
  <a href="index.php?act=viewdm" class="btn btn-dm">danh muc</a>
  </div>
</form>
            </table>
        </div><?php if(isset($thongBao)&& $thongBao!="") echo $thongBao ?>
    </div>
    