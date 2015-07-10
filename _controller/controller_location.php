<?php 
class controller_location extends basicController {
  public function __construct() {
    parent::__construct();
  }
  public function index() {
    $param['model'] = new model_location();
    $this->loadView("location",$param);
  }
  public function insertAjaxForm() {
    $o['html'] = $this->bufferView("location_insert");
    $this->output_json($o);
  }
  public function updateAjaxForm($id) {
    $model = new model_location($id);
    $param['data'] = $model->data();
    $o['html'] = $this->bufferView("location_update",$param);
    $this->output_json($o);
  }
  public function deleteAjaxForm($id) {
    $model = new model_location($id);
    $param['data'] = $model->data();
    $o['html'] = $this->bufferView("location_delete",$param);
    $this->output_json($o);
  }
  public function inserting() {
    $model = new model_location();
    $insert = $_POST;
    $insert['location_code'] = $model->autogenerate();    
	  $insert['location_updated'] = date("Y-m-d H:i:s");
    $insert['location_updated_name'] = $_SESSION[_SESSION_USER];
    $model->inserting($insert);
    $this->forward("location");
  }
  public function updating() {
    $model = new model_location($_POST['location_code']);
    $update = $_POST;    
	$update['location_updated'] = date("Y-m-d H:i:s");
    $update['location_updated_name'] = $_SESSION[_SESSION_USER];
    $model->updating($update);
    $this->forward("location");
  }
  public function deleting() {
    $model = new model_location($_POST['location_code']);
    $model->deleting();
    $this->forward("location");
  }
  
 public function selecting() {
    $model = new model_location();     
    $o = $model->selecting();
    $this->output_jsonstring($o);
  }
}
?>