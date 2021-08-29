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

		<title>Đặt lịch khám</title>
	</head>
	
	
	<body>
		<?php
			include('include/header.php');
		?>
		
		<div class = "form-header">
			ĐĂNG KÝ KHÁM CHỮA BỆNH
		</div>
		<div class = "form-body">
			<div class = "form-wrapper">
				<form method = "POST" action = "include/process-reserve.php">
					<label>
						Họ và tên:
					</label>
					<br>
					<input type = "text" name = "input-name" id = "input-name" class = "input-text">
					<br>
					
					<label>
						Số CMND/CCCD: 
					</label>
					<br>
					<input type = "text" name = "input-id" id = "input-id" class = "input-text">
					<br>
					
					<label>
						Tuổi:
					</label>
					<br>
					<input type = "text" name = "input-age" id = "input-age" class = "input-text">
					<br>
					
					<label>
						Giới tính:
					</label>
					<br>
					<select name = "input-gender" class = "input-text">
						<option value = "Nam">Nam</option>
						<option value = "Nữ">Nữ</option>
					</select>
					<br>
					
					<label>
						Điện thoại liên hệ:
					</label>
					<br>
					<input type = "text" name = "input-contact" id = "input-age" class = "input-text">
					<br>
					
					<label>
						Địa chỉ hiện tại:
					</label>
					<br>
					<input type = "text" name = "input-address" id = "input-age" class = "input-text">
					<br>
					
					<label>
						Số thẻ BHYT (nếu có):
					</label>
					<br>
					<input type = "text" name = "input-insurance" id = "input-age" class = "input-text">
					<br>
					
					<label>
						Mô tả tình trạng bệnh lý:
					</label>
					<br>
					<input type = "text" name="input-summary" id = "input-summary" class = "input-text">
					<br>
					
					<label>
						Vị trí xảy ra vấn đề:
					</label>
					<br>
					<input type = "text" name = "input-position" id = "input-position" class = "input-text">
					<br>
					
					<label>
						Tiền sử bệnh lý:
					</label>
					<br>
					<input type = "text"  name="input-history" id = "input-history" class = "input-text">
					<br>
					
					<label>
						Gói khám đăng ký:
					</label>
					<br>
					<select name = "input-service" class = "input-text">
						<option value = "" selected = "selected">------------------------------------</option>
						<?php
							require_once('mysqli_connect.php');
							$query = 'SELECT * FROM `services` WHERE `sname` like "%Gói khám%"';
							$q = mysqli_stmt_init($dbcon);
							mysqli_stmt_prepare($q, $query);
							mysqli_stmt_execute($q);
							
							$result = mysqli_stmt_get_result($q);
							while($row = mysqli_fetch_assoc($result))
							{
								echo '<option value = "' .$row['sid']. '">' .$row['sname']. '</option>';
							}
						?>
					</select>
					<br>
					
					<label>
						Ngày đăng ký khám:
					</label>
					<br>
					<input type = "date" name = "input-date" id = "input-date" class = "input-text" >
					<br>
					<div class = "input-submit">
						<input type = "submit" value = "Đăng ký khám">
					</div>
				</form>
			</div>
		</div>
		<div class = "footer">
			<?php
				include('include/footer.php');
			?>
		</div>
		
	</body>
</html>