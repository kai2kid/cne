<?php
define("_DB_HOST","localhost");
define("_DB_USER","root");
define("_DB_PASS","");
define("_DB_NAME","fiesto_cne");
//define("_DB_HOST","localhost");
//define("_DB_USER","nathan_nathan");
//define("_DB_PASS","cOUdckPgQXzy");
//define("_DB_NAME","nathan_dbase");

// set timezone
date_default_timezone_set("asia/jakarta"); 

// Connect to server and select database.
$link = mysqli_connect(_DB_HOST, _DB_USER, _DB_PASS) or die("Connection Error!");
global $link;
mysqli_select_db($link, _DB_NAME)or die("Cannot select DB");

$q = new model_iquery($link);
global $q;


date_default_timezone_set("asia/jakarta"); // set timezone
?>