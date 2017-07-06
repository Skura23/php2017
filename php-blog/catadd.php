<?php 


if (empty($_POST)) {
	# code...
	include './view/admin/catadd.html';
}else{
	//print_r($_POST);
	$conn = mysql_connect('localhost','root','');
	//var_dump($conn);
	//$conn不要加引号
	mysql_query('use blog',$conn);
	mysql_query('set names utf8');
	//print_r($_POST);
	//检测栏目是否为空
	$cat['catname'] = trim($_POST['catname']);
	if (empty($cat['catname'])) {
		# code...
		echo "不能为空";
		//exit使得后面的所有语句都不执行，即使是if外的语句
		exit();
	}

	//返回同文件名存在的个数
	$sql = "select count(*) from cat where catname = '$cat[catname]'";
	$rs = mysql_query($sql);
	//mysql_fetch_assoc获取单行结果数组,
	if (mysql_fetch_row($rs)[0] != 0) {
		echo "栏目已存在";		
		exit();
	}
	//将栏目写入栏目表
	$sql = "insert into cat (catname) values ('$cat[catname]')";
	if(!mysql_query($sql)){
		echo "栏目插入失败";
		mysql_error();
	}else{
		echo "栏目名 ".$cat['catname']." 插入成功";
	}
}



 ?>