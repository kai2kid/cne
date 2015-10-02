$(document).ready( function () {					
	//starting quotation
	//$('.combobox').combobox();
	addDayRoute(1,1);
	$('input[type=date]').datepicker();
	$('table.datatable').dataTable();  	
	 
	no = 0;	//0 untuk template
	$("#formInsertTransport").find(".input-transport").each(function(){	
		$(this).find("input[type='hidden']").attr("onchange", "changeRoute('"+no+"')");	
		no = no + 1;		
	}); 
	
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

function addMeal(i){
	myEl = $("tr.list-of-meal").first().clone(false);					
	myEl.find("label").html("D"+i);							
	myEl.find(".combobox-container").remove();
	
	c = 1;
	myEl.find("select").each(function(){									
		$(this).attr('id', "restaurant_"+i+"_"+c);
		c++;
	});
	myEl.find("select").combobox();
	
	c = 1;
	myEl.find("input[type='hidden']").each(function(){
		$(this).attr("name", "restaurant_"+i+"_"+c);	
		c++;
	});
	
	$("#table-meal").append(myEl);
}

function addHotel(i){
	myEl = $("tr.list-of-hotel").first().clone(false);					
	myEl.find("label").html("D"+i);							
	myEl.find(".combobox-container").remove();
	c = 1;
	myEl.find("select").each(function(){									
    $(this).attr('id', "hotel_"+i+"_"+c);
//		$(this).childred().each(function() {
//      $(this).removeAttr("selected");
//    });
		c++;
	});
	myEl.find("select").combobox();
	c = 1;
	myEl.find("input[type='hidden']").each(function(){
		$(this).attr("name", "hotel_"+i+"_"+c);	
//    $(this).val("");
		c++;
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
		
	//elBaru.find(".input-transport").find(".combobox-container").remove();
	elBaru.find(".input-transport").find("select").attr('id', "route_"+induk);	
	elBaru.find(".input-transport").find("select").attr('name', "route_"+induk);
	elBaru.find(".input-transport").find("input[type='hidden'][name='route_INDUK']").attr('name', "route_"+induk);
	elBaru.find(".input-transport").find("input[type='hidden'][id='route_INDUK']").attr('id', "route_"+induk);
	elBaru.find(".input-transport").find("select").combobox({
		select: function( event, ui ) {
		elBaru.find(".input-transport").find("input[type='hidden'][id='route_"+induk+"']").val(ui.item.value);
		//alert(ui.item.value);
		}
    });
	
	
		 
	//elBaru.find(".input-transport").find("input[type='hidden']").attr("name", "route_"+induk);	
	//elBaru.find(".input-transport").find("input[type='hidden']").attr("onchange", "changeRoute('"+induk+"')");
	
	//change number entrance			
	elBaru.find("#wrapperTime_INDUK_NO").attr("id", "wrapperTime_"+induk+"_"+nomor);
	elBaru.find("input[type='text'][name='qtimeStart_INDUK_NO']").attr("name", "qtimeStart_"+induk+"_"+nomor);	
	elBaru.find("#qtimeStart_INDUK_NO").attr("id", "qtimeStart_"+induk+"_"+nomor);
	elBaru.find("input[type='text'][name='qtimeEnd_INDUK_NO']").attr("name", "qtimeEnd_"+induk+"_"+nomor);	
	elBaru.find("#qtimeEnd_INDUK_NO").attr("id", "qtimeEnd_"+induk+"_"+nomor);	
	
	//elBaru.find("#wrapperTime_"+induk+"_"+nomor).find(".combobox-container").remove();				
	elBaru.find("#wrapperTime_"+induk+"_"+nomor).find("select").attr('id', "entrance_"+induk+"_"+nomor);
	elBaru.find("#wrapperTime_"+induk+"_"+nomor).find("select").combobox();
	elBaru.find("#wrapperTime_"+induk+"_"+nomor).find("input[type='hidden']").attr("name", "entrance_"+induk+"_"+nomor);		

	elBaru.find("#btnAddTime_INDUK_NO").attr("name", "btnAddTime_"+induk+"_"+nomor);
	elBaru.find("#btnAddTime_INDUK_NO").attr("onclick","addTime(this,"+induk+","+noBaru+")");	
	elBaru.find("#btnAddTime_INDUK_NO").prop('disabled',false);	
	elBaru.find("#btnAddTime_INDUK_NO").attr("id", "btnAddTime_"+induk+"_"+nomor);

	elBaru.find("#btnRemoveTime_INDUK_NO").attr("onclick","removeTime("+induk+","+nomor+")");		
	elBaru.find("#btnRemoveTime_INDUK_NO").attr("id", "btnRemoveTime_"+induk+"_"+nomor);
	elBaru.find(".batasRoute_INDUK").attr("class", "batasRoute_"+induk);
	
	elBaru.insertBefore(".group-btn-transport");	
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
	
	elBaru.find(".combobox-container").remove();				
	elBaru.find("select").attr('id', "entrance_"+induk+"_"+nomor);
	elBaru.find("select").combobox();
	elBaru.find("input[type='hidden']").attr("name", "entrance_"+induk+"_"+nomor);		

	elBaru.find("#btnAddTime_INDUK_NO").attr("name", "btnAddTime_"+induk+"_"+nomor);
	elBaru.find("#btnAddTime_INDUK_NO").attr("onclick","addTime(this,"+induk+","+noBaru+")");	
	elBaru.find("#btnAddTime_INDUK_NO").prop('disabled',false);	
	elBaru.find("#btnAddTime_INDUK_NO").attr("id", "btnAddTime_"+induk+"_"+nomor);

	elBaru.find("#btnRemoveTime_INDUK_NO").attr("onclick","removeTime("+induk+","+nomor+")");	
	elBaru.find("#btnRemoveTime_INDUK_NO").removeClass("not-show");	
	elBaru.find("#btnRemoveTime_INDUK_NO").attr("id", "btnRemoveTime_"+induk+"_"+nomor);
		
	elBaru.insertBefore($(".batasRoute_"+induk));	
	$(el).prop('disabled',true);			
}

function removeTime(induk, nomor) {
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
	$("#other_"+idx+"_5").val(hasil);
}

function changeRoute(no) {				
	//MENGISI BAGIAN RUNDOWN			
	kode = $("input[type='hidden'][name='route_"+no+"']").val();    //mendapatkan RO0108
	rute = $("#route_"+no+" option[value='"+kode+"']").text();	    //mendapatkan JEJU - BUSAN - DAEGU
  	
	startRoute = $("#route_"+no+" option[value='"+kode+"']").attr("st");
	endRoute = $("#route_"+no+" option[value='"+kode+"']").attr("en");
	pathRoute = $("#route_"+no+" option[value='"+kode+"']").attr("name").split(";");
		
	//FILTER NEXT ROUTE
	nextChild = parseInt(no) + 1; 	
  
	
	$("#route_"+nextChild).children("*").hide();	

	//$("#formInsertTransport").find("select[id='route_"+nextChild+"']").children("[st*='"+endRoute+"']").show();
  
}

