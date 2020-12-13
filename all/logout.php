<?php session_start(); // khởi động session ;
 
if (isset($_SESSION['username']))
{
    unset($_SESSION['username']); // xóa session login
    header('location:index.php');
}
?>
