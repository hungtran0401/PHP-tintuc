<?php
$id=$_GET["id"];
	require("../library/config.php");
	mysql_query("delete from news where news_id=$id");
	mysql_close($conn);
	header("location:list-article.php");
	exit();
?>