<div class="panel-heading">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 class="panel-title">Add Location</h3>
</div>
<div class="panel-body">
  <form class="form-horizontal" action="location_inserting" method="post">
    <div class="form-group">
      <label for="location_name" class="control-label col-md-3 no-pad-r">Name</label>
      <div class="col-md-5">
        <input name="location_name" type="text" class="form-control" id="location_name" placeholder="Name">
      </div>
    </div>      
    <div class="form-group">
      <label for="location_name_korean" class="control-label col-md-3 no-pad-r">Korean Name</label>
      <div class="col-md-5">
        <input name="location_name_korean" type="text" class="form-control" id="location_name_korean" placeholder="이름">
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
