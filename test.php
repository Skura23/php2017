<?php 

/*$conn = mysqli_connect('localhost','root','77606zz','blog');
mysqli_query($conn, 'set names ','utf8');

$sql = "select * from art";
$rs = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($rs);
var_dump($row);*/
var_dump(ROOT);exit();

$conn = mysql_connect('localhost','root','77606zz');
mysql_query('use blog' , $conn);
mysql_query('set names utf8' , $conn);

$sql = "select content from art";
$rs = mysql_query($sql, $conn);
$row = mysql_fetch_assoc($rs);
var_dump($row);

 ?>