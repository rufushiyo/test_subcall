<?php
try
{
	require_once('../common.php');

	$post = sanitize($_POST);
	$regist_name = $post['name'];
	$regist_pass = $post['pass'];
	$regist_address =$post['address'];

	$regist_pass = hash('sha256' , $regist_pass);

	$dsn = 'mysql:dbname=subcall;host=localhost;charset=utf8';
	$user = 'root';
	// XAMPP用のmysql
    $password = '';
	//$password = 'kcsf';
	$dbh = new PDO($dsn,$user,$password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	// 登録番号も取得
	$sql = 'SELECT number, name, mail_address FROM account WHERE name=? AND pass=?';
	//$sql = 'SELECT name, mail_address FROM account WHERE name=? AND pass=?';

	$stmt = $dbh->prepare($sql);
	$data[] = $regist_name;
	$data[] = $regist_pass;
	$stmt->execute($data);

	$dbh = null;

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);

	if($rec == true){
		session_start();
		$_SESSION['bool']=1;
		// 登録番号取得
		$_SESSION['regist_number']=$rec['number'];
		
		$_SESSION['regist_name']=$rec['name'];
		$_SESSION['regist_address']=$rec['mail_address'];
		header('Location: /index.php');
		exit();
	}else{
			header('Location: /account/login.php?check=error');
			exit();
	}

}
catch (Exception $e)
{
	header('Location: /account/login.php?check=error');
	exit();
}


?>
