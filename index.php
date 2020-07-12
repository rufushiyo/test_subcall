<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login']) == false)
{
	print 'ようこそゲスト様';
	print '<br />';
}
else
{
	print 'ようこそ';
	print $_SESSION['member_name'];
	print '様　';
	print '<br />';
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SubCall</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="heading">Welcome to Subcall</h1>
        <script>
            // ログインページへ
          function go_login(){
             location.href="register_login.php";
          }
          // 会員登録ページへ
           function go_add(){
             location.href="register_add.php";
          }
        </script>
        <button type="button" onclick="go_login()">ログイン</button></br>
        <button type="button" onclick="go_add()">新規会員登録</button></br>
        <form action="login.php" method="post">
          
          部屋番号を入力してください
          <input type="text" name="roomId" size="30" maxlength="20"></br>
          
          <?php
	        require_once('common.php');
          ?>
          言語を選択してください(Select a language)
          <?php
            pulldown_language();
           ?> 
         </form>
</body>
</html>
