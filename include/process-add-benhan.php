<?php
	require_once('../mysqli_connect.php');
	
	
	$query2 = 'UPDATE `lichkham` SET `bsid`=? WHERE appid = ?';
	$q2 = mysqli_stmt_init($dbcon);
	mysqli_stmt_prepare($q2, $query2);
	mysqli_stmt_bind_param($q2, "ss", $_POST['input-bacsi'], $_POST['input-lk-id']);
	mysqli_stmt_execute($q2);
	
	if(mysqli_affected_rows($dbcon) == 1)
	{
		echo "<script type='text/javascript'>alert('Đã xác nhận lịch hẹn.');</script>";
		header("refresh: 0; url=../manager.php");
	}
?>