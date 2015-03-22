<?php
class HTML {
  public function __CALL($name,$param) {
    if (substr($name,0,1) == "_") {
      $form = substr($name,1);
      $html = "</".$form.">";
    }    
    return $html;
  }
  static function img($attr = "", $baseurl = _PATH_IMAGE) {
    $html = "<img ";
    foreach ($attr as $key=>$value) {
      if ($key == "src" && strtolower(substr($value,0,4)) != "http") $html .= $key . "=\"".$baseurl . $value."\" ";
      $html .= $key . "=\"".$value."\" ";
    }
    $html .= ">";
    return $html;
  }
  
  static function a($attr = "") {
    $html = "<a ";
    foreach ($attr as $key=>$value) {
      $html .= $key . "='".$value."' ";
    }
    $html .= ">";
    return $html;
  }
  static function _a() { return "</a>"; }
  
  static function combobox($dataset,$attr,$selected = "",$firstRow = array(""=>"")) {
    $html = "<select ";
    if ((!isset($attr["id"]) || $attr["id"] == "") && (isset($attr["name"]) && $attr["name"] != "")) { $attr["id"] = $attr["name"]; }
    if ((!isset($attr["name"]) || $attr["name"] == "") && (isset($attr["id"]) && $attr["id"] != "")) { $attr["name"] = $attr["id"]; }
    foreach ($attr as $key=>$value) {
      $html .= $key . "='".$value."' ";
    }
    $html .= ">";

    $isAssociative = false;
    $i = 0;
    if (count($dataset) > 0 && $dataset != "") {
      foreach($dataset as $value=>$text) {
        if ($value != $i++) $isAssociative = true;
      }      
    }
	  $ada = false;
	  $opt = "";
	  if ($firstRow) {
      foreach ($firstRow as $key => $text) {
        $s = "";
        if (strtolower($selected) == strtolower($key) || strtolower($selected) == strtolower($value)) { $s = "selected"; $ada = true; }
        $opt .= "<option value='$key' $s>$text</option>";
      }
    }
    if (count($dataset) > 0 && $dataset != "") {
      foreach($dataset as $value=>$text) {
        if (!$isAssociative) $value = $text;
	      if (strtolower($selected) == strtolower($value)) {
		      $s = "selected";
		      $ada = true;
	      } else {
		      $s = "";
	      }
        $opt .= "<option value='".$value."' ".$s.">".$text."</option>";      
      }
    }
	  if (!$ada) {
		  $html .= "<option value='".$selected."' selected>".$selected."</option>";      
	  }
    $html .= $opt;
    $html .= "</select>";
    return $html;
  }

  static function checkbox($attr) {
    $html = "<input type='checkbox' ";
    foreach ($attr as $key=>$value) {
      if ($key == "value") {
        $html .= ($value == 1 ? " checked " : "");
      } else {
        $html .= $key . "=\"".$value."\" ";
      }            
    }
    $html .= ">";
    return $html;
  }
  static function input($attr) {
    $html = "<input ";
    foreach ($attr as $key=>$value) {
      $html .= $key . "=\"".$value."\" ";
    }
    $html .= ">";
    return $html;
  }
  static function textarea($attr) {
    $val = "";
    $html = "<textarea ";
    foreach ($attr as $key=>$value) {
      if ($key == "value") {
        $val = $value;
      } else {
        $html .= $key . "=\"".$value."\" ";
      }
    }
    $html .= ">";
    $html .= $val;
    $html .= "</textarea>";
    return $html;
  }

  static function button($attr) {
    $html = "<button ";
    foreach ($attr as $key=>$value) {
      $html .= $key . "=\"".$value."\" ";
    }
    $html .= ">";
    return $html;
  }

  static function form($attr) {
    $html = "<form ";
    foreach ($attr as $key=>$value) {
      $html .= $key . "=\"".$value."\" ";
    }
    $html .= ">";
    return $html;
  }
  static function _form() { return "</form>"; }
  static function css($attr="") {
    $html = "<link ";
    $html .= (isset($attr['type']) && $attr['type'] != "" ? "" : "type='text/css' ");
    $html .= (isset($attr['rel']) && $attr['rel'] != "" ? "" : "rel='stylesheet' ");
    foreach ($attr as $key=>$value) {
      $html .= $key . "='".$value."' ";
    }
    $html .= ">";
    return $html;
  }
  static function script($attr="") {
    $html = "<script ";
    $html .= (isset($attr['type']) && $attr['type'] != "" ? "" : "type='text/javascript' ");
    foreach ($attr as $key=>$value) {
      $html .= $key . "='".$value."' ";
    }
    $html .= ">";
    $html .= "</script>";
    return $html;
  }

  static function datalist($dataset,$attr) {
    $html = "<datalist ";
    if ((!isset($attr["id"]) || $attr["id"] == "") && (isset($attr["name"]) && $attr["name"] != "")) { $attr["id"] = $attr["name"]; }
    if ((!isset($attr["name"]) || $attr["name"] == "") && (isset($attr["id"]) && $attr["id"] != "")) { $attr["name"] = $attr["id"]; }
    foreach ($attr as $key=>$value) {
      $html .= $key . "='".$value."' ";
    }
    $html .= ">";
    $isAssociative = false;
    $i = 0;
    foreach($dataset as $value=>$text) {
      if ($value != $i++) $isAssociative = true;
    }
    $opt = "";
    foreach($dataset as $value=>$text) {
      if (!$isAssociative) $value = $text;
      $opt .= "<option value='".$value."'>".$text."</option>";      
    }
    $html .= $opt;
    $html .= "</datalist>";
    return $html;
  }
  
  static function formatTD($type,$size=0) {
    $ret = "";
    $align = "";
    switch ($type) {
      case "tinyint" : {
        if ($size == 1) { $align = "center"; }
        break; }
      case "int" : {
        $align = "right";
        break; }
    }    
    $ret .= ($align != "" ? "align='$align' " : "");
    return $ret;
  }
  static function formatValue($value,$type,$size=0) {
    switch ($type) {
      case "int" : {
        $value = number_format($value);
        break; }
      case "tinyint" : {
        $value = ($value == 0 ? "X" : "V");
        break; }
    }
    return $value;
  }
  static function drawInput($param,$value = "") {
    $input = "";
    $size = "";
    $name = "field_".$param->index;
    switch ($param->type) {
      case "date" : {
        $input = HTML::input(array("name"=>$name,"value"=>$value,"size"=>9,"type"=>"date"));
        break; }
      case "int" : {
        $input = HTML::input(array("name"=>$name,"value"=>$value,"size"=>10,"type"=>"number"));
        break; }
      case "tinyint" : {
        if ($param->size == 1) {
          $input = HTML::checkbox(array("name"=>$name,"value"=>$value));          
        } else {
          $input = HTML::input(array("name"=>$name,"value"=>$value,"size"=>10,"type"=>"number"));
        }
        break; }
      case "text" : {
        $input = HTML::textarea(array("name"=>$name,"value"=>$value));
        break; }
      case "varchar" : {
        $input = HTML::input(array("name"=>$name,"value"=>$value,"size"=>$size,"maxlength"=>$size));
        break; }
      default : {
        $input = HTML::input(array("name"=>$name,"value"=>$value));
        }
    }
    return $input;
  }
}

?>