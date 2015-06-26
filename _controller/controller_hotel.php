<?php 
class controller_hotel extends basicController {
  public function __construct() {
    parent::__construct();
  }
  public function index() {
    $param['model'] = new model_hotel();
    $l = new model_location();
    $param['cb_location'] = $l->_combobox("hotel_location");
    $this->loadView("hotel",$param);
  }
  public function insertAjaxForm() {
    $o['html'] = $this->bufferView("hotel_insert");
    $this->output_json($o);
  }
  public function updateAjaxForm($id) {
    $model = new model_hotel($id);
    $param['data'] = $model->data();
    $l = new model_location();
    $param['cb_location'] = $l->_combobox("hotel_location",$param['data']['hotel_location']);
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
    $model->inserting($insert);
   
    $this->forward("hotel");
  }
  public function updating() {
    $model = new model_hotel($_POST['hotel_code']);
    $update = $_POST;    
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