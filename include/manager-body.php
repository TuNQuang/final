

<div class = "wrapper flex-box">
	<div class = "manager-body-navigator">
		<ul>
			<li class = "navigator-item no-decor">
				<a href = "#" class = "no-decor" id = "1"  onclick = "show_manager_body(this.id)">
					Danh sách khám
				</a>
			</li>
			<li class = "navigator-item no-decor">
				<a href = "#" class = "no-decor" id = "2"  onclick = "show_manager_body(this.id)">
					Danh sách bệnh nhân
				</a>
			</li>
			<?php
				if($_SESSION['admin'] == 1)
				{
					echo '<li class = "navigator-item no-decor">
						<a href = "#" class = "no-decor" id = "3"  onclick = "show_manager_body(this.id)">
							Danh sách nhân sự
						</a>
					</li>
					<li class = "navigator-item no-decor">
						<a href = "#" class = "no-decor" id = "4"  onclick = "show_manager_body(this.id)">
							Lịch hẹn chưa duyệt
						</a>
					</li>';
				}
			?>
		</ul>
	</div>
	<div class = "manager-body-show" id = "manager-body-show">
		
	</div>
</div>

<script>
	function show_manager_body(id)
	{
		const xhttp = new XMLHttpRequest();
		xhttp.onload = function() 
		{
			document.getElementById("manager-body-show").innerHTML = this.responseText;
		}
		xhttp.open("GET", "include/ajax-show.php?showid=" + id);
		xhttp.send();
	}
</script>