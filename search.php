<?php
//下記のコードを入力してすぐリロードし、番号を入れて検索した場合、string(1)と表示されるのは正常な状態
// ver_dump 変数の中身を表示する
// Undefined index: code が表示されている場合
// POST送信されていない

//エラーが表示されている場合はPOST送信されている

//var_dump($_POST["code"]);

//データベースとのやり取りの処理を記述

//■step1 データベースに接続する
//下記はPHPからデータベースに接続するための五行のコードをまとめたもの
require('dbconnect.php');

//■step2 SQL文実行
// SQLインジェクションを防ぐ
//プリペアードステートメントを使う

//文字列としてINSERT文を挿入
//POST送信されているときは上、されていないときは下
//$sql = 'SELECT* FROM `survey`;';
//$sql = 'SELECT* FROM `survey` WHERE `code`=1;';

//やりたいことが２つあるときはif文を使う
//isset()は引数にしていた変数が定義されているが調べる関数
if ((isset($_POST['code'])) && ($_POST['code'] != '')){
  //POST送信されている
  $sql = 'SELECT * FROM `survey`
          WHERE `code`=?;';


//置き換えたいデータを配列の形で保存する
//$data[]と書くと、配列の末尾に追加される
//$data = $_POST['code'];-> $data の中に１とか２とか記述された文字が格納される
  //$data = $_POST['code'];-> $data[0]の中に記述された文字が格納される
  $data[] = $_POST['code'];

  //SQL文を実行する準備
  //アロー演算子
  $stmt = $dbh->prepare($sql);

  //SQL文を実行
  $stmt->execute($data);

}else{
  //POST送信されていない
  //空文字が送られている
  $sql = 'SELECT * FROM `survey`;';

  //SQL文を実行する準備
  //アロー演算子
  $stmt = $dbh->prepare($sql);


  //SQL文を実行
  $stmt->execute();

  //■step3 データベースの切断（オブジェクトの中身を空っぽにしている）
  //$dbh = null;
}

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

<form action="" method="post">
   <p class="messages-up">検索したいcodeを入力してください。</p>
   <input type="text" name="code">
   <input type="submit" value="検索">
</form>

<?php


//繰り返し処理
//文をコピペしても可能であるが、繰り返し文を使うと便利

//while 条件式が指定できる繰り返し文
//while(1) 無限ループ
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
                      <input type="button" value="編集">
                      <a href = "delete.php?code=<?php echo $record["code"]; ?>" onclick="return confirm('<?php echo $record["code"]; ?>を削除します、よろしいですか？');"><input type="button" value="削除"></a>
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