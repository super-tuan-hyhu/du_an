<?php

function loadall_sanpham_home(){
    $sql="select * from san_pham ORDER BY ma_sp desc limit 0,8";
    $listsanpham=pdo_query($sql);
    return  $listsanpham;
}


function spyeuthich(){
    $sql = "SELECT * FROM san_pham ORDER BY luot_xem DESC limit 5";
    $spyt = pdo_query($sql);
    return $spyt;
}



// function get_products_with_pagination($page, $items_per_page) {
//     $offset = ($page - 1) * $items_per_page;
//     $sql = "SELECT * FROM sanpham ORDER BY id LIMIT $offset, $items_per_page";
//     $result = pdo_query($sql);
//     return $result;
// }

// function loadall_sanpham_top10(){
//     $sql="select * from sanpham where 1 order by luotxem desc limit 0,4";
//     $listsanpham=pdo_query($sql);
//     return $listsanpham;
// }
// function load_sanpham_cungloai($id, $iddm){
//     $sql = "select * from sanpham where iddm = $iddm and id <> $id";
//     $result = pdo_query($sql);
//     return $result;
// }


?>
