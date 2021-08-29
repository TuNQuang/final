<?php
	if($_GET['value'] == 1)
	{
		echo 	'<label>
					Ngày tái khám:
				</label>
				<br>';
		echo 	'<input type = "date" class = "input-text" name = "input-taikham-date">
				<br></br>';
	}
	else echo '';
?>