<?php
	session_start();
?>

<div class = "pending-list-header ">
	<div class = "pending-header bottom-border flex-box">
		<div class = "employee-title">
			Danh sách nhân sự
		</div>
		<div class = "employee-button">
			<a href = "create-user-form.php" class = "create-button">
				Tạo mới
			</a>
		</div>
	</div>
</div>
<div class = "pending-column bottom-border">
	<div class = "pending-item pending-header name-column">
		Tên nhân sự
	</div>
	<div class = "pending-item pending-header dpm-column">
		Chuyên khoa
	</div>
	<div class = "pending-item pending-header status-column">
		Tình trạng
	</div>
</div>



<?php
	
	require_once('../mysqli_connect.php');
	
	
	$query = "SELECT * FROM `bacsi` inner join `chuyenkhoa` on bacsi.chuyenkhoa = chuyenkhoa.ckid";
	$q =mysqli_stmt_init($dbcon);
	mysqli_stmt_prepare($q, $query);
	mysqli_stmt_execute($q);
	
	$result = mysqli_stmt_get_result($q);
	while($row = mysqli_fetch_assoc($result))
	{
		echo '<div class = "pending-column bottom-border dotted-border">';
		echo '<div class = "pending-item  name-column">
				<a href = "bs-info.php?bsid=' .$row['bsid']. '">';
		echo		$row['bsname'];
		echo	'</a>
			</div>';
		
		echo '<div class = "pending-item  service-column">';
		echo		$row['ckname'];
		echo '</div>';
		
		echo '<div class = "pending-item  name-column">';
		if($row['status'] == 0)
		{
			echo 'Đã thôi việc';
		}
		else echo 'Đang công tác';
		echo	'</div>';
		echo '</div>';
	}
?>



