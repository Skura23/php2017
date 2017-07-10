<?php 

require('./lib/init.php');
date_default_timezone_set("Asia/Shanghai");

$art_id = $_GET['art_id'];
$sql = "select * from art where art_id = $art_id";

//判断get的art_id是否合法
if(!is_numeric($art_id) || !mGetRow($sql)){
	header("Location: art.php");
}

//查询文章
$sql = "select title,content,pubtime,comm,art_id,cat.catname,cat.cat_id from art inner join cat on art.cat_id=cat.cat_id where art.art_id=$art_id";
$art = mGetRow($sql);
/*var_dump($art);*/


//查询所有留言
$sql = "select * from comment where art_id = $art_id";
$comms = mGetAll($sql);

if (!empty($_POST)) {
	# code...
	$comm['nick'] = trim($_POST['nick']);
	$comm['content'] = trim($_POST['content']);
	$comm['email'] = trim($_POST['email']);
	$comm['art_id'] = $art_id;
	$comm['pubtime'] = time();
/*	var_dump($comm['pubtime']);*/
	$rs=mExec('comment',$comm);
	if ($rs) {
		# code...
		$ref = $_SERVER['HTTP_REFERER'];
		header("Location: $ref");
	}
}

require(ROOT.'/view/front/art.html');





?>