<?php
session_start();
if(isset($_SESSION['account']) && isset($_SESSION['password'])){
    unset($_SESSION['account']);
    unset($_SESSION['password']);
    header("location:../index.php");
}
?>