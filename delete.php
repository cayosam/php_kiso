<?php

//下記の文は確認時使用するため、消さずに置いておきます。
//echo 'delete.phpに移動しています';

//どのデータを消すのか指定している情報をGET送信で取得
//var_dump($_GET['code']);

if(isset($_GET['code'])){
      //step1
      //データベースに接続（おまとめ五行。）
      require('dbconnect.php');

      //step2
      //SQL実行（三行）
      //下記はver_dump実行中はコメントして消しておく、そうでないと動かない
      $sql = 'DELETE FROM `survey`
              WHERE `code`='.$_GET['code'];
      //SQL文を実行する準備
      $stmt = $dbh->prepare($sql);
      //SQL文を実行
      $stmt->execute();

      //step3
      //データベースの破棄
      $dbh = null;

      //view.phpに戻る
      header('Location: view.php');

}

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
不正アクセスは良くないです。
</body>
</html>