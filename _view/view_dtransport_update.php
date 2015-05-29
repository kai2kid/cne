<div class="panel-heading">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 class="panel-title">Update Vehicle</h3>
</div>
<div class="panel-body">
  <form class="form-horizontal" action="dtransport_updating" method="post">
    <input type="hidden" name="transport_code" value="<?php echo $data["transport_code"]; ?>" >
    <input type="hidden" name="vehicle_code" value="<?php echo $data["vehicle_code"]; ?>" >
    <div class="form-group">
      <label for="vehicle_name" class="control-label col-md-3 no-pad-r">Name</label>
      <div class="col-md-5">        
        <select name="vehicle_type" class="form-control min-padding" id="vehicle_type">
          <?php foreach ($type as $row) { ?>
          <option value="<?php echo $row['type_id']; ?>" <?php echo ($data['vehicle_type'] == $row['type_id'] ? " selected" : ""); ?>><?php echo $row['type_name'] . " (". $row['type_capacity'].")"; ?></option>
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
        <input type="submit" class="btn btn-success btn-block" value="Update">
      </div>            
    </div>
  </form>
</div>	 