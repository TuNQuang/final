<?php
	
	$oldpass = $_POST['input-oldpass'];
	$newpass1 = $_POST['input-newpass1'];
	$newpass2 = $_POST['input-newpass2'];
	$id = $_POST['input-id'];
	
	$error = 0;
	$errormess = "";
	
	if(ctype_alnum($oldpass) == 0 or ctype_alnum($newpass1) == 0 or ctype_alnum($newpass2) == 0)
	{
		$error = 1;
		$errormess = "Mật khẩu chỉ được chứa chữ cái hoặc số";
		
	}
	
	if($newpass1 != $newpass2)
	{
		$error = 1;
		$errormess = "Mật khẩu cũ và mới không khớp";
	}
	
	
	if($error == 1)
	{
		echo "<script type='text/javascript'>alert('". $errormess."');</script>";
		header("refresh: 0; url=../changepass-form.php");
	}
	else
	{
		require_once('../mysqli_connect.php');
		
		$query = 'select * from `bacsi` WHERE bsid = ?';
		$q = mysqli_stmt_init($dbcon);
		mysqli_stmt_prepare($q, $query);
		mysqli_stmt_bind_param($q, "s", $id);
		mysqli_stmt_execute($q);
		
		$result = mysqli_stmt_get_result($q);
		$row = mysqli_fetch_assoc($result);
		
		if($oldpass != $row['pass'])
		{
			$errormess = 'Mật khẩu cũ không chính xác.';
			echo "<script type='text/javascript'>alert('". $errormess."');</script>";
			header("refresh: 0; url=../changepass-form.php");
		}
		else 
		{
			$query2 = 'UPDATE `bacsi` SET `pass`= ? WHERE `bsid` = ?';
			$q2 = mysqli_stmt_init($dbcon);
			mysqli_stmt_prepare($q2, $query2);
			mysqli_stmt_bind_param($q2, "ss", $newpass1, $id);
			mysqli_stmt_execute($q2);
			
			if(mysqli_affected_rows($dbcon) == 1)
			{
				echo "<script type='text/javascript'>alert('Đổi mật khẩu thành công.');</script>";
				header("refresh: 0; url=../manager.php");
			}
		}
	}
?>