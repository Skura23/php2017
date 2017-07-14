
 <body>
 	<form action="" method="post" enctype="multipart/form-data">
 		<p>图片</p>
 		<input type="file" name="pic">
 		<button type="submit">提交</button>
 	</form>
 	<div>
 		<?php print_r($_FILES); ?>
 	</div>
 </body>

<?php 
//生成随机文件名
$fname = rand(10000,99999);
//获取文件后缀
$ext = strrchr($_FILES['pic']['name'], '.');
//创建目录
$path = './'.date('Y/m/d');
if (!is_dir($path)) {
	# code...
	mkdir($path, 0777, true);
}

echo $path.'/'.$fname.$ext;
echo move_uploaded_file($_FILES['pic']['tmp_name'], $path.'/'.$fname.$ext)? "ok":"not ok";

?>
