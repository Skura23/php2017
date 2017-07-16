<?php 

date_default_timezone_set("Asia/Shanghai");

/**
* 操作成功的提示信息
*/
function succ($res = '成功'){
	$result = 'succ';
	require (ROOT.'\view\admin\info.html');
	exit();
}


/**
* 操作失败的提示信息
*/
function error($res = '失败'){
	$result = 'fail';
	require (ROOT.'\view/admin/info.html');
	exit();
}

/**
* 获取评论用户ip
*/
function getRealIp(){
	static $realip = null;
	if ($realip !==null) {
		# code...
		return $realip;
	}
	if (getEnv('REMOTE_ADDR')) {
		# code...
		$realip = getEnv('REMOTE_ADDR');
	}else if(getEnv('HTTP_CLIENT_IP')){
		$realip = getEnv('HTTP_CLIENT_IP');
	}else if(getEnv('HTTP_X_FORWARD_FOR')){
		$realip =getEnv('HTTP_X_FORWARD_FOR');
	}

	return $realip;
}

/**
* 生成分页代码
* @param int $arr 条目数组
* @param int $sNum 每页条目数
* @return 键名为页码  值为当页条目数组 的数组
*/
/*if (!isset($_GET['page'])) {
	$_GET['page'] =1;
}*/
/*$arr = array('a','b','c','d','e','f',1,2);*/
function getPage($arr,$sNum){
	if (!isset($_GET['page'])) {
		$_GET['page'] =1;
	}
	
	$aNum = count($arr);
	$pNum = ceil($aNum/$sNum);

	for ($i=0,$start = 0; $i < $pNum; $i++) {
		$start = $i*$sNum;
		if ($i == $pNum-1) {
			$pArr[] = array_slice($arr,$start,$aNum-$start);
		}else{
			$pArr[] = array_slice($arr,$start,$sNum);
		}
	}
	//使key由0始变为1始
	foreach ($pArr as $key => $value) {
		# code...
		$_pArr[$key+1] = $value;
	}
	
	$pArr = $_pArr;
	return($pArr);
}	
/*$pArr = getPage($arr, 3);
$disArr = $pArr[$_GET['page']];
echo $_GET['page'];*/

/**
* 生成随机字符串
* @param int $num 生成的字符数量
* @return str  生成的字符串
*/

function randStr($num = 6){
	$str = 'abcdefghijkmnpqrstuvwxyzABCDEFGHIJKMNPQRSTUVWXYZ23456789';
	$str = str_shuffle($str);
	return substr($str, 0, $num);
}

/**
* 创建目录
* 
*/
function createDir(){
	$path = '/upload'.'/'.date('Y/m/d');
	$fpath = ROOT . $path;
	if (is_dir($fpath) || mkdir($fpath, 0777, true)) {
		# code...
		return $path;
	}else{
		return false;
	}
}

/**
* 获取文件后缀
* @param str $filename 文件名
* @return str 文件的后缀名, 且带点.
*/
function getExt($filename){
	return strrchr($filename, '.');
}


/**
* 检测用户是否登录
*/
function checkCookie(){
	if (!isset($_COOKIE['name']) || !isset($_COOKIE['ccode'])) {
	 	# code...
	 	return false;
	} 
	return $_COOKIE['ccode'] === cCode($_COOKIE['name']);
}

/**
* 加密用户名
* @param str $name 用户登录时输入的用户名
* @return str md5(用户名+salt) => md5码
*/
function cCode($name){
	$salt = require(ROOT . '/lib/config.php');
	return md5($name . '|' . $salt['salt']); 
}

?>

