<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="thanks-en.css">

  <title>Contact Us!</title>
</head>
<body>
<div class = "row col-md-4 col-md-offset-4 registeration">
<div class="registerInner">
    <form method="POST" action="thanks-en.php">
    <h1 class="hedderinformation">Contact Us!</h1>

    <div class="form-top">
        <?php if ($_POST["nickname"] == ""){
        echo 'Please Enter Your Nickname';
        }else{ ?>
        <?php echo htmlspecialchars($_POST["nickname"]); ?><br>
        <?php } ?>
        <br>
    </div>

    <div class = "input">
        <br>
        <?php if ($_POST["email"] == ""){
        echo 'Please Enter Your Email';
        }else{ ?>
        Email Address<br>
        <?php echo htmlspecialchars($_POST["email"]); ?><br>
        <?php } ?>
    </div>

    <div class = "input">
        <?php if ($_POST["content"] == ""){
        echo 'Please Enter Your Message';
        }else{ ?>
        Message<br>
        <?php echo htmlspecialchars($_POST["content"]); ?><br>
        <?php } ?>

        <br>
    </div>
        <br>
        <button type="button" class="btn btn-primary bt-samp30" onclick="history.back();">Back</button>

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