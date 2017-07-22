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
$sql_art = "select title,subtitle,content,pubtime,comm,art_id,arttag,cat.catname,cat.cat_id from art inner join cat on art.cat_id=cat.cat_id where 1".$where." Order by art_id DESC";

$arts = mGetAll($sql_art);
/*print_r($arts);*/
//var_dump($cats);
$sum = 0;
foreach ($cats as $key => $value) {
	# code...
	$sum += $value['num'];
}

$catSumNum = $sum;


$pArr = getPage($arts,5);
$pDisArr = $pArr[$_GET['page']];

//栏目下没有文章的话返回首页
//暂时注释,因为会导致重定向问题
/*if (empty($arts)) {
	header("Location: index.php");
}*/

/*$querryStr = http_build_query($_GET);
print_r($querryStr);*/

require(ROOT.'/view/front/index.html');


 ?>