<div class="bs-callout bs-callout-info">
  <div class="collapse navbar-collapse" style="padding-left:0px;">
    <label class="title">Update Quotation</label>
	
<!-- INI START FORM -->	
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
							<form name="formInsertTransport" id="formInsertTransport" class="form-horizontal" action="quotation_insertTransport" method="post" onsubmit="quotationSubmitForm(this.id);return false;">
<!--
								<div class="wrapper_route template-route">
									<div class="form-group input-transport">
									  <label id="lbl_INDUK" for="route_INDUK" class="control-label col-md-1 no-pad-r">Day INDUK</label>
									  <div class="col-md-5">								
										<?php echo $route->_combobox('route_INDUK'); ?>
									  </div>
									</div>		-->																			
									<!--RUNDOWN-------------->
<!--									
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
													<?php echo $entrance->_combobox('entrance_INDUK_NO'); ?>	
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
									</div> <!--END OF RUNDOWN------>
<!--									
									<div class="batasRoute_INDUK"></div>
								</div> 
-->                
                <!--END OF DIV TRANSPORT--> 
								  
								<?php for ($day=1; $day <= $model->quotation_days ; $day++) { ?>
									<!--ISI DATABASE--->
									<div class="wrapper_route">
										<div class="form-group input-transport">
										  <label id="lbl_<?php echo $day;?>" for="route_<?php echo $day;?>" class="control-label col-md-1 no-pad-r">Day <?php echo $day;?></label>
										  <div class="col-md-5">								
											<?php echo $route->_combobox('route_'.$day,(isset($model->days[$day]['route_code']) && $model->days[$day]['route_code'] != "" ? $model->days[$day]['route_code'] : "")); ?>
										  </div>
										</div>					

										<!----YANG RUNDOWN BELUM LOAD DBASE --->		
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
														<?php echo $entrance->_combobox('entrance_INDUK_NO'); ?>	
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
										</div> <!--END OF RUNDOWN------>
										
										<div class="batasRoute_INDUK"></div>
									</div> <!--END OF DIV TRANSPORT--> 																		
									
								<?php } ?>
								
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
												<td align='center'><input name="hotel_type1" type="text" style="text-align:center;" class="form-control" id="hotel_type1" value="Super Deluxe"></td>
												<td align='center'><input name="hotel_type2" type="text" style="text-align:center;" class="form-control" id="hotel_type2" value="Deluxe"></td>
												<td align='center'><input name="hotel_type3" type="text" style="text-align:center;" class="form-control" id="hotel_type3" value="Budget"></td>
											</tr>		
											<?php for ($day=1; $day < $model->quotation_days ; $day++) { ?>	
											<tr class="list-of-hotel">
												<td align='right'>
													<label class='control-label'>D<?php echo $day;?></label>
												</td>
												<td><?php echo $hotel->_combobox('hotel_cb_1_'.$day,(isset($model->detail['hotel'][$day][5]['hotel_code']) && $model->detail['hotel'][$day][5]['hotel_code'] != "" ? $model->detail['hotel'][$day][5]['hotel_code'] : ""),"SD"); ?></td>
												<td><?php echo $hotel->_combobox('hotel_cb_2_'.$day,(isset($model->detail['hotel'][$day][4]['hotel_code']) && $model->detail['hotel'][$day][4]['hotel_code'] != "" ? $model->detail['hotel'][$day][4]['hotel_code'] : ""),"DX"); ?></td>
												<td><?php echo $hotel->_combobox('hotel_cb_3_'.$day,(isset($model->detail['hotel'][$day][3]['hotel_code']) && $model->detail['hotel'][$day][3]['hotel_code'] != "" ? $model->detail['hotel'][$day][3]['hotel_code'] : ""),"BD"); ?></td>
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
											<tr class="list-of-meal">
												<td align='right'>
													<label class='control-label'>D1</label>
												</td>
												<td><?php echo $restaurant->_comboboxMeal('restaurant_'.$day."_1",(isset($model->detail['restaurant'][$day][1]['menu_code']) && $model->detail['restaurant'][$day][1]['menu_code'] != "" ? $model->detail['restaurant'][$day][1]['menu_code'] : "")); ?></td>
												<td><?php echo $restaurant->_comboboxMeal('restaurant_'.$day."_2",(isset($model->detail['restaurant'][$day][2]['menu_code']) && $model->detail['restaurant'][$day][2]['menu_code'] != "" ? $model->detail['restaurant'][$day][2]['menu_code'] : "")); ?></td>
												<td><?php echo $restaurant->_comboboxMeal('restaurant_'.$day."_3",(isset($model->detail['restaurant'][$day][3]['menu_code']) && $model->detail['restaurant'][$day][3]['menu_code'] != "" ? $model->detail['restaurant'][$day][3]['menu_code'] : "")); ?></td>
											</tr>                    							  
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
                    <input name='other_<?php echo $ctr; ?>_5' id='other_<?php echo $ctr; ?>_5' type='text' class='form-control' style="text-align: right" value="<?php echo number_format($data['other_subtotal']); ?>" readonly>
                  </div>                                
                </div>                
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