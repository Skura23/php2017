<?php  

$path = './';
$url = $_SERVER['REQUEST_URI'];

$pathLen = strlen(realpath($path));

//获取真实初始根路径
define(PATH_LEN,strlen(realpath($path)));

if(isset($_GET['dir'])){
	$path = $path.'/'.$_GET['dir'];
}else{
	$url = $url . '?dir=.';
}

//访问超出根路径时禁止 
if(strlen(realpath($path)) <PATH_LEN){
	echo "<h2>无法访问</h2?";
	exit;
}
echo strlen(realpath($path));

$dh = opendir($path);  
if($dh === false){
	echo 'error';
	exit;
}

$list = array();
while(($item = readdir($dh)) !== false){
	$list[] = $item;
}

closedir($dh);


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文件管理系统</title>
	<style>
	table,td{
		border: 1px solid black;
		border-collapse:collapse
	}
	td{
		padding: 7px 10px;
	}
	table tr td:first-child{
		text-align: center;
	}
	</style>
</head>
<body>
	<h1>文件管理系统</h1>
	<table>
		<tr>
			<td>序号</td>
			<td>文件名</td>
			<td>操作</td>
		</tr>
		<?php foreach ($list as $key => $value) {
			# code...
		echo '<tr>',
			'<td>',$key,'</td>',
			'<td>',$value,'</td>';
		echo "<td>";
		if(is_dir($path.'/'.$value)) {
				echo "<a href='",$url."/".$value."'>浏览</a>";} 
				else{echo "<a href='./".$_GET['dir']."/".$value."'>查看</a>";}
		echo '</td></tr>';
		} ?>
	</table>
</body>
</html>