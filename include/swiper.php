
<div class="swiper-container mySwiper">
	<div class="swiper-wrapper">
		<?php
			require_once('mysqli_connect.php');
				
			$query = 'SELECT * FROM `chuyenkhoa` WHERE 1';
			$q = mysqli_stmt_init($dbcon);
			mysqli_stmt_prepare($q, $query);
			mysqli_stmt_execute($q);
			
			$result = mysqli_stmt_get_result($q);
			while($row = mysqli_fetch_assoc($result))
			{
				echo '<div class="swiper-slide">
						<a href ="#">
							<br>' . $row['ckname'] . 
						'</a>
					</div>';
			}
		?>
	</div>
	<div class="swiper-pagination"></div>
</div>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
	slidesPerView: 5,
	spaceBetween: 30,
	pagination: {
	  el: ".swiper-pagination",
	  clickable: true,
	},
  });
</script>
