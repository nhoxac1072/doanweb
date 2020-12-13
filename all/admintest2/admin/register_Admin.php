<?php
function postindex($index, $value="")
	{
		if (!isset($_POST[$index]))	return $value;
		return trim($_POST[$index]);
	}
	$username 	= postindex("username");
	$password1	= postindex("password1");
	$password2	= postindex("password2");

	$sm 		= postindex("submit");
	include '../connect.php';
	$message = "dang ki thanh cong";
		if ($sm !="")
			{
				$err= "";
				if (strlen($username)<5 ) 		$err .="Username ít nhất phải 6 ký tự!<br>";
				if ($password1!= $password2) 	$err .="Mật khẩu và mật khẩu nhập lại không khớp. <br>";
				if(strlen($password1)<6) 		$err .="Mật khẩu phải ít nhất 8 ký tự.<br>";
				if(str_word_count($username)>2) $err .="tài khoản phải viết liền không dấu";
				?>
				<div class="info">
					<?php
					if($err!="") 
					echo $err;

						else if (isset($_POST['submit']))
						{

							$e=$_POST['username'];
							$p=$_POST['password1'];
	
							$sql="insert into admin (username,Password) value(?,?)";
							$stm=$conn->prepare($sql);
							$stm->execute([$e,$p]);

							//console_log($message);
							header("location:login.php");
							//echo $message;
						}	
						?>
				</div>
				<?php
			}

?>
<html lang="en">
<head>
	<title>Register ADMIN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../assets/css/main.css" rel="stylesheet" />
	<link href="../assets/css/util.css" rel="stylesheet" />
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" method="POST" action="register_Admin.php">
					<span class="login100-form-title p-b-32">
						Account Register
					</span>

					<span class="txt1 p-b-11">
						Username
					</span>					
					<div class="wrap-input100 validate-input m-b-36" >		

                        <input class="input100" type="text" name="username" value="" placeholder="username"> 
                        
						<span class="focus-input100"></span>
					</div>
                    <span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" >						
						<input class="input100" type="password" name="password1" >
						<span class="focus-input100"></span>
					</div>
                    <span class="txt1 p-b-11"> <!--class="btn-show-pass"  class dùng hiển thị password--> 
						Repassword
					</span>
					<div class="wrap-input100 validate-input m-b-12">   
                    <span > <!--class="btn-show-pass"  class dùng hiển thị password--> 
							<!-- <i class="fa fa-eye"></i> -->
                        </span>

                        <input class="input100" type="password"  name="password2" value="">  
                        
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
                    <div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form-checkbox">
							<!-- <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me"> -->
							<!-- <label class="label-checkbox100" for="ckb1"> -->
							</label>
						</div>

						<div>
							<a href="login.php" class="txt3">
								want to login?
							</a>
                        </div>
                    </div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit" value="register">	
							register						
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

    <!-- <div id="dropDownSelect1"></div> -->
<!--===============================================================================================-->
	<script src="..login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="..login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="..login/vendor/bootstrap/js/popper.js"></script>
	<script src="..login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="..login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="..login/vendor/daterangepicker/moment.min.js"></script>
	<script src="..login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="..login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="..login/js/main.js"></script>
</body>

</html>
