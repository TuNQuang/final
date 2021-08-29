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
					<a href = "#" class = "no-decor menu-link">
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
			require_once('mysqli_connect.php');
			
			$query = 'select * from `bacsi` inner join `chuyenkhoa` on bacsi.chuyenkhoa = chuyenkhoa.ckid where bsid = ' .$_GET['bsid'];
			$q = mysqli_stmt_init($dbcon);
			mysqli_stmt_prepare($q, $query);
			mysqli_stmt_execute($q);
			
			$result = mysqli_stmt_get_result($q);
			$row = mysqli_fetch_assoc($result);
		?>
		
		<div class = "lichkham-body form-body">
			<div class = "lichkham-header">
				THÔNG TIN NHÂN VIÊN
			</div>
			<div class = "form-wrapper">
				<form method = "POST" action = "include/process-update.php">
					<input type = "hidden" name = "input-id" value = "<?php echo $_GET['bsid'];?>">
					<label>
						Họ và tên:
					</label>
					<br>
					<input type = "text" name = "input-name" class = "input-text" value = "<?php echo $row['bsname'];?>" readonly = "readonly">
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
								echo '<option value ="' .$row2['ckid']. '"';
								if($row2['ckid'] == $row['chuyenkhoa'])
								{
									echo 'selected = "selected"';
								}
								echo'>' .$row2['ckname']. '</option>';
							}
							
						?>
					</select>
					<br>
					
					<label>
						Email:
					</label>
					<br>
					<input type = "text" name = "input-email" class = "input-text" value = "<?php echo $row['email'];?>" readonly = "readonly">
					<br>
					
					<label>
						Tình trạng công tác:
					</label>
					<br>
					<select name = "input-status" class = "input-text">
						<option value = "1" <?php if($row['status'] == 1) echo 'selected = "selected"'?>>Đang công tác</option>
						<option value = "0" <?php if($row['status'] == 0) echo 'selected = "selected"'?>>Đã thôi việc</option>
					</select>
					<br>
					
					<label>
						Quyền quản trị:
					</label>
					<br>
					<select name = "input-admin" class = "input-text">
						<option value = "1" <?php if($row['adminstatus'] == 1) echo 'selected = "selected"'?>>Có</option>
						<option value = "0" <?php if($row['adminstatus'] == 0) echo 'selected = "selected"'?>>Không</option>
					</select>
					<br>
					<?php
						if($_SESSION['id'] == $row['bsid'])
						{
							echo '<br><a class = "form-button" href = "changepass-form.php?bsid='. $row['bsid'] .'">
									Đổi mật khẩu
								</a><br>';
						}
					?>
					<div class = "input-submit">
						<input type = "submit" value = "Thay đổi" class = "submit-button">
						
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