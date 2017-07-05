<?php 

//连接mysql
$re = mysql_connect('127.0.0.1','root','');

//发送查询。query用于建立通道传递信息，相当于拨电话
mysql_query('use test',$re);
mysql_query('set names utf8', $re);



$tid = $_GET['tid'];

echo "这是第" .$tid. "条留言";

$sql = 'select * from msg where id ='.$tid;
$res = mysql_query($sql);

$_res = mysql_fetch_assoc($res);
echo "<h2>".$_res['id'].'. '.$_res['title']."</h2>",
	 "<p>".$_res['content']."</p>";
 
echo '<a href="index.html">返回</a>';




 ?>