      <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="panel-title">Update Restaurant</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" action="restaurant_updating" method="post">
          <div class="form-group">
            <label for="restaurant_code" class="control-label col-md-3 no-pad-r">Code</label>
            <div class="col-md-5">
              <input name="restaurant_code" type="text" class="form-control" id="restaurant_code" value="<?php echo $data['restaurant_code']; ?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="restaurant_name" class="control-label col-md-3 no-pad-r">Name</label>
            <div class="col-md-5">
              <input name="restaurant_name" type="text" class="form-control" id="restaurant_name" placeholder="Name" value="<?php echo $data['restaurant_name']; ?>">
            </div>
          </div>     			 
          <div class="form-group">
            <label for="restaurant_phone" class="control-label col-md-3 no-pad-r">Contact Number</label>
            <div class="col-md-3 no-pad-r" style="padding-right:5px;">
              <input name="restaurant_phone" type="text" class="form-control" id="restaurant_phone" placeholder="Handphone" value="<?php echo $data['restaurant_phone']; ?>">
            </div>       
			<div class="col-md-3 no-pad-l">
				<input name="restaurant_fax" type="text" class="form-control" id="restaurant_fax" placeholder="Fax" value="<?php echo $data['restaurant_fax']; ?>">
			</div> 				
          </div>                    
          <div class="form-group">
			  <label for="restaurant_website" class="control-label col-md-3 no-pad-r">Website</label>
			  <div class="col-md-5">
				<input name="restaurant_website" type="text" class="form-control" id="restaurant_website" placeholder="Website" value="<?php echo $data['restaurant_website']; ?>">
			  </div>
		  </div>             
          <div class="form-group">
            <label for="restaurant_email" class="control-label col-md-3 no-pad-r">Email</label>
            <div class="col-md-5">
              <input name="restaurant_email" type="email" class="form-control" id="restaurant_email" placeholder="Email" value="<?php echo $data['restaurant_email']; ?>">
            </div>            
          </div>          
          <div class="form-group">
            <label for="restaurant_address" class="control-label col-md-3 no-pad-r">Address</label>
            <div class="col-md-6" style="padding-right: 5px;">
              <input name="restaurant_address" type="text" class="form-control" id="restaurant_address" placeholder="Address" value="<?php echo $data['restaurant_address']; ?>">
            </div>            
            <div class="col-md-2 no-pad-l">
              <input name="restaurant_postal" type="text" class="form-control" id="restaurant_postal" placeholder="Postal" value="<?php echo $data['restaurant_postal']; ?>">
            </div>  
          </div>
          <div class="form-group">
            <label for="hotel_country" class="control-label col-md-3 no-pad-r">&nbsp;</label>
            <div class="col-md-4 no-pad-r" style="padding-right:5px;">
              <!--<input name="restaurant_country" type="text" class="form-control" id="restaurant_country" placeholder="Country">-->
              <input name="restaurant_country" type="hidden" class="form-control" id="restaurant_country" placeholder="Country" value="Korea">
              <?php echo $cb_location; ?>
            </div>
          </div>   
			<div class="form-group">
			  <label for="restaurant_currency" class="control-label col-md-3 no-pad-r">Currency</label>
			  <div class="col-md-2">
				<input name="restaurant_currency" type="text" class="form-control" id="restaurant_currency" placeholder="Currency" value="<?php echo $data['restaurant_currency']; ?>">				
			  </div>            
			</div>
		  <div class="form-group">
			  <label for="restaurant_memo" class="control-label col-md-3 no-pad-r">Memo</label>
			  <div class="col-md-8">
				<textarea name="restaurant_memo" class="form-control" id="restaurant_memo" placeholder="Memo"><?php echo $data['restaurant_memo']; ?></textarea>      				
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