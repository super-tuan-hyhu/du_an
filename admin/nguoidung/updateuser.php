<div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <h2>Chỉnh sửa người dùng</h2>
                    <form action="index.php?act=updatekh" method="POST">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tên người dùng</label>
                                <input type="text" class="form-control" name="nameuser" placeholder="Tên Đăng Nhập" value="<?php echo $loadtk['tai_khoan'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mật Khẩu</label>
                                <input type="text" class="form-control" name="pass" placeholder="Pass" value="<?php echo $loadtk['mat_khau'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Họ Tên</label>
                                <input type="text" class="form-control" name="accuser" placeholder="Tên người dùng" value="<?php echo $loadtk['ho_ten'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email người dùng</label>
                                <input type="emali" class="form-control" name="email" placeholder="Email" value="<?php echo $loadtk['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">SDT người dùng</label>
                                <input type="number" class="form-control" name="phone" placeholder="Số Điện Thoại" value="<?php echo $loadtk['so_dt'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Địa Chỉ</label>
                                <input type="text" class="form-control" name="adress" placeholder="Địa chỉ" value="<?php echo $loadtk['dia_chi'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Vai Trò</label>
                                <input type="text" class="form-control" name="role" placeholder="Vai Trò" value="<?php echo $loadtk['vai_tro'] ?>">
                            </div>
                            <div class="form-group"> 
                                <input type="hidden" name="id" value="<?php echo $loadtk['ma_kh']; ?>"> <!-- corrected hidden input value -->
                                <button type="submit" class="btn btn-primary" name="up">Submit</button>
                                <a href="index.php?act=listuser" class="btn btn-dm">Danh Sách</a>
                            </div>
                    </form>
            </table>
        </div>
</div>