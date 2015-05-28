<?php 
class controller_booking extends basicController {  
  public function __construct() {
    parent::__construct();	
  }
  public function index() {
    $param = "";
    $this->loadView("booking",$param);
  }
}
?>