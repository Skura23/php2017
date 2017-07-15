<?php 

setcookie('name','admin');
//加上时间戳,使其有时效
setcookie('test','admin111',time()+60);
//加上'/'参数,使其在根目录生效,否则只对下级目录生效,上级目录文件无法获取cookie
setcookie('test','admin111',time()+60,'/');

 ?>