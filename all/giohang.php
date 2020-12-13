<?php   
if (!isset($_SESSION)) session_start();
function postindex($index, $value="")
	{
		if (!isset($_POST[$index]))	return $value;
		return trim($_POST[$index]);
	}
$tam= isset($_SESSION['cart'])?$_SESSION['cart']:[];
	if(isset($_POST['click']))
	{
		if(!isset($_SESSION['username']['username']))
		{
			Header('location:login.php');
		}
	}

	if(isset($_SESSION['username']['username']))
	{
		if(isset($_POST['click']))
		{
			include 'connection/connection.php';

			$fullname=postindex("name");
			$date=postindex("date");
			$sdt=postindex("phone");
			$mail=postindex("mail");
			$daybd=postindex("ngaybd");
			$daykt=postindex("ngaykt");
//print_r($_POST);
			//echo $fullname;


			$s1=2;
			$s2=3;

			$err= "";
			if (strlen("$fullname")<5 )     $err .=" tên  ít nhất phải 6 ký tự!<br>";
			if (strlen("$sdt") >12 )      	$err .=" không phải sđt!<br>";
			if(($daybd -$daykt)<0)		$err .="đặt sai thông tin ngày";
			if(str_word_count("$fullname")<2) $err .="tên tối thiểu 2 từ";
			
			?>
				<div class="info">
					<?php
					if($err!="") 
					echo $err;
					else 	
					{
						
						
						// $name=$_POST['name'];
						// $date=$_POST['date'];
						// $sdt=$_POST['phone'];
						// $email=$_POST['email'];
						// $ngaybd=$_POST['ngaybd'];
						// $ngaykt=$_POST['ngaykt'];
						$maphong=''.$s1.$s2;
						echo $maphong;
						$sql="insert into donphong (Madonphong,Tenkh,ngaysinh,sdt,email,ngaydat,ngaykt) values('$maphong','$fullname','$date','$sdt','$mail','$daybd','$daykt')";
						echo $sql;
						$stm=$conn->query($sql);
						
						// $stm->execute([$name,$date,$sdt,$email,$ngaybd,$ngaykt]);
						//var_dump($stm_ex);exit;
						//$insert_string="";
						if(isset($_SESSION['cart']))
						{
							foreach ($_SESSION['cart'] as $key => $value) 
					
							{
							
								$sql= "select * from phong where Maphong ='{$key}'";
								$stm = $conn->query($sql);
								$data = $stm->fetchAll();
								$gia=$data[0]['price'];
								$sql4="insert into chitietdonphong(Madonphong,Maphong,soluong,price) values('$maphong','$key','$value','$gia')";
								$stm=$conn->query($sql4);
								$maphong=$maphong+1;
								unset($_SESSION['cart']);
								// $insert_string.= "(NULL,NULL, '".$data['Maphong']."', '".$value."', '".$data['price']."', '".$daybd."', '".$daykt."')";
							}
						}
						
					}	
					?>
				</div>
			<?php
		}
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Hotel Template">
		<meta name="keywords" content="Hotel, unica, creative, html">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Hotel</title>
		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css?family=Taviraj:300,400,500,600,700,800,900&display=swap"
			rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
			<!-- Css Styles -->
			<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
			<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
			<link rel="stylesheet" href="css/flaticon.css" type="text/css">
			<link rel="stylesheet" href="css/linearicons.css" type="text/css">
			<link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
			<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
			<link rel="stylesheet" href="css/nice-select.css" type="text/css">
			<link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
			<link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
			<link rel="stylesheet" href="css/style.css" type="text/css">
	</head>
		<body>
			<!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    <a href="./index.php"><img src="img/logo.png" alt=""></a>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <nav class="main-menu mobile-menu">
                                <ul>
                                    <li><a href="./index.php">Home</a></li>         
                                    <li><a href="./rooms.php">Rooms</a></li>                        
                                    <li><a href="./contact.php">Contact</a></li>
                                    
                                </ul>
                            </nav>
                            <div class="top-info">
                            
                                <!-- <img src="img/placeholder.png" alt=""> -->
                                <nav class="main-menu mobile-menu">
                                    <ul> 
                                        <?php if (isset($_SESSION['username'])) : ?>
                                        <li><a href="profile.php"><?php echo $_SESSION['username']['username'] ?> </a> </li>
                                        <li><a href="./logout.php">LogOUT</a></li>
                                        <li><a href="./giohang.php">đơn phòng</a></li>
                                        <?php else : ?>
                                        <li><a href="./login.php">Login</a></li>                        
                                        <li><a href="./register.php">Register</a></li>
                                        <li><a href="./giohang.php">đơn phòng</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->
			<br>
			<br>
			<br> <!-- cách xuống dòng -->
			<br>
			<br>
			<br>
				<?php 
					if(isset($_SESSION['username'])) 
					{
				?>
						<legend align="center" style="margin:0 auto"> ĐƠN ĐẶT PHÒNG</legend>
						<form action="giohang.php" method="post" enctype="multipart/form-data">
							<table align="center" border="0">
								<tr>
									<td>Tên khách hàng:</td>
									<td><input type="text" name="name" value="" placeholder="Nhập họ tên"></td>
								</tr>
								<tr>
									<td>Ngày sinh:</td>
									<td><input type="date" name="date"></td>
								</tr>
								<tr>
									<td>Số điện thoại:</td>
									<td><input type="text" name="phone" placeholder="Nhập số điện thoại"></td>
								</tr>
								<tr>
									<td>Email:</td>
									<td><input type="text" name="mail" placeholder="Nhập Email"></td>
								</tr>
								<tr>
									<td>Ngày đặt:</td>
									<td><input type="date" name="ngaybd"></td>
								</tr>
								<tr>
									<td>Ngày kết thúc:</td>
									<td><input type="date" name="ngaykt" ></td>
								</tr>
								<tr >

									<td>
									<div align="center">
                                    <a href="./rooms.php"> Trở về </a>
                                    &nbsp;&nbsp;
                                    <input type="submit" value="Đặt phòng" name="click">
                                </div>
                                </td>
									<!-- <td  align="center">
										<a href="./rooms.php"> Trở về </a>
                                    &nbsp;&nbsp;
										<input type="submit" name="click" value="đặt hàng">
									</td> -->
								</tr>
                                
                            
							</table>
							
                        </form>
                        <?php
					}
                    else
                    {
						echo "<h2 align='center'> Bạn chưa đăng nhập </h2>";
                    }
                    ?>

                        

                        <div class="container">
                            <form action="insert_Cart.php?action=capnhat" method="post" class="">
                                <div align="center">
                                    <a href="./rooms.php"> Trở về </a>
                                    &nbsp;&nbsp;
                                    <input type="submit" value="Cập nhật" name="capnhat">
                                </div>
                            </form>
                        </div>
                			


            <br>
    <?php

    	 if(isset($_SESSION['cart'])&& $tam!=0)
    		{
    		?>
    		
			<table border="1" align="center" width="700">
				<?php
				$o = new PDO('mysql:host=localhost;dbname=qlks', 'root','');
				?>
				<tr align="center">
					<td>STT</td>
					<!-- <td>&nbsp;</td> -->
					<td> Mã phòng</td>
					<td> Tên phòng</td>
					<td> Giá phòng </td>
					<td> Số lượng </td>
					<td> Giá tổng</td>
					
					<td> Thao tác</td>
				</tr>
				<?php
				$i=0;
				$sum=0;
				foreach ($tam as $key => $value) 
					//var_dump($key);exit;
				{
					$sql= "select * from phong where Maphong ='{$key}'";
					$stm = $o->query($sql);
					$data = $stm->fetchAll();
					$i=1;
					
				?>
				<tr align="center">
					<td><?php echo $i++ ?></td>
					<!-- <td><?php $key ?></td> -->
					<td><?php echo $data[0]['Maphong'] ?></td>
					<td><?php echo $data[0]['Tenphong'] ?></td>
					<td><?php echo $data[0]['price'] ?>$</td>
					<!-- <td name="soluong"><?php echo $value ?></td> -->
					<td ><input align="center" name="soluong" value="<?php echo $value ?>"></td>
					<td><?php echo $data[0]['price'] * $value ?>$</td>

					<td><a href="insert_Cart.php?action=xoa&maphong=<?php echo $key ?>"> Xóa </a></td>
				</tr>				
				<?php 
					$total =$data[0]['price']*$value;
					$sum=($sum+$total);
					$tam['price']=$sum;
				}

					//$sum=($sum + $total);
				?>

				<tr>

					<td colspan="5	" align="right">tổng cộng:</td> <!-- gộp cột collspan -->
					<td align="right"><?php echo  "$sum $ "; ?></strong></td>
					<td align="right" colspan="1"><strong></td>
				</tr>
			</table>
			<?php
		}
		?>
			<!-- Js Plugins -->
			<script src="js/jquery-3.3.1.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>
			<script src="js/jquery-ui.min.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>
			<script src="js/jquery.slicknav.js"></script>
			<script src="js/owl.carousel.min.js"></script>
			<script src="js/main.js"></script>
		</body>
	</html>

	<!--  -->