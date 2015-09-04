<div class="panel-heading">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 class="panel-title">Add Staff</h3>
</div>
<div class="panel-body">
  <form class="form-horizontal" action="staff_inserting" method="post" enctype="multipart/form-data">
    <div class="row">
		<div class="col-md-8" style="margin-left: 13px;">
			<div class="form-group">
			  <label for="staff_name" class="control-label col-md-4 no-pad-r">Name</label>
			  <div class="col-md-6">
				<input name="staff_name" type="text" class="form-control" id="staff_name" placeholder="Name">
			  </div>
			</div>
			<div class="form-group">
			  <label for="staff_name_korean" class="control-label col-md-4 no-pad-r">Korean Name</label>
			  <div class="col-md-6">
				<input name="staff_name_korean" type="text" class="form-control" id="staff_name_korean" placeholder="이름">
			  </div>
			</div>
			<div class="form-group">
			  <label for="staff_position" class="control-label col-md-4 no-pad-r">Position</label>
			  <div class="col-md-5">
				<select name="staff_position" class="form-control min-padding" id="staff_position">
				  <option selected="selected">Marketing</option>
				  <option>Marketing</option>
				</select>
			  </div>
			</div>
			<div class="form-group">
			  <label for="staff_id_no" class="control-label col-md-4 no-pad-r">ID Number</label>
			  <div class="col-md-6">
				<input name="staff_id_no" type="text" class="form-control" id="staff_id_no" placeholder="ID Number">
			  </div>
			</div>
			<div class="form-group">
			  <label for="staff_hp" class="control-label col-md-4 no-pad-r">Contact Number</label>
			  <div class="col-md-4">
				<input name="staff_hp" type="text" class="form-control" id="staff_hp" placeholder="Handphone">
			  </div>            
			</div>
		</div>
		<div class="col-md-3">
			<img class="img-photo" src="<?php echo _PATH_IMAGE?>user.png" height="150px" >
			<span class="btn btn-default btn-file">
				Browse <input type="file" name="photo">
			</span>
		</div>
	</div>
    
    <div class="form-group">
      <label for="staff_phone" class="control-label col-md-3">&nbsp;</label>
      <div class="col-md-3">
        <input name="staff_phone" type="text" class="form-control" id="staff_phone" placeholder="Phone">
      </div>            
    </div>
    <div class="form-group">
      <label for="staff_fax" class="control-label col-md-3">&nbsp;</label>
      <div class="col-md-3">
        <input name="staff_fax" type="text" class="form-control" id="staff_fax" placeholder="Fax">
      </div>            
    </div>
    <div class="form-group">
      <label for="staff_bank_name" class="control-label col-md-3 no-pad-r">Bank Account</label>
      <div class="col-md-4" style="padding-right:5px;">
        <input name="staff_bank_name" type="text" class="form-control" id="staff_bank_name" placeholder="Bank Name">
      </div>
      <div class="col-md-4 no-pad-l">
        <input name="staff_bank_account" type="text" class="form-control" id="staff_bank_account" placeholder="Account Number">
      </div>              
    </div>          
    <div class="form-group">
      <label for="staff_email" class="control-label col-md-3 no-pad-r">Email</label>
      <div class="col-md-5">
        <input name="staff_email" type="email" class="form-control" id="staff_email" placeholder="Email">
      </div>            
    </div>
    <div class="form-group">
      <label for="staff_password" class="control-label col-md-3 no-pad-r">Password</label>
      <div class="col-md-5">
        <input name="staff_password" type="password" class="form-control" id="staff_password" placeholder="Password">
      </div>            
    </div>
    <div class="form-group">
      <label for="staff_address" class="control-label col-md-3 no-pad-r">Address</label>
      <div class="col-md-6" style="padding-right: 5px;">
        <input name="staff_address" type="text" class="form-control" id="staff_address" placeholder="Address">
      </div>            
      <div class="col-md-2 no-pad-l">
        <input name="staff_postal" type="text" class="form-control" id="staff_postal" placeholder="Postal">
      </div>  
    </div>
    <div class="form-group">
      <label for="staff_country" class="control-label col-md-3 no-pad-r">&nbsp;</label>
      <div class="col-md-4 no-pad-r" style="padding-right:5px;">
        <input name="staff_country" type="text" class="form-control" id="staff_country" placeholder="Country">
      </div>   
	  <div class="col-md-4 no-pad-l">
        <input name="staff_city" type="text" class="form-control" id="staff_city" placeholder="City">
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
