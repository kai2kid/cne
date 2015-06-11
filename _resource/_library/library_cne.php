<?php
  function text_transportType($type) {
    switch ($type) {
      case "1" : { $ret = ""; break; }
    }
  }
  function text_hotelLevel($type,$long = 1) {
    switch ($type) {
      case "3" : { $ret = ($long ? "Budget" : "B"); break; }
      case "4" : { $ret = ($long ? "Deluxe" : "D"); break; }
      case "5" : { $ret = ($long ? "Super Deluxe" : "SD"); break; }
      default : { $ret = $type; break; }
    }
    return $ret;
  }
  function text_mealLevel($type,$long = 1) {
    switch ($type) {
      case "1" : { $ret = ($long ? "Breakfast" : "B"); break; }
      case "2" : { $ret = ($long ? "Lunch" : "L"); break; }
      case "3" : { $ret = ($long ? "Dinner" : "D"); break; }
      default : { $ret = $type; break; }
    }
    return $ret;
  }
?>
