<?php 
class controller_shop extends basicController {
  public function __construct() {
    parent::__construct();
    $_SESSION[_SESSION_MENU_ACTIVE] = "master";
  }
  public function index() {
    $param['model'] = new model_shop();
    $l = new model_location();
    $param['cb_location'] = $l->_combobox("shop_location");
    $this->loadView("shop",$param);
  }
  public function insertAjaxForm() {
    $o['html'] = $this->bufferView("shop_insert");
    $this->output_json($o);
  }
  public function updateAjaxForm($id) {
    $model = new model_shop($id);
    $param['data'] = $model->data();
    $l = new model_location();
    $param['cb_location'] = $l->_combobox("shop_location",$param['data']['shop_location']);
    $o['html'] = $this->bufferView("shop_update",$param);
    $this->output_json($o);
  }
  public function deleteAjaxForm($id) {
    $model = new model_shop($id);
    $param['data'] = $model->data();
    $o['html'] = $this->bufferView("shop_delete",$param);
    $this->output_json($o);
  }
  public function inserting() {
    $model = new model_shop();
    $insert = $_POST;
    $insert['shop_code'] = $model->autogenerate();  
    $insert['shop_updated'] = date("Y-m-d H:i:s");
    $insert['shop_updated_name'] = $_SESSION[_SESSION_USER];	
    $model->inserting($insert);
    $this->forward("shop");
  }
  public function updating() {
    $model = new model_shop($_POST['shop_code']);
    $update = $_POST;    
	$update['shop_updated'] = date("Y-m-d H:i:s");
    $update['shop_updated_name'] = $_SESSION[_SESSION_USER];
    $model->updating($update);
    $this->forward("shop");
  }
  public function deleting() {
    $model = new model_shop($_POST['shop_code']);
    $model->deleting();
    $this->forward("shop");
  }
}
?>