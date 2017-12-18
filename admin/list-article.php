<?php
	require("templates/header.php");
?>
         
         
        <div id="wrapper">
        	<table>
            	<tr>
                	<td colspan="3"></td>
                    <td colspan="2"><a href="add-article.php">Thêm bài viết</a></td>
                </tr>
            	<tr style="background:#3FF;color:#FFF;">
                	<th>Stt</th>
                    <th>Chuyên mục</th>
                    <th>Tựa bài viết</th>
                    <th style="width:80px;">Edit</th>
                    <th style="width:80px;">Delete</th>
                	
                </tr>
                <?php
				require("../library/config.php");
				$result=mysql_query("select a.cate_title,b.title,b.news_id from category as a,news as b where a.cate_id=b.cate_id");
				$Stt=1;
				while($data=mysql_fetch_assoc($result))
				{
					echo "<tr>";
						echo"<td>$Stt</td>";
						echo"<td>$data[cate_title]</td>";
						echo"<td>$data[title]</td>";
						echo"<td><a href='edit-article.php?id=$data[news_id]'>Edit</a></td>";
						echo"<td><a href='del-article.php?id=$data[news_id]' onclick='return show_confirm();'>Delete</a></td>";
					echo"</tr>";
					$Stt++;
				}
				?>
                
            </table>
            
<?php
	require("templates/footer.php");
?>