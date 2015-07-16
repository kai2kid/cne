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
			<input name="quotation_day" type="text" class="form-control" id="quotation_day" placeholder="Day" value="1">Day
		  </div>		  
		  <div class="col-md-1 no-pad-l no-pad-r">
			<input name="quotation_night" type="text" class="form-control" id="quotation_night" placeholder="Night" value="1">Night
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
							<div class="form-group input-transport">
							  <label for="route_1" class="control-label col-md-1 no-pad-r">Day 1</label>
							  <div class="col-md-5">								
								<?php echo $route->_combobox('route_1'); ?>
							  </div>
							</div>              
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
																			
										<div class="form-group hotel_type1 input-hotel1_1">
											<label id="hotel_lb_1_1" class="control-label col-md-1 no-pad-r">D1</label>
											<div class="col-md-4 no-pad-r" style="margin-right: 5px;">
												<?php echo $hotel->_combobox('hotel_cb_1_1',"","SD"); ?>
											</div>
											
										</div>										
									
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
									<div class="form-group hotel_type2 input-hotel2_1">
									  <label id="hotel_lb_2_1" class="control-label col-md-1 no-pad-r">D1</label>
									  <div class="col-md-4 no-pad-r" style="margin-right: 5px;">
									  <?php echo $hotel->_combobox('hotel_cb_2_1',"","DX"); ?>
									  </div>
									  
									</div>									
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
									<div class="form-group hotel_type3 input-hotel3_1">
									  <label id="hotel_lb_3_1" class="control-label col-md-1 no-pad-r">D1</label>
									  <div class="col-md-4 no-pad-r" style="margin-right: 5px;">
									  <?php echo $hotel->_combobox('hotel_cb_3_1',"","BD"); ?>
									  </div>
									  
									</div>									
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
							<div class="form-group input-entrance">							
								<label for="entrance_1" class="control-label col-md-1 no-pad-r">Day 1</label>
								<div class="col-md-8">
								<?php echo $entrance->_combobox('entrance_1'); ?>							
								</div>
						</div>              
							
							<div class="form-group group-btn-entrance">
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
								<tr class="list-of-meal">
								  <td align='right'>
									<label class='control-label'>D1</label>
								  </td>
								  <td><?php echo $restaurant->_comboboxMeal('restaurant_1_1'); ?></td>
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
	<!------------------RUNDOWN--------------------->
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
								  <div class='panel' id='run_1'>
								  <div class='form-group'>
									<label id="runday_1" class='control-label col-md-5 no-pad-l' style='text-align: left; margin-left: 5px;'>D1 : </label>
								  </div>
								 
								  <div id='wrapperTime1'>
									<div class='form-group'>
									  <div class='col-md-1 no-pad-r no-pad-l' style='margin-left: 5px;'>
										<input name='qtimeStart_11' type='text' class='form-control' id='qtimeStart_11'>
									  </div>
									  <label class='control-label col-md-1 no-pad-l no-pad-r' style='margin-right:5px; width: 10px;'>-</label>
									  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right: 5px;'>
										<input name='qtimeEnd_11' type='text' class='form-control' id='qtimeEnd_11'>
									  </div>
									  <div class='col-md-4 no-pad-l'>
										<input name='qremark_11' type='text' class='form-control' id='qremark_11'>
									  </div>
								  
									  <div class='col-md-1 no-pad-l no-pad-r' style='margin-right:5px;'>										
										<button id='btnAddTime11' type='button' class='btn btn-success' style='margin-right:5px;' onclick='addTime(this,1,2)'>
										<span class='glyphicon glyphicon-plus'></span>										
									  </div>
									</div>
									</div>								              
								</div>              							
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
