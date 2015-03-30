<?php require_once("config_path.php"); ?>
<?php require_once("__core/__core.php"); ?>
<?php require_once("config_connection.php"); ?>
<?php require_once("config_app.php"); ?>
<?php require_once("config_constant.php"); ?>
<?php require_once("config_menu.php"); ?>
<?php // require_once("config_master.php"); ?>
<?php
  $tmp = glob("./_model/model_*.php");
  foreach ($tmp as $path) { include($path); }
?>