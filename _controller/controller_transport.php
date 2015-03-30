<?php 
class controller_transport extends basicController {  
  public function __construct() {
    parent::__construct();	
  }
  public function index() {
    $param['model'] = new model_transport();
    $this->loadView("transport",$param);
  }
  public function insertAjaxForm() {
    $o['html'] = $this->bufferView("transport_insert");
    $this->output_json($o);
  }
  public function updateAjaxForm($id) {
    $model = new model_transport($id);
    $param['data'] = $model->data();
    $o['html'] = $this->bufferView("transport_update",$param);
    $this->output_json($o);
  }
  public function deleteAjaxForm($id) {
    $model = new model_transport($id);
    $param['data'] = $model->data();
    $o['html'] = $this->bufferView("transport_delete",$param);
    $this->output_json($o);
  }
  public function inserting() {
    $model = new model_transport();
    $insert = $_POST;
    $model->inserting($insert);
    $this->forward("transport");
  }
  public function updating() {
    $model = new model_transport($_POST['transport_code']);
    $update = $_POST;    
    $model->updating($update);
    $this->forward("transport");
  }
  public function deleting() {
    $model = new model_transport($_POST['transport_code']);
    $model->deleting();
    $this->forward("transport");
  }
  
  
}
?>