<?php
	session_start();
	$id=$_GET["id"];
	require('tempates/header.php');
	
	$loi=array();
	$name=$mess=$loi['name']=$loi['mess']=NULL;
	if(isset($_POST["ok"]))
	{
		if(empty($_POST["txtname"]))
		{
			$loi['name']="Vui long nhap ten";	
		}
		else
		{
			$name=$_POST["txtname"];	
		}
		if(empty($_POST["txtmess"]))
		{
			$loi['mess']="vui long nhap binh luan";	
		}
		else
		{
			$mess=$_POST['txtmess'];
		}
		
		if($name && $mess)
		{
			require("library/config.php");
			$result2=mysql_query("insert into comment(name,message,time,cm_check,news_id)
											  value('$name','$mess',now(),'N','$id')");
			
			mysql_close($conn);	
		}
		echo "<script type='text/javascript'>";
		echo "alert('Binh luan cua ban da duoc gui thanh cong va dang cho kiem duyet')";
		echo "</script>";
		
	}
?>
        	<div id="left">
           		<div id="detail-article">
                	<?php
						
						require("library/config.php");
						$result=mysql_query("select cate_id,title,introduce,content from news where news_id='$id'");
						$data=mysql_fetch_assoc($result);
						
						echo"<h2>$data[title]</h2>";
						echo"<p style='font-weight:bold;color:#666;'>$data[introduce]</p>";
						echo"<p>$data[content]</p>";
						
						mysql_close($conn);
					?>
                    </div>
                    <div id="different-article">
                    	<?php
							require("library/config.php");
							$result1=mysql_query("select news_id,title from news where cate_id=$data[cate_id] and news_id < $id order by news_id desc limit 3");
							
							
								echo "<p>Các bài viết khác:</p>";
								echo "<ul>";
								while($data1=mysql_fetch_assoc($result1))
								{
									echo"<li><a href='detail.php?id=$data1[news_id]'>$data1[title]</a></li>";
								}
								echo "</ul>";
							
						mysql_close($conn);
						?>
                    	
                    </div>
                    <div id="comment">
                    	<fieldset>
                        <legend>Comment</legend>
                        	<form action="detail.php?id=<?php echo $id; ?>" method="post">
                            	<table>
                                	<tr>
                                    	<td>Name</td>
                                        <td><input type="text" name="txtname" value="<?php echo $loi['name']; ?>"/></td>
                                    </tr>
                                    <tr>
                                    	<td>Mess</td>
                                        <td><textarea cols="50" rows="10" name="txtmess"><?php echo $loi['mess']; ?></textarea></td>
                                    </tr>
                                    <tr>
                                    	<td></td>
                                        <td><input type="submit" name="ok" /> </td>
                                    </tr>
                                </table>
                            </form>
                        </fieldset>
                    </div>
                    <div id="show-comment" style="margin:20px 0px 10px;">
                    <?php
						require("library/config.php");
						$result3=mysql_query("select name,time,message from comment where cm_check='Y' and news_id=$id order by cm_id desc");
						while($data3=mysql_fetch_assoc($result3))
						{
						echo "<div class='comment'>";
							echo "<img src='picture.jpg' width='60px'/>";
							echo "<div class='mess'>";
								$sqltime=$data3['time'];
								$timestamp=strtotime($sqltime);
								$time=date('d-m-Y H:i:s',$timestamp);
								echo "<p style='color:#09F;'>$data3[name] <span style='color:#999'>$time</span></p>";
								echo "<p>$data3[message]</p>";
							 echo "</div>";
							 echo "<div style='clear:left'></div>";
						echo "</div>";
						}
					 mysql_close($conn);
						
					 ?>	
                    
            		</div>
               </div>
            
            
         <?php
		   	
		 require("tempates/content-right.php");
  		 require("tempates/footer.php");
  ?>
