<?php
	include '../connect.php';
	if (isset($_POST['edit'])){
		$_SESSION['user']
		$m=$_POST['maphong'];
		$t=$_POST['tenphong'];
		
		$sql="UPDATE phong SET photo=$photo and Tenphong=$t  WHERE Maphong=$m";
		$stm=$conn->prepare($sql);
		$stm->execute(array($t,$m));
			
		header("location: phong.php");

	}
	
	
?>
