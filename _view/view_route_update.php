<div class="panel-heading">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 class="panel-title">Update Route</h3>
</div>
<div class="panel-body">
  <form class="form-horizontal" action="route_updating" method="post">
    <input name="route_code" type="hidden" class="form-control" id="route_code" value="<?php echo $data['route_code']; ?>">
    <div class="form-group">
      <label for="route_title" class="control-label col-md-3 no-pad-r">Name</label>
      <div class="col-md-5">
        <input name="route_title" type="text" class="form-control" id="route_title" placeholder="Name" value="<?php echo $data['route_title']; ?>">
      </div>
    </div>      
    <div class="form-group">
      <label for="route_title_korean" class="control-label col-md-3 no-pad-r">Korean</label>
      <div class="col-md-5">
        <input name="route_title_korean" type="text" class="form-control" id="route_title_korean" placeholder="이름" value="<?php echo $data['route_title_korean']; ?>">
      </div>
    </div>      
    <div class="form-group">
      <label for="route_start" class="control-label col-md-3 no-pad-r">Start</label>
      <div class="col-md-5">
        <input name="route_start" type="text" class="form-control" id="route_start" placeholder="Start" value="<?php echo $data['route_start']; ?>">
      </div>
    </div>      
    <div class="form-group">
      <label for="route_end" class="control-label col-md-3 no-pad-r">End</label>
      <div class="col-md-5">
        <input name="route_end" type="text" class="form-control" id="route_end" placeholder="End" value="<?php echo $data['route_end']; ?>">
      </div>
    </div>      
    <div class="form-group">
      <label for="route_path" class="control-label col-md-3 no-pad-r">Path</label>
      <div class="col-md-5">
        <input name="route_path" type="text" class="form-control" id="route_path" placeholder="Path" value="<?php echo $data['route_path']; ?>">
      </div>
    </div>      
<!--    
    <div class="form-group">
      <label for="route_mainland" class="control-label col-md-3 no-pad-r">Mainland Path</label>
      <div class="col-md-5">
        <input name="route_mainland" type="text" class="form-control" id="route_mainland" placeholder="Mainland" value="<?php echo $data['route_mainland']; ?>">
      </div>
    </div>      
    <div class="form-group">
      <label for="route_jeju" class="control-label col-md-3 no-pad-r">Jeju Path</label>
      <div class="col-md-5">
        <input name="route_jeju" type="text" class="form-control" id="route_jeju" placeholder="Jeju" value="<?php echo $data['route_jeju']; ?>">
      </div>
    </div>      
-->
    <div class="form-group">
      <label for="route_cost1" class="control-label col-md-3 no-pad-r">1-4 Pax</label>
      <div class="col-md-5">
        <input name="route_cost1" type="text" class="form-control" id="route_cost1" placeholder="Price" value="<?php echo $data['route_cost1']; ?>">
      </div>
    </div>      
    <div class="form-group">
      <label for="route_cost2" class="control-label col-md-3 no-pad-r">5-9 Pax</label>
      <div class="col-md-5">
        <input name="route_cost2" type="text" class="form-control" id="route_cost2" placeholder="Price" value="<?php echo $data['route_cost2']; ?>">
      </div>
    </div>      
    <div class="form-group">
      <label for="route_cost3" class="control-label col-md-3 no-pad-r">10-14 Pax</label>
      <div class="col-md-5">
        <input name="route_cost3" type="text" class="form-control" id="route_cost3" placeholder="Price" value="<?php echo $data['route_cost3']; ?>">
      </div>
    </div>      
    <div class="form-group">
      <label for="route_cost4" class="control-label col-md-3 no-pad-r">15-19 Pax</label>
      <div class="col-md-5">
        <input name="route_cost4" type="text" class="form-control" id="route_cost4" placeholder="Price" value="<?php echo $data['route_cost4']; ?>">
      </div>
    </div>      
    <div class="form-group">
      <label for="route_cost5" class="control-label col-md-3 no-pad-r">20-42 Pax</label>
      <div class="col-md-5">
        <input name="route_cost5" type="text" class="form-control" id="route_cost5" placeholder="Price" value="<?php echo $data['route_cost5']; ?>">
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