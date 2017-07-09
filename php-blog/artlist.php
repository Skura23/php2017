<?php 

require('./lib/init.php');


$sql = "select * from art";
mGetAll($sql);


$rs = mGetAll($sql);
$rs_cat = mGetAll("select * from cat");
$catname = array();
foreach ($rs_cat as $k => $v) {
	$catname[$v['cat_id']] = $v['catname'];
}
/*var_dump($catname);*/


include ROOT.'/view/admin/artlist.html';

 ?>