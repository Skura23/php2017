<?php 

require("../lib/init.php");
$sql = "select title from art where art_id = 1";
$rs = mGetOne($sql);
var_dump($rs);

$arr = array(
		'001'=> array('name'=>'John', 'age'=>19),
		'002'=> array('name'=>'Lily', 'age'=>17),
		'003'=> array('name'=>'Sam', 'age'=>21),
	);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	# code...
	search();
}else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	# code...
	create();
}

function search(){
	if (!isset($_GET['num']) || empty($_GET['num'])) {
		# code...
		echo "参数错误";
		return;
	}
	global $arr;
	$num = $_GET['num'];
	$rs = "没有找到员工";

	$flag = false;
	foreach ($arr as $key => $value) {
		if ($key == $num) {
			# code...
			echo '找到员工 '.$value;
			$flag = true;
		}
	}
	if (!$flag) {
		echo '没找到员工';
	}
}

function create(){
	if (!isset($POST['name']) || empty($POST['name']) ||
		!isset($POST['age']) || empty($POST['age'])) {
		# code...
		echo "提交参数错误";
	}else{
		echo "新增用户 姓名: ".$_POST['name'].", 年龄: ".$_POST['age']."岁";
	}
}


 ?>

