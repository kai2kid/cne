<?php 
class controller_dtransport extends basicController {  
  public $self = "dtransport";
  public $parent = "transport";
  public $p_code = "";
  public $prefix = "dtransport";  
  public $pk = "vehicle_code";
  public $p_pk = "transport_code";
  public $location;
  public function __construct($code="") {
    parent::__construct();
    if ($code != "") $this->p_code = $code;
    $_SESSION[_SESSION_MENU_ACTIVE] = "master";
    $this->location = new model_location();
  }
  public function index() {
    eval('$model = new model_'.$this->self.'($this->p_code);');    
    $param['model'] = $model;
    $v = new model_dtransport();
    $param['type'] = $v->directory();
    $l = new model_location();
    $param['cb_location'] = $l->_combobox("vehicle_location");
    $this->loadView($this->prefix,$param);
  }
  public function insertAjaxForm() {
    $o['html'] = $this->bufferView($this->prefix."_insert",$param);
    $this->output_json($o);
  }
  public function updateAjaxForm($id) {
    eval('$model = new model_'.$this->self.'($this->p_code,$id);');
    $param['data'] = $model->data();
    $v = new model_dtransport();
    $param['type'] = $v->directory();
    $l = new model_location();
    $param['cb_location'] = $l->_combobox("vehicle_location",$param['data']['vehicle_location']);
    $o['html'] = $this->bufferView($this->prefix."_update",$param);
    $this->output_json($o);                       
  }
  public function deleteAjaxForm($id) {
    eval('$model = new model_'.$this->self.'($this->p_code,$id);');
    $param['data'] = $model->data();
    $o['html'] = $this->bufferView($this->prefix."_delete",$param);
    $this->output_json($o);
  }
  public function inserting() {
    eval('$model = new model_'.$this->self.'($_POST[$this->p_pk]);');
    $insert = $_POST;
    $model->inserting($insert);
    $this->forward($this->prefix."~".$_POST[$this->p_pk]);
  }
  public function updating() {
    eval('$model = new model_'.$this->self.'($_POST[$this->p_pk],$_POST[$this->pk]);');
    $update = $_POST;
    $model->updating($update);
    $this->forward($this->prefix."~".$_POST[$this->p_pk]);
  }
  public function deleting() {
    eval('$model = new model_'.$this->self.'($_POST[$this->p_pk],$_POST[$this->pk]);');
    $model->deleting();
    $this->forward($this->prefix."~".$_POST[$this->p_pk]);
  }  
}
?>