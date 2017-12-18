<?php
	require("templates/header.php");
	$category=$loi["category"]=NULL;	
	if(isset($_POST["ok"]))
	{
		if(empty($_POST["txtname"]))
		{
			$loi["category"]= "Vui lòng nhập tên chuyên mục";
		}
		else
		{
			$category=$_POST["txtname"];	
		}
		
		if($category)
		{
			require("../library/config.php");
			mysql_query("insert into category(cate_title)
									 value('$category')");
			mysql_close($conn);	
		}
	}
?>

<div id="wrapper2">
	<fieldset style="width:70px;margin:20px auto 10px;">
    	<legend>Thêm chuyên mục</legend>
        <form action="add-category.php" method="post">
        	<table>
            	<tr>
                	<td>Name</td>
                    <td><input type="text" size=25 name="txtname"/></td>
                </tr>
                <tr>
                	<td></td>
                    <td ><input type="submit" value="add" name="ok"/></td>
                </tr>
            </table>
         </form>
    </fieldset>
</div>
<div style="width:250px;color:red;margin:20px auto 20px;">
	<?php
		echo $loi["category"];
	?>
</div>

<?php
	require("templates/footer.php");
?>