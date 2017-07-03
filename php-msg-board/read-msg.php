<?php 

$tid = $_GET['tid'];

echo "这是第" .$tid. "条留言";

$fh=fopen('./msg-txt.txt', 'r');

$i = 1;

while( ($row=fgetcsv($fh)) != false){
	if($tid == $i){
		echo "<h3>" .$row[0]. "</h3>";
		echo "<p>" .$row[1]. "</p>";
	}
	$i++;
};
 
echo '<a href="index.html">返回</a>';




 ?>