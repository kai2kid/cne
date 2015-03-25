<?php
class model_country extends basicModel {
  protected $tb_name = "country";
//  private $id = "";
  protected $data;
  public function __construct($id = "") {
    $this->db_connect();
//    if ($id != "") $this->id = $id;
    $this->initdata();
  }
  public function initdata() {
    $qry = "SELECT * FROM " . $this->tb_name . " ORDER BY country_name ASC";
    $rows = $this->query($qry);
    foreach ($rows as $row) {
      $this->data[] = $row['country_name'];
    }
  }
  public function HTML_datalist($id) {
    $dataset = $this->data;
    $ret = HTML::datalist($dataset,array("id" => $id));
    return $ret;
  }
  public function append($name) {
    $count = $this->rowCount($this->tb_name,"country_name LIKE '".$name."'");
    if ($count == 0) {
      $insert['country_name'] = ucwords($name);
      try {
        $this->insert($this->tb_name,$insert);
      } catch (ErrorException $e) {
        echo "Name already existed";
      }
    }
  }
}
?>
