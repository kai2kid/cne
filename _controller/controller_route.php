<?php 
class controller_route extends basicController {
  public function __construct() {
    parent::__construct();
    $_SESSION[_SESSION_MENU_ACTIVE] = "master";
  }
  public function index() {
    $param['model'] = new model_route();
    $this->loadView("route",$param);
  }
  public function insertAjaxForm() {
    $o['html'] = $this->bufferView("route_insert");
    $this->output_json($o);
  }
  public function updateAjaxForm($id) {
    $model = new model_route($id);
    $param['data'] = $model->data();
    $o['html'] = $this->bufferView("route_update",$param);
    $this->output_json($o);
  }
  public function deleteAjaxForm($id) {
    $model = new model_route($id);
    $param['data'] = $model->data();
    $o['html'] = $this->bufferView("route_delete",$param);
    $this->output_json($o);
  }
  public function inserting() {
    $model = new model_route();
    $insert = $_POST;
    $insert['route_code'] = $model->autogenerate();
    $model->inserting($insert);
    $this->forward("route");
  }
  public function updating() {
    $model = new model_route($_POST['route_code']);
    $update = $_POST;
    $model->updating($update);
    $this->forward("route");
  }
  public function deleting() {
    $model = new model_route($_POST['route_code']);
    $model->deleting();
    $this->forward("route");
  }
}
?>