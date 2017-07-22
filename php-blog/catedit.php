<?php 

require('./lib/init.php');

$cat_id = $_GET['cat_id'];
//var_dump($cat_id);


/*if(!is_numeric($cat_id)){
	echo "栏目不存在";
	exit();
}*/

$conn = mConn();



if (empty($_POST)) {
	# code...
	$sql = "select * from cat where cat_id = $cat_id";
	$row = mGetRow($sql);
	require('./view/admin/catedit.html');
}else{
	$postName = trim($_POST['catname']);
	if (empty($postName)) {
		echo "error";
		exit();
	}
	//坑点：$postName变量要加引号，否则报错，后面那个变量可不加引号
	$sql = "UPDATE cat SET catname = '$postName' WHERE cat_id = $cat_id";
	if (mysql_query($sql)) {
		echo "栏目修改成功";
	}else{
		echo "栏目修改失败";
	}
}



 ?>