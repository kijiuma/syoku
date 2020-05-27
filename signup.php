<?php
session_start();



require_once("config/config.php");
require_once("model/User.php");
// require_once("mypage.php");

try{
  $user = new User($host,$dbname,$user,$pass);
  $user->connectDb();


  // バリデーション
  $message = $user->validate($_POST);

  // 参照処理
  $result = $user->findAll();

}
catch(PDOException $e){
  echo "エラー！:".$e->getMessage();
}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>SIGNUP</title>
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/signup.css">
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

  <div id="main">
    <!-- <img src="img/egg.jpg" alt="トップ画像"> -->
    <div class="img"></div>
    <!-- <a href="" class="logo"><img src="img/logo_w.png" alt="login"></a> -->
  </div>

  <div id="down"></div>

  <div id="home">
    <img class="line" src="img/happa.png" alt="横線">

    <p>下記の項目にご入力ください。<span>*</span>は入力必須</p>

        <div id="login">
          <form action="user.php" method="post" onSubmit="return check()">
            <table>
        <!-- user_name varchar(16) -->
              <tr class="user kata">
                <th>ユーザー名<span>*</span></th>
                <td>
                  <input type="text" name="user_name" value="<?php if(isset($_GET["fill_error"])) echo $_SESSION['user_name'] ?>">
                  <input type="hidden" name="id" value="<?php if(isset($result['User'])) echo $result['User']['id'] ?>">
                  <?php if(isset($_GET["fill_error"]) && empty($_SESSION['user_name'])){ echo "<p class='error'>".$message['user_name']."</p>"; }else{} ?>
                </td>
              </tr>
        <!-- password varchar(16) -->
              <tr class="pass kata">
                <th>パスワード<span>*</span></th>
                <td>
                  <input type="password" name="password" value="<?php if(isset($_GET["fill_error"])) echo $_SESSION['password'] ?>">
                  <?php if(isset($_GET["fill_error"]) && empty($_SESSION['password'])){ echo "<p class='error'>".$message['password']."</p>"; }else{} ?>
                </td>
              </tr>
        <!-- email varchar(32) -->
              <tr class="email kata">
                <th>E-mail<span>*</span></th>
                <td>
                  <input type="text" name="email" value="<?php if(isset($_GET["fill_error"])) echo $_SESSION['email'] ?>">
                  <?php if(isset($_GET["fill_error"]) && empty($_SESSION['email'])){ echo "<p class='error'>".$message['email']."</p>"; }else{} ?>
                </td>
              </tr>
        <!-- name varchar(16) -->
              <tr class="name kata">
                <th>氏名<span>*</span></th>
                <td>
                  <input type="text" name="name" value="<?php if(isset($_GET["fill_error"])) echo $_SESSION['name'] ?>">
                  <?php if(isset($_GET["fill_error"]) && empty($_SESSION['name'])){ echo "<p class='error'>".$message['name']."</p>"; }else{} ?>
                </td>
              </tr>
        <!-- gender smallint(1) -->
              <tr class="gen kata">
                <th>性別<span>*</span></th>
                <td class="gender">
                  <!-- <input type="radio" name="gender" value="1">男性
                  <input type="radio" name="gender" value="2">女性 -->
                  <input type="radio" name="gender" value="1"<?php if(isset($_SESSION['gender']) == "1"){echo 'checked';} ?> >男性
                  <input type="radio" name="gender" value="2"<?php if(isset($_SESSION['gender']) == "2"){echo 'checked';} ?> >女性
                  <!-- <input type="radio" name="gender" value="<?php if($_SESSION['gender'] == "1"){echo 'checked';} ?> " >男性
                  <input type="radio" name="gender" value="<?php if($_SESSION['gender'] == "2"){echo 'checked';} ?> " >女性 -->
                  <?php if(isset($_GET["fill_error"]) && empty($_SESSION['gender'])){ echo "<p class='error'>".$message['gender']."</p>"; }else{} ?>
                </td>
              </tr>
        <!-- age smallint(3) -->
              <tr class="age kata">
                <th>年齢<span>*</span></th>
                <td>
                  <select name="age">
<!-- 1 -->
                    <option value=""<?php echo 'selected' ?>>選択してください</option>
                    <option value="20"<?php if(isset($_SESSION['age']) == "20"){echo 'selected';} ?>>20</option>
                    <option value="21"<?php if(isset($_SESSION['age']) == "21"){echo 'selected';} ?>>21</option>
                    <option value="22"<?php if(isset($_SESSION['age']) == "22"){echo 'selected';} ?>>22</option>
                    <option value="23"<?php if(isset($_SESSION['age']) == "23"){echo 'selected';} ?>>23</option>
                    <option value="24"<?php if(isset($_SESSION['age']) == "24"){echo 'selected';} ?>>24</option>
                    <option value="25"<?php if(isset($_SESSION['age']) == "25"){echo 'selected';} ?>>25</option>
                    <option value="26"<?php if(isset($_SESSION['age']) == "26"){echo 'selected';} ?>>26</option>
                    <option value="27"<?php if(isset($_SESSION['age']) == "27"){echo 'selected';} ?>>27</option>
                    <option value="28"<?php if(isset($_SESSION['age']) == "28"){echo 'selected';} ?>>28</option>
                    <option value="29"<?php if(isset($_SESSION['age']) == "29"){echo 'selected';} ?>>29</option>
                    <option value="30"<?php if(isset($_SESSION['age']) == "30"){echo 'selected';} ?>>30</option>
                    <option value="31"<?php if(isset($_SESSION['age']) == "31"){echo 'selected';} ?>>31</option>
                    <option value="32"<?php if(isset($_SESSION['age']) == "32"){echo 'selected';} ?>>32</option>
                    <option value="33"<?php if(isset($_SESSION['age']) == "33"){echo 'selected';} ?>>33</option>
                    <option value="34"<?php if(isset($_SESSION['age']) == "34"){echo 'selected';} ?>>34</option>
                    <option value="35"<?php if(isset($_SESSION['age']) == "35"){echo 'selected';} ?>>35</option>
                    <option value="36"<?php if(isset($_SESSION['age']) == "36"){echo 'selected';} ?>>36</option>
                    <option value="37"<?php if(isset($_SESSION['age']) == "37"){echo 'selected';} ?>>37</option>
                    <option value="38"<?php if(isset($_SESSION['age']) == "38"){echo 'selected';} ?>>38</option>
                    <option value="39"<?php if(isset($_SESSION['age']) == "39"){echo 'selected';} ?>>39</option>
                    <option value="40"<?php if(isset($_SESSION['age']) == "40"){echo 'selected';} ?>>40</option>
                    <option value="41"<?php if(isset($_SESSION['age']) == "41"){echo 'selected';} ?>>41</option>
                    <option value="42"<?php if(isset($_SESSION['age']) == "42"){echo 'selected';} ?>>42</option>
                    <option value="43"<?php if(isset($_SESSION['age']) == "43"){echo 'selected';} ?>>43</option>
                    <option value="44"<?php if(isset($_SESSION['age']) == "44"){echo 'selected';} ?>>44</option>
                    <option value="45"<?php if(isset($_SESSION['age']) == "45"){echo 'selected';} ?>>45</option>
                    <option value="46"<?php if(isset($_SESSION['age']) == "46"){echo 'selected';} ?>>46</option>
                    <option value="47"<?php if(isset($_SESSION['age']) == "47"){echo 'selected';} ?>>47</option>
                    <option value="48"<?php if(isset($_SESSION['age'])== "48"){echo 'selected';} ?>>48</option>
                    <option value="49"<?php if(isset($_SESSION['age']) == "49"){echo 'selected';} ?>>49</option>
                    <option value="50"<?php if(isset($_SESSION['age']) == "50"){echo 'selected';} ?>>50</option>
<!-- 2 -->
                    <!-- <option value=""<?php echo 'selected' ?>>選択してください</option>
                    <option value="<?php if($_SESSION['age'] == "20"){echo 'selected';} ?>">20</option>
                    <option value="<?php if($_SESSION['age'] == "21"){echo 'selected';} ?>">21</option>
                    <option value="<?php if($_SESSION['age'] == "22"){echo 'selected';} ?>">22</option>
                    <option value="<?php if($_SESSION['age'] == "23"){echo 'selected';} ?>">23</option>
                    <option value="<?php if($_SESSION['age'] == "24"){echo 'selected';} ?>">24</option>
                    <option value="<?php if($_SESSION['age'] == "25"){echo 'selected';} ?>">25</option>
                    <option value="<?php if($_SESSION['age'] == "26"){echo 'selected';} ?>">26</option>
                    <option value="<?php if($_SESSION['age'] == "27"){echo 'selected';} ?>">27</option>
                    <option value="<?php if($_SESSION['age'] == "28"){echo 'selected';} ?>">28</option>
                    <option value="<?php if($_SESSION['age'] == "29"){echo 'selected';} ?>">29</option>
                    <option value="<?php if($_SESSION['age'] == "30"){echo 'selected';} ?>">30</option>
                    <option value="<?php if($_SESSION['age'] == "31"){echo 'selected';} ?>">31</option>
                    <option value="<?php if($_SESSION['age'] == "32"){echo 'selected';} ?>">32</option>
                    <option value="<?php if($_SESSION['age'] == "33"){echo 'selected';} ?>">33</option>
                    <option value="<?php if($_SESSION['age'] == "34"){echo 'selected';} ?>">34</option>
                    <option value="<?php if($_SESSION['age'] == "35"){echo 'selected';} ?>">35</option>
                    <option value="<?php if($_SESSION['age'] == "36"){echo 'selected';} ?>">36</option>
                    <option value="<?php if($_SESSION['age'] == "37"){echo 'selected';} ?>">37</option>
                    <option value="<?php if($_SESSION['age'] == "38"){echo 'selected';} ?>">38</option>
                    <option value="<?php if($_SESSION['age'] == "39"){echo 'selected';} ?>">39</option>
                    <option value="<?php if($_SESSION['age'] == "40"){echo 'selected';} ?>">40</option>
                    <option value="<?php if($_SESSION['age'] == "41"){echo 'selected';} ?>">41</option>
                    <option value="<?php if($_SESSION['age'] == "42"){echo 'selected';} ?>">42</option>
                    <option value="<?php if($_SESSION['age'] == "43"){echo 'selected';} ?>">43</option>
                    <option value="<?php if($_SESSION['age'] == "44"){echo 'selected';} ?>">44</option>
                    <option value="<?php if($_SESSION['age'] == "45"){echo 'selected';} ?>">45</option>
                    <option value="<?php if($_SESSION['age'] == "46"){echo 'selected';} ?>">46</option>
                    <option value="<?php if($_SESSION['age'] == "47"){echo 'selected';} ?>">47</option>
                    <option value="<?php if($_SESSION['age'] == "48"){echo 'selected';} ?>">48</option>
                    <option value="<?php if($_SESSION['age'] == "49"){echo 'selected';} ?>">49</option>
                    <option value="<?php if($_SESSION['age'] == "50"){echo 'selected';} ?>">50</option> -->
<!-- 3 -->
                    <!-- <option value="20" <?php if($_SESSION['age'] === "20"){echo 'selected';} ?>>20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                    <option value="32">32</option>
                    <option value="33">33</option>
                    <option value="34">34</option>
                    <option value="35">35</option>
                    <option value="36">36</option>
                    <option value="37">37</option>
                    <option value="38">38</option>
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                    <option value="44">44</option>
                    <option value="45">45</option>
                    <option value="46">46</option>
                    <option value="47">47</option>
                    <option value="48">48</option>
                    <option value="49">49</option>
                    <option value="50">50</option> -->
                  </select>　歳

                  <?php if(isset($_GET["fill_error"]) && empty($_SESSION['age'])){ echo "<p class='error'>".$message['age']."</p>"; }else{} ?>
                </td>
              </tr>
        <!-- Job text -->
              <tr class="job kata">
                <th>職業</th>
                <td>
                  <input type="text" name="job" value="<?php if(isset($_GET["fill_error"])) echo $_SESSION['job'] ?>">
                </td>
              </tr>
        <!-- comment text -->
              <tr class="comment kata">
                <th>コメント</th>
                <td>
                  <textarea type="text" name="comment"><?php if(isset($_GET["fill_error"])) echo $_SESSION['comment'] ?></textarea>
                </td>
              </tr>
            </table>
        <!-- sign up -->
              <div class="logo">
                <a class="name_logo">
                  <input type="submit" value="SIGN UP">
                </a>
              </div>
          </form>
        </div>



    <img class="line" src="img/happa.png" alt="横線">
  </div>

  <?php require("common/footer.php") ?>


</body>
</html>
