<?php 



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
*	@param int $sNum 每页条目数
* @return 键名为页码  值为当页条目数组 的数组
*/
/*if (!isset($_GET['page'])) {
	$_GET['page'] =1;
}*/
$arr = array('a','b','c','d','e','f',1,2);
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

 ?>

<!-- test html -->
<!--  <body>
	<ul>
		<?php foreach ($disArr as $key => $value) { ?>
		<li><?php echo $value ?></li>
		<?php } ?>
	</ul>
	<?php foreach ($pArr as $key => $value) { ?>
	<a href="func.php?page=<?php echo $key; ?>"><?php echo $key ?></a>
	<?php } ?>
</body> -->