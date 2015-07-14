<?php 
class controller_dhotel extends basicController {  
  public $self = "dhotel";
  public $parent = "hotel";
  public $p_code = "";
  public $prefix = "dhotel";  
  public $pk = "room_code";
  public $p_pk = "hotel_code";
  public function __construct($code="") {
    parent::__construct();
    $_SESSION[_SESSION_MENU_ACTIVE] = "master";
    if ($code != "") $this->p_code = $code;
  }
  public function index() {
    eval('$model = new model_'.$this->self.'($this->p_code);');    
    $modelperiod = new model_dhotelperiod($this->p_code);
    $param['model'] = $model;
    $param['model2'] = $modelperiod;
    $this->loadView($this->prefix,$param);
  }
  public function insertAjaxForm() {
    $o['html'] = $this->bufferView($this->prefix."_insert");
    $this->output_json($o);
  }
  public function updateAjaxForm($id) {
    eval('$model = new model_'.$this->self.'($this->p_code,$id);');
    $param['data'] = $model->data();
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