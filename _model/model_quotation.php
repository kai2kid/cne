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
      $this->detail["rate_USD"] = $this->data['quotation_rate'];
      
      
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
        SELECT d.route_code, qday_day,r.qdetail_title,r.qdetail_time_start,r.qdetail_time_end,e.entrance_name
        FROM quotation_day d
        LEFT JOIN quotation_detail r ON d.qday_code = r.qday_code
        LEFT JOIN entrance e ON r.qdetail_title = e.entrance_code
        WHERE d.quotation_code = '".$this->id."'
        ORDER BY d.qday_day ASC, r.qdetail_time_start ASC
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
        LEFT JOIN hotel_room r ON r.hotel_code = q.hotel_code
        LEFT JOIN hotel h ON q.hotel_code = h.hotel_code
        WHERE d.quotation_code = '".$this->id."'
        ORDER BY d.qday_day ASC, h.hotel_level DESC
      ";
      $rows = $this->query($qry);
      foreach ($rows as $row) {
        $row['hotel_price_room_standard'] = $row['room_group_weekday_low'];
        $row['hotel_price_breakfast_standard'] = $row['room_group_breakfast'];
        $this->detail['hotel'][$row['qday_room_level']][$row['qday_day']] = $row;
      }
      
      //Restaurant
      $qry = "
        SELECT d.*, q.*, r.restaurant_code, r.restaurant_name, r.restaurant_location, q.menu_code, m.menu_name, m.menu_price_lunch, m.menu_price_dinner
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
      
//      $this->detail['restaurant']['restaurant_price_low'] = 5000;
//      $this->detail['restaurant']['restaurant_price_standard'] = 10000;
//      $this->detail['restaurant']['restaurant_price_upgrade'] = 15000;
      
      //Route
      $qry = "
        SELECT *
        FROM quotation_day d
        LEFT JOIN qday_transport q ON d.qday_code = q.qday_code
        LEFT JOIN route r ON r.route_code = d.route_code
        WHERE d.quotation_code = '".$this->id."'
        ORDER BY d.qday_day ASC
      ";
      $rows = $this->query($qry);
      foreach ($rows as $row) {
        $this->detail['transport'][$row['qday_day']][] = $row;
      }
      
      //Entrance
      $qry = "
        SELECT d.qday_day,e.*
        FROM quotation_day d
        LEFT JOIN quotation_detail r ON d.qday_code = r.qday_code
        LEFT JOIN entrance e ON r.qdetail_title = e.entrance_code
        WHERE d.quotation_code = '".$this->id."' AND e.entrance_code != ''
        ORDER BY d.qday_day ASC, r.qdetail_time_start ASC
      ";
      
      $rows = $this->query($qry);
      foreach ($rows as $row) {
        $this->detail['entrance'][$row['qday_day']][] = $row;
      }
      
      //Other
      $qry = "
        SELECT *
        FROM qday_other d
        WHERE d.quotation_code = '".$this->id."'
      ";
      $rows = $this->query($qry);
      $ctr = 0;
      foreach ($rows as $row) {
        $this->detail['other'][] = $row;
        $ctr++;
      }
      $this->detail['other_count'] = $ctr;
      if ($ctr < 8) {
        for ($i=$ctr+1 ; $i <= 8 ; $i++) {
          $this->detail['other'][$i]['other_text'] = "";
          $this->detail['other'][$i]['other_price'] = "0";
          $this->detail['other'][$i]['other_satuan'] = "0";
          $this->detail['other'][$i]['other_satuan_text'] = "";
          $this->detail['other'][$i]['other_times'] = "0";
          $this->detail['other'][$i]['other_times_text'] = "";
          $this->detail['other'][$i]['other_subtotal'] = "0";
        }
      }
      
      
      //Calc

      $this->detail['calc']['pax_custom'] = 10;
      
      $this->detail['calc']['maxmin_5'] = 150;
      $this->detail['calc']['range_5'] = 15;
      $this->detail['calc']['sglspl_5'] = 20;
       
      $this->detail['calc']['maxmin_4'] = 130;
      $this->detail['calc']['range_4'] = 15;
      $this->detail['calc']['sglspl_4'] = 20;
       
      $this->detail['calc']['maxmin_3'] = 100;
      $this->detail['calc']['range_3'] = 15;
      $this->detail['calc']['sglspl_3'] = 20;       
      
      $this->detail['calc']['price_decided_5_1'] = "";
      $this->detail['calc']['price_decided_5_2'] = "";
      $this->detail['calc']['price_decided_5_3'] = "";
      $this->detail['calc']['price_decided_5_4'] = "";
      $this->detail['calc']['price_decided_5_5'] = "";
      $this->detail['calc']['price_decided_5_6'] = "";
      $this->detail['calc']['price_decided_5_7'] = "";
      
      $this->detail['calc']['price_decided_4_1'] = "";
      $this->detail['calc']['price_decided_4_2'] = "";
      $this->detail['calc']['price_decided_4_3'] = "";
      $this->detail['calc']['price_decided_4_4'] = "";
      $this->detail['calc']['price_decided_4_5'] = "";
      $this->detail['calc']['price_decided_4_6'] = "";
      $this->detail['calc']['price_decided_4_7'] = "";
      
      $this->detail['calc']['price_decided_3_1'] = "";
      $this->detail['calc']['price_decided_3_2'] = "";
      $this->detail['calc']['price_decided_3_3'] = "";
      $this->detail['calc']['price_decided_3_4'] = "";
      $this->detail['calc']['price_decided_3_5'] = "";
      $this->detail['calc']['price_decided_3_6'] = "";
      $this->detail['calc']['price_decided_3_7'] = "";
      
      $this->detail['calc']['rate_usd'] = $this->detail["rate_USD"];
      $this->detail['calc']['pax_cnb'] = 0;
      $this->detail['calc']['pax_ceb'] = 0;
      
      $qry = "
        SELECT qcalc_key, qcalc_value
        FROM quotation_calc
        WHERE quotation_code = '".$this->id."' AND qcalc_key IS NOT null
      ";
      
      $rows = $this->query($qry);
      foreach ($rows as $row) {
        $this->detail['calc'][$row["qcalc_key"]] = $row["qcalc_value"];
      }
      
    } else {
      $qry = "
        SELECT *
        FROM ".$this->tb_name."        
        WHERE quotation_status > 0
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
    $ret = $this->update($this->tb_name,array("quotation_status"=>"0"),"quotation_code = '" . $this->id."'");
    return $ret;
  }
  public function modifyHeader($data) {
    $ret = 1;
    $code = $data["quotation_code"];
    $table = "quotation";
    $where = "quotation_code = '".$code."'";
    if ($this->delete($table,$where)) {
      $insert["quotation_code"] = $code;
      $insert["quotation_name"] = $data["quotation_name"];
      $insert["quotation_days"] = $data["quotation_day"];
      $insert["quotation_status"] = $data["quotation_day"];
      $insert["staff_code"] = $_SESSION[_SESSION_USER];
      if (!$this->insert($table,$insert)) $ret = 0;
    } else {
      $ret = 0;
    }
    return $ret;
  }
  public function modifyRoute($data) {
    $ret = 1;
    $table = "quotation_day";
    $table2 = "quotation_detail";
    for ($day = 1 ; $day <= $this->quotation_days ; $day++) {
      $code = $data['quotation_code'].str_pad($day,2,"0",STR_PAD_LEFT);
      $where = "qday_code = '".$code."'";
      $insert["quotation_code"] = $data['quotation_code'];
      $insert["qday_code"] = $code;      
      if ($this->delete($table,$where)) {
        $insert["route_code"] = $data["route_$day"];
        $insert["qday_day"] = $day;
        $insert["qday_location_start"] = "";
        $insert["qday_location_end"] = "";
        $insert["qday_route"] = "";
        if (!$this->insert($table,$insert)) $ret = 0;                
      } else {
        $ret = 0;
      }
      unset($insert);
      $insert["qday_code"] = $code;      
      if ($this->delete($table2,$where)) {
        for ($ctr = 1 ; $ctr <= 9 ; $ctr++) {          
          $prefix = $day."_".$ctr;
          if (isset($data["qtimeStart_".$prefix]) && $data["qtimeStart_".$prefix] != "") {
            $insert["qdetail_code"] = $code . str_pad($ctr,2,"0",STR_PAD_LEFT);            
            $insert["qdetail_time_start"] = $data["qtimeStart_".$prefix];
            $insert["qdetail_time_end"] = $data["qtimeEnd_".$prefix];
            if ($this->rowCount("entrance","entrance_name = '".$data["entrance_".$prefix]."'") > 0) {
              $row = $this->query_one("SELECT entrance_code FROM entrance WHERE entrance_name = '".$data["entrance_".$prefix]."'");
              $insert["qdetail_title"] = $row["entrance_code"];
            } else {
              $insert["qdetail_title"] = $data["entrance_".$prefix];
            }
            $insert["qdetail_status"] = "1";            
            if (!$this->insert($table2,$insert)) $ret = 0;
          }
        }
      } else {
        $ret = 0;
      }      
      unset($insert);
      
    }
    return $ret;
  }
  public function modifyTransport($data) {
    $ret = 1;
    $table = "quotation_day";
    for ($day = 1 ; $day <= $this->quotation_days ; $day++) {
      $code = $data['quotation_code'].str_pad($day,2,"0",STR_PAD_LEFT);
      $where = "qday_code = '".$code."'";
      $insert["quotation_code"] = $data['quotation_code'];
      $insert["qday_code"] = $code;
      if ($this->delete($table,$where)) {
        $insert["route_code"] = $data["route_$day"];
        $insert["qday_day"] = $day;
        $insert["qday_location_start"] = "";
        $insert["qday_location_end"] = "";
        $insert["qday_route"] = "";
        if (!$this->insert($table,$insert)) $ret = 0;
      } else {
        $ret = 0;
      }
    }
    return $ret;
  }
  public function modifyHotel($data) {
    $ret = 1;
    $table = "qday_hotel";
    for ($day = 1 ; $day < $this->quotation_days ; $day++) {
      $code = $data['quotation_code'].str_pad($day,2,"0",STR_PAD_LEFT);
      $where = "qday_code = '".$code."'";
      if ($this->delete($table,$where)) {
        $insert["qday_code"] = $code;
        for ($type = 1 ; $type <= 3 ; $type++) {
          $insert["hotel_code"] = $data["hotel_cb_".$type."_".$day];
          $insert["room_code"] = "";
          $insert["qday_hotel_night"] = "1";
          $insert["qday_room_level"] = (6-$type);
          if (!$this->insert($table,$insert)) $ret = 0;
        }
      } else {
        $ret = 0;
      }
    }
    $update['quotation_title1'] = $data['hotel_type1'];
    $update['quotation_title2'] = $data['hotel_type2'];
    $update['quotation_title3'] = $data['hotel_type3'];
    $this->update("quotation",$update,"quotation_code = '" . $data['quotation_code'] . "'");
    $ret = 1;
    return $ret;
  }
  public function modifyEntrance($data) {
    $ret = 1;
    $table = "qday_entrance";
    for ($day = 1 ; $day <= $this->quotation_days ; $day++) {
      $code = $data['quotation_code'].str_pad($day,2,"0",STR_PAD_LEFT);
      $where = "qday_code = '".$code."'";
      $insert["qday_code"] = $code;
      if ($this->delete($table,$where)) {
        $insert["entrance_code"] = $data["entrance_".$day];
        if (!$this->insert($table,$insert)) $ret = 0;
      } else {
        $ret = 0;
      }
    }
    return $ret;
  }
  public function modifyMeal($data) {
    $ret = 1;
    $table = "qday_restaurant";    
    for ($day = 1 ; $day <= $this->quotation_days ; $day++) {
      $code = $data['quotation_code'].str_pad($day,2,"0",STR_PAD_LEFT);
      $where = "qday_code = '".$code."'";
      if ($this->delete($table,$where)) {
        $insert["qday_code"] = $code;
        for ($type = 1 ; $type <= 3 ; $type++) {
          $insert["menu_code"] = $data["restaurant_".$type."_".$day];
          $insert["restaurant_code"] = "";
          $insert["qday_rest_type"] = $type;
          if (!$this->insert($table,$insert)) $ret = 0;
        }
      } else {
        $ret = 0;
      }
    } 
    return $ret;
  }
  public function modifyRundown($data) {
    $ret = 1;
    $table = "quotation_detail";    
    for ($day = 1 ; $day <= $this->quotation_days ; $day++) {
      $code = $data['quotation_code'].str_pad($day,2,"0",STR_PAD_LEFT);
      $where = "qday_code = '".$code."'";
      if ($this->delete($table,$where)) {
        $insert["qday_code"] = $code;
        for ($ctr = 1 ; $ctr <= 9 ; $ctr++) {          
          $prefix = $day.$ctr;
          if (isset($data["qremark_".$prefix])) {
            $insert["qdetail_code"] = $code . str_pad($ctr,2,"0",STR_PAD_LEFT);            
            $insert["qdetail_time_start"] = $data["qtimeStart_".$prefix];
            $insert["qdetail_time_end"] = $data["qtimeEnd_".$prefix];
//            $insert["qdetail_title"] = $data["qremark_".$prefix];
            $insert["qdetail_status"] = "1";            
            if (!$this->insert($table,$insert)) $ret = 0;
          }
        }
      } else {
        $ret = 0;
      }
    } 
    return $ret;
  }
  public function modifyOther($data) {
    $ret = 1;
    $table = "qday_other";    
    $code = $data['quotation_code'];
    $where = "quotation_code = '".$code."'";
    if ($this->delete($table,$where)) {
      $insert["quotation_code"] = $code;
      for ($i=1 ; $i <= $data['other_count'] ; $i++) {
        $prefix = "other_".$i."_";
        if (isset($data[$prefix."1"]) && $data[$prefix."1"] != "") {
          $insert["other_text"] = $data[$prefix."1"];
          $insert["other_price"] = $data[$prefix."2"];
          $insert["other_satuan"] = $data[$prefix."3"];
          $insert["other_satuan_text"] = $data[$prefix."31"];
          $insert["other_times"] = $data[$prefix."4"];
          $insert["other_times_text"] = $data[$prefix."41"];
          $insert["other_subtotal"] = $insert["other_price"] * $insert["other_satuan"] * $insert["other_times"];
          if (!$this->insert($table,$insert)) $ret = 0;
          
        }
      }
      
    } else {
      $ret = 0;
    }
    return $ret;
  }
  public function save_calculation($data) {    
    $insert["quotation_code"] = $data["quotation_code"];
    $where = "quotation_code = '".$data["quotation_code"]."'";
    $this->delete("quotation_calc",$where);
    foreach($data as $key => $value) {
      if ($key != "quotation_code" && $key != "param") {
        $insert["qcalc_key"] = $key;
        $insert["qcalc_value"] = $value;
      }
      if (!$this->insert("quotation_calc",$insert)) $ret = 0;
    }
    $ret = 1;
    return $ret;
  }
}
?>
