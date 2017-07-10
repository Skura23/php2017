<?php 


require('./lib/init.php');

if (empty($_POST)) {
	# code...
	include ROOT.'/view/admin/catadd.html';
}else{
	mConn();
	//print_r($_POST);
	//检测栏目是否为空
	$cat['catname'] = trim($_POST['catname']);
	if (empty($cat['catname'])) {
		# code...
		error("不能为空");
		//exit使得后面的所有语句都不执行，即使是if外的语句
		exit();
	}

	//检测栏目名是否存在
	$sql = "select count(*) from cat where catname = '$cat[catname]'";
	$rs = mysql_query($sql);
	//mysql_fetch_assoc获取单行结果数组,
	if (mysql_fetch_row($rs)[0] != 0) {
		error("栏目已存在");		
		exit();
	}
	//将栏目写入栏目表
	if(!mExec('cat',$cat)){
		$str = "栏目插入失败";
		error($str);
		mysql_error();
	}else{
		
		
		$str = "栏目名 ".$cat['catname']." 插入成功";
		succ($str);
	}
}



 ?>