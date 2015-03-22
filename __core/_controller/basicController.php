<?php
require_once(_PATH_LIBRARY_LOADER);
class basicController {
  protected $view;
  protected $config;
  protected $className = "";             
  protected $layout = "_layout";
  public function __construct() {
    global $_CONFIG;
    $this->className = str_replace("controller_","",get_class($this));
    $this->config = $_CONFIG;
  }                        
  
  public function __CALL($name,$param) {
    if ($this->className != "index") {
      if ($name != "index") {
        $name = $this->className;
      } else {
        $name = $this->className . "_" . $name;
      }
    }
    $this->loadView($name,$param);  
  }

  protected function index() {
    $this->loadView($this->className);
  }
  
  public function invoke($name="",$param = "") {
    if ($name == "") $name = "index";
    eval(" if (function_exists(\$this->".$name."('$param'))) { \$this->".$name."('$param'); } ");
  }  
  
  protected function loadConfig($configName = "*") {
    if ($configName == "*") {
      include_once("./_config/_config.php");
    } else {
      include_once("./_config/config_" . $configName.".php");
    }
  }
  protected function loadScript($scriptName = "*") {
    if ($scriptName == "*") {
      include_once(_PATH_SCRIPT_LOADER);
    } else {
      echo HTML::script(array("src"=>_PATH_SCRIPT . "script_" . $scriptName . ".js"));
    }
  }
  protected function loadStyle($styleName = "*") {
    if ($styleName == "*") {
      include_once(_PATH_STYLE_LOADER);
    } else {
      echo HTML::css(array("href"=>_PATH_STYLE . "style_" . $styleName . ".css"));
    }
  }  
  protected function loadLibrary($libraryName = "*") {
    if ($libraryName == "*") {
      include_once(_PATH_LIBRARY_LOADER);
    } else {
      include_once(_PATH_LIBRARY . "library_" . $libraryName . ".php");
    }
  }
  protected function loadModel($modelName) {
    include_once(_PATH_MODEL . "model_" . $modelName . ".php");
  }
  protected function bufferView($viewName,$arrayParam = "",$layout = "") {
    if ($arrayParam != "") extract($arrayParam);
    ob_start();
    
    $file_name = "view_" . $viewName . ".php";
    if (file_exists(_PATH_VIEW.$file_name)) {
      include_once(_PATH_VIEW . "view_" . $viewName . ".php");
    } else if (file_exists(_PATH_CORE_VIEW.$file_name)) { 
      include_once(_PATH_CORE_VIEW . "view_" . $viewName . ".php");
    }
    return ob_get_clean();
  }  
  protected function loadView($viewName,$arrayParam = "",$layout = "") {
    if ($arrayParam != "") extract($arrayParam);
    ob_start();
    
    $file_name = "view_" . $viewName . ".php";
    if (file_exists(_PATH_VIEW.$file_name)) {
      include_once(_PATH_VIEW . "view_" . $viewName . ".php");
    } else if (file_exists(_PATH_CORE_VIEW.$file_name)) { 
      include_once(_PATH_CORE_VIEW . "view_" . $viewName . ".php");
    }
    $this->view = ob_get_clean();
    
    $this->loadLayout($layout);
  }  
  protected function loadLayout($layoutName = "") {
    if ($layoutName == "") $layoutName = $this->config['layout']['default'];
    if (!isset($page_title)) $page_title = $this->config["app"]["title"];
    $_view = $this->view;
    $this->loadConfig();
    if (isset($_GET['ajax'])) {
      echo $_view;
    } else {
      include_once(_PATH_LAYOUT . $layoutName . "/index.php");
      $this->loadStyle();
    }
    $this->loadScript();  
    $this->alert();
  }  
  protected function forward($URL="./") {
//    header("Location: $URL");
echo "<script>document.location = '$URL'</script>";
  }
  protected function alert($alert = "") {
    if ($alert == "") {
      if (isset($_SESSION['_alert']) && $_SESSION['_alert'] != "") {
        echo "<script>alert('".$_SESSION['_alert']."');</script>";
        $_SESSION['_alert'] = "";
        unset($_SESSION['_alert']);
      }
    } else {
      $_SESSION['_alert'] = $alert;
    }
  }
  protected function credential($role,$session = "",$redirectURL = "./") {
    if ($session == "") $session = $_SESSION[_SESSION_ROLE];
    if (!in_array($role,$session)) {
      $this->forward($redirectURL);
    }        
  }
  protected function output_json($o) {
    header('Content-type: application/x-json');
    echo json_encode($o);    
  }
}
?>