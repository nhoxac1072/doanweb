<?php
session_start();
try
{
require_once("../connect.php");

    if(isset($_POST["login"]))
    {
      if(empty($_POST["username"])  || empty($_POST["password"]))
      {
        $message = '<label> All field is required </lable>';
      }
      else
      {
          $username=$_POST["username"];
          $password=$_POST["password"];
        $query = "SELECT * FROM admin WHERE username = '$username' AND Password = '$password' LIMIT 1";// gán biến chứ đừng gọi name nó không hiểu, limit 1 là lấy giá trị trong db
        $statement = $conn->prepare($query);
		$statement->execute( array('username' => $_POST["username"],'password' => $_POST["password"] ) );	
        $count = $statement->rowCount();
        if($count != 0) 	
        {
            $_SESSION['user'] = $username;	
            header("location:admin.php");/////////////////
        }	
        else
        {
            $message = '<label> Username OR Password is wrong </label>';
        }
      }	
    }	
}
catch(PDOException $error)	
{
    $message =$error->getMessage();	
}

?>
<!doctype html>
<html lang="en">
<head>
	<title>Login ADMIN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../assets/css/main.css" rel="stylesheet" />
	<link href="../assets/css/util.css" rel="stylesheet" />
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" method="post">
					<span class="login100-form-title p-b-32">
						Account Login
					</span>

					<span class="txt1 p-b-11">
						Username
					</span>
					<?php if(isset($message)) //kiểm tra message 
                                echo "<p style='color: red'>.".$message."</p>"  ?>  <!--đỗi màu message báo lỗi-->
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">					
						<input class="input100" type="text" name="username" value="" > 
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span > <!--class="btn-show-pass"  de hie thị password-->
							<i class="fa fa-eye"></i>
						</span>
						
						<input class="input100" type="password" name="password" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="rememberme">  <!--sai cookie de lưu tài khoản đăng nhập-->
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt3">
								Forgot Password?
							</a>
						</div>
						<div>
							<a href="register_Admin.php" class="txt3">
								create account ?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>
	
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