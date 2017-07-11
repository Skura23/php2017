<?php 


//cat_id
$cat_id = $_GET['cat_id'];

//连接数据库
$conn = mysql_connect('localhost','root','');
mysql_query('use blog',$conn);
mysql_query('set names utf8');

//检测 $cat_id是否为数字


if(!is_numeric($cat_id)){
	echo "栏目不合法";
	exit();
}

//检测 是否有这个id
$sql = "select count(*) from cat where cat_id = $cat_id";
$rs = mysql_query($sql, $conn);
if(mysql_fetch_row($rs)[0] ==0){
	echo "栏目不存在";
	exit();
}
//检测 栏目下是否有文章
$sql = "select count(*) from art where cat_id = $cat_id";
$rs = mysql_query($sql);
if(mysql_fetch_row($rs)[0] != 0){
	echo "栏目下有文章，无法删除";
	exit();
} 

//检测完毕，删除栏目
$sql = "delete from cat where cat_id = $cat_id";
$rs = mysql_query($sql);
if (!$rs = mysql_query($sql)) {
	# code...
	echo "删除失败";
}else{
	
	echo "删除成功";
}


 ?>