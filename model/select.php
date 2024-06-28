<?php
// tren là sp 
// Trang này là để truy vấn dữ liệu 
function loadAll(){
    $sql = "SELECT ma_dm, ten_dm, trang_thai,imgs, updateat FROM danh_muc";
    return pdo_query($sql); // Giả sử pdo_query trả về kết quả truy vấn
}

function loaddm($id){
    $sql="select * from danh_muc where ma_dm=$id";
    $dm = pdo_query_one($sql);
    return $dm;
}


function loadall_sp(){
    $sql="select * from san_pham order by ma_sp desc";
     $listsp=pdo_query($sql);
     return $listsp;
}

function spcungloai($id, $ma_loai){
    $sql = "SELECT * FROM san_pham where ma_dm = $ma_loai and ma_sp <> $id";
    $spcl = pdo_query($sql);
    return $spcl;
}

function loadsp($id) {
    $sql = "SELECT * FROM san_pham WHERE ma_sp = ?";
    return pdo_query_one($sql, $id);
}

// Màu sắc và size
function loadsize(){
    $sql = "SELECT ma_kt, ten_kt, ma_sp FROM kich_thuoc";
    return pdo_query($sql);
}
function loadmau(){
    $sql = "SELECT ma_ms, ten_mau, ma_sp FROM mau_sac";
    return pdo_query($sql);
}
function load_sizes_by_product_id($id) {
        $sql = "SELECT ma_kt, ten_kt, ma_sp FROM kich_thuoc WHERE ma_sp = $id";
        $kt = pdo_query($sql);
        return $kt;
}

function load_mau_by_product_id($id) {
    $sql = "SELECT ma_ms, ten_mau, ma_sp FROM mau_sac WHERE ma_sp = $id";
    $kt = pdo_query($sql);
    return $kt;
}

function loadms($id){
    $sql = "select * from mau_sac where ma_ms = $id";
    $ms= pdo_query_one($sql);
    return $ms;
}

function loadmauone($id,$color){
    $sql = "select * from mau_sac where ma_sp = $id and ten_mau = '$color' ";
    $mau=pdo_query_one($sql);
    return $mau;
}

// end mau size 
function loadha($id){
    $sql = "SELECT * FROM hinh_anh WHERE ma_ms = $id";
    $ha = pdo_query($sql);
    return $ha;
}

function load4ha($id){
    $sql = "SELECT * FROM hinh_anh WHERE ma_ms = $id LIMIT 4";
    $ha = pdo_query($sql);
    return $ha;
}

function loadsl($id){
    $sql = "SELECT * FROM so_luong WHERE ma_sp = $id";
    $sl = pdo_query($sql);
    return $sl;
}

function loadkhoHang($id, $mau, $kt){
    $sql = "SELECT * FROM so_luong WHERE ma_sp = $id and ten_ms = '$mau' and ten_kt = '$kt'";
    $khohang = pdo_query_one($sql);
    return $khohang;
}

function loadall_kh(){
    $sql = "SELECT * FROM khach_hang";
    $listkhh = pdo_query($sql);
    return $listkhh;
}
function loadtk($id){
    $sql = "SELECT *FROM khach_hang WHERE ma_kh = $id";
    $listone = pdo_query_one($sql);
    return $listone;
}
function loadkh($name){
    $sql = "SELECT * FROM khach_hang where tai_khoan = '$name'";
    $user = pdo_query_one($sql);
    return $user;
}

function loadallbl(){
    $sql = "SELECT * FROM binh_luan";
    $listbl = pdo_query($sql);
    return $listbl;
}

function blhh($id){
    $sql="SELECT * FROM binh_luan WHERE ma_sp = $id order by ma_bl desc";
    $blhh=pdo_query($sql);
    return $blhh;
}



function loadallvoucher(){
    $sql = "SELECT * FROM voucher order by ma_vc desc";
    $vc = pdo_query($sql);
    return $vc;
}

function loadvoucher($namevc){
    $sql = "SELECT * FROM voucher where name_vc = '$namevc'";
    $vc=pdo_query_one($sql);
    return $vc;
}

function loadvc($id){
    $sql = "SELECT *FROM voucher WHERE ma_vc = $id";
    $vc = pdo_query_one($sql);
    return $vc;
}

function dh($id){
    $sql = "SELECT * FROM don_hang WHERE ma_dh = '$id'";
    $dhh = pdo_query_one($sql);
    return $dhh;
}

function loadall_dh(){
    $sql = "SELECT * FROM don_hang WHERE trang_thai <> 'Chưa hoàn thành' order by ma_dh desc";
    $listdh = pdo_query($sql);
    return $listdh;
}

function loadctdh($id){
    $sql = "SELECT * FROM ct_don_hang WHERE ma_dh = $id";
    $ctdh = pdo_query($sql);
    return $ctdh;
}

function loadiddh($id){
    $sql = "SELECT * FROM don_hang WHERE ma_dh = $id";
    $dh = pdo_query($sql);
    return $dh;
}

function dhcomplete($acc){
    $sql="select * from don_hang where tai_khoan = '$acc' and trang_thai != 'Hủy' order by ma_dh desc";
     $yourdh=pdo_query($sql);
     return $yourdh;
}

?>