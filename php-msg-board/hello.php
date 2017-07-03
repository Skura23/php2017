<?php 
/*//php打开文件
$fh = fopen('./msg-txt.txt','a');

//往文件写内容
fwrite($fh, 'hello');

fclose($fh)*/

$_POST['title'];
$_POST['content'];

$fh = fopen('./msg-txt.txt', 'a');

fwrite($fh, $_POST["title"] . ',' . $_POST["content"] . "\n");

fclose($fh);

echo "留言成功！";

echo '<a href="index.html">返回</a>';
echo '<a href="msg-list.php">查看留言板</a>';

?>