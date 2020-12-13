<?php
function post2($index, $value="")
	{
		if (!isset($_POST[$index]))	return $value;
		return trim($_POST[$index]);
	}
	$username	=post2("username");
	$fullname	=post2("fullname");
	$sdt 		=post2("phone");
	$ngaysinh 	=post2("birthday");
	$email		=post2("email");

	$sm 		=post2("update");

	include 'connection/connection.php';
	$message = "cập nhật thanh công";

				$err= "";

				if(str_word_count($fullname)<2) 	$err .="Họ tên phải chứa ít nhất 2 từ ";
				if(strlen($fullname)>50) 			$err .="kí tự quá dài";
				if(strlen($sdt)>12)					$err .="không phải số đt";
				?>
				<div class="info">
					<?php
					if($err!="") 
					echo $err;

						else if (isset($_POST['update']))
						{
							$sql= "UPDATE account SET fullname='$fullname',phone_number='$sdt',email='$email',birthday='$ngaysinh' where username='$username'";
							$stm= $conn->prepare($sql);
        					$stm->execute();
							//console_log($message);
        					//echo $stmt->rowCount() . " records UPDATED successfully";
							header("location:profile.php");
							//echo $message;
						}	
						?>
				</div>
				<?php
			

?>