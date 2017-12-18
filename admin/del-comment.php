<?php
	$id=$_GET['id'];
	require("../library/config.php");
	mysql_query("delete from comment where cm_id=$id");
	mysql_close($conn);
	header("location:list-comment.php");
	exit();
?>