<div class="bs-callout bs-callout-info">
  <div class="collapse navbar-collapse" style="padding-left:0px;">
    <label class="title">Update Quotation</label>
	
<!-- INI START FORM -->	
    <input type="hidden" id="quotation_mode" value="update">
    <input type="hidden" id="quotation_code" name="quotation_code" value="<?php echo $model->quotation_code; ?>">
    <input type="hidden" id="quotation_code2" name="quotation_code2" value="<?php echo $model->autogenerate(); ?>">
	
	  <form class="form-horizontal" id="formInsertHeader" action="quotation_insertHeader" method="post" onsubmit="quotationSubmitForm(this.id);return false;">
		  <div class="form-group">
		    <label for="quotation_name" class="control-label col-md-1 no-pad-r">Title</label>
		    <div class="col-md-4">
			  <input name="quotation_name" type="text" class="form-control" id="quotation_name" placeholder="Name" value="<?php echo $model->quotation_name; ?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="quotation_day" class="control-label col-md-1 no-pad-r">Duration</label>
		    <div class="col-md-1 no-pad-r" style="margin-right: 5px;">
			    <input name="quotation_day" type="text" class="form-control" id="quotation_day" placeholder="Day" value="<?php echo $model->quotation_days; ?>">Day
		    </div>		  
		    <div class="col-md-1 no-pad-l no-pad-r">
			    <input name="quotation_night" type="text" class="form-control" id="quotation_night" placeholder="Night" value="<?php echo $model->quotation_days - 1; ?>">Night
		    </div>	
        <div class="col-md-1 no-pad-l" style="margin-left: 5px;">
          <input type="submit" class="btn btn-primary btn-block" value="Save">
        </div>    
		    <div class="col-md-2 no-pad-l" style="margin-left: 5px;">
          <input type="button" class="btn btn-primary btn-block" value="Save as New" onclick="saveasnew();">
		    </div>		
		  </div>
	  </form>		
    </div>
    <!--------------------ROUTE--------------------->
    <div class="container">
      <div class="row">
        <div class="col-md-10 s-h-quotation">
          <div class="panel panel-default quotation-panel">
            <div class="panel-heading">
              <h3 class="panel-title">ROUTE</h3>            
            </div>
            <div class="panel-body quotation-body">
              <form name="formInsertTransport" id="formInsertTransport" class="form-horizontal" action="quotation_insertRoute" method="post" onsubmit="quotationSubmitForm(this.id);return false;">
                <div class="wrapper_route template-route">                               
                  <div class="form-group input-transport">
                    <label id="lbl_INDUK" for="route_INDUK" class="control-label col-md-1 no-pad-r">Day INDUK</label>
                    <div class="col-md-5">  
                    <input type="hidden" name="route_INDUK" id="route_INDUK" class="filter">
                    <input type="hidden" name="path_INDUK" id="path_INDUK">
                    <?php echo $route->_combobox('cbroute_INDUK'); ?>
                    </div>
                  </div>
                  
                  <!--RUNDOWN-------------->
                  
                  <div class="wrapperTime">  
                    <div id='wrapperTime_INDUK_NO' class="wrapp_entrance">
                      <div class='form-group'>
                        <div class='col-md-1' style='margin-left: 5px;'>&nbsp;</div>
                        <div class='col-md-1 no-pad-r no-pad-l' style='margin-left: 10px;'>
                          <input name='qtimeStart_INDUK_NO' type='text' class='form-control' id='qtimeStart_INDUK_NO'>
                        </div>
                        <label class='control-label col-md-1 no-pad-l no-pad-r' style='margin-right:5px; width: 10px;'>-</label>
                        <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                          <input name='qtimeEnd_INDUK_NO' type='text' class='form-control' id='qtimeEnd_INDUK_NO'>
                        </div>
                        <div class='col-md-5 no-pad-l'>
                          <input type="hidden" name="entrance_INDUK_NO" id="entrance_INDUK_NO">
                          <?php echo $entrance->_combobox('cbentrance_INDUK_NO'); ?>  
                        </div>
                    
                        <div class='col-md-1 no-pad-l no-pad-r' style='margin-right:5px;'>                    
                          <button type='button' class='btn btn-success' name="btnAddTime_INDUK_NO" id='btnAddTime_INDUK_NO' style='margin-right:5px;' onclick='addTime(this,1,2)'>                        
                            <span class='glyphicon glyphicon-plus'></span>    
                          </button>    
                          <button type='button' class='btn btn-danger not-show' id='btnRemoveTime_INDUK_NO' onclick='removeTime(1,1)'>
                            <span class='glyphicon glyphicon-remove'></span>
                          </button>
                        </div>
                      </div>
                    </div> 
                  </div> 
                  <!--END OF RUNDOWN------>
                  
                </div> 
                
                <?php for ($day=1; $day <= $model->quotation_days ; $day++) { ?>  
                <div class="wrapper_route">
                  <div class="form-group input-transport">
                    <label id="lbl_<?php echo $day; ?>" for="route_<?php echo $day; ?>" class="control-label col-md-1 no-pad-r">Day <?php echo $day; ?></label>
                    <div class="col-md-5">  
                    <input type="hidden" name="route_<?php echo $day; ?>" id="route_<?php echo $day; ?>" class="filter" value="<?php echo $model->days[$day]["route_code"]; ?>">
                    <input type="hidden" name="path_<?php echo $day; ?>" id="path_<?php echo $day; ?>" value="<?php echo $model->days[$day]["route_path"]; ?>">
                    <?php echo $route->_combobox('cbroute_'.$day,$model->days[$day]["route_code"]); ?>
                    </div>
                  </div>

                  <?php if(isset($model->detail['rundown'][$day])) { ?>
                  <input type=hidden id="rundown_ctr_<?php echo $day; ?>" value = "<?php echo count($model->detail['rundown'][$day]); ?>">
                  <?php for ($ctr=1; $ctr <= count($model->detail['rundown'][$day]) ; $ctr++) { ?>  
                  <?php $prefix = $day . "_" . $ctr; ?>  
                  <div class="wrapperTime">  
                    <div id='wrapperTime_<?php echo $prefix; ?>' class="wrapp_entrance">
                      <div class='form-group'>
                        <div class='col-md-1' style='margin-left: 5px;'>&nbsp;</div>
                        <div class='col-md-1 no-pad-r no-pad-l' style='margin-left: 10px;'>
                          <input name='qtimeStart_<?php echo $prefix; ?>' type='text' class='form-control' id='qtimeStart_<?php echo $prefix; ?>' value="<?php echo $model->detail['rundown'][$day][$ctr-1]["qdetail_time_start"]; ?>">
                        </div>
                        <label class='control-label col-md-1 no-pad-l no-pad-r' style='margin-right:5px; width: 10px;'>-</label>
                        <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                          <input name='qtimeEnd_<?php echo $prefix; ?>' type='text' class='form-control' id='qtimeEnd_<?php echo $prefix; ?>' value="<?php echo $model->detail['rundown'][$day][$ctr-1]["qdetail_time_end"]; ?>">
                        </div>
                        <div class='col-md-5 no-pad-l'>
                          <input type="hidden" name="entrance_<?php echo $prefix; ?>" id="entrance_<?php echo $prefix; ?>" value="<?php echo $model->detail['rundown'][$day][$ctr-1]["qdetail_title"]; ?>">
                          <?php echo $entrance->_combobox("cbentrance_".$prefix,$model->detail['rundown'][$day][$ctr-1]["qdetail_title"]); ?>  
                        </div>
                    
                        <div class='col-md-1 no-pad-l no-pad-r' style='margin-right:5px;'>                    
                          <button type='button' class='btn btn-success' name="btnAddTime_<?php echo $prefix; ?>" id='btnAddTime_<?php echo $prefix; ?>' style='margin-right:5px;' onclick='addTime(this,<?php echo $day; ?>,<?php echo ($ctr+1); ?>)' <?php echo ($ctr == count($model->detail['rundown'][$day]) ? "" : "disabled"); ?>>
                            <span class='glyphicon glyphicon-plus'></span>    
                          </button>
                          <?php if ($ctr > 1) { ?>
                          <button type='button' class='btn btn-danger' id='btnRemoveTime_<?php echo $prefix; ?>' onclick='removeTime(<?php echo $day; ?>,<?php echo $ctr; ?>)'>
                            <span class='glyphicon glyphicon-remove'></span>
                          </button>
                          <?php } ?>
                        </div>
                      </div>
                    </div> 
                  </div> 
                  <?php } ?>
                  <?php } else {?>
                    <input type=hidden id="rundown_ctr_<?php echo $day; ?>" value = "1">
                    <?php $ctr = 1; ?>  
                    <?php $prefix = $day . "_" . $ctr; ?>  
                    <div class="wrapperTime">  
                      <div id='wrapperTime_<?php echo $prefix; ?>' class="wrapp_entrance">
                        <div class='form-group'>
                          <div class='col-md-1' style='margin-left: 5px;'>&nbsp;</div>
                          <div class='col-md-1 no-pad-r no-pad-l' style='margin-left: 10px;'>
                            <input name='qtimeStart_<?php echo $prefix; ?>' type='text' class='form-control' id='qtimeStart_<?php echo $prefix; ?>' value="">
                          </div>
                          <label class='control-label col-md-1 no-pad-l no-pad-r' style='margin-right:5px; width: 10px;'>-</label>
                          <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                            <input name='qtimeEnd_<?php echo $prefix; ?>' type='text' class='form-control' id='qtimeEnd_<?php echo $prefix; ?>' value="">
                          </div>
                          <div class='col-md-5 no-pad-l'>
                            <input type="hidden" name="entrance_<?php echo $prefix; ?>" id="entrance_<?php echo $prefix; ?>" value="">
                            <?php echo $entrance->_combobox("cbentrance_".$prefix); ?>  
                          </div>
                      
                          <div class='col-md-1 no-pad-l no-pad-r' style='margin-right:5px;'>                    
                            <button type='button' class='btn btn-success' name="btnAddTime_<?php echo $prefix; ?>" id='btnAddTime_<?php echo $prefix; ?>' style='margin-right:5px;' onclick='addTime(this,<?php echo $day; ?>,<?php echo ($ctr+1); ?>)'>
                              <span class='glyphicon glyphicon-plus'></span>    
                            </button>
                            <?php if ($ctr > 1) { ?>
                            <button type='button' class='btn btn-danger' id='btnRemoveTime_<?php echo $prefix; ?>' onclick='removeTime(<?php echo $day; ?>,<?php echo $ctr; ?>)'>
                              <span class='glyphicon glyphicon-remove'></span>
                            </button>
                            <?php } ?>
                          </div>
                        </div>
                      </div> 
                    </div> 
                  <?php }?>
                  <div class="batasRoute_<?php echo $day; ?>"></div>
                </div>
                <?php } ?>
                <!--END OF DIV TRANSPORT--> 
                  
                
                <div class="form-group group-btn-transport">
                  <label class="control-label col-md-10">&nbsp;</label>
                  <div class="col-md-1 no-pad-r" style="margin-right: 5px">
                    <input type="submit" class="btn btn-primary btn-block" value="Save">
                  </div>  
                </div>  
              </form>
            </div>
          </div>
        </div>    
      </div>
    </div>

	<!--------------------HOTEL--------------------->
	<div class="container">
		<div class="row">
			<div class="col-md-10 s-h-quotation">
				<div class="panel panel-default quotation-panel">
					<div class="panel-heading">
						<h3 class="panel-title">HOTEL</h3>						
					</div>
					<div class="panel-body quotation-body">
						<form name="formInsertHotel" id="formInsertHotel" class="form-horizontal" action="quotation_insertHotel" method="post" onsubmit="quotationSubmitForm(this.id);return false;">
							<div class="form-group input-hotel">
								<div id='hotel'>
									<table class='table borderless table-font' cellspacing='0' width='100%' id="table-hotel">
										<tbody>
											<tr>
												<td>&nbsp;</td>
                        <td align='center' width="32%"><input name="hotel_type1" type="text" style="text-align:center;" class="form-control" id="hotel_type1" value="Super Deluxe"></td>
                        <td align='center' width="32%"><input name="hotel_type2" type="text" style="text-align:center;" class="form-control" id="hotel_type2" value="Deluxe"></td>
                        <td align='center' width="32%"><input name="hotel_type3" type="text" style="text-align:center;" class="form-control" id="hotel_type3" value="Budget"></td>
											</tr>		
											<?php for ($day=1; $day < $model->quotation_days ; $day++) { ?>	
											<tr class="list-of-hotel">
												<td align='right'>
													<label class='control-label'>D<?php echo $day;?></label>
												</td>
                        <td>
                          <input type="hidden" name="hotel_cb_1_<?php echo $day; ?>" id="hotel_cb_1_<?php echo $day; ?>" value="<?php echo (isset($model->detail['hotel'][$day][5]['hotel_code']) && $model->detail['hotel'][$day][5]['hotel_code'] != "" ? $model->detail['hotel'][$day][5]['hotel_code'] : ""); ?>">
                          <?php echo $hotel->_combobox('cbhotel_1_'.$day,(isset($model->detail['hotel'][$day][5]['hotel_code']) && $model->detail['hotel'][$day][5]['hotel_code'] != "" ? $model->detail['hotel'][$day][5]['hotel_code'] : ""),"SD"); ?>                          
                        </td>
                        <td>
                          <input type="hidden" name="hotel_cb_2_<?php echo $day; ?>" id="hotel_cb_2_<?php echo $day; ?>" value="<?php echo (isset($model->detail['hotel'][$day][4]['hotel_code']) && $model->detail['hotel'][$day][4]['hotel_code'] != "" ? $model->detail['hotel'][$day][4]['hotel_code'] : ""); ?>">
                          <?php echo $hotel->_combobox('cbhotel_2_'.$day,(isset($model->detail['hotel'][$day][4]['hotel_code']) && $model->detail['hotel'][$day][4]['hotel_code'] != "" ? $model->detail['hotel'][$day][4]['hotel_code'] : ""),"DX"); ?>
                        </td>
                        <td>
                          <input type="hidden" name="hotel_cb_3_<?php echo $day; ?>" id="hotel_cb_3_<?php echo $day; ?>" value="<?php echo (isset($model->detail['hotel'][$day][3]['hotel_code']) && $model->detail['hotel'][$day][3]['hotel_code'] != "" ? $model->detail['hotel'][$day][3]['hotel_code'] : ""); ?>">
                          <?php echo $hotel->_combobox('cbhotel_3_'.$day,(isset($model->detail['hotel'][$day][3]['hotel_code']) && $model->detail['hotel'][$day][3]['hotel_code'] != "" ? $model->detail['hotel'][$day][3]['hotel_code'] : ""),"BD"); ?>
                        </td>
											</tr>                    							  
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
													
							<div class="form-group group-btn-hotel">
								<label class="control-label col-md-10">&nbsp;</label>
								<div class="col-md-1 no-pad-r" style="margin-right: 5px">
									<input type="submit" class="btn btn-primary btn-block" value="Save">
								</div>  
							</div>	
						</form>
					</div>
				</div>
			</div>		
		</div>
	</div>	
			
	<!--------------------MEAL---------------------->
	<div class="container">
		<div class="row">
			<div class="col-md-10 s-h-quotation">
				<div class="panel panel-default quotation-panel">
					<div class="panel-heading">
						<h3 class="panel-title">MEAL</h3>						
					</div>
					<div class="panel-body quotation-body">
						<form name="formInsertMeal" id="formInsertMeal" class="form-horizontal" action="quotation_insertMeal" method="post" onsubmit="quotationSubmitForm(this.id);return false;">
							<div class="form-group input-meal">
								<div id='meal'>
									<table class='table borderless table-font' cellspacing='0' width='100%' id="table-meal">
										<tbody>
											<tr>
												<td>&nbsp;</td>
												<td align='center'>Breakfast</td>
												<td align='center'>Lunch</td>
												<td align='center'>Dinner</td>
											</tr>							  
                      <?php for ($day=1; $day < $model->quotation_days ; $day++) { ?>  
											<tr class="list-of-meal">
												<td align='right'>
													<label class='control-label'>D<?php echo $day; ?></label>
												</td>
                        <td>
                          <input type="hidden" name="restaurant_<?php echo $day; ?>_1" id="restaurant_<?php echo $day; ?>_1" value="<?php echo (isset($model->detail['restaurant'][$day][1]['menu_code']) && $model->detail['restaurant'][$day][1]['menu_code'] != "" ? $model->detail['restaurant'][$day][1]['menu_code'] : ""); ?>">
                          <?php echo $restaurant->_comboboxMeal('cbrestaurant_'.$day."_1",(isset($model->detail['restaurant'][$day][1]['menu_code']) && $model->detail['restaurant'][$day][1]['menu_code'] != "" ? $model->detail['restaurant'][$day][1]['menu_code'] : "")); ?>
                        </td>
                        <td>
                          <input type="hidden" name="restaurant_<?php echo $day; ?>_2" id="restaurant_<?php echo $day; ?>_2" value="<?php echo (isset($model->detail['restaurant'][$day][2]['menu_code']) && $model->detail['restaurant'][$day][2]['menu_code'] != "" ? $model->detail['restaurant'][$day][2]['menu_code'] : ""); ?>">
                          <?php echo $restaurant->_comboboxMeal('cbrestaurant_'.$day."_2",(isset($model->detail['restaurant'][$day][2]['menu_code']) && $model->detail['restaurant'][$day][2]['menu_code'] != "" ? $model->detail['restaurant'][$day][2]['menu_code'] : "")); ?>
                        </td>
                        <td>
                          <input type="hidden" name="restaurant_<?php echo $day; ?>_3" id="restaurant_<?php echo $day; ?>_3" value="<?php echo (isset($model->detail['restaurant'][$day][3]['menu_code']) && $model->detail['restaurant'][$day][3]['menu_code'] != "" ? $model->detail['restaurant'][$day][3]['menu_code'] : ""); ?>">
                          <?php echo $restaurant->_comboboxMeal('cbrestaurant_'.$day."_3",(isset($model->detail['restaurant'][$day][3]['menu_code']) && $model->detail['restaurant'][$day][3]['menu_code'] != "" ? $model->detail['restaurant'][$day][3]['menu_code'] : "")); ?>
                        </td>
											</tr> 
                      <?php } ?>                   							  
										</tbody>
									</table>
								</div>
							</div>
													
							<div class="form-group group-btn-meal">
								<label class="control-label col-md-10">&nbsp;</label>
								<div class="col-md-1 no-pad-r" style="margin-right: 5px">
									<input type="submit" class="btn btn-primary btn-block" value="Save">
								</div>  
							</div>	
						</form>
					</div>
				</div>
			</div>		
		</div>
	</div>	
	
	<!--------------------OTHER--------------------->
		<div class="container">
			<div class="row">
				<div class="col-md-10 s-h-quotation">
					<div class="panel panel-default quotation-panel">
						<div class="panel-heading">
							<h3 class="panel-title">OTHER</h3>						
						</div>
						<div class="panel-body quotation-body">
							<form name="formInsertOther" id="formInsertOther" class="form-horizontal" action="quotation_insertOther" method="post" onsubmit="quotationSubmitForm(this.id);return false;">
                <?php if (isset($a)) { ?>
                <?php $ctr=0; ?>
                <?php foreach($model->detail['other'] as $data) { $ctr++; ?>
                <div class='form-group'>                  
                  <div class='col-md-2 no-pad-r' >
                    <input name='other_<?php echo $ctr; ?>_1' id='other_<?php echo $ctr; ?>_1' type='text' class='form-control' value="<?php echo $data['other_text']; ?>">
                  </div>
                  <label class='control-label col-md-1 no-pad-l no-pad-r' style='margin-right:15px; width: 10px;'>:</label>
                  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                    <input name='other_<?php echo $ctr; ?>_2' id='other_<?php echo $ctr; ?>_2' type='number' class='form-control num' value="<?php echo $data['other_price']; ?>" onchange="calculateOther(<?php echo $ctr; ?>)">
                  </div>
                  <label class='control-label col-md-1 no-pad-l' style='width: 10px;'>x</label>
                  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                    <input name='other_<?php echo $ctr; ?>_3' id='other_<?php echo $ctr; ?>_3' type='number' class='form-control num' value="<?php echo $data['other_satuan']; ?>" onchange="calculateOther(<?php echo $ctr; ?>)">
                  </div>
                  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                    <input name='other_<?php echo $ctr; ?>_31' id='other_<?php echo $ctr; ?>_31' type='text' class='form-control' value="<?php echo $data['other_satuan_text']; ?>">
                  </div>
                  <label class='control-label col-md-1 no-pad-l' style='width: 10px;'>x</label>
                  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                    <input name='other_<?php echo $ctr; ?>_4' id='other_<?php echo $ctr; ?>_4' type='number' class='form-control num' value="<?php echo $data['other_times']; ?>" onchange="calculateOther(<?php echo $ctr; ?>)">
                  </div>
                  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                    <input name='other_<?php echo $ctr; ?>_41' id='other_<?php echo $ctr; ?>_41' type='text' class='form-control' value="<?php echo $data['other_times_text']; ?>">
                  </div>
                  <label class='control-label col-md-1 no-pad-l' style='width: 10px;'>=</label>
                  <div class='col-md-2 no-pad-l'>
                    <input name='other_<?php echo $ctr; ?>_5' id='other_<?php echo $ctr; ?>_5' type='text' class='form-control' style="text-align: right" value="<?php echo number_format($data['other_subtotal']); ?>">
                  </div>                                
                </div>                
                <?php }?>
                <?php } else {?>
                  <?php $ctr = 8; ?>
                  <?php $other= array(
                    array("","",""),
                    array("LOCAL GUIDE","PAX","DAY"),
                    array("DRIVER","PAX","DAY"),
                    array("TICKET","PAX","TIME"),
                    array("ACCOMODATION","RM","NTS"),
                    array("MEAL","PAX","TIME"),
                    array("TOL/PARKING","COACH","TIME"),
                    array("","",""),
                    array("","","")
                    ); ?>
                  <?php for ($i=1 ; $i<= 8 ; $i++) { ?>
                
                  <div class='form-group'>                  
                    <div class='col-md-2 no-pad-r' >
                      <input name='other_<?php echo $i; ?>_1' id='other_<?php echo $i; ?>_1' type='text' class='form-control' value="<?php echo $other[$i][0]; ?>">
                    </div>
                    <label class='control-label col-md-1 no-pad-l no-pad-r' style='margin-right:15px; width: 10px;'>:</label>
                    <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                      <input name='other_<?php echo $i; ?>_2' id='other_<?php echo $i; ?>_2' type='number' class='form-control num' value="0" onchange="calculateOther($i)">
                    </div>
                    <label class='control-label col-md-1 no-pad-l' style='width: 10px;'>x</label>
                    <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                      <input name='other_<?php echo $i; ?>_3' id='other_<?php echo $i; ?>_3' type='number' class='form-control num' value="0" onchange="calculateOther($i)">
                    </div>
                    <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                      <input name='other_<?php echo $i; ?>_31' id='other_<?php echo $i; ?>_31' type='text' class='form-control' value="<?php echo $other[$i][1]; ?>">
                    </div>
                    <label class='control-label col-md-1 no-pad-l' style='width: 10px;'>x</label>
                    <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                      <input name='other_<?php echo $i; ?>_4' id='other_<?php echo $i; ?>_4' type='number' class='form-control num' value="0" onchange="calculateOther($i)">
                    </div>
                    <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                      <input name='other_<?php echo $i; ?>_41' id='other_<?php echo $i; ?>_41' type='text' class='form-control' value="<?php echo $other[$i][2]; ?>">
                    </div>
                    <label class='control-label col-md-1 no-pad-l' style='width: 10px;'>=</label>
                    <div class='col-md-2 no-pad-l'>
                      <input name='other_<?php echo $i; ?>_5' id='other_<?php echo $i; ?>_5' type='text' style="text-align: right" class='form-control' value="0" readonly>
                    </div>                                
                  </div>
                
                  <?php }?>
							  <?php }?>
                <input type="hidden" name="other_count" value="<?php echo $ctr; ?>">
								
								<div class="form-group group-btn-other">
									<label class="control-label col-md-10">&nbsp;</label>
									<div class="col-md-1 no-pad-r" style="margin-right: 5px">
										<input type="submit" class="btn btn-primary btn-block" value="Save">
									</div>  
								</div>	
							</form>
						</div>
					</div>
				</div>		
			</div>
		</div>
	</div>
</div>