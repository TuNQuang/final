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

		
		

		<title>Trang quản lý</title>
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
		
		
		<div class = "manager-body">
			<?php
				include('include/manager-body.php');
			?>
		</div>
		
		<div class = "footer">
			<?php
				include('include/footer.php');
			?>
		</div>
		
	</body>
	
</html>