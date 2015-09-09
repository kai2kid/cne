<div class="bs-callout bs-callout-info">
  <div class="collapse navbar-collapse" style="padding-left:0px;">
    <label class="title">Add Quotation</label>
	
<!-- INI START FORM -->	
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
							<form name="formInsertTransport" id="formInsertTransport" class="form-horizontal" action="quotation_insertTransport" method="post" onsubmit="quotationSubmitForm(this.id);return false;">
								<div class="wrapper_route template-route">
									<div class="form-group input-transport">
									  <label id="lbl_INDUK" for="route_INDUK" class="control-label col-md-1 no-pad-r">Day INDUK</label>
									  <div class="col-md-5">								
										<?php echo $route->_combobox('route_INDUK'); ?>
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
											<tr class="list-of-hotel">
												<td align='right'>
													<label class='control-label'>D1</label>
												</td>
												<td><?php echo $hotel->_combobox('hotel_cb_1_1',"","SD"); ?></td>
												<td><?php echo $hotel->_combobox('hotel_cb_2_1',"","DX"); ?></td>
												<td><?php echo $hotel->_combobox('hotel_cb_3_1',"","BD"); ?></td>
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
												<td><?php echo $restaurant->_comboboxMeal('restaurant_1_1',"",1); ?></td>
												<td><?php echo $restaurant->_comboboxMeal('restaurant_1_2'); ?></td>
												<td><?php echo $restaurant->_comboboxMeal('restaurant_1_3'); ?></td>
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
																	
								<div class='form-group'>									
									<div class='col-md-2 no-pad-r' >
										<input name='other_1_1' id='other_1_1' type='text' class='form-control' value="Local Guide">
									</div>
									<label class='control-label col-md-1 no-pad-l no-pad-r' style='margin-right:15px; width: 10px;'>:</label>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='other_1_2' id='other_1_2' type='number' class='form-control num' value="0" onchange="calculateOther(2)">
									</div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>x</label>
                  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                    <input name='other_1_3' id='other_1_3' type='number' class='form-control num' value="0" onchange="calculateOther(2)">
                  </div>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='other_1_31' id='other_1_31' type='text' class='form-control' value="PAX">
									</div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>x</label>
                  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                    <input name='other_1_4' id='other_1_4' type='number' class='form-control num' value="0" onchange="calculateOther(2)">
                  </div>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                    <input name='other_1_41' id='other_1_41' type='text' class='form-control' value="DAY">
									</div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>=</label>
									<div class='col-md-2 no-pad-l'>
										<input name='other_1_5' id='other_1_5' type='number' class='form-control num' value="0" readonly>
									</div>						  									
								</div>								
								
								<div class='form-group'>									
									<div class='col-md-2 no-pad-r' >
										<input name='other_2_1' id='other_2_1' type='text' class='form-control' value="Driver">
									</div>
									<label class='control-label col-md-1 no-pad-l no-pad-r' style='margin-right:15px; width: 10px;'>:</label>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='other_2_2' id='other_2_2' type='number' class='form-control num' value="0" onchange="calculateOther(2)">
									</div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>x</label>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='other_2_3' id='other_2_3' type='number' class='form-control num' value="0" onchange="calculateOther(2)">
									</div>
                  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                    <input name='other_2_31' id='other_2_31' type='text' class='form-control' value="PAX">
                  </div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>x</label>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='other_2_4' id='other_2_4' type='number' class='form-control num' value="0" onchange="calculateOther(2)">
									</div>
                  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                    <input name='other_2_41' id='other_2_41' type='text' class='form-control' value="DAY">
                  </div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>=</label>
									<div class='col-md-2 no-pad-l'>
										<input name='other_2_5' id='other_2_5' type='number' class='form-control num' value="0" readonly>
									</div>						  									
								</div>	
								
								<div class='form-group'>									
									<div class='col-md-2 no-pad-r' >
										<input name='other_3_1' id='other_3_1' type='text' class='form-control' value="Ticket">
									</div>
									<label class='control-label col-md-1 no-pad-l no-pad-r' style='margin-right:15px; width: 10px;'>:</label>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='other_3_2' id='other_3_2' type='number' class='form-control num' value="0" onchange="calculateOther(3)">
									</div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>x</label>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='other_3_3' id='other_3_3' type='number' class='form-control num' value="0" onchange="calculateOther(3)">
									</div>
                  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                    <input name='other_3_31' id='other_3_31' type='text' class='form-control' value="PAX">
                  </div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>x</label>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='other_3_4' id='other_3_4' type='number' class='form-control num' value="0" onchange="calculateOther(3)">
									</div>
                  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                    <input name='other_3_41' id='other_3_41' type='text' class='form-control' value="TIME">
                  </div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>=</label>
									<div class='col-md-2 no-pad-l'>
										<input name='other_3_5' id='other_3_5' type='number' class='form-control num' value="0" readonly>
									</div>						  									
								</div>
								
								<div class='form-group'>									
									<div class='col-md-2 no-pad-r' >
										<input name='other_4_1' id='other_4_1' type='text' class='form-control' value="Accommodation">
									</div>
									<label class='control-label col-md-1 no-pad-l no-pad-r' style='margin-right:15px; width: 10px;'>:</label>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='other_4_2' id='other_4_2' type='number' class='form-control num' value="0" onchange="calculateOther(4)">
									</div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>x</label>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='other_4_3' id='other_4_3' type='number' class='form-control num' value="0" onchange="calculateOther(4)">
									</div>
                  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                    <input name='other_4_31' id='other_4_31' type='text' class='form-control' value="RM">
                  </div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>x</label>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='other_4_4' id='other_4_4' type='number' class='form-control num' value="0" onchange="calculateOther(4)">
									</div>
                  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                    <input name='other_4_41' id='other_4_41' type='text' class='form-control' value="NTS">
                  </div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>=</label>
									<div class='col-md-2 no-pad-l'>
										<input name='other_4_5' id='other_4_5' type='number' class='form-control num' value="0" readonly>
									</div>						  									
								</div>
								
								<div class='form-group'>									
									<div class='col-md-2 no-pad-r' >
										<input name='other_5_1' id='other_5_1' type='text' class='form-control' value="Meal">
									</div>
									<label class='control-label col-md-1 no-pad-l no-pad-r' style='margin-right:15px; width: 10px;'>:</label>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='other_5_2' id='other_5_2' type='number' class='form-control num' value="0" onchange="calculateOther(5)">
									</div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>x</label>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='other_5_3' id='other_5_3' type='number' class='form-control num' value="0" onchange="calculateOther(5)">
									</div>
                  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                    <input name='other_5_31' id='other_5_31' type='text' class='form-control' value="PAX">
                  </div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>x</label>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='other_5_4' id='other_5_4' type='number' class='form-control num' value="0" onchange="calculateOther(5)">
									</div>
                  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                    <input name='other_5_41' id='other_5_41' type='text' class='form-control' value="TIME">
                  </div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>=</label>
									<div class='col-md-2 no-pad-l'>
										<input name='other_5_5' id='other_5_5' type='number' class='form-control num' value="0" readonly>
									</div>						  									
								</div>
								
								<div class='form-group'>									
									<div class='col-md-2 no-pad-r' >
										<input name='other_6_1' id='other_6_1' type='text' class='form-control' value="Tol/Parking">
									</div>
									<label class='control-label col-md-1 no-pad-l no-pad-r' style='margin-right:15px; width: 10px;'>:</label>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='other_6_2' id='other_6_2' type='number' class='form-control num' value="0" onchange="calculateOther(6)">
									</div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>x</label>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='other_6_3' id='other_6_3' type='number' class='form-control num' value="0" onchange="calculateOther(6)">
									</div>
                  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                    <input name='other_6_31' id='other_6_31' type='text' class='form-control' value="COACH">
                  </div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>x</label>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='other_6_4' id='other_6_4' type='number' class='form-control num' value="0" onchange="calculateOther(6)">
									</div>
                  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                    <input name='other_6_41' id='other_6_41' type='text' class='form-control' value="TIME">
                  </div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>=</label>
									<div class='col-md-2 no-pad-l'>
										<input name='other_6_5' id='other_6_5' type='number' class='form-control num' value="0" readonly>
									</div>						  									
								</div>
								       
								<div class='form-group'>									
									<div class='col-md-2 no-pad-r' >
										<input name='other_7_1' id='other_7_1' type='text' class='form-control'>
									</div>
									<label class='control-label col-md-1 no-pad-l no-pad-r' style='margin-right:15px; width: 10px;'>:</label>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='other_7_2' id='other_7_2' type='number' class='form-control num' value="0" onchange="calculateOther(7)">
									</div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>x</label>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='other_7_3' id='other_7_3' type='number' class='form-control num' value="0" onchange="calculateOther(7)">
									</div>
                  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                    <input name='other_7_31' id='other_7_31' type='text' class='form-control' value="">
                  </div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>x</label>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='other_7_4' id='other_7_4' type='number' class='form-control num' value="0" onchange="calculateOther(7)">
									</div>
                  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                    <input name='other_7_41' id='other_7_41' type='text' class='form-control' value="">
                  </div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>=</label>
									<div class='col-md-2 no-pad-l'>
										<input name='other_7_5' id='other_7_5' type='number' class='form-control num' value="0" readonly>
									</div>						  									
								</div>
								
								<div class='form-group'>									
									<div class='col-md-2 no-pad-r' >
										<input name='other_8_1' id='other_8_1' type='text' class='form-control'>
									</div>
									<label class='control-label col-md-1 no-pad-l no-pad-r' style='margin-right:15px; width: 10px;'>:</label>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='other_8_2' id='other_8_2' type='number' class='form-control num' value="0" onchange="calculateOther(8)">
									</div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>x</label>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='other_8_3' id='other_8_3' type='number' class='form-control num' value="0" onchange="calculateOther(8)">
									</div>
                  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                    <input name='other_8_31' id='other_8_31' type='text' class='form-control' value="">
                  </div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>x</label>
									<div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='other_8_4' id='other_8_4' type='number' class='form-control num' value="0" onchange="calculateOther(8)">
									</div>
                  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
                    <input name='other_8_41' id='other_8_41' type='text' class='form-control' value="">
                  </div>
									<label class='control-label col-md-1 no-pad-l' style='width: 10px;'>=</label>
									<div class='col-md-2 no-pad-l'>
										<input name='other_8_5' id='other_8_5' type='number' class='form-control num' value="0" readonly>
									</div>						  									
								</div>
								
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
