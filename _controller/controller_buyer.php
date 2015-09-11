<?php 
class controller_buyer extends basicController {
  public function __construct() {
    parent::__construct();
	$_SESSION[_SESSION_MENU_ACTIVE] = "master";   
  }
  public function index() {
    $param['model'] = new model_buyer();
    $this->loadView("buyer",$param);
  }
  
  public function formInsert() {
    $param['model'] = new model_buyer();    
	  $this->loadView("buyer_insert",$param);
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
    $insert['buyer_updated'] = date("Y-m-d H:i:s");
    $insert['buyer_updated_name'] = $_SESSION[_SESSION_USER];	
    $model->inserting($insert);
    if (isset($_FILES['photo']) && $_FILES['photo'] != "") {
      $photo = new Upload($_FILES['photo']); 
      if ($photo->uploaded) {
        $photo->file_new_name_body = $insert['buyer_code'];
        $photo->image_convert = "png";
        $photo->image_resize = true;
        $photo->image_x = 150;
        $photo->image_y = 150;
        $photo->image_ratio_no_zoom_in = true;
        $photo->image_ratio_fill = true;
        $photo->file_overwrite = true;
        $photo->Process(_PATH_IMAGE."/buyer/");
      }
    }
    $this->forward("buyer");
  }
  public function updating() {
    $model = new model_buyer($_POST['buyer_code']);
    $update = $_POST;    
	  $update['buyer_updated'] = date("Y-m-d H:i:s");
    $update['buyer_updated_name'] = $_SESSION[_SESSION_USER];
    $model->updating($update);
    if (isset($_FILES['photo']) && $_FILES['photo'] != "") {
      $photo = new Upload($_FILES['photo']); 
      if ($photo->uploaded) {
        $photo->file_new_name_body = $_POST['buyer_code'];
        $photo->image_convert = "png";
        $photo->image_resize = true;
        $photo->image_x = 150;
        $photo->image_y = 150;
        $photo->image_ratio_no_zoom_in = true;
        $photo->image_ratio_fill = true;
        $photo->file_overwrite = true;
        $photo->Process(_PATH_IMAGE."/buyer/");
      }
    }
    $this->forward("buyer");
  }
  public function deleting() {
    $model = new model_buyer($_POST['buyer_code']);
    $model->deleting();
    $this->forward("buyer");
  }
}
?>