<?php 
//json格式 返回值

require("../lib/init.php");
$sql = "select title from art where art_id = 1";
$rs = mGetOne($sql);
/*var_dump($rs);*/

//设置服务器返回值的格式,注意是返回值
//header('Content-Type:test/plain;charset=utf-8');
header('Content-Type:application/json;charset=utf-8');

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
		echo '{"success":false,"msg":"参数错误"}';
		return;
	}
	global $arr;
	$num = $_GET['num'];
	$rs = "{'success':false,'msg':'没有找到员工'}";

	$flag = false;
	foreach ($arr as $key => $value) {
		if ($key == $num) {
			# code...
			echo '{
				"success":true,
				"msg":"找到员工: <br>姓名: '.$value['name'].'<br>年龄: '.
				//注意换行也会影响到json解析,比如将 岁"}' 另起一行会出错
				$value['age'].'岁"}';
			$flag = true;
		}
	}
	if (!$flag) {
		echo '{"success":false,"msg":" 没有找到员工"}';
	}
}

function create(){
	//var_dump($_POST['name']);
	if (!isset($_POST['name']) || empty($_POST['name']) ||
		!isset($_POST['age']) || empty($_POST['age'])) {
		# code...
		echo '{"success":false,"msg":"提交参数错误"}';
	}else{
		//个是最好是单引号在外,json用双引号,否则容易出错
		echo '{"success":true,"msg":"新增用户 姓名: '.$_POST['name'].', 年龄: '.$_POST['age'].'岁"}';
	}
}


 ?>


 <?php 
//普通格式 返回值

/*require("../lib/init.php");
$sql = "select title from art where art_id = 1";
$rs = mGetOne($sql);
//var_dump($rs);

//设置服务器返回值的格式
header('Content-Type:text/plain;charset=utf-8');
//header('Content-Type:application/json;charset=utf-8');

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
			echo "找到员工: <br>姓名: ".$value['name']."<br>年龄: ".$value['age'];
			$flag = true;
		}
	}
	if (!$flag) {
		echo '没找到员工';
	}
}

function create(){
	//var_dump($_POST['name']);
	if (!isset($_POST['name']) || empty($_POST['name']) ||
		!isset($_POST['age']) || empty($_POST['age'])) {
		# code...
		echo "提交参数错误";
	}else{
		echo "新增用户 姓名: ".$_POST['name'].", 年龄: ".$_POST['age']."岁";
	}
}*/


 ?>

