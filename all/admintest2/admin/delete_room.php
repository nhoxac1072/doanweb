<?php
	include '../connect.php';
	if(isset($_GET['Xoa']))
	{
		$maphong=$_GET['maphongs'];


		$sql = "delete from phong where maphong = '$maphong' ";
					$conn->query($sql);
					echo" xóa thành công ";
					header('location:phong.php');

	}
		// $sql1="select * from loaiphong";
		// $stm=$conn->query($sql1);
		// $data=$stm->fetchall();
		// //var_dump($data);
		// //var_dump($data1);
		// $sql2="select * from phong where Maphong='$maphong'";
		// 	$stm=$conn->query($sql2);
		// 	$data1=$stm->fetchall();
		// 	//var_dump($data1);
		// foreach ($data as $key => $value1) {
		// 		# code...

		// //var_dump($value['MaLoai']);
		// 	$sql2="select * from phong where Maphong='$maphong'";
		// 	$stm=$conn->query($sql2);
		// 	$data1=$stm->fetchall();
		// 	//var_dump($data1['Maphong']);
		// 	foreach ($data1 as $value) {
		// 		//var_dump($value1['MaLoai']);
		// 		if($value['MaLoai']==$value1['MaLoai'])
		// 		{
		// 			echo" xóa ko thành công";
		// 			exit;
		// 		}	
		// 		else
		// 		{
					
		// 		}
		// 	}
			// else
			// {
			// 	$sql = "delete from phong where maphong = '$maphong' ";
			// 	$conn->query($sql);
			// 	echo"<script language='javascript'>alert(xóa thành công)</script>";
			// }

	// 	}

	// }




		// $sql = "delete from phong where maphong = '$maphong' ";
		// $conn->query($sql);	
		//header('location:phong.php');	}

?>







<!-- if(isset($_GET['Xoa']))
	{
		$maphong=$_GET['maphong'];
		
		$sql = "delete from phong where maphong = '$maphong' ";
		
	$conn->query($sql);	
		header('location:phong.php');	} -->
