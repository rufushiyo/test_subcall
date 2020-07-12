<?php

try
{

	require_once('common.php');

	$post = sanitize($_POST);
	$member_name = $post['name'];
	$member_pass = $post['pass'];

	//$member_pass = md5($member_pass);

	// DB接続
	$dsn = 'mysql:dbname=subcall;host=localhost;charset=utf8';
	$user = 'root';
	$password = '';
	$dbh = new PDO($dsn,$user,$password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	$sql = 'SELECT code, name FROM subcall_member WHERE name=? AND pass=?';
	$stmt = $dbh->prepare($sql);
	$data[] = $member_name;
	$data[] = $member_pass;
	$stmt->execute($data);

	$dbh = null;

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);

	if($rec == false)
	{
		print 'メールアドレスかパスワードが間違っています。<br />' ;
		print '<a href="register_login.php">戻る</a>' ;
	}
	else
	{
		session_start();
		$_SESSION['member_login']=1;
		$_SESSION['member_code']=$rec['code'];
		$_SESSION['member_name']=$rec['name'];
		header('Location: index.php');
		exit();
	}

}
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をおかけしております。';
	exit();
}

?>