<?php
class model_hotel extends basicModel {
  protected $tb_name = "hotel";
  private $id = "";
  protected $data;
  protected $period;
  public function __construct($id = "") {
    $this->db_connect();
    if ($id != "") $this->id = $id;
    $this->initdata();
  }
  public function initdata() {
    if ($this->id != "") {
      $qry = "
        SELECT ".$this->tb_name.".*, l.location_name
        FROM ".$this->tb_name."
        LEFT JOIN location l ON ".$this->tb_name."_location = l.location_code
        WHERE hotel_code = '".$this->id."'
      ";
      $this->data = $this->query_one($qry);
    } else {
      $qry = "
        SELECT ".$this->tb_name.".*, l.location_name
        FROM ".$this->tb_name."
        LEFT JOIN location l ON ".$this->tb_name."_location = l.location_code
        WHERE hotel_status = 1
        ";
      $this->data = $this->query($qry);
    }
  }
  public function autogenerate() {
    $qry = "SELECT MAX(RIGHT(hotel_code,4)) max_id FROM hotel WHERE hotel_code LIKE 'HT%'";
    $row = $this->query_one($qry);
    $id = "HT" . str_pad($row["max_id"]+1,4,"0",STR_PAD_LEFT) ;
    return $id;
  }
  public function directory($param="") {
    return $this->data;
  }
  public function inserting($param) {
    $param['hotel_code'] = $this->autogenerate();     
    $param['hotel_updated'] = date("Y-m-d H:i:s");
    $param['hotel_updated_name'] = $_SESSION[_SESSION_USER];  
    $param['hotel_status'] = 1;
    $ret = $this->insert($this->tb_name,$param);
    
    //Adding 1 detail room
    $model2 = new model_dhotel($param['hotel_code']);
    unset($insert);
    $insert['hotel_code'] = $param['hotel_code'];
    $model2->inserting($insert);
    
    return $ret;
  }
  public function updating($param) {
    $param['hotel_updated'] = date("Y-m-d H:i:s");
    $param['hotel_updated_name'] = $_SESSION[_SESSION_USER];
    $ret = $this->update($this->tb_name,$param,"hotel_code = '" . $this->id . "'");
    return $ret;
  }
  public function deleting() {
    $param['hotel_status'] = 0;
    $param['hotel_updated'] = date("Y-m-d H:i:s");
    $param['hotel_updated_name'] = $_SESSION[_SESSION_USER];
    $ret = $this->update($this->tb_name,$param,"hotel_code = '" . $this->id."'");
    return $ret;
  }
  public function initPeriod() {
    $this->period["high"]["start"] = "04-01"; $this->period["high"]["end"] = "06-30";
    $this->period["high"]["start"] = "09-01"; $this->period["high"]["end"] = "11-30";
    $this->period["low"]["start"]  = "01-01"; $this->period["low"]["end"]  = "03-31";
    $this->period["low"]["start"]  = "07-01"; $this->period["low"]["end"]  = "08-31";
    $this->period["low"]["start"]  = "12-01"; $this->period["low"]["end"]  = "12-31";
    $this->period["peak"]["start"] = "04-29"; $this->period["peak"]["end"] = "04-30";
    $this->period["peak"]["start"] = "05-01"; $this->period["peak"]["end"] = "05-05";
    $this->period["peak"]["start"] = "07-17"; $this->period["peak"]["end"] = "07-19";
    $this->period["peak"]["start"] = "08-13"; $this->period["peak"]["end"] = "08-16";
    $this->period["peak"]["start"] = "12-24"; $this->period["peak"]["end"] = "12-26";
    $this->period["peak"]["start"] = "12-31"; $this->period["peak"]["end"] = "01-02";
  }                                           
  public function _combobox($name,$selected = "") {
    return HTML::combobox(fetchDataset($this->data,"hotel_code","hotel_name"),["name"=>$name,"class"=>"form-control min-padding combobox"],$selected);
  }
  public function price() {
    return 500;
  }
}
?>
