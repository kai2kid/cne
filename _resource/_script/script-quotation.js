$(document).ready( function () {					
	//starting quotation
	$("#quotation_day").change();	
  $('input[type=date]').datepicker();
	$('table.datatable').dataTable();  
	$('.combobox').combobox();  
	
	no = 1;	
	$("#formInsertTransport").find(".input-transport").each(function(){	
		$(this).find("input[type='hidden']").attr("onchange", "changeRoute('"+no+"')");	
		no = no + 1;		
	});
  
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
	
	//NIGHT===================================================================================
	//<div class="form-group hotel_type1 input-hotel1_1">
	$("#quotation_night").change(changeNight);
	
	
	//DAY=====================================================================================
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
				$(".input-transport").first().find("input[type='hidden']").attr("onchange", "changeRoute('1')");	
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
    
    $("#quotation_night").val(parseInt($("#quotation_day").val())-1);
    changeNight();
	});	
  
} );

function changeNight(){
  niteCount = parseInt($("#quotation_night").val());
    if ($.trim(niteCount) == ""){
      niteCount = 0
    } 
    
    jumElemen = $(".hotel_type1").length+1;
    
    if (jumElemen-niteCount-1 > 0) {      
      mulai = niteCount+1;      
      for (i=niteCount+1; i<jumElemen; i++){        
        $(".hotel_type1:last").remove();                            
        $(".hotel_type2:last").remove();  
        $(".hotel_type3:last").remove();  
      }
    } else{
      for (nomor=jumElemen; nomor<=niteCount; nomor++){
        for (tipe=1; tipe<=3; tipe++){
          myEl = $(".hotel_type"+tipe).first().clone(false);  
          myEl.removeClass("input-hotel"+tipe+"_1");
          myEl.addClass("input-hotel"+tipe+"_"+nomor);
          
          myEl.find("label").attr("id","hotel_lb_"+tipe+"_"+nomor);
          myEl.find("label").html("D"+nomor);
          myEl.find(".combobox-container").remove();  
          myEl.find("select").attr("id","hotel_cb_"+tipe+"_"+nomor);
          myEl.find("select").combobox();
          
          
          $(".cont-hotel"+tipe).append(myEl);
        }
      }
    }        
  
}

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
	
	urutan = no - 1;
	LIke = $("#formInsertTransport").children().eq(urutan).find("select > option[value='"+kode+"']").index();
	pathRoute = $("#formInsertTransport").children().eq(urutan).find("select").children().eq(LIke).attr("name").split(";");			    
	
	$("#formInsertEntrance").children().eq(urutan).find("select").children("*").hide();
	$("#formInsertMeal").children().eq(urutan).find("select").children("*").hide();
	
	//temukan index D yang ke LIke
	idx = 0;
	c = 0;
	$("#formInsertHotel > div.cont-hotel1").find("label.control-label").each(function(){		
		if (parseInt(($(this).html()+" ").substring(1,2).trim()) == parseInt(urutan)+1){
			idx = c;			
		}
		c++;
	});
	
	$("#formInsertHotel > div.cont-hotel1").children().eq(idx).find("select").children("*").hide();
	$("#formInsertHotel > div.cont-hotel2").children().eq(idx).find("select").children("*").hide();
	$("#formInsertHotel > div.cont-hotel3").children().eq(idx).find("select").children("*").hide();
	
	for (i=0; i<pathRoute.length; i++){
		$("#formInsertEntrance").children().eq(urutan).find("select").children("[name*='"+pathRoute[i]+"']").show();
		$("#formInsertHotel > div.cont-hotel1").children().eq(idx).find("select").children("[name*='"+pathRoute[i]+"']").show();
		$("#formInsertHotel > div.cont-hotel2").children().eq(idx).find("select").children("[name*='"+pathRoute[i]+"']").show();
		$("#formInsertHotel > div.cont-hotel3").children().eq(idx).find("select").children("[name*='"+pathRoute[i]+"']").show();
    
    $("#formInsertMeal").children().eq(urutan).find("select").children("[name*='"+pathRoute[i]+"']").show();
//    $("#formInsertMeal").find("#restaurant_"+(i+1).toString()+"_1").children("[name*='"+pathRoute[i]+"']").show();
//    $("#formInsertMeal").find("#restaurant_"+(i+1).toString()+"_2").children("[name*='"+pathRoute[i]+"']").show();
//    $("#formInsertMeal").find("#restaurant_"+(i+1).toString()+"_3").children("[name*='"+pathRoute[i]+"']").show();
	}			
  
  //FILTER route lain
  nextChild = urutan + 1; 
  endRoute = $("#formInsertTransport").children().eq(urutan).find("select").children().eq(LIke).attr("en");
  
  $("#formInsertTransport").children().eq(nextChild).find("select").children("*").hide();
  $("#formInsertTransport").children().eq(nextChild).find("select").children("[st*='"+endRoute+"']").show();
  
  
}

function copyElement(id,newname) {
  o = $("#"+id);
  o.attr("name",newname);
  o.attr("id",newname);
  return o;
}

$(document).ready( function () {          
  //trigger change route
  for (day = 1 ; day <= parseInt($("#quotation_day").val()); day++) {
    changeRoute(day.toString());
  }
});