<?php
	include 'connection/connection.php';
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
	
	<style>
		body {
  		background-image: url("pictures/test.jpg");
		}
	</style>


</head>
<body background-image="">
	 	<legend align="center" style="margin:0 auto">Thông tin đăng ký</legend>
		<form action="register_submit.php" method="post" enctype="multipart/form-data">
			<table class="info" align="center">
				<tr>
					<td>Tên đăng nhập:</td>
					<td><input type="text" name="username" value="" placeholder="username"></td>
				</tr>
				<tr>
					<td>Mật khẩu:</td>
					<td><input type="password" name="password1" placeholder="mật khẩu" /></td>
				</tr>
				<tr>
					<td>Nhập lại mật khẩu:</td>
					<td><input type="password" name="password2" placeholder="nhập lại mật khẩu"/></td>
				</tr>
				<tr>
					<td>Họ Tên:</td>
					<td><input type="text" name="name" value="" /></td>
				</tr>
				<tr>
					<td>số điện thoại</td>
					<td><input type="number" name="phone" value="" /></td>
				</tr>
				<tr>
					<td>email</td>
					<td><input type="email" name="email" value="" /></td>
				</tr>
				<tr>
					<td>ngày sinh</td>
					<td><input type="date" name="birthday" value="" /></td>
				</tr>

				<tr>
					<td colspan="2" align="center"><input type="submit" value="submit" name="submit"></td>
			</tr>
			
			</table>
		</form>
		<?php

?>
</body>
</html>
