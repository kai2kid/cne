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
}

function loadForm(type,mode) {
  id = "";
  if (mode != "insert") {
    id = $("#masterID").val();
    targetID = mode + "FormContent";
    url = type + "_" + mode + "AjaxForm";
    if (id != "") {
      url += "~" + id;
    }

    //$("#"+targetID).html("");
    targetID.reset();
    $.ajax( {    
      url:url,
  //    async:false,
      success:function(data){
        $("#"+targetID).html(data.html);
        if (mode == "delete") {
          table = $("#table_master").row('.selected').remove().draw( false );
        }
      }
    } );
  }
}