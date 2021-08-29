<?php

	$error = 0;
	$errormess = "";
	if(ctype_alnum($_POST['input-pass']) == 0)
	{
		$error = 1;
		$errormess = "Mật khẩu chỉ được chứa chữ cái hoặc số";
		echo "<script type='text/javascript'>alert('". $errormess."');</script>";
		header("refresh: 0; url=../login.php");
	}
	

	if($error == 0)
	{
		require_once('../mysqli_connect.php');
		$query = "SELECT * FROM `bacsi` WHERE (email = ? and pass = ? and status = '1')";
		$q = mysqli_stmt_init($dbcon);
		mysqli_stmt_prepare($q, $query);
		mysqli_stmt_bind_param($q, "ss", $_POST['input-email'], $_POST['input-pass']);
		mysqli_stmt_execute($q);
		
		$result = mysqli_stmt_get_result($q);
		$row = mysqli_fetch_assoc($result);
		
		if(mysqli_num_rows($result) == 1)
		{
			session_start();
			
			$_SESSION['id'] = $row['bsid'];
			$_SESSION['name'] = $row['bsname'];
			$_SESSION['admin'] = $row['adminstatus'];
			
			echo "<script type='text/javascript'>alert('Đăng nhập thành công.');</script>";
			header("refresh: 0; url=../manager.php");
		}
		else
		{
			echo "<script type='text/javascript'>alert('Bạn đã nhập sai tên hoặc mật khẩu');</script>";
			header("refresh: 0; url=../login.php");
		}
	}
?>