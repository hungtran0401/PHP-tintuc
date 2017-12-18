<?php
	require("templates/header.php");
	$id=$_GET['id'];
	if(isset($_POST['ok']))
	{
		//Lay lua chon cua nguoi dung
		$check=$_POST['txtname'];
		
		require("../library/config.php");
		mysql_query("update comment set cm_check='$check' where cm_id=$id");
		mysql_close($conn);	
		header("location:list-comment.php");
		exit();
	}
?>

<div id=wrapper2>
	<fieldset style="width:250px;margin:20px auto 10px;">
    	<legend>Chinh sua bai viet</legend>
        	<form action="edit-comment.php?id=<?php echo $id; ?>" method="post" >
            	<table >
                	<tr>
                    	<td >Duyet comment</td>
                        <td>
                        	<select name="txtname">
                            	<option value="N">Chua duyet</option>
                                <option value="Y">Da duyet</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                    	<td></td>
                        <td><input type="submit" value="Update" name="ok"/></td>
                    </tr>
                    
                </table>
            </form>
    </fieldset>
</div>

<?php
	require("templates/footer.php");
?>