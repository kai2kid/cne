<?php
class configMaster_field {
  public $size;
  public $type;
  public $value;  
  public $onclick;
}
class configMaster_fieldsopt {
  public $hide = array();
  public $show = array();
  public $alias = array();
  public $placeholder = array();
}
class configMaster_fields {
  public $prefix;
  public $list;
  public $alias = array();
  public $type = array();
  public $size = array();
  public $show = array();
  public $hide = array();
  public $autogenerate;
//  public $hide_directory = array();
//  public $hide_detail = array();
  public $foreign = array();
  public $directory;
  public $detail;
  public $insert;
  public $update;
  public $delete;
  /** Table's primary key */
  public $pk;
  
  public function __construct() {
    $this->directory = new configMaster_fieldsopt();
    $this->detail = new configMaster_fieldsopt();
    $this->insert = new configMaster_fieldsopt();
    $this->update = new configMaster_fieldsopt();
    $this->delete = new configMaster_fieldsopt();
//    $this->delete = (array) new configMaster_field();
  }
  
  /** @param array $aFields Array list of fields to be added */
  public function add(array $aFields) {
//    $this->directory = $aFields;
  }
  /** @param array $aFields Array list of fields shown when showing master's directory */
//  public function directory(array $aFields) {
//    $this->directory = $aFields;
//  }

  /** @param array $aFields Array list of field's name as the array keys and field's alias as the array values */
  public function alias(array $aFields) {
    $this->alias = $aFields;
  }

  /** @param array $aFields Array list of field's name as the array keys and field's type as the array values */
  public function type(array $aFields) {
    $this->type = $aFields;
  }

  /** @param array $aFields Array list of field's name as the array keys and field's size as the array values */
  public function size(array $aFields) {
    $this->size = $aFields;
  }

  /** @param array $aFields Array list of field's name to be hidden from everywhere */
  public function hide(array $aFields) {
//    $this->hide = $aFields;
  }
}
class configMaster {
  public $table_name = "";
  public $table_alias = "";
  public $data_prefix = "";
  public $fields;
  public function __construct() {
    $this->fields = new configMaster_fields();    
  }  
}
?>