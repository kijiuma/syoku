<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>CONTACT</title>
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/contact.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script>

$(function(){
	$("form").validate({
	  rules : {
		 name: {
     required: true
		 },
		 kana: {
			 required: true
		 },
		 email: {
			 required: true
		 },
   },
   messages: {
    name : {
      required: "<br>氏名を入力してください"
     },
     kana : {
      required: "<br>フリガナを入力してください"
     },
     email : {
      required: "<br>メールアドレスを入力してください"
     },
   }
  }
 )}
);


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
      <form class="form" method="POST" action="confirm.php">
        <div id="form1">
          <dl class="list">
            <dt>氏名<span>*</span></dt>
            <dd>
              <input type="text" name="name">

            </dd>
          </dl>
          <dl class="list">
            <dt>フリガナ<span>*</span></dt>
            <dd>
              <input type="text" name="kana" valiu="<?php if(isset($_GET["fill_error"])) echo $_SESSION['user_name'] ?>">
            </dd>
          </dl>
          <dl class="list">
            <dt>電話番号</dt>
            <dd>
              <input type="text" name="tell">
            </dd>
          </dl>
          <dl class="list">
            <dt>メールアドレス<span>*</span></dt>
            <dd>
              <input type="text" name="email">
            </dd>
          </dl>
        </div>

        <div class="text2">
          <p>お問い合わせ・ご感想の内容をご記入ください<span>*</span></p>
        </div>
        <div id="form2">
          <dl>
            <dd>
              <textarea type="text" name="inquiry"></textarea>
            </dd>
            <div>
              <input type="submit" value="確 認" id="submit_btn">
            </div>
          </bl>
        </div>
      </form>

    <img class="line" src="img/happa.png" alt="横線">

  </div>

  <?php require("common/footer.php") ?>


</body>
</html>
