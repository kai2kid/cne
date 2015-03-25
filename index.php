<?php 
  require_once("_config/_config.php");
  
  $tmp = explode("_",$_GET['param']);
  if (isset($tmp[0]) && $tmp[0] != "") { 
    $tmp2 = explode("~",$tmp[0]);
  }    
  if (isset($tmp[1]) && $tmp[1] != "") { 
    $tmp3 = explode("~",$tmp[1]);
  }    
  $controller = (isset($tmp2[0]) && $tmp2[0] != "" ? $tmp2[0] : "index") ;
  $_controller = (isset($tmp2[1]) && $tmp2[1] != "" ? $tmp2[1] : "") ;
  $module = (isset($tmp3[0]) && $tmp3[0] != "" ? $tmp3[0] : "index") ;
  $_module = (isset($tmp3[1]) && $tmp3[1] != "" ? $tmp3[1] : "") ;
  
  if ($_CONFIG['login']['must']) {
    if((!isset($_SESSION[_SESSION_USER]) || $_SESSION[_SESSION_USER] == "") && $controller != "credential") {
      $_SESSION['url_next'] = $controller;
      $controller = "credential";
    }
  } 
  $file_name = "controller_$controller.php";
  if (file_exists(_PATH_CONTROLLER . $file_name)) {
    include_once(_PATH_CONTROLLER . $file_name);
  }
  eval("\$controller = new controller_".$controller."('".$_controller."');");  
  //test
?>
<?php $controller->invoke($module,$_module); ?>