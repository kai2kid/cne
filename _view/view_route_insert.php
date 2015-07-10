<div class="panel-heading">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 class="panel-title">Add Route</h3>
</div>
<div class="panel-body">
  <form class="form-horizontal" action="route_inserting" method="post">
    <div class="form-group">
      <label for="route_title" class="control-label col-md-3 no-pad-r">Name</label>
      <div class="col-md-8">
        <input name="route_title" type="text" class="form-control" id="route_title">
      </div>
    </div>      
    <div class="form-group">
      <label for="route_title_korean" class="control-label col-md-3 no-pad-r">Korean</label>
      <div class="col-md-5">
        <input name="route_title_korean" type="text" class="form-control" id="route_title_korean" placeholder="이름">
      </div>
    </div>      
    <!--<div class="form-group">
      <label for="route_start" class="control-label col-md-3 no-pad-r">Start</label>
      <div class="col-md-5">-->
        <input name="route_start" type="hidden" class="form-control" id="route_start" placeholder="Start" readonly>
      <!--</div>
    </div>      
    <div class="form-group">
      <label for="route_end" class="control-label col-md-3 no-pad-r">End</label>
      <div class="col-md-5">-->
        <input name="route_end" type="hidden" class="form-control" id="route_end" placeholder="End" readonly>
      <!--</div>
    </div>-->      
    <div class="form-group">
      <label for="route_path" class="control-label col-md-3 no-pad-r">Path</label>
      <div class="col-md-8">
		    <input type="hidden" name="route_path" id="route_path_code">
        <input type="text" class="form-control" id="route_path" placeholder="Path">
      </div>
    </div>      
<!--
    <div class="form-group">
      <label for="route_mainland" class="control-label col-md-3 no-pad-r">Mainland Path</label>
      <div class="col-md-5">
        <input name="route_mainland" type="text" class="form-control" id="route_mainland" placeholder="Mainland">
      </div>
    </div>      
    <div class="form-group">
      <label for="route_jeju" class="control-label col-md-3 no-pad-r">Jeju Path</label>
      <div class="col-md-5">
        <input name="route_jeju" type="text" class="form-control" id="route_jeju" placeholder="Jeju">
      </div>
    </div>      
-->    
    <div class="form-group">
      <label for="route_cost1" class="control-label col-md-3 no-pad-r">1-4 Pax</label>
      <div class="col-md-5">
        <input name="route_cost1" type="number" class="form-control" id="route_cost1" placeholder="Price">
      </div>
    </div>      
    <div class="form-group">
      <label for="route_cost2" class="control-label col-md-3 no-pad-r">5-9 Pax</label>
      <div class="col-md-5">
        <input name="route_cost2" type="number" class="form-control" id="route_cost2" placeholder="Price">
      </div>
    </div>      
    <div class="form-group">
      <label for="route_cost3" class="control-label col-md-3 no-pad-r">10-14 Pax</label>
      <div class="col-md-5">
        <input name="route_cost3" type="number" class="form-control" id="route_cost3" placeholder="Price">
      </div>
    </div>      
    <div class="form-group">
      <label for="route_cost4" class="control-label col-md-3 no-pad-r">15-19 Pax</label>
      <div class="col-md-5">
        <input name="route_cost4" type="number" class="form-control" id="route_cost4" placeholder="Price">
      </div>
    </div>      
    <div class="form-group">
      <label for="route_cost5" class="control-label col-md-3 no-pad-r">20-42 Pax</label>
      <div class="col-md-5">
        <input name="route_cost5" type="number" class="form-control" id="route_cost5" placeholder="Price">
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
