<?php 
class controller_config extends basicController {
  public function __construct() {
    parent::__construct();
    $_SESSION[_SESSION_MENU_ACTIVE] = "config";
  }
  public function index() {
    $param['model'] = new model_config();
    $this->loadView("config",$param);
  }
  public function updating() {
    $model = new model_config();
    $model->updating($_POST);
    $this->forward("config");
  }
}
?>