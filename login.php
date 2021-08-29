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

		<title>ĐĂNG NHẬP</title>
	</head>
	
	
	<body>
		<?php
			include('include/header.php');
		?>
		
		<div class = "form-header">
			ĐĂNG NHẬP
		</div>
		<div class = "login-form-body">
			<form method = "POST" action = "include/process-login.php">
				<label>
					Email:
				</label>
				<br>
				<input type = "text" name = "input-email" class = "login-input-text">
				<br>
				<label>
					Mật khẩu:
				</label>
				<br>
				<input type = "password" name = "input-pass" class = "login-input-text">
				<br>
				<div class = "input-submit">
					<input type = "submit" value = "Đăng nhập">
				</div>
			</form>
		</div>
		
		<div class = "footer">
			<?php
				include('include/footer.php');
			?>
		</div>
		
	</body>
</html>