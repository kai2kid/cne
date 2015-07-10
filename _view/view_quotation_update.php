<div class="bs-callout bs-callout-info">
  <div class="collapse navbar-collapse" style="padding-left:0px;">
    <label class="title">Update Quotation</label>
	
<!-- INI START FORM -->	
    <input type="hidden" id="quotation_code" name="quotation_code" value="<?php echo $model->quotation_code; ?>">
	
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
		  </div>
	  </form>		
    </div>
    <!--------------------TRANPORT--------------------->
	  <div class="container">
		  <div class="row">
			  <div class="col-md-10 s-h-quotation">
				  <div class="panel panel-default quotation-panel">
					  <div class="panel-heading">
						  <h3 class="panel-title">TRANSPORT</h3>
						  <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
					  </div>
					  <div class="panel-body quotation-body">
              <form name="formInsertTransport" id="formInsertTransport" class="form-horizontal" action="quotation_insertTransport" method="post" onsubmit="quotationSubmitForm(this.id);return false;">
                <?php for ($day=1; $day <= $model->quotation_days ; $day++) { ?>
							  <div class="form-group input-transport">
							    <label for="route_<?php echo $day;?>" class="control-label col-md-1 no-pad-r">Day <?php echo $day;?></label>
							    <div class="col-md-5">
								  <!--<input name="qtransport_start" type="text" class="form-control" id="qtransport_start">-->
                  <?php echo $route->_combobox('route_'.$day,(isset($model->days[$day]['route_code']) && $model->days[$day]['route_code'] != "" ? $model->days[$day]['route_code'] : "")); ?>
							    </div>
							  </div>
                <?php } ?>

							  <div class="form-group group-btn-transport">
								  <label class="control-label col-md-10">&nbsp;</label>
								  <div class="col-md-1 no-pad-r" style="margin-right: 5px">
									  <input type="submit" class="btn btn-primary btn-block" value="Save">
								  </div>  
  <!--
								  <div class="col-md-2 no-pad-l">
									  <input type="button" class="btn btn-default btn-block" value="Add Price" onclick="navigate('quotation_formInsertPriceTransport')">
								  </div>
  -->
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
						<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-down"></i></span>
					</div>
					<div class="panel-body quotation-body">
						<div class="panel-body quotation-body">
							<form name="formInsertHotel" id="formInsertHotel" class="form-horizontal" action="quotation_insertHotel" method="post" onsubmit="quotationSubmitForm(this.id);return false;">
							<!------------JENIS 1 : TIPE_DAY--------------->	
								<div class="cont-hotel1">
									<div class="form-group">
									  <label for="hotel_type1" class="control-label col-md-4" style="text-align:left; margin-left: 50px;"><?php echo text_hotelLevel(5); ?></label>									  
									  <div class="col-md-5">
										
									  </div>
									</div>
									<!-- list per night -->
									<?php for ($day=1; $day <= $model->quotation_days ; $day++) { ?>
										<?php if ($day == 1 || ($day > 1 && isset($model->detail['hotel'][$day][5]['hotel_code']) && $model->detail['hotel'][$day][5]["hotel_code"] != $model->detail['hotel'][$day-1][5]["hotel_code"])) {?>
										<div class="form-group hotel_type1 input-hotel1_<?php echo $day;?>">
											<label id="hotel_lb_1_<?php echo $day; ?>" class="control-label col-md-1 no-pad-r">D<?php echo $day; ?></label>
											<div class="col-md-4 no-pad-r" style="margin-right: 5px;">
												<?php echo $hotel->_combobox('hotel_cb_1_'.$day,(isset($model->detail['hotel'][$day][5]['hotel_code']) && $model->detail['hotel'][$day][5]['hotel_code'] != "" ? $model->detail['hotel'][$day][5]['hotel_code'] : "")); ?>
											</div>
										</div>
										<?php } ?>
									<?php } ?>
								</div>								
							<hr>
							<!------------JENIS 2--------------->
								<div class="cont-hotel2">
									<div class="form-group">
									  <label for="hotel_type2" class="control-label col-md-4" style="text-align:left; margin-left: 50px;"><?php echo text_hotelLevel(4); ?></label>
									  <div class="col-md-5">
									  
									  </div>
									</div>
									<!-- list per night -->
									<?php for ($day=1; $day <= $model->quotation_days ; $day++) { ?>
									<?php if ($day == 1 || ($day > 1 && isset($model->detail['hotel'][$day][4]["hotel_code"]) && $model->detail['hotel'][$day][4]["hotel_code"] != $model->detail['hotel'][$day-1][4]["hotel_code"])) {?>
									<div class="form-group hotel_type2 input-hotel2_<?php echo $day;?>">
									  <label id="hotel_lb_2_<?php echo $day; ?>" class="control-label col-md-1 no-pad-r">D<?php echo $day; ?></label>
									  <div class="col-md-4 no-pad-r" style="margin-right: 5px;">
									  <?php echo $hotel->_combobox('hotel_cb_2_'.$day,(isset($model->detail['hotel'][$day][4]['hotel_code']) && $model->detail['hotel'][$day][4]['hotel_code'] != "" ? $model->detail['hotel'][$day][4]['hotel_code'] : "")); ?>
									  </div>
									</div>
									<?php } ?>
									<?php } ?>
								</div>
							<hr>
							<!------------JENIS 3--------------->
								<div class="cont-hotel3">
									<div class="form-group">
									  <label for="hotel_type3" class="control-label col-md-4" style="text-align:left; margin-left: 50px;"><?php echo text_hotelLevel(3); ?></label>
									  <div class="col-md-5">
									  </div>
									</div>
									<!-- list per night -->
									<?php for ($day=1; $day <= $model->quotation_days ; $day++) { ?>
									<?php if ($day == 1 || ($day > 1 && isset($model->detail['hotel'][$day][3]["hotel_code"]) && $model->detail['hotel'][$day][3]["hotel_code"] != $model->detail['hotel'][$day-1][3]["hotel_code"])) {?>
									<div class="form-group hotel_type3 input-hotel3_<?php echo $day;?>">
									  <label id="hotel_lb_3_<?php echo $day; ?>" class="control-label col-md-1 no-pad-r">D<?php echo $day; ?></label>
									  <div class="col-md-4 no-pad-r" style="margin-right: 5px;">
									  <?php echo $hotel->_combobox('hotel_cb_3_'.$day,(isset($model->detail['hotel'][$day][3]['hotel_code']) && $model->detail['hotel'][$day][3]['hotel_code'] != "" ? $model->detail['hotel'][$day][3]['hotel_code'] : "")); ?>
									  </div>
									</div>
									<?php } ?>
									<?php } ?>
								</div>
							<!------------BUTTON------------>
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
	</div>
	
	<!----------ENTRANCE---------->
	<div class="container">
		<div class="row">
			<div class="col-md-10 s-h-quotation">
				<div class="panel panel-default quotation-panel">
					<div class="panel-heading">
						<h3 class="panel-title">ENTRANCE</h3>
						<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-down"></i></span>
					</div>
					<div class="panel-body quotation-body">
						<form name="formInsertEntrance" id="formInsertEntrance" class="form-horizontal" action="quotation_insertEntrance" method="post" onsubmit="quotationSubmitForm(this.id);return false;">
						<?php for ($day=1; $day <= $model->quotation_days ; $day++) { ?>
							<div class="form-group input-entrance">
							<?php foreach ($model->detail['entrance'][$day] as $detail) { ?>
								<label for="entrance_<?php echo $day;?>" class="control-label col-md-1 no-pad-r">Day <?php echo $day;?></label>
								<div class="col-md-8">
								<?php echo $entrance->_combobox('entrance_'.$day,(isset($detail['entrance_code']) && $detail['entrance_code'] != "" ? $detail['entrance_code'] : "")); ?>
							<?php } ?>
								</div>
						</div>
              <?php } ?>
							

							<div class="form-group group-btn-entrance">
								<label class="control-label col-md-10">&nbsp;</label>
								<div class="col-md-1 no-pad-r" style="margin-right: 5px">
									<input type="submit" class="btn btn-primary btn-block" value="Save">
								</div>  
<!--
								<div class="col-md-2 no-pad-l">
									<input type="button" class="btn btn-default btn-block" value="Add Price" onclick="navigate('quotation_formInsertPriceEntrance')">
								</div>
-->
							</div>	
						</form>
					</div>
				</div>
			</div>		
		</div>
	</div>
	
	<!-------MEAL--------->
	<div class="container">
		<div class="row">
			<div class="col-md-10 s-h-quotation">
				<div class="panel panel-default quotation-panel">
					<div class="panel-heading">
						<h3 class="panel-title">MEAL</h3>
						<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-down"></i></span>
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
							  <?php for ($day=1; $day <= $model->quotation_days ; $day++) { ?>
								<tr class="list-of-meal">
								  <td align='right'>
									<label class='control-label'>D<?php echo $day; ?></label>
								  </td>
								  <td><?php echo $restaurant->_comboboxMeal('restaurant_'.$day."_1",(isset($model->detail['restaurant'][$day][1]['menu_code']) && $model->detail['restaurant'][$day][1]['menu_code'] != "" ? $model->detail['restaurant'][$day][1]['menu_code'] : "")); ?></td>
								  <td><?php echo $restaurant->_comboboxMeal('restaurant_'.$day."_2",(isset($model->detail['restaurant'][$day][2]['menu_code']) && $model->detail['restaurant'][$day][2]['menu_code'] != "" ? $model->detail['restaurant'][$day][2]['menu_code'] : "")); ?></td>
								  <td><?php echo $restaurant->_comboboxMeal('restaurant_'.$day."_3",(isset($model->detail['restaurant'][$day][3]['menu_code']) && $model->detail['restaurant'][$day][3]['menu_code'] != "" ? $model->detail['restaurant'][$day][3]['menu_code'] : "")); ?></td>
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
<!--
								<div class="col-md-2 no-pad-l">
									<input type="button" class="btn btn-default btn-block" value="Add Price" onclick="alert('masih belum tau yang 3 jenis itu')">
								</div>
-->
							</div>	
						</form>
					</div>
				</div>
			</div>		
		</div>
	</div>
	
	<!--
	<div class="container">
		<div class="row">
			<div class="col-md-10 s-h-quotation">
				<div class="panel panel-default quotation-panel">
					<div class="panel-heading">
						<h3 class="panel-title">OTHER</h3>
						<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-down"></i></span>
					</div>
					<div class="panel-body quotation-body">
						1
					</div>
				</div>
			</div>		
		</div>
	</div>
	-->
	
	<!-----RUNDOWN------>
	<div class="container">
		<div class="row">
			<div class="col-md-10 s-h-quotation">
				<div class="panel panel-default quotation-panel">
					<div class="panel-heading">
						<h3 class="panel-title">RUNDOWN</h3>
						<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-down"></i></span>
					</div>
					<div class="panel-body quotation-body">
						<form name="formInsertRundown" id="formInsertRundown" class="form-horizontal" action="quotation_insertRundown" method="post" onsubmit="quotationSubmitForm(this.id);return false;">
							<?php for ($day=1; $day <= $model->quotation_days ; $day++) { ?>
								  <div class='panel' id='run_<?php echo $day;?>'>
								  <div class='form-group'>
									<label id="runday_<?php echo $day; ?>" class='control-label col-md-5 no-pad-l' style='text-align: left; margin-left: 5px;'>D<?php echo $day. ": " .$model->days[$day]["route_title"]; ?></label>
								  </div>
								  <?php $i=0; ?>
								  <?php foreach ($model->detail['rundown'][$day] as $detail) { ?>
								  <?php $i++; ?>
								  <div id='wrapperTime<?php echo $i; ?>'>
									<div class='form-group'>
									  <div class='col-md-1 no-pad-r no-pad-l' style='margin-left: 5px;'>
										<input name='qtimeStart_<?php echo $day.$i;?>' type='time' class='form-control' id='qtimeStart_<?php echo $day.$i;?>' value="<?php echo $detail["qdetail_time_start"]; ?>">
									  </div>
									  <label class='control-label col-md-1 no-pad-l no-pad-r' style='margin-right:5px; width: 10px;'>-</label>
									  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='qtimeEnd_<?php echo $day.$i;?>' type='time' class='form-control' id='qtimeEnd_<?php echo $day.$i;?>'  value="<?php echo $detail["qdetail_time_end"]; ?>">
									  </div>
									  <div class='col-md-4 no-pad-l'>
										<input name='qremark_<?php echo $day.$i;?>' type='text' class='form-control' id='qremark_<?php echo $day.$i;?>' value="<?php echo $detail["qdetail_title"]; ?>">
									  </div>
								  
									  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right:5px;'>
										<?php if ($i==1) { ?>
										<button id='btnAddTime<?php echo $day.$i;?>' type='button' class='btn btn-success' style='margin-right:5px;' onclick='addTime(this,<?php echo $day . ",";?> 2)'0>
										<span class='glyphicon glyphicon-plus'></span>
										<?php } else { ?>
										<button type='button' class='btn btn-danger' onclick='removeTime("+induk+", "+nomor+")'>
										<span class='glyphicon glyphicon-remove'></span>
										<?php } ?>
									  </div>
									</div>
									</div>
								<?php } ?>                
								</div>              
							<?php } ?>
              <div class="form-group group-btn-rundown">
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
