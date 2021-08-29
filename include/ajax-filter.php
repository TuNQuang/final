<?php
	echo '<select name = "form-filter-value">';
	include('../mysqli_connect.php');
	if($_GET['value'] == 1)
	{
		$query = 'select * from `chuyenkhoa`';
		$q = mysqli_stmt_init($dbcon);
		mysqli_stmt_prepare($q, $query);
		mysqli_stmt_execute($q);
		
		$result = mysqli_stmt_get_result($q);
		while($row = mysqli_fetch_assoc($result))
		{
			echo '<option value = "' .$row['ckid']. '">'. $row['ckname'] .'</option>';
		}
	}
	else
	{
		echo '<option value = "1">Đang công tác</option>';
		echo '<option value = "0">Đã thôi việc</option>';
	}
	echo '</select>';
?>