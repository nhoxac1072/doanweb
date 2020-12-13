<?php session_start(); // khởi động session ;
 
if (isset($_SESSION['user'])){
    unset($_SESSION['user']); // xóa session login
    header('location:login.php');
}
?>
