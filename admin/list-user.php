<?php
	require("templates/header.php");
?>
         
         
        <div id="wrapper">
        	<table>
            	<tr style="background:#3FF;color:#FFF;">
                	<th>Stt</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Delete</th>
                	
                </tr>
                
                <?php
                //mở kết nối với CSDL
				require("../library/config.php");
				//Thực hiện câu truy vấn
				$Stt=1;
				$result=mysql_query("select userid, username,email,level from user");
				while($data=mysql_fetch_assoc($result))
				{
					echo "<tr>";
						echo "<td>$Stt</td>";
						echo "<td>$data[username]</td>";
						echo "<td>$data[email]</td>";
						if($data['level']==1)
						{
							echo "<td>Thành viên</td>";
						}
						else
						{
							echo "<td>Admin</td>";
						}
						
						echo "<td><a href='del-user.php?id=$data[userid]' onclick='return show_confirm();'>Delete</a></td>";
					echo "</tr>";
					$Stt++;
				}
					// đóng kết nối
					mysql_close($conn);
				?>
                
               
            </table>
   
<?php
	require("templates/footer.php");
?>