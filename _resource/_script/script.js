$(document).ready( function () {
  $('input[type=date]').datepicker();
  $('table.datatable').dataTable();  
  $('.combobox').combobox();  
  
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
	
	$("#quotation_day").change(function(){		
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
				$(".input-transport:last").remove();				
				$(".input-entrance:last").remove();	
				$(".input-meal:last").remove();
				$("div").remove("#run_"+i);
			}
		} else {			
			//nambah
			for (i=jumElemen; i<=dayCount; i++){
				//TRANSPORT				
				$(".input-transport").find("input[type='hidden']").attr("onchange", "changeRoute('1')");	
				myEl = $(".input-transport").first().clone(false);					
				myEl.find("label").attr("for", "route_"+i);
				myEl.find("label").html("Day "+i);	
				myEl.find(".combobox-container").remove();				
				myEl.find("select").attr('id', myEl.find("select").attr('id').substring(0, myEl.find("select").attr('id').indexOf("_"))+"_"+i);
				myEl.find("select").combobox();
				myEl.find("input[type='hidden']").attr("name", "route_"+i);			
				myEl.find("input[type='hidden']").attr("onchange", "changeRoute('"+i+"')");
				myEl.insertBefore(".group-btn-transport");
				
				//ENTRANCE
				myEl = $(".input-entrance").first().clone(false);	
				myEl.find("label").attr("for", "entrance_"+i);
				myEl.find("label").html("Day "+i);					
				myEl.find(".combobox-container").remove();				
				myEl.find("select").attr('id', myEl.find("select").attr('id').substring(0, myEl.find("select").attr('id').indexOf("_"))+"_"+i);
				myEl.find("select").combobox();
				myEl.find("input[type='hidden']").attr("name", "entrance_"+i);					
				myEl.insertBefore(".group-btn-entrance");		

				//MEAL
				myEl = $(".list-of-meal").first().clone(false);					
				myEl.find("label").html("D"+i);							
				myEl.find(".combobox-container").remove();
				
				c = 1;
				myEl.find("select").each(function(){				
					$(this).attr('id', $(this).attr('id').substring(0, $(this).attr('id').indexOf("_"))+"_"+i+"_"+c);
					c++;
				});
				myEl.find("select").combobox();
				
				c = 1;
				myEl.find("input[type='hidden']").each(function(){
					$(this).attr("name", "restaurant_"+i+"_"+c);	
					c++;
				});
				
				$("#table-meal").append(myEl);
				
				//RUNDOWN
				isi = "<div class='panel' id='run_"+i+"'>";
				isi += "<div class='form-group'>";
				isi += "<label id='runday_"+i+"' class='control-label col-md-5 no-pad-l' style='text-align: left; margin-left: 5px;'>D"+i+": </label>";				
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

function changeRoute(no)
{		
	//MENGISI BAGIAN RUNDOWN			
	kode = $("input[type='hidden'][name='route_"+no+"']").val();
	rute = $("#route_"+no+" option[value='"+kode+"']").text();	
	$("#runday_"+no).html("D"+no+": "+rute);
	
	//BAGIAN SET BATASAN HOTEL
	//1. dapatkan kode transport yang dipilih
	//2. dapatkan day nomor berapa yang diganti
	//3. update pilihan HOTEL, ENTRANCE, MEAL pada hari ybs
}



function changeHotel(tipe, hari)
{	
	jumInput = $(".cont-hotel"+tipe).find(".hotel_type"+tipe).length;	
	jumMalam = parseInt($("#quotation_night").val());
	
	c = 1;
	jumNilai = 0;
	stopElement = 0
	$(".cont-hotel"+tipe).find(".hotel_type"+tipe).each(function(){		
		temp = parseInt($(this).find("#hotel_ed_"+tipe+"_"+c).val());							
		if (jumMalam >= jumNilai+temp){
			if (c>1){			
				x = jumNilai+1;
				$(this).find("#hotel_lb_"+tipe+"_"+c).html("D"+x);
			}
			jumNilai = jumNilai + temp;
		} else {
			sisa = jumMalam - jumNilai;
			jumNilai = sisa;
			$(this).find("#hotel_ed_"+tipe+"_"+c).val(sisa);
			if (stopElement<=0 && sisa<=0) stopElement = c;
		}					
		c++;
	});
	
	//jika kelebihan	
	if (stopElement>0){
		for (i=stopElement; i<=jumInput; i++){		
			$("div .input-hotel"+tipe+"_"+i).remove();
		}
	}	
	
	//jika kurang
	if (jumNilai<jumMalam){		
		nomor = jumInput + 1;
		hari = jumNilai + 1;
		
		myEl = $(".hotel_type"+tipe).first().clone(false);					
		myEl.removeClass("input-hotel"+tipe+"_1");
		myEl.addClass("input-hotel"+tipe+"_"+nomor);
		
		myEl.find("label").attr("id","hotel_lb_"+tipe+"_"+nomor);
		myEl.find("label").html("D"+hari);
		myEl.find(".combobox-container").remove();	
		myEl.find("select").attr("id","hotel_cb_"+tipe+"_"+nomor);
		myEl.find("select").combobox();
		myEl.find("input [type='number']").attr("id","hotel_ed_"+tipe+"_"+nomor);
		myEl.find("input[type='number']").attr("onchange", "changeHotel('"+tipe+"','"+hari+"')");
		myEl.find("input[type='number']").val(1);
		
		$(".cont-hotel"+tipe).append(myEl);	

		//kalau munculkan baru, maka harus set daftar pilihannya
		//1. dapatkan hari ke berapa hotel yang baru dibentuk	
		//2. cek ke transport, dapatkan kode transport
	}
}

function copyElement(id,newname) {
  o = $("#"+id);
  o.attr("name",newname);
  o.attr("id",newname);
  return o;
}