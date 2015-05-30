$(document).ready( function () {
  $('input[type=date]').datepicker();
  $('table.datatable').dataTable();  
  
	$('.panel-heading span.clickable').on("click", function (e) {
		if ($(this).hasClass('panel-collapsed')) {
			// expand the panel
			$(this).parents('.panel').find('.panel-body').slideDown();
			$(this).removeClass('panel-collapsed');
			$(this).find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
		}
		else {
			// collapse the panel
			$(this).parents('.panel').find('.panel-body').slideUp();
			$(this).addClass('panel-collapsed');
			$(this).find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
		}
	});
	
	$("#qtransport_start").change(function(){		
		$("#qtransport_route_start1").val($(this).val());
	});
	
	$("#quotation_day").change(function(){
		//harus cek yang di hotel dulu
		//???
		
		dayCount = parseInt($("#quotation_day").val());
		if ($.trim(dayCount) == ""){
			dayCount = 0
		} 
		//TRANSPORT==================================================
		jumElemen = $(".input-transport").length+1;
		
		//hapus
		if (jumElemen-dayCount-1 > 0) {			
			mulai = dayCount+1;			
			for (i=dayCount+1; i<jumElemen; i++){
				$("div").remove("#qtw_"+i);		
				$("div").remove("#ent_"+i);	
				$("div").remove("#meal_"+i);
				$("div").remove("#run_"+i);
			}
		} else {			
			//nambah
			for (i=jumElemen; i<=dayCount; i++){
				//TRANSPORT
				isi = "<div class='form-group input-transport' id='qtw_" + i + "'>";
				isi += "<label for='qtransport_route" + i + "' class='control-label col-md-1 no-pad-r'>D" + i + "</label>";
				isi += "<div class='col-md-2 no-pad-r'>";
				isi += "<input name='qtransport_route_start" + i + "' type='text' class='form-control' id='qtransport_route_start" + i + "' readonly></div>";				
				isi += "<label class='control-label col-md-1 no-pad-l no-pad-r' style='margin-right:5px; width: 10px;'>-</label>";
				isi += "<div class='col-md-5 no-pad-l'>";				
				isi += "<input name='qtransport_route" + i + "' type='text' class='form-control' id='qtransport_route" + i + "' onchange='changeRoute("+i+")'></div></div>";
				//$("#formInsertTransport").append(isi);							  							
				$(isi).insertBefore(".group-btn-transport");
				
				//ENTRANCE
				isi = "<div class='panel' id='ent_"+ i +"'>";
				isi += "<div class='form-group'>";
				isi += "<label for='qentrance_start' class='control-label col-md-1 no-pad-r'>D"+i+"</label>";
				isi += "<div class='col-md-4 no-pad-r' style='margin-right: 5px;'>";
				isi += "<input name='qentrance_"+i+"1' type='text' class='form-control' id='qentrance_"+i+"1'>";
				isi += "</div>";
				isi += "<div class='col-md-1 no-pad-l no-pad-r' style='margin-right:5px;'>";
				isi += "<button id='btnAddEn"+i+"1' type='button' class='btn btn-success' style='margin-right:5px;' onclick='addEntrance(this,"+i+", 2)'>";
				isi += "<span class='glyphicon glyphicon-plus'></span>";
				isi += "</div>";
				isi += "</div></div>";
				$(isi).insertBefore(".group-btn-entrance");		

				//MEAL
				isi = "<div id='meal_"+i+"'>";
				isi += "<table class='table borderless table-font' cellspacing='0' width='100%'>";
				isi += "<tbody><tr><td>&nbsp;</td><td align='center'>Breakfast</td><td align='center'>Lunch</td><td align='center'>Dinner</td></tr>";
				isi += "<tr><td align='right'><label class='control-label'>D"+i+"</label></td><td>";
				//--------------RESTOURANT BREAKFAST ---------------
				isi += "<select class='form-control'>";
				isi += "<option>Abalone Casserolesinuseongtown</option>";
				isi += "<option>Abalone Porridgesejong Garden</option>";
				isi += "</select>";
				isi += "</td><td>";
				//--------------RESTOURANT LUNCH ---------------	
				isi += "<select class='form-control'>";
				isi += "<option>Abalone Casserolesinuseongtown</option>";
				isi += "<option>Abalone Porridgesejong Garden</option>";
				isi += "</select>";
				isi += "</td><td>";
				//--------------RESTOURANT DINNER ---------------
				isi += "<select class='form-control'>";
				isi += "<option>Abalone Casserolesinuseongtown</option>";
				isi += "<option>Abalone Porridgesejong Garden</option>";
				isi += "</select>";
				isi += "</td></tr>";
				isi += "<tr><td align='right'><label class='control-label'>Menu 1</label></td><td>";
				//-------------MENU 1 : BREAKFAST ---------
				isi += "<select class='form-control'>";
				isi += "<option>Abalone Casserole</option>";
				isi += "<option>Abalone Porridge</option>";
				isi += "</select>";
				isi += "</td><td>";
				//-------------MENU 1 : LUNCH ---------
				isi += "<select class='form-control'>";
				isi += "<option>Abalone Casserole</option>";
				isi += "<option>Abalone Porridge</option>";
				isi += "</select>";
				isi += "</td><td>";
				//-------------MENU 1 : DINNER ---------
				isi += "<select class='form-control'>";
				isi += "<option>Abalone Casserole</option>";
				isi += "<option>Abalone Porridge</option>";
				isi += "</select>";
				isi += "</td></tr><tr><td align='right'><label class='control-label'>Menu 2</label></td><td>";
				//-------------MENU 2 : BREAKFAST ---------	
				isi += "<select class='form-control'>";
				isi += "<option>Abalone Casserole</option>";
				isi += "<option>Abalone Porridge</option>";
				isi += "</select>";
				isi += "</td><td>";
				//-------------MENU 2 : LUNCH ---------
				isi += "<select class='form-control'>";
				isi += "<option>Abalone Casserole</option>";
				isi += "<option>Abalone Porridge</option>";
				isi += "</select>";
				isi += "</td><td>";
				//-------------MENU 2 : DINNER ---------
				isi += "<select class='form-control'>";
				isi += "<option>Abalone Casserole</option>";
				isi += "<option>Abalone Porridge</option>";
				isi += "</select>";
				isi += "</td></tr></tbody></table><hr></div>";

				$(isi).insertBefore(".group-btn-meal");	
				
				//RUNDOWN
				isi = "<div class='panel' id='run_"+i+"'>";
				isi += "<div class='form-group'>";
				isi += "<label class='control-label col-md-1 no-pad-r' style='margin-right: 5px;'>D"+i+"</label>";
				isi += "<div class='col-md-6 no-pad-l'>";
				isi += "<input name='qrundownRoute_"+i+"' type='text' class='form-control' id='qrundownRoute_"+i+"' readonly>";
				isi += "</div>";
				isi += "</div>";
				isi += "<div class='form-group'>";
				isi += "<div class='col-md-1 no-pad-r no-pad-l' style='margin-left: 5px;'>";
				isi += "<input name='qtimeStart_"+i+"1' type='time' class='form-control' id='qtimeStart_"+i+"1'>";
				isi += "</div>";
				isi += "<label class='control-label col-md-1 no-pad-l no-pad-r' style='margin-right:5px; width: 10px;'>-</label>";
				isi += "<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>";
				isi += "<input name='qtimeEnd_"+i+"1' type='time' class='form-control' id='qtimeEnd_"+i+"1'>";
				isi += "</div>";
				isi += "<div class='col-md-4 no-pad-l'>";
				isi += "<input name='qremark_"+i+"1' type='text' class='form-control' id='qremark_"+i+"1'>";
				isi += "</div>";
		
				isi += "<div class='col-md-1 no-pad-l no-pad-r' style='margin-right:5px;'>";
				isi += "<button id='btnAddTime"+i+"1' type='button' class='btn btn-success' style='margin-right:5px;' onclick='addTime(this,"+i+", 2)'>";
				isi += "<span class='glyphicon glyphicon-plus'></span>";
				isi += "</div>";
				isi += "</div>";
				isi += "</div>";
				$(isi).insertBefore(".group-btn-rundown");	
			}
		}
		//===========================================================
	});	
} );

function addTime(el, induk, nomor)
{
	noBaru = nomor + 1;
	isi = "<div id='wrapperTime"+induk+nomor+"'><div class='form-group'>";
	isi += "<div class='col-md-1 no-pad-r no-pad-l' style='margin-left: 5px;'>";
	isi += "<input name='qtimeStart_"+induk+nomor+"' type='time' class='form-control' id='qtimeStart_"+induk+nomor+"'>";
	isi += "</div>";
	isi += "<label class='control-label col-md-1 no-pad-l no-pad-r' style='margin-right:5px; width: 10px;'>-</label>";
	isi += "<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>";
	isi += "<input name='qtimeEnd_"+induk+nomor+"' type='time' class='form-control' id='qtimeEnd_"+induk+nomor+"'>";
	isi += "</div>";
	isi += "<div class='col-md-4 no-pad-l'>";
	isi += "<input name='qremark_"+induk+nomor+"' type='text' class='form-control' id='qremark_"+induk+nomor+"'>";
	isi += "</div>";
		
	isi += "<div class='col-md-1 no-pad-l no-pad-r' style='margin-right:5px;'>";
	isi += "<button id='btnAddTime"+induk+nomor+"' type='button' class='btn btn-success' style='margin-right:5px;' onclick='addTime(this,"+induk+", "+noBaru+")'>";
	isi += "<span class='glyphicon glyphicon-plus'></span>";
	isi += "<button type='button' class='btn btn-danger' onclick='removeTime("+induk+", "+nomor+")'>";
	isi += "<span class='glyphicon glyphicon-remove'></span>";
	isi += "</button>";
	isi += "</div></div></div>";
	$("#run_"+induk).append(isi);
	$(el).prop('disabled',true);	
}

function removeTime(induk, nomor)
{
	nomorLama = nomor - 1;
	
	if ($("#btnAddTime"+induk+nomor).prop('disabled')==false){
		$("#btnAddTime"+induk+nomorLama).prop('disabled',false);
	}	
	$("#wrapperTime"+induk+nomor).remove();
	
}

function removeEntrance(induk, nomor)
{
	nomorLama = nomor - 1;
	
	if ($("#btnAddEn"+induk+nomor).prop('disabled')==false){
		$("#btnAddEn"+induk+nomorLama).prop('disabled',false);
	}	
	$("#wrapperEntrance"+induk+nomor).remove();
	
}

function addEntrance(el, induk, nomor)
{
	nomorBaru = parseInt(nomor) + 1;
	isi = "<div id='wrapperEntrance"+induk+nomor+"'><div class='form-group'>";
	isi += "<label for='qentrance_start' class='control-label col-md-1 no-pad-r'>&nbsp;</label>";
	isi += "<div class='col-md-4 no-pad-r' style='margin-right: 5px;'>";
	isi += "<input name='qentrance_"+induk+nomor+"' type='text' class='form-control' id='qentrance_"+induk+nomor+"'>";
	isi += "</div>";
	isi += "<div class='col-md-1 no-pad-l no-pad-r' style='margin-right:5px;'>";
	isi += "<button id='btnAddEn"+induk+nomor+"' type='button' class='btn btn-success' style='margin-right:5px;' onclick='addEntrance(this, "+induk+", "+nomorBaru+")'>";
	isi += "<span class='glyphicon glyphicon-plus'></span>";
	isi += "</button>";				
	isi += "<button type='button' class='btn btn-danger' onclick='removeEntrance("+induk+", "+nomor+")'>";
	isi += "<span class='glyphicon glyphicon-remove'></span>";
	isi += "</button></div></div>";
	$("#ent_"+induk).append(isi);
	$(el).prop('disabled',true);	
}

function changeRoute(no)
{
	str = $("#qtransport_route"+no).val();	
	lastPlace = (str.substr(str.lastIndexOf(" - ")+3, str.length - (str.lastIndexOf(" - ")+3))).trim();	
	$("#qtransport_route_start"+(parseInt(no)+1)).val(lastPlace);
	
	//MENGISI BAGIAN RUNDOWN
	rute = $("#qtransport_route_start"+no).val()+ " - " + $("#qtransport_route"+no).val();
	$("#qrundownRoute_"+no).val(rute);
}

function changeHotel(tipe)
{
	jumElemen = $(".input-hotel"+tipe).length;
	//menghitung berapa malam yang diinputkan
	jumNight = 0;
	for (i=1; i<=jumElemen; i++){
		jumNight += parseInt($("#qhotel_type"+tipe+i+"_night").val());
	}
	
	//kalau masih kurang, create 1 lagi
	noElemen = jumElemen + 1;
	night = jumNight + 1;
	if (jumNight<parseInt($("#quotation_night").val())){
		isi = "<div class='form-group input-hotel"+tipe+"'>";
		isi += "<label for='qhotel_type1"+noElemen+"_cb' class='control-label col-md-1 no-pad-r'>D"+night+"</label>";
		isi += "<div class='col-md-4 no-pad-r' style='margin-right: 5px;'>";
		isi += "<select name='qhotel_type1"+noElemen+"_cb' class='form-control min-padding' id='qhotel_type1"+noElemen+"_cb'>";
		isi += "<option selected='selected'>Suwon Bloom Vista</option>";
		isi += "<option>Summit Or Jamsung</option>";
		isi += "</select>";
		isi += "</div>";
		isi += "<div class='col-md-1 no-pad-l no-pad-r' style='margin-right:5px'>";
		isi += "<input name='qhotel_type1"+noElemen+"_night' type='text' class='form-control' id='qhotel_type1"+noElemen+"_night' placeholder='Night' onchange='changeHotel(1)'>";
		isi += "</div>";
		
		isi += "<div class='col-md-1 no-pad-l'>";
		isi += "<button type='button' class='btn btn-danger'>";
		isi += "<span class='glyphicon glyphicon-remove'></span></button></div></div>";
								
		
		$("#formInsertHotel"+tipe).append(isi);	
	}	
}
