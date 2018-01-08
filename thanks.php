<?php
//扱いやすいように変数に代入
$nickname = htmlspecialchars($_POST["nickname"]);
$email = htmlspecialchars($_POST["email"]); 
$content = htmlspecialchars($_POST["content"]);
//htmlspecialcharsはサニタイズ



//データベースとのやり取りの処理を記述

//■step1 データベースに接続する
//データベース接続文字列（五行。詳しい説明はdbconnect.phpを確認）
//$dsn = 'mysql:dbname=phpkiso;host=localhost';
//$user = 'root';
//$password='';
//$dbh = new PDO($dsn, $user, $password);
//$dbh->query('SET NAMES utf8');


//■step1 データベースに接続する(詳細はdbconnect.php参照)
//上記データベース接続に必要な五行を下記のrequire9('');にまとめた
require('dbconnect.php');


//■step2 SQL文実行（三行）
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
  <link rel="stylesheet" type="text/css" href="thanks.css">
  <title>送信完了</title>
</head>
<body>
<div class = "row col-md-4 col-md-offset-4 thankyou">
<div class = "registerInner">
      <h1 class = "hedderinformation">送信完了いたしました</h1>
    <form>
    <div class = "form-top">
        <h2><?php echo htmlspecialchars($_POST["nickname"]); ?> 様</h2><br>
    </div>
    <div class = "input">
        メールアドレス<br>
        <?php echo htmlspecialchars($_POST["email"]); ?><br>
        <br>
        お問い合わせ内容<br>
        <?php echo htmlspecialchars($_POST["content"]); ?><br>
    </div>
    <br>
    
    </form>
</div>
</div>
</body>
</html>