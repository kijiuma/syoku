<?php
session_start();

require_once("config/config.php");
require_once("model/User.php");

//ログアウト処理
if(isset($_GET['logout'])){
  //セッション情報を破棄する
  $_SESSION = array();
  session_destroy();
}

//ログイン画面を経由しているかを確認
  if(!isset($_SESSION['User'])){
    header('Location: login.php');
    exit;
  }

//一般ユーザの場合、ログインしたユーザ情報を設定する
if($_SESSION['User']['role'] == 0){
    $result['User'] = $_SESSION['User'];
}

try{
  $user = new User($host,$dbname,$user,$pass);
  $user->connectDb();


  // 削除処理
  if(isset($_GET['del'])){
    if($_SESSION['User']['role'] != 0){
      if($_SESSION['User']['id'] != $_GET['del']){
        $user->delete($_GET['del']);
      }
    }
  }

  //編集処理
  if(isset($_GET['edit'])){
    // 編集処理
    if($_POST){
      $message = $user->validate($_POST);
      if(empty($message['user_name']) && empty($message['password']) && empty($message['email']) && empty($message['name']) && empty($message['gender'])&& empty($message['age'])){
        $user->edit($_POST);
      }
      else{//上記の処理が実行されない場合下記のリダイレクト処理
        $_SESSION = $user->edit($_POST);
        header('Location:'.$url.$_POST['id']);
        exit;
      }
    }
    // 編集処理
    $result['User'] = $user->findById($_GET['edit']);
    // 参照処理
    if($_SESSION['User']['role'] != 0){
      $result = $user->findAll();
    }
  }
  else{
    // 登録処理
    if($_POST){
      $message = $user->validate($_POST);
      if(empty($message['user_name']) && empty($message['password']) && empty($message['email']) && empty($message['name']) && empty($message['gender'])&& empty($message['age'])){
        $user->add($_POST);
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
  }
  // 参照処理
  if($_SESSION['User']['role'] != 0){
    $result = $user->findAll();
  }
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

    <div class="logo">
      <img class="name_logo" src="img/logo_mypage3.png" alt="contact">
    </div>

    <?php foreach($result as $row): ?>

      <div id="login">
        <table>
          <form action="" method="post">
      <!-- user_name varchar(16) -->
            <tr class="user kata">
              <th>ユーザー名</th>
              <td><?=$row['user_name'] ?></td>
            </tr>
      <!-- password varchar(16) -->
            <tr class="pass kata">
              <th>パスワード</th>
              <td><?=$row['password'] ?></td>
            </tr>
      <!-- email varchar(32) -->
            <tr class="email kata">
              <th>E-mail</th>
              <td><?=$row['email'] ?></td>
            </tr>
      <!-- name varchar(16) -->
            <tr class="name kata">
              <th>氏名</th>
              <td><?=$row['name'] ?></td>
            </tr>
      <!-- gender smallint(1) -->
            <tr class="gen kata">
              <th>性別</th>
              <td class="gender">
                <?php if($row['gender'] == "1"): ?>
                  男性
                <?php else: ?>
                  女性
                <?php endif; ?>
              </td>
            </tr>
      <!-- age smallint(3) -->
            <tr class="age kata">
              <th>年齢</th>
              <td><?=$row['age'] ?>歳</td>
            </tr>
      <!-- Job text -->
            <tr class="job kata">
              <th>職業</th>
              <td><?=$row['job'] ?></td>
            </tr>
      <!-- comment text -->
            <tr class="comment kata">
              <th>コメント</th>
              <td><?=$row['comment'] ?></td>
            </tr>
      <!-- admin int(1) -->
            <?php if($_SESSION['User']['role'] != 0): ?>
              <tr class="role kata">
                <th>権限</th>
                <td>
              <?php if($row['role'] == 0): ?>
                一般ユーザー
              <?php else: ?>
                管理者
              <?php endif; ?>
                </td>
              </tr>
            <?php endif; ?>
            </form>
          </table>

      <!-- login -->
          <div id="mypage">
            <div id="logout">
              <p>
                <a href="?logout=1">LOGOUT</a>
              </p>
            </div>
      <!-- edit -->
            <div id="edit">
              <p>
                <a href="edit.php?edit=<?=$row['id'] ?>">EDIT</a>
              </p>
            </div>
      <!-- delete -->
            <?php if($_SESSION['User']['role'] != 0): ?>
              <?php if($_SESSION['User']['id'] != $row['id']): ?>
              <div id="del">
                <p>
                  <a href="?del=<?=$row['id'] ?>" onClick="if(!confirm('ユーザー：<?=$row['user_name'] ?>を削除しますが大丈夫ですか？'))return false">DEL</a>
                </p>
              </div>
              <?php endif; ?>
            <?php endif; ?>
      <!-- reserve -->
            <?php if($_SESSION['User']['role'] != 1): ?>
              <div id="reserve">
                <p>
                  <a href="events.php">EVENTS</a>
                </p>
              </div>
            <?php endif; ?>

          </div>
        </div>
      <?php endforeach; ?>

    <img class="line" src="img/happa.png" alt="横線">
  </div>

  <?php require("common/footer.php") ?>


</body>
</html>
