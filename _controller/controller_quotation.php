<?php 
class controller_quotation extends basicController {  
  public function __construct() {
    parent::__construct();	
  }
  public function index() {
    $param = "";
    $this->loadView("quotation",$param);
  }
}
?>