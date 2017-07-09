<?php 

//连接数据库函数
function mConn(){
	static $conn = null;
	if ($conn === null) {
		# code...
		$cfg = require("./lib/config.php");
		$conn = mysql_connect($cfg['host'], $cfg['user'], $cfg['pwd']);
		mysql_query('use '.$cfg['db'], $conn);
		mysql_query('set names '.$cfg['charset'], $conn);
	}
	return $conn;
}



/**
* 查询的函数
* @return mixed resource/bool
*/
function mQuery($sql){
	$rs = mysql_query($sql, mConn());
	if($rs){
		mLog($sql);
	}else{
		mLog($sql, "\n", mysql_error());
	}
	return $rs;
}

/**
* log日志记录功能
* @param str $str 待记录的字符串
*/
function mLog($str){
	$filename = ROOT . '/log/' . date('Ymd') . '.txt';
	$log = "==========================================\n".date('Y/m/d H:i:s')."\n".$str.
	"\n"."==========================================\n";
	file_put_contents($filename, $log, FILE_APPEND);
}


//select 查询多行数据
//return mixed

function mGetAll($sql){
	$rs = mQuery($sql);
	if (!$rs) {
		return false;
	}

	$data = array();
	while($row = mysql_fetch_assoc($rs)){
		$data[] = $row;
	}
	return $data;

}

//$sql = "select * from cat";
//print_r(mGetAll($sql));

/**
* 取出一行数据的函数
* @param str $sql 待查询的sql语句
* @return mixed resource/bool
*/

function mGetRow($sql){
	$rs = mQuery($sql);
	if (!$rs) {
		return false;
	}
	return mysql_fetch_assoc($rs);
}

/**
* 查询返回一个结果
* @param str $sql 待查询的sql语句
* @return mixed 成功返回结果，失败返回false
*/
function mGetOne($sql){
	$rs = mQuery($sql);
	if (!$rs) {
		return false;
	}
	return mysql_fetch_row($rs)[0];
}
/*$sql = "select count(*) from cat where cat_id = 1";
echo mGetOne($sql);*/


/**
* 自动拼接insert和update语句，并调用mQuery去执行sql
* @param str $table 目标表格
* @param arr $data 接受到的数据，一维数组
* @param str $act 动作，默认为'insert'
* @param str $where 为update提供where值，默认为0
* @return bool 成功返或失败
*/

function mExec($table, $data, $act = 'insert', $where = 0){
	if($act == 'insert'){
		$sql = "insert into $table (";
		$sql .= implode(',',array_keys($data)) . ") values ('";
		$sql .= implode("','",array_values($data)) . "')";
	}else if ($act == 'update') {
		$sql = "update $table set ";
		foreach ($data as $k => $v) {
			$sql .= $k . "='" . $v . "',";
		}
		$sql = rtrim($sql,',') . ' where ' . $where;
	}

	return mQuery($sql);

}

/*$data = array('title'=>'hi12','content'=>'2333');
echo mExec('art', $data, 'update', 'art_id = 1');*/

/*$data = array('title'=> 'modi', 'content'=>'bar');
echo mExec('art', $data, 'update', 'art_id = 2');*/


/**
* 取得上一步insert操作产生的主键id
*/
function getLastId(){
	return mysql_insert_id(mConn());
}



 ?>