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



 ?>