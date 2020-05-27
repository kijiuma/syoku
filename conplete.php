<?php

  // $submit_time = "null";

if($_POST){
  $name = $_POST["name"];
  $kana = $_POST["kana"];
  $tell = $_POST["tell"];
  $email = $_POST["email"];
  $inquiry = $_POST["inquiry"];

  $mysqli = new mysqli("localhost:3308","root","root","events_site");

  if($mysqli->connect_error){
    // echo "データベース接続に失敗しました";
    exit();
  }
  // echo "データベース接続に成功しました";
}

$result = $mysqli->query("INSERT INTO contact VALUES(NULL,'$name','$kana','$tell','$email','$inquiry')");

if($result == 0){
  // echo "登録失敗しました";
} else{
  // echo "登録しました";
}

$mysqli->close();

?>
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
        <p>お問い合わせ頂きありがとうございました。</p>
      </div>

      <div id="home_in">
        <p>
          <a href="index.php">HOME</a>
        </p>
      </div>


    <img class="line" src="img/happa.png" alt="横線">

  </div>

  <?php require("common/footer.php") ?>


</body>
</html>
