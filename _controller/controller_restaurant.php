<?php 
class controller_restaurant extends basicController {  
  public function __construct() {
    parent::__construct();	
    $_SESSION[_SESSION_MENU_ACTIVE] = "master";
  }
  public function index() {
    $param['model'] = new model_restaurant();
    $l = new model_location();
    $param['cb_location'] = $l->_combobox("restaurant_location");
    $this->loadView("restaurant",$param);
  }
  public function insertAjaxForm() {
    $o['html'] = $this->bufferView("restaurant_insert");
    $this->output_json($o);
  }
  public function updateAjaxForm($id) {
    $model = new model_restaurant($id);
    $param['data'] = $model->data();
    $l = new model_location();
    $param['cb_location'] = $l->_combobox("restaurant_location",$param['data']['restaurant_location']);
    $o['html'] = $this->bufferView("restaurant_update",$param);
    $this->output_json($o);
  }
  public function deleteAjaxForm($id) {
    $model = new model_restaurant($id);
    $param['data'] = $model->data();
    $o['html'] = $this->bufferView("restaurant_delete",$param);
    $this->output_json($o);
  }
  public function inserting() {
    $model = new model_restaurant();
    $insert = $_POST;
    $model->inserting($insert);
    $this->forward("restaurant");
  }
  public function updating() {
    $model = new model_restaurant($_POST['restaurant_code']);
    $update = $_POST;    
    $model->updating($update);
    $this->forward("restaurant");
  }
  public function deleting() {
    $model = new model_restaurant($_POST['restaurant_code']);
    $model->deleting();
    $this->forward("restaurant");
  }
  
  
}
?>