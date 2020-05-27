<?php
require_once("DB.php");

class Events extends DB {

  //参照 select
  public function findAll(){
    $sql = 'SELECT * FROM events';
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

  // //参照（購入履歴）select
  // public function findBuyEvent($id){
  //   $sql = "SELECT";
  //   $sql .= "events_name";
  //   $sql .= "img";
  //   $sql .= "place";
  //   $sql .= "schedule";
  //   $sql .= "open_time";
  //   $sql .= "capacity";
  //   $sql .= "price";
  //   $sql .= "WHERE id = :id";
  //   $stmt = $this->connect->prepare($sql);
  //   $params = array(':id'=>$id);
  //   $stmt->execute($params);
  //   $result = $stmt->fetchAll();
  //   return $result;
  // }


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
