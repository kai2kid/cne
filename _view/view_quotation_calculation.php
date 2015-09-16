<div class="bs-callout bs-callout-info">
  <div class="collapse navbar-collapse" style="padding-left:0px;">
    <label class="title">Preview: <?php echo $model->quotation_code . " - " . $model->quotation_name; ?></label>
  </div>
</div>
        
  <div class="vs-s"></div>    

  <table class="table table-striped table-bordered table-font" cellspacing="0" width="100%" id="table_master">
    <thead>
      <tr>
        <th width="25px">Day</th>
        <th>Schedule</th>
        <th width="250px">Hotel</th>
        <th width="200px">Meal</th>
<!--        <th width="200px">Transport</th>-->
        <th width="250px">Entrance</th>
      </tr>
    </thead>
    <tbody>
      <?php for ($day=1; $day <= $model->quotation_days ; $day++) { ?>
      <tr>
          <td><?php echo $day; ?></td>
          <td>
            <b><?php echo $model->days[$day]["route_title"]; ?></b>
            <?php foreach ($model->detail['rundown'][$day] as $detail) { ?>
            <br><?php echo $detail["qdetail_time_start"] . "-" . $detail["qdetail_time_end"] . " &nbsp; " . $detail["qdetail_title"]; ?>
            <?php } ?>
          </td>
          <td>
            <?php foreach ($model->detail['hotel'][$day] as $level=>$detail) { ?>
              <?php echo text_hotelLevel($level,0) . ": " . $detail["hotel_name"]; ?><br>
            <?php } ?>
          </td>
          <td>
            <?php foreach ($model->detail['restaurant'][$day] as $detail) { ?>
              <?php echo text_mealLevel($detail["qday_rest_type"],0) . ": " . $detail["restaurant_name"] . " <br> " . $detail["menu_name"]; ?><br>
            <?php } ?>
          </td>
<!--          <td>
            <?php foreach ($model->detail['transport'][$day] as $detail) { ?>
              <?php echo $detail["transport_name"]; ?><br>
            <?php } ?>
          </td>   -->
          <td>
            <?php foreach ($model->detail['entrance'][$day] as $detail) { ?>
              <?php echo $detail["entrance_name"]; ?><br>
            <?php } ?>
          </td>
      </tr>
      <?php } ?>      
    </tbody>    
  </table>

<div class="bs-callout bs-callout-info">
  <div class="collapse navbar-collapse" style="padding-left:0px;">
    <label class="title">Price List: <?php echo $model->quotation_code . " - " . $model->quotation_name; ?></label>
  </div>
</div>
        
  <div class="vs-s"></div>    

<?php foreach ($pax_estimated as $title=>$pax) { $gtot[$pax]['*'] = 0; $gtot[$pax][3] = 0; $gtot[$pax][4] = 0; $gtot[$pax][5] = 0; } ?>
<!-- ROOM PRICE -->
  <?php foreach([5,4,3] as $level) { ?>
  <table class="table table-striped table-bordered table-font" cellspacing="0" width="100%" id="table_master">
    <caption><b><?php echo text_hotelLevel($level); ?> Hotel (1 RM for 2 people)</b></caption>
    <thead>
      <tr>
        <th width="25px">Day</th>
        <th>Name</th>
        <th class="text-right" width="110px">1 RM</th>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <th class="text-right" width="110px"><?php echo $title . " (".(ceil($pax / 2))." RM)"?></th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pax_estimated as $title=>$pax) { $subt[$pax][$level] = 0;} ?>
      <?php for ($day=1; $day < $model->quotation_days ; $day++) { 
        $i = $day+1; $loop = 1; $ctr = 1;
        while ($i < $model->quotation_days && $loop == 1) {
          if ($model->detail['hotel'][$day][$level]['hotel_code'] == $model->detail['hotel'][$i][$level]['hotel_code']) {
            $ctr++;
          } else {
            $loop = 0;
          }
          $i++;
        }
        $day += $ctr-1;
      ?>
      <tr>
          <td><?php echo $day+1-$ctr; ?></td>
          <td><?php echo $model->detail['hotel'][$day][$level]['hotel_name'] . ($ctr > 1 ? " x " . $ctr : ""); ?></td>
          <td align="right"><?php echo number_format($model->detail['hotel'][$day][$level]['hotel_price_room_standard'] * $ctr); ?></td>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <td align="right">
            <?php 
              $amt = $model->detail['hotel'][$day][$level]['hotel_price_room_standard'] * $ctr;
              $sub = ($amt * ceil($pax / 2)); 
              echo number_format($sub); 
              $subt[$pax][$level] += $sub; 
              $gtot[$pax][$level] += $sub; 
            ?>
          </td>
          <?php } ?>
      </tr>      
      <?php }?>
    </tbody>    
    <tfoot>          
      <tr>
        <td colspan="3" align="right">Sub total:</td>        
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <td align="right"><b><?php echo number_format($subt[$pax][$level]); ?></b></td>
        <?php } ?>
      </tr>
    </tfoot>
  </table>
  <?php } ?>      

  <!-- Breakfast PRICE -->
  <?php foreach([5,4,3] as $level) { ?>
  <table class="table table-striped table-bordered table-font" cellspacing="0" width="100%" id="table_master">
    <caption><b>Breakfast at <?php echo text_hotelLevel($level); ?> Hotel</b></caption>
    <thead>
      <tr>
        <th width="25px">Day</th>
        <th>Name</th>
        <th class="text-right" width="110px">1 person</th>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <th class="text-right" width="110px"><?php echo $title; ?></th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pax_estimated as $title=>$pax) { $subt[$pax][$level] = 0;} ?>
      <?php for ($day=1; $day < $model->quotation_days ; $day++) {
        $i = $day+1; $loop = 1; $ctr = 1;
        while ($i < $model->quotation_days && $loop == 1) {
          if ($model->detail['hotel'][$day][$level]['hotel_code'] == $model->detail['hotel'][$i][$level]['hotel_code']) {
            $ctr++;
          } else {
            $loop = 0;
          }
          $i++;
        }
        $day += $ctr-1;
      ?>
      <tr>
          <td><?php echo $day+1-$ctr; ?></td>
          <td><?php echo $model->detail['hotel'][$day][$level]['hotel_name'] . ($ctr > 1 ? " x " . $ctr : ""); ?></td>
          <td align="right"><?php echo number_format($model->detail['hotel'][$day][$level]['hotel_price_breakfast_standard'] * $ctr); ?></td>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <td align="right">
            <?php 
              $amt = $model->detail['hotel'][$day][$level]['hotel_price_breakfast_standard'] * $ctr;
              $sub = ($amt * $pax); 
              echo number_format($sub); 
              $subt[$pax][$level] += $sub; 
              $gtot[$pax][$level] += $sub; 
            ?>
          </td>
          <?php } ?>
      </tr>      
      <?php }?>
    </tbody>    
    <tfoot>          
      <tr>
        <td colspan="3" align="right">Sub total:</td>        
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <td align="right"><b><?php echo number_format($subt[$pax][$level]); ?></b></td>
        <?php } ?>
      </tr>
    </tfoot>
  </table>
  <?php } ?>      

  <!-- MEAL PRICE -->

  <table class="table table-striped table-bordered table-font" cellspacing="0" width="100%" id="table_master">
    <caption><b>Meal</b></caption>
    <thead>
      <tr>
        <th>Meal</th>
        <th class="text-right" width="150px">1 person Avg Price</th>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <th class="text-right" width="110px"><?php echo $title; ?></th>
        <?php $subt[$pax] = 0; ?>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pax_estimated as $title=>$pax) { $subt[$pax] = 0;} ?>
      <?php 
        $ctrbf = 0; $ctrln = 0; $ctrdn = 0; 
        $tmpsub = 0;
        for ($day=1; $day < $model->quotation_days ; $day++) {
          if (isset($model->detail['restaurant'][$day][1]['menu_price_lunch']) && $model->detail['restaurant'][$day][1]['menu_price_lunch'] > 0) {
            $tmpsub += $model->detail['restaurant'][$day][1]['menu_price_lunch'];
            $ctrbf++;
          }
          if (isset($model->detail['restaurant'][$day][2]['menu_price_lunch']) && $model->detail['restaurant'][$day][2]['menu_price_lunch'] > 0) {
            $tmpsub += $model->detail['restaurant'][$day][2]['menu_price_lunch'];
            $ctrln++;
          }
          if (isset($model->detail['restaurant'][$day][3]['menu_price_dinner']) && $model->detail['restaurant'][$day][3]['menu_price_dinner'] > 0) {
            $tmpsub += $model->detail['restaurant'][$day][3]['menu_price_dinner'];
            $ctrdn++;
          }
          $avgmeal = round($tmpsub / ($ctrbf + $ctrln + $ctrdn));
          
        }
      ?>
      <tr>
          <td align="left"><?php echo $ctrbf . " Breakfast + " . $ctrln . " Lunch + " . $ctrdn . " Dinner"; ?></td>
          <td align="right"><?php echo number_format($avgmeal); ?></td>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <td align="right">
            <?php 
              $amt = $avgmeal;
              $sub = ($amt * $pax);
              echo number_format($sub); 
              $subt[$pax] += $sub; 
              $gtot[$pax]['*'] += $sub; 
            ?>
          </td>
          <?php } ?>
      </tr>      
    </tbody>
    <tfoot>          
      <tr>
        <td colspan="2" align="right">Sub total:</td>        
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <td align="right"><b><?php echo number_format($subt[$pax]); ?></b></td>
        <?php } ?>
      </tr>
    </tfoot>
  </table>


  <!-- ENTRANCE PRICE -->
  <table class="table table-striped table-bordered table-font" cellspacing="0" width="100%" id="table_master">
    <caption><b>Entrance Ticket</b></caption>
    <thead>
      <tr>
        <th width="25px">Day</th>
        <th>Name</th>
        <th class="text-right" width="110px">1</th>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <th class="text-right" width="110px"><?php echo $title; ?></th>
        <?php $subt[$pax] = 0; ?>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php for ($day=1; $day <= $model->quotation_days ; $day++) { ?>
      <?php foreach($model->detail['entrance'][$day] as $entrance) { ?>
      <?php if ($entrance['entrance_ticket_group'] > 0) { ?>
      <tr>
        <td><?php echo $day; ?></td>
        <td><?php echo $entrance['entrance_name']; ?></td>
        <td align="right"><?php echo number_format($entrance['entrance_ticket_group']); ?></td>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <td align="right">
          <?php 
            $amt = $entrance['entrance_ticket_group'];
            $sub = ($amt * $pax); 
            echo number_format($sub); 
            $subt[$pax] += $sub; 
//            $gtot[$pax]['*'] += $subt[$pax]; 
            $gtot[$pax]['*'] += $sub; 
          ?>
        </td>
        <?php } ?>
      </tr>      
      <?php }?>
      <?php }?>
      <?php }?>
    </tbody>    
    <tfoot>          
      <tr>
        <td colspan="3" align="right">Sub total:</td>        
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <td align="right"><b><?php echo number_format($subt[$pax]); ?></b></td>
        <?php } ?>
      </tr>
    </tfoot>
  </table>

  <!-- TRANSPORT PRICE -->
  <table class="table table-striped table-bordered table-font" cellspacing="0" width="100%" id="table_master">
    <caption><b>Transport</b></caption>
    <thead>
      <tr>
        <th width="25px">Day</th>
        <th>Route</th>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <th class="text-right" width="110px"><?php echo $title; ?></th>
        <?php $subt[$pax] = 0; ?>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php for ($day=1; $day <= $model->quotation_days ; $day++) { ?>
      <tr>
          <td><?php echo $day; ?></td>
          <td><?php echo $model->days[$day]["route_title"]; ?></td>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <td align="right">
            <?php 
              $amt = 0;
              $sub = $model->days[$day]['route_cost5'];
              if ($pax <= 17) { $sub = $model->days[$day]['route_cost4']; }
              if ($pax <= 13) { $sub = $model->days[$day]['route_cost3']; }
              if ($pax <= 9 ) { $sub = $model->days[$day]['route_cost2']; }
              if ($pax <= 4 ) { $sub = $model->days[$day]['route_cost1']; }
              echo number_format($sub); 
              $subt[$pax] += $sub; 
              $gtot[$pax]['*'] += $sub; 
            ?>
          </td>
          <?php } ?>
      </tr>      
      <?php }?>
    </tbody>    
    <tfoot>          
      <tr>
        <td colspan="2" align="right">Sub total:</td>        
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <td align="right"><b><?php echo number_format($subt[$pax]); ?></b></td>
        <?php } ?>
      </tr>
    </tfoot>
  </table>

  <!-- OTHER PRICE -->
  <table class="table table-striped table-bordered table-font" cellspacing="0" width="100%" id="table_master">
    <caption><b>Others</b></caption>
    <thead>
      <tr>
        <th>Name</th>
        <th class="text-right">price</th>
        <th class="text-right">Amount</th>
        <th class="text-right">Times</th>
        <th class="text-right">Subtotal</th>
      </tr>
    </thead>
    <tbody>
      <?php $other_sub = 0; ?>
      <?php foreach ($model->detail['other'] as $other) { ?>
      <tr>
          <td><?php echo $other["other_text"]; ?></td>
          <td align="right"><?php echo number_format($other["other_price"]); ?></td>
          <td align="right"><?php echo number_format($other["other_satuan"]) . " " . $other["other_satuan_text"]; ?></td>
          <td align="right"><?php echo number_format($other["other_times"]) . " " . $other["other_times_text"]; ?></td>
          <td align="right"><?php echo number_format($other["other_subtotal"]); $other_sub += $other["other_subtotal"]; ?></td>
      </tr>      
      <?php }?>
    </tbody>    
    <tfoot>          
      <tr>
        <th class="text-right" colspan="4">Subtotal</th>
        <th class="text-right"><?php echo number_format($other_sub); ?></th>
        <?php foreach ($pax_estimated as $title=>$pax) { $gtot[$pax]['*'] += $other_sub; } ?>
      </tr>
    </tfoot>
  </table>

  <hr>
  <!-- SUMMARY -->
  <?php foreach([5,4,3] as $level) {?>
  <table class="table table-striped table-bordered table-font" cellspacing="0" width="100%" id="table_master">
    <caption><b>Summmary <?php echo text_hotelLevel($level); ?></b></caption>
    <thead>
      <tr>
        <th colspan=2></th>                                     
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <th class="text-right" width="110px"><?php echo $title; ?></th>
        <?php $subt[$pax] = 0; ?>
        <?php }?>
      </tr>
    </thead>
    <tbody>
      <tr>
          <td rowspan="6" width="250px">
            <table class="table-font" cellspacing="5px" cellpadding="5px" width="100%">
              <tr>
                <td width="100px"><label class='control-label'>MAX MIN:</label></td>
                <td><input type=number class="form-control num" value="150"></td>
              </tr>
              <tr>
                <td><label class='control-label'>RANGE:</label></td>
                <td><input type=number class="form-control num" value="15"></td>
              </tr>
              <tr>
                <td><label class='control-label'>SGL/SPPL:</label></td>
                <td><input type=number class="form-control num" value="20"></td>
              </tr>
            </table>
          </td>
          <td>Grand Total</td>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <td align="right"><?php echo number_format($gtot[$pax]['*'] + $gtot[$pax][$level]); ?></td>
          <?php }?>
      </tr>      
      <tr>
          <td>FARE/PP (KRW)</td>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <td align="right"><?php echo number_format(round(($gtot[$pax]['*'] + $gtot[$pax][$level]) / $pax)); ?></td>
          <?php }?>
      </tr>      
      <tr>
          <td>FARE/PP (USD) [Rate = <?php echo number_format($model->detail["rate_USD"]); ?>]</td>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <td align="right"><?php echo number_format( $fare[$pax][$level]['usd'] = round(($gtot[$pax]['*'] + $gtot[$pax][$level]) / $pax * $rate)); ?></td>
          <?php }?>
      </tr>      
      <tr>
          <td>SGL SPPL</td>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <td align="right"><?php echo number_format(round(($gtot[$pax][$level] * $rate) / ceil($pax/2) / 2)); ?></td>
          <?php }?>
      </tr>      
      <tr>
          <td>DECIDED PRICE</td>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <td align="right"><b><input class="form-control num" type=number value="<?php echo $decided[$pax][$level] = $fare[$pax][$level]['usd']; ?>"></b></td>
          <?php }?>
      </tr>      
      <tr>
        <td align="right">&nbsp;</td>        
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <td align="right"><b><?php echo number_format($decided[$pax][$level] - $fare[$pax][$level]['usd']); ?></b></td>
        <?php } ?>
      </tr>
    </tbody>    
  </table>
  <?php } ?>

