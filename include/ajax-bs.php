<?php
	echo '<label>
			Bác sĩ phụ trách: 
		</label>
		<br>
		<select name = "input-bacsi" class = "input-text">';
		
	require_once('../mysqli_connect.php');
	
	$query = "select * from `bacsi` where `chuyenkhoa` = ?";
	$q = mysqli_stmt_init($dbcon);
	mysqli_stmt_prepare($q, $query);
	mysqli_stmt_bind_param($q, "s", $_GET['ck']);
	mysqli_stmt_execute($q);
	
	$result = mysqli_stmt_get_result($q);
	while($row = mysqli_fetch_assoc($result))
	{
		echo '<option value = "' . $row['bsid'] . '">'. $row['bsname'] .'</option>';
	}
	echo '</select>'
?>