<?php 

//设定绝对根目录
define('ROOT',dirname(__DIR__));
//var_dump(ROOT);
/*//返回绝对路径
echo __FILE__, '<br>';
echo __LINE__, '<br>';*/
require(ROOT.'/lib/mysql.php');
require(ROOT.'/lib/func.php');

$_GET = _addslashes($_GET);
$_POST = _addslashes($_POST);
$_COOKIE = _addslashes($_COOKIE);

 ?>