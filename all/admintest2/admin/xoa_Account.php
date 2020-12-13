<?php
	include '../connect.php';
	if(isset($_GET['Xoa']))
	{
		$username=$_GET['username'];
		
		$sql = "delete from account where username = '$username' ";		
	    $conn->query($sql);	
		header('location:account.php');	}
	//$sql = mysql_connect("select * from qlks") ;
	else if(isset($_GET['delete']))
	{
		$username=$_GET['username'];
		$sql = "delete from admin where username = '$username' ";		
	    $conn->query($sql);	
		header('location:account.php');	
	}
?>
