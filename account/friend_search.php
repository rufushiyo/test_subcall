<!--フレンド検索の結果-->
<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['bool']) == false)
{
	print 'ゲストユーザーではこの機能は使えません';
	print '<a href="../index.php">top画面へ</a><br />';
	print '<br />';
}
else
{
  require_once('../common.php');

	$post = sanitize($_POST);
  $search_name = $post['search_name'];
	print $_SESSION['regist_name'];
	print '様が検索した結果を表示します';
	print '<br />';

  // 変数の定義、初期化
	$user_num = $_SESSION['regist_number'];    	// ユーザー番号取得

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>フレンド機能</title>
</head>
<body>
  <?php
  // DB接続(mysql, xampp)
	$dsn = 'mysql:dbname=subcall;host=localhost;charset=utf8';
	$user = 'root';
	$password = 'kcsf';
	$dbh = new PDO($dsn,$user,$password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  // 入力された名前をもとに、会員番号と会員名を取得(完全一致)
  $sql = 'SELECT number,name FROM account WHERE name=? ';
	$stmt = $dbh->prepare($sql);
	$data[] = $search_name;
	$stmt->execute($data);

	$dbh = null;

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);

  if($rec == false){
    print $search_name;
    print '　は登録されていません。'.'<br />';
  }else{
    print '検索結果一覧'.'<br /><br />';
    while(true){

      if($rec == false){
        break;
      }

      print '<form method="post" action="friend_search_check.php">';
      print '会員番号：'.$rec['number'];
      print '　　会員名：'.$rec['name'];
      print '<input type="hidden" name="search_num" value="'.$rec['number'].'">';
      print '<input type="hidden" name="search_name" value="'.$rec['name'].'">'.'</br>';
      print '<input type="submit" name="search_check" value="フレンド申請（画面未作成）" >'.'</br>'.'</br>';
      print '</form>';

      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    }
  }
	print '<a href="friend.php">フレンド画面へ</a></br>';
	print '<a href="../index.php">トップ画面へ</a>';

}
?>
</body>
</html>
