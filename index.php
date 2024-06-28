<?php
session_start();
include "model/pdo.php";
include "model/insert.php";
include "model/delete.php";
include "model/update.php";
include "model/select.php";
include "model/sanpham.php";
include "model/viewproduct.php";
include "view/header.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['key'])){
        $key = $_POST['key'];
        $_SESSION['key'] = $key;
        header("location:index.php?act=timkiem");
    }
}

if(!isset($_SESSION['cart'])) $_SESSION['cart']=[];
if(isset($_POST['addTocart'])){
  $sl = 1;
  $id=$_POST['id'];
  $sp = loadsp($id);
  $name=$sp['ten_sp'];
  $size = $_POST['size'];
  $price= $_POST['price'];
  $color = $_POST['color'];
  $mau = loadmauone($id,$color);
  $ha = load4ha($mau['ma_ms']);
  $img = $ha[0]['hinh'];
  $i = 0;$check = 0;
  foreach($_SESSION['cart'] as $cart){
    if($cart[0]==$id && $cart[4]==$color && $cart[5]==$size){
      $sl = $sl + $cart[6];
      $check = 1;
      $_SESSION['cart'][$i][6] = $sl;
    }$i++;
  }
  if($check==0){
  $cart = [$id,$img,$name,$price,$color,$size,$sl];
array_push($_SESSION['cart'],$cart);}
header("location:index.php?act=cart");
}

$dm = loadAll();
if(isset($_GET['act']) && $_GET['act']){
    $act = $_GET['act'];
    switch($act){
        case "login":
            include "view/login.php";
            break;
        case "signup":
            include "view/addlogin.php";
            break;
        case "ct":
            if(isset($_SESSION['account'])){
                $acc = $_SESSION['account'];
                $user = loadkh($acc);
              }
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }

            if(isset($_GET['ms'])){
                $ms = $_GET['ms'];
            }
            $sp = loadsp($id);
            $dm = loaddm($sp['ma_dm']);
            $mau = load_mau_by_product_id($id);
            $maus = loadms($ms);
            $spcl = spcungloai($id, $sp['ma_dm']);
            $kt = load_sizes_by_product_id($id);
            $listbl =blhh($id);
            include "view/sanpham/chitietsp.php";
            break;
        case "dmsp":
            include "view/sanpham/spalldm.php";
            break;
        case "profile":
            if(isset($_SESSION['account'])){
                $acc = $_SESSION['account'];
                $user = loadkh($acc);
                $acc = $user['tai_khoan'];
            }
            include "view/profiles.php";
            break;
        case "timkiem";
            include "view/sanpham/timkiem.php";
            break;
        case "cart":
            include "view/cart.php";
            break;
        case "dathang":
            include "view/dathang.php";
            break;
        case 'huy':
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }
            $dh = loadiddh($id);
            if($dh['trang_thai'] == "Chờ xác Nhận"){
                $sql = "SELECT * FROM ct_don_hang WHERE ma_dh = $id";
                $ct = pdo_query($sql);
                foreach($ct as $sllp){
                    $id = $sllp['ma_sp'];
                    $mau = $sllp['ten_mau'];
                    $kt = $sllp['ten_kt'];
                    $number = $sllp['so_luong'];
                    $sqll = "UPDATE so_luong SET so_luong = so_luong + $number WHERE ma_sp = $id AND ten_ms = '$mau' AND ten_kt = '$kt'";
                    pdo_execute($sqll);
                }
                deldh($id);
                del($id);
                header("location:index.php?act=profile&listpro=lsmh");
            }else{
                $sql = "SELECT * FROM ct_don_hang WHERE ma_dh = $id";
                $ct = pdo_query($sql);
                foreach($ct as $sllp){
                    $idd = $sllp['ma_sp'];
                    $mau = $sllp['ten_mau'];
                    $kt = $sllp['ten_kt'];
                    $number = $sllp['so_luong'];
                    $sqll = "UPDATE so_luong SET so_luong = so_luong + $number WHERE ma_sp = $idd AND ten_ms = '$mau' AND ten_kt = '$kt'";
                    pdo_execute($sqll);
                } 
                $sql = "UPDATE don_hang SET trang_thai = 'Hủy' WHERE ma_dh = $id";
                pdo_execute($sql);
                header("location:index.php?act=profile&listpro=lsmh");
            }
            break;
        case "camon":
            include "view/camon.php";
            break;
        default:
        include "view/home.php";
        break;
    }
}else{
    include "view/home.php";
}

include "view/footer.php";

?>