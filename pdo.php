<?php

try {
$pdo = new PDO('mysql:host=localhost:3308;dbname=events_site;charset=utf8','root','root',
array(PDO::ATTR_EMULATE_PREPARES => false));
} catch (PDOException $e) {
 exit('データベース接続失敗。'.$e->getMessage());
}

$sql = "SELECT * FROM contact";
$stmt = $pdo->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>pdo接続テスト</title>
<!-- <link rel="stylesheet" type="text/css" href="css/base.css"> -->
<link rel="stylesheet" type="text/css" href="css/contact.css">
</head>
<body>
  <section>
    <h1>データ送信一覧</h2>
    <table>
      <tr>
        <th>ID</th>
        <th>名前</th>
        <th>カタカナ</th>
        <th>電話番号</th>
        <th>メールアドレス</th>
        <th>お問い合わせ</th>
      </tr>
      <?php foreach ($stmt as $row): ?>
      <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['kana'] ?></td>
        <td><?php echo $row['tell'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['inquiry'] ?></td>
      </tr>
      <?php endforeach;?>
    </table>
  </section>

</body>
</html>
