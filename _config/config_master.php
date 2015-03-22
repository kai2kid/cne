<?php
  $temp = new configMaster();
  $temp->table_name = "staff";
  $temp->table_alias = "Staff";
  $temp->fields->prefix = "staff_";
  $temp->fields->pk = "staff_kode";
/*/  
  $temp->fields->add(array(
    "name" => "item_image",
    "alias" => "Image",
    "type" => "image",
    "path" => "",    
    "filename" => "",
    "fileformat" => "jpg"
    ));
/*/
//  $newField = new configMaster_fields();
//  $newField->type = "button";
//  $newField->onclick = "alert(123)";
//  $newField->value = "Alerting";
  
  $temp->fields->add(array(
//    "button_menu" => $newField
  ));
  $temp->fields->alias(array(
      "staff_hp" => "Handphone",      
    ));
  $temp->fields->hide = array();
  $temp->fields->directory->show = array("staff_position","staff_name","staff_hp","staff_email","staff_city","staff_country");
  
  $temp->fields->insert->show = array("staff_name","staff_position","staff_id_no","staff_hp","staff_email","staff_city","staff_country");
  $temp->fields->insert->alias = array("staff_hp" => "Contact Number","staff_phone" => "","staff_fax" => "");
  $temp->fields->insert->placeholder = array("staff_bank_account" => "Account Number");
  
  $temp->fields->update->show = array("staff_name","staff_position","staff_hp","staff_email","staff_city","staff_country");
  
  $temp->fields->delete->show = array("staff_name","staff_position","staff_hp","staff_email","staff_city","staff_country");
  
  $temp->fields->autogenerate = "S####";
//  $temp->fields->directory(array("item_nama","item_harga"));
/*/
  $temp->fields->foreign = array(
    "cat_kode" => array(
      "tb_name"=>"item_categories",
      "fd_key"=>"cat_kode",
      "fd_value"=>"cat_nama",
      )
  );
/*/
  $_master['staff'] = $temp;
  
  global $_master;
?>