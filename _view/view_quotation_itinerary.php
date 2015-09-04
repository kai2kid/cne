<div class="bs-callout bs-callout-info">
  <div class="collapse navbar-collapse" style="padding-left:0px;">
    <label class="title">Preview: <?php echo $model->quotation_code . " - " . $model->quotation_name; ?></label>
  </div>
</div>
        
  <div class="vs-s"></div>    

  <table class="table table-striped table-bordered table-font" cellspacing="0" width="100%" id="table_master">
    <thead>
      <tr>
        <th>Code</th>
        <th>Title</th>
        <th>Buyer</th>
        <th>Date</th>
        <th>Days</th>
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
      <?php for ($day=1; $day < $model->quotation_days ; $day++) { ?>
      <tr>
          <td><?php echo $day; ?></td>
          <td><?php echo $model->detail['hotel'][$day][$level]['hotel_name']; ?></td>
          <td align="right"><?php echo number_format($model->detail['hotel'][$day][$level]['hotel_price_room_standard']); ?></td>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <td align="right">
            <?php 
              $amt = $model->detail['hotel'][$day][$level]['hotel_price_room_standard'];
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
      <?php for ($day=1; $day < $model->quotation_days ; $day++) { ?>
      <tr>
          <td><?php echo $day; ?></td>
          <td><?php echo $model->detail['hotel'][$day][$level]['hotel_name']; ?></td>
          <td align="right"><?php echo number_format($model->detail['hotel'][$day][$level]['hotel_price_breakfast_standard']); ?></td>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <td align="right">
            <?php 
              $amt = $model->detail['hotel'][$day][$level]['hotel_price_breakfast_standard'];
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
  <?php foreach([1,2,3] as $type) { ?>
  <table class="table table-striped table-bordered table-font" cellspacing="0" width="100%" id="table_master">
    <caption><b><?php echo text_mealLevel($type,1)?> Meal</b></caption>
    <thead>
      <tr>
        <th width="25px">Day</th>
        <th>Meal</th>
        <th class="text-right" width="110px">1 person</th>
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <th class="text-right" width="110px"><?php echo $title; ?></th>
        <?php $subt[$pax] = 0; ?>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pax_estimated as $title=>$pax) { $subt[$pax] = 0;} ?>
      <?php for ($day=1; $day < $model->quotation_days ; $day++) { ?>
      <tr>
          <td><?php echo $day; ?></td>
          <td><?php echo $model->detail['restaurant'][$day][$type]['restaurant_name'].": ".$model->detail['restaurant'][$day][$type]['menu_name']; ?></td>
          <td align="right"><?php echo number_format($model->detail['restaurant'][$day][$type]['menu_price_lunch']); ?></td>
          <?php foreach ($pax_estimated as $title=>$pax) { ?>
          <td align="right">
            <?php 
              $amt = $model->detail['restaurant'][$day][$type]['menu_price_lunch'];
              $sub = ($amt * $pax);
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
        <td colspan="3" align="right">Sub total:</td>        
        <?php foreach ($pax_estimated as $title=>$pax) { ?>
        <td align="right"><b><?php echo number_format($subt[$pax]); ?></b></td>
        <?php } ?>
      </tr>
    </tfoot>
  </table>
<?php } ?>
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
      <?php foreach($model->detail['entrance'][$day] as $entrance) {?>
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
              $amt = $model->days[$day]['route_cost1'];
              $sub = ($amt * ceil($pax / 2)); 
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
  <table style="display:none" class="table table-striped table-bordered table-font" cellspacing="0" width="100%" id="table_master">
    <caption><b>Others</b></caption>
    <thead>
      <tr>
        <th width="25px">Day</th>
        <th>Name</th>
        <th class="text-right">1 person</th>
      </tr>
    </thead>
    <tbody>
      <?php for ($day=1; $day <= $model->quotation_days ; $day++) { ?>
      <tr>
          <td><?php echo $day; ?></td>
      </tr>      
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
          <td rowspan="6">
            MAX MIN: 139<br>
            RANGE: 15<br>
            SGL/SPPL: 20
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
          <td>FARE/PP (USD)</td>
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
          <td align="right"><b><?php echo number_format($decided[$pax][$level] = $fare[$pax][$level]['usd'] + rand(50,200)); ?></b></td>
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

