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
            <?php if (isset($model->detail['rundown'][$day])) { ?>
            <?php foreach ($model->detail['rundown'][$day] as $detail) { ?>
            <br><?php echo $detail["qdetail_time_start"] . "-" . $detail["qdetail_time_end"] . " &nbsp; " . ($detail["entrance_name"] != "" ? $detail["entrance_name"] : $detail["qdetail_title"]); ?>
            <?php } ?>
            <?php } ?>
          </td>
          <td>
            <?php foreach([5,4,3] as $level) { ?>
              <?php echo text_hotelLevel($level,0) . ": " . (isset($model->detail['hotel'][$level][$day]["hotel_name"]) ? $model->detail['hotel'][$level][$day]["hotel_name"] : " - "); ?><br>
            <?php } ?>
          </td>
          <td>
            <?php foreach([1,2,3] as $level) { ?>
              <?php echo text_mealLevel($level,0) . ": " . (isset($model->detail['restaurant'][$day]) ? $model->detail['restaurant'][$day][$level]["restaurant_name"] . "<br>" . $model->detail['restaurant'][$day][$level]["menu_name"] : " - "); ?><br>
            <?php } ?>
          </td>
<!--          <td>
            <?php foreach ($model->detail['transport'][$day] as $detail) { ?>
              <?php echo $detail["transport_name"]; ?><br>
            <?php } ?>
          </td>   -->
          <td>
            <?php if (isset($model->detail['entrance'][$day])) { ?>              
              <?php foreach ($model->detail['entrance'][$day] as $detail) { ?>
                <?php echo $detail["entrance_name"]; ?><br>
              <?php } ?>
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

<?php $ctr=0; ?>
<?php foreach ($pax_estimated as $title=>$pax) { ?>
  <?php $gtot[$pax]['*'] = 0; $gtot[$pax][3] = 0; $gtot[$pax][4] = 0; $gtot[$pax][5] = 0; ++$ctr; ?>
  <input type="hidden" id="num_people_<?php echo $ctr; ?>" value = "<?php echo $pax; ?>">
  <input type="hidden" id="num_guide_<?php echo $ctr; ?>" value = "<?php echo total_guide($pax); ?>">
  <input type="hidden" id="num_pax_<?php echo $ctr; ?>" value = "<?php echo total_pax($pax); ?>">
<?php } ?>
  <input type="hidden" id="rate_usd" value = "<?php echo $model->detail["rate_USD"]; ?>">
<!-- ROOM PRICE -->
  <?php foreach([5,4,3] as $level) { ?>
  <?php if (isset($model->detail['hotel'][$level])) {?>  
  <table class="table table-striped table-bordered table-font" cellspacing="0" width="100%" id="table_master">
    <caption><b><?php echo text_hotelLevel($level); ?> Hotel (1 RM for 2 people)</b></caption>
    <thead>
      <tr>
        <th width="25px">Day</th>
        <th>Name</th>
        <th class="text-right" width="110px">1 RM</th>
        <?php $ctr = 0; ?>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <?php ++$ctr; ?>
        <th class="text-right" width="110px">
          <?php if ($ctr == 1 && $level == 5) { ?>
          <input class="form-control num" type=number value="<?php echo $pax; ?>" id="" onchange="calculate(this.value)">
          <?php } ?>
          <span class="price_title title_hotel pax_<?php echo $ctr; ?>">
          <?php echo total_pax_text($pax) . " (".(ceil(total_pax($pax) / 2))." RM)"?>
          </span>
        </th>          
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pax_estimated as $title=>$pax) { $subt[$pax][$level] = 0;} ?>
      <?php for ($day=1; $day < $model->quotation_days ; $day++) { 
        if (isset($model->detail['hotel'][$level][$day])) {
          if (!isset($model->detail['hotel'][$level][$day]['hotel_price_room_standard'])) {
            $model->detail['hotel'][$level][$day]['hotel_price_room_standard'] = 0;
          }
          if (!isset($model->detail['hotel'][$level][$day]['hotel_name'])) {
            $model->detail['hotel'][$level][$day]['hotel_name'] = "-";
          }
          $i = $day+1; $loop = 1; $ctr = 1;
          if (isset($model->detail['hotel'][$level][$i])) {
            while ($i < $model->quotation_days && $loop == 1) {
              if ($model->detail['hotel'][$level][$day]['hotel_code'] == $model->detail['hotel'][$level][$i]['hotel_code'] && $model->detail['hotel'][$level][$i]['hotel_code'] != "") {
                $ctr++;
              } else {
                $loop = 0;
              }
              $i++;
            }
          }
          $day += $ctr-1;
      ?>
      <tr>
          <td><?php echo $day+1-$ctr; ?></td>
          <td><?php echo $model->detail['hotel'][$level][$day]['hotel_name'] . ($ctr > 1 ? " x " . $ctr : ""); ?></td>
          <td align="right">            
            <span class="price_hotel price_single level_<?php echo $level; ?> day_<?php echo $day+1-$ctr; ?>" title="<?php echo $model->detail['hotel'][$level][$day]['hotel_price_room_standard'] * $ctr; ?>">
              <?php echo number_format($model->detail['hotel'][$level][$day]['hotel_price_room_standard'] * $ctr); ?>
            </span>
          </td>
          <?php $c=0; ?>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <?php ++$c; ?>
          <td align="right">
            <?php 
              $amt = $model->detail['hotel'][$level][$day]['hotel_price_room_standard'] * $ctr;
              $sub = ($amt * ceil(total_pax($pax) / 2));               
              $subt[$pax][$level] += $sub; 
              $gtot[$pax][$level] += $sub; 
            ?>
            <span class="price_hotel price_each pax_<?php echo $c; ?> level_<?php echo $level; ?> day_<?php echo $day+1-$ctr; ?>" title="<?php echo $sub; ?>" day="<?php echo $day+1-$ctr; ?>" >
              <?php echo number_format($sub); ?>
            </span>
          </td>
          <?php } ?>
      </tr>      
      <?php }?>
      <?php }?>
    </tbody>    
    <tfoot>          
      <tr>
        <th colspan="3" class="text-right">Subtotal:</th>
        <?php $ctr=0; ?>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <?php ++$ctr; ?>
        <th class="text-right">
          <span title="<?php echo $subt[$pax][$level]; ?>" class="price_hotel price_subtotal pax_<?php echo $ctr; ?> level_<?php echo $level; ?>">
            <?php echo number_format($subt[$pax][$level]); ?>
          </span>        
        </th>
        <?php } ?>
      </tr>
    </tfoot>
  </table>
  <?php } ?>
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
        <?php $ctr = 0; ?>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <?php ++$ctr; ?>
        <th class="text-right" width="110px">
          <span class="price_title pax_<?php echo $ctr?>">
          <?php echo total_pax_text($pax); ?>
          </span>
        </th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pax_estimated as $title=>$pax) { $subt[$pax][$level] = 0;} ?>
      <?php for ($day=1; $day < $model->quotation_days ; $day++) {
        if (isset($model->detail['hotel'][$level][$day])) {
          if (!isset($model->detail['hotel'][$level][$day]['hotel_price_breakfast_standard'])) {
            $model->detail['hotel'][$level][$day]['hotel_price_breakfast_standard'] = 0;
          }
          if (!isset($model->detail['hotel'][$level][$day]['hotel_name'])) {
            $model->detail['hotel'][$level][$day]['hotel_name'] = "-";
          }
          $i = $day+1; $loop = 1; $ctr = 1;
          if (isset($model->detail['hotel'][$level][$i])) {
            while ($i < $model->quotation_days && $loop == 1) {
              if ($model->detail['hotel'][$level][$day]['hotel_code'] == $model->detail['hotel'][$level][$i]['hotel_code'] && $model->detail['hotel'][$level][$i]['hotel_code'] != "") {
                $ctr++;
              } else {
                $loop = 0;
              }
              $i++;
            }
          }
          $day += $ctr-1;
      ?>
      <tr>
          <td><?php echo $day+1-$ctr; ?></td>
          <td><?php echo $model->detail['hotel'][$level][$day]['hotel_name'] . ($ctr > 1 ? " x " . $ctr : ""); ?></td>
          <td align="right">
            <span class="price_hotelbreakfast price_single level_<?php echo $level; ?> day_<?php echo $day+1-$ctr; ?>" title="<?php echo $model->detail['hotel'][$level][$day]['hotel_price_breakfast_standard'] * $ctr; ?>">
            <?php echo number_format($model->detail['hotel'][$level][$day]['hotel_price_breakfast_standard'] * $ctr); ?>
            </span>
          </td>
          <?php $c=0; ?>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <?php ++$c; ?>
          <td align="right">
            <?php 
              $amt = $model->detail['hotel'][$level][$day]['hotel_price_breakfast_standard'] * $ctr;
              $sub = ($amt * total_pax($pax)); 
              $subt[$pax][$level] += $sub; 
              $gtot[$pax][$level] += $sub; 
            ?>
            <span class="price_hotelbreakfast price_each pax_<?php echo $c; ?> level_<?php echo $level; ?>" title="<?php echo $sub; ?>" day="<?php echo $day+1-$ctr; ?>">
              <?php echo number_format($sub); ?>
            </span>
          </td>
          <?php } ?>
      </tr>      
      <?php }?>
      <?php }?>
    </tbody>    
    <tfoot>          
      <tr>
        <th colspan="3" class="text-right">Subtotal:</th>
        <?php $ctr=0; ?>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <?php ++$ctr; ?>
        <th class="text-right">
          <span title="<?php echo $subt[$pax][$level]; ?>" class="price_hotelbreakfast price_subtotal pax_<?php echo $ctr; ?> level_<?php echo $level; ?>">
            <?php echo number_format($subt[$pax][$level]); ?>
          </span>        
        </th>
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
        <?php $ctr = 0; ?>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <?php ++$ctr; ?>
        <th class="text-right" width="110px">
          <span class="price_title pax_<?php echo $ctr?>">
          <?php echo total_pax_text($pax); ?>
          </span>
        </th>
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
          $ctrtot = (($ctrbf + $ctrln + $ctrdn) > 0 ? ($ctrbf + $ctrln + $ctrdn) : 1);
          $avgmeal = round($tmpsub / ($ctrtot));
          
        }
      ?>
      <tr>
          <td align="left"><?php echo $ctrbf . " Breakfast + " . $ctrln . " Lunch + " . $ctrdn . " Dinner"; ?></td>
          <td align="right">
            <span class="price_meal price_single level_0 day_1" title="<?php echo $avgmeal; ?>">
            <?php echo number_format($avgmeal); ?>
            </span>
          </td>
          <?php $ctr=0; ?>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <?php ++$ctr; ?>
          <td align="right">
            <?php 
              $amt = $avgmeal;
              $sub = ($amt * total_pax($pax));
              $subt[$pax] += $sub; 
              $gtot[$pax]['*'] += $sub; 
            ?>
            <span class="price_meal price_each pax_<?php echo $ctr; ?> level_0" title="<?php echo $sub; ?>" day="1">
              <?php echo number_format($sub); ?>
            </span>
          </td>
          <?php } ?>
      </tr>      
    </tbody>
    <tfoot>          
      <tr>
        <th colspan="2" class="text-right">Subtotal:</th>
        <?php $ctr=0; ?>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <?php ++$ctr; ?>
        <th class="text-right">
          <span title="<?php echo $subt[$pax]; ?>" class="price_meal price_subtotal pax_<?php echo $ctr; ?> level_0">
            <?php echo number_format($subt[$pax]); ?>
          </span>        
        </th>
        <?php } ?>
      </tr>
    </tfoot>
  </table>


  <!-- ENTRANCE PRICE -->
  <?php if (isset($model->detail['entrance'])) { ?>
  <table class="table table-striped table-bordered table-font" cellspacing="0" width="100%" id="table_master">
    <caption><b>Entrance Ticket</b></caption>
    <thead>
      <tr>
        <th width="25px">Day</th>
        <th>Name</th>
        <th class="text-right" width="110px">1</th>
        <?php $ctr = 0; ?>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <?php ++$ctr; ?>
        <th class="text-right" width="110px">
          <span class="price_title pax_<?php echo $ctr?>">
          <?php echo total_pax_text($pax); ?>
          </span>
        </th>
        <?php $subt[$pax] = 0; ?>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php for ($day=1; $day <= $model->quotation_days ; $day++) { ?>
      <?php if (isset($model->detail['entrance'][$day])) { ?>
      <?php foreach($model->detail['entrance'][$day] as $entrance) { ?>
      <?php if ($entrance['entrance_ticket_group'] > 0) { ?>
      <tr>
        <td><?php echo $day; ?></td>
        <td><?php echo $entrance['entrance_name']; ?></td>
        <td align="right">
          <span class="price_entrance price_single level_0 day_<?php echo $day; ?>" title="<?php echo $entrance['entrance_ticket_group']; ?>">
          <?php echo number_format($entrance['entrance_ticket_group']); ?>
          </span>
        </td>
        <?php $ctr=0; ?>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <?php ++$ctr; ?>
        <td align="right">
          <?php 
            $amt = $entrance['entrance_ticket_group'];
            $sub = ($amt * total_pax($pax)); 
            $subt[$pax] += $sub; 
//            $gtot[$pax]['*'] += $subt[$pax]; 
            $gtot[$pax]['*'] += $sub; 
          ?>
          <span class="price_entrance price_each pax_<?php echo $ctr; ?> level_0" title="<?php echo $sub; ?>" day="<?php echo $day; ?>">
            <?php echo number_format($sub); ?>
          </span>
        </td>
        <?php } ?>
      </tr>      
      <?php }?>
      <?php }?>
      <?php }?>
      <?php }?>
    </tbody>    
    <tfoot>          
      <tr>
        <th colspan="3" class="text-right">Subtotal:</th>
        <?php $ctr=0; ?>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <?php ++$ctr; ?>
        <th class="text-right">
          <span title="<?php echo $subt[$pax]; ?>" class="price_entrance price_subtotal pax_<?php echo $ctr; ?> level_0">
            <?php echo number_format($subt[$pax]); ?>
          </span>        
        </th>
        <?php } ?>
      </tr>
    </tfoot>
  </table>
  <?php } ?>

  <!-- TRANSPORT PRICE -->
  <table class="table table-striped table-bordered table-font" cellspacing="0" width="100%" id="table_master">
    <caption><b>Transport</b></caption>
    <thead>
      <tr>
        <th width="25px">Day</th>
        <th>Route</th>
        <?php $ctr = 0; ?>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <?php ++$ctr; ?>
        <th class="text-right" width="110px">
          <span class="price_title pax_<?php echo $ctr; ?>">
          <?php echo total_pax_text($pax); ?>
          </span>
        </th>
        <?php $subt[$pax] = 0; ?>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php for ($day=1; $day <= $model->quotation_days ; $day++) { ?>
      <tr>
          <td><?php echo $day; ?></td>
          <td>
            <?php echo $model->days[$day]["route_title"]; ?>
            <span class="price_transport price_single level_0 transport_1 day_<?php echo $day; ?>" title="<?php echo $model->days[$day]['route_cost1']; ?>"></span>
            <span class="price_transport price_single level_0 transport_2 day_<?php echo $day; ?>" title="<?php echo $model->days[$day]['route_cost2']; ?>"></span>
            <span class="price_transport price_single level_0 transport_3 day_<?php echo $day; ?>" title="<?php echo $model->days[$day]['route_cost3']; ?>"></span>
            <span class="price_transport price_single level_0 transport_4 day_<?php echo $day; ?>" title="<?php echo $model->days[$day]['route_cost4']; ?>"></span>
          </td>
          <?php $ctr=0; ?>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <?php ++$ctr; ?>
          <td align="right">
            <?php 
              $amt = 0;
              $sub = $model->days[$day]['route_cost5'];
              if (total_pax($pax) <= 17) { $sub = $model->days[$day]['route_cost4']; }
              if (total_pax($pax) <= 13) { $sub = $model->days[$day]['route_cost3']; }
              if (total_pax($pax) <= 9 ) { $sub = $model->days[$day]['route_cost2']; }
              if (total_pax($pax) <= 4 ) { $sub = $model->days[$day]['route_cost1']; }
              $subt[$pax] += $sub; 
              $gtot[$pax]['*'] += $sub; 
            ?>
            <span class="price_transport price_each pax_<?php echo $ctr; ?> level_0" title="<?php echo $sub; ?>" day="<?php echo $day; ?>">
              <?php echo number_format($sub); ?>
            </span>
          </td>
          <?php } ?>
      </tr>      
      <?php }?>
    </tbody>    
    <tfoot>          
      <tr>
        <th colspan="2" class="text-right">Subtotal:</th>
        <?php $ctr=0; ?>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <?php ++$ctr; ?>
        <th class="text-right">
          <span title="<?php echo $subt[$pax]; ?>" class="price_transport price_subtotal pax_<?php echo $ctr; ?> level_0">
            <?php echo number_format($subt[$pax]); ?>
          </span>        
        </th>
        <?php } ?>
      </tr>
    </tfoot>
  </table>

  <!-- OTHER PRICE -->
  <?php if (isset($model->detail['other'])) { ?>
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
          <td align="right">
            <span title="<?php echo $other["other_subtotal"]; ?>" class="price_other price_each pax_0 level_0">
              <?php echo number_format($other["other_subtotal"]); $other_sub += $other["other_subtotal"]; ?>
            </span>
          </td>
      </tr>      
      <?php }?>
    </tbody>    
    <tfoot>          
      <tr>
        <th class="text-right" colspan="4">Subtotal</th>
        <th class="text-right">          
          <span title="<?php echo $other_sub; ?>" class="price_other price_subtotal pax_0 level_0">
            <?php echo number_format($other_sub); ?>
          </span>
        </th>
        <?php foreach ($pax_estimated as $title=>$pax) { $gtot[$pax]['*'] += $other_sub; } ?>
      </tr>
    </tfoot>
  </table>
  <?php }?>
  
  <hr>
  <!-- SUMMARY -->
  <?php foreach([5,4,3] as $level) {?>
  <table class="table table-striped table-bordered table-font" cellspacing="0" width="100%" id="table_master">
    <caption><b>Summmary <?php echo text_hotelLevel($level); ?></b></caption>
    <thead>
      <tr>
        <th colspan=2></th>                                     
        <?php $ctr = 0; ?>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <?php ++$ctr; ?>
        <th class="text-right" width="110px">
          <span class="price_title pax_<?php echo $ctr?>">
          <?php echo total_pax_text($pax); ?>
          </span>
        </th>
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
                <td><input type=number class="form-control num" value="<?php echo $model->detail['default']['maxmin'][$level]; ?>"></td>
              </tr>
              <tr>
                <td><label class='control-label'>RANGE:</label></td>
                <td><input type=number class="form-control num" value="<?php echo $model->detail['default']['range'][$level]; ?>"></td>
              </tr>
              <tr>
                <td><label class='control-label'>SGL/SPPL:</label></td>
                <td><input type=number class="form-control num" value="<?php echo $model->detail['default']['sglspl'][$level]; ?>"></td>
              </tr>
            </table>
          </td>
          <td>Grand Total</td>
          <?php $ctr = 0; ?>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <?php ++$ctr; ?>
          <td align="right">
            <span title="<?php echo $gtot[$pax]['*'] + $gtot[$pax][$level]; ?>" class="price_gt price_grandtotal pax_<?php echo $ctr; ?> level_<?php echo $level; ?>">
            <?php echo number_format($gtot[$pax]['*'] + $gtot[$pax][$level]); ?>
            </span>
          </td>
          <?php }?>
      </tr>      
      <tr>
          <td>FARE/PP (KRW)</td>
          <?php $ctr = 0; ?>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <?php ++$ctr; ?>
          <td align="right">
            <span title="<?php echo round(($gtot[$pax]['*'] + $gtot[$pax][$level]) / total_pax($pax)); ?>" class="price_gt price_fare_krw pax_<?php echo $ctr; ?> level_<?php echo $level; ?>">
            <?php echo number_format(round(($gtot[$pax]['*'] + $gtot[$pax][$level]) / total_pax($pax))); ?>
            </span>
          </td>
          <?php }?>
      </tr>      
      <tr>
          <td>FARE/PP (USD) [Rate = <?php echo number_format($model->detail["rate_USD"]); ?>]</td>
          <?php $ctr = 0; ?>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <?php ++$ctr; ?>
          <td align="right">
            <?php $fare[$pax][$level]['usd'] = round(($gtot[$pax]['*'] + $gtot[$pax][$level]) / total_pax($pax) * $rate); ?>
            <span title="<?php echo $fare[$pax][$level]['usd']; ?>" class="price_gt price_fare_usd pax_<?php echo $ctr; ?> level_<?php echo $level; ?>">
              <?php echo number_format( $fare[$pax][$level]['usd']); ?>
            </span>
            <input type=hidden id="price_fare_usd_<?php echo $level; ?>_<?php echo $ctr; ?>" value="<?php echo $fare[$pax][$level]['usd']; ?>">
          </td>
          <?php }?>
      </tr>      
      <tr>
          <td>SGL SPPL</td>
          <?php //subtotal hotel dalam usd / jumlah kamar / 2 * 1.15 ?>
          <?php $ctr = 0; ?>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <?php ++$ctr; ?>
          <td align="right">
            <?php $fare[$pax][$level]['sglspl'] = round(($fare[$pax][$level]["usd"]) / ceil(total_pax($pax)/2) / 2 * 1.15); ?>
            <span title="<?php echo $fare[$pax][$level]['sglspl']; ?>" class="price_sglspl pax_<?php echo $ctr; ?> level_<?php echo $level; ?>">
            <?php echo number_format($fare[$pax][$level]['sglspl']); ?>
            </span>
          </td>
          <?php }?>
      </tr>      
      <tr>
          <td>DECIDED PRICE</td>
          <?php $ctr = 0; ?>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <?php ++$ctr; ?>
          <?php 
                $decided[$pax][$level] = $fare[$pax][$level]['usd'] - $model->detail['default']['maxmin'][$level];
                if ($ctr == 2) { $patokan = $decided[$pax][$level]; } 
          ?>
          <?php } ?>
          <?php $ctr=0; ?>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <?php ++$ctr; ?>
          <td align="right">
            <b>
              <?php 
                if ($ctr == 1) { $decided[$pax][$level] = $patokan + 100; } 
                if ($ctr == 3) { $decided[$pax][$level] = $patokan - 100; } 
                if ($ctr == 4) { $decided[$pax][$level] = $patokan - 100; } 
                if ($ctr == 5) { $decided[$pax][$level] = $patokan - 100; } 
                if ($ctr == 6) { $decided[$pax][$level] = $patokan - 150; } 
                if ($ctr == 7) { $decided[$pax][$level] = $patokan - 150; } 
              ?>
              <input class="form-control num" type=number value="<?php echo $decided[$pax][$level] ?>" id="price_decided_<?php echo $level; ?>_<?php echo $ctr; ?>" onchange="changeDP(<?php echo $level; ?>,<?php echo $ctr; ?>)" class='price_gt price_decided pax_<?php echo $ctr; ?> level_<?php echo $level; ?>'>
            </b>
          </td>
          <?php }?>
      </tr>      
      <tr>
        <td align="right">&nbsp;</td>        
        <?php $ctr = 0; ?>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <?php ++$ctr; ?>
        <td align="right">
          <b>
            <span id="price_minus_<?php echo $level; ?>_<?php echo $ctr; ?>" class='price_gt price_minus pax_<?php echo $ctr; ?> level_<?php echo $level; ?>' title="<?php echo ($decided[$pax][$level] - $fare[$pax][$level]['usd']); ?>">
              <?php echo number_format($decided[$pax][$level] - $fare[$pax][$level]['usd']); ?>
            </span>            
          </b>
        </td>
        <?php } ?>
      </tr>
    </tbody>    
  </table>
  <?php } ?>
<!--
  <input type="button" value="Save Calculation" onclick="saveCalc();" />
-->