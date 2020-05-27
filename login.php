<?php
session_start();

require_once("config/config.php");
require_once("model/User.php");

try{
  $user = new User($host,$dbname,$user,$pass);
  $user->connectDb();

  // ログイン
  if($_POST){
    $result = $user->login($_POST);
    if(!empty($result)){
      $_SESSION['User'] = $result;
      header('Location: mypage.php');
      exit;
    }
    else{
      $message = "ログインできませんでした";
    }
  }

}
catch(PDOException $e){
  echo "エラー！:".$e->getMessage();

}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>LOGIN</title>
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" type="text/css" href="css/user.css">
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

  <div id="down"></div>

<!-- ホーム -->
  <div id="home">
    <img class="line" src="img/happa.png" alt="横線">

    <div class="logo">
      <img class="name_logo" src="img/logo_login3.png" alt="contact">
    </div>

    <div id="login">
        <form action="login.php" method="post">
          <table>
<!-- user_name varchar(16) -->
          <tr class="user kata">
            <th>ユーザー名</th>
            <td>
              <input type="text" name="user_name">
            </td>
          </tr>
<!-- password varchar(16) -->
          <tr class="pass kata">
            <th>パスワード</th>
            <td>
              <input type="password" name="password">
            </td>
          </tr>
        </table>

        <div id="login_e">
          <?php if(isset($message)) echo "<p class='login_error'>".$message."</p>" ?>
        </div>

<!-- login -->
        <div class="logo">
          <a class="name_logo">
            <input type="submit" value="LOGIN">
          </a>
        </div>
<!-- signup -->
        <div class="ser_in">
          <div class="logo">
            <a class="name_logo" href="signup.php">
              <!-- <img src ="img/signup2.png"> -->
              <input type="button" value="SIGN UP">
            </a>
          </div>
        </div>

      </form>
    </div>

    <img class="line" src="img/happa.png" alt="横線">
  </div>

  <?php require("common/footer.php") ?>


</body>
</html>
