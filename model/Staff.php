<?php
require_once("DB.php");

class Staff extends DB {

  //ログイン
  // public function login($arr){
  //   $sql = 'SELECT * FROM user WHERE user_name = :user_name AND password = :password';
  //   $stmt = $this->connect->prepare($sql);
  //   $params = array(':user_name'=>$arr['user_name'],':password'=>$arr['password']);
  //   $stmt->execute($params);
  //   // $result = $stmt->rowCount();
  //   $result = $stmt->fetch();
  //   return $result;
  // }

  //参照 select
    public function findAll(){
      $sql = 'SELECT * FROM staff';
      $stmt = $this->connect->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
  }
    //
    // //参照（条件付き）select
    public function findById($id){
      $sql = 'SELECT * FROM staff WHERE id = :id';
      $stmt = $this->connect->prepare($sql);
      $params = array(':id'=>$id);
      $stmt->execute($params);
      $result = $stmt->fetch();
      return $result;
    }


  //ユーザ登録 insert
  // public function add($arr){
  //   $sql = "INSERT INTO staff(user_name,password,email,name,gender,age,job,comment,role,created)VALUES(:user_name,:password,:email,:name,:gender,:age,:job,:comment,:role,:created)";
  //   $stmt = $this->connect->prepare($sql);
  //   $params = array(
  //     ':user_name'=>$arr['user_name'],
  //     ':password'=>$arr['password'], //md5()で囲うとセキュリティ強化
  //     ':email'=>$arr['email'],
  //     ':name'=>$arr['name'],
  //     ':gender'=>$arr['gender'],
  //     ':age'=>$arr['age'],
  //     ':job'=>$arr['job'],
  //     ':comment'=>$arr['comment'],
  //     ':role'=>0,
  //     ':created'=>date('Y-m-d H:i:s')
  //   );
  //   $stmt->execute($params);
  // }

  // 編集 update
  // public function edit($arr){
  //   $sql = "UPDATE user SET user_name = :user_name,password = :password,email = :email,name = :name,gender = :gender,age = :age,job = :job,comment = :comment,updated = :updated WHERE id = :id";
  //   $stmt = $this->connect->prepare($sql);
  //   $params = array(
  //     ':id'=>$arr['id'],
  //     ':user_name'=>$arr['user_name'],
  //     ':password'=>$arr['password'], //md5()で囲うとセキュリティ強化
  //     ':email'=>$arr['email'],
  //     ':name'=>$arr['name'],
  //     ':gender'=>$arr['gender'],
  //     ':age'=>$arr['age'],
  //     ':job'=>$arr['job'],
  //     ':comment'=>$arr['comment'],
  //     ':updated'=>date('Y-m-d H:i:s')
  //   );
  //   $stmt->execute($params);
  // }

  // 削除 delete
  // public function delete($id = null){
  //   if(isset($id)){
  //     $sql = "DELETE FROM user WHERE id = :id";
  //     $stmt = $this->connect->prepare($sql);
  //     $params = array(":id"=>$id);
  //     $stmt->execute($params);
  //   }
  // }


  //入力チェック validate
  // public function validate($arr){
  //   $message = array();
  //   //ユーザ名
  //   if(empty($arr['user_name'])){
  //     $message['user_name'] = 'ユーザ名を入力してください';
  //   }
  //   //パスワード
  //   if(empty($arr['password'])){
  //     $message['password'] = 'パスワードを入力してください';
  //   }
  //   //メールアドレス
  //   if(empty($arr['email'])){
  //     $message['email'] = 'メールアドレスを入力してください';
  //   }
  //   else{
  //   // メールアドレス
  //     if(!filter_var($arr['email'],FILTER_VALIDATE_EMAIL)){
  //       $message['email'] = 'メールアドレスを正しく入力してください';
  //     }
  //   }
  //   //氏名
  //   if(empty($arr['name'])){
  //     $message['name'] = '氏名を入力してください';
  //   }
  //   //性別
  //   if(empty($arr['gender'])){
  //     $message['gender'] = '性別を選択してください';
  //   }
  //   //年齢
  //   if(empty($arr['age'])){
  //     $message['age'] = '年齢を選択してください';
  //   }
  //   return $message;
  // }


}

// バリデーションのリダイレクト処理
  // $url = '/self_madePHP/edit.php?edit=';



?>
