<?php 

require('./lib/init.php');

if (empty($_POST)) {
	# code...
	require(ROOT.'/view/admin/login.html');
}else{
	$user['name'] = trim($_POST['name']);
	if (empty($user['name'])) {
		# code...
		error('账户名不能为空');
	}

	$user['password'] = trim($_POST['password']);
	if (empty($user['password'])) {
		# code...
		error('密码不能为空');
	}

	$sql = "select * from user where name = '$user[name]' and password='$user[password]'";
	if (!mGetOne($sql)) {
		# code...
		error('用户名或密码错误');
	}else{
		setcookie('name',$user['name']);
		header('Location: artlist.php');
	}
}





 ?>