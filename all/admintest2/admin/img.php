<?php
function postIndex($index, $value="")
{
	if (!isset($_POST[$index]))	return $value;
	return $_POST[$index];
}

$sm 	= postIndex("submit");
$ten 	= postIndex("ten");
$gt 	= postIndex("gt");
$arrImg = array("image/gpn", "image/jpeg", "image/bmp");

if ($sm=="") {
				header("location:1.php"); exit;//quay ve 1.php
			}

$err = "";


$errFile = $_FILES["hinh"]["error"];
if ($errFile>0)
	$err .="Lỗi file hình <br>";
else
{
	$type = $_FILES["hinh"]["type"];
	if (!in_array($type, $arrImg))
		$err .="Không phải file hình <br>";
	else
	{	$temp = $_FILES["hinh"]["tmp_name"];
		$name = $_FILES["hinh"]["name"];
		if (!move_uploaded_file($temp, "image/".$name))
			$err .="Không thể lưu file<br>";
		
	}
}
?>