<?php
	$id=$_GET["id"];
	
	//mo CSDL
	require("../library/config.php");
	//thuc hien cau truy van
	mysql_query("delete from user where userid='$id' ");
	mysql_close($conn);
	
	
	header("location:list-user.php");
	exit();
	
?>