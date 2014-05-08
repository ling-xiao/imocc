<?php  
	
$my_con = mysql_connect("localhost","root","admin");  
	
mysql_select_db("test",$my_con);   
	
$sql ="INSERT INTO  file(name,sex,birth,city) VALUES('".$_POST["name"]."','".$_POST["sex"]."','".$_POST["birth"]."','".$_POST["city"]."')";  
	
mysql_query($sql); 

mysql_close($my_con);  
	
echo "成功录入数据"; 
	
?>  
