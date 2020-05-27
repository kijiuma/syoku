<?php
session_start();

require_once("config/config.php");
// require_once("model/User.php");
require_once("model/Events.php");

try{
  $user = new Events($host,$dbname,$user,$pass);
  $user->connectDb();


  $result = $user->findAll();


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
      <?php foreach($result as $row): ?>

      <div class="event_box">
        <div class="event_name">
          <a href="events_info.php?id=<?=$row['id']?>"><?=$row['events_name'] ?></a>
        </div>
        <div class="event_img">
          <a href="events_info.php?id=<?=$row['id']?>">
            <img src="<?= $row['img'] ?>" alt="イメージ画">
          </a>
        </div>
        <div class="event_s">
          <table>
              <!-- <p> -->
                <!-- <a>詳細</a> -->
              <!-- </p> -->
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
          </table>
        </div>
      </div>
      <?php endforeach; ?>

    </div>

    <img class="line" src="img/happa.png" alt="横線">
  </div>

  <?php require("common/footer.php") ?>


</body>
</html>
