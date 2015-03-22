<?php
  $tmp = glob("./__core/_model/*.php");
  foreach ($tmp as $path) { include($path); }
  
  $tmp = glob("./__core/_controller/*.php");
  foreach ($tmp as $path) { include($path); }
?>