function changeDP(level,ctr) {
  var usd = parseInt($(".price_gt.price_fare_usd.pax_"+ctr+".level_"+level).attr('title'));
  var decided = parseInt($("#price_decided_"+level+"_"+ctr).val());
  var minus = decided - usd;
  $("#price_minus_"+level+"_"+ctr).attr("title",minus);
  $("#price_minus_"+level+"_"+ctr).html(minus);
}

function calculateEach(type,pax,level) {
    var single = 0;
    var calc = 0;
    var route = "4";
    var people = parseInt($("#num_pax_"+pax.toString()).val());
    if (type == "hotel") {
      people = Math.ceil(people / 2);
    }
    $(".price_"+type+".price_each.pax_0.level_0,.price_"+type+".price_each.pax_"+pax.toString()+".level_0,.price_"+type+".price_each.pax_"+pax.toString()+".level_"+level.toString()).each(function(index) {    
      day = parseInt($(this).attr('day'));
      if (type == "transport") {
        if (people <= 17) route = "4";
        if (people <= 13) route = "3";
        if (people <= 9) route = "2";
        if (people <= 4) route = "1";
        calc = parseInt($(".price_"+type+".price_single.level_0.day_"+day.toString()+".transport_"+route).attr("title"));
      } else {        
        single = parseInt($(".price_"+type+".price_single.level_0.day_"+day.toString()+",.price_"+type+".price_single.level_"+level.toString()+".day_"+day.toString()).attr("title"));
        calc = single * people;
      }
      $(this).attr('title',calc);
      $(this).html(addCommas(calc));
    });  
}
function calculateSubtotal(type,pax,level) {
  calculateEach(type,pax,level);

  total = 0;
  $(".price_"+type+".price_each.pax_0.level_0,.price_"+type+".price_each.pax_"+pax.toString()+".level_0,.price_"+type+".price_each.pax_"+pax.toString()+".level_"+level.toString()).each(function(index) {
    total += parseInt($(this).attr("title"));
  });
  $(".price_"+type+".price_subtotal.pax_0.level_0,.price_"+type+".price_subtotal.pax_"+pax.toString()+".level_0,.price_"+type+".price_subtotal.pax_"+pax.toString()+".level_"+level.toString()).attr("title",total.toString());
  $(".price_"+type+".price_subtotal.pax_0.level_0,.price_"+type+".price_subtotal.pax_"+pax.toString()+".level_0,.price_"+type+".price_subtotal.pax_"+pax.toString()+".level_"+level.toString()).html(addCommas(total.toString()));
}

function calculateGrandTotal(pax,level) {
  calculateSubtotal("hotel",pax,level);
  calculateSubtotal("hotelbreakfast",pax,level);
  calculateSubtotal("meal",pax,level);
  calculateSubtotal("entrance",pax,level);
  calculateSubtotal("transport",pax,level);

  total = 0;
  $(".price_subtotal.pax_0.level_0,.price_subtotal.pax_"+pax.toString()+".level_0,.price_subtotal.pax_"+pax.toString()+".level_"+level.toString()).each(function(index) {
    total += parseInt($(this).attr("title"));
  });
  $(".price_gt.price_grandtotal.pax_"+pax.toString()+".level_"+level.toString()).attr("title",total.toString());
  $(".price_gt.price_grandtotal.pax_"+pax.toString()+".level_"+level.toString()).html(addCommas(total.toString()));
  
  people = parseInt($("#num_pax_"+pax.toString()).val());
  rate = parseInt($("#rate_usd").val());
  calc = Math.round(total / people);
  $(".price_fare_krw.pax_"+pax.toString()+".level_"+level.toString()).attr("title",calc.toString());
  $(".price_fare_krw.pax_"+pax.toString()+".level_"+level.toString()).html(addCommas(calc.toString()));
  
  calc = Math.round(calc / rate);
  $(".price_fare_usd.pax_"+pax.toString()+".level_"+level.toString()).attr("title",calc.toString());
  $(".price_fare_usd.pax_"+pax.toString()+".level_"+level.toString()).html(addCommas(calc.toString()));
  
  calc = Math.round(calc / Math.ceil(people/2) / 2 * 1.15);
  $(".price_gt.price_sglspl.pax_"+pax.toString()+".level_"+level.toString()).attr("title",calc.toString());
  $(".price_gt.price_sglspl.pax_"+pax.toString()+".level_"+level.toString()).html(addCommas(calc.toString()));

  changeDP(level,pax);
}

function calculate(pax) {
  
  
  pax = parseInt(pax);
  var guide = 1 + Math.floor(pax/30);
  var totalpax = pax + guide;

  $("#num_people_1").val(pax);
  $("#num_guide_1").val(guide);
  $("#num_pax_1").val(totalpax);

  $(".price_title.pax_1").html(pax.toString() + "+" + guide.toString());
  var room = Math.ceil(totalpax/2);
  $(".price_title.pax_1.title_hotel").html(pax.toString() + "+" + guide.toString() + " ( "+room.toString()+" RM)");  
  calculateGrandTotal(1,5);
  calculateGrandTotal(1,4);
  calculateGrandTotal(1,3);
}
