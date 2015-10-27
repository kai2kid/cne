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

function submitForm(formID) {  
  f = $("#"+formID);
  f.serialize();
  $.post(
    f.attr("action"),
    f.serialize(),
    function(data){
      if(data.result) {
        alert("Data has been saved.");
      }
    }
  );
}

function quotationSubmitForm(formID,mode) {  
  if (mode == null) mode = 1;
  if (formID != "formInsertHeader") {
    quotationSubmitForm("formInsertHeader",0);
  }
  f = $("#"+formID);
  $.post(
    f.attr("action"),
    f.serialize() + "&quotation_code=" + $("#quotation_code").val(),
    function(data){
      if(data.result == 1) {
        if (mode == 1) {
          alert("Data has been saved.");
        }
      } else {
        alert("Data cannot be saved.");
        alert(f.serialize() + "&quotation_code=" + $("#quotation_code").val());
      }
    }
  );
}

function quotationFilterCombobox(name,location) {
  $("#"+nama).children("*").hide();
  $("#"+nama).children("."+location).show();
}

function saveasnew() {
  if (confirm("Are you sure want to save as new quotation with title:\n"+$("#quotation_name").val())) {
    var newcode = $("#quotation_code2").val();
    var key;
    var formid= [];
    formid["header"] = "formInsertHeader";
    formid["transport"] = "formInsertTransport";
    formid["hotel"] = "formInsertHotel";
    formid["meal"] = "formInsertMeal";
    formid["other"] = "formInsertOther";
    
    for (key in formid) {
      f = $("#"+formid[key]);
      //alert(f.attr("action"));
      $.ajax({
        type : "POST",
        url: f.attr("action"),
        data: f.serialize() + "&quotation_code=" + newcode,
        success: function(data){
          //alert("buyar");
          if(data.result == 1) {
            //alert("Data "+ key +" has been saved.");
          } else {
            alert("Data "+ key +" cannot be saved.");
            //alert(f.serialize() + "&quotation_code=" + newcode);
          }
        },
        async:false
      });      
    }
    alert("Data has been saved as a new quotation");
    //window.location = "quotation~"+newcode+"_formUpdate";
  }
}

function addCommas(nStr) {
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function selectPIC(code) {
  if (code != null) {
    $("#pic_code").val(code);
    $("#pic_name").val($("#picname_"+code).val());
    $("#pic_name_korean").val($("#pickname_"+code).val());
    $("#pic_phone").val($("#picphone_"+code).val());
    $("#pic_email").val($("#picemail_"+code).val());
    $("#pic_photo").attr("src","./_resource/_image/pic/"+code+".png?"+Math.random(9));
    $("#pic_form_insert").hide();
    $("#pic_form_update").show();
  } else {
    $("#pic_code").val("");
    $("#pic_name").val("");
    $("#pic_name_korean").val("");
    $("#pic_phone").val("");
    $("#pic_email").val("");
    $("#pic_form_insert").show();
    $("#pic_form_update").hide();
    $("#pic_photo").attr("src","./_resource/_image/user.png");
  }
}
function deletePIC(code) {
  if (code != null) {
    if (confirm("Are you sure want to delete this data?")) {
      document.location = "buyer_deletePIC~"+code;
    }
  }
}