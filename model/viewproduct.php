<?php
    if(isset($_GET['act']) && $_GET['act']=="ct" && isset($_GET['id']) ){ 
    $id = $_GET['id'];
    $sql = "UPDATE san_pham SET luot_xem = luot_xem + 1 where ma_sp = $id";
    pdo_execute($sql);
    }
?>