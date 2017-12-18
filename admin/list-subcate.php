<?php
	require("templates/header.php");
?>
<body>
<div id="wrapper">
	<table >
		<tr>
        	<td colspan="3"></td>
            
            <td colspan="2"><a href="add-subcate.php"> Them chuyen muc con</a></td>
           
        </tr>
        <tr style="background:#3FF;color:#FFF;">
        	<th>STT</th>
            <th>Chuyen muc cha</th>
            <th>Chuyen muc con</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
            $Stt=1;

            require('../library/config.php');
            $result=mysql_query("select a.subcate_id,a.subcate_title,b.cate_title from subcategory as a,category as b where a.cate_id = b.cate_id order by subcate_id desc");
            while($data=mysql_fetch_assoc($result))
            {  
                echo " <tr>" ;
        	    echo "<td>$Stt</td>";
                echo "<td>$data[cate_title]</td>";
                echo "<td>$data[subcate_title]</td>";
                echo "<td><a href='edit-subcate.php?id=$data[subcate_id]'>Edit</a></td>";
                echo "<td><a href='del-subcate.php?id=$data[subcate_id]' onclick='return show_confirm();'>Delete</a></td>";
                echo " </tr>";
                $Stt++;
            }
            mysql_close($conn);
        ?>
       
       
        

	</table>
</div>
</body>
<?php 
	require("templates/footer.php");



?>