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
        <th width="200px">Transport</th>
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
            <?php foreach ($model->detail['hotel'][$day] as $detail) { ?>
              <?php echo text_hotelLevel($detail["hotel_level"],0) . ": " . $detail["hotel_name"]; ?><br>
            <?php } ?>
          </td>
          <td>
            <?php foreach ($model->detail['restaurant'][$day] as $detail) { ?>
              <?php echo text_mealLevel($detail["qday_rest_type"],0) . ": " . $detail["restaurant_name"]; ?><br>
            <?php } ?>
          </td>
          <td>
            <?php foreach ($model->detail['transport'][$day] as $detail) { ?>
              <?php echo $detail["transport_name"]; ?><br>
            <?php } ?>
          </td>
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
    <label class="title">Pricing List: <?php echo $model->quotation_code . " - " . $model->quotation_name; ?></label>
  </div>
</div>
        
  <div class="vs-s"></div>    

  <table class="table table-striped table-bordered table-font" cellspacing="0" width="100%" id="table_master">
    <thead>
      <tr>
        <th width="25px">Day</th>
        <th>Name</th>
        <th>Detail</th>
        <th align="center" width="125px">10 + 1</th>
        <th align="center" width="125px">15 + 1</th>
        <th align="center" width="125px">20 + 1</th>
        <th align="center" width="125px">25 + 1</th>
        <th align="center" width="125px">30 + 2</th>
        <th align="center" width="125px">35 + 2</th>
        <th align="center" width="125px">40 + 2</th>
      </tr>
    </thead>
    <tbody>
      <?php $amt = 1000; $tot11 = 0; $tot16 = 0; $tot21 = 0; $tot26 = 0; $tot32 = 0; $tot37 = 0; $tot42 = 0;?>
      <?php for ($day=1; $day <= $model->quotation_days ; $day++) { ?>
      <tr>
          <td><?php echo $day; ?></td>
          <td><?php echo "Name"; ?></td>
          <td><?php echo number_format($amt) ; ?> / RM</td>
          <td align="right"><?php echo number_format($amt * 11); $tot11 += ($amt * 11);?></td>
          <td align="right"><?php echo number_format($amt * 16); $tot16 += ($amt * 16);?></td>
          <td align="right"><?php echo number_format($amt * 21); $tot21 += ($amt * 21);?></td>
          <td align="right"><?php echo number_format($amt * 26); $tot26 += ($amt * 26);?></td>
          <td align="right"><?php echo number_format($amt * 32); $tot32 += ($amt * 32);?></td>
          <td align="right"><?php echo number_format($amt * 37); $tot37 += ($amt * 37);?></td>
          <td align="right"><?php echo number_format($amt * 42); $tot42 += ($amt * 42);?></td>
      </tr>
      <?php } ?>      
      
      <tr>
        <td colspan="3" align="right">Sub total:</td>        
        <td align="right"><?php echo number_format($tot11);?></td>
        <td align="right"><?php echo number_format($tot16);?></td>
        <td align="right"><?php echo number_format($tot21);?></td>
        <td align="right"><?php echo number_format($tot26);?></td>
        <td align="right"><?php echo number_format($tot32);?></td>
        <td align="right"><?php echo number_format($tot37);?></td>
        <td align="right"><?php echo number_format($tot42);?></td>
      </tr>
    </tbody>    
  </table>

  