<?php
function post2($index, $value="")
	{
		if (!isset($_POST[$index]))	return $value;
		return trim($_POST[$index]);
	}
	$username 	= post2("username");
	$password1	= post2("password1");
	$password2	= post2("password2");
	$name		= post2("name");
	$sdt 		= post2("phone");

	$sm 		= post2("submit");
	include 'connection/connection.php';
	$message = "dang ki thanh cong";
		if ($sm !="")
			{
				$err= "";
				if (strlen($username)<5 ) 		$err .="Username ít nhất phải 6 ký tự!<br>";
				if ($password1!= $password2) 	$err .="Mật khẩu và mật khẩu nhập lại không khớp. <br>";
				if(strlen($password1)<6) 		$err .="Mật khẩu phải ít nhất 8 ký tự.<br>";
				if(str_word_count($name)<2) 	$err .="Họ tên phải chứa ít nhất 2 từ ";
				if(strlen($name)>50) 			$err .="kí tự quá dài";
				?>
				<div class="info">
					<?php
					if($err!="") 
					echo $err;

						else if (isset($_POST['submit']))
						{

							$e=$_POST['username'];
							$p=$_POST['password1'];
							$fullname=$_POST['name'];
							$phone=$_POST['phone'];
							$email=$_POST['email'];
							$birthday=$_POST['birthday'];
							$sql="insert into account (username,Password,fullname,phone_number,email,birthday) value(?,?,?,?,?,?)";
							$stm=$conn->prepare($sql);
							$stm->execute([$e,$p,$fullname,$phone,$email,$birthday]);
							?>
							<script language="javascript">
								alert("đăng kí thành công");
							</script>
							<?php
							//console_log($message);
							header("location:index.php");
							//echo $message;
						}	
						?>
				</div>
				<?php
			}

?>