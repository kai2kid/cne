<?php 
class controller_ajax extends basicController {
  public function __construct() {
    parent::__construct();
  }
  protected function index() {          
//    $o['script'] = $script;  
//    $o['style'] = $style;  
//    $o['html'] = $s;  
//    $o['result'] = $result;
    
    $this->output_json($o);
  }
  protected function test() {
    $o["text"] = "hahahah bisa coy";
    $this->output_json($o);
  }
}
?>