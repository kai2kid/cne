<?php
  ///MENU///
  //$menu[Menu Name] [Role] = URL
  $tmp = new configMenu();
  $tmp->text = "<span class='glyphicon glyphicon-home'></span>";
  $tmp->role = "admin";
  $tmp->url = "index";
  $tmp->onclick = "$(this).parent().removeClass('active');";  
  $_menu["home"] = $tmp;
  
  $tmp = new configMenu();
  $tmp->text = "Master";
  $tmp->role = "admin";
  $tmp->url = "#";
  $tmp->onclick = "$('li').removeClass('active'); $(this).parent().addClass('active');";  
  $_menu["master"] = $tmp;
  
  $tmp = new configMenu();
  $tmp->text = "Staff";
  $tmp->role = "admin";
  $tmp->url = "staff";
  $tmp->onclick = "";  
  $_menu["master"]->submenu["staff"] = $tmp;

  $tmp = new configMenu();
  $tmp->text = "Local Guide";
  $tmp->role = "admin";
  $tmp->url = "guide";
  $tmp->onclick = "";
  $_menu["master"]->submenu["guide"] = $tmp;

  $tmp = new configMenu();
  $tmp->text = "Buyer";
  $tmp->role = "admin";
  $tmp->url = "buyer";
  $tmp->onclick = "";
  $_menu["master"]->submenu["buyer"] = $tmp;

  $tmp = new configMenu();
  $tmp->text = "Hotel";
  $tmp->role = "admin";
  $tmp->url = "hotel";
  $tmp->onclick = "";
  $_menu["master"]->submenu["hotel"] = $tmp;

  $tmp = new configMenu();
  $tmp->text = "Restaurant";
  $tmp->role = "admin";
  $tmp->url = "restaurant";
  $tmp->onclick = "";
  $_menu["master"]->submenu["restaurant"] = $tmp;

  $tmp = new configMenu();
  $tmp->text = "Transportation";
  $tmp->role = "admin";
  $tmp->url = "transport";
  $tmp->onclick = "";
  $_menu["master"]->submenu["transport"] = $tmp;

  $tmp = new configMenu();
  $tmp->text = "Entrance";
  $tmp->role = "admin";
  $tmp->url = "entrance";
  $tmp->onclick = "";
  $_menu["master"]->submenu["entrance"] = $tmp;

  $tmp = new configMenu();
  $tmp->text = "Location";
  $tmp->role = "admin";
  $tmp->url = "location";
  $tmp->onclick = "";
  $_menu["master"]->submenu["location"] = $tmp;
  
  $tmp = new configMenu();
  $tmp->text = "Quotation";
  $tmp->role = "admin";
  $tmp->url = "quotation";
  $tmp->onclick = "";
  $_menu["quotation"] = $tmp;

  $tmp = new configMenu();
  $tmp->text = "Booking";
  $tmp->role = "admin";
  $tmp->url = "booking";
  $tmp->onclick = "";
  $_menu["booking"] = $tmp;

  $tmp = new configMenu();
  $tmp->text = "Report";
  $tmp->role = "admin";
  $tmp->url = "report";
  $tmp->onclick = "";
  $_menu["report"] = $tmp;
  
  global $_menu;
?>