<?php 	

require('./lib/init.php');


$sql_cat = "select * from cat";
$cats = mGetAll($sql_cat);

//判断地址栏是否有cat_id
if (isset($_GET['cat_id'])) {
	$where = " and art.cat_id = $_GET[cat_id]";
}else{
	$where = '';

}

//双表联查 
$sql_art = "select title,content,pubtime,comm,art_id,cat.catname,cat.cat_id from art inner join cat on art.cat_id=cat.cat_id where 1".$where;

$arts = mGetAll($sql_art);
/*print_r($arts);*/

$pArr = getPage($arts,5);
$pDisArr = $pArr[$_GET['page']];

//栏目下没有文章的话返回首页
if (empty($arts)) {
	header("Location: index.php");
}

/*$querryStr = http_build_query($_GET);
print_r($querryStr);*/

require(ROOT.'/view/front/index.html');


 ?>