<?php
	require("templates/header.php");
	
?>
         
         
        <div id="wrapper">
        	<table>
            	<tr style="background:#3FF;color:#FFF;">
                	<th>Stt</th>
                    <th>Name</th>
                    <th>Message</th>
                    <th>Link</th>
                    <th>Duyệt</th>
                    <th>Delete</th>
                	
                </tr>
                <?php
				$Stt=1;
				require("../library/config.php");
				$result=mysql_query("select cm_id,cm_check,name,message,news_id from comment order by cm_id desc");
				while($data=mysql_fetch_assoc($result))
				{
                echo "<tr>";
                	echo "<td>$Stt</td>";
                    echo "<td>$data[name]</td>";
                    echo "<td>$data[message]</td>";
                    echo "<td><a href='../detail.php?id=$data[news_id]' target='_blank'>Xem</a></td>";
					if($data['cm_check']=="N")
					{
                    	echo "<td><a href='edit-comment.php?id=$data[cm_id]'>Chua duyet</a></td>";
					}
					else
					{
						echo "<td><a href='edit-comment.php?id=$data[cm_id]'>Da duyet</a></td>";
					}
					
                    echo "<td><a href='del-comment.php?id=$data[cm_id]' onclick='return show_confirm();'>Delete</a></td>";
                echo "</tr>";
				
				$Stt++;
				}
				mysql_close($conn);
				
				 ?>
                
                
            </table>

<?php
	require("templates/footer.php");
?>