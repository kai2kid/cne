      <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="panel-title">Update Ticket</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" action="dentrance_updating" method="post">
          <input type="hidden" name="entrance_code" value="<?php echo $data["entrance_code"]; ?>" >
          <div class="form-group">
            <label for="ticket_code" class="control-label col-md-3 no-pad-r">Code</label>
            <div class="col-md-5">
              <input name="ticket_code" type="text" class="form-control" id="ticket_code" value="<?php echo $data['ticket_code']; ?>" readonly>
            </div>
          </div>		  
          <div class="form-group">
            <label for="ticket_name" class="control-label col-md-3 no-pad-r">Name</label>
            <div class="col-md-5">
              <input name="ticket_name" type="text" class="form-control" id="ticket_name" placeholder="Name" value="<?php echo $data['ticket_name']; ?>">
            </div>
          </div>     			  			
			<div class="form-group">
			  <label for="ticket_price" class="control-label col-md-3 no-pad-r">Price</label>
			  <div class="col-md-3">
				<input name="ticket_price" type="number" class="form-control" id="ticket_price" placeholder="Price" value="<?php echo $data['ticket_price']; ?>">        
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