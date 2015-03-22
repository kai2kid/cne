<?php
class model_master extends basicModel {
//  protected $db_user = "root";
//  protected $db_pass = "";
//  protected $db_name = "db_stts";
  protected   $tb_name;
  public      $tb_alias;
  public      $id;
  protected   $name;
  public      $fields;
  protected   $fd_hidden;
  protected   $fd_hidden_directory;
  protected   $fd_hidden_detail;
  protected   $fd_prefix;
  public      $fd_primary;
  protected   $config;
  public      $show;
  public      $hide;
  public      $index = 0;
  
  public function __construct($name,$id="") {
    $this->name = $name;
    $this->db_connect();
    $this->loadConfig();
    $this->initModel();
    if ($id != "") $this->initData($id);
  }
  public function loadConfig() {
    global $_master;
    $this->config = $_master[$this->name];
  }
  public function initModel() {
    $this->tb_name = ($this->config->table_name != "" ? $this->config->table_name : $this->name);
    $this->tb_alias = ($this->config->table_alias != "" ? $this->config->table_alias : $this->name);
    $this->fd_prefix = ($this->config->fields->prefix != "" ? $this->config->fields->prefix : "");
    
    $qry = "SHOW FIELDS FROM " . $this->tb_name;
    $fields = $this->query($qry);
    foreach ($fields as $field) {
      
      $this->fields[$field['Field']] = new stdClass();
      $this->fields[$field['Field']]->index = $this->index();
      $this->fields[$field['Field']]->name = $field['Field'];
      $this->fields[$field['Field']]->alias = ($this->fd_prefix != "" ? ucwords(str_replace("_"," ",str_replace($this->fd_prefix,"",$field['Field']))): $field['Field']);

      $type = $field['Type'];
      $size = 0;
      if (strpos($field['Type'],"(") > 0) {
        $type = substr($field['Type'],0,strpos($field['Type'],"("));
        $size = substr($field['Type'],strpos($field['Type'],"(")+1,strpos($field['Type'],")")-strpos($field['Type'],"(")-1);
      }
      $this->fields[$field['Field']]->type = $type;
      $this->fields[$field['Field']]->size = $size;
      $this->fields[$field['Field']]->null = ($field['Null'] == "YES" ? 1 : 0);
      $this->fields[$field['Field']]->key = $field['Key'];
      $this->fields[$field['Field']]->default = $field['Default'];
      if ($field['Key'] == "PRI") {
        $this->fd_primary = $field['Field'];
      }
    }
    //hidden fields
    $this->show["directory"] = $this->config->fields->directory->show;
    $this->show["detail"] = $this->config->fields->detail->show;
    $this->show["insert"] = $this->config->fields->insert->show;
    $this->show["update"] = $this->config->fields->update->show;
    $this->show["delete"] = $this->config->fields->delete->show;
    $this->hide["*"] = $this->config->fields->hide;
    $this->hide["directory"] = $this->config->fields->directory->hide;
    $this->hide["detail"] = $this->config->fields->detail->hide;
    $this->hide["insert"] = $this->config->fields->insert->hide;
    $this->hide["update"] = $this->config->fields->update->hide;
    $this->hide["delete"] = $this->config->fields->delete->hide;
        
    //fields alias
    foreach($this->config->fields->alias as $name => $alias) {
      $this->fields[$name]->alias = $alias;
    }
  }  
  public function initData($id) {
    $this->id = $id;
    $qry = "SELECT * FROM " . $this->tb_name;
    $qry .= " WHERE " . $this->fd_primary . " = '$id'";
    $this->data = $this->query_one($qry);    
  }
  
  public function name() { return $this->name; }
  public function index() { return ++$this->index; }
  public function fields($mode = "") {
    $fields = array();
    switch ($mode) {
      case "directory" : {
        if (isset($this->show[$mode]) && $this->show[$mode] != "" && count($this->show[$mode]) > 0) {
          
        }
        if (isset($this->show["*"]) && $this->show["*"] != "" && count($this->show["*"]) > 0) {
          
        }
        
        foreach ($this->fields as $field) {
          if (in_array($field->name,$this->show[$mode]) ) {            
            if (!in_array($field->name,$this->hide[$mode]) && !in_array($field->name,$this->hide["*"]))  {
              $fields[] = $field;
            }
          }
        }
        break; }
      case "insert" : {}
      case "update" : {}
      case "detail" : {
        foreach ($this->fields as $field) {
          if (!in_array($field->name,$this->fd_hidden_detail) && !in_array($field->name,$this->fd_hidden))  {
            $fields[] = $field;
          }
        }
        break; }
      default : {
        foreach ($this->fields as $field) {
          if (!in_array($field->name,$this->fd_hidden))  {
            $fields[] = $field;
          }
        }
      }
    }
    return $fields;
  }
  public function directory($param = "") {
    $select_foreign = "";
    $join = "";
    $foreign = array();
    if ($this->config->fields->foreign != "") {
      foreach ($this->config->fields->foreign as $field_key => $field_foreign) {
        $foreign[] = $field_key;
        $join .= " LEFT JOIN " . $field_foreign['tb_name'];
        $join .= " ON " . $field_foreign['tb_name'] . "." . $field_foreign['fd_key'] . " = " . $this->tb_name . "." . $field_key;
        $select_foreign .= ", " . $field_foreign['tb_name'] . "." . $field_foreign['fd_value'] . " AS " . $field_key;
      }
    }
    foreach ($this->fields("directory") as $field) {
      if (!in_array($field->name,$foreign)) {
        $fields[] = $field->name;
      }
    }
    $select = implode(",",$fields);
    $qry = "SELECT " . $select . ($select_foreign != "" ? $select_foreign : "");
    $qry .= " FROM " . $this->tb_name . ($join != "" ? $join : "");
    return $this->query($qry);
  }

  public function inserting($param) { 
    foreach($this->fields("insert") as $field) {
      if (isset($param["field_".$field->index]) && $param["field_".$field->index] != "") {
        $insert[$field->name] = $param["field_".$field->index];
      }
    }
    return $this->insert($this->tb_name,$insert);
  }
  public function updating($param) {
    $where = "";
    foreach($this->fields("detail") as $field) {
      if ($field->name != $this->fd_primary) {
        switch ($field->type) {
          case "tinyint" ; { $value = (isset($param["field_".$field->index]) && $param["field_".$field->index] == "on" ? 1 : 0); break; }
          default : {
            if (isset($param["field_".$field->index]) && $param["field_".$field->index] != "") {
              $value = $param["field_".$field->index];
            }            
          }
        }
        $update[$field->name] = $value;
      } else {
        $where = $this->fd_primary . "='".$param["field_".$field->index]."'";
      }
    }
    $ret = 0;
    if ($where != "") {
      $ret = $this->update($this->tb_name,$update,$where);
    }
    return $ret;
  }
  public function deleting() { return 1;
  }
} 
?>