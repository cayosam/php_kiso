<?php

//データベースとのやり取りの処理を記述

//■step1 データベースに接続する(詳細はdbconnect.php参照)
//$dsn = 'mysql:dbname=phpkiso;host=localhost';
//$user = 'root';
//$password='';
//$dbh = new PDO($dsn, $user, $password);
//$dbh->query('SET NAMES utf8');


//■step1 データベースに接続する(詳細はdbconnect.php参照)
//上記データベース接続に必要な五行を下記のrequire9('');にまとめた
require('dbconnect.php');

//■step2 SQL文実行（三行）
$sql = 'SELECT* FROM `survey`;';
//SQL文を実行する準備
//アロー演算子
$stmt = $dbh->prepare($sql);
//SQL文を実行
$stmt->execute();

//■step3 データベースの切断（オブジェクトの中身を空っぽにしている）
//$dbh = null;


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="styleseet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="view.css">
  <title>お問い合わせ一覧</title>
</head>
<body>

<h1 class = "messages-up">お問い合わせ一覧/Massages</h1>

<?php


//繰り返し処理
//文をコピペしても可能であるが、繰り返し文を使うと便利

//while 条件式が指定できる繰り返し文
//while(1) 無限ループ
//取得したデータを一つずつ連続して取り出したい場合はfetch文に対してwhile文が必要となる
while(1) {
//一行取得
$record = $stmt->fetch(PDO::FETCH_ASSOC);

//もし最後まで行ってfalseまで行ったら、処理を中断する
if ($record == false){
  //処理を中断する
  break;
}
//

//連想配列のキーがカラム名と同じものになっている！（テーブルのカラム名と同じものをかく）
?>
<div class="messages-table">
  <div class="container">
    <div class="row">
      <div class="messages text-center">
        <div class="messages-top">
              <br>
              <?php echo $record["code"]; ?>.
              <?php echo $record["nickname"]; ?>
              <hr>
              <?php echo $record["email"]; ?>
              <br><br>
              <?php echo $record["content"]; ?>
              <br><br>

              <form method="post">
                <a href = "edit.php?code=<?php echo $record["code"]; ?>">
                  <input type="button" value="編集">
                </a>

                <a href = "delete.php?code=<?php echo $record["code"]; ?>"
                  onclick="return confirm('<?php echo $record["code"]; ?>.<?php echo $record["nickname"]; ?>を削除します、よろしいですか？');">
                  <input type="button" value="削除">
                </a>
              </form>

        </div>
      </div>
    </div>
  </div>
</div>
</div>

<?php
}
//■step3 データベースの切断（オブジェクトの中身を空っぽにしている）
$dbh = null;
?>


</body>
</html>