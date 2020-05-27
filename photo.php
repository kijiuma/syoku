<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PHOTO</title>
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/photo.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script>
$(function(){
  // サムネイル
  $("#thumb_prev").on("click",function(){
    $("#thumb ul").animate({
      "margin-left":"0px"
    })
  });
  $("#thumb_next").on("click",function(){
    $("#thumb ul").animate({
      "margin-left":"-930px"
    })
  });

  $("#thumb_next2").on("click",function(){
    $("#thumb ul").animate({
      "margin-left":"0px"
    })
  });
  $("#thumb_prev2").on("click",function(){
    $("#thumb ul").animate({
      "margin-left":"-930px"
    })
  });
  // 写真と連動
  $("#photo_prev").on("click",function(){
    var num =$("#photo ul").data("id") - 1;//id-1
    if(num !=	-1){//-1に等しくない時、下記を処理(-1に等しい時、下記の処理をしない)
      $("#photo ul").animate({//左にmarjin(-780*num)px
        "margin-left":(-780 * num) + "px"
      });
      $("#photo ul").data("id",num);//data-idにnumを代入
    }
  });
  $("#photo_next").on("click",function(){
    var num =$("#photo ul").data("id") + 1;//num＝id+1
    if(num !=	10){//6に等しくない時、下記を処理(6に等しい時、下記の処理をしない)
      $("#photo ul").animate({//左にmarjin(-780*num)px
        "margin-left":(-780 * num) + "px"
      });
      $("#photo ul").data("id",num);//data-idにnumを代入
    }
  });
  // 写真スライド
  $("#thumb ul li").on("click",function(){//オンクリック処理
    var num = $("#thumb ul li").index(this)+ 1;//num＝index番号(これ)+1
    for(var i=0;i<10;i++){//ループ処理　i=0　で　iが6になるまでiに++(+1)
    $("#photo ul li").eq(i).children("img").attr("src","img/food"+num+"/syoku"+(i+1)+".jpg");
    //.eq(インデックス番号).children(子要素を指す).attr(HTMLの指定の場所に置換)
		$("#photo ul").css("margin-left", "0px").data("id",0);//CSSのmarginを0pxに戻す,data-idを0に戻す
    }

    $("#description").css("margin-left",(num - 1) * -800 + "px");
    //指定したCSSのmarginを(num-1)*-800px
  });

});
</script>
</head>
<body>

  <?php require("common/header.php") ?>

  <div id="main">
    <!-- <img src="img/egg.jpg" alt="トップ画像"> -->
    <div class="img"></div>
    <a href="" class="logo">
      <img src="img/logo_photo.png" alt="login">
    </a>
  </div>

  <div id="down"></div>

  <div id="home">
    <img class="line" src="img/happa.png" alt="横線">

    <div id="photo_frame">

    <div class="logo">
      <img class="name_logo" src="img/logo_photo2.png" alt="photo">
    </div>

    <img class="line3" src="img/happa.png" alt="横線">

<!-- PHOTO -->
      <div id="thumb_area" class="clearfix">
        <div id="thumb_prev">
          <img src="img/thumb_prev.png">
        </div>
        <div id="thumb">
          <ul class="clearfix">
            <li>
              <img src="img/food1/syoku1.jpg" alt=食事>
            </li>
            <li>
              <img src="img/food2/syoku1.jpg" alt=食事>
            </li>
            <li>
              <img src="img/food3/syoku1.jpg" alt=食事>
            </li>
            <li>
              <img src="img/food4/syoku1.jpg" alt=食事>
            </li>
            <li>
              <img src="img/food5/syoku1.jpg" alt=食事>
            </li>
            <li>
              <img src="img/food6/syoku1.jpg" alt=食事>
            </li>
          </ul>
        </div>
        <div id="thumb_next">
          <img src="img/thumb_next.png">
        </div>
      </div>

      <div id="thumb_next2">
        <img src="img/prev.png">
      </div>
      <div id="thumb_prev2">
        <img src="img/next.png">
      </div>

      <img class="line3" src="img/happa.png" alt="横線">

      <div id="photo_area" class="clearfix">

        <div id="photo_prev">
          <img src="img/photo_prev.png">
        </div>

        <div id="photo" >
         <ul class="clearfix" data-id="0">
           <li>
             <img src="img/food1/syoku1.jpg" alt=食事>
           </li>
           <li>
             <img src="img/food1/syoku2.jpg" alt=食事>
           </li>
           <li>
             <img src="img/food1/syoku3.jpg" alt=食事>
           </li>
           <li>
             <img src="img/food1/syoku4.jpg" alt=食事>
           </li>
           <li>
             <img src="img/food1/syoku5.jpg" alt=食事>
           </li>
           <li>
             <img src="img/food1/syoku6.jpg" alt=食事>
           </li>
           <li>
             <img src="img/food1/syoku7.jpg" alt=食事>
           </li>
           <li>
             <img src="img/food1/syoku8.jpg" alt=食事>
           </li>
           <li>
             <img src="img/food1/syoku9.jpg" alt=食事>
           </li>
           <li>
             <img src="img/food1/syoku10.jpg" alt=食事>
           </li>
         </ul>
        </div>
        <div id="photo_next">
          <img src="img/photo_next.png">
        </div>
      </div>

      <div id="photo_prev2">
        <img src="img/prev.png">
      </div>
      <div id="photo_next2">
        <img src="img/next.png">
      </div>

      <div class="home_botton">
        <p class="kata"><a class="res" href="index.php">HOME</a></p>
      </div>

  </div>


    <img class="line" src="img/happa.png" alt="横線">
  </div>

  <?php require("common/footer.php") ?>


</body>
</html>
