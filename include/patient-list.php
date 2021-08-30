<?php
	session_start();
?>

<div class = "pending-list-header ">
	<div class = " pending-header bottom-border">
		<div class = "employee-title">
			Danh sách bệnh nhân
		</div>
	</div>
</div>
<div class = "pending-column bottom-border">
	<div class = "pending-item pending-header name-column">
		Tên bệnh nhân
	</div>
	<div class = "pending-item pending-header dpm-column">
		Gói khám gần nhất
	</div>
	<div class = "pending-item pending-header status-column">
		Ngày khám gần nhất
	</div>
</div>

<?php
	
	require_once('../mysqli_connect.php');
	
	$query2 = 'select DISTINCT bnid from lichkham';
	$q2 = mysqli_stmt_init($dbcon);
	mysqli_stmt_prepare($q2, $query2);
	mysqli_stmt_execute($q2);
	
	$result2 = mysqli_stmt_get_result($q2);
	while($row2 = mysqli_fetch_assoc($result2))
	{
		$query = "SELECT * FROM `benhnhan`  
				inner join `lichkham` on benhnhan.bnid = lichkham.bnid 
				inner join services on lichkham.services = services.sid 
				WHERE lichkham.pending = '0' 
					and benhnhan.bnid = ? 
					and lichkham.ngaykham = (select max(ngaykham) from lichkham where bnid = ?)";
		$q = mysqli_stmt_init($dbcon);
		mysqli_stmt_prepare($q, $query);
		mysqli_stmt_bind_param($q, "ss", $row2['bnid'], $row2['bnid']);
		mysqli_stmt_execute($q);
		
		$result = mysqli_stmt_get_result($q);
		while ($row = mysqli_fetch_assoc($result))
		{
			echo '<div class = "pending-column bottom-border dotted-border">';
				echo '<div class = "pending-item  name-column">
						<a href = "patient-info.php?bnid='. $row['bnid']. '">';
				echo		$row['bnname'];
				echo	'</a>
					</div>';
				
				echo '<div class = "pending-item  service-column">';
				echo		$row['sname'];
				echo '</div>';
				
				echo '<div class = "pending-item  name-column">';
				echo		$row['ngaykham'];
				echo	'</div>';
				echo '</div>';
		}
	}
	
	
	
	
?>
