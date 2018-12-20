<?php
	session_start();
	
	if (isset($_SESSION['AAS']['Login']))
	{
		header('Location: home.php');
	}
	else
	{
		header('Location: login.php');
	}
?>