<div class="panel-heading">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 class="panel-title">Add Vehicle</h3>
</div>
<div class="panel-body">
  <form class="form-horizontal" action="dtransport_inserting" method="post">  	
  <input type="hidden" name="transport_code" value="<?php echo $model->dataParent["transport_code"]; ?>">
	<div class="form-group">
      <label for="vehicle_name" class="control-label col-md-3 no-pad-r">Name</label>
      <div class="col-md-5">
        <input name="vehicle_name" type="text" class="form-control" id="vehicle_name" placeholder="Name">
      </div>
    </div>    		    
	 <div class="form-group">
      <label for="vehicle_type" class="control-label col-md-3 no-pad-r">Type</label>
      <div class="col-md-5">
        <input name="vehicle_type" type="text" class="form-control" id="vehicle_type" placeholder="Type">
      </div>
    </div>                   
	<div class="form-group">
      <label for="vehicle_price_low" class="control-label col-md-3 no-pad-r">Low Price</label>
      <div class="col-md-3">
        <input name="vehicle_price_low" type="number" class="form-control" id="vehicle_price_low" placeholder="Low Price">        
      </div>            
    </div>	
	<div class="form-group">
      <label for="vehicle_price_high" class="control-label col-md-3 no-pad-r">High Price</label>
      <div class="col-md-3">
        <input name="vehicle_price_high" type="number" class="form-control" id="vehicle_price_high" placeholder="High Price">        
      </div>            
    </div>	
    <div class="form-group">
      <label class="control-label col-md-9">&nbsp;</label>
      <div class="col-md-2">
        <input type="submit" class="btn btn-primary btn-block" value="Save">
      </div>            
    </div>    
  </form>
</div>
