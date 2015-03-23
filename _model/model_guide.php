<?php
class model_guide extends basicModel {
  protected $tb_name = "guide";
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
        WHERE guide_code = '".$this->id."'
      ";
      $this->data = $this->query_one($qry);
    } else {
      $qry = "
        SELECT *
        FROM ".$this->tb_name."
        WHERE guide_status = 1
        ";
      $this->data = $this->query($qry);
    }
  }
  public function autogenerate() {
    $qry = "SELECT MAX(RIGHT(guide_code,4)) max_id FROM guide WHERE guide_code LIKE 'GD%'";
    $row = $this->query_one($qry);
    $id = "GD" . str_pad($row["max_id"]+1,4,"0",STR_PAD_LEFT) ;
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
    $ret = $this->update($this->tb_name,$param,"guide_code = '" . $this->id . "'");
    return $ret;
  }
  public function deleting() {
    $ret = $this->update($this->tb_name,array("guide_status"=>"0"),"guide_code = '" . $this->id."'");
    return $ret;
  }
}
?>
