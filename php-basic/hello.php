<?php 


//一种羊，第二年生一个小羊，第四年生一个小羊，第五年死，20年后多少只羊

$sheep = array(1,0,0,0,0);

print_r($sheep);
for ($i=1; $i <= 2; $i++) { 
	array_pop($sheep);
	array_unshift($sheep,$sheep[1]+$sheep[3]);
}
print_r($sheep);
echo array_sum($sheep);




 ?>