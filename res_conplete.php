
<?php
session_start();

require_once("config/config.php");
require_once("model/Reserve.php");
require_once("model/Events.php");

//ログイン画面を経由しているかを確認
  if(!isset($_SESSION['User'])){
    header('Location: events_info.php?id='.$_GET['id']);
    exit;
  }

try{
  $user = new Reserve($host,$dbname,$user,$pass);
  $user->connectDb();

  // print_r($_SESSION['User']['id']);
  // print_r($_GET['id']);
  // print_r($_SESSION['User']);
  // print_r($_GET);
  // print_r($result = $user->findBuyReserve($_SESSION['User']));

  if($_GET){
    $result = $user->findBuyReserve($_GET['id']);
    $_SESSION['User'];
  }

  if(isset($_POST)){
    $_SESSION['User']['id'];
    // var_dump($_SESSION['User']);
    $user->eventsReserve($_POST);
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
<title>RESERVE</title>
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/reserve.css">
<link rel="stylesheet" type="text/css" href="css/user.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script>
</script>
</head>
<body>

  <?php require("common/header.php") ?>

  <div id="home">
    <img class="line" src="img/happa.png" alt="横線">

    <div class="logo">
      <img class="name_logo" src="img/logo_rese2.png" alt="contact">
    </div>
    <?php foreach($result as $row): ?>
      <div id="events_info">
        <form id="reserve_form" method="POST" action="">
          <div class="re_form">
            <dl class="list">
              <dt>参加イベント</dt>
              <dd><?=$row['events_name'] ?></dd>
            </dl>
            <dl class="list">
              <dt>開催日時</dt>
              <dd>
                <?php $schedule = $row['schedule']; echo date("Y年n月j日" ,strtotime(".$schedule.")) ?>
              </dd>
            </dl>
            <dl class="list">
              <dt>開催時間</dt>
              <dd>
                <?php $open = $row['open_time']; echo date("G:i" ,strtotime(".$open.")) ?>～<?php $close = $row['close_time']; echo date("G:i" ,strtotime(".$close.")) ?>
              </dd>
            </dl>
            <dl class="list">
              <dt>場所</dt>
              <dd>
                <?=$row['place'] ?>
              </dd>
            </dl>
          </div>
        </form>
      </div>
      <?php break;?>
    <?php endforeach; ?>


    <p class="moji">ご予約承りました。</p>
    <p class="moji">当日のご来店お待ちしております。</p>
    <p class="moji">※キャンセルされる場合は、必ずご連絡ください。</p>

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
