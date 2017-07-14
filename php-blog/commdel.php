<?php 

require('./lib/init.php');

$comment_id = $_GET['comment_id'];

//判断地址栏传来的comment_id是否合法
if (!is_numeric($comment_id)) {
	# code...
	error('id不合法');
}

//判断是否有这篇文章
$sql = "select * from comment where comment_id = $comment_id";
if(!mGetRow($sql)){
	error('文章不存在');
}

$sql = "delete from comment where comment_id = $comment_id";
if(!mQuery($sql)){
	error('文章删除失败');
}else{
	# cat num -1
	/*$sql = "update art set comm = comm-1 where art_id = $art[art_id]";*/
	/*mQuery($sql);*/
	/*succ('succ');*/
	header('Location: commlist.php');
}

 ?>