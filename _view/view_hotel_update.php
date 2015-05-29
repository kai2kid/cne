      <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="panel-title">Update Hotel</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" action="hotel_updating" method="post">
          <div class="form-group">
            <label for="hotel_code" class="control-label col-md-3 no-pad-r">Code</label>
            <div class="col-md-5">
              <input name="hotel_code" type="text" class="form-control" id="hotel_code" value="<?php echo $data['hotel_code']; ?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="hotel_name" class="control-label col-md-3 no-pad-r">Name</label>
            <div class="col-md-5">
              <input name="hotel_name" type="text" class="form-control" id="hotel_name" placeholder="Name" value="<?php echo $data['hotel_name']; ?>">
            </div>
          </div>     	
          <div class="form-group">
            <label for="hotel_name_korean" class="control-label col-md-3 no-pad-r">Korean Name</label>
            <div class="col-md-5">
              <input name="hotel_name_korean" type="text" class="form-control" id="hotel_name_korean" placeholder="이름" value="<?php echo $data['hotel_name_korean']; ?>">
            </div>
          </div>      
		  <div class="form-group">
			  <label for="hotel_level" class="control-label col-md-3 no-pad-r">Level</label>
			  <div class="col-md-3">		
				<select name="hotel_level" id="hotel_level" class="form-control selectpicker">
					<option value="1" data-content="<img src='<?php echo _PATH_IMAGE; ?>star1.gif'>" <?php if ($data['hotel_level']=="1") echo " selected";?>></option>
					<option value="2" data-content="<img src='<?php echo _PATH_IMAGE; ?>star2.gif'>" <?php if ($data['hotel_level']=="2") echo " selected";?>></option>
					<option value="3" data-content="<img src='<?php echo _PATH_IMAGE; ?>star3.gif'>" <?php if ($data['hotel_level']=="3") echo " selected";?>></option>
					<option value="4" data-content="<img src='<?php echo _PATH_IMAGE; ?>star4.gif'>" <?php if ($data['hotel_level']=="4") echo " selected";?>></option>
					<option value="5" data-content="<img src='<?php echo _PATH_IMAGE; ?>star5.gif'>" <?php if ($data['hotel_level']=="5") echo " selected";?>></option>
				</select> 	  
			  </div>	  
			</div>    	
          <div class="form-group">
            <label for="hotel_phone" class="control-label col-md-3 no-pad-r">Contact Number</label>
            <div class="col-md-3 no-pad-r" style="padding-right:5px;">
              <input name="hotel_phone" type="text" class="form-control" id="hotel_phone" placeholder="Handphone" value="<?php echo $data['hotel_phone']; ?>">
            </div>       
			<div class="col-md-3 no-pad-l">
				<input name="hotel_fax" type="text" class="form-control" id="hotel_fax" placeholder="Fax" value="<?php echo $data['hotel_fax']; ?>">
			</div> 				
          </div>                    
          <div class="form-group">
			  <label for="hotel_website" class="control-label col-md-3 no-pad-r">Website</label>
			  <div class="col-md-5">
				<input name="hotel_website" type="text" class="form-control" id="hotel_website" placeholder="Website" value="<?php echo $data['hotel_website']; ?>">
			  </div>
		  </div>             
          <div class="form-group">
            <label for="hotel_email" class="control-label col-md-3 no-pad-r">Email</label>
            <div class="col-md-5">
              <input name="hotel_email" type="email" class="form-control" id="hotel_email" placeholder="Email" value="<?php echo $data['hotel_email']; ?>">
            </div>            
          </div>          
          <div class="form-group">
            <label for="hotel_address" class="control-label col-md-3 no-pad-r">Address</label>
            <div class="col-md-6" style="padding-right: 5px;">
              <input name="hotel_address" type="text" class="form-control" id="hotel_address" placeholder="Address" value="<?php echo $data['hotel_address']; ?>">
            </div>            
            <div class="col-md-2 no-pad-l">
              <input name="hotel_postal" type="text" class="form-control" id="hotel_postal" placeholder="Postal" value="<?php echo $data['hotel_postal']; ?>">
            </div>  
          </div>
        <div class="form-group">
          <label for="hotel_country" class="control-label col-md-3 no-pad-r">&nbsp;</label>
          <div class="col-md-4 no-pad-r" style="padding-right:5px;">
            <!--<input name="hotel_country" type="text" class="form-control" id="hotel_country" placeholder="Country">-->
            <?php echo $cb_location; ?>
          </div>
        </div>   
		  <div class="form-group">
			  <label for="hotel_rooms" class="control-label col-md-3 no-pad-r">Number of Room</label>
			  <div class="col-md-3">
				<input name="hotel_rooms" type="number" class="form-control" id="hotel_rooms" placeholder="Number of Room" value="<?php echo $data['hotel_rooms']; ?>">        
			  </div>            
			</div>		  
			<div class="form-group">
			  <label for="hotel_currency" class="control-label col-md-3 no-pad-r">Currency</label>
			  <div class="col-md-2">
				<input name="hotel_currency" type="text" class="form-control" id="hotel_currency" placeholder="Currency" value="<?php echo $data['hotel_currency']; ?>">				
			  </div>            
			</div>
      <div class="form-group">
        <label for="hotel_tax" class="control-label col-md-3 no-pad-r">Tax Rate</label>
        <div class="col-md-2">
          <input name="hotel_tax" type="text" class="form-control" id="hotel_tax" placeholder="Tax" value="<?php echo $data['hotel_tax']; ?>">
        </div>            
      </div>
		  <div class="form-group">
			  <label for="hotel_memo" class="control-label col-md-3 no-pad-r">Memo</label>
			  <div class="col-md-8">
				<textarea name="hotel_memo" class="form-control" id="hotel_memo" placeholder="Memo"><?php echo $data['hotel_memo']; ?></textarea>      				
			  </div>            
  <div class="form-group">
    <label class="control-label col-md-3 no-pad-r">Contact Person</label>
  </div>        
  <div class="form-group">
    <label for="pic_name" class="control-label col-md-3 no-pad-r">Name</label>
    <div class="col-md-5">
      <input name="pic_name" type="text" class="form-control" id="pic_name" placeholder="Name" value="<?php echo $data['pic_name']; ?>">
    </div>            
  </div>
  <div class="form-group">
    <label for="pic_position" class="control-label col-md-3 no-pad-r">Position</label>
    <div class="col-md-3">
      <input name="pic_position" type="text" class="form-control" id="pic_position" placeholder="Position" value="<?php echo $data['pic_position']; ?>">
    </div>            
  </div>
  <div class="form-group">
    <label for="pic_phone" class="control-label col-md-3 no-pad-r">Phone</label>
    <div class="col-md-3">
      <input name="pic_phone" type="text" class="form-control" id="pic_phone" placeholder="Phone" value="<?php echo $data['pic_phone']; ?>">
    </div>            
  </div>
  <div class="form-group">
    <label for="pic_email" class="control-label col-md-3 no-pad-r">Email</label>
    <div class="col-md-4">
      <input name="pic_email" type="email" class="form-control" id="pic_email" placeholder="Email" value="<?php echo $data['pic_email']; ?>">
    </div>            
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
	  
	  <script>
		$(document).ready(function(){
			$('.selectpicker').selectpicker('render');		
		});
	  
	  </script>