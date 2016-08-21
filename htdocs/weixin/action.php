<?php

//连接数据库
try{
	$pdo = new PDO("mysql:host=bdm237895395.my3w.com;dbname=bdm237895395_db","bdm237895395","hdw003826");
}catch (PDOException $e){
	echo $e->getMessage();
	exit;
}
$pdo->query('set names utf8');

$sql = "select * from wechat";

$stmt = $pdo->query($sql);

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

//遍历data数组

if(isset($_GET['callback'])){ 
	$result['code'] = 1;
	$result['data'] = $data;
	$callback = $_GET['callback'];
	echo $callback.'('.json_encode($result).')';
	exit;
}else{
	$result['code'] = 0;
	$result['data'] = '没有数据';
	echo $callback.'('.json_encode($result).')';
};


