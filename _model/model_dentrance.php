<?php
class model_dentrance extends basicModel {
  public $p_code = "";
  public $prefix = "ticket";  
  
  protected $pk = "ticket_code";
  protected $p_pk = "entrance_code";

  protected $tb_name = "entrance_ticket";
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
    $parent = new model_entrance($this->p_code);
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
        SELECT *
        FROM ".$this->tb_name."
        WHERE ".$this->p_pk." ='".$this->p_code."' AND ".$this->prefix."_status = 1
        ";
      $this->data = $this->query($qry);
    }
  }
  public function autogenerate() {
    $qry = "SELECT MAX(RIGHT(ticket_code,6)) max_id FROM entrance_ticket WHERE ticket_code LIKE 'TC%'";
    $row = $this->query_one($qry);
    $id = "TC" . str_pad($row["max_id"]+1,6,"0",STR_PAD_LEFT) ;
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
