      <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="panel-title">Update Staff</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" action="staff_updating" method="post">
          <div class="form-group">
            <label for="staff_code" class="control-label col-md-3 no-pad-r">Code</label>
            <div class="col-md-5">
              <input name="staff_code" type="text" class="form-control" id="staff_code" value="<?php echo $data['staff_code']; ?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="staff_name" class="control-label col-md-3 no-pad-r">Name</label>
            <div class="col-md-5">
              <input name="staff_name" type="text" class="form-control" id="staff_name" placeholder="Name" value="<?php echo $data['staff_name']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="staff_position" class="control-label col-md-3 no-pad-r">Position</label>
            <div class="col-md-4">
              <select name="staff_position" class="form-control min-padding" id="staff_position">
                <option selected="selected">Accountant</option>
                <option>Marketing</option>                
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="staff_id_no" class="control-label col-md-3 no-pad-r">ID Number</label>
            <div class="col-md-5">
              <input name="staff_id_no" type="text" class="form-control" id="staff_id_no" placeholder="ID Number" value="<?php echo $data['staff_id_no']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="staff_hp" class="control-label col-md-3 no-pad-r">Contact Number</label>
            <div class="col-md-3 no-pad-r" style="padding-right: 5px;">
              <input name="staff_hp" type="text" class="form-control" id="staff_hp" placeholder="Handphone" value="<?php echo $data['staff_hp']; ?>">
            </div> 				
          </div>   
          <div class="form-group">
			  <label for="staff_phone" class="control-label col-md-3">&nbsp;</label>
			  <div class="col-md-3">
				<input name="staff_phone" type="text" class="form-control" id="staff_phone" placeholder="Phone" value="<?php echo $data['staff_phone']; ?>">
			  </div>            
			</div>		  
          <div class="form-group">
            <label for="staff_fax" class="control-label col-md-3">&nbsp;</label>
            <div class="col-md-3">
              <input name="staff_fax" type="text" class="form-control" id="staff_fax" placeholder="Fax" value="<?php echo $data['staff_fax']; ?>">
            </div>            
          </div>
          <div class="form-group">
            <label for="staff_bank_name" class="control-label col-md-3 no-pad-r">Bank Account</label>
            <div class="col-md-4" style="padding-right:5px;">
              <input name="staff_bank_name" type="text" class="form-control" id="staff_bank_name" placeholder="Bank Name" value="<?php echo $data['staff_bank_name']; ?>">
            </div>
            <div class="col-md-4 no-pad-l">
              <input name="staff_bank_account" type="text" class="form-control" id="staff_bank_account" placeholder="Account Number" value="<?php echo $data['staff_bank_account']; ?>">
            </div>              
          </div>          
          <div class="form-group">
            <label for="staff_email" class="control-label col-md-3 no-pad-r">Email</label>
            <div class="col-md-5">
              <input name="staff_email" type="email" class="form-control" id="staff_email" placeholder="Email" value="<?php echo $data['staff_email']; ?>">
            </div>            
          </div>
          <div class="form-group">
            <label for="staff_password" class="control-label col-md-3 no-pad-r">Password</label>
            <div class="col-md-5">
              <input name="staff_password" type="password" class="form-control" id="staff_password" placeholder="Password" value="<?php echo $data['staff_password']; ?>">
            </div>            
          </div>
          <div class="form-group">
            <label for="staff_address" class="control-label col-md-3 no-pad-r">Address</label>
            <div class="col-md-6" style="padding-right: 5px;">
              <input name="staff_address" type="text" class="form-control" id="staff_address" placeholder="Address" value="<?php echo $data['staff_address']; ?>">
            </div>            
            <div class="col-md-2 no-pad-l">
              <input name="staff_postal" type="text" class="form-control" id="staff_postal" placeholder="Postal" value="<?php echo $data['staff_postal']; ?>">
            </div>  
          </div>
		  <div class="form-group">
			  <label for="staff_country" class="control-label col-md-3 no-pad-r">&nbsp;</label>
			  <div class="col-md-4 no-pad-r" style="padding-right:5px;">
				<input name="staff_country" type="text" class="form-control" id="staff_country" placeholder="Country" value="<?php echo $data['staff_country']; ?>">
			  </div>   
			  <div class="col-md-4 no-pad-l">
				<input name="staff_city" type="text" class="form-control" id="staff_city" placeholder="City" value="<?php echo $data['staff_city']; ?>">
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