<?php 

require('./lib/init.php');

if (!checkCookie()) {
	# code...
	header('Location: login.php');
}

$sql = "select * from art";
mGetAll($sql);


$rs = mGetAll($sql);
$rs_cat = mGetAll("select * from cat");
$catname = array();
foreach ($rs_cat as $k => $v) {
	$catname[$v['cat_id']] = $v['catname'];
}
/*var_dump($rs);*/
/*page all data arr*/
$pArr = getPage($rs,5);
$pDisArr = $pArr[$_GET['page']];
/*var_dump($pDisArr);*/



include ROOT.'/view/admin/artlist.html';

 ?>