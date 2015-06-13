<?php
class model_route extends basicModel {
  protected $tb_name = "route";
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
        WHERE route_code = '".$this->id."'
      ";
      $this->data = $this->query_one($qry);
    } else {
      $qry = "
        SELECT *
        FROM ".$this->tb_name . "
        WHERE route_status > 0
        ";
      $this->data = $this->query($qry);
    }
  }
  public function autogenerate() {
    $qry = "SELECT MAX(RIGHT(route_code,4)) max_id FROM route WHERE route_code LIKE 'RO%'";
    $row = $this->query_one($qry);
    $id = "RO" . str_pad($row["max_id"]+1,4,"0",STR_PAD_LEFT) ;
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
    $ret = $this->update($this->tb_name,$param,"route_code = '" . $this->id . "'");
    return $ret;
  }
  public function deleting() {
    $ret = $this->update($this->tb_name,array("route_status"=>"0"),"route_code = '" . $this->id."'");
    return $ret;
  }
  public function _combobox($name,$selected = "") {
    return HTML::combobox(fetchDataset($this->data,"route_code","route_title"),["name"=>$name,"class"=>"form-control min-padding combobox"],$selected);
  }
  
}
?>
