<?php 
class controller_credential extends basicController {
  public function __construct() {
    parent::__construct();
  }
  protected function index() {
    $_SESSION[_SESSION_NAME] = "";
    $_SESSION[_SESSION_USER] = "";
    $_SESSION[_SESSION_ROLE] = "";
    $_SESSION[_SESSION_MENU] = "";
    $_SESSION[_SESSION_MENU_ACTIVE] = "";
    $this->loadView("login","","login");
  }
  protected function logout() {
    $_SESSION[_SESSION_NAME] = "";
    $_SESSION[_SESSION_USER] = "";
    $_SESSION[_SESSION_ROLE] = "";
    $_SESSION[_SESSION_MENU] = "";
    $_SESSION[_SESSION_MENU_ACTIVE] = "";
    $this->forward("./");
  }
  protected function authenticate() {
//    if (isset($_POST['login_username']) && $_POST['login_username'] != "") {
      $forwardURL = "./";

//      $credential = new model_credential($_POST['login_username']);      
//      $login_status = $credential->login($_POST['login_password']);
//      if ($login_status == 1) {
        $_SESSION[_SESSION_USER] = $_POST['login_username'];
        $_SESSION[_SESSION_ROLE] = "admin";
//        $_SESSION[_SESSION_ROLE] = $credential->role();
        $_SESSION[_SESSION_NAME] = "Administrator";
//        $_SESSION[_SESSION_NAME] = $credential->name();
        global $_menu;
        if ($_SESSION[_SESSION_ROLE] != "") {
          foreach($_menu as $name=>$attr) {
            $r = explode(",",$attr->role);
            if (in_array($_SESSION[_SESSION_ROLE],$r)) {
              $nav[$name] = $attr;
            }
          }     
        }
        $_SESSION[_SESSION_MENU] = $nav;
        $_SESSION[_SESSION_MENU_ACTIVE] = "home";

//        if (isset($_SESSION['url_next']) && $_SESSION['url_next'] != "") {
//          $forwardURL = $_SESSION['url_next'];
//          unset($_SESSION['url_next']);
//        }
//      }
      
      if (isset($alert) && $alert != "") $this->alert($alert);
      $this->forward($forwardURL);
//    }
  }
}
?>