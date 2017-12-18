<?php 
	require("templates/header.php");
	$loi=array();
	$catename=$loi['cate_name']=NULL;
	
	
	
	if(isset($_POST['ok']))
	{
		//Lay id ma nguoi dung lua chon
		$cate_id=$_POST['txtcate'];
		
		
		if(empty($_POST['txtname']))
		{
			$loi['cate_name']="Chua them ten chuyen muc con";	
		}
		else
		{
			$catename=$_POST['txtname'];	
		}
	if($catename)
	
	{
		require('../library/config.php');
		mysql_query("insert into subcategory(subcate_title,cate_id)
								 value('$catename','$cate_id')");
		mysql_close($conn);							
	}
	
	}
?>

<fieldset style="width:600px;margin:20px auto 10px;">
	<legend>Them chuyen muc con</legend>
    <form action="add-subcate.php" method="post">
    	<table id="wrapper2" style="margin-left:30px;">
        	<tr>
            	<td style="width:150px;height:30px;">Chuyen muc cha</td>
                <td>
                	<select name="txtcate">
                    	<?php
							require('../library/config.php');
							$result=mysql_query('select cate_id,cate_title from category ');
							while($data=mysql_fetch_assoc($result))
							{
                				echo "<option value='$data[cate_id]'>$data[cate_title]</option>";
							}
							mysql_close($conn);
						?>
                	</select>
                </td>
            </tr>
            
            <tr>
            	<td>Name</td>
                <td>
                	<input tyle="text" size=25px/ name="txtname">
                </td>
                
            </tr>
            <tr>
            	<td></td>
                <td>
                	<input type="submit" value="Add" name="ok" />
                </td>
            </tr>
        
        </table>
    </form>

</fieldset>
<div style="color:red;text-align:center;">
<?php
	echo $loi['cate_name'];
?>
</div>


<?php 
	require("templates/footer.php");


?>