<?php
class model_config extends basicModel {
  protected $tb_name = "app_config";
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
        WHERE config_code = '".$this->id."'
      ";
      $this->data = $this->query_one($qry);
    } else {
      $qry = "
        SELECT *
        FROM ".$this->tb_name."
        ORDER BY config_name
        ";
      $this->data = $this->query($qry);
    }
  }
  public function directory($param="") {
    return $this->data;
  }
  public function updating($param) {
    foreach ($param as $key=>$value) {
      $update["config_value"] = $value;
      $this->update($this->tb_name,$update,"config_code = '" . $key . "'");
    }
    return 1;
  }
  public function getValue($code) {
    $qry = "
      SELECT config_value
      FROM ".$this->tb_name."
      WHERE config_code = '".$code."'
    ";
    $data = $this->query_one($qry);
    return $data['config_value'];
    
  }
}
?>
