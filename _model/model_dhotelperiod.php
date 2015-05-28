<?php
class model_dhotelperiod extends basicModel {
  public $p_code = "";
  public $prefix = "period";  
  
  protected $pk = "period_id";
  protected $p_pk = "hotel_code";

  protected $tb_name = "hotel_period";
  private $id = "";
  public $dataParent = "";
  protected $data;
  public $period = "";
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
        SELECT
          period_id 
          , period_type
          , CASE period_type 
            WHEN '1' THEN 'Low Season'
            WHEN '2' THEN 'High Season'
            WHEN '3' THEN 'Peak Season'
          END period_type_name
          , period_start
          , period_end
        FROM hotel_period
        WHERE ".$this->p_pk." = '".$this->p_code."'
        ORDER BY period_type ASC, period_start ASC
      ";
      $this->data = $this->query($qry);
    }
  }
  public function autogenerate() { }
  public function directory($param="") {
    return $this->data;
  }
  public function inserting($param) {
    $ret = $this->insert($this->tb_name,$param);
    return $ret;
  }
  public function updating($param) {
    $ret = $this->update($this->tb_name,$param,$this->pk . " = '" . $this->id . "'");
    return $ret;
  }
  public function deleting() {
    $ret = $this->delete($this->tb_name,$this->pk . " = '" . $this->id."'");
    return $ret;
  }
}
?>
