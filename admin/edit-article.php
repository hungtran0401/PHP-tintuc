<?php
	require("templates/header.php");
	$id=$_GET["id"];
	$loi=array();
	$loi['title']=$loi['intro']=$loi['content']=NULL;
	$title=$image=$intro=$content=$cate_id=NULL;
	if(isset($_POST["ok"]))
	
	{
		//lấy id chuyên mục mà người dùng đã chỉnh sửa
		$cate_id=$_POST["txtcate"];
		//lấy tiêu đề người dùng đã chỉnh sửa
		if(empty($_POST["txttitle"]))
		{
			$loi["title"]="vui lòng chỉnh sửa tiêu đề";
		}
		else
		{
			$title=$_POST["txttitle"];
		}
		//lấy hình
		if($_FILES["image"]["error"]>0) //nếu form hình ảnh mới xảy ra lỗi,tức là người dùng không lựa chọn tấm hình mới để upload
		{
			$image="none";// viết câu truy vấn không update image	
		}
		else
		{
			$image=$_FILES["image"]["name"];//viết câu truy vấn update image	
		}
		
		//lấy nội dung mô tả mà người dùng đã chỉnh sửa
		if(empty($_POST['txtintro']))
		{
			$loi["intro"]="Vui lòng sửa mô tả</br>";	
		}
		else
		{
			$intro=$_POST["txtintro"];	
		}
		//lấy nội dung phần bài viết
		if(empty($_POST['txtcontent']))
		{
			$loi['content']="vui lòng chỉnh sửa nội dung</br>";	
		}
		else
		{
			$content=$_POST['txtcontent'];	
		}
		
		if( $title && $image && $intro && $content)
		{
			// mở kết nối CSDL
			require("../library/config.php");
			if($image=="none")
			{
				mysql_query("update news set title='$title',introduce='$intro',content='$content' where news_id=$id");	
			}
			else
			{
				mysql_query("update news set image='$image', title='$title',introduce='$intro',content='$content' where news_id=$id");		
			}
			mysql_close($conn);
			header("location:list-article.php");
			exit();
		}
		move_uploaded_file($_FILES['image']['tmp_name'],"../library/image".$_FILES['image']['name']);
	}
	
	require("../library/config.php");
	$result=mysql_query("select cate_id,title,image,introduce,content from news where news_id=$id");
	$data=mysql_fetch_assoc($result);
	mysql_close($conn);
?>

<div id="wrapper2">
	<fieldset>
    	<legend>Giới thiệu chỉnh sửa bài viết</legend>
        <form action="edit-article.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        	<table>
            	<tr>
                    <td>Chuyên mục</td>
                    <td>
                        <select name="txtcate">
                        	<?php
							require("../library/config.php");
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
                     <td>
                </tr>
                <tr>
                	<td>Tiêu đề</td>
                    <td><input type="text" name="txttitle" value="<?php echo $data['title'];?>"/></td>
                </tr>
                <tr>
                	<td>Hình ảnh cũ</td>
                    <td><img src="../library/image/<?php echo $data['image']; ?>" width="100"/></td>
                </tr>
                <tr>
                	<td>Hình ảnh mới</td>
                    <td><input type="file" name="image"/></td>
                </tr>
                <tr>
                	<td>Mô tả</td>
                    <td><textarea cols="25" rows="5" name="txtintro"><?php echo $data['introduce'];?></textarea></td>
                </tr>
                 <tr>
                	<td>Nội dung</td>
                    <td><textarea cols="55" rows="10" id="txtcontent" name="txtcontent"><?php echo $data['content'];?></textarea>
                    <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'txtcontent' );
            </script>
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




