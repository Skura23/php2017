<?php 

$cat_id = $_GET['cat_id'];

$conn = mysql_connect('localhost','root','');
mysql_query('use blog',$conn);
mysql_query('set names utf8');


$sql = "select * from cat where cat_id = $cat_id";
$rs = mysql_query($sql);
var_dump($rs);

require('./view/admin/catedit.html')


 ?>