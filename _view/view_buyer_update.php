      <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="panel-title">Update Buyer</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" action="buyer_updating" method="post">
          <div class="form-group">
            <label for="buyer_code" class="control-label col-md-3 no-pad-r">Code</label>
            <div class="col-md-5">
              <input name="buyer_code" type="text" class="form-control" id="buyer_code" value="<?php echo $data['buyer_code']; ?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="buyer_name" class="control-label col-md-3 no-pad-r">Name</label>
            <div class="col-md-5">
              <input name="buyer_name" type="text" class="form-control" id="buyer_name" placeholder="Name" value="<?php echo $data['buyer_name']; ?>">
            </div>
          </div>     
		<div class="form-group">
		  <label for="buyer_type" class="control-label col-md-3 no-pad-r">Type</label>
		  <div class="col-md-4">
			<select name="buyer_type" class="form-control min-padding" id="buyer_type">
			  <option value="1" selected="selected">Company</option>
			  <option value="2">Personal</option>
			</select>
		  </div>
		</div>   	        
          <div class="form-group">
            <label for="buyer_phone" class="control-label col-md-3 no-pad-r">Contact Number</label>
            <div class="col-md-3">
              <input name="buyer_phone" type="text" class="form-control" id="buyer_phone" placeholder="Handphone" value="<?php echo $data['buyer_phone']; ?>">
            </div>            
          </div>          
          <div class="form-group">
            <label for="buyer_fax" class="control-label col-md-3">&nbsp;</label>
            <div class="col-md-3">
              <input name="buyer_fax" type="text" class="form-control" id="buyer_fax" placeholder="Fax" value="<?php echo $data['buyer_fax']; ?>">
            </div>            
          </div>
          <div class="form-group">
			  <label for="buyer_website" class="control-label col-md-3 no-pad-r">Website</label>
			  <div class="col-md-5">
				<input name="buyer_website" type="text" class="form-control" id="buyer_website" placeholder="Website" value="<?php echo $data['buyer_website']; ?>">
			  </div>
		  </div>             
          <div class="form-group">
            <label for="buyer_email" class="control-label col-md-3 no-pad-r">Email</label>
            <div class="col-md-5">
              <input name="buyer_email" type="email" class="form-control" id="buyer_email" placeholder="Email" value="<?php echo $data['buyer_email']; ?>">
            </div>            
          </div>          
          <div class="form-group">
            <label for="buyer_address" class="control-label col-md-3 no-pad-r">Address</label>
            <div class="col-md-6" style="padding-right: 5px;">
              <input name="buyer_address" type="text" class="form-control" id="buyer_address" placeholder="Address" value="<?php echo $data['buyer_address']; ?>">
            </div>            
            <div class="col-md-2 no-pad-l">
              <input name="buyer_postal" type="text" class="form-control" id="buyer_postal" placeholder="Postal" value="<?php echo $data['buyer_postal']; ?>">
            </div>  
          </div>
          <div class="form-group">
            <label for="buyer_country" class="control-label col-md-3 no-pad-r">&nbsp;</label>
            <div class="col-md-4 no-pad-r" style="padding-right:5px;">
              <input name="buyer_country" type="text" class="form-control" id="buyer_country" placeholder="Country" value="<?php echo $data['buyer_country']; ?>">
            </div>  
            <div class="col-md-4 no-pad-l">
              <input name="buyer_city" type="text" class="form-control" id="buyer_city" placeholder="City" value="<?php echo $data['buyer_city']; ?>">
            </div>  			
          </div>          
		  <div class="form-group">
			  <label for="buyer_memo" class="control-label col-md-3 no-pad-r">Memo</label>
			  <div class="col-md-8">
				<textarea class="form-control" name="buyer_memo" id="buyer_memo" placeholder="Memo"><?php echo $data['buyer_memo']; ?></textarea> 				
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