<?php 
	require('./lib/init.php');

	$sql = "select * from cat";
	$cat = mGetAll($sql);

	/*print_r($cat);*/
	require('./view/admin/catlist.html');

 ?>