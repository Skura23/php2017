<?php 

$fh=fopen('./msg-txt.txt', 'r');

$i=1;

while( ($row=fgetcsv($fh)) != false){
	echo '<li><a href="read-msg.php?tid='.$i.'">' .$row[0]. '</a></li>';
	$i ++;
};

echo '<a href="index.html">返回</a>';








 ?>