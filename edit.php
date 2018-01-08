<?php

//step1
//DBの接続(五行おまとめ)
require('dbconnect.php');

// A部分---------------------------------------------------------

//step2
//SQL文実行（三行の決まり文句）
//SELECT文実行＊で全データ選択となるのでWHEREで場所を指定
//ボタンが押された時にPOST送信されるようにif文に記述
if (isset($_POST['code'])){

$sql = 'UPDATE `survey`
           SET `nickname`="'.$_POST["nickname"].'",
               `email`="'.$_POST["email"].'",
               `content`="'.$_POST['content'].'"
         WHERE `code`='.$_POST['code'];

//SQL文を実行する準備
//アロー演算子
$stmt = $dbh->prepare($sql);

//SQL文を実行
$stmt->execute();

//step3
//接続の解除
$dbh = null;

//view.phpに戻る
header('Location: view.php');

}
// A部分 終了/ B部分 ----------------------------------------------------

//ステップ2
//SQL文実行（ボタンが押されなかった時。三行の決まり文句）
//SELECT文実行
$sql = 'SELECT * FROM `survey` WHERE `code` = '.$_GET['code'];


$stmt = $dbh->prepare($sql);

// SQL文を実行
$stmt->execute();


//ヒント：ここにフェッチしたデータ保存しておく代入文を記述！
//下記のfetchで一個文のデータを取得できる。一回で終わる（繰り返し作業が不要）ため、while文は不要
$record = $stmt->fetch(PDO::FETCH_ASSOC);

//step3
//接続の解除
$dbh = null;

?>

<!-- B部分 終了 / C部分 -->

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="thanks.css">

  <title>お問い合わせ情報編集</title>
</head>

<body>
<div class = "row col-md-4 col-md-offset-4 registeration">
<div class="registerInner">

    <h1 class="hedderinformation">お問い合わせ情報編集</h1>
    <form method="POST" action="" class="form-horizontal">

      <div class="form-group">

          コード<br>
          <?php echo $_GET['code']; ?>
          <input type="hidden" name="code" value="<?php echo $_GET['code']; ?>">
          <!--上記は同じ名前やメールアドレスなどでお問い合わせ一覧に入力があった時に、コードで判別するため必要だが、表示が不必要なため、hiddenで記述-->
      </div>

      <div class="form-group">

          ニックネーム<br>
          <input type="text" name="nickname" size=5 placeholder="Please enter your nickname" style="width:400px" class="form-control" value="<?php echo $record["nickname"]; ?>">
      </div>

      <div class="form-group">
          メールアドレス<br>
          <input type="text" name="email" size=50 placeholder="Please enter your email" style="width: 400px" class="form-control" value="<?php echo $record["email"]; ?>">
      </div>

      <div class="form-group">
          お問い合わせ内容<br>
          <textarea name="content" size=50 placeholder="Comment" cols="55" rows="5"><?php echo $record["content"]; ?></textarea>
      </div>

      <br>

      <button type="submit" class="btn btn-primary bt-samp30">送信</button>

      <a href="http://sam.sunnyday.jp/php_kiso/index-en.html">English
      </a>

    </form>

  <!--<p>
  copyright kayosato already reserved<br>
  著作権はkayosatoが持っています。© →option + G で表示できる
  </p>-->
  <?php include('copyright.php');
  ?>

</div>
</div>
</body>
</html>