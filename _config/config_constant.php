<?php
  ///CONSTANT///
  define("_APP_TITLE",$_CONFIG['app']['title']);
  define("_APP_NAME",$_CONFIG['app']['name']);
  define("_APP_BASEPATH",$_CONFIG['app']['basepath']);
  define("_CONFIG_LAYOUT",$_CONFIG['layout']['default']);

  define('_SESSION_USER', _APP_NAME . '_username');
  define('_SESSION_USERID', _APP_NAME . '_userID');
  define('_SESSION_NAME', _APP_NAME . '_name');
  define('_SESSION_ROLE', _APP_NAME . '_role');
  define('_SESSION_MENU', _APP_NAME . '_menu');
  define('_SESSION_VIEW', _APP_NAME . '_viewed');
  define('_SESSION_MENU_ACTIVE', _APP_NAME . '_activemenu');
  
//  define('_URL_BASE', 'localhost/alumni/');
  
  global $_menu;
?>