<?php
	require_once('../mysqli_connect.php');
	
	$query = 'SELECT * FROM `benhnhan` WHERE `bnid` = ?';
	$q = mysqli_stmt_init($dbcon);
	mysqli_stmt_prepare($q, $query);
	mysqli_stmt_bind_param($q, "s", $_POST['input-id']);
	mysqli_stmt_execute($q);
	
	$result = mysqli_stmt_get_result($q);
	
	echo mysqli_num_rows($result);
	if(mysqli_num_rows($result) == 0)
	{
		$query2 = "INSERT INTO `benhnhan`(`bnid`, `bnname`, `age`, `gender`, `contact`, `address`, `insurance`) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$q2 = mysqli_stmt_init($dbcon);
		mysqli_stmt_prepare($q2, $query2);
		mysqli_stmt_bind_param($q2, "sssssss", $_POST['input-id'], 
												$_POST['input-name'], 
												$_POST['input-age'], 
												$_POST['input-gender'],
												$_POST['input-contact'], 
												$_POST['input-address'], 
												$_POST['input-insurance']);
		mysqli_stmt_execute($q2);
		
	}
	$query3 = "INSERT INTO `lichkham`(`bnid`, `summary`, `position`, `history`, `services`, `appdate`) VALUES (?, ?, ?, ?, ?, ?)";
	$q3 = mysqli_stmt_init($dbcon);
	mysqli_stmt_prepare($q3, $query3);
	mysqli_stmt_bind_param($q3, "ssssss", $_POST['input-id'], 
											$_POST['input-summary'], 
											$_POST['input-position'], 
											$_POST['input-history'], 
											$_POST['input-service'], 
											$_POST['input-date']) ;
											
	mysqli_stmt_execute($q3);
	
	if(mysqli_affected_rows($dbcon) == '1')
	{
		echo "<script type='text/javascript'>alert('Bạn đã đăng ký khám thành công. Xin hãy đợi bệnh viện liên lạc để xác nhận thông tin qua điện thoại.');</script>";
		header("refresh: 0; url=../index.php");
	}
		
	
?>