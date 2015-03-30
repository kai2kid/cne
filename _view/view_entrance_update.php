      <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="panel-title">Update entrance</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" action="entrance_updating" method="post">
          <div class="form-group">
            <label for="entrance_code" class="control-label col-md-3 no-pad-r">Code</label>
            <div class="col-md-5">
              <input name="entrance_code" type="text" class="form-control" id="entrance_code" value="<?php echo $data['entrance_code']; ?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="entrance_name" class="control-label col-md-3 no-pad-r">Name</label>
            <div class="col-md-5">
              <input name="entrance_name" type="text" class="form-control" id="entrance_name" placeholder="Name" value="<?php echo $data['entrance_name']; ?>">
            </div>
          </div>     			  
          <div class="form-group">
            <label for="entrance_phone" class="control-label col-md-3 no-pad-r">Contact Number</label>
            <div class="col-md-3 no-pad-r" style="padding-right:5px;">
              <input name="entrance_phone" type="text" class="form-control" id="entrance_phone" placeholder="Handphone" value="<?php echo $data['entrance_phone']; ?>">
            </div>       
			<div class="col-md-3 no-pad-l">
				<input name="entrance_fax" type="text" class="form-control" id="entrance_fax" placeholder="Fax" value="<?php echo $data['entrance_fax']; ?>">
			</div> 				
          </div>                    
          <div class="form-group">
			  <label for="entrance_website" class="control-label col-md-3 no-pad-r">Website</label>
			  <div class="col-md-5">
				<input name="entrance_website" type="text" class="form-control" id="entrance_website" placeholder="Website" value="<?php echo $data['entrance_website']; ?>">
			  </div>
		  </div>             
          <div class="form-group">
            <label for="entrance_email" class="control-label col-md-3 no-pad-r">Email</label>
            <div class="col-md-5">
              <input name="entrance_email" type="email" class="form-control" id="entrance_email" placeholder="Email" value="<?php echo $data['entrance_email']; ?>">
            </div>            
          </div>          
          <div class="form-group">
            <label for="entrance_address" class="control-label col-md-3 no-pad-r">Address</label>
            <div class="col-md-6" style="padding-right: 5px;">
              <input name="entrance_address" type="text" class="form-control" id="entrance_address" placeholder="Address" value="<?php echo $data['entrance_address']; ?>">
            </div>            
            <div class="col-md-2 no-pad-l">
              <input name="entrance_postal" type="text" class="form-control" id="entrance_postal" placeholder="Postal" value="<?php echo $data['entrance_postal']; ?>">
            </div>  
          </div>
          <div class="form-group">
            <label for="entrance_country" class="control-label col-md-3 no-pad-r">&nbsp;</label>
            <div class="col-md-4 no-pad-r" style="padding-right:5px;">
              <input name="entrance_country" type="text" class="form-control" id="entrance_country" placeholder="Country" value="<?php echo $data['entrance_country']; ?>">
            </div>    
			<div class="col-md-4 no-pad-l">
              <input name="entrance_city" type="text" class="form-control" id="entrance_city" placeholder="City" value="<?php echo $data['entrance_city']; ?>">
            </div> 
          </div> 
		  <div class="form-group">
			  <label for="entrance_location" class="control-label col-md-3 no-pad-r">Location</label>
			  <div class="col-md-3">
				<input name="entrance_location" type="text" class="form-control" id="entrance_location" placeholder="Location" value="<?php echo $data['entrance_location']; ?>">        
			  </div>            
			</div>	
		  <div class="form-group">
			  <label for="entrance_hour_open" class="control-label col-md-3 no-pad-r">Opening Time</label>
			  <div class="col-md-1 no-pad-r" style="padding-right: 5px;">
				<input name="entrance_hour_open" type="time" class="form-control" id="entrance_hour_open" placeholder="Opening Time" value="<?php echo $data['entrance_hour_open']; ?>">                
			  </div>  
				<div class="col-md-1 no-pad-l">
				<input name="entrance_hour_close" type="time" class="form-control" id="entrance_hour_close" placeholder="Closing Time" value="<?php echo $data['entrance_hour_close']; ?>">                
			  </div> 	  
			</div>	  
			<div class="form-group">
			  <label for="entrance_currency" class="control-label col-md-3 no-pad-r">Currency</label>
			  <div class="col-md-2">
				<input name="entrance_currency" type="text" class="form-control" id="entrance_currency" placeholder="Currency" value="<?php echo $data['entrance_currency']; ?>">				
			  </div>            
			</div>
		  <div class="form-group">
			  <label for="entrance_memo" class="control-label col-md-3 no-pad-r">Memo</label>
			  <div class="col-md-8">
				<textarea name="entrance_memo" class="form-control" id="entrance_memo" placeholder="Memo"><?php echo $data['entrance_memo']; ?></textarea>      				
			  </div>            
			</div>
			<div class="form-group">
			  <label for="entrance_description" class="control-label col-md-3 no-pad-r">Description</label>
			  <div class="col-md-8">
				<textarea name="entrance_description" class="form-control" id="entrance_description" placeholder="Memo"><?php echo $data['entrance_description']; ?></textarea>      				
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