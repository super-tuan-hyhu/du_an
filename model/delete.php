<?php

function deleteProduct($id){
    $sql = "DELETE FROM danh_muc where ma_dm= $id";
    pdo_execute($sql);
}

function deletesp($id){
    $sql = "DELETE FROM san_pham where ma_sp= $id";
    pdo_execute($sql);
}

function delms($id){
    $sql = "DELETE FROM mau_sac where ma_ms= $id";
    pdo_execute($sql);
}

function delkt($id){
    $sql = "DELETE FROM kich_thuoc where ma_kt= $id";
    pdo_execute($sql);
}

function delmau($id){
    $sql = "DELETE FROM mau_sac where ma_ms= $id";
    pdo_execute($sql);
}

function delha($id){
    $sql = "DELETE FROM hinh_anh where ma_ha = $id";
    pdo_execute($sql);
}

function deleteVc($id){
    $sql = "DELETE FROM voucher WHERE ma_vc = $id";
    pdo_execute($sql);
}

function deldh($id){
    $sql = "DELETE FROM don_hang WHERE ma_dh = $id";
    pdo_execute($sql);
}

function del($id){
    $sql = "DELETE FROM ct_don_hang WHERE ma_dh = $id";
    pdo_execute($sql);
}
?>