<?php 


//cat_id
$cat_id = $_GET['cat_id'];
echo $cat_id;

//连接数据库
	$conn = mysql_connect('localhost','root','');
	mysql_query('use blog',$conn);
	mysql_query('set names utf8');

//检测 $cat_id是否为数字
//检测 是否有这个id
//检测 栏目下是否有文章
 ?>