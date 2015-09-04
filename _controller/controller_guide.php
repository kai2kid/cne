<?php 
class controller_guide extends basicController {
  public function __construct() {
    parent::__construct();
    $_SESSION[_SESSION_MENU_ACTIVE] = "master";
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
    if (isset($_FILES['photo']) && $_FILES['photo'] != "") {
      $photo = new Upload($_FILES['photo']); 
      if ($photo->uploaded) {
        $photo->file_new_name_body = $insert['guide_code'];
        $photo->image_convert = "png";
        $photo->image_resize = true;
        $photo->image_x = 150;
        $photo->image_y = 150;
        $photo->image_ratio_no_zoom_in = true;
        $photo->image_ratio_fill = true;
        $photo->file_overwrite = true;
        $photo->Process(_PATH_IMAGE."/guide/");
      }
    }
    $this->forward("guide");
  }
  public function updating() {
    $model = new model_guide($_POST['guide_code']);
    $update = $_POST;
    $update['guide_updated'] = date("Y-m-d H:i:s");
    $update['guide_updated_name'] = $_SESSION[_SESSION_USER];
    $model->updating($update);
    if (isset($_FILES['photo']) && $_FILES['photo'] != "") {
      $photo = new Upload($_FILES['photo']); 
      if ($photo->uploaded) {
        $photo->file_new_name_body = $_POST['guide_code'];
        $photo->image_convert = "png";
        $photo->image_resize = true;
        $photo->image_x = 150;
        $photo->image_y = 150;
        $photo->image_ratio_no_zoom_in = true;
        $photo->image_ratio_fill = true;
        $photo->file_overwrite = true;
        $photo->Process(_PATH_IMAGE."/guide/");
      }
    }
    $this->forward("guide");
  }
  public function deleting() {
    $model = new model_guide($_POST['guide_code']);
    $model->deleting();
    $this->forward("guide");
  }
}
?>