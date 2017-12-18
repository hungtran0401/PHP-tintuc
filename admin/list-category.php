<?php
	require("templates/header.php");
?>
         
         
        <div id="wrapper">
        	<table>
            <tr>
            	
                <td colspan="2"></td>
               
                <td colspan="2"><a href="add-category.php">Thêm chuyên mục</a></td>
            </tr>
            	<tr style="background:#3FF;color:#FFF;">
                	<th style="width:100px;">Stt</th>
                    <th>Chuyên mục</th>
                    <th style="width:100px;">Edit</th>
                    <th style="width:100px;">Delete</th>
                	
                </tr>
                
                <?php
				$Stt=1;
					require("../library/config.php");
					$result=mysql_query("select cate_id,cate_title from category");
					while($data=mysql_fetch_assoc($result))
					{
						echo "<tr>";
							echo "<td>$Stt</td>";
							echo "<td>$data[cate_title]</td>";
							echo "<td><a href='edit-category.php?id=$data[cate_id]'>Edit</a></td>";
							echo "<td><a href='del-category.php?id=$data[cate_id]' onclick='return show_confirm();'>Delete</a></td>";
						echo "</tr>";
						$Stt++;
					}
					
							mysql_close($conn);
					
				?>
               
                
            </table>
            
<?php
	require("templates/footer.php");
?>