<?php
	if($_GET['showid'] == 4)
	{
		include("pending-list.php");
	}
	else if($_GET['showid'] == 3)
	{
		include("employee-list.php");
	}
	else if($_GET['showid'] == 2)
	{
		include('patient-list.php');
	}
	else include('reserve-list.php');
?>