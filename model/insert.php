<?php
// Trang này dùng để thêm và sửa lại danh mục và sản phẩm 
// insert dùng để thêm giá trị cho bảng
function insert_danhmuc($ten_loai, $hinhanh, $trang_thai) {
    $sql = "INSERT INTO danh_muc(ten_dm, imgs ,trang_thai) VALUES ('$ten_loai', '$hinhanh', '$trang_thai')";
    pdo_execute($sql);
}

function sp($tensp, $gia, $gianew, $mHang, $mota, $hinh) {
    $sql = "INSERT INTO san_pham(ten_sp, don_gia, giam_gia, hinh_anh, mo_ta, ngay_dang, ma_dm) 
            VALUES ('$tensp', '$gia', '$gianew', '$hinh', '$mota', NOW(), '$mHang')";
    pdo_execute($sql);
}

function addmau($ma_sp, $mau) {
    // Kiểm tra giá trị của $mau trước khi thực hiện câu lệnh SQL
    if ($mau !== null) {
        $sql = "INSERT INTO mau_sac VALUES(null, '$mau', '$ma_sp')";
        pdo_execute($sql);
    } 
}

function addsizes($ma_sp, $size) {
    // Kiểm tra giá trị của $mau trước khi thực hiện câu lệnh SQL
    if ($size !== null) {
        $sql = "INSERT INTO kich_thuoc VALUES(null, '$size', '$ma_sp')";
        pdo_execute($sql);
    }
}

function upsize($id, $size){
    $sql = "INSERT INTO kich_thuoc(ma_kt, ten_kt, ma_sp) VALUES(null, '$size', '$id')";
    $listms = pdo_execute($sql);
    return $listms;
}
function upmau($id, $color){
    $sql = "INSERT INTO mau_sac(ma_ms, ten_mau, ma_sp) VALUES(null, '$color', '$id')";
    $listms = pdo_execute($sql);
    return $listms;
}

function addha($ma_ms, $img){
    $sql = "INSERT INTO hinh_anh VALUES (null, '$ma_ms', '$img')";
    pdo_execute($sql);
}

function addsl($masp,$tenms,$tenkt){
    $sql = "INSERT INTO so_luong(ma_sp,ten_ms,ten_kt) VALUES('$masp','$tenms','$tenkt')";
    pdo_execute($sql);
}

function addkh($name, $pass, $email, $adress){
    $sql = "INSERT INTO khach_hang(tai_khoan, mat_khau, email, dia_chi) VALUES('$name', '$pass', '$email', '$adress')";
    pdo_execute($sql);
}

function addbl($iduser, $id, $bl, $date){
    $sql = "INSERT INTO binh_luan VALUES(null, '$iduser', '$id' , '$bl', '$date')";
    pdo_execute($sql);
}

function addVoucher($voucher, $name, $giatri, $datebd, $datekt){
    $sql = "INSERT INTO voucher VALUES(null, '$voucher', '$name', '$giatri', '$datebd', '$datekt')";
    pdo_execute($sql);
}

function adddh0($acc){
    $date = date('y-m-d');
    $sql = "INSERT INTO don_hang(ngay_tao,tai_khoan) VALUES('$date','$acc')";
    pdo_execute($sql);
}

function addctdh($ma_sp,$ten_sp,$gia,$mau,$kt,$sl,$ma_dh){
    $sql = "insert into ct_don_hang values(null,'$ma_sp','$ten_sp','$gia','$mau','$kt','$sl','$ma_dh')";
    pdo_execute($sql);
}
 ?>
