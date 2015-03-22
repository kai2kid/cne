<?php 
class controller_index extends basicController {
  public function __construct() {
    parent::__construct();
    $_SESSION[_SESSION_MENU_ACTIVE] = "home";
  }
  protected function index() {
    $this->loadView("index");
  }
}
?>