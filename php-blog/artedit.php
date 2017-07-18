<?php 

require ('./lib/init.php');
$art_id = $_GET['art_id'];

//判断地址栏传来的art_id是否合法
if (!is_numeric($art_id)) {
	# code...
	error('id不合法');
}

//判断是否有这篇文章
$sql_art = "select title,content,cat_id,arttag from art where art_id = $art_id";
if(!mGetRow($sql_art)){
	error('文章不存在');
}

if (empty($_POST)) {
	$sql_cat = "select * from cat";
	$cats = mGetAll($sql_cat);

	$rs = mGetRow($sql_art);
	//var_dump($rs);
	require(ROOT.'/view/admin/artedit.html');
}else{
	$modidArt = array();
	$modidArt['title'] = trim($_POST['title']);
	$modidArt['content'] = trim($_POST['content']);
	$modidArt['cat_id'] = trim($_POST['cat_id']);
	if (empty($modidArt['title'])) {
		error('标题不能为空');
	}
	if (empty($modidArt['content'])) {
		error('正文不能为空');
	}
	$modidArt['lastup'] = time();
	$modidArt['arttag'] = trim($_POST['tag']);
	$rs = mExec('art',$modidArt,'update', 'art_id ='.$art_id);
	/*var_dump($rs);*/

	if (!$rs) {
		error('修改失败');
	}else{
		succ('修改成功');
	}
}



 ?>