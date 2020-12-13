<?php
	
	include '../connect.php';
	$action= isset($_GET['action'])?$_GET['action']:'';

	if($action=='tim')
	{
		$maloai=isset($_GET['MaLoai'])?$_GET['MaLoai']:'';
	}

?>