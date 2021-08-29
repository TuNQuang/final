<?php
	session_start();
?>

<div class = "pending-list-header ">
	<div class = " pending-header bottom-border">
		Danh sách lịch hẹn khám chưa duyệt
	</div>
	<div class = "pending-column bottom-border">
		<div class = "pending-item pending-header name-column">
			Tên bệnh nhân
		</div>
		<div class = "pending-item pending-header service-column">
			Gói khám
		</div>
		<div class = "pending-item pending-header date-column">
			Ngày hẹn
		</div>
	</div>

<?php
	require_once('../mysqli_connect.php');
		
	$query = 	"SELECT * FROM `lichkham` 
				inner join `benhnhan` on (lichkham.bnid = benhnhan.bnid) 
				inner join `services` on (lichkham.services = services.sid)  
				WHERE `bsid` = ? and pending = '1'" ;
	$q = mysqli_stmt_init($dbcon);
	mysqli_stmt_prepare($q, $query);
	mysqli_stmt_bind_param($q, "s", $_SESSION['id']);
	mysqli_stmt_execute($q);
	
	$result = mysqli_stmt_get_result($q);
	while($row = mysqli_fetch_assoc($result))
	{
		echo '<div class = "pending-column bottom-border dotted-border">';
		echo '<div class = "pending-item  name-column">
				<a href = "benhan-form.php?lkid='. $row['appid'] .'&protected=0">';
		echo		$row['bnname'];
		echo	'</a>
			</div>';
		
		echo '<div class = "pending-item  service-column">';
		echo		$row['sname'];
		echo '</div>';
		
		echo '<div class = "pending-item  name-column">';
		echo		$row['appdate'];
		echo	'</div>';
		echo '</div>';
	}
?>