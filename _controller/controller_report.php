<?php 
class controller_report extends basicController {  
  public function __construct() {
    parent::__construct();	
  }
  public function index() {
    $param = "";
    $this->loadView("report",$param);
  }
}
?>