$(document).ready( function () {
  $('table.datatable tbody').on( 'click', 'tr', function () {
    $('table.datatable tbody tr.selected').removeClass('selected');      
    $(this).toggleClass('selected');
  } );

} );

function setID(id) {
  $("#masterID").val(id);
  $("#btnUpdate").attr("disabled",false);
  $("#btnDelete").attr("disabled",false);
  $("#btnDetail").attr("disabled",false);
}
function setID2(id) {
  $("#masterID2").val(id);
  $("#btnUpdate2").attr("disabled",false);
  $("#btnDelete2").attr("disabled",false);
  $("#btnDetail2").attr("disabled",false);
}

function loadForm(type,mode) {
  id = "";
  if (mode != "insert") {
    id = $("#masterID").val();
  }
  targetID = mode + "FormContent";
  url = type + "_" + mode + "AjaxForm";
  if (id != "") {
    url += "~" + id;
  }

  $("#"+targetID).html("");
  $.ajax( {    
    url:url,
//    async:false,
    success:function(data){
      $("#"+targetID).html(data.html);
      eval(data.script);
      //if (mode == "delete") {
        //table = $("#table_master").row('.selected').remove().draw( false );
      //}
      
    }
  } );
}

function loadForm2(type,mode) {
  id = "";
  if (mode != "insert") {
    id = $("#masterID2").val();
  }
  targetID = mode + "FormContent2";
  url = type + "_" + mode + "AjaxForm";
  if (id != "") {
    url += "~" + id;
  }

  $("#"+targetID).html("");
  $.ajax( {    
    url:url,
//    async:false,
    success:function(data){
      $("#"+targetID).html(data.html);
      eval(data.script);
      //if (mode == "delete") {
        //table = $("#table_master").row('.selected').remove().draw( false );
      //}
      
    }
  } );
}


function openForm(type,mode,id) {
  targetID = mode + "FormContent";
  url = type + "_" + mode + "AjaxForm";
  if (id != "") {
    url += "~" + id;
  }

  $("#"+targetID).html("");
  $.ajax( {    
    url:url,
//    async:false,
    success:function(data){
      $("#"+targetID).html(data.html);
      eval(data.script);
      //if (mode == "delete") {
        //table = $("#table_master").row('.selected').remove().draw( false );
      //}
      
    }
  } );
}
