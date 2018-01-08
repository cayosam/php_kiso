<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="thanks.css">

  <title>お問い合わせ</title>
</head>

<body>
<div class = "row col-md-4 col-md-offset-4 registeration">
<div class="registerInner">

    <h1 class="hedderinformation">お問い合わせ情報入力</h1>
    <form method="POST" action="check.php" class="form-horizontal">

      <div class="form-group">
          ニックネーム<br>
          <input type="text" name="nickname" size=5 placeholder="Please enter your nickname" style="width:400px" class="form-control">
      </div>

      <div class="form-group">
          メールアドレス<br>
          <input type="text" name="email" size=50 placeholder="Please enter your email" style="width: 400px" class="form-control">
      </div>

      <div class="form-group">
          お問い合わせ内容<br>
          <textarea name="content" size=50 placeholder="Comment" cols="55" rows="5"></textarea>
      </div>

      <br>
      <button type="submit" class="btn btn-primary bt-samp30">確認</button>

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