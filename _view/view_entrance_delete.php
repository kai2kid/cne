<div class="panel-heading">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 class="panel-title">Delete entrance</h3>
</div>
<div class="panel-body">
  <form class="form-horizontal" action="entrance_deleting" method="post">
    <div class="form-group">
      <label for="entrance_code" class="control-label col-md-6 no-pad-r">Do you really want to delete </label>
      <div class="col-md-3">
        <input name="entrance_code" type="text" class="form-control" id="entrance_code" value="<?php echo $data['entrance_code']; ?>" readonly>
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