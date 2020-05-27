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



  if($_GET['id']){
    $result['User'] = $user->findBuyReserve($_GET['id']);
    // print_r($result);
    // $user->findBuyReserve($_POST);
  }


  if($_GET){
    // $result = $user->findBuyReserve($_GET['id']);
    // $_SESSION['User'];
  }

// イベント表示
  if(isset($_GET['id'])){
    $result['User'] = $user->findById($_GET['id']);
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

function check(){

	if(window.confirm('この内容でよろしいですか？')){ // 確認ダイアログを表示

		return true; // 「OK」時は送信を実行

	}
	else{ // 「キャンセル」時の処理

		window.alert('キャンセルされました'); // 警告ダイアログを表示
		return false; // 送信を中止

	}

}

</script>
</head>
<body>

  <?php require("common/header.php") ?>

  <!-- <div id="main">
    <img src="img/.jpg" alt="トップ画像">
    <a href="" class="logo"><img src="img/logo_w.png" alt="login"></a>
  </div>

  <div id="down"></div> -->

  <div id="home">
    <img class="line" src="img/happa.png" alt="横線">

    <div class="logo">
      <img class="name_logo" src="img/logo_rese2.png" alt="contact">
    </div>

    <?php foreach($result as $row): ?>
      <div id="events_info">
        <form id="reserve_form" method="POST" action="reserve_list.php">
          <div class="re_form">
            <img src="img/img.jpg" alt="イメージ画">
            <dl class="list top">
              <dt><span class="color1">イベント名</span></dt>
              <dd>
                <span class="color2">
                  <?=$row['events_name'] ?>
                </span>
              </dd>
            </dl>
            <dl class="list">
              <dt><span class="color1">開催日時</span></dt>
              <dd><span class="color2">
                <?php $schedule = $row['schedule']; echo date("Y年n月j日" ,strtotime(".$schedule.")) ?>
              </dd>
            </dl>
            <dl class="list">
              <dt><span class="color1">開催時間</span></dt>
              <dd>
                <span class="color2">
                  <?php $open = $row['open_time']; echo date("G:i" ,strtotime(".$open.")) ?>～<?php $close = $row['close_time']; echo date("G:i" ,strtotime(".$close.")) ?>
                </span>
              </dd>
            </dl>
            <dl class="list">
              <dt><span class="color1">場所</span></dt>
              <dd>
                <span class="color2">
                  <?=$row['place'] ?>
                </span>
              </dd>
            </dl>
            <dl class="list">
              <dt><span class="color1">定員</span></dt>
              <dd>
                <span class="color2">
                  <?=$row['capacity'] ?>名
                </span>
              </dd>
            </tr>
            <dl class="list bottom">
              <dt><span class="color1">料金</span></dt>
              <dd>
                <span class="color2">男女
                  <?=$row['price']?>円
                </span>
              </dd>
            </dl>
          </div>
        </form>
      </div>


    <p>下記項目をご確認の上［予約］をお願い致します。</p>

    <div id="login">
      <table>
        <from action="res_conplete.php?id=<?=$row['id']?>" method="POST">
    <!-- user_name varchar(16) -->
          <tr class="user kata">
            <th>ユーザー名</th>
            <td>
              <?=$_SESSION['User']['user_name'] ?>
              <input type="hidden" name="user_name" value="<?=$_SESSION['User']['user_name'] ?>">
            </td>
          </tr>
    <!-- password varchar(16) -->
          <!-- <tr class="pass kata">
            <th>パスワード<span>*</span></th>
            <td>
              <input>
            </td>
          </tr> -->
    <!-- email varchar(32) -->
          <tr class="email kata">
            <th>E-mail</th>
            <td>
              <?=$_SESSION['User']['email'] ?>
              <input type="hidden" name="email" value="<?=$_SESSION['User']['email'] ?>">
            </td>
          </tr>
    <!-- name varchar(16) -->
          <tr class="name kata">
            <th>氏名</th>
            <td>
              <?=$_SESSION['User']['name'] ?>
              <input type="hidden" name="name" value="<?=$_SESSION['User']['name'] ?>">
            </td>
          </tr>
    <!-- gender smallint(1) -->
          <tr class="gen kata">
            <th>性別</th>
            <td class="gender">
              <?php if($_SESSION['User']['gender'] == "1"): ?>
                男性
              <?php else: ?>
                女性
              <?php endif; ?>
              <input type="hidden" name="gender" value="<?=$_SESSION['User']['gender'] ?>">
            </td>
          </tr>
    <!-- age smallint(3) -->
          <tr class="age kata">
            <th>年齢</th>
            <td>
              <?=$_SESSION['User']['age'] ?>歳
              <input type="hidden" name="age" value="<?=$_SESSION['User']['age'] ?>">
            </td>
          </tr>
    <!-- Job text -->
          <!-- <tr class="job kata">
            <th>職業</th>
            <td>
              <?=$_SESSION['User']['job'] ?>
            </td>
          </tr> -->
    <!-- comment text -->
          <!-- <tr class="pass kata">
            <th>コメント</th>
            <td>
              <textarea type="text" name="comment"></textarea>
              <input type="hidden" name="comment" value="<?=$_SESSION['User']['comment'] ?>">
            </td>
          </tr> -->
        </from>
      </table>
    </div>

    <div class="logo">
      <a class="name_logo" href="res_conplete.php?id=<?=$row['id']?>" onclick="return check()">
      <input type="submit" value="RESERVED">
      </a>
    </div>

  <?php endforeach; ?>


    <img class="line" src="img/happa.png" alt="横線">
  </div>

  <?php require("common/footer.php") ?>


</body>
</html>
