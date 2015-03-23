<?php 
class controller_buyer extends basicController {
  public function __construct() {
    parent::__construct();
  }
  public function index() {
    $param['model'] = new model_buyer();
    $this->loadView("buyer",$param);
  }
  public function insertAjaxForm() {
    $o['html'] = $this->bufferView("buyer_insert");
    $this->output_json($o);
  }
  public function updateAjaxForm($id) {
    $model = new model_buyer($id);
    $param['data'] = $model->data();
    $o['html'] = $this->bufferView("buyer_update",$param);
    $this->output_json($o);
  }
  public function deleteAjaxForm($id) {
    $model = new model_buyer($id);
    $param['data'] = $model->data();
    $o['html'] = $this->bufferView("buyer_delete",$param);
    $this->output_json($o);
  }
  public function inserting() {
    $model = new model_buyer();
    $insert = $_POST;
    $insert['buyer_code'] = $model->autogenerate();    
    $model->inserting($insert);
    $this->forward("buyer");
  }
  public function updating() {
    $model = new model_buyer($_POST['buyer_code']);
    $update = $_POST;    
    $model->updating($update);
    $this->forward("buyer");
  }
  public function deleting() {
    $model = new model_buyer($_POST['buyer_code']);
    $model->deleting();
    $this->forward("buyer");
  }
}
?>