<!DOCTYPE HTML>
<html>
  <head>
    <!--<base href="<?php echo _APP_BASEPATH; ?>">-->
    <title><?php echo $page_title; ?></title>    
    <link rel="shortcut icon" href="<?php echo _PATH_IMAGE; ?>favicon.ico">
    <link type="text/css" rel="stylesheet" href="<?php echo _PATH_LAYOUT . _CONFIG_LAYOUT ?>/style.css">  
  </head>
  <body>  
    <?php include("header.php"); ?>    
    <div class="vs-s"></div>  
    <?php include("nav.php"); ?>
    <?php require_once("main.php"); ?>
  </body>
  </html>