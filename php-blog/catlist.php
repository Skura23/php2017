<?php 

	//连接数据库
	$conn = mysql_connect('localhost','root','');
	//var_dump($conn);
	//$conn不要加引号
	mysql_query('use blog',$conn);
	mysql_query('set names utf8');


	$sql = "select * from cat";
	$rs = mysql_query($sql);
	$cat = array();

	while ($d = mysql_fetch_assoc($rs)) {
		# code...
		$cat[] = $d;
	}

	/*print_r($cat);*/
	require('./view/admin/catlist.html');

 ?>