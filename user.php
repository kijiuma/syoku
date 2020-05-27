<?php
session_start();


require_once("config/config.php");
require_once("model/User.php");


// print_r($_POST);
//一般ユーザの場合、ログインしたユーザ情報を設定する
// if($_SESSION['User']['role'] == 0){
    // $result['User'] = $_SESSION['User'];
// }

try{
  $user = new User($host,$dbname,$user,$pass);
  $user->connectDb();

    // 登録処理
    if($_POST){
      $message = $user->validate($_POST);
      if(empty($message['user_name']) && empty($message['password']) && empty($message['email']) && empty($message['name']) && empty($message['gender'])&& empty($message['age'])){
        $user->add($_POST);
        if($_SERVER['REQUEST_METHOD']==='POST'){//POSTorGET判定
			       header('Location:./user.php');
	      }
      }
      else{
        if(isset($_POST)){
          $_SESSION['user_name'] = $_POST['user_name'];
          $_SESSION['password'] = $_POST['password'];
          $_SESSION['email'] = $_POST['email'];
          $_SESSION['name'] = $_POST['name'];
          $_SESSION['age'] = $_POST['age'];
          $_SESSION['gender'] = $_POST['gender'];
          $_SESSION['job'] = $_POST['job'];
          $_SESSION['comment'] = $_POST['comment'];
        }
        header('Location: signup.php?fill_error');
        exit;
        session_destroy();
      }
    }



  // 参照処理
  // if($_SESSION['User']['role'] != 0){
    $result = $user->findAll();
  // }
}


catch(PDOException $e){//PDOExceptionをキャッチする
  echo "エラー！:".$e->getMessage();

}

 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>MY PAGE</title>
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/signup.css">
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

  <div id="home">
    <img class="line" src="img/happa.png" alt="横線">

    <div class="done">
      <a>ご登録ありがとうございました。</a>
    </div>


    <div class="ser_in">
      <div class="in">
        <a href="index.php">HOME</a>
      </div>
    </div>

    <img class="line" src="img/happa.png" alt="横線">
  </div>

  <?php require("common/footer.php") ?>


</body>
</html>
