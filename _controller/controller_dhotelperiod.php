<?php 
class controller_dhotelperiod extends basicController {  
  public $self = "dhotelperiod";
  public $parent = "hotel";
  public $p_code = "";
  public $prefix = "dhotelperiod";  
  public $pk = "period_id";
  public $p_pk = "hotel_code";
  public function __construct($code="") {
    parent::__construct();
    if ($code != "") $this->p_code = $code;
  }
  public function index() {
    eval('$model = new model_'.$this->self.'($this->p_code);');    
    $param['model'] = $model;
    $this->loadView($this->prefix,$param);
  }
  public function insertAjaxForm() {
    eval('$model = new model_'.$this->self.'($this->p_code);');    
    $param['model'] = $model;
    $o['html'] = $this->bufferView($this->prefix."_insert",$param);
    $this->output_json($o);
  }
  public function updateAjaxForm($id) {
    eval('$model = new model_'.$this->self.'($this->p_code,$id);');
    $data = $model->data();
    $tmp = explode("-",$data['period_start']);
    $data['period_startd'] = $tmp[1];
    $data['period_startm'] = $tmp[0];
    $tmp = explode("-",$data['period_end']);
    $data['period_endd'] = $tmp[1];
    $data['period_endm'] = $tmp[0];
    $param['data'] = $data;
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
    $_POST["period_start"] = $_POST["period_startm"] . "-" . $_POST["period_startd"];
    $_POST["period_end"] = $_POST["period_endm"] . "-" . $_POST["period_endd"];
    unset($_POST['period_startd']);
    unset($_POST['period_startm']);
    unset($_POST['period_endd']);
    unset($_POST['period_endm']);
    $insert = $_POST;
    
    $model->inserting($insert);
    $this->forward("dhotel~".$_POST[$this->p_pk]);
  }
  public function updating() {
    eval('$model = new model_'.$this->self.'($_POST[$this->p_pk],$_POST[$this->pk]);');
    $_POST["period_start"] = $_POST["period_startm"] . "-" . $_POST["period_startd"];
    $_POST["period_end"] = $_POST["period_endm"] . "-" . $_POST["period_endd"];
    unset($_POST['period_startd']);
    unset($_POST['period_startm']);
    unset($_POST['period_endd']);
    unset($_POST['period_endm']);
    $update = $_POST;
    $model->updating($update);
    $this->forward("dhotel~".$_POST[$this->p_pk]);
  }
  public function deleting() {
    eval('$model = new model_'.$this->self.'($_POST[$this->p_pk],$_POST[$this->pk]);');
    $model->deleting();
    $this->forward("dhotel~".$_POST[$this->p_pk]);
  }  
}
?>