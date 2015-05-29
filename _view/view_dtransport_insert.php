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
      <select name="vehicle_type" class="form-control min-padding" id="vehicle_type">
        <?php foreach ($type as $data) { ?>
        <option value="<?php echo $data['type_id']; ?>"><?php echo $data['type_name'] . " (". $data['type_capacity'].")"?></option>
        <?php } ?>
      </select>
    </div>
  </div>    		    
	<div class="form-group">
      <label for="vehicle_location" class="control-label col-md-3 no-pad-r">Location</label>
      <div class="col-md-3">
        <?php echo $cb_location; ?>
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
