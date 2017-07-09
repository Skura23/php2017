<?php 

require('./lib/init.php');

$art_id = $_GET['art_id'];

//判断地址栏传来的art_id是否合法
if (!is_numeric($art_id)) {
	# code...
	error('id不合法');
}

//判断是否有这篇文章
$sql = "select * from art where art_id = $art_id";
if(!mGetRow($sql)){
	error('文章不存在');
}

$sql = "delete from art where art_id = $art_id";
if(!mQuery($sql)){
	error('文章删除失败');
}else{
	header('Location: artlist.php');
}

 ?>