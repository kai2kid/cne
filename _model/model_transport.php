<?php
class model_transport extends basicModel {
  protected $tb_name = "transport";
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
        LEFT JOIN location l ON ".$this->tb_name."_location = l.location_name
        WHERE transport_code = '".$this->id."'
      ";
      $this->data = $this->query_one($qry);
    } else {
      $qry = "
        SELECT ".$this->tb_name.".*, l.location_name
        FROM ".$this->tb_name."
        LEFT JOIN location l ON ".$this->tb_name."_location = l.location_name
        WHERE transport_status = 1
        ";
      $this->data = $this->query($qry);
    }
  }
  public function autogenerate() {
    $qry = "SELECT MAX(RIGHT(transport_code,4)) max_id FROM transport WHERE transport_code LIKE 'TR%'";
    $row = $this->query_one($qry);
    $id = "TR" . str_pad($row["max_id"]+1,4,"0",STR_PAD_LEFT) ;
    return $id;
  }
  public function directory($param="") {
    return $this->data;
  }
  public function inserting($param) {
    $param['transport_code'] = $this->autogenerate();     
    $param['transport_updated'] = date("Y-m-d H:i:s");
    $param['transport_updated_name'] = $_SESSION[_SESSION_USER];  
    $param['transport_status'] = 1;
    $ret = $this->insert($this->tb_name,$param);
    return $ret;
  }
  public function updating($param) {
    $param['transport_updated'] = date("Y-m-d H:i:s");
    $param['transport_updated_name'] = $_SESSION[_SESSION_USER];  
    $ret = $this->update($this->tb_name,$param,"transport_code = '" . $this->id . "'");
    return $ret;
  }
  public function deleting() {
    $param['transport_updated'] = date("Y-m-d H:i:s");
    $param['transport_updated_name'] = $_SESSION[_SESSION_USER];  
    $param['transport_status'] = 0;
    $ret = $this->update($this->tb_name,$param,"transport_code = '" . $this->id."'");
    return $ret;
  }
}
?>
