<?php 

require('./lib/init.php');


$art_id = $_GET['art_id'];
$sql = "select * from art where art_id = $art_id";

//判断get的art_id是否合法
if(!is_numeric($art_id) || !mGetRow($sql)){
	header("Location: art.php");
}

//查询文章
$sql = "select title,content,pubtime,comm,art_id,cat.catname,cat.cat_id from art inner join cat on art.cat_id=cat.cat_id where art.art_id=$art_id";
$art = mGetRow($sql);
/*var_dump($art);*/

require(ROOT.'/view/front/art.html');





?>