<?php
class model_pic extends basicModel {
  protected $tb_name = "pic";
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
        WHERE pic_code = '".$this->id."'
          AND pic_status > 0
      ";
      $this->data = $this->query_one($qry);
    } else {
      $qry = "
        SELECT *
        FROM ".$this->tb_name."
        WHERE pic_status > 0
        ";
      $this->data = $this->query($qry);
    }
  }
  public function autogenerate() {
    $qry = "SELECT MAX(RIGHT(pic_code,4)) max_id FROM pic WHERE pic_code LIKE 'CP%'";
    $row = $this->query_one($qry);
    $id = "CP" . str_pad($row["max_id"]+1,4,"0",STR_PAD_LEFT) ;
    return $id;
  }
  public function directory($param="") {
    return $this->data;
  }
  public function directory2($code) {
    $qry = "SELECT * FROM pic WHERE pic_status > 0 AND pic_type_code = '$code' ORDER BY pic_name";
    return $this->query($qry);
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
    $ret = $this->update($this->tb_name,$param,"pic_code = '" . $this->id . "'");
    return $ret;
  }
  public function deleting() {
    $ret = $this->update($this->tb_name,array("pic_status"=>"0"),"pic_code = '" . $this->id."'");
    return $ret;
  }
}
?>
