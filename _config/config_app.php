<?php
  session_start();
  $_CONFIG["app"]["name"] = "cne";
  $_CONFIG["app"]["title"] = "CNE Tour and Travel | Admin Site";
  $_CONFIG["app"]["basepath"] = "http://localhost/fiesto/cne/";
  
  $_CONFIG["layout"]["default"] = "admin";
  $_CONFIG["login"]["must"] = 1;

  $_CONFIG["plugin"]["datatable"] = 1;
  $_CONFIG["plugin"]["tinyMCE"] = 0;

  global $_CONFIG;
  
  
//  error_reporting(0);     //Deployment
  error_reporting(E_ALL); //Development
  
?>