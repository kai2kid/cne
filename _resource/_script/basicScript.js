function navigate(page,target) {
//  history.replaceState({ url: page, main : $("main").html() }, "", page);
  history.replaceState({ url: document.URL }, "", document.location);
//  $("main").hide();
//  $("main").hide("slide", { direction: "left" }, 1000);
  if (target == undefined || target == 'main') {    
    target = "main";
  } else {
    target = "#" + target;
  }
  $("main").html("loading...<br>");
//  ajaxRequest(page,target);
  document.location=page;
  return false;
}
function ajaxRequest(page,target) {
  if (target == undefined || target == 'main') {    
    target = "main";
  } else {
    target = "#" + target;
  }
  $.ajax( {    
    url:page+"&ajax",
    success:function(result){
      $(target).html(result);
      $(target).fadeIn('fast');
//      $("main").show("slide", { direction: "left" }, 1000);
//      history.pushState({ url: page, main : $("main").html() }, "", page);
      history.pushState({ url: page }, "", page);
    }
  } );
}

window.onpopstate = function (event) {
//  $("main").html(event.state.main);
  $("main").hide();
  $.ajax( {    
    url:event.state.url+"&ajax",
    success:function(result){
      $("main").html(result);
      $("main").fadeIn('fast');
    }
  } );
  return false;
}
function navigateDetail(page,target) {
  if (target == undefined) { target = "main"; }
//  $("main").slideUp();
  $("main").hide();
  ajaxRequest(page,target);
//  $(target).slideDown();
  $(target).show();
}
function navigateDetailBack() {
//  $("main").slideDown();
  $("main").show();
//  $(target).slideUp();
  $(target).hide();
}
