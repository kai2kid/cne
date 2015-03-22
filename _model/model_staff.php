<?php
class model_staff extends basicModel {
  protected $tb_name = "staff";
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
        SELECT *
        FROM ".$this->tb_name."
        WHERE staff_code = '".$this->id."'
      ";
      $this->data = $this->query_one($qry);
    } else {
      $qry = "
        SELECT *
        FROM ".$this->tb_name."
        WHERE staff_status = 1
        ";
      $this->data = $this->query($qry);
    }
  }
  public function autogenerate() {
    $qry = "SELECT MAX(RIGHT(staff_code,4)) max_id FROM staff WHERE staff_code LIKE 'ST%'";
    $row = $this->query_one($qry);
    $id = "ST" . str_pad($row["max_id"]+1,4,"0",STR_PAD_LEFT) ;
    return $id;
  }
  public function directory($param="") {
    return $this->data;
  }
  public function inserting($param) {
    $ret = $this->insert($this->tb_name,$param);
    return $ret;
  }
  public function updating($param) {
    $ret = $this->update($this->tb_name,$param,"staff_code = " . $this->id);
    return $ret;
  }
  public function deleting() {
    $ret = $this->update($this->tb_name,array("staff_status"=>"0"),"staff_code = '" . $this->id."'");
    return $ret;
  }
}
?>
