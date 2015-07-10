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
    $o['script'] = "";
    $o['script'] .= "$('#route_path2').tokenInput('location_selecting', {theme:'facebook'});  ";
    $o['script'] .= "
      $('#route_path2').change(function(){
        
        $('#route_path_code2').val($(this).val());
    
        listCode = $(this).val().split(';');
    
        $('#route_start2').val(listCode[0]);
        $('#route_end2').val(listCode[listCode.length-1]);
      });
    ";
    $data = $model->data();
    $path = $data['route_path'];
    if ($path != "") {
      $tmp = explode(";",$path);
      foreach ($tmp as $p) {
        $location = new model_location($p);
        $o['script'] .= "$('#route_path2').tokenInput('add', {id: '".$location->data['location_code']."', name: '".$location->data['location_name']."'});";
      }
    }
    /*/
    /*/
    
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