<ul>
	<li class = "menu-bar-item no-decor">
		<a href = "#" class = "no-decor menu-link">
			<b>
				GIỚI THIỆU
			</b>
		</a>
		<div class = "dropdown-content">
			<a href = "#" class = "no-decor dropdown-link dotted-border">
				Lịch sử hình thành
			</a>
			<a href = "#" class = "no-decor dropdown-link dotted-border">
				Tầm nhìn & sứ mệnh
			</a>
			<a href = "#" class = "no-decor dropdown-link dotted-border">
				Thành tựu nổi bật
			</a>
			<a href = "#" class = "no-decor dropdown-link ">
				Đối tác
			</a>
		</div>
	</li>
	<li class = "menu-bar-item no-decor">
		<a href = "#" class = "no-decor menu-link">
			<b>
				CHUYÊN KHOA
			</b>
		</a>
		<div class = "dropdown-content">
			<?php
				require_once('mysqli_connect.php');
				
				$query = 'SELECT * FROM `chuyenkhoa` WHERE 1';
				$q = mysqli_stmt_init($dbcon);
				mysqli_stmt_prepare($q, $query);
				mysqli_stmt_execute($q);
				
				$result = mysqli_stmt_get_result($q);
				while($row = mysqli_fetch_assoc($result))
				{
					echo '<a href = "#" class = "no-decor dropdown-link dotted-border">';
						echo $row['ckname'];
					echo '</a>';
				}
			?>
		</div>
	</li>
	<li class = "menu-bar-item no-decor">
		<a href = "#" class = "no-decor menu-link">
			<b>
				GÓI KHÁM & ĐIỀU TRỊ
			</b>
		</a>
		<div class = "dropdown-content">
			<div class = "anchor">
				<div class = "anchor">
					<a href = "#" class = "no-decor dropdown-link dotted-border">
						Gói khám
					</a>
				</div>
				<div class = "anchor-hover">
					<?php
						require_once('mysqli_connect.php');
				
						$query = "SELECT * FROM `services` WHERE `sname` LIKE '%Gói khám%'";
						$q = mysqli_stmt_init($dbcon);
						mysqli_stmt_prepare($q, $query);
						mysqli_stmt_execute($q);
						
						$result = mysqli_stmt_get_result($q);
						while($row = mysqli_fetch_assoc($result))
						{
							echo '<a href = "#" class = "no-decor dropdown-link dotted-border">';
								echo $row['sname'];
							echo '</a>';
						}
					?>
				</div>
			</div>
			<div class = "anchor">
				<div class = "anchor">
					<a href = "#" class = "no-decor dropdown-link dotted-border">
						Gói điều trị
					</a>
				</div>
				<div class = "anchor-hover">
					<?php
						require_once('mysqli_connect.php');
				
						$query = "SELECT * FROM `services` WHERE `sname` not LIKE '%Gói khám%'";
						$q = mysqli_stmt_init($dbcon);
						mysqli_stmt_prepare($q, $query);
						mysqli_stmt_execute($q);
						
						$result = mysqli_stmt_get_result($q);
						while($row = mysqli_fetch_assoc($result))
						{
							echo '<a href = "#" class = "no-decor dropdown-link dotted-border">';
								echo $row['sname'];
							echo '</a>';
						}
					?>
					</a>
				</div>
			</div>
		</div>
	</li>
	<li class = "menu-bar-item no-decor">
		<a href = "#" class = "no-decor menu-link">
			<b>
				ĐỘI NGŨ CHUYÊN MÔN
			</b>
		</a>
	</li>
	<li class = "menu-bar-item no-decor">
		<a href = "#" class = "no-decor menu-link">
			<b>
				KHÁCH HÀNG CẦN BIẾT
			</b>
		</a>
		<div class = "dropdown-content">
			<a href = "#" class = "no-decor dropdown-link dotted-border">
				Giờ làm việc
			</a>
			<a href = "#" class = "no-decor dropdown-link dotted-border">
				Bảng giá dịch vụ chung
			</a>
			<a href = "#" class = "no-decor dropdown-link dotted-border">
				Hướng dẫn test covid-19
			</a>
			<a href = "#" class = "no-decor dropdown-link dotted-border">
				Hướng dẫn đặt lịch khám
			</a>
			<a href = "#" class = "no-decor dropdown-link dotted-border">
				Hướng dẫn nhập viện
			</a>
			<a href = "#" class = "no-decor dropdown-link dotted-border">
				Hướng dẫn xuất viện
			</a>
			<a href = "#" class = "no-decor dropdown-link dotted-border">
				Chính sách bảo hiểm
			</a>
			<a href = "#" class = "no-decor dropdown-link dotted-border">
				Hướng dẫn đặt phòng nội trú
			</a>
			<a href = "#" class = "no-decor dropdown-link dotted-border">
				Hướng dẫn khách hàng nội trú
			</a>
			<a href = "#" class = "no-decor dropdown-link ">
				Quy định giờ thăm bệnh nhân nội trú
			</a>
		</div>
	</li>
	<li class = "menu-bar-item no-decor">
		<a href = "#" class = "no-decor menu-link">
			<b>
				TIN TỨC & SỰ KIỆN
			</b>
		</a>
		<div class = "dropdown-content">
			<a href = "#" class = "no-decor dropdown-link dotted-border">
				Sự kiện & hoạt động của bệnh viện
			</a>
			<a href = "#" class = "no-decor dropdown-link dotted-border">
				Báo chí nói gì về chúng tôi
			</a>
			<a href = "#" class = "no-decor dropdown-link ">
				Tin tuyển dụng
			</a>
		</div>
	</li>
	<li class = "menu-bar-item no-decor">
		<a href = "#" class = "no-decor menu-link">
			<b>
				TIỆN ÍCH
			</b>
		</a>
		<div class = "dropdown-content">
			<a href = "#" class = "no-decor dropdown-link dotted-border">
				Cơ sở vật chất
			</a>
			<a href = "#" class = "no-decor dropdown-link dotted-border">
				Thư viện ảnh
			</a>
			<a href = "#" class = "no-decor dropdown-link ">
				Thư viện video
			</a>
		</div>
	</li>
	<li class = "menu-bar-item no-decor right-float">
		<a href = "reserve-form.php" class = "dropdown-link reservation-btn round-border no-decor">
			<b>
				ĐẶT LỊCH NGAY
			</b>
		</a>
	</li>
</ul>