<?php
	require('tempates/header.php');
	$loi=array();
	$loi["username"]=$loi["password"]=$loi["birthday"]=$loi["gender"]=$loi["email"]=$loi["register"]=$username=$password=$email=$birthday=$gender=$day=$month=$year=NULL;
	if(isset($_POST["ok"]))
	{
		if(empty($_POST["txtname"]))
		{
			$loi["username"]="Xin vui long nhap username </br>";
		}
		else
		{
			$username=$_POST["txtname"];
		}
		
		if(empty($_POST["txtpass"]))
		{
			$loi["password"]="Xin vui long nhap password </br>";
		}
		else
		{
			$password=md5($_POST["txtpass"]);
		}
		
		if(empty($_POST["email"]))
		{
			$loi["email"]="Xin vui long nhap email </br>";
		}
		else
		{
			$email=$_POST["email"];
		}
		
		if($_POST["day"]=="ngay" || $_POST["month"]=="thang" || $_POST["year"]=="nam")
		{
			$loi["birthday"]="Vui long nhap birthday </br>";
		}
		else
		{
			$day=$_POST["day"];
			$month=$_POST["month"];
			$year=$_POST["year"];
		}
		
		if(empty($_POST["gender"]))
		{
			$loi["gender"]="Xin vui long chon gender </br>";
		}
		else
		{
			$gender=$_POST["gender"];
		}
		
		if($username & $password & $email & $day & $month & $year & $gender)
		{
			require("library/config.php");
			
			$result=mysql_query("select * from user where username='$username'");
			if(mysql_num_rows($result)==0)
			{
				mysql_query("insert into user (username,password,email,birthday,gender,level)
										 value('$username','$password','$email','$year-$month-$day','$gender',1)");
				
				
				mysql_close($conn);
				$loi["register"]="Chuc mung dang ki thanh cong.Nhap <a href='login.php'>login</a> de dang nhap </br>";
			}
			else
			{
				$loi["register"]="Da co nguoi dang ky ten nay </br>";	
			}
		
		
		
	
		}
	}
?>
        	<fieldset style="width:400px;margin:140px auto 0px;height:250px;">
                <legend style="margin-left:10px;">Register</legend>
                <form action="register.php" method="post">
                    <table>
                        <tr>
                            <td>Username</td>
                            <td><input type="text" size="25" name="txtname" /></td>
                            
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" size="25" name="txtpass" /></td>
                           
                        </tr>
                         <tr>
                            <td>email</td>
                            <td><input type="text" size="25" name="email" /></td>
                            
                        </tr>
                        <tr>
                            <td>Birthday</td>
                            <td>
                                <select name="day">
                                    <option value="ngay">ngay</option>
                                <?php
                                    for($i=1;$i<=31;$i++)
                                    {
                                        echo"<option value='$i'>$i</option>";
                                    }
                                ?>
                                </select>
                                <select name="month">
                                    <option value="thang">thang</option>
                                <?php
                                    $thang=array(1=>"Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
                                    foreach($thang as $s => $tam)
                                    {
                                        echo"<option value='$s'>$tam</option>";
                                    }
                                ?>
                                </select>
                                <select name="year">
                                    <option value="nam">nam</option>
                                <?php
                                    for($k=1950;$k<=date("Y");$k++)
                                    {
                                        echo"<option value='$k'>$k</option>";
                                    }
                                ?>
                                </select>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>
                                <input type="radio" name="gender" value="1"/>Male
                                <input type="radio" name="gender" value="2"/>Female
                            </td>
                            
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="ok" value="Register" /></td>
                            <td></td>
                        </tr>
                    </table>
                </form>
            </fieldset>
            <div style="width:300px;height:170px;color:red;text-align:center;margin:10px auto;">
            <?php
				 echo $loi["username"];
				 echo $loi["password"];
				 echo $loi["email"];
				 echo $loi["birthday"];
				 echo $loi["gender"];
				 echo $loi["register"];
			?>
            </div>
            
       <?php
	  
  	require("tempates/footer.php");
  ?>