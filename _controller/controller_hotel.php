<?php 
class controller_hotel extends basicController {
  public function __construct() {
    parent::__construct();
  }
  public function index() {
    $param['model'] = new model_hotel();
    $this->loadView("hotel",$param);
  }
  public function insertAjaxForm() {
    $o['html'] = $this->bufferView("hotel_insert");
    $this->output_json($o);
  }
  public function updateAjaxForm($id) {
    $model = new model_hotel($id);
    $param['data'] = $model->data();
    $o['html'] = $this->bufferView("hotel_update",$param);
    $this->output_json($o);
  }
  public function deleteAjaxForm($id) {
    $model = new model_hotel($id);
    $param['data'] = $model->data();
    $o['html'] = $this->bufferView("hotel_delete",$param);
    $this->output_json($o);
  }
  public function inserting() {
    $model = new model_hotel();
    $insert = $_POST;
    $insert['hotel_code'] = $model->autogenerate();   	
    $insert['hotel_updated'] = date("Y-m-d H:i:s");
    $insert['hotel_updated_name'] = $_SESSION[_SESSION_USER];	
    $model->inserting($insert);
    $this->forward("hotel");
  }
  public function updating() {
    $model = new model_hotel($_POST['hotel_code']);
    $update = $_POST;    
	$update['hotel_updated'] = date("Y-m-d H:i:s");
    $update['hotel_updated_name'] = $_SESSION[_SESSION_USER];
    $model->updating($update);
    $this->forward("hotel");
  }
  public function deleting() {
    $model = new model_hotel($_POST['hotel_code']);
    $model->deleting();
    $this->forward("hotel");
  }
  
  public function loadDetail() {
    $param['model'] = new model_hotel();
    $this->loadView("hotel_detail",$param);
  }
}
?>