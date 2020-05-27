<?php
require_once("DB.php");

class Reserve extends DB {

  //ログイン
  public function login($arr){
    $sql = 'SELECT * FROM user WHERE user_name = :user_name AND password = :password';
    $stmt = $this->connect->prepare($sql);
    $params = array(':user_name'=>$arr['user_name'],':password'=>$arr['password']);
    $stmt->execute($params);
    // $result = $stmt->rowCount();
    $result = $stmt->fetch();
    return $result;
  }

  //参照 select
  public function findAll(){
    $sql = 'SELECT * FROM user';
    $stmt = $this->connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
  }

  //参照（条件付き）select
  public function findById($id){
    $sql = 'SELECT * FROM events WHERE id = :id';
    $stmt = $this->connect->prepare($sql);
    $params = array(':id'=>$id);
    $stmt->execute($params);
    $result = $stmt->fetch();
    return $result;
  }

  // 予約登録 insert
  public function eventsReserve($arr){
    $sql = "INSERT INTO reserve(user_id,events_id,created)VALUES(:user_id,:events_id,:created)";
    $stmt = $this->connect->prepare($sql);
    $params = array(
      ':user_id'=>$_SESSION['User']['id'],
      ':events_id'=>$_GET['id'],
      ':created'=>date('Y-m-d H:i:s')
    );
    $stmt->execute($params);
  }

// サンプル
  // public function eventsReserve($arr){
  //   $sql = "INSERT ALL
  //   INTO user(user_name,password,email,name,age,gender,job,comment)VALUES(:user_name,:password,:email,:name,:age,:gender,:job,:comment)
  //   INTO events(events_id,events_name)VALUES(:events_id,:events_name)
  //   SELECT * FROM DUAL;";
  //   $stmt = $this->connect->prepare($sql);
  //   $params = array(
  //     // ':user_id'=>$arr['user_id'],
  //     ':user_name'=>$arr['user_name'],
  //     ':password'=>$arr['password'],
  //     ':email'=>$arr['email'],
  //     ':name'=>$arr['name'],
  //     ':age'=>$arr['age'],
  //     ':gender'=>$arr['gender'],
  //     ':job'=>$arr['job'],
  //     ':comment'=>$arr['comment'],
  //     ':events_id'=>$arr['events_id'],
  //     ':events_name'=>$arr['events_name'],
  //     ':created'=>date('Y-m-d H:i:s'),
  //   );
  //   print_r($sql);
  //   $stmt->execute($params);
  // }

  //参照（参加者リスト）select
  public function findBuyReserve($id){
    $sql = "SELECT ";
    $sql .= "user.id as user_id,";
    $sql .= "user.user_name,";
    $sql .= "user.password,";
    $sql .= "user.email,";
    $sql .= "user.name,";
    $sql .= "user.age,";
    $sql .= "user.gender,";
    $sql .= "user.job,";
    $sql .= "user.comment,";
    $sql .= "events.id as events_id,";
    $sql .= "events.events_name,";
    $sql .= "events.place,";
    $sql .= "events.price,";
    $sql .= "events.schedule,";
    $sql .= "events.open_time,";
    $sql .= "events.close_time,";
    $sql .= "events.capacity,";
    $sql .= "events.img,";
    $sql .= "reserve.created,";
    $sql .= "reserve.id ";
    $sql .= "FROM reserve ";
    $sql .= "JOIN user ON user.id = reserve.user_id ";
    $sql .= "JOIN events ON events.id = reserve.events_id ";
    $sql .= "WHERE events.id = :id";
    // print_r($sql);
    $stmt = $this->connect->prepare($sql);
    // var_dump();
    // exit;
    $params = array(':id'=>$id);
    $stmt->execute($params);
    $result = $stmt->fetchAll();
    return $result;
  }


   //イベント登録 insert
  // public function EventsDetails($arr){
  //   $sql = "INSERT INTO events(events_name,schedule,place,price,open_time,capacity)VALUES(:events_name,:schedule,:place,:price,:open_time,:capacity)";
  //   $stmt = $this->connect->prepare($sql);
  //   $params = array(
  //     ':events_name'=>$arr['events_name'],
  //     ':schedule'=>date('Y:m:d'),
  //     ':place'=>$arr['place'],//場所
  //     ':price'=>$arr['price'],//料金
  //     ':open_time'=>date('Y-m-d H:i:s'),
  //     ':capacity'=>$arr['capacity'],
  //   );
  //   $stmt->execute($params);
  // }

}
?>
