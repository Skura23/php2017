<?php 

//连接mysql
$re = mysql_connect('127.0.0.1','root','');

//发送查询。query用于建立通道传递信息，相当于拨电话
mysql_query('use test',$re);
mysql_query('set names utf8', $re);


$sql = 'select * from msg';
$res =  mysql_query($sql, $re);

echo "<ul class='list'>";
while ($row = mysql_fetch_assoc($res)) {
	echo '<li><a href="read-msg.php/?tid='. $row['id'].'">' . $row['title'] . '</li>';
}
echo "</ul>";



echo '<a href="index.html">返回</a>';





 ?>