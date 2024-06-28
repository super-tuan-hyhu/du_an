<?php
session_start();
if(isset($_GET['id'])){
    
    array_splice($_SESSION['cart'],$_GET['id'],1);
   
        header("location:../index.php?act=cart");
}else if(isset($_GET['ma_dh'])){
    $ma_dh = $_GET['ma_dh'];
    $_SESSION['cart']=[];
    header("location:../index.php?act=dathang&id=$ma_dh");}
else if(!isset($_GET['id']) && !isset($_GET['ma_dh'])){
    $_SESSION['cart']=[];
    header("location:../index.php?act=cart");
}
?>