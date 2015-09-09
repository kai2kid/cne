      <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="panel-title">Update Location</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" action="location_updating" method="post">
          <div class="form-group">
            <label for="location_code" class="control-label col-md-3 no-pad-r">Code</label>
            <div class="col-md-5">
              <input name="location_code" type="text" class="form-control" id="location_code" value="<?php echo $data['location_code']; ?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="location_name" class="control-label col-md-3 no-pad-r">Name</label>
            <div class="col-md-5">
              <input name="location_name" type="text" class="form-control" id="location_name" placeholder="Name" value="<?php echo $data['location_name']; ?>">
            </div>
          </div>     		
          <div class="form-group">
            <label for="location_name_korean" class="control-label col-md-3 no-pad-r">Korean Name</label>
            <div class="col-md-5">
              <input name="location_name_korean" type="text" class="form-control" id="location_name_korean" placeholder="&#51060;&#47492;" value="<?php echo $data['location_name_korean']; ?>">
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