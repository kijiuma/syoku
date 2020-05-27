<?php

edit.php
// 編集項目をセット
// if(isset($_GET['edit'])){
// 編集処理
  // if($_POST){//通常の編集処理
  //   $message = $user->validate($_POST);
    // if(empty($message['user_name']) && empty($message['password']) && empty($message['email']) && empty($message['name']) && empty($message['gender'])&& empty($message['age'])){
// 上記項目を入力したら下記の編集処理実行
      // $user->edit($_POST);
    // }
    // else{//リダイレクト後の参照処理
    //   $_SESSION = $user->edit($_POST);
    //   header('Location:'.$url.$_POST['id']);
    //   exit;
    // if(empty($message['user_name']) or empty($message['password']) or empty($message['email']) or empty($message['name']) or empty($message['gender'])or empty($message['age'])){
    // var_dump($result['User'] = $user->findById($_GET['edit']));
    // if(isset($_GET['edit'])){
    //   print_r($_POST);
      // }
    // }
    // 参照処理
        // $result = $user->findAll();
      // }
  // }

sign.php
// 参照処理
// $result['User'] = $user->findById($_GET['edit']);
// if(isset($_GET['edit'])){
// 編集処理
  // if($_POST){
  //   $message = $user->validate($_POST);
  //   if(empty($message['user_name']) && empty($message['password']) && empty($message['email']) && empty($message['name']) && empty($message['gender'])&& empty($message['age'])){
  //   }
  // }


mypage.php

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 <meta charset="UTF-8">
 <title>MY PAGE</title>
 <link rel="stylesheet" type="text/css" href="css/base.css">
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
       <img class="name_logo" src="img/logo_mypage2.png" alt="contact">
     </div>

     <div id="login">
       <div class="ser_in">
         <div class="in">
           <a href="login.php"><img src ="img/logo_login2.png"></a>
         </div>
       </div>
       <div class="ser_in">
         <div class="in">
           <a href="signup.php"><img src ="img/signup2.png"></a>
         </div>
       </div>
     </div>

     <img class="line" src="img/happa.png" alt="横線">
   </div>

   <?php require("common/footer.php") ?>


 </body>
 </html>
