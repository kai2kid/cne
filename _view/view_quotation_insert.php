<div class="bs-callout bs-callout-info">
  <div class="collapse navbar-collapse" style="padding-left:0px;">
    <label class="title">Add Quotation</label>
	
<!-- INI START FORM -->	
    <input type="hidden" id="quotation_mode" value="insert">
  <input type="hidden" id="quotation_code" name="quotation_code" value="<?php echo $model->autogenerate(); ?>">
	
  <form class="form-horizontal" id="formInsertHeader" action="quotation_insertHeader" method="post" onsubmit="quotationSubmitForm(this.id);return false;">
		<div class="form-group">
		  <label for="quotation_name" class="control-label col-md-1 no-pad-r">Title</label>
		  <div class="col-md-4">
			<input name="quotation_name" type="text" class="form-control" id="quotation_name" placeholder="Name">
		  </div>
		</div>
		<div class="form-group">
		  <label for="quotation_day" class="control-label col-md-1 no-pad-r">Duration</label>
		  <div class="col-md-1 no-pad-r" style="margin-right: 5px;">
			<input name="quotation_night" type="text" class="form-control" id="quotation_night" placeholder="Night" value="1">Night
		  </div>		  
		  <div class="col-md-1 no-pad-l no-pad-r">			
			<input name="quotation_day" type="text" class="form-control" id="quotation_day" placeholder="Day" value="1">Day
		  </div>	
		  <div class="col-md-1 no-pad-l" style="margin-left: 5px;">
			<input type="submit" class="btn btn-primary btn-block" value="Save">
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
									</div> <!--END OF RUNDOWN------>
									
									<div class="batasRoute_INDUK"></div>
								</div> <!--END OF DIV TRANSPORT--> 
								  
								
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
									<table class='table borderless table-font' cellspacing='0' style="width:98%;" id="table-hotel">
										<tbody>
											<tr>
												<td>&nbsp;</td>
												<td align='center' width="32%"><input name="hotel_type1" type="text" style="text-align:center;" class="form-control" id="hotel_type1" value="Super Deluxe"></td>
												<td align='center' width="32%"><input name="hotel_type2" type="text" style="text-align:center;" class="form-control" id="hotel_type2" value="Deluxe"></td>
												<td align='center' width="32%"><input name="hotel_type3" type="text" style="text-align:center;" class="form-control" id="hotel_type3" value="Budget"></td>
											</tr>							  
											<tr class="list-of-hotel">
												<td align='right'>
													<label class='control-label'>D1</label>
												</td>
												<td><input type="hidden" name="hotel_cb_1_1" id="hotel_cb_1_1"><?php echo $hotel->_combobox('cbhotel_1_1',"","SD"); ?></td>
												<td><input type="hidden" name="hotel_cb_2_1" id="hotel_cb_2_1"><?php echo $hotel->_combobox('cbhotel_2_1',"","DX"); ?></td>
												<td><input type="hidden" name="hotel_cb_3_1" id="hotel_cb_3_1"><?php echo $hotel->_combobox('cbhotel_3_1',"","BD"); ?></td>
											</tr>                    							  
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
									<table class='table borderless table-font' cellspacing='0' style="width:98%;" id="table-meal">
										<tbody>
											<tr>
												<td>&nbsp;</td>
												<td align='center' width="32%">Breakfast</td>
												<td align='center' width="32%">Lunch</td>
												<td align='center' width="32%">Dinner</td>
											</tr>							  
											<tr class="list-of-meal">
												<td align='right'>
													<label class='control-label'>D1</label>
												</td>
												<td><input type="hidden" name="restaurant_1_1" id="restaurant_1_1"><?php echo $restaurant->_comboboxMeal('cbrestaurant_1_1',"",1); ?></td>
												<td><input type="hidden" name="restaurant_1_2" id="restaurant_1_2"><?php echo $restaurant->_comboboxMeal('cbrestaurant_1_2'); ?></td>
												<td><input type="hidden" name="restaurant_1_3" id="restaurant_1_3"><?php echo $restaurant->_comboboxMeal('cbrestaurant_1_3'); ?></td>
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
								<input type="hidden" name="other_count" value="8">
                
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