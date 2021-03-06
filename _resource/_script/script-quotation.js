$(document).ready( function () {					

  $('input[type=date]').datepicker();
  $('table.datatable').dataTable();             

  //CHANGE DAY===============================
  $("#quotation_day").change(function(){
    dayCount = parseInt($("#quotation_day").val());
    if ($.trim(dayCount) == ""){
      dayCount = 0
    }
    $("#quotation_night").val((dayCount-1).toString());
    
    jumElemen = $(".input-transport").length-1;
    selisih = jumElemen - dayCount;    
    
    if (selisih > 0) {          
      //HAPUS KELEBIHAN
      for (i=0; i<selisih; i++){        
        $(".wrapper_route:last").remove();  
        $("tr.list-of-meal").last().remove();  
        $("tr.list-of-hotel").last().remove();
      }
    } else {
      //NAMBAH TRANSPORT - ROUTE
      jumElemen = jumElemen + 1;
      for (i=jumElemen; i<=dayCount; i++){  
        //ROUTE
        addDayRoute(i,1);
        
        //MEAL
        addMeal(i);
        
        //HOTEL
        //Hari terakhir tanpa hotel
        if (i != dayCount) {
          addHotel(i);          
        }
      }            
    }      
  });

  
  if ($('#quotation_mode').val() == "insert") {
    initCombobox();
    
    //starting quotation    
    addDayRoute(1,1);  
  } else {
    day = parseInt($("#quotation_day").val());
    night = day-1;
    var d;
    var no;
    for (d = 1 ; d <= day ; d++) {
      dd = d.toString();
      changeRoute(d);
      initCombobox(dd);
      
      $("#cbroute_"+dd).combobox({
        select: function( event, ui ) {
          //alert("ganti"+induk);
          isi = ui.item.value.split("|");
          $("#route_"+dd).val(isi[0]);
          $("#path_"+dd).val(isi[1]);                    
          changeRoute(dd);
        }
      });  
  
      for (no = 1 ; no <= parseInt($("#rundown_ctr_"+dd).val()) ; no++) {
        $("#cbentrance_"+dd+"_"+no).combobox({
          select: function( event, ui ) {            
            $("#entrance_"+dd+"_"+no).val(ui.item.value);      
            $("#cbentrance_"+dd+"_"+no).children("*").removeAttr("selected");
            $("#cbentrance_"+dd+"_"+no).children("[value*='"+ui.item.value+"']").attr("selected","selected");  
          }    
        });  
        $("#cbentrance_"+dd+"_"+no).next().find("input").attr("onblur","addEntrance("+dd+","+no+",this.value)");  
      }      
    }
    
  
  //FILTER JIKA DIA BUKAN PERTAMA
  /*/
  if (induk>1){
    no = induk - 1;
    kode = $("input[type='hidden'][name='route_"+no+"']").val();    //mendapatkan RO0108
    rute = $("input[type='hidden'][name='path_"+no+"']").val();      //mendapatkan JEJU - BUSAN - DAEGU
    
    pathRoute = rute.split(";");
    startRoute = pathRoute[0];
    endRoute = pathRoute[pathRoute.length-1];
    
    $("#cbroute_"+induk).children("*").attr("disabled","disabled");
    $("#cbroute_"+induk).children("[st*='"+endRoute+"']").removeAttr("disabled");  
  }  
  /*/
    
  }
  
} );

function initCombobox(day){
	if (day == null) {
    day = "1";
  } else {
    day = day.toString();
  }
	//HOTEL================================
	$("#cbhotel_1_"+day).combobox({
		select: function( event, ui ) {											
			$("#hotel_cb_1_"+day).val(ui.item.value);					
		}
	});
	$("#cbhotel_2_"+day).combobox({
		select: function( event, ui ) {											
			$("#hotel_cb_2_"+day).val(ui.item.value);					
		}
	});
	$("#cbhotel_3_"+day).combobox({
		select: function( event, ui ) {											
			$("#hotel_cb_3_"+day).val(ui.item.value);					
		}
	});
			
	//MEAL==================================
	$("#cbrestaurant_1_"+day).combobox({
		select: function( event, ui ) {				
			$("#restaurant_1_"+day).val(ui.item.value);				
		}
	});		
	$("#cbrestaurant_2_"+day).combobox({
		select: function( event, ui ) {				
			$("#restaurant_2_"+day).val(ui.item.value);				
		}
	});
	$("#cbrestaurant_3_"+day).combobox({
		select: function( event, ui ) {				
			$("#restaurant_3_"+day).val(ui.item.value);				
		}
	});
	
}

function addMeal(i){
	myEl = $("tr.list-of-meal").first().clone(false);					
	myEl.find("label").html("D"+i);								
	myEl.find("input").each(function() {
		$(this).val("");
	});
	
	c = 1;
	myEl.find("input[type='hidden']").each(function(){
		$(this).attr("name", "restaurant_"+c+"_"+i);	
		$(this).attr("id", "restaurant_"+c+"_"+i);	
		c++;
	});
	
	c = 1;
	myEl.find("select").each(function(){									
		$(this).attr('id', "cbrestaurant_"+c+"_"+i);
		$(this).attr('name', "cbrestaurant_"+c+"_"+i);
		c++;
	});	
	
	myEl.find("span[class='custom-combobox']").remove();
	
	$("#table-meal").append(myEl);
	
	$("#cbrestaurant_1_"+i).combobox({
		select: function( event, ui ) {				
			$("#restaurant_1_"+i).val(ui.item.value);				
		}
	});
	
	$("#cbrestaurant_2_"+i).combobox({
		select: function( event, ui ) {				
			$("#restaurant_2_"+i).val(ui.item.value);				
		}
	});
	
	$("#cbrestaurant_3_"+i).combobox({
		select: function( event, ui ) {				
			$("#restaurant_3_"+i).val(ui.item.value);				
		}
	});	
	
}

function addHotel(i){
	myEl = $("tr.list-of-hotel").first().clone(false);					
  myEl.find("label").html("D"+i);                
	myEl.find("input").each(function() {
    $(this).val("");
  });
	
	c = 1;
	myEl.find("input[type='hidden']").each(function(){
		$(this).attr("name", "hotel_cb_"+c+"_"+i);	
    $(this).attr("id", "hotel_cb_"+c+"_"+i);  
		$(this).val("");	
		c++;
	});
	
	c = 1;	
	myEl.find("select").each(function(){			
		$(this).attr('id', "cbhotel"+"_"+c+"_"+i);
		$(this).attr('name', "cbhotel"+"_"+c+"_"+i);		
		c++;
	});	

	myEl.find("span[class='custom-combobox']").remove();
	$("#table-hotel").append(myEl);
	
	$("#cbhotel_1_"+i).combobox({
		select: function( event, ui ) {											
			$("#hotel_cb_1_"+i).val(ui.item.value);				
		}
	});
	$("#cbhotel_2_"+i).combobox({
		select: function( event, ui ) {											
			$("#hotel_cb_2_"+i).val(ui.item.value);					
		}
	});
	$("#cbhotel_3_"+i).combobox({
		select: function( event, ui ) {											
			$("#hotel_cb_3_"+i).val(ui.item.value);		
		}
	});
	
	
}

function addDayRoute(induk, nomor){	
	noBaru = nomor + 1;
	elBaru = $(".wrapper_route").first().clone(false);		
	elBaru.removeClass("template-route");
	
	//change number 
	elBaru.find("label[id='lbl_INDUK']").html("Day "+induk);
	elBaru.find("label[id='lbl_INDUK']").attr("for" , "route_"+induk);
	elBaru.find("label[id='lbl_INDUK']").attr("id" , "lbl_"+induk);

	elBaru.find(".input-transport").find("select").attr('id', "cbroute_"+induk);	
	elBaru.find(".input-transport").find("select").attr('name', "cbroute_"+induk);
	
	elBaru.find(".input-transport").find("input[type='hidden'][name='route_INDUK']").attr('name', "route_"+induk);
	elBaru.find(".input-transport").find("input[type='hidden'][id='route_INDUK']").attr('id', "route_"+induk);
	
	//elBaru.find(".input-transport").find("input[type='hidden'][id='route_"+induk+"']").attr("onchange", "changeRoute("+induk+")");	
	//elBaru.find(".input-transport").find("input[type='hidden'][id='route_"+induk+"']").bind("change", function(){changeRoute(induk)});
	
	elBaru.find(".input-transport").find("input[type='hidden'][name='path_INDUK']").attr('name', "path_"+induk);
	elBaru.find(".input-transport").find("input[type='hidden'][id='path_INDUK']").attr('id', "path_"+induk);		

	//change number entrance			
	elBaru.find("#wrapperTime_INDUK_NO").attr("id", "wrapperTime_"+induk+"_"+nomor);
	elBaru.find("input[type='text'][name='qtimeStart_INDUK_NO']").attr("name", "qtimeStart_"+induk+"_"+nomor);	
	elBaru.find("#qtimeStart_INDUK_NO").attr("id", "qtimeStart_"+induk+"_"+nomor);
	elBaru.find("input[type='text'][name='qtimeEnd_INDUK_NO']").attr("name", "qtimeEnd_"+induk+"_"+nomor);	
	elBaru.find("#qtimeEnd_INDUK_NO").attr("id", "qtimeEnd_"+induk+"_"+nomor);	
		
	elBaru.find("#wrapperTime_"+induk+"_"+nomor).find("input[type='hidden'][name='entrance_INDUK_NO']").attr("name", "entrance_"+induk+"_"+nomor);				
	elBaru.find("#wrapperTime_"+induk+"_"+nomor).find("input[type='hidden'][id='entrance_INDUK_NO']").attr("id", "entrance_"+induk+"_"+nomor);				
	elBaru.find("#wrapperTime_"+induk+"_"+nomor).find("select").attr('id', "cbentrance_"+induk+"_"+nomor);
	elBaru.find("#wrapperTime_"+induk+"_"+nomor).find("select").attr('name', "cbentrance_"+induk+"_"+nomor);
	

	elBaru.find("#btnAddTime_INDUK_NO").attr("name", "btnAddTime_"+induk+"_"+nomor);
	elBaru.find("#btnAddTime_INDUK_NO").attr("onclick","addTime(this,"+induk+","+noBaru+")");	
	elBaru.find("#btnAddTime_INDUK_NO").prop('disabled',false);	
	elBaru.find("#btnAddTime_INDUK_NO").attr("id", "btnAddTime_"+induk+"_"+nomor);

	elBaru.find("#btnRemoveTime_INDUK_NO").attr("onclick","removeTime("+induk+","+nomor+")");		
	elBaru.find("#btnRemoveTime_INDUK_NO").attr("id", "btnRemoveTime_"+induk+"_"+nomor);
	elBaru.find(".batasRoute_INDUK").attr("class", "batasRoute_"+induk);
	
	elBaru.insertBefore(".group-btn-transport");	
	
	//SET COMBOBOX
	$("#cbroute_"+induk).combobox({
		select: function( event, ui ) {
			//alert("ganti"+induk);
			isi = ui.item.value.split("|");
			$("#route_"+induk).val(isi[0]);
			$("#path_"+induk).val(isi[1]);										
			changeRoute(induk);				
			
		}
    });	
	
	$("#cbentrance_"+induk+"_"+nomor).combobox({
		select: function( event, ui ) {						
			$("#entrance_"+induk+"_"+nomor).val(ui.item.value);			
			$("#cbentrance_"+induk+"_"+nomor).children("*").removeAttr("selected");
			$("#cbentrance_"+induk+"_"+nomor).children("[value*='"+ui.item.value+"']").attr("selected","selected");	
		}		
	});	

	$("#cbentrance_"+induk+"_"+nomor).next().find("input").attr("onblur","addEntrance("+induk+","+nomor+",this.value)");	
	
	//FILTER JIKA DIA BUKAN PERTAMA
	if (induk>1){
		no = induk - 1;
		kode = $("input[type='hidden'][name='route_"+no+"']").val();    //mendapatkan RO0108
		rute = $("input[type='hidden'][name='path_"+no+"']").val();	    //mendapatkan JEJU - BUSAN - DAEGU
		
		pathRoute = rute.split(";");
		startRoute = pathRoute[0];
		endRoute = pathRoute[pathRoute.length-1];
		
		$("#cbroute_"+induk).children("*").attr("disabled","disabled");
		$("#cbroute_"+induk).children("[st*='"+endRoute+"']").removeAttr("disabled");	
	}	
}

function addEntrance(induk, nomor, val){		
	teks = $("#cbentrance_"+induk+"_"+nomor).find('option:selected').text();	
	if (teks!=val) {
		$("#entrance_"+induk+"_"+nomor).val(val);		
	}
}


function addTime(el, induk, nomor){			
	noBaru = parseInt(nomor) + 1;	
	
	elBaru = $(".wrapperTime").first().clone(false);		
	
	//change number		
	elBaru.find("#wrapperTime_INDUK_NO").attr("id", "wrapperTime_"+induk+"_"+nomor);
	elBaru.find("input[type='text'][name='qtimeStart_INDUK_NO']").attr("name", "qtimeStart_"+induk+"_"+nomor);	
	elBaru.find("#qtimeStart_INDUK_NO").attr("id", "qtimeStart_"+induk+"_"+nomor);
	elBaru.find("input[type='text'][name='qtimeEnd_INDUK_NO']").attr("name", "qtimeEnd_"+induk+"_"+nomor);	
	elBaru.find("#qtimeEnd_INDUK_NO").attr("id", "qtimeEnd_"+induk+"_"+nomor);
					
	elBaru.find("input[type='hidden']").attr("name", "entrance_"+induk+"_"+nomor);		
	elBaru.find("input[type='hidden']").attr("id", "entrance_"+induk+"_"+nomor);			
	elBaru.find("select").attr('name', "cbentrance_"+induk+"_"+nomor);
	elBaru.find("select").attr('id', "cbentrance_"+induk+"_"+nomor);
	elBaru.find("select").combobox({
		select: function( event, ui ) {						
			$("#entrance_"+induk+"_"+nomor).val(ui.item.value);			
			$("#cbentrance_"+induk+"_"+nomor).children("*").removeAttr("selected");
			$("#cbentrance_"+induk+"_"+nomor).children("[value*='"+ui.item.value+"']").attr("selected","selected");	
		}
	});	
	
	elBaru.find("#btnAddTime_INDUK_NO").attr("name", "btnAddTime_"+induk+"_"+nomor);
	elBaru.find("#btnAddTime_INDUK_NO").attr("onclick","addTime(this,"+induk+","+noBaru+")");	
	elBaru.find("#btnAddTime_INDUK_NO").prop('disabled',false);	
	elBaru.find("#btnAddTime_INDUK_NO").attr("id", "btnAddTime_"+induk+"_"+nomor);

	elBaru.find("#btnRemoveTime_INDUK_NO").attr("onclick","removeTime("+induk+","+nomor+")");	
	elBaru.find("#btnRemoveTime_INDUK_NO").removeClass("not-show");	
	elBaru.find("#btnRemoveTime_INDUK_NO").attr("id", "btnRemoveTime_"+induk+"_"+nomor);
		
	elBaru.insertBefore($(".batasRoute_"+induk));	
	$(el).prop('disabled',true);			
	
	$("#cbentrance_"+induk+"_"+nomor).next().find("input").attr("onblur","addEntrance("+induk+","+nomor+",this.value)");	
}

function removeTime(induk, nomor)
{
	nomorLama = nomor - 1;
	
	if ($("#btnAddTime_"+induk+"_"+nomor).prop('disabled')==false){
		$("#btnAddTime_"+induk+"_"+nomorLama).prop('disabled',false);
	}	
	$("#wrapperTime_"+induk+"_"+nomor).remove();
	
	jumElemen = $(".wrapp_entrance").length;
	
	if (jumElemen==1) $("#btnAddTime_"+induk+"_1").prop('disabled',false);
}

function calculateOther(idx){
	hasil = parseInt($("#other_"+idx+"_2").val())*parseInt($("#other_"+idx+"_3").val())*parseInt($("#other_"+idx+"_4").val());
	$("#other_"+idx+"_5").val(addCommas(hasil));
}

function changeRoute(no)
{					
	//AMBIL FILTER		
	kode = $("input[type='hidden'][name='route_"+no+"']").val();    //mendapatkan RO0108
	rute = $("input[type='hidden'][name='path_"+no+"']").val();	    //mendapatkan JEJU - BUSAN - DAEGU
	pathRoute = rute.split(";");
	startRoute = pathRoute[0];
	endRoute = pathRoute[pathRoute.length-1];

	//FILTER NEXT ROUTE
	nextNo = parseInt(no) + 1;
	$("#cbroute_"+nextNo).children("*").attr("disabled","disabled");
	$("#cbroute_"+nextNo).children("[st*='"+endRoute+"']").removeAttr("disabled");	
	
	//FILTER ENTRANCE		
	jumEntrance = $("#formInsertTransport").children("div.wrapper_route").eq(no).find("select[at='fentrance']").length;	

	for (i=1; i<=jumEntrance; i++){
		$("#formInsertTransport").find("select[id='cbentrance_"+no+"_"+i+"']").children("*").attr("disabled","disabled");			
		for (j=0; j<pathRoute.length; j++){
			$("#formInsertTransport").find("select[id='cbentrance_"+no+"_"+i+"']").children("[name*='"+pathRoute[j]+"']").removeAttr("disabled");
		}				
	}	
	
	//FILTER HOTEL
	$("#cbhotel_1_"+no).children("*").attr("disabled","disabled");			
	$("#cbhotel_2_"+no).children("*").attr("disabled","disabled");			
	$("#cbhotel_3_"+no).children("*").attr("disabled","disabled");			
	
	$("#cbhotel_1_"+no).children("[name*='"+endRoute+"']").removeAttr("disabled");
	$("#cbhotel_2_"+no).children("[name*='"+endRoute+"']").removeAttr("disabled");
	$("#cbhotel_3_"+no).children("[name*='"+endRoute+"']").removeAttr("disabled");		
  
	//FILTER MEAL
	$("#cbrestaurant_1_"+no).children("*").attr("disabled","disabled");			
	$("#cbrestaurant_2_"+no).children("*").attr("disabled","disabled");			
	$("#cbrestaurant_3_"+no).children("*").attr("disabled","disabled");
  
	$("#cbrestaurant_1_"+no).children("[name*='*']").removeAttr("disabled");		
	for (j=0; j<pathRoute.length; j++){
		$("#cbrestaurant_1_"+no).children("[name*='"+pathRoute[j]+"']").removeAttr("disabled");		
		$("#cbrestaurant_2_"+no).children("[name*='"+pathRoute[j]+"']").removeAttr("disabled");		
		$("#cbrestaurant_3_"+no).children("[name*='"+pathRoute[j]+"']").removeAttr("disabled");		
	}
}

