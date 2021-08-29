<?php
	include('../mysqli_connect.php');
	
	$query = 'UPDATE `bacsi` SET `chuyenkhoa`= ?,`status`= ?,`adminstatus`=? WHERE `bsid` = ?';
	$q = mysqli_stmt_init($dbcon);
	mysqli_stmt_prepare($q, $query);
	mysqli_stmt_bind_param($q, "ssss", $_POST['input-ck'], 
										$_POST['input-status'],
										$_POST['input-admin'],
										$_POST['input-id']);
	mysqli_stmt_execute($q);
	
	if(mysqli_affected_rows($dbcon) == 1)
	{
		echo "<script type='text/javascript'>alert('Cập nhật thành công.');</script>";
		header("refresh: 0; url=../bs-info.php?bsid=". $_POST['input-id']);
	}
?>