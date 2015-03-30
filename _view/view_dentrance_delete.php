<div class="panel-heading">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 class="panel-title">Delete Ticket</h3>
</div>
<div class="panel-body">
  <form class="form-horizontal" action="dentrance_deleting" method="post">
    <input type="hidden" name="entrance_code" value="<?php echo $data["entrance_code"]; ?>" >
    <div class="form-group">
      <label for="ticket_code" class="control-label col-md-6 no-pad-r">Do you really want to delete </label>
      <div class="col-md-3">
        <input name="ticket_code" type="text" class="form-control" id="ticket_code" value="<?php echo $data['ticket_code']; ?>" readonly>
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