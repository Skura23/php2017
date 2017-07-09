<?php 

require('./lib/init.php');

if (empty($_POST)) {
	$sql = "select * from cat";
	$rs = mGetAll($sql);
	print_r($rs);
	include ROOT.'/view/admin/artadd.html';
}else{
	//检测标题是否为空
	$art['title'] = trim($_POST['title']);
	$art['content'] = trim($_POST['content']);
	$art['cat_id'] = trim($_POST['cat_id']);
	$art['pubtime'] = time();
	if (empty($art['title'])) {
		error('标题不能为空');
	}
	if (empty($art['content'])) {
		error('正文不能为空');
	}
	var_dump(mExec('art', $art));
	succ('文章添加成功');
}	
 



?>
