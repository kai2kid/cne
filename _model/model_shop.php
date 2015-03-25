<?php
class model_shop extends basicModel {
  protected $tb_name = "shop";
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
        WHERE shop_code = '".$this->id."'
      ";
      $this->data = $this->query_one($qry);
    } else {
      $qry = "
        SELECT *
        FROM ".$this->tb_name."
        WHERE shop_status = 1
        ";
      $this->data = $this->query($qry);
    }
  }
  public function autogenerate() {
    $qry = "SELECT MAX(RIGHT(shop_code,4)) max_id FROM shop WHERE shop_code LIKE 'SH%'";
    $row = $this->query_one($qry);
    $id = "SH" . str_pad($row["max_id"]+1,4,"0",STR_PAD_LEFT) ;
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
    $ret = $this->update($this->tb_name,$param,"shop_code = '" . $this->id . "'");
    return $ret;
  }
  public function deleting() {
    $ret = $this->update($this->tb_name,array("shop_status"=>"0"),"shop_code = '" . $this->id."'");
    return $ret;
  }
}
?>
