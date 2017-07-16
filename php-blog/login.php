<?php 

require('./lib/init.php');

/*echo md5('7760649skurazzz');exit();*/

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

	//$sql = "select * from user where name = '$user[name]' and password='$user[password]'";
	$sql = "select * from user where name = '$user[name]'";
	$row = mGetRow($sql);
	/*var_dump($row);exit();*/
	if (!$row) {
		# code...
		error('用户名错误');
	}else{
		if(md5($user['password'].$row['salt'])===$row['password']){
			setcookie('name',$user['name']);
			setcookie('ccode',cCode($user['name']));
			header('Location: artlist.php');
		}else{
			error('密码错误');
		}
	}
}





 ?>