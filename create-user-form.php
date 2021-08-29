<?php
	session_start();
	if(!isset($_SESSION['id']))
	{
		header("refresh: 0; url=login.php");
	}
	if($_SESSION['admin'] == 0)
	{
		header("refresh: 0; url=manager.php");
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
		
		<title>Thêm nhân viên</title>
		
	</head>
	
	<body>
		<?php
			include('include/header.php');
		?>
		
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
					<a href = "bs-info.php?bsid=<?php echo $_SESSION['id'];?>" class = "no-decor menu-link">
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
		
		
		<div class = "lichkham-body form-body">
			<div class = "lichkham-header">
				TẠO MỚI THÔNG TIN NHÂN VIÊN
			</div>
			<div class = "form-wrapper">
				<form method = "POST" ACTION = "include/process-create.php">
					
					<label>
						Họ và tên:
					</label>
					<br>
					<input type = "text" name = "input-name" class = "input-text">
					<br>
					
					<label>
						Chuyên khoa:
					</label>
					<br>
					<select class = "input-text" name = "input-ck">
						<?php
							require_once('mysqli_connect.php');
							
							$query2 = 'select * from `chuyenkhoa`';
							$q2 = mysqli_stmt_init($dbcon);
							mysqli_stmt_prepare($q2, $query2);
							mysqli_stmt_execute($q2);
							
							$result = mysqli_stmt_get_result($q2);
							while ($row2 = mysqli_fetch_assoc($result))
							{
								echo '<option value ="' .$row2['ckid']. '">' .$row2['ckname']. '</option>';
							}
							
						?>
					</select>
					<br>
					
					<label>
						Quyền quản trị:
					</label>
					<br>
					<select name = "input-admin" class = "input-text">
						<option value = "1">Có</option>
						<option value = "0">Không</option>
					</select>
					<br>
					
					<div class = "input-submit">
						<input type = "submit" value = "Lưu" class = "submit-button">
					</div>
				</form>
			</div>
		</div>
	</body>
</html>