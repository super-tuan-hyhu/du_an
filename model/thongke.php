<?php
function load_thongke_sanpham_danhmuc() {
    $sql = "SELECT dm.id, dm.name, COUNT(*) as soluong, MIN(price) as gia_min,
        Max(price) as gia_max, AVG(price) as gia_avg
        FROM danhmuc dm 
        JOIN sanpham sp 
        ON dm.id = sp.iddm
        GROUP BY dm.id, dm.name
        ORDER BY soluong DESC";

    return pdo_query($sql);
}
?>