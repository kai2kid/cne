<?php 
class controller_quotation extends basicController {  
  public function __construct() {
    parent::__construct();	
    $_SESSION[_SESSION_MENU_ACTIVE] = "quotation";
  }
  public function index() {
    $param = "";
    $this->loadView("quotation",$param);
  }
  
  public function formInsert() {
	$this->loadView("quotation_insert");
  }
  
  public function formInsertPriceTransport() {
	$this->loadView("quotation_insert_price_transport");
  }
  
  public function formInsertPriceHotel() {
	$this->loadView("quotation_insert_price_hotel");
  }
  
  public function formInsertPriceEntrance() {
	$this->loadView("quotation_insert_price_entrance");
  }
  
  public function formUpdate() {
	$this->loadView("quotation_insert");
  }
  
  public function deleteAjaxForm($id) {
    //$model = new model_quotation($id);
    //$param['data'] = $model->data();
	
	$param['data'] = "";
    $o['html'] = $this->bufferView("quotation_delete",$param);
    $this->output_json($o);
  }
}
?>