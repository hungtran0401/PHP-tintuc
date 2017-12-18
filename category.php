<?php
	session_start();
	require('tempates/header.php');
	$id=$_GET["id"];
?>
        	<div id="left">
            <?php
				require("library/config.php");
				$result=mysql_query("select cate_title from category where cate_id=$id");
				$data=mysql_fetch_assoc($result);
            	echo "<h2 style='margin:0 10px 0 10px;border-bottom:1px solid #CCC;'>$data[cate_title]</h2>";
                if(isset($_GET['begin']))
				{
					
					$position=$_GET['begin'];	
				}
				else
				{
					$position=0;
				}
				$display=2;
				
				$result1=mysql_query("select news_id,title,image,introduce from news where cate_id=$id order by news_id desc limit $position,$display");
				while($data1=mysql_fetch_assoc($result1))
				{
                echo"<div class='news'>";
                echo"<h3><a href='detail.php?id=$data1[news_id]'>$data1[title]</a></h3>";
                echo"<img src='library/image/$data1[image]' width='140px' height='93px'/>";
                echo"<p>$data1[introduce] <p>";
				echo"<div style='clear:left;'></div>";
                echo" </div>";
				}
				mysql_close($conn);
				?>
                  <div style="clear:left;"></div>
                 
                 <div id="pagination">
                 <?php
				 	
					require("library/config.php");
					$result=mysql_query("select * from news where cate_id=$id");
					$sum_news=mysql_num_rows($result);
					$sum_page=ceil($sum_news/$display);
					if($sum_page>1)
					{
						echo "<ul>";
							$current=($position/$display)+1;
							if($current!=1)
							{
								$prev=$position - $display;
								echo "<li><a href='category.php?id=$id&begin=$prev'>Prev</a></li>";	
							}
							
							for($page=1;$page<=$sum_page;$page++)
							{
							$begin=($page-1)*$display;
								if($current==$page)
								{
									echo "<li><a href='category.php?id=$id&begin=$begin' style='color:red;'>$page</a></li>";
								}
								else
								{
									echo "<li><a href='category.php?id=$id&begin=$begin' >$page</a></li>";
								}
							}
							if($current!=$sum_page)
							{
								$next=$position + $display;
								echo "<li><a href='category.php?id=$id&begin=$next'>Next</a></li>";	
							}
						echo "</ul>";
					}
					 mysql_close($conn);
			?>
                </div>
               
          </div>
           
            
        <?php
		require("tempates/content-right.php");
  		require("tempates/footer.php");
  ?>