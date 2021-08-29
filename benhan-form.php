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
		
		<title>Bệnh án</title>
		
		<script>
			function showtaikham(value)
			{
				const xhttp = new XMLHttpRequest();
				xhttp.onload = function() 
				{
					document.getElementById("input-date-taikham").innerHTML = this.responseText;
				}
				xhttp.open("GET", "include/ajax-date.php?value=" + value);
				xhttp.send();
			}
		</script>
		
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
		
		<?php
			require('mysqli_connect.php');
			
			$query = 'select * from `lichkham` inner join `benhnhan` on lichkham.bnid = benhnhan.bnid where lichkham.appid = ?';
			$q = mysqli_stmt_init($dbcon);
			mysqli_stmt_prepare($q, $query);
			mysqli_stmt_bind_param($q, "s", $_GET['lkid']);
			mysqli_stmt_execute($q);
			
			$result = mysqli_stmt_get_result($q);
			$row = mysqli_fetch_assoc($result);
		?>
		
		<div class = "lichkham-body form-body">
			<div class = "lichkham-header">
				THÔNG TIN BỆNH ÁN CỦA BỆNH NHÂN
			</div>
			<div class = "form-wrapper">
				<form method = "POST" ACTION = "include/process-luu-benhan.php">
					
					<label>
						Họ và tên bệnh nhân:
					</label>
					<br>
					<input type = "text" name = "input-name" class = "input-text" value = "<?php echo $row['bnname']?>" readonly = "readonly">
					<br>
					
					<label>
						Tóm tắt tình trạng bệnh lý:
					</label>
					<br>
					<input type = "text" name = "input-summary" class = "input-text" value = "<?php echo $row['summary']?>" readonly = "readonly">
					<br>
					
					<label>
						Vị trí xảy ra tình trạng bệnh lý:
					</label>
					<br>
					<input type = "text" name = "input-position" class = "input-text" value = "<?php echo $row['position']?>" readonly = "readonly">
					<br>
					
					<label>
						Tiền sử bệnh lý:
					</label>
					<br>
					<input type = "text" name = "input-history" class = "input-text" value = "<?php echo $row['history']?>" readonly = "readonly">
					<br>
					<?php
						if($_GET['protected'] == 0)
						{
							echo '<label>
									<strong>
										Phần dành cho bác sĩ phụ trách:
									</strong>
								</label>
								<br>';
						}
					?>
					
					<label>
						Chẩn đoán sau khám:
					</label>
					<br>
					<input type = "text" name = "input-chandoan" class = "input-text" 
						<?php 
							if($_GET['protected'] == 1) 
							{
								echo 'readonly = "readonly" value ="'. $row['chandoan'] .'"';
							}
						?>>
					<br>
					
					<label>
						Phương án điều trị:
					</label>
					<br>
					<input type = "text" name = "input-phuongan" class = "input-text"
						<?php 
							if($_GET['protected'] == 1) 
							{
								echo 'readonly = "readonly" value ="'. $row['phuongan'] .'"';
							}
						?>>
					<br>
					
					<label>
						Đơn thuốc:
					</label>
					<br>
					<input type = "text" name = "input-donthuoc" class = "input-text"
						<?php 
							if($_GET['protected'] == 1) 
							{
								echo 'readonly = "readonly" value ="'. $row['donthuoc'] .'"';
							}
						?>>
					<br>
					
					<?php
						if($_GET['protected'] == 0)
						echo '<label>
							Hẹn tái khám:
						</label>
						<br>
						<select class = "input-text" name = "input-taikham" onchange = "showtaikham(this.value)">
							<option value = "1">Có</option>
							<option value = "0" selected = "selected">Không</option>
						</select>
						<br>';
					?>
					
					<div id = "input-date-taikham">
						
					</div>
					
					<input type = "hidden" name = "input-lk" value = "<?php echo $_GET['lkid'];?>">
					<input type = "hidden" name = "input-bs" value = "<?php echo $_SESSION['id'];?>">
					<input type = "hidden" name = "input-bn" value = "<?php echo $row['bnid'];?>">
					<input type = "hidden" name = "input-gk" value = "<?php echo $row['services'];?>">
					<?php
						if($_GET['protected'] == 0)
						echo '<div class = "input-submit">
							<input type = "submit" value = "Lưu" class = "submit-button">
						</div>';
					?>
				</form>
			</div>
		</div>
		
	</body>
	
</html>