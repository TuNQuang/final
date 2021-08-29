<?php
	require_once('../mysqli_connect.php');
	
	$date = date("Y-m-d");
	
	$query = 'update `lichkham` set `pending` = "0", `ngaykham` = ?, `chandoan` = ?, `phuongan` = ?, `donthuoc` = ? where `appid` = ?';
	
	$q = mysqli_stmt_init($dbcon);
	mysqli_stmt_prepare($q, $query);
	mysqli_stmt_bind_param($q, "sssss", $date, 
										$_POST['input-chandoan'],
										$_POST['input-phuongan'],
										$_POST['input-donthuoc'], 
										$_POST['input-lk']);
	mysqli_stmt_execute($q);
	
	if($_POST['input-taikham'] == 1)
	{
		$query2 = 'INSERT INTO `lichkham`( `bnid`, `bsid`, `summary`, `history`, `services`, `appdate`) 
		VALUES (?, ?, ?, ?, ?, ?)';
		$q2 = mysqli_stmt_init($dbcon);
		mysqli_stmt_prepare($q2, $query2);
		mysqli_stmt_bind_param($q2, "ssssss", $_POST['input-bn'],
												$_POST['input-bs'],
												$_POST['input-chandoan'],
												$_POST['input-chandoan'],
												$_POST['input-gk'],
												$_POST['input-taikham-date']);
		mysqli_stmt_execute($q2);
		
	}
	
	if(mysqli_affected_rows($dbcon) == 1)
	{
		echo "<script type='text/javascript'>alert('Đã lưu bệnh án');</script>";
		header("refresh: 0; url=../manager.php");
	}
?>