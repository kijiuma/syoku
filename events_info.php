<?php
session_start();

require_once("config/config.php");
require_once("model/User.php");
require_once("model/Events.php");



try{
  $user = new Events($host,$dbname,$user,$pass);
  $user->connectDb();

  if(isset($_GET['id'])){
    $result['User'] = $user->findById($_GET['id']);
  }
  else{
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
<title>EVENTS</title>
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/events.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script>
</script>
</head>
<body>

  <?php require("common/header.php") ?>

  <div id="main">
    <div class="img"></div>
    <!-- <img src="img/event.jpg" alt="トップ画像"> -->
    <a href="" class="logo">
      <img src="img/events.png" alt="login">
    </a>
  </div>

  <div id="down"></div>

  <div id="home">
    <img class="line" src="img/happa.png" alt="横線">
    <div class="logo">
      <img class="name_logo" src="img/logo_even2.png" alt="contact">
    </div>
<!-- EVENT LIST-->
    <div id="event_list">
      <div class="evein_box">
        <?php foreach($result as $row): ?>
          <div class="evein_name">
            <a class="title"><?=$row['events_name'] ?></a>
          </div>
          <div class="evein_img">
            <a><img src="<?= $row['img'] ?>" alt="イメージ画"></a>
          </div>
          <div class="evein_s">
            <table>
              <p>
                <a>ご案内</a>
              </p>
              <tr>
                <th>場所</th>
                <td><?=$row['place'] ?></td>
              </tr>
              <tr>
                <th>日時</th>
                <td>
                  <?php $schedule = $row['schedule']; echo date("Y年n月j日" ,strtotime(".$schedule.")) ?>
                </td>
              </tr>
              <tr>
                <th>時間</th>
                <td>
                  <?php $open = $row['open_time']; echo date("G:i" ,strtotime(".$open.")) ?>～<?php $close = $row['close_time']; echo date("G:i" ,strtotime(".$close.")) ?>
                </td>
              </tr>
              <tr>
                <th>定員</th>
                <td><?=$row['capacity'] ?>名</td>
              </tr>
              <tr>
                <th>料金</th>
                <td>男女<?=$row['price'] ?>円</td>
              </tr>
              <tr>
                <th>詳細</th>
                <td>寿司職人とイタリアンシェフがコラボした月に1度の豪華な食事会。
                  <br>お寿司は、市場から仕入れ、イタリアンはシェフのこだわりをふんだんに盛り込んだ素材となります。
                  <br>何が出てくるかはお楽しみ☆
                  <br>ご来店お待ちしております。
                </td>
              </tr>
            </table>
          </div>
        <?php endforeach; ?>

        <!-- 未ログイン -->
        <div class="evein_res">
          <p class="moji"><a class="moji">初めて参加の方はこちら</a></p>
          <p class="kata"><a class="log" href="login.php">LOGIN</a></p>
        </div>

        <?php if(empty($_SESSION['User']['role']) || (isset($_SESSION['User']['role']) && $_SESSION['User']['role'] != "1")): ?>
        <!-- ログイン済 -->
          <div class="evein_res">
            <p class="moji"><a class="moji">ログイン済みの方はこちら</a></p>
            <p class="kata"><a class="res" href="reserve.php?id=<?=$row['id']?>">RESERVE</a></p>
          </div>
        <?php endif; ?>

        <!-- ユーザ管理者 -->
        <?php if(isset($_SESSION['User']['role']) && $_SESSION['User']['role'] === "1"): ?>
          <div class="evein_res">
            <p class="moji"><a class="moji">ユーザー管理者のみ</a></p>
            <p class="kata"><a class="res" href="reserve_list.php?id=<?=$row['id']?>">LIST...</a></p>
          </div>
        <?php endif; ?>


      </div>
    </div>

    <img class="line" src="img/happa.png" alt="横線">
  </div>
<?php
  // print_r($_GET['id']);
  // print_r($_SESSION['User']['id']);
  // print_r($_SESSION['User']['role']);
  // print_r($_SESSION['User']['id']);
  // print_r($row['id']);
  // print_r($_GET['id']);
  // print_r($_SESSION['User']);
  // print_r($_POST);

 ?>
  <?php require("common/footer.php") ?>


</body>
</html>
