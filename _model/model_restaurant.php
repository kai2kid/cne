<?php
class model_restaurant extends basicModel {
  protected $tb_name = "restaurant";
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
        WHERE restaurant_code = '".$this->id."'
      ";
      $this->data = $this->query_one($qry);
    } else {
      $qry = "
        SELECT ".$this->tb_name.".*, l.location_name
        FROM ".$this->tb_name."
        LEFT JOIN location l ON ".$this->tb_name."_location = l.location_name
        WHERE restaurant_status = 1
        ";
      $this->data = $this->query($qry);
    }
  }
  public function autogenerate() {
    $qry = "SELECT MAX(RIGHT(restaurant_code,4)) max_id FROM restaurant WHERE restaurant_code LIKE 'RS%'";
    $row = $this->query_one($qry);
    $id = "RS" . str_pad($row["max_id"]+1,4,"0",STR_PAD_LEFT) ;
    return $id;
  }
  public function directory($param="") {
    return $this->data;
  }
  public function inserting($param) {
    $param['restaurant_code'] = $this->autogenerate();     
    $param['restaurant_updated'] = date("Y-m-d H:i:s");
    $param['restaurant_updated_name'] = $_SESSION[_SESSION_USER];  
    $param['restaurant_status'] = 1;
    $ret = $this->insert($this->tb_name,$param);
    return $ret;
  }
  public function updating($param) {
    $param['restaurant_updated'] = date("Y-m-d H:i:s");
    $param['restaurant_updated_name'] = $_SESSION[_SESSION_USER];  
    $ret = $this->update($this->tb_name,$param,"restaurant_code = '" . $this->id . "'");
    return $ret;
  }
  public function deleting() {
    $param['restaurant_updated'] = date("Y-m-d H:i:s");
    $param['restaurant_updated_name'] = $_SESSION[_SESSION_USER];  
    $param['restaurant_status'] = 0;
    $ret = $this->update($this->tb_name,$param,"restaurant_code = '" . $this->id."'");
    return $ret;
  }
  public function _combobox($name,$selected = "") {
    return HTML::combobox(fetchDataset($this->data,"restaurant_code","restaurant_name"),["name"=>$name,"class"=>"form-control min-padding combobox"],$selected);
  }
}
?>
