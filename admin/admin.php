<?php
	session_start();
	
	
	if($_SESSION["level"]==2)
	{
		require("templates/header.php");
		require("templates/footer.php");
	}
	else
	{
		header("location:../index.php");
		exit();
	}
?>