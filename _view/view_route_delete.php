<div class="panel-heading">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 class="panel-title">Delete Location</h3>
</div>
<div class="panel-body">
  <form class="form-horizontal" action="route_deleting" method="post">
    <div class="form-group">
      <label for="route_code" class="control-label col-md-6 no-pad-r">Do you really want to delete </label>
      <div class="col-md-3">
        <input name="route_code" type="text" class="form-control" id="route_code" value="<?php echo $data['route_code']; ?>" readonly>
      </div>
    </div>          
    <div class="form-group">
      <label for="route_title" class="control-label col-md-3 no-pad-r">Name</label>
      <div class="col-md-5">
        <input name="route_title" type="text" class="form-control" id="route_title" value="<?php echo $data['route_title']; ?>" readonly>
      </div>
    </div>      
    <div class="form-group">
      <label class="control-label col-md-7">&nbsp;</label>
      <div class="col-md-2">
        <input type="submit" id="btnDelete" name="btnDelete" class="btn btn-danger btn-block" value="Yes">              
      </div>            
    </div>
    
  </form>
</div>