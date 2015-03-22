<?php 
class controller_staff extends basicController {
  public function __construct() {
    parent::__construct();
    $_SESSION[_SESSION_MENU_ACTIVE] = "master";
  }
  public function index() {
    $param['model'] = new model_staff();
    $this->loadView("staff",$param);
  }
  public function insertAjaxForm() {
    $o['html'] = $this->bufferView("staff_insert");
    $this->output_json($o);
  }
  public function updateAjaxForm($id) {
    $model = new model_staff($id);
    $param['data'] = $model->data();
    $o['html'] = $this->bufferView("staff_update",$param);
    $this->output_json($o);
  }
  public function deleteAjaxForm($id) {
    $model = new model_staff($id);
    $param['data'] = $model->data();
    $o['html'] = $this->bufferView("staff_delete",$param);
    $this->output_json($o);
  }
  public function inserting() {
    $model = new model_staff();
    $insert = $_POST;
    $insert['staff_code'] = $model->autogenerate();
    $insert['staff_updated'] = date("Y-m-d H:i:s");
    $insert['staff_updated_name'] = $_SESSION[_SESSION_USER];
    $model->inserting($insert);
    $this->forward("staff");
  }
  public function updating() {
    $model = new model_staff($_POST['staff_code']);
    $update = $_POST;
    $insert['staff_updated'] = date("Y-m-d H:i:s");
    $insert['staff_updated_name'] = $_SESSION[_SESSION_USER];
    $model->updating($update);
    $this->forward("staff");
  }
  public function deleting() {
    $model = new model_staff($_POST['staff_code']);
    $model->deleting();
    $this->forward("staff");
  }
}
?>