$(document).ready( function () {		
	$("#route_path").tokenInput("location_selecting", {theme: "facebook"});	
	
	//$("#route_path").tokenInput("add", {id: "LO0099", name: "Eka"});	
	
	$("#route_path").change(function(){		
    $("#route_path_code").val($(this).val());
		
		listCode = $(this).val().split(";");
		
		$("#route_start").val(listCode[0]);
		$("#route_end").val(listCode[listCode.length-1]);
	});
  
    
});	