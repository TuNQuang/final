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
		
		<title>Đổi mật khẩu</title>
		
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
				ĐỔI MẬT KHẨU
			</div>
			<div class = "form-wrapper">
				<form method = "POST" action = "include/process-changepass.php">
					<label>
						Mật khẩu cũ:
					</label>
					<br>
					<input type = "password" name = "input-oldpass" class = "input-text">
					<br>
					
					<label>
						Mật khẩu mới:
					</label>
					<br>
					<input type = "password" name = "input-newpass1" class = "input-text">
					<br>
					
					<label>
						Xác nhận mật khẩu:
					</label>
					<br>
					<input type = "password" name = "input-newpass2" class = "input-text">
					<br>
					<input type = "hidden" name = "input-id" value = "<?php echo $_SESSION['id'];?>">
					
					<div class = "input-submit">
						<input type = "submit" value = "Xác nhận" class = "submit-button">
					</div>
				</form>
			</div>
		</div>
		
	</body>
</html>