<div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <h2>Thêm Voucher</h2>
<form action="index.php?act=voucher" method="POST" enctype="multipart/form-data">
  
  <div class="form-group">
    <label for="exampleInputPassword1">Tên Voucher</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="tenloai" placeholder="Tên Voucher">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Giá Trị Voucher</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="giatri" aria-describedby="emailHelp" placeholder="Giá Trị Đơn Hàng">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Ngày Bắt Đầu</label>
    <input type="date" class="form-control" id="exampleInputEmail1" name="ngaybatdau" aria-describedby="emailHelp" placeholder="Ngày Bắt Đầu">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Ngày Kết Thúc</label>
    <input type="date" class="form-control" id="exampleInputEmail1" name="ngaykethuc" aria-describedby="emailHelp" placeholder="Trạng Thái Đơn Hàng">
  </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Danh Mục</label>
        <select class="form-control" id="exampleFormControlSelect1" name="loaivc">
        <option value="0">Chọn Danh Mục</option>
        <option value="Phần trăm">Phần Trăm</option>
        <option value="fix">fixMoney</option>
        </select></br>
    </div>
  <div class="form-group"> 
    <button type="submit" class="btn btn-primary" name="themmoi">Submit</button>
  <a href="index.php?act=listVourcher" class="btn btn-dm">List Voucher</a>
  </div>
  
  <?php if(isset($thongbao)&& $thongbao!="") echo $thongbao ?>
</form>
            </table>
        </div>
    </div>