<?php 

require('./lib/init.php');

if (empty($_POST)) {
	$sql = "select * from cat";
	$rs = mGetAll($sql);
	/*print_r($rs);*/
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

	//收集tag
	$art['arttag'] = trim($_POST['tag']);

	/*var_dump(mExec('art', $art));*/
	
	if (!mExec('art', $art)) {
		# code...
		error('文章插入失败');
	}else{
		//判断是否有tag
		$art['tag'] = trim($_POST['tag']);
		if ($art['tag'] =='') {
			# cat num +1
			$sql = "update cat set num = num+1 where cat_id = $art[cat_id]";
			mQuery($sql);

			# code...
			succ('文章添加成功');
		}else{
			$art_id = getLastId();
			//插入tag到tag表
			$sql = "insert into tag (art_id, tag) values ";
			$tag = explode(',', $art['tag']);
			foreach ($tag as $k=> $v) {
				# code...
				$sql .="(".$art_id . ",'" . $v . "'),";
			}
			$sql = rtrim($sql,',');
			/*var_dump($sql);*/
			if (!mQuery($sql)) { 
				# code...
				$sql = "delete from art where art_id = $art_id";
				if (mQuery($sql)) {
					# code...
					error('文章添加失败');
				}
			}else{
				# cat num +1
				$sql = "update cat set num = num+1 where cat_id = $art[cat_id]";
				mQuery($sql);
				succ('文章添加成功');
			}
		}
	}
	



	
}	
 



?>
