<!DOCTYPE html>
<html lang="en">
	<head>
  
		<meta charset="utf-8"/>
		
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
		<!-- Link Swiper's CSS -->
		<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="style/style.css">
		
		<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

		<title>TRANG CHỦ - Bệnh viện đa khoa Hà Nội</title>
		
		
		
	</head>

	<body>
		<div class = "header">
			<?php
				include ('include/header.php');
			?>
		</div>
		
		<div class = "menu-bar">
			<?php
				include ('include/menubar.php');
			?>
		</div>
		
		<div class = "top-carousel">
			<?php
				include ('include/carousel.php');
			?>
		</div>
		
		<div class = "about-us">
			<?php
				include('include/about_number.php');
			?>
			
			<div class = "about-us-article">
				<div class = "article-body flex-box">
					<div class = "article_left p-justify">
						<b class = "desc-header-all">
							BỆNH VIỆN ĐA KHOA HÀ NỘI<br>
						</b>
						<p>
							Nằm giữa trung tâm Thủ đô Hà Nội, Bệnh viện Đa khoa Hà Nội chính thức đi vào hoạt động từ tháng 11/2010. Sau hơn 1 thập kỷ hình thành và phát triển, Bệnh viện được đánh giá là một trong những địa chỉ khám, chữa bệnh uy tín, có chất lượng dịch vụ cao.
							<br>
							Mỗi ngày Bệnh viện tiếp nhận hàng trăm lượt bệnh nhân trên cả nước đến thăm khám và điều trị. 100% khách hàng đều tin tưởng và hài lòng.
							<br>
						</p>
						
						<a href = "#" class = "reservation-btn round-border">
							XEM THÊM
						</a>
					</div>
					
					<div class = "article-right">
						<div class = "article-col">
							<b class = "article-col-title">
								HỆ THỐNG CƠ SỞ VẬT CHẤT HIỆN ĐẠI<br>
							</b>
							<img src = "images/abu_5.png" class = "article-col-img">
						</div>
						<div class = "article-col">
							<img src = "images/abu_6.png" class = "article-col-img">
							<b class = "article-col-title">
								TRANG THIẾT BỊ TỐI TÂN HÀNG ĐẦU
							</b>
							
						</div>
					</div>
					
				</div>
			</div>
			
			
			<div class = "about-us-video">
				<iframe width="100%" height="500"
					src="https://www.youtube.com/embed/BkEUEiuB8pI?autoplay=1&mute=1">
				</iframe>
			</div>
			
			<div class = "about-us-center">
				<?php
					include('include/about-us-center.php');
				?>
			</div>
			
			<div class = "about-us-ck">
				<div class = " about-us-header">
					<b class = "desc-header-all">
						CHUYÊN KHOA<br>
					</b>
					<img src = "images/group-1188.svg">
				</div>
				<?php
					include('include/swiper.php');
				?>
				
			</div>
			
			
			<div class = "about-us-gk">
				<?php
					include('include/about-us-chuyenkhoa.php');
				?>
			</div>
			<div class = "wrapper">
				<div class = "about-us-chuyengia about-us-article">
					<div class = " about-us-header">
						<b class = "desc-header-all">
							ĐỘI NGŨ CHUYÊN GIA HÀNG ĐẦU<br>
						</b>
						<img src = "images/group-1188.svg">
					</div>
					<div class = "carousel-chuyengia">
						<?php
							include('include/ck-carousel.php');
						?>
					</div>
				</div>
			</div>
			
			<div class = "about-us-services">
				<div class = "wrapper">
					<div class = " about-us-header">
						<b class = "desc-header-all">
							DỊCH VỤ CHUYÊN NGHIỆP - HIỆN ĐẠI<br>
						</b>
						<img src = "images/group-1188.svg">
					</div>
					<div class = "flex-box">
						<div class = "services-col first-col">
							<div>
								<b>
									HỆ THỐNG<br>THIẾT BỊ HIỆN ĐẠI
								</b>
							</div>
						</div>
						<div class = "services-col second-col">
							<div>
								<b>
									PHÒNG KHÁM, ĐIỀU TRỊ <br>TIỆN NGHI
								</b>
							</div>
						</div>
						<div class = "services-col third-col">
							<div>
								<b>
									DỊCH VỤ & <br> TIỆN ÍCH
								</b>
							</div>
						</div>
						<div class = "services-col forth-col">
							<div>
								<b>
									CHI PHÍ HỢP LÝ <br> HỖ TRỢ KHÁCH HÀNG 24/24
								</b>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			
			<div class = "news">
				<?php
					include('include/news.php');
				?>
			</div>
			
			<div class = "footer">
				<?php
					include('include/footer.php');
				?>
			</div>
			
		</div>
		
		
	</body>
</html>
