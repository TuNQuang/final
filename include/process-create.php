<?php
	function convert_vi_to_en($str) 
	{
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
		$str = preg_replace("/(đ)/", "d", $str);
		$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
		$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
		$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
		$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
		$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
		$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
		$str = preg_replace("/(Đ)/", "D", $str);
		//$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
		return $str;
	}
	
	$string = convert_vi_to_en(strtolower($_POST['input-name']));
	$pass = '';
	for($i = strlen($string) - 1; $i > 0; $i--)
	{
		if(substr($string, $i, 1) == ' ')
		{
			$pass = substr($string, $i + 1, strlen($string) - $i) . substr($string, 0, 1);
			$string = substr($string, 1, $i - 1);
			break;
		}
	}
	
	
	for($i = 0; $i < strlen($string); $i++)
	{
		if(substr($string, $i, 1) == ' ')
		{
			$pass .= substr($string, $i + 1, 1);
			$i++;
		}
	}
		
	require_once('../mysqli_connect.php');
	
	$query = 'select * from `bacsi` where email like "%'. $pass .'%"';
	$q = mysqli_stmt_init($dbcon);
	mysqli_stmt_prepare($q, $query);
	mysqli_stmt_execute($q);
	
	$result = mysqli_stmt_get_result($q);
	$row = mysqli_num_rows($result);
	
	if($row < 10)
	{
		$pass .= '0' . ++$row;
	}
	else $pass .= ++$row;
	
	$email = $pass . "@bvhn.vn";
	
	$query2 = "INSERT INTO `bacsi`(`bsname`, `chuyenkhoa`, `email`, `pass`, `adminstatus`)
			VALUES (?, ?, ?, ?, ?)";
	$q2 = mysqli_stmt_init($dbcon);
	mysqli_stmt_prepare($q2, $query2);
	mysqli_stmt_bind_param($q2, 'sssss', $_POST['input-name'], $_POST['input-ck'], $email, $pass, $_POST['input-admin']);
										
	mysqli_stmt_execute($q2);
	
	if(mysqli_affected_rows($dbcon) == 1)
	{
		echo "<script type='text/javascript'>alert('Đã tạo mới thành công.');</script>";
		header("refresh: 0; url=../manager.php");
	}		
?>