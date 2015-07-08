<?php
class model_entrance extends basicModel {
  protected $tb_name = "entrance";
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
        WHERE entrance_code = '".$this->id."'
      ";
      $this->data = $this->query_one($qry);
    } else {
      $qry = "
        SELECT ".$this->tb_name.".*, l.location_name
        FROM ".$this->tb_name."
        LEFT JOIN location l ON ".$this->tb_name."_location = l.location_name
        WHERE entrance_status = 1
        ";
      $this->data = $this->query($qry);
    }
  }
  public function autogenerate() {
    $qry = "SELECT MAX(RIGHT(entrance_code,4)) max_id FROM entrance WHERE entrance_code LIKE 'EN%'";
    $row = $this->query_one($qry);
    $id = "EN" . str_pad($row["max_id"]+1,4,"0",STR_PAD_LEFT) ;
    return $id;
  }
  public function directory($param="") {
    return $this->data;
  }
  public function inserting($param) {
    $param['entrance_code'] = $this->autogenerate();     
    $param['entrance_updated'] = date("Y-m-d H:i:s");
    $param['entrance_updated_name'] = $_SESSION[_SESSION_USER];  
    $param['entrance_status'] = 1;
    $ret = $this->insert($this->tb_name,$param);
    return $ret;
  }
  public function updating($param) {
    $param['entrance_updated'] = date("Y-m-d H:i:s");
    $param['entrance_updated_name'] = $_SESSION[_SESSION_USER];  
    $ret = $this->update($this->tb_name,$param,"entrance_code = '" . $this->id . "'");
    return $ret;
  }
  public function deleting() {
    $param['entrance_updated'] = date("Y-m-d H:i:s");
    $param['entrance_updated_name'] = $_SESSION[_SESSION_USER];  
    $param['entrance_status'] = 0;
    $ret = $this->update($this->tb_name,$param,"entrance_code = '" . $this->id."'");
    return $ret;
  }
  public function _combobox($name,$selected = "") {
    $qry = "
      SELECT entrance_code, entrance_code, entrance_location, entrance_name
      FROM entrance
      ORDER BY entrance_name ASC
    ";
    $rows = $this->query($qry);
    $ret = "<select name='$name' id = '$name' class='form-control min-padding combobox'>";
    foreach ($rows as $row) {
      $s = ($selected != "" && $selected == $row['entrance_code'] ? "selected" : "");
      $ret .= "<option name='".$row['entrance_location']."' value='".$row['entrance_code']."' $s>".$row['entrance_name']."</option>";
    }
    $ret .= "</select>";
    return $ret;
  }
}
?>
