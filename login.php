<?php
	session_start();
	require("tempates/header.php");
	$loi=array();
	$loi["username"]=$loi["password"]=$username=$password=$loi["login"]=NULL;
	
	
	if(isset($_POST["ok"]))
	{
		if(empty($_POST["txtname"]))
		{
			$loi["username"]="Ban chua nhap ten</br>";
		}
		else
		{
			$username=$_POST["txtname"];	
		}
		
		if(empty($_POST["txtpass"]))
		{
			$loi["password"]="Vui long nhap pass </br>";	
		}
		else
		{
			$password=md5($_POST["txtpass"]);	
		}
		
		if($username & $password)
		{
			require("library/config.php");
			
			$result=mysql_query("select * from user where username='$username' and password='$password'");
			if(mysql_num_rows($result)==1)
			{
				$data=mysql_fetch_assoc($result);
				$_SESSION["level"]=$data["level"];
				if($_SESSION["level"]==2)
				{
					header("location:admin/admin.php");
					exit();	
				}
				else
				{
					$_SESSION["username"]=$username;
					header("location:index.php");
					exit();
				}
				
			}
			else
			{
				$loi["login"]="wrong username or password</br>";	
			}
			
			mysql_close($conn);
			
		}
		
		
		
	}
?>
        	<fieldset style="width:290px;margin:140px auto 0px;height:120px;">
                <legend style="margin-left:10px;">Login</legend>
                <form action="login.php" method="post">
                    <table>
                        <tr>
                            <td>Username: </td>
                            <td><input type="text" size="25" name="txtname"/></td>
                        </tr>
                        <tr>
                            <td>Password: </td>
                            <td><input type="pass" size="25" name="txtpass" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Login" name="ok" style="padding:0px 5px;"/></td>
                        </tr>
                    </table>
                </form>
            </fieldset>
            <div style="width:300px;height:200px;color:red;margin:10px auto 10px;text-align:center;">
            	<?php
					echo $loi["username"];
					echo $loi["password"];
					echo $loi["login"];
				?>
            </div>
    <?php
		require("tempates/footer.php");
	?>
