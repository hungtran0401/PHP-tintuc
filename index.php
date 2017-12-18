<?php
	session_start();
	require('tempates/header.php');
?>
        	<div id="left">
            	
                <?php
					require("library/config.php");
					
					$result3=mysql_query("select cate_id,cate_title from category");
					while($data3=mysql_fetch_assoc($result3))
					{
					echo "<div class='news'>";
                	echo "<div  style='border-bottom:1px solid #CCC;margin-bottom:5px;color:#900;padding:0 5px 2px 5px;'>$data3[cate_title]</div>";
                	echo "<div   style='width:380px;text-align:justify;float:left;'>";
					
						// truy xuat du lieu
						$result=mysql_query("SELECT cate_id,news_id,title,image,introduce FROM news where cate_id=$data3[cate_id] order by news_id desc");
						$data=mysql_fetch_assoc($result);
						
						
                        echo "<h3><a href='detail.php?id=$data[news_id]'>$data[title]</a></h3>";
                        echo "<img src='library/image/$data[image]' width=140px height=93px " ;
						echo "<p>$data[introduce]</p>";
						mysql_close($conn);
						?>
					</div>
                    <div style='width:180px;float:left;border-left:1px solid #CCC;margin-left:10px;padding-left:20px;'>
					<ul>
                    <?php
							require("library/config.php");
							$result2=mysql_query("select news_id,title from news where cate_id=$data[cate_id] order by news_id desc limit 1,3");
							while($data2=mysql_fetch_assoc($result2))
							{
							   echo "<li><a href='detail.php?id=$data2[news_id]'>$data2[title] </a></li>";
							}
                        echo "</ul>";
                    echo "</div>";
                    echo "<div style='clear:left;'></div>";
                	echo "</div>";
					}
					mysql_close($conn);
					
				?>

                
                
            </div>
            
            
  <?php
  	require("tempates/content-right.php");
  	require("tempates/footer.php");
  ?>
