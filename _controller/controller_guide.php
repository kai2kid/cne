<?php 
class controller_guide extends basicController {
  public function __construct() {
    parent::__construct();
  }
  public function index() {
    $param['model'] = new model_guide();
    $this->loadView("guide",$param);
  }
  public function insertAjaxForm() {
    $o['html'] = $this->bufferView("guide_insert");
    $this->output_json($o);
  }
  public function updateAjaxForm($id) {
    $model = new model_guide($id);
    $param['data'] = $model->data();
    $o['html'] = $this->bufferView("guide_update",$param);
    $this->output_json($o);
  }
  public function deleteAjaxForm($id) {
    $model = new model_guide($id);
    $param['data'] = $model->data();
    $o['html'] = $this->bufferView("guide_delete",$param);
    $this->output_json($o);
  }
  public function inserting() {
    $model = new model_guide();
    $insert = $_POST;
    $insert['guide_code'] = $model->autogenerate();
    $insert['guide_updated'] = date("Y-m-d H:i:s");
    $insert['guide_updated_name'] = $_SESSION[_SESSION_USER];
    $model->inserting($insert);
//    $this->forward("guide");
  }
  public function updating() {
    $model = new model_guide($_POST['guide_code']);
    $update = $_POST;
    $insert['guide_updated'] = date("Y-m-d H:i:s");
    $insert['guide_updated_name'] = $_SESSION[_SESSION_USER];
    $model->updating($update);
    $this->forward("guide");
  }
  public function deleting() {
    $model = new model_guide($_POST['guide_code']);
    $model->deleting();
    $this->forward("guide");
  }
}
?>