<div class="bs-callout bs-callout-info">
  <div class="collapse navbar-collapse" style="padding-left:0px;">
    <label class="title">Add Quotation</label>
	
<!-- INI START FORM -->	
	
	<form class="form-horizontal" action="quotation_insertHeader" method="post">
		<div class="form-group">
		  <label for="quotation_name" class="control-label col-md-1 no-pad-r">Title</label>
		  <div class="col-md-3">
			<input name="quotation_name" type="text" class="form-control" id="quotation_name" placeholder="Name">
		  </div>
		</div>
		<div class="form-group">
		  <label for="quotation_day" class="control-label col-md-1 no-pad-r">Duration</label>
		  <div class="col-md-1 no-pad-r" style="margin-right: 5px;">
			<input name="quotation_day" type="text" class="form-control" id="quotation_day" placeholder="Day" value="0">Day
		  </div>		  
		  <div class="col-md-1 no-pad-l">
			<input name="quotation_night" type="text" class="form-control" id="quotation_night" placeholder="Night" value="0">Night
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
						<form name="formInsertTransport" id="formInsertTransport" class="form-horizontal" action="quotation_insertTransport" method="post">
							<div class="form-group">
							  <label for="qtransport_start" class="control-label col-md-1 no-pad-r">Arrive To</label>
							  <div class="col-md-3">
								<input name="qtransport_start" type="text" class="form-control" id="qtransport_start">
							  </div>
							</div>

							<div class="form-group group-btn-transport">
								<label class="control-label col-md-8">&nbsp;</label>
								<div class="col-md-1 no-pad-r" style="margin-right: 5px">
									<input type="submit" class="btn btn-primary btn-block" value="Save">
								</div>  
								<div class="col-md-2 no-pad-l">
									<input type="button" class="btn btn-default btn-block" value="Add Price" onclick="navigate('quotation_formInsertPriceTransport')">
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
							<form name="formInsertHotel1" id="formInsertHotel1" class="form-horizontal" action="quotation_insertHotel" method="post">
								<div class="form-group">
								  <label for="qhotel_type1" class="control-label col-md-1 no-pad-r">Type 1</label>
								  <div class="col-md-3">
									<input name="qhotel_type1" type="text" class="form-control" id="qhotel_type1" value="SUPER DELUXE HOTEL">
								  </div>
								</div>
								<!-- list per night -->
								<div class="form-group input-hotel1">
									<label for="qhotel_type11_cb" class="control-label col-md-1 no-pad-r">D1</label>
									<div class="col-md-4 no-pad-r" style="margin-right: 5px;">
										<select name="qhotel_type11_cb" class="form-control min-padding" id="qhotel_type11_cb">
										  <option selected="selected">Suwon Bloom Vista</option>
										  <option>Summit Or Jamsung</option>
										</select>
									</div>
									<div class="col-md-1 no-pad-l no-pad-r" style="margin-right:5px;">
										<input name="qhotel_type11_night" type="text" class="form-control" id="qhotel_type11_night" placeholder="Night" onchange="changeHotel(1)">									
									</div>
									
								</div>
								
							</form>
							<hr>
							<form name="formInsertHotel2" id="formInsertHotel2" class="form-horizontal" action="quotation_insertHotel" method="post">
								<div class="form-group">
								  <label for="qhotel_type2" class="control-label col-md-1 no-pad-r">Type 2</label>
								  <div class="col-md-3">
									<input name="qhotel_type2" type="text" class="form-control" id="qhotel_type2" value="DELUXE HOTEL">
								  </div>
								</div>
								<!-- list per night -->
								<div class="form-group input-hotel2">
								  <label for="qhotel_type21_cb" class="control-label col-md-1 no-pad-r">D1</label>
								  <div class="col-md-4 no-pad-r" style="margin-right: 5px;">
									<select name="qhotel_type21_cb" class="form-control min-padding" id="qhotel_type21_cb">
									  <option selected="selected">Suwon Bloom Vista</option>
									  <option>Summit Or Jamsung</option>
									</select>
								  </div>
								  <div class="col-md-1 no-pad-l">
									<input name="qhotel_type21_night" type="text" class="form-control" id="qhotel_type21_night" placeholder="Night" onchange="changeHotel(2)">
								  </div>
								</div>								
							</form>
							<hr>
							<form name="formInsertHotel3" id="formInsertHotel3" class="form-horizontal" action="quotation_insertHotel" method="post">
								<div class="form-group">
								  <label for="qhotel_type3" class="control-label col-md-1 no-pad-r">Type 3</label>
								  <div class="col-md-3">
									<input name="qhotel_type3" type="text" class="form-control" id="qhotel_type3" value="BUDGET HOTEL">
								  </div>
								</div>
								<!-- list per night -->
								<div class="form-group input-hotel3">
								  <label for="qhotel_type31_cb" class="control-label col-md-1 no-pad-r">D1</label>
								  <div class="col-md-4 no-pad-r" style="margin-right: 5px;">
									<select name="qhotel_type31_cb" class="form-control min-padding" id="qhotel_type31_cb">
									  <option selected="selected">Suwon Bloom Vista</option>
									  <option>Summit Or Jamsung</option>
									</select>
								  </div>
								  <div class="col-md-1 no-pad-l">
									<input name="qhotel_type31_night" type="text" class="form-control" id="qhotel_type31_night" placeholder="Night" onchange="changeHotel(3)">
								  </div>
								</div>								
							</form>
							<div class="form-group group-btn-hotel">
								<label class="control-label col-md-8">&nbsp;</label>
								<div class="col-md-1 no-pad-r" style="margin-right: 5px">
									<input type="submit" class="btn btn-primary btn-block" value="Save">
								</div>  
								<div class="col-md-2 no-pad-l">
									<input type="button" class="btn btn-default btn-block" value="Add Price" onclick="navigate('quotation_formInsertPriceHotel')">
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-10 s-h-quotation">
				<div class="panel panel-default quotation-panel">
					<div class="panel-heading">
						<h3 class="panel-title">ENTERANCE</h3>
						<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-down"></i></span>
					</div>
					<div class="panel-body quotation-body">
						1
					</div>
				</div>
			</div>		
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-10 s-h-quotation">
				<div class="panel panel-default quotation-panel">
					<div class="panel-heading">
						<h3 class="panel-title">MEAL</h3>
						<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-down"></i></span>
					</div>
					<div class="panel-body quotation-body">
						1
					</div>
				</div>
			</div>		
		</div>
	</div>

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

	<div class="container">
		<div class="row">
			<div class="col-md-10 s-h-quotation">
				<div class="panel panel-default quotation-panel">
					<div class="panel-heading">
						<h3 class="panel-title">RUNDOWN</h3>
						<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-down"></i></span>
					</div>
					<div class="panel-body quotation-body">
						1
					</div>
				</div>
			</div>		
		</div>
	</div>
</div>