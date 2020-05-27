<?php
session_start();

require_once("config/config.php");
// require_once("model/User.php");
require_once("model/Staff.php");

try{
  $user = new Staff($host,$dbname,$user,$pass);
  $user->connectDb();

  if($_GET){
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
<title>STAFF</title>
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/staff.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script>
</script>
</head>
<body>

  <?php require("common/header.php") ?>

  <div id="main">
    <div class="img"></div>
    <!-- <img src="img/home_staff.jpg" alt="トップ画像"> -->
    <a href="" class="logo">
      <img src="img/staff2.png" alt="login">
    </a>
  </div>

  <div id="down"></div>

  <div id="home">
    <img class="line2 " src="img/happa.png" alt="横線">
    <!-- logo -->
    <div class="logo">
      <img class="name_logo" src="img/staff4.png" alt="contact">
    </div>
    <!-- STAFF LIST-->
      <?php foreach($result as $row): ?>
        <div id="staff_list">
          <div class="staff_box">
            <div class="staff_name">
              <a><?=$row['title'] ?></a>
            </div>
            <div class="staff_img">
              <a><img src="<?=$row['photo'] ?>" alt="イメージ画"></a>
            </div>
            <div class="staff_s">
              <table>
                <p>
                  <a>【 寿司職人 】</a>
                </p>
                <tr>
                  <th>〔 ニックネーム 〕</th>
                  <td><?=$row['nickname'] ?></td>
                </tr>
                <tr>
                  <th>〔 趣味 〕</th>
                  <td><?=$row['hobby'] ?></td>
                </tr>
                <tr>
                  <th>〔 出身地 〕</th>
                  <td><?=$row['from'] ?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    <img class="line2" src="img/happa.png" alt="横線">
  </div>

  <?php require("common/footer.php") ?>


</body>
</html>
