<?php
class model_hotel extends basicModel {
  protected $tb_name = "hotel";
  private $id = "";
  protected $data;
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
}
?>
