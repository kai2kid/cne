<div class="panel-heading">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 class="panel-title">Add Ticket</h3>
</div>
<div class="panel-body">
  <form class="form-horizontal" action="dentrance_inserting" method="post">  	
  <input type="hidden" name="entrance_code" value="<?php echo $model->dataParent["entrance_code"]; ?>">
	<div class="form-group">
      <label for="ticket_name" class="control-label col-md-3 no-pad-r">Name</label>
      <div class="col-md-5">
        <input name="ticket_name" type="text" class="form-control" id="ticket_name" placeholder="Name">
      </div>
    </div>    		    	               
	<div class="form-group">
      <label for="ticket_price" class="control-label col-md-3 no-pad-r">Price</label>
      <div class="col-md-3">
        <input name="ticket_price" type="number" class="form-control" id="ticket_price" placeholder="Price">        
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
