<?php 
class controller_quotation extends basicController {  
  public $id;
  public function __construct($id = "") {
    parent::__construct();	
    $_SESSION[_SESSION_MENU_ACTIVE] = "quotation";
    if ($id != "") $this->id = $id;
  }
  public function index() {
    $param['model'] = new model_quotation();
    $this->loadView("quotation",$param);
  }
  
  public function formInsert() {
    $param['model'] = new model_quotation();
    $param['location'] = new model_location();
    $param['route'] = new model_route();
    $param['hotel'] = new model_hotel();
    $param['entrance'] = new model_entrance();
    $param['restaurant'] = new model_restaurant();
	  $this->loadView("quotation_insert",$param);
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
    $param['model'] = new model_quotation($this->id);
    $param['location'] = new model_location();
    $param['route'] = new model_route();
    $param['hotel'] = new model_hotel();
    $param['entrance'] = new model_entrance();
    $param['restaurant'] = new model_restaurant();
	  $this->loadView("quotation_update",$param);
  }
  
  public function deleteAjaxForm($id) {
    $model = new model_quotation($id);
    $param['data'] = $model->data();	
    $o['html'] = $this->bufferView("quotation_delete",$param);
    $this->output_json($o);
  }
  public function calculation() {
    $param['model'] = new model_quotation($this->id);    
    $param['pax_estimated'] = ["10+1"=>11,"15+1"=>16,"20+1"=>21,"25+1"=>26,"30+2"=>32,"35+2"=>37,"40+2"=>42];    
    $param['rate'] = (1 / $param['model']->detail["rate_USD"]);
    $param['data'] = "";
    $this->loadView("quotation_calculation",$param);
  }
  public function proposal() {
    $param['model'] = new model_quotation($this->id);    
    $pax = rand(10,40);
    $param['pax_estimated'] = [$pax => $pax];
    $param['rate'] = 0.0009;
    $param['data'] = "";
    $this->loadView("quotation_proposal",$param);
  }
  public function insertHeader() {    
    $o['result'] = "0";
    $q = new model_quotation($_REQUEST['quotation_code']);    
    if ($q->modifyHeader($_REQUEST)) {
      $o['result'] = "1";
    }
    $this->output_json($o);
  }
  public function insertRoute() {    
    $o['result'] = "0";
    $q = new model_quotation($_REQUEST['quotation_code']);    
    if ($q->modifyRoute($_REQUEST)) {
      $o['result'] = "1";
    }
    $this->output_json($o);
  }
  public function insertTransport() {    
    $this->insertRoute();
    /*/
    $o['result'] = "0";
    $q = new model_quotation($_REQUEST['quotation_code']);    
    if ($q->modifyTransport($_REQUEST) && $q->modifyRundown($_REQUEST)) {
      $o['result'] = "1";
    }
    $this->output_json($o);
    /*/
  }
  public function insertHotel() {    
    $o['result'] = "0";
    $q = new model_quotation($_REQUEST['quotation_code']);    
    if ($q->modifyHotel($_REQUEST)) {
      $o['result'] = "1";
    }
    $this->output_json($o);
  }
  public function insertEntrance() {    
    $o['result'] = "0";
    $q = new model_quotation($_REQUEST['quotation_code']);    
    if ($q->modifyEntrance($_REQUEST)) {
      $o['result'] = "1";
    }
    $this->output_json($o);
  }
  public function insertMeal() {    
    $o['result'] = "0";
    $q = new model_quotation($_REQUEST['quotation_code']);    
    if ($q->modifyMeal($_REQUEST)) {
      $o['result'] = "1";
    }
    $this->output_json($o);
  }
  public function insertRundown() {    
    $o['result'] = "0";
    $q = new model_quotation($_REQUEST['quotation_code']);    
    if ($q->modifyRundown($_REQUEST)) {
      $o['result'] = "1";
    }
    $this->output_json($o);
  }
  public function insertOther() {    
    $o['result'] = "0";
    $q = new model_quotation($_REQUEST['quotation_code']);    
    if ($q->modifyOther($_REQUEST)) {
      $o['result'] = "1";
    }
    $this->output_json($o);
  }
  public function deleting() {
    $model = new model_quotation($_POST['quotation_code']);
    $model->deleting();
    $this->forward("quotation");
  }
}
?>