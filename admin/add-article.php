<?php
	require("templates/header.php");
	
	$loi=array();
	$loi["title"]=$loi["image"]=$loi["intro"]=$loi["content"]=NULL;
	$title=$image=$intro=$content=NULL;
	if(isset($_POST["ok"]))
	{
		$cate_id=$_POST["txtcate"];	
		
		if(empty($_POST["txttitle"]))
		{
			$loi["title"]="Xin vui long nhap tieu de</br>";	
		}
		else
		{
			$title=$_POST["txttitle"];	
		}
		//check co anh chua
		if($_FILES["image"]["error"]>0)
		{
			$loi["image"]="Vui long upload hinh</br>";	
		}
		else
		{
			$image=$_FILES["image"]["name"];	
		}
		//check nhap intro chua
		if(empty($_POST["txtintro"]))
		{
			$loi["intro"]="Chua nhap intro</br>";
				
		}
		else
		{
			$intro=$_POST["txtintro"];	
		}
		//check nhap content
		
		if(empty($_POST["txtcontent"]))
		{
			$loi["content"]="Chua nhap content</br>";
			
		}
		else
		{
			$content=$_POST["txtcontent"];	
		}
		//Them thong tin vao CSDL
		if($title && $image && $intro && $content)
		{
			//ket noi vs CSDL
			require("../library/config.php");
			
			mysql_query("insert into news(title,image,introduce,content,cate_id)
									 value('$title','$image','$intro','$content','$cate_id')");
			//dong CSDL
			mysql_close($conn);		
		}
		move_uploaded_file($_FILES["image"]["tmp_name"],"../library/image/".$_FILES["image"]["name"]);
		
	}
?>

	<div id="wrapper2">
    	<fieldset style="width:600px;margin:20px auto 10px;">
        	<legend>Thêm chuyên mục</legend>
            	<form action="add-article.php" method="post" enctype="multipart/form-data">
                	<table>
                    	<tr>
                        	<td style="width:100px;">Chuyên mục</td>
                            <td>
                            	<select name='txtcate'>
                                	<?php
									require("../library/config.php");
									$result=mysql_query("select cate_id,cate_title from category");
									while($data=mysql_fetch_assoc($result))
									{
                                	echo "<option value=$data[cate_id]>$data[cate_title]</option>";
                                    }
									 mysql_close($conn);
									 ?>
                                </select>
                             </td>
							
                        </tr>
                        <tr>
                        	<td>Tiêu đề</td>
                            <td><input type="text" size=25 name="txttitle"/></td>
                            
                        </tr>
                        <tr>
                        	<td>Hình ảnh</td>
                            <td><input type="file" size=25 name="image" style="padding-left:0px;"/></td>
                            
                        </tr>
                        <tr>
                        	<td>Mô tả</td>
                            <td><textarea cols"55" rows="5" name=
"txtintro"></textarea></td>
                            
                        </tr>
                        <tr>
                        	<td>Nội dung</td>
                            <td><textarea cols="55" rows="20" name="txtcontent"></textarea></td>
                        </tr>
                                                
                        <script type="text/javascript">
						CKEDITOR.replace( 'txtcontent', {
      filebrowserBrowseUrl: 'http://localhost/www/tintuc/library/ckeditor/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: 'http://localhost/www/tintuc/library/ckeditor/ckfinder/ckfinder.html?type=Images',
      filebrowserFlashBrowseUrl: 'http://localhost/www/tintuc/library/ckeditor/ckfinder/ckfinder.html?type=Flash',
      filebrowserUploadUrl: 'http://localhost/www/tintuc/library/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: 'http://localhost/www/tintuc/library/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl: 'http://localhost/www/tintuc/library/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
     } ); 
						</script>
                        <tr>
                        	<td></td>
                            <td><input type="submit" value="ADD" name="ok"/></td>
                        </tr>
                    </table>
                </form>
        </fieldset>
    
    </div>
    <div style="width:250px;margin:20px auto 10px;color:red;text-align:center;">
    	<?php
			echo $loi["title"];
			echo $loi["image"];
			echo $loi["intro"];
			echo $loi["content"];
		?>
    </div>
    
<?php
	require("templates/footer.php");
?>