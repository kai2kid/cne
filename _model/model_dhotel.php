<?php
class model_dhotel extends basicModel {
  public $p_code = "";
  public $prefix = "room";  
  
  protected $pk = "room_code";
  protected $p_pk = "hotel_code";

  protected $tb_name = "hotel_room";
  private $id = "";
  public $dataParent = "";
  protected $data;
  public function __construct($parent_code, $id = "") {
    $this->db_connect();
    if ($id != "") $this->id = $id;
	  $this->p_code = $parent_code;
    $this->initdata();
  }
  public function initdata() {
    $parent = new model_hotel($this->p_code);
    $this->dataParent = $parent->data();
    
    if ($this->id != "") {
      $qry = "
        SELECT *
        FROM ".$this->tb_name."
        WHERE ".$this->pk." = '".$this->id."' AND ".$this->p_pk." ='".$this->p_code."'
      ";
      $this->data = $this->query_one($qry);
    } else {
      $qry = "
        SELECT *,
          CASE room_type 
            WHEN 'B' THEN 'Budget'
            WHEN 'D' THEN 'Deluxe'
            WHEN 'SD' THEN 'Super Deluxe'
            WHEN 'BB' THEN 'Breakfast Budget'
            WHEN 'BD' THEN 'Breakfast Deluxe'
            WHEN 'BSD' THEN 'Breakfast Super Deluxe'
          END room_type_name        
        FROM ".$this->tb_name."
        WHERE ".$this->p_pk." ='".$this->p_code."' AND ".$this->prefix."_status = 1
        ";
      $this->data = $this->query($qry);
    }
  }
  public function autogenerate() {
    $qry = "SELECT MAX(RIGHT(room_code,6)) max_id FROM hotel_room WHERE room_code LIKE 'HR%'";
    $row = $this->query_one($qry);
    $id = "HR" . str_pad($row["max_id"]+1,6,"0",STR_PAD_LEFT) ;
    return $id;
  }
  public function directory($param="") {
    return $this->data;
  }
  public function inserting($param) {
    $param[$this->prefix.'_status'] = 1;
    $param[$this->prefix.'_code'] = $this->autogenerate();     
    $ret = $this->insert($this->tb_name,$param);
    return $ret;
  }
  public function updating($param) {
    $ret = $this->update($this->tb_name,$param,$this->pk . " = '" . $this->id . "'");
    return $ret;
  }
  public function deleting() {
    $param[$this->prefix.'_status'] = 0;
    $ret = $this->update($this->tb_name,$param,$this->pk . " = '" . $this->id."'");
    return $ret;
  }
}
?>
