<?php
function update($id, $ten_loai, $imgs, $trang_thai) {
    $sql = "UPDATE danh_muc SET ten_dm = '$ten_loai', imgs = '$imgs' ,trang_thai = '$trang_thai' WHERE ma_dm = $id";
    pdo_execute($sql);
}

function updatesp($tensp, $gia, $gianew, $mHang, $mota, $hinh,$id) {
    $sql = "UPDATE san_pham SET ten_sp = '$tensp', don_gia = '$gia', giam_gia = '$gianew', ma_dm = '$mHang', hinh_anh = '$hinh', mo_ta = '$mota' WHERE ma_sp = $id";
    pdo_execute($sql);
}


function updateha($hinh, $ma_ha){
    $sql = "UPDATE hinh_anh SET hinh = '$hinh' WHERE ma_ha = $ma_ha";
    pdo_execute($sql);
}


function updatesl($id, $number){
    $sql = "UPDATE so_luong SET so_luong = '$number' WHERE ma_sl = $id";
    pdo_execute($sql);
}

function updatekh($name, $pass, $nameuse, $email, $phone, $adress, $role, $id){
    $sql = "UPDATE khach_hang SET tai_khoan = '$name', mat_khau = '$pass', ho_ten ='$nameuse', email = '$email', so_dt = '$phone', dia_chi='$adress', vai_tro = '$role' WHERE ma_kh = $id";
    pdo_execute($sql);
}

function updateuser($acc, $name, $phone, $email,$adress){
    $sql = "UPDATE khach_hang SET ho_ten ='$name', so_dt = '$phone', email = '$email', dia_chi='$adress' WHERE tai_khoan = '$acc'";
    pdo_execute($sql);
}

function updatekho($id, $mau, $kt, $number){
    $sql = "UPDATE so_luong SET so_luong = '$number' WHERE ma_sp = $id AND ten_ms = '$mau' AND ten_kt = '$kt'";
    pdo_execute($sql);
}

function updateVoucher($id, $voucher, $name, $giatri, $datebd, $datekt){
    $sql = "UPDATE voucher SET name_vc = '$name', loai_km = '$voucher', gt_vc = '$giatri', ngay_bd = '$datebd', ngay_kt = '$datekt' WHERE ma_vc = $id";
    pdo_execute($sql);
}

function updatedh($id, $name, $phone, $email, $address, $ptttPay, $ptvc, $voucher, $tt){
    $sql = "UPDATE don_hang SET nguoi_nhan = '$name', so_dt = '$phone', email= '$email', dia_chi = '$address', pt_tt = '$ptttPay', pt_vc = '$ptvc', voucher = '$voucher', thanh_tien = '$tt', trang_thai = 'Chờ xác nhận' WHERE ma_dh = $id";
    pdo_execute($sql);
}
// function updatems($id, $ten_mau){
//     if (!empty($id)) {
//         $sql = "UPDATE mau_sac SET ten_mau = '$ten_mau' WHERE ma_ms = $id";
//         pdo_execute($sql);
//     } else {
//         // Xử lý khi $id không hợp lệ
//     }
// }


// function updatekt($ten_kt){
//     $sql = "UPDATE kich_thuoc SET ten_kt = ? WHERE ma_kt = ?";
//     pdo_execute($sql);
// }

?>