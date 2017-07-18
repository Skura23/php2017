<?php 

require('./lib/init.php');

//echo $_POST['hi'];
//var_dump($_FILES['file']);

$upFile = $_FILES['file'];
//echo dirname(__FILE__);



if ($upFile['error']==0 && !empty($upFile)) {
	# code...
	$filename =  createDir() . '/' . randStr().getExt($_FILES['file']['name']);
	if(move_uploaded_file($_FILES['file']['tmp_name'], ROOT.$filename)){
		echo '.'.$filename;
	}
}

 ?>