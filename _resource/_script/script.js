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
			}
		} else {			
			//nambah
			for (i=jumElemen; i<=dayCount; i++){
				isi = "<div class='form-group input-transport' id='qtw_" + i + "'>";
				isi += "<label for='qtransport_route" + i + "' class='control-label col-md-1 no-pad-r'>D" + i + "</label>";
				isi += "<div class='col-md-2 no-pad-r'>";
				isi += "<input name='qtransport_route_start" + i + "' type='text' class='form-control' id='qtransport_route_start" + i + "' readonly></div>";				
				isi += "<label class='control-label col-md-1 no-pad-l no-pad-r' style='margin-right:5px; width: 10px;'>-</label>";
				isi += "<div class='col-md-5 no-pad-l'>";				
				isi += "<input name='qtransport_route" + i + "' type='text' class='form-control' id='qtransport_route" + i + "' onchange='changeRoute("+i+")'></div></div>";
				//$("#formInsertTransport").append(isi);							  							
				$(isi).insertBefore(".group-btn-transport");
			}
		}
		//===========================================================
	});	
} );

function changeRoute(no)
{
	str = $("#qtransport_route"+no).val();	
	lastPlace = (str.substr(str.lastIndexOf(" - ")+3, str.length - (str.lastIndexOf(" - ")+3))).trim();	
	$("#qtransport_route_start"+(parseInt(no)+1)).val(lastPlace);
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
		isi += "<button class='btn btn-danger' type='button' onclick='alert(\"belum\")'>&times;</button>";									
		isi += "</div></div>";
		$("#formInsertHotel"+tipe).append(isi);	
	}
}
