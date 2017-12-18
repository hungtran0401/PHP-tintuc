<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php
		if(isset($id))
		{
			require('library/config.php');
			$result=mysql_query("select title from news where news_id=$id");	
			$data=mysql_fetch_assoc($result);
			echo "<title>$data[title]</title>";
			mysql_close($conn);
		}
		else
		{
        	echo"<title>webtintuc</title>";
		}
		
        ?>
        <!-- <link rel="stylesheet" type="text/css" href="tempates/style1.css"> -->
        <link rel="stylesheet" href="tempates/responsive.css" />
        <script src="jquery-3.2.1.js"></script>
        <script>
        	$(document).ready(function(){
        		$('.menu-triggle').click(function(){
        			$('#menu').slideToggle();

        		});


        	});


        </script>
        
    </head>
    
    <body>
    
    	<div id="top">
        	<?php
				if(isset($_SESSION["username"]))
				{
					echo "welcome ".$_SESSION["username"]."-<a href='logout.php'>logout</a>";	
				}
				else
				{
					echo "<a href='login.php'>login</a>";
					echo " | ";
					echo "<a href='register.php'>register</a>";
				}
			?>
        </div>
        <div class="menu-triggle"><img src="tempates/menu.png"/></div>
        <div id="menu">
        	<ul>

            	<li><a href="index.php">Trang chủ</a></li>
                <?php
					require('library/config.php');
					$result1=mysql_query("select cate_title,cate_id from category");
					while($data1=mysql_fetch_assoc($result1)){
						$result2=mysql_query("select subcate_title,subcate_id from subcategory where cate_id = $data1[cate_id]");
						
						if(mysql_num_rows($result2)!=0){
							echo "<li><a href='category.php?id=$data1[cate_id]'>$data1[cate_title]</a>";
								echo"<ul class='submenu'>";
								while($data2=mysql_fetch_assoc($result2)){
									echo"<li><a href='subcate.php?id=$data2[subcate_id]'>$data2[subcate_title]</a></li>";
								}
								echo"</ul>";
							echo"</li>";
						}else{
							echo"<li><a href='category.php?id=$data1[cate_id]'>$data1[cate_title]</a></li>";
						}
					}
					
					mysql_close($conn);
					?>
            </ul>
        </div>
        <div id="wrapper">