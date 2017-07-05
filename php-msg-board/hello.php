<?php 
/*//php打开文件
$fh = fopen('./msg-txt.txt','a');

//往文件写内容
fwrite($fh, 'hello');

fclose($fh)*/

$_POST['title'];
$_POST['content'];


//连接mysql
$re = mysql_connect('127.0.0.1','root','');

//发送查询。query用于建立通道传递信息，相当于拨电话
mysql_query('use test',$re);
mysql_query('set names utf8', $re);

//接收POST数据
$sql = "insert into msg (title, content, pubtime) values ('".$_POST['title']."','".$_POST['content']."',".time().')';

//echo $sql;

if(mysql_query($sql,$re)){
	echo "留言成功！";
}else{
	echo "留言失败！";
}

echo '<a href="index.html">返回</a>';
echo '<a href="msg-list.php">查看留言板</a>';



?>