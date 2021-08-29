<?php
	session_start();
	if(!isset($_SESSION['id']))
	{
		header("refresh: 0; url=login.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
  
		<meta charset="utf-8"/>
		
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="style/style.css">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		
		<title>Thông tin bệnh nhân</title>
	<head>

	<body>
		<div class = "manager-menu menu-bar">
			<ul class = "wrapper">
				<li class = "menu-bar-item no-decor">
					<a href = "manager.php" class = "no-decor menu-link">
						<b>
							Trang quản lý thông tin bệnh viện Hà Nội
						</b>
					</a>
				</li>
				<li class = "menu-bar-item no-decor right-float">
					<a href = "bs-info.php?bsid=<?php echo $_SESSION['id']; ?>" class = "no-decor menu-link">
						<b>
							Xin chào, <?php echo $_SESSION['name'];?> |
						</b>
					</a>
					<a href = "include/process-logout.php" class = "no-decor menu-link ">
						<b>
							Đăng xuất
						</b>
					</a>
				</li>
			</ul>
		</div>
		
		<?php
			require('mysqli_connect.php');
			
			$query = 'select * from `benhnhan` where bnid = ?';
			$q = mysqli_stmt_init($dbcon);
			mysqli_stmt_prepare($q, $query);
			mysqli_stmt_bind_param($q, "s", $_GET['bnid']);
			mysqli_stmt_execute($q);
			
			$result = mysqli_stmt_get_result($q);
			$row = mysqli_fetch_assoc($result);
		?>
		
		
		<div class = "lichkham-body form-body">
			<div class = "lichkham-header">
				THÔNG TIN BỆNH NHÂN
			</div>
			<div class = "form-wrapper">
				<label>
					Họ và tên bệnh nhân:
				</label>
				<br>
				<input type = "text" name = "input-name" class = "input-text" value = "<?php echo $row['bnname']?>" readonly = "readonly">
				<br>
				
				<label>
					Tuổi:
				</label>
				<br>
				<input type = "text" name = "input-name" class = "input-text" value = "<?php echo $row['age']?>">
				<br>
				
				<label>
					Giới tính:
				</label>
				<br>
				<input type = "text" name = "input-name" class = "input-text" value = "<?php echo $row['gender']?>" readonly = "readonly">
				<br>
				
				<label>
					Điện thoại liên hệ:
				</label>
				<br>
				<input type = "text" name = "input-name" class = "input-text" value = "<?php echo $row['contact']?>">
				<br>
				
				<label>
					Địa chỉ:
				</label>
				<br>
				<input type = "text" name = "input-name" class = "input-text" value = "<?php echo $row['address']?>">
				<br>
				
				<label>
					Số thẻ BHYT:
				</label>
				<br>
				<input type = "text" name = "input-name" class = "input-text" value = "<?php echo $row['insurance']?>">
				<br>
				
				<label>
					Lịch sử khám bệnh:
				</label>
				<br>
				
				<div class = "history-list">
					<div class = "history-header bottom-border">
						<div class = "history-header-column date-column">
							Ngày khám
						</div>
						<div class = "history-header-column service-column">
							Gói khám
						</div>
						<div class = "history-header-column name-column">
							Bác sĩ phụ trách
						</div>
					</div>
					<div class = "history-body dotted-border">
						<?php
							require_once('mysqli_connect.php');
							
							$query2 = "select * from `lichkham` 
										inner join `services` on lichkham.services = services.sid 
										inner join `bacsi` on lichkham.bsid = bacsi.bsid
										where (bnid = ? and pending = '0')";
							$q2 = mysqli_stmt_init($dbcon);
							mysqli_stmt_prepare($q2, $query2);
							mysqli_stmt_bind_param($q2, "s", $row['bnid']);
							mysqli_stmt_execute($q2);
							
							$result2 = mysqli_stmt_get_result($q2);
							
							while($row2 = mysqli_fetch_assoc($result2))
							{
								echo '<div class = "history-header-column date-column">
										<a href = "benhan-form.php?lkid=' .$row2['appid']. '&protected=1">'.
											$row2['ngaykham']
										.'</a>
									</div>';
								echo '<div class = "history-header-column service-column">'.
									$row2['sname']
								.'</div>';
								echo '<div class = "history-header-column name-column">'.
									$row2['bsname']
								.'</div>';
							}
						?>
					</div>
				</div>
				
				<div class = "input-submit">
					<input type = "submit" value = "Cập nhật" class = "submit-button">
				</div>
			</div>
		</div>
		
	</body>
	
</html>