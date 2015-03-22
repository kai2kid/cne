<?php
class model_credential extends basicModel {
//  protected $host = "192.168.9.10";
  protected $host = "localhost";
//  protected $path = "webservice";
  protected $model;
  protected $constructor;
  protected $data = "";
  protected $tb_name = "app_users";
  protected $dataPrefix = "user_";
  public function __construct($user) {
    $this->db_connect();
    $this->user = $user;
    $this->initdata();
  }
  public function initdata() {
    $qry = "SELECT * FROM ".$this->tb_name." WHERE user_username = '".$this->user."'";
    $tmp = $this->query_one($qry);
    if ($tmp != "" && count($tmp) > 0) {
      $this->data = $tmp;
    }    
  }
  public function login($pass) {    
    if ($this->password() == md5($pass)) {
      $ret = 1;
    } else {
      $ret = false;
    }
    return $ret;
  }
}
?>
