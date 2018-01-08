<?php
//扱いやすいように変数に代入
$nickname = htmlspecialchars($_POST["nickname"]);
$email = htmlspecialchars($_POST["email"]); 
$content = htmlspecialchars($_POST["content"]);



//データベースとのやり取りの処理を記述

//■step1 データベースに接続する
//データベース接続文字列
//mysql:接続するデータベースの種類
//dbname データベース名
//host パソコンのアドレス localhost このプログラムが存在している場所と同じサーバー
//注意！空欄入れないように記述するルール
//$dsn = 'mysql:dbname=phpkiso;host=localhost';

// $user データベース接続用のユーザー名
// $password データベース接続用ユーザーのパスワード(最初は空っぽに設定されている)
//$user = 'root';
//$password='';

//データベース接続オブジェクト
//$dbh = new PDO($dsn, $user, $password);

//今から実行するSQL文を文字コードutf8で送るという設定（文字化け防止）
//$dbh->query('SET NAMES utf8');

require('dbconnect.php');


//■step2 SQL文実行
//文字列としてINSERT文を挿入
$sql = 'INSERT INTO `survey` (`nickname`,`email`,`content`)
VALUES("'.$nickname.'","'.$email.'","'.$content.'");';

//SQL文を実行する準備
//アロー演算子
$stmt = $dbh->prepare($sql);

//SQL文を実行
$stmt->execute();

//■step3 データベースの切断（オブジェクトの中身を空っぽにしている）
$dbh = null;


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="thanks-en.css">
  <title>Done!</title>
</head>
<body>
<div class = "row col-md-4 col-md-offset-4 thankyou">
<div class = "registerInner">
      <h1 class = "hedderinformation">Thank you!</h1>
    <form>
    <div class = "form-top">
        <h2><?php echo htmlspecialchars($_POST["nickname"]); ?> </h2><br>
    </div>
    <div class = "input">
        Email Address<br>
        <?php echo htmlspecialchars($_POST["email"]); ?><br>
        <br>
        Massage<br>
        <?php echo htmlspecialchars($_POST["content"]); ?><br>
    </div>
    <br>
    
    </form>
</div>
</div>
</body>
</html>