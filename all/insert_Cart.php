<?php
if (!isset($_SESSION)) session_start();
$tam= isset($_SESSION['cart'])?$_SESSION['cart']:[];
$gia=$_GET['price'];
//var_dump($gia);
$action= isset($_GET['action'])?$_GET['action']:'';
if ($action=='them')
{
	$maphong = isset($_GET['Maphong'])?$_GET['Maphong']:'';
	//$gia = isset($_GET['price'])?$_GET['price']:'';

	$soluong = 1;
	if ($maphong!='')
	{
		if (isset($tam[$maphong]))
		{
			$tam[$maphong] += $soluong ;

			$tam[$maphong]['gia']=$tam[$maphong]*$gia;
			var_dump($tam);
		}
		else 
		{
			$tam[$maphong]= $soluong;
			$tam[$maphong]['gia']=$gia;
			//$tam[$price] =$gia;
		}
			
	}
	// if($gia!='')
	// {
	// 	//if(isset($tam[$gia]))

	// }
	//var_dump($tam);
}
if ($action=='xoa')
{
	$maphong= isset($_GET['maphong'])?$_GET['maphong']:'';
	unset($tam[$maphong]);
	
}


if(isset($_POST['capnhap']))
foreach($_POST['soluong'] as $key => $value){           
         $tam[$key] = $value;                   
 }
    

$_SESSION['cart']= $tam;

 header('location:giohang.php');
?>