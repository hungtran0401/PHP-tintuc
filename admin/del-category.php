<?php
	$id=$_GET["id"];
	
	require("../library/config.php");
	mysql_query("delete from category where cate_id=$id");
	mysql_close($conn);
	header("location:list-category.php");
	exit();
?>