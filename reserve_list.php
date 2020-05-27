<?php
session_start();

require_once("config/config.php");
require_once("model/Reserve.php");
require_once("model/Events.php");
// require_once("model/User.php");


try{
  $user = new Reserve($host,$dbname,$user,$pass);
  $user->connectDb();

// イベント参照
  if($_GET['id']){
    // print_r($_SESSION['User']);
    $result['User'] = $user->findById($_GET['id']);
  }

// 参加者リスト
  if($_GET['id']){
    $result = $user->findBuyReserve($_GET['id']);
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
<title>RESERVE_LIST</title>
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/reserve.css">
<!-- <link rel="stylesheet" type="text/css" href="css/user.css"> -->
<link rel="stylesheet" type="text/css" href="css/list.css">
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



    <p>参加者リスト</p>

    <div id="login">
      <from>
    <!-- イベント詳細 -->
        <table id="events">
          <tr class="title">
            <th class="event_id">イベントID</th>
            <th class="event_name">イベント名</th>
            <td class="cap">定員</td>
          </tr>
          <tr class="title">
            <td class="event_id"><?=$row['events_id'] ?></td>
            <td class="event_name"><?=$row['events_name'] ?></td>
            <td class="cap"><?= count($result); ?>/40</td>
          </tr>
        </table>
        <?php break;?>
      <?php endforeach; ?>
<?php
// var_dump();
 ?>
      <?php foreach($result as $row): ?>
    <!-- 参加者リスト -->
        <table id="user">
          <tr class="table">
            <th class="userid">予約ID</th>
            <th class="id">ID</th>
            <th class="">ユーザー名</th>
            <th class="">E-mail</th>
            <th class="name">氏名</th>
            <th class="gender">性別</th>
            <th class="age">年齢</th>
            <th class="">職業</th>
            <th class="comment">コメント</th>
          </tr>
    <!-- 参加者 -->
          <tr class="data">
            <td class=""><?= $row['id'] ?></td>
            <td class=""><?= $row['user_id'] ?></td>
            <td class=""><?= $row['user_name'] ?></td>
            <td class=""><?= $row['email'] ?></td>
            <td class=""><?= $row['name'] ?></td>
            <td class="">
              <?php if($row['gender'] == "1"): ?>
                男性
              <?php else: ?>
                女性
              <?php endif; ?>
            </td>
            <td class=""><?= $row['age'] ?></td>
            <td class=""><?= $row['job'] ?></td>
            <td class=""><?= $row['comment'] ?></td>
          </tr>
        </table>
      <?php endforeach; ?>

      </from>
    </div>


    <img class="line" src="img/happa.png" alt="横線">
  </div>

  <?php require("common/footer.php") ?>


</body>
</html>
