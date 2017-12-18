<?php
	require('templates/header.php');
	$id=$_GET['id'];
	
	$subcate_name=$loi['subcate_name']=Null;
	if(isset($_POST['ok']))
	{
		// lấy id mà người dùng đã lựa chọn
		$cate_id=$_POST['cate_id'];
		if(empty($_POST['txtname']))
		{
			$loi['subcate_name']="Chưa chỉnh sửa tên sub chuyên mục";

		}
		else
		{
			$subcate_name=$_POST['txtname'];
		}

		if($subcate_name)
		{
			require('../library/config.php');
			mysql_query("Update subcategory set subcate_title = '$subcate_name' where cate_id=$cate_id");
			mysql_close($conn);
		}

	}

	require('../library/config.php');
	$result=mysql_query("select cate_id,subcate_title from subcategory where subcate_id=$id ");
	$data=mysql_fetch_assoc($result);
	mysql_close($conn);
?>

<fieldset>
	<legend>Chỉnh sửa chuyên mục con</legend>
	<form action="edit-subcate.php" method="post">
		<table style="margin-left: 30px;">
			<tr style="height:30px;">
				<td >Chuyên mục cha</td>
				<td>
					<select name="cate_id" >
					<?php
					require('../library/config.php');
					$result1=mysql_query("select cate_id,cate_title from category");
					while($data1=mysql_fetch_assoc($result1))
					{
						if($data['cate_id']==$data1['cate_id'])
						{
							echo "<option value=$data1[cate_id] selected='selected'>$data1[cate_title]</option>";
						}
						else
						{
							echo "<option value=$data1[cate_id] >$data1[cate_title]</option>";
						}
					}
					mysql_close($conn);
					?>
					</select>
				</td>
				
			</tr>
			<tr>
				<td>Name</td>
				<td>
					<input type="text" name="txtname" value="<?php echo $data['subcate_title']; ?>">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name='ok' value="Update">
				</td>
			</tr>
		</table>
	</form>
</fieldset>
<div style="color:red;text-align: center;">
<?php
	echo "$loi[subcate_name]";
?>
</div>



<?php 
	require('templates/footer.php');


 ?>