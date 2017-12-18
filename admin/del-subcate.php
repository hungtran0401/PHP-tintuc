<?php 
	$id=$_GET['id'];
	require('../library/config.php');
	mysql_query("delete from subcategory where subcate_id=$id");

	mysql_close($conn);
	header('location:list-subcate.php');
	exit();


 ?>