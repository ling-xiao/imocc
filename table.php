<html>
<head>
<title>File</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF8">
</head>

<body>
<?php
$conn=mysql_connect("localhost","root","admin");
//设定每一页显示的记录数
$pagesize=4;
mysql_select_db("test",$conn);
//取得记录总数$rs，计算总页数用
$rs=mysql_query("select count(*) from file",$conn);
$myrow = mysql_fetch_array($rs);
$numrows=$myrow[0];
//计算总页数
$pages=intval($numrows/$pagesize);
if ($numrows%$pagesize)
$pages++;
//设置页数
if (isset($_GET['page'])){
$page=intval($_GET['page']);
}
else{
//设置为第一页
$page=1;
}
//计算记录偏移量
$offset=$pagesize*($page - 1);
//读取指定记录数
$rs=mysql_query("select * from file order by name limit $offset,$pagesize",$conn);
if ($myrow = mysql_fetch_array($rs))
{
$i=0;
?>
<table border="0" width="100%">
<tr>
<td width="5%" bgcolor="#e1e9fb"><font color="#ff6666" size="4">name</font></td>
<td width="5%" bgcolor="#e1e9fb"><font color="#ff6666" size="4">sex</font></td>
<td width="5%" bgcolor="#e1e9fb"><font color="#ff6666" size="4">birth</font></td>
<td width="5%" bgcolor="#e1e9fb"><font color="#ff6666" size="4">city</font></td>
</tr>
<?php
do {
$i++;
?>
<tr>
<td width="5%" bgcolor="#e6f2ff"><font size="3"><?php echo $myrow[0];?></a></font></td>
<td width="5%" bgcolor="#e6f2ff"><font size="3"><?php echo $myrow[1];?></a></font></td>
<td width="5%" bgcolor="#e6f2ff"><font size="3"><?php echo $myrow[2];?></a></font></td>
<td width="5%" bgcolor="#e6f2ff"><font size="3"><?php echo $myrow[3];?></a></font></td>
</tr>
<?php
}
while ($myrow = mysql_fetch_array($rs));
echo "</table>";
}
echo "<div align='center'>共有".$pages."页(".$page."/".$pages.")";

echo"<br/>";

/*
for ($i=1;$i< $page;$i++)
echo "<a href='table.php?page=".$i."'>[".$i ."]</a> ";
echo "[".$page."]";
for ($i=$page+1;$i<=$pages;$i++)
echo "<a href='table.php?page=".$i."'>[".$i ."]</a> ";
echo"<br/>";
*/
$first=1;
$prev=$page-1;
$next=$page+1;
$last=$pages;
if ($page > 1)
{
echo "<a href='table.php?page=".$first."'>首页</a> ";
echo "&nbsp;&nbsp;";
echo "<a href='table.php?page=".$prev."'>上一页</a> ";
echo "&nbsp;&nbsp;";
}
if ($page < $pages)
{
echo "<a href='table.php?page=".$next."'>下一页</a>";
echo "&nbsp;&nbsp;";
echo "<a href='table.php?page=".$last."'>尾页</a> ";
}
echo "</div>";
?>
</body>
</html>
