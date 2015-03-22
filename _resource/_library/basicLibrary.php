<?php

function isEmail($email) {
//  if (strpos($email,"@") > 0 && ) {
    
//  }
  return true;
}
function nvl($var,$default = "") {
  return ($var != "" && !is_null($var) ? $var : $default);
}                                

function _jenisKelamin($jk) {
  switch (strtoupper($jk)) {
    case "*" : { $ret = "Semua"; break; }
    case "M" : { $ret = "Laki-laki"; break; }
    case "L" : { $ret = "Laki-laki"; break; }
    case "F" : { $ret = "Perempuan"; break; }
    case "P" : { $ret = "Perempuan"; break; }
    default : $ret = $jk;
  }
  return $ret;
}

function makeFit($string,$size) {
  return substr($string,0,$size) . (strlen($string) > $size ? "..." : "");
}

function fetchDataset($array,$arrayField,$valueField) {
  $ret = "";
  foreach($array as $data) {
    if (is_array($data)) {
      $ret[$data[$arrayField]] = $data[$valueField];
    } else {
      $ret[$data->$arrayField] = $data->$valueField;
    }
  }
  return $ret;
}

?>