<?php 

require('../lib/init.php');

//echo $_POST['hi'];
//var_dump($_FILES['file']);

$upFile = $_FILES['file'];
//echo dirname(__FILE__);

if ($upFile['error']==0 && !empty($upFile)) {
	# code...
	$filename =  createDir() . '/' . randStr().getExt($_FILES['file']['name']);
	if(move_uploaded_file($_FILES['file']['tmp_name'], ROOT.$filename)){
		echo $filename;
	}
}

/*function creaDir($dirPath){
	$curPath = dirname(__FILE__);
	$path = $curPath.'\\'.$dirPath;
	if (is_dir($path) || mkdir($path,0777,true)) {
		# code...
		return $dirPath;
	}
}*/
//creaDir('upload');
//echo creaDir('upload');

/*if ($upFile['error']==0 && !empty($upFile)) {
	# code...
	$dirpath = creaDir('upload');
	$filename =  $_FILES['file']['name'];
	$queryPath = './'.$dirpath.'/'.$filename;
	if(move_uploaded_file($_FILES['file']['tmp_name'],$queryPath)){
		echo $queryPath;
	}
}*/



 ?>