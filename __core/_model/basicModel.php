<?php
class basicModel extends model_iquery {
  protected $db_host;
  protected $db_user;
  protected $db_pass;
  protected $db_name;
  protected $tb_name;
  protected $dataPrefix = "";
  protected $data;
  static protected $field;
  static protected $primary_key;
  static protected $_link;

  protected function db_connect() {
    if (is_null($this->db_host)) $this->db_host = _DB_HOST;
    if (is_null($this->db_user)) $this->db_user = _DB_USER;
    if (is_null($this->db_pass)) $this->db_pass = _DB_PASS;
    if (is_null($this->db_name)) $this->db_name = _DB_NAME;
    $this->link = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name) or die ("<p style='background-color:red;color:white;font-size:14pt;padding:5px 0;text-align:center;font-weight:bold;'>Failed trying to connect to <u>" . $this->db_host . "</u>!</p>");
  }
  static public function staticInit() {
    $qry = "SHOW FULL COLUMNS FROM ".self::$tb_name.";";
    echo $qry;
    $sql = $this->query($qry);
    foreach($sql as $row) {
      self::$field[$row['Field']] = $row;
      self::$field[$row['Field']]["Type_1"] = substr($row['Type'],0,strpos($row['Type'],"("));
      self::$field[$row['Field']]["Type_2"] = substr($row['Type'],strpos($row['Type'],"(")+1,-1);
      if (strtoupper($row['Key']) == "PRI") self::$primary_key[] = $row['Field'];
    }    
    self::$_link = $this->link;
  }
  public function __CALL($name,$param) {
    $ret = "";
    if (!is_null($param)) {
      $ret = $this->get($this->dataPrefix . $name);
    } else {
      
    }
    return $ret;
  }
  public function __GET($name) { return $this->$name(); }
  public function get($attribute) { return (isset($this->data[$attribute]) && $this->data[$attribute] != "" ? $this->data[$attribute] : ""); }
  
  public function data() { return $this->data; }
  public function directory($param = "") {    
    $qry = "SELECT * FROM " . $this->tb_name . "";
    return $this->query($qry);
  }
  static public function combobox($dataset,$attr,$selected) {
    if ($qry == "*") $qry = "SELECT * FROM " . $tb_name;
    if (!is_array($dataset)) $sql = $this->query($qry);
    return HTML::combobox($dataset,$attr,$selected);
  }
  static public function input($fieldname,$attribute = "") {
    $attr['id'] = $fieldname;
    $attr['name'] = $fieldname;
    $attr['type'] = "text";
    if (strtoupper(self::$field[$fieldname]['Null']) == "NO") $attr['required'] = "required";
    $input = "input";
    echo self::$field[$fieldname]["Type_1"];
    switch(self::$field[$fieldname]["Type_1"]) {      
      case "date" : { 
        $attr['type'] = "date";
        $attr['value'] = $field;
        break; }
      case "char" : {}
      case "varchar" : { 
        $attr['type'] = "text";
        $attr['value'] = "text";
        break; }
      case "tinyint" : {}
      case "decimal" : {}
      case "int" : { 
        $attr['type'] = "number";
        break; }
      case "text" : { 
        $input = "textarea";
        break; }
    }
    if (is_array($attribute)) $attr = array_merge($attr,$attribute);
    return HTML::$input($attr);
  }
  
}

class model_iquery {
  protected $link;

  public function __construct($link) {
    $this->link = $link;
  }
  
  // standard query - select, show, describe, explain
  //    return: $result array
  public function query($sql = '') {
    $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link) . ': ' . $sql);
    if ($result) {
      $return = array();
      while ($row = mysqli_fetch_assoc($result))
        $return[] = $row;
      return $return;
    }
//    echo $sql;
    return $result;
  }

  // standard query - select, show, describe, explain
  //    return: one row of $result
  public function query_one($sql = '') {
    $result = mysqli_query($this->link, $sql.' LIMIT 1') or die(mysqli_error($this->link) . ': ' . $sql);
    if ($result) {
      $row = mysqli_fetch_assoc($result);
      return $row;
    }
//    echo $sql;
    return $result;
  }

  // quick query - insert, update, delete
  //    return: true or false;
  public function qq($sql = '') {
    $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link) . ': ' . $sql);
    return $result;
  }

  // dummy select function
  public function select($sql='') {
    return $this->query($sql);
  }

  // insert query
  //    return: "true" for success or "false" for fail
  public function insert($table = '', $vars = array()) {
    $sql = 'INSERT INTO ' . $table . ' ';
    $keys = array_keys($vars);
    $vals = array_values($vars);
    foreach ($vals as &$val)
      $val = $this->escape_and_quote($val);
    $sql .= '(' . implode(',',$keys) . ') VALUES (' . implode(',',$vals) . ')';
    echo $sql;
    return $this->query_exec($sql);
  }

  // update query
  //    return: "true" for success or "false" for fail
  public function update($table = '', $vars = array(), $where = '1=1') {
    $sql = 'UPDATE ' . $table . ' SET ';
    $set = array();
    foreach($vars as $key => $val)
      $set[] = ' ' . $key . '=' . $this->escape_and_quote($val) ;
    $sql .= implode(',',$set) . ' WHERE ' . $where;
//    echo $sql;
    return $this->query_exec($sql);
  }

  // update query
  //    return: "true" for success or "false" for fail
  public function delete($table, $where) {
    $sql = 'DELETE FROM ' . $table . ' WHERE ' . $where;
    return $this->query_exec($sql);
  }

  // get row count from query
  //    return: count of record from result
  public function rowCount($table = '', $where = '1=1') {
    $sql  = 'SELECT * FROM ' . $table . ' WHERE ' . $where;
    $row = mysqli_query($this->link, $sql) or die(mysqli_error($this->link) . ': ' . $sql);
    $ret = mysqli_num_rows($row);
    return $ret;
  }

  // returns one dimension array
  public function query_list($sql = '') {
    $result = $this->query($sql);
    if (count($result) == 0)
      return array();
    $return = array();
    if (count($result[0]) == 1) {
      foreach ($result as $row)
        $return[] = current($row);
      return $return;
    } else {
      foreach ($result as $row)
        $return[current($row)] = next($row);
      return $return;
    }
    return array();
  }

  private function query_exec($sql = '') {
    $result = mysqli_query($this->link, $sql);
//    echo $sql;
    if ($result === false) {
      echo "Query Error :" .$sql;
      //debug(mysqli_error($this->link) . ': ' . $sql);
    }
    return $result;
  }

  /*
  protected function query_single($sql = '') {
    $result = query($sql);
    if ($result)
      return current($result);
    return $result;
  }

  protected function query_value($sql = '') {
    $result = query_single($sql);
    if ($result)
      return current($result);
    return empty($result) ? null : $result;
  }
  */

  public function insert_id() {
    return mysqli_insert_id($this->link);
  }

  public function affected_rows() {
    return mysqli_affected_rows();
  }

  public function escape_and_quote($val) {
    if (is_string($val))
      return '\'' . mysqli_real_escape_string($this->link, $val) . '\'';
    else if (is_array($val) && count($val) == 1)
      return current($val);
    return $val;
  }
  
}
?>
