<?php 
class controller_master extends basicController {
  private $master_name;
  private $model;
  public function __construct($master_name) {
    parent::__construct();
    $this->$master_name = $master_name;
    $this->model = new model_master($master_name);
  }
  protected function id_autogenerate() {
    
  }
  protected function index() {
    $param['master'] = $this->model;
    $this->loadView("master",$param);
  }
  protected function insert() {
    
  }
  protected function inserting() {
    if ($this->model->inserting($_POST)) {
      $this->alert("New data has been added!");
    }
  }
  protected function detail($id = "") {
    if (isset($_POST['mode']) && $_POST['mode'] != "") {
      switch ($_POST['mode']) {
        case "update" : {
          if ($this->model->updating($_POST)) {
            $this->alert("Data has been updated!");
          }
          break; }
        case "delete" : {
          if ($this->model->deleting($_POST)) {            
            $id = "";
            $this->alert("Data has been deleted!");
          }
          break; }
      }
    }
    if ($id != "") { // Update
      $param['mode'] = "update";
      $param['title'] = "Modifying";
      $this->model->initData($id);
    } else { //Insert
      $param['mode'] = "insert";
      $param['title'] = "Adding";
    }
    $param['master'] = $this->model;
    $this->loadView("master_detail",$param);
  }
}
?>