<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>CONTACT</title>
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/contact.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script>
</script>
</head>
<body>

  <?php require("common/header.php") ?>

  <div id="main">
    <!-- <img src="img/egg.jpg" alt="トップ画像"> -->
    <div class="img"></div>
    <!-- <a href="" class="logo"><img src="img/logo_w.png" alt="login"></a> -->
  </div>

  <!-- <div id="down"></div> -->

  <div id="home">
    <img class="line" src="img/happa.png" alt="横線">
      <div class="logo">
        <img class="name_logo" src="img/logo_cont2.png" alt="contact">
      </div>
      <div class="text">
        <p>下記の項目をご記入の上、送信ボタンを押して下さい。</p>
        <p>お問い合わせ頂きました内容につきましては、折り返しご連絡を差し上げます。</p>
        <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
        <p><span>*</span>入力必須項目</p>
      </div>
      <form class="form" method="POST" action="conplete.php">
        <div id="form1">
          <dl class="list">
            <dt>氏名<span>*</span></dt>
            <dd><?php echo $_POST["name"];?>
              <input type="hidden" name="name" value="<?php echo $_POST["name"];?>">
            </dd>
          </dl>
          <dl class="list">
            <dt>フリガナ<span>*</span></dt>
            <dd><?php echo $_POST["kana"];?>
              <input type="hidden" name="kana" value="<?php echo $_POST["kana"];?>">
            </dd>
          </dl>
          <dl class="list">
            <dt>電話番号</dt>
            <dd><?php echo $_POST["tell"];?>
              <input type="hidden" name="tell" value="<?php echo $_POST["tell"];?>">
            </dd>
          </dl>
          <dl class="list">
            <dt>メールアドレス<span>*</span></dt>
            <dd><?php echo $_POST["email"];?>
              <input type="hidden" name="email" value="<?php echo $_POST["email"];?>">
            </dd>
          </dl>
        </div>

        <div class="text2">
          <p>お問い合わせ・ご感想の内容をご記入ください<span>*</span></p>
        </div>
        <div id="form2">
          <dl>
            <dd><?php echo nl2br($_POST["inquiry"]);?>
              <input type="hidden" name="inquiry" value="<?php echo $_POST["inquiry"];?>">
            </dd>
            <div>
              <input type="submit" value="送 信" id="submit_btn">
            </div>
          </bl>
        </div>
      </form>

    <img class="line" src="img/happa.png" alt="横線">

  </div>

  <?php require("common/footer.php") ?>


</body>
</html>
