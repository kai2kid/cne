<?php
class model_quotation extends basicModel {
  protected $tb_name = "quotation";
  private $id = "";
  protected $data;
  public $days, $detail;
  public function __construct($id = "") {
    $this->db_connect();
    if ($id != "") $this->id = $id;
    $this->initdata();
  }
  public function initdata() {
    if ($this->id != "") {
      $qry = "
        SELECT *
        FROM ".$this->tb_name."
        WHERE quotation_code = '".$this->id."'
      ";
      $this->data = $this->query_one($qry);
      
      
      $qry = "
        SELECT *
        FROM quotation_day d
        LEFT JOIN route rt ON d.route_code = rt.route_code
        WHERE d.quotation_code = '".$this->id."'
      ";
      $rows = $this->query($qry);
      
      foreach ($rows as $row) {
        $this->days[$row['qday_day']] = $row;
      }
      
      //rundown
      $qry = "
        SELECT *
        FROM quotation_day d
        LEFT JOIN quotation_detail r ON d.qday_code = r.qday_code
        WHERE d.quotation_code = '".$this->id."'
        ORDER BY r.qdetail_time_start ASC
      ";
      $rows = $this->query($qry);
      foreach ($rows as $row) {
        $this->detail['rundown'][$row['qday_day']][] = $row;
      }
      
      //Hotel
      $qry = "
        SELECT *
        FROM quotation_day d
        LEFT JOIN qday_hotel q ON d.qday_code = q.qday_code
        LEFT JOIN hotel_room r ON r.room_code = q.room_code
        LEFT JOIN hotel h ON q.hotel_code = h.hotel_code
        WHERE d.quotation_code = '".$this->id."'
        ORDER BY d.qday_day ASC, h.hotel_level DESC
      ";
      $rows = $this->query($qry);
      foreach ($rows as $row) {
        $row['hotel_price_room_standard'] = $row['room_group_weekday_low'];
        $row['hotel_price_breakfast_standard'] = $row['room_group_breakfast'];
        $this->detail['hotel'][$row['qday_day']][$row['qday_room_level']] = $row;
      }
      
      //Restaurant
      $qry = "
        SELECT d.*, q.*, r.restaurant_name, m.*
        FROM quotation_day d
        LEFT JOIN qday_restaurant q ON d.qday_code = q.qday_code
        LEFT JOIN restaurant_menu m ON m.menu_code = q.menu_code
        LEFT JOIN restaurant r ON r.restaurant_code = m.restaurant_code
        WHERE d.quotation_code = '".$this->id."'
        ORDER BY d.qday_day ASC, q.qday_rest_type ASC
      ";
      $rows = $this->query($qry);
      foreach ($rows as $row) {
        $this->detail['restaurant'][$row['qday_day']][$row['qday_rest_type']] = $row;
      }
      $this->detail['restaurant']['restaurant_price_low'] = 5000;
      $this->detail['restaurant']['restaurant_price_standard'] = 10000;
      $this->detail['restaurant']['restaurant_price_upgrade'] = 15000;
      
      //Transport
      $qry = "
        SELECT *
        FROM quotation_day d
        LEFT JOIN qday_transport q ON d.qday_code = q.qday_code
        LEFT JOIN transport t ON t.transport_code = q.transport_code
        WHERE d.quotation_code = '".$this->id."'
        ORDER BY d.qday_day ASC, t.transport_name ASC
      ";
      $rows = $this->query($qry);
      foreach ($rows as $row) {
        $this->detail['transport'][$row['qday_day']][] = $row;
      }
      
      //Entrance
      $qry = "
        SELECT *
        FROM quotation_day d
        LEFT JOIN qday_entrance q ON d.qday_code = q.qday_code
        LEFT JOIN entrance e ON e.entrance_code = q.entrance_code
        WHERE d.quotation_code = '".$this->id."'
        ORDER BY d.qday_day ASC, e.entrance_name ASC
      ";
      $rows = $this->query($qry);
      foreach ($rows as $row) {
        $this->detail['entrance'][$row['qday_day']][] = $row;
      }
      
      
      
    } else {
      $qry = "
        SELECT *
        FROM ".$this->tb_name."        
        ";
      $this->data = $this->query($qry);
    }
  }
  public function autogenerate() {
    $qry = "SELECT MAX(RIGHT(quotation_code,4)) max_id FROM quotation WHERE quotation_code LIKE 'Q%'";
    $row = $this->query_one($qry);
    $id = "Q" . str_pad($row["max_id"]+1,4,"0",STR_PAD_LEFT) ;
    return $id;
  }
  public function directory($param="") {
    return $this->data;
  }
  public function inserting($param) {
    $param['pic_code'] = $this->autogenerate();
    $param['pic_updated'] = date("Y-m-d H:i:s");
    $param['pic_updated_name'] = date("Y-m-d");
    $ret = $this->insert($this->tb_name,$param);
    return $ret;
  }
  public function updating($param) {
    $param['pic_updated'] = date("Y-m-d H:i:s");
    $param['pic_updated_name'] = date("Y-m-d");
    $ret = $this->update($this->tb_name,$param,"pic_type_code = '" . $this->id . "'");
    return $ret;
  }
  public function deleting() {
    $ret = $this->update($this->tb_name,array("pic_status"=>"0"),"pic_type_code = '" . $this->id."'");
    return $ret;
  }
  public function modifyHeader($data) {
    $ret = 1;
    $update["quotation_name"] = $data["quotation_name"];
    $update["quotation_days"] = $data["quotation_day"];
    if (!$this->update("quotation",$update,"quotation_code = '".$data['quotation_code']."'")) $ret = 0;
    return $ret;
  }
  public function modifyTransport($data) {
    $ret = 1;
    for ($day = 1 ; $day <= $this->quotation_days ; $day++) {
      $update["route_code"] = $data["route_$day"];
      if (!$this->update("quotation_day",$update,"quotation_code = '".$data['quotation_code']."' AND qday_day = '$day'")) $ret = 0;
    }
    return $ret;
  }
  public function modifyHotel($data) {
    $ret = 1;
    /*/
    for ($day = 1 ; $day <= $this->quotation_days ; $day++) {
      $update["route_code"] = $data["route_$day"];
      if (!$this->update("quotation_day",$update,"quotation_code = '".$data['quotation_code']."' AND qday_day = '$day'")) $ret = 0;
    }
    /*/
    return $ret;
  }
  public function modifyEntrance($data) {
    $ret = 1;
    /*/
    for ($day = 1 ; $day <= $this->quotation_days ; $day++) {
      $update["route_code"] = $data["route_$day"];
      if (!$this->update("quotation_day",$update,"quotation_code = '".$data['quotation_code']."' AND qday_day = '$day'")) $ret = 0;
    }
    /*/
    return $ret;
  }
  public function modifyMeal($data) {
    $ret = 1;
    /*/
    for ($day = 1 ; $day <= $this->quotation_days ; $day++) {
      $update["route_code"] = $data["route_$day"];
      if (!$this->update("quotation_day",$update,"quotation_code = '".$data['quotation_code']."' AND qday_day = '$day'")) $ret = 0;
    }
    /*/
    return $ret;
  }
  public function modifyRundown($data) {
    $ret = 1;
    /*/
    for ($day = 1 ; $day <= $this->quotation_days ; $day++) {
      $update["route_code"] = $data["route_$day"];
      if (!$this->update("quotation_day",$update,"quotation_code = '".$data['quotation_code']."' AND qday_day = '$day'")) $ret = 0;
    }
    /*/
    return $ret;
  }
}
?>
