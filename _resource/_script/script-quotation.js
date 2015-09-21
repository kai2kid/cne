$(document).ready( function () {					
	initCombobox();
	
	//starting quotation		
	addDayRoute(1,1);	
	$('input[type=date]').datepicker();
	$('table.datatable').dataTable();  		 			
	
	//CHANGE DAY===============================
	$("#quotation_day").change(function(){		    
		dayCount = parseInt($("#quotation_day").val());
		if ($.trim(dayCount) == ""){
			dayCount = 0
		}
		
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
				addHotel(i);
			}						
		}			
	});
  
} );

function initCombobox(){
	
	//HOTEL================================
	$("#cbhotel_1_1").combobox({
		select: function( event, ui ) {											
			$("#hotel_cb_1_1").val(ui.item.value);					
		}
	});
	$("#cbhotel_2_1").combobox({
		select: function( event, ui ) {											
			$("#hotel_cb_2_1").val(ui.item.value);					
		}
	});
	$("#cbhotel_3_1").combobox({
		select: function( event, ui ) {											
			$("#hotel_cb_3_1").val(ui.item.value);					
		}
	});
			
	//MEAL==================================
	$("#cbrestaurant_1_1").combobox({
		select: function( event, ui ) {				
			$("#restaurant_1_1").val(ui.item.value);				
		}
	});		
	$("#cbrestaurant_1_2").combobox({
		select: function( event, ui ) {				
			$("#restaurant_1_2").val(ui.item.value);				
		}
	});
	$("#cbrestaurant_1_3").combobox({
		select: function( event, ui ) {				
			$("#restaurant_1_3").val(ui.item.value);				
		}
	});
	
}

function addMeal(i){
	myEl = $("tr.list-of-meal").first().clone(false);					
	myEl.find("label").html("D"+i);								
	
	c = 1;
	myEl.find("input[type='hidden']").each(function(){
		$(this).attr("name", "restaurant_"+i+"_"+c);	
		$(this).attr("id", "restaurant_"+i+"_"+c);	
		c++;
	});
	
	c = 1;
	myEl.find("select").each(function(){									
		$(this).attr('id', "cbrestaurant_"+i+"_"+c);
		$(this).attr('name', "cbrestaurant_"+i+"_"+c);
		c++;
	});	
	
	$("#cbrestaurant_"+i+"_1").combobox({
		select: function( event, ui ) {				
			$("#restaurant_"+i+"_1").val(ui.item.value);				
		}
	});
	
	$("#cbrestaurant_"+i+"_2").combobox({
		select: function( event, ui ) {				
			$("#restaurant_"+i+"_2").val(ui.item.value);				
		}
	});
	
	$("#cbrestaurant_"+i+"_3").combobox({
		select: function( event, ui ) {				
			$("#restaurant_"+i+"_3").val(ui.item.value);				
		}
	});
	
	$("#table-meal").append(myEl);
}

function addHotel(i){
	myEl = $("tr.list-of-hotel").first().clone(false);					
	myEl.find("label").html("D"+i);								
	
	c = 1;
	myEl.find("input[type='hidden']").each(function(){
		$(this).attr("name", "hotel_cb_"+c+"_"+i);	
		$(this).attr("id", "hotel_cb_"+c+"_"+i);	
		c++;
	});
	
	c = 1;	
	myEl.find("select").each(function(){			
		$(this).attr('id', "cbhotel"+"_"+c+"_"+i);
		$(this).attr('name', "cbhotel"+"_"+c+"_"+i);		
		c++;
	});		

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
	
	$("#table-hotel").append(myEl);
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
	$("#cbrestaurant_"+no+"_1").children("*").attr("disabled","disabled");			
	$("#cbrestaurant_"+no+"_2").children("*").attr("disabled","disabled");			
	$("#cbrestaurant_"+no+"_3").children("*").attr("disabled","disabled");
	
	for (j=0; j<pathRoute.length; j++){
		$("#cbrestaurant_"+no+"_1").children("[name*='"+pathRoute[j]+"']").removeAttr("disabled");		
		$("#cbrestaurant_"+no+"_2").children("[name*='"+pathRoute[j]+"']").removeAttr("disabled");		
		$("#cbrestaurant_"+no+"_3").children("[name*='"+pathRoute[j]+"']").removeAttr("disabled");		
	}
}

