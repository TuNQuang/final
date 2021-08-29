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
		
		<script>
		function showbslist() 
		{
			const xhttp = new XMLHttpRequest();
			var x = document.getElementById("input-chuyenkhoa").value;
			xhttp.onload = function() 
			{
				document.getElementById("select-bacsi").innerHTML = this.responseText;
			}
			xhttp.open("GET", "include/ajax-bs.php?ck=" + x);
			xhttp.send();
		}
	</script>
		

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
		
		<?php
			require('mysqli_connect.php');
			
			$query = 'SELECT * FROM `lichkham` 
						inner join `benhnhan` on lichkham.bnid = benhnhan.bnid 
						inner join `services` on lichkham.services = services.sid 
						WHERE `appid` = ?';
			$q = mysqli_stmt_init($dbcon);
			mysqli_stmt_prepare($q, $query);
			mysqli_stmt_bind_param($q, "s", $_GET['appid']);
			mysqli_stmt_execute($q);
			
			$result = mysqli_stmt_get_result($q);
			$row = mysqli_fetch_assoc($result);
		?>
		
		<div class = "lichkham-body form-body">
			<div class = "lichkham-header">
				THÔNG TIN LỊCH HẸN KHÁM
			</div>
			<div class = "form-wrapper">
				
				<input type = "hidden" name = "input-bn-id" value = "<?php echo $row['bnid']?>">
				<input type = "hidden" name = "input-lk-id" value = "<?php echo $_GET['appid']?>">
				
				<label>
					Họ và tên bệnh nhân:
				</label>
				<br>
				<input type = "text" name = "input-name" class = "input-text" value = "<?php echo $row['bnname'];?>" readonly = "readonly">
				<br>
				
				<label>
					Tuổi:
				</label>
				<br>
				<input type = "text" name = "input-age" class = "input-text" value = "<?php echo $row['age'];?>" readonly = "readonly">
				<br>
				
				<label>
					Giới tính:
				</label>
				<br>
				<input type = "text" name = "input-gender" class = "input-text" value = "<?php echo $row['gender'];?>" readonly = "readonly">
				<br>
				
				<label>
					Triệu chứng bệnh:
				</label>
				<br>
				<input type = "text" name = "input-summary" class = "input-text" value = "<?php echo $row['summary'];?>" readonly = "readonly">
				<br>
				
				<label>
					Vị trí xảy ra triệu chứng:
				</label>
				<br>
				<input type = "text" name = "input-position" class = "input-text" value = "<?php echo $row['position'];?>" readonly = "readonly">
				<br>
				
				<label>
					Tiền sử bệnh:
				</label>
				<br>
				<input type = "text" name = "input-history" class = "input-text" value = "<?php echo $row['history'];?>" readonly = "readonly">
				<br>
				
				<label>
					Gói khám đăng ký:
				</label>
				<br>
				<input type = "text" name = "input-services" class = "input-text" value = "<?php echo $row['sname'];?>" readonly = "readonly">
				<br>
				
				<label>
					Ngày hẹn khám:
				</label>
				<br>
				<input type = "text" name = "input-date" class = "input-text" value = "<?php echo $row['appdate'];?>" readonly = "readonly">
				<br>
				
				<form method = "POST" action = "include/process-add-benhan.php">
					<input type = "hidden" name = "input-bn-id" value = "<?php echo $row['bnid']?>">
					<input type = "hidden" name = "input-lk-id" value = "<?php echo $_GET['appid']?>">
					
					<label>
						<strong>
							Phần dành cho quản trị viên
						</strong>
						<br>
						</br>
						Chuyên khoa
					</label>
					<br>
					<select name = "input-khoa" id = "input-chuyenkhoa" class = "input-text" onchange="showbslist()">
						<option value = "0" selected = "selected">------------------------------------</option>
						<?php
							require_once('mysqli_connect.php');
							$query2 = 'SELECT * FROM `chuyenkhoa` WHERE 1';
							$q2 = mysqli_stmt_init($dbcon);
							mysqli_stmt_prepare($q2, $query2);
							mysqli_stmt_execute($q2);
							
							$result2 = mysqli_stmt_get_result($q2);
							while($row2 = mysqli_fetch_assoc($result2))
							{
								echo '<option value = "' .$row2['ckid']. '">' .$row2['ckname']. '</option>';
							}
						?>
					</select>
					<br>
					
					
					<div id = "select-bacsi">
					
					</div>
					<br>
					
					<div class = "input-submit">
						<input type = "submit" value = "Xác nhận" class = "submit-button">
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