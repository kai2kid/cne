function changeDP(level,ctr) {
  var minus = parseInt($("#price_decided_"+level+"_"+ctr).val()) - parseInt($("#price_fare_usd_"+level+"_"+ctr).val()).toString();
  $("#price_minus_"+level+"_"+ctr).attr("title",minus);
  $("#price_minus_"+level+"_"+ctr).html(minus);
}