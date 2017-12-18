<?php
	require("templates/header.php");
	$id=$_GET["id"];
	$loi=array();
	$loi["catename"]=NULL;
	$catename=NULL;
	if(isset($_POST["ok"]))
	{
		if(empty($_POST["textname"]))
		{
			$loi["catename"]="Vui long chinh sua";	
		}
		else
		{
			$catename=$_POST["textname"];	
		}
		
		if($catename)
		{
			require("../library/config.php");
			mysql_query("update category set cate_title='$catename' where cate_id=$id");
			mysql_close($conn);
			header("location:list-category.php");
			exit();
		}
	}
	
	
	
	require("../library/config.php");
	$result=mysql_query("select cate_title from category where cate_id=$id");
	$data=mysql_fetch_assoc($result);
?>

<div id="wrapper2">
<fieldset style="width:27px;margin:20px auto 10px;">
	<legend>Chỉnh sửa chuyên mục</legend>
    	<form action="edit-category.php?id= <?php echo $id; ?>" method="post">
        	<table>
            	<tr>
                	<td>Name</td>
                    <td><input type="text"   name="textname" value="<?php echo $data['cate_title'];?>"/></td>
                </tr>
                <tr>
                	<td></td>
                    <td><input type="submit" value="Update" name="ok" /></td>
                </tr>
            </table>
        </form>
</fieldset>

</div>
<div style="color:red; text-align:center;">
	<?php
		echo $loi["catename"];
	?>
</div>
	
<?php
mysql_close($conn);
	require("templates/footer.php");
?>