<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="thanks.css">

  <title>入力内容確認</title>
</head>
<body>
<div class = "row col-md-6 col-md-offset-3 registeration">
<div class="registerInner">
    <form method="POST" action="thanks.php">
    <h1 class="hedderinformation">入力内容確認</h1>

    <div class="form-top">
        <?php if ($_POST["nickname"] == ""){
        echo 'ニックネームを入力してください';
        }else{ ?>
        <?php echo htmlspecialchars($_POST["nickname"]); ?>様<br>
        <?php } ?>
        <br>
    </div>

    <div class = "input">
        <br>
        <?php if ($_POST["email"] == ""){
        echo 'メールアドレスを入力してください';
        }else{ ?>
        メールアドレス<br>
        <?php echo htmlspecialchars($_POST["email"]); ?><br>
        <?php } ?>
    </div>

    <div class = "input">
        <?php if ($_POST["content"] == ""){
        echo 'コメントを入力してください';
        }else{ ?>
        お問い合わせ内容<br>
        <?php echo htmlspecialchars($_POST["content"]); ?><br>
        <?php } ?>

        <br>
    </div>
        <br>
        <button type="button" class="btn btn-primary bt-samp30" onclick="history.back();">戻る</button>

        <?php if (($_POST['nickname']!="") && ($_POST['email'] !="") && ($_POST['content'] !="")){ ?>
        <input type="hidden" name="nickname" value="<?php echo $_POST["nickname"]; ?>"> 
        <input type="hidden" name="email" value="<?php echo $_POST["email"]; ?>">
        <input type="hidden" name="content" value="<?php echo $_POST["content"]; ?>">

        <br>
        <button type="submit" class="btn btn-primary bt-samp30">OK</button>
    </form>
    <?php } ?>
</div>

</body>
</html> 