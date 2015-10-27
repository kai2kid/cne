<div>
  <table width="100%">
    <tr>
      <td>  
        <img src="<?php echo _PATH_IMAGE."header_logo.png";?>">
      </td>
      <td>
        &nbsp;
      </td>
    </tr>
    <tr>
      <td>
        &nbsp;
      </td>
      <td>
        <table width="100%">
          <tr>
            <td>
              Rate : <?php echo number_format($model->detail["calc"]["rate_usd"] > 0 ? $model->detail["calc"]["rate_usd"] : 0); ?>
            </td>
            <td>
              CNB : <?php echo number_format($model->detail["calc"]["pax_cnb"] > 0 ? $model->detail["calc"]["pax_cnb"] : 0); ?>
            </td>
            <td>
              CEB : <?php echo number_format($model->detail["calc"]["pax_ceb"] > 0 ? $model->detail["calc"]["pax_ceb"] : 0); ?>
            </td>
          </tr>
        </table>
          </div>
      </td>
    </tr>
  </table>
</div>

<br><br>
<?php $ctr=0; ?>
<?php foreach ($pax_estimated as $title=>$pax) { ?>
  <?php ++$ctr; ?>
  <?php $gtot[$ctr]['*'] = 0; $gtot[$ctr][3] = 0; $gtot[$ctr][4] = 0; $gtot[$ctr][5] = 0; ?>
  <input type="hidden" id="num_people_<?php echo $ctr; ?>" value = "<?php echo $pax; ?>">
  <input type="hidden" id="num_guide_<?php echo $ctr; ?>" value = "<?php echo total_guide($pax); ?>">
  <input type="hidden" id="num_pax_<?php echo $ctr; ?>" value = "<?php echo total_pax($pax); ?>">
<?php } ?>
<!-- ROOM PRICE -->
  <table class="table table-bordered table-font" cellspacing="0" width="100%" id="table_master" style="border-color:darkgray">
    <thead>
      <tr>
        <th width="25px">Day</th>
        <th>Name</th>
        <th class="text-right">Times</th>
        <th class="text-right" width="110px">Single</th>
        <?php $ctr = 0; ?>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <?php ++$ctr; ?>
        <th class="text-right" width="110px">
          <span class="price_title title_hotel pax_<?php echo $ctr; ?>">
          <?php echo total_pax_text($pax) . " (".(ceil(total_pax($pax) / 2))." RM)"?>
          </span>
        </th>          
        <?php } ?>
      </tr>
    </thead>
  <?php foreach([5,4,3] as $level) { ?>
  <?php if (isset($model->detail['hotel'][$level])) {?>  
    <tbody>
      <?php $ctr = 0; foreach ($pax_estimated as $title=>$pax) { $subt[++$ctr][$level] = 0;} ?>
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
          <td><?php echo $model->detail['hotel'][$level][$day]['hotel_name']; ?></td>
          <td align="right"><?php echo $ctr; ?></td>
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
              $subt[$c][$level] += $sub; 
              $gtot[$c][$level] += $sub; 
            ?>
            <span class="price_hotel price_each pax_<?php echo $c; ?> level_<?php echo $level; ?> day_<?php echo $day+1-$ctr; ?>" title="<?php echo $sub; ?>" day="<?php echo $day+1-$ctr; ?>" >
              <?php echo number_format($sub); ?>
            </span>
          </td>
          <?php } ?>
      </tr>      
      <?php }?>
      <?php }?>
      <tr style="background-color:<?php echo $color[$level]; ?>; border-bottom:2px black solid;">
        <th colspan="4" class="text-center"><b><?php echo text_hotelLevel($level); ?> Hotel</b></th>
        <?php $ctr=0; ?>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <?php ++$ctr; ?>
        <th class="text-right">
          <span title="<?php echo $subt[$ctr][$level]; ?>" class="price_hotel price_subtotal pax_<?php echo $ctr; ?> level_<?php echo $level; ?>">
            <?php echo number_format($subt[$ctr][$level]); ?>
          </span>        
        </th>
        <?php } ?>
      </tr>
    </tbody>
  <?php } ?>
  <!-- Breakfast PRICE -->
    <tbody>
      <?php $ctr = 0; foreach ($pax_estimated as $title=>$pax) { $subt[++$ctr][$level] = 0;} ?>
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
          <td><?php echo $model->detail['hotel'][$level][$day]['hotel_name']; ?></td>
          <td align="right"><?php echo $ctr; ?></td>
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
              $subt[$c][$level] += $sub; 
              $gtot[$c][$level] += $sub; 
            ?>
            <span class="price_hotelbreakfast price_each pax_<?php echo $c; ?> level_<?php echo $level; ?>" title="<?php echo $sub; ?>" day="<?php echo $day+1-$ctr; ?>">
              <?php echo number_format($sub); ?>
            </span>
          </td>
          <?php } ?>
      </tr>      
      <?php }?>
      <?php }?>
      <tr style="background-color:<?php echo $color[$level]; ?>; border-bottom:2px black solid;">
        <th colspan="4" class="text-center"><b>Breakfast <?php echo text_hotelLevel($level); ?> Hotel</b></th>
        <?php $ctr=0; ?>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <?php ++$ctr; ?>
        <th class="text-right">
          <span title="<?php echo $subt[$ctr][$level]; ?>" class="price_hotelbreakfast price_subtotal pax_<?php echo $ctr; ?> level_<?php echo $level; ?>">
            <?php echo number_format($subt[$ctr][$level]); ?>
          </span>        
        </th>
        <?php } ?>
      </tr>
    </tbody>
  <?php } ?>      
  <!-- MEAL PRICE -->
    <tbody>
      <?php $ctr = 0; foreach ($pax_estimated as $title=>$pax) { $subt[++$ctr][$level] = 0;} ?>
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
          <td align="left">L/D</td>
          <td align="left">Standard</td>
          <td align="right"><?php echo $ctrbf + $ctrln + $ctrdn; ?></td>
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
              $subt[$ctr] = $sub; 
              $gtot[$ctr]['*'] += $sub; 
            ?>
            <span class="price_meal price_each pax_<?php echo $ctr; ?> level_0" title="<?php echo $sub; ?>" day="1">
              <?php echo number_format($sub); ?>
            </span>
          </td>
          <?php } ?>
      </tr>      
      <tr style="background-color:#FDE9D9; border-bottom:2px black solid;">
        <th colspan="4" class="text-center"><b>Meal</b></th>
        <?php $ctr=0; ?>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <?php ++$ctr; ?>
        <th class="text-right">
          <span title="<?php echo $subt[$ctr]; ?>" class="price_meal price_subtotal pax_<?php echo $ctr; ?> level_0">
            <?php echo number_format($subt[$ctr]); ?>
          </span>        
        </th>
        <?php } ?>
      </tr>
    </tbody>
  <!-- ENTRANCE PRICE -->
  <?php if (isset($model->detail['entrance'])) { ?>
    <tbody>
      <?php $ctr = 0; foreach ($pax_estimated as $title=>$pax) { $subt[++$ctr][$level] = 0;} ?>
      <?php for ($day=1; $day <= $model->quotation_days ; $day++) { ?>
      <?php if (isset($model->detail['entrance'][$day])) { ?>
      <?php foreach($model->detail['entrance'][$day] as $entrance) { ?>
      <?php if ($entrance['entrance_ticket_group'] > 0) { ?>
      <tr>
        <td><?php echo $day; ?></td>
        <td colspan="2"><?php echo $entrance['entrance_name']; ?></td>
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
            $subt[$ctr] += $sub; 
            $gtot[$ctr]['*'] += $sub; 
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
      <tr style="background-color:#FDE9D9; border-bottom:2px black solid;">
        <th colspan="4" class="text-center">Entrance Ticket</th>
        <?php $ctr=0; ?>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <?php ++$ctr; ?>
        <th class="text-right">
          <span title="<?php echo $subt[$ctr]; ?>" class="price_entrance price_subtotal pax_<?php echo $ctr; ?> level_0">
            <?php echo number_format($subt[$ctr]); ?>
          </span>        
        </th>
        <?php } ?>
      </tr>
    </tbody>    
  <?php } ?>

  <!-- TRANSPORT PRICE -->
    <tbody>
      <?php $ctr = 0; foreach ($pax_estimated as $title=>$pax) { $subt[++$ctr] = 0;} ?>
      <?php for ($day=1; $day <= $model->quotation_days ; $day++) { ?>
      <tr>
          <td><?php echo $day; ?></td>
          <td colspan="3">
            <?php echo $model->days[$day]["route_title"]; ?>
            <span class="price_transport price_single level_0 transport_1 day_<?php echo $day; ?>" title="<?php echo ($model->days[$day]['route_cost1'] > 0 ? $model->days[$day]['route_cost1'] : 0); ?>"></span>
            <span class="price_transport price_single level_0 transport_2 day_<?php echo $day; ?>" title="<?php echo ($model->days[$day]['route_cost2'] > 0 ? $model->days[$day]['route_cost2'] : 0); ?>"></span>
            <span class="price_transport price_single level_0 transport_3 day_<?php echo $day; ?>" title="<?php echo ($model->days[$day]['route_cost3'] > 0 ? $model->days[$day]['route_cost3'] : 0); ?>"></span>
            <span class="price_transport price_single level_0 transport_4 day_<?php echo $day; ?>" title="<?php echo ($model->days[$day]['route_cost4'] > 0 ? $model->days[$day]['route_cost4'] : 0); ?>"></span>
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
              if ($sub > 0) {} else { $sub = 0; }
              $subt[$ctr] += $sub; 
              $gtot[$ctr]['*'] += $sub; 
            ?>
            <span class="price_transport price_each pax_<?php echo $ctr; ?> level_0" title="<?php echo $sub; ?>" day="<?php echo $day; ?>">
              <?php echo number_format($sub); ?>
            </span>
          </td>
          <?php } ?>
      </tr>      
      <?php }?>
      <tr style="background-color:#FDE9D9; border-bottom:2px black solid;">
        <th colspan="4" class="text-center">Transport</th>
        <?php $ctr=0; ?>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <?php ++$ctr; ?>
        <th class="text-right">
          <span title="<?php echo $subt[$ctr]; ?>" class="price_transport price_subtotal pax_<?php echo $ctr; ?> level_0">
            <?php echo number_format($subt[$ctr]); ?>
          </span>        
        </th>
        <?php } ?>
      </tr>
    </tbody>    

  <!-- OTHER PRICE -->
  <?php if (isset($model->detail['other'])) { ?>
    <tbody>
      <?php $other_sub = 0; ?>
      <?php foreach ($model->detail['other'] as $other) { ?>
      <?php if ($other["other_text"] != "" && $other["other_text"] != "0") { ?>
      <tr>
          <td colspan=4>
            <table width=100%>
              <tr>
                <td><?php echo $other["other_text"]; ?></td>
                <td width="50px" class="text-right" style="padding-right:10px"><?php echo number_format($other["other_price"]); ?></td>
                <td width="105px">X <?php echo number_format($other["other_satuan"]) . " " . $other["other_satuan_text"]; ?></td>
                <td width="80px">X <?php echo number_format($other["other_times"]) . " " . $other["other_times_text"]; ?></td>
              </tr>
            </table>
          </td>
          <?php for ($i=1 ; $i<=7 ; $i++) { ?>
          <td class="text-right">
            <span title="<?php echo $other["other_subtotal"]; ?>" class="price_other price_each pax_0 level_0">
              <?php echo number_format($other["other_subtotal"]); ?>
            </span>
          </td>
          <?php } ?>
          <?php $other_sub += $other["other_subtotal"]; ?>
      </tr>      
      <?php }?>
      <?php }?>
      <tr style="background-color:#FDE9D9; border-bottom:2px black solid;">
        <th class="text-center" colspan="4">Others</th>
          <?php for ($i=1 ; $i<=7 ; $i++) { ?>
          <th class="text-right">          
            <span title="<?php echo $other_sub; ?>" class="price_other price_subtotal pax_0 level_0">
              <?php echo number_format($other_sub); ?>
            </span>
          </th>
          <?php } ?>
        <?php $ctr=0; foreach ($pax_estimated as $title=>$pax) { $gtot[++$ctr]['*'] += $other_sub; } ?>
      </tr>
    </tbody>    
  <?php }?>
  <!-- SUMMARY -->
  <?php foreach([5,4,3] as $level) {?>
    <tbody>
      <tr>
          <td rowspan="5" colspan=3 width="250px">
            <table class="table-font" cellspacing="5px" cellpadding="5px" width="100%">
              <tr>
                <td width="100px"><label class='control-label'>MAX MIN:</label></td>
                <td>
                  <?php echo $model->detail['calc']['maxmin_'.$level]; ?>
                </td>
              </tr>
              <tr>
                <td><label class='control-label'>RANGE:</label></td>
                <td>
                  <?php echo $model->detail['calc']['range_'.$level]; ?>
                </td>
              </tr>
              <tr>
                <td><label class='control-label'>SGL/SPPL:</label></td>
                <td>
                  <?php echo $model->detail['calc']['sglspl_'.$level]; ?>
                </td>
              </tr>
            </table>
          </td>
          <td>Grand Total</td>
          <?php $ctr = 0; ?>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <?php ++$ctr; ?>
          <td align="right">
            <span title="<?php echo $gtot[$ctr]['*'] + $gtot[$ctr][$level]; ?>" class="price_gt price_grandtotal pax_<?php echo $ctr; ?> level_<?php echo $level; ?>">
            <?php echo number_format($gtot[$ctr]['*'] + $gtot[$ctr][$level]); ?>
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
            <span title="<?php echo round(($gtot[$ctr]['*'] + $gtot[$ctr][$level]) / ($pax + 0.5*$model->detail["calc"]['pax_cnb'] + 0.75*$model->detail["calc"]['pax_ceb']) ); ?>" class="price_gt price_fare_krw pax_<?php echo $ctr; ?> level_<?php echo $level; ?>">
            <?php echo number_format(round(($gtot[$ctr]['*'] + $gtot[$ctr][$level]) / ($pax + 0.5*$model->detail["calc"]['pax_cnb'] + 0.75*$model->detail["calc"]['pax_ceb']))); ?>
            </span>
          </td>
          <?php }?>
      </tr>      
      <tr>
          <td>FARE/PP (USD)</td>
          <?php $ctr = 0; ?>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <?php ++$ctr; ?>
          <td align="right">
            <?php $fare[$ctr][$level]['usd'] = round(($gtot[$ctr]['*'] + $gtot[$ctr][$level]) / $pax * $rate); ?>
            <span title="<?php echo $fare[$ctr][$level]['usd']; ?>" class="price_gt price_fare_usd pax_<?php echo $ctr; ?> level_<?php echo $level; ?>">
              <?php echo number_format( $fare[$ctr][$level]['usd']); ?>
            </span>
            <input type=hidden id="price_fare_usd_<?php echo $level; ?>_<?php echo $ctr; ?>" value="<?php echo $fare[$ctr][$level]['usd']; ?>">
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
            <?php $fare[$ctr][$level]['sglspl'] = round(($fare[$ctr][$level]["usd"]) / ceil($pax/2) / 2 * 1.15); ?>
            <span title="<?php echo $fare[$ctr][$level]['sglspl']; ?>" class="price_sglspl pax_<?php echo $ctr; ?> level_<?php echo $level; ?>">
            <?php echo number_format($fare[$ctr][$level]['sglspl']); ?>
            </span>
          </td>
          <?php }?>
      </tr>      
      <tr style="font-weight: bold;">
          <td>DECIDED PRICE</td>
          <?php $ctr = 0; ?>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <?php ++$ctr; ?>
          <?php 
                $decided[$ctr][$level] = $fare[$ctr][$level]['usd'] - $model->detail['calc']['maxmin_'.$level];
                if ($ctr == 2) { $patokan = $decided[$ctr][$level]; } 
          ?>
          <?php } ?>
          <?php $ctr=0; ?>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <?php ++$ctr; ?>
          <td align="right">
            <b>
              <?php 
                if ($ctr == 1) { $decided[$ctr][$level] = $patokan + 100; } 
                if ($ctr == 3) { $decided[$ctr][$level] = $patokan - 100; } 
                if ($ctr == 4) { $decided[$ctr][$level] = $patokan - 100; } 
                if ($ctr == 5) { $decided[$ctr][$level] = $patokan - 100; } 
                if ($ctr == 6) { $decided[$ctr][$level] = $patokan - 150; } 
                if ($ctr == 7) { $decided[$ctr][$level] = $patokan - 150; } 
              ?>
            </b>
              <?php echo number_format($decided[$ctr][$level] = ($model->detail['calc']['price_decided_'.$level.'_'.$ctr] == "" ? $decided[$ctr][$level] : $model->detail['calc']['price_decided_'.$level.'_'.$ctr])); ?>
          </td>
          <?php }?>
      </tr>      
      <tr style="background-color: <?php echo $color[$level]; ?>; border-bottom:solid 2px black;">
        <th class="text-center" colspan="4"><?php echo text_hotelLevel($level); ?></th>        
        <?php $ctr = 0; ?>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <?php ++$ctr; ?>
        <td align="right">
          <b>
            <span id="price_minus_<?php echo $level; ?>_<?php echo $ctr; ?>" class='price_gt price_minus pax_<?php echo $ctr; ?> level_<?php echo $level; ?>' title="<?php echo ($decided[$ctr][$level] - $fare[$ctr][$level]['usd']); ?>">
              <?php echo number_format($decided[$ctr][$level] - $fare[$ctr][$level]['usd']); ?>
            </span>            
          </b>
        </td>
        <?php } ?>
      </tr>
    </tbody>    
  <?php } ?>
  </table>
  <br>