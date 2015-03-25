<div class="panel-heading">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 class="panel-title">Add Hotel</h3>
</div>
<div class="panel-body">
  <form class="form-horizontal" action="hotel_inserting" method="post">
    <div class="form-group">
      <label for="hotel_name" class="control-label col-md-3 no-pad-r">Name</label>
      <div class="col-md-5">
        <input name="hotel_name" type="text" class="form-control" id="hotel_name" placeholder="Name">
      </div>
    </div>    	
	<div class="form-group">
      <label for="hotel_level" class="control-label col-md-3 no-pad-r">Level</label>
      <div class="col-md-3">		
        <select name="hotel_level" id="hotel_level" class="form-control selectpicker">
			<option value="1" data-content="<img src='<?php echo _PATH_IMAGE; ?>star1.gif'>"></option>
			<option value="2" data-content="<img src='<?php echo _PATH_IMAGE; ?>star2.gif'>"></option>
			<option value="3" data-content="<img src='<?php echo _PATH_IMAGE; ?>star3.gif'>"></option>
			<option value="4" data-content="<img src='<?php echo _PATH_IMAGE; ?>star4.gif'>"></option>
			<option value="5" data-content="<img src='<?php echo _PATH_IMAGE; ?>star5.gif'>"></option>
		</select> 	  
      </div>	  
    </div>    	
    <div class="form-group">
      <label for="hotel_phone" class="control-label col-md-3 no-pad-r">Contact Number</label>
      <div class="col-md-3 no-pad-r" style="padding-right:5px;">
        <input name="hotel_phone" type="text" class="form-control" id="hotel_phone" placeholder="Handphone">
      </div>     
	  <div class="col-md-3 no-pad-l">
        <input name="hotel_fax" type="text" class="form-control" id="hotel_fax" placeholder="Fax">
      </div> 	  
    </div>       
	 <div class="form-group">
      <label for="hotel_website" class="control-label col-md-3 no-pad-r">Website</label>
      <div class="col-md-5">
        <input name="hotel_website" type="text" class="form-control" id="hotel_website" placeholder="Website">
      </div>
    </div>           
    <div class="form-group">
      <label for="hotel_email" class="control-label col-md-3 no-pad-r">Email</label>
      <div class="col-md-5">
        <input name="hotel_email" type="email" class="form-control" id="hotel_email" placeholder="Email">
      </div>            
    </div>   
    <div class="form-group">
      <label for="hotel_address" class="control-label col-md-3 no-pad-r">Address</label>
      <div class="col-md-6" style="padding-right: 5px;">
        <input name="hotel_address" type="text" class="form-control" id="hotel_address" placeholder="Address">
      </div>            
      <div class="col-md-2 no-pad-l">
        <input name="hotel_postal" type="text" class="form-control" id="hotel_postal" placeholder="Postal">
      </div>  
    </div>
    <div class="form-group">
      <label for="hotel_country" class="control-label col-md-3 no-pad-r">&nbsp;</label>
      <div class="col-md-4 no-pad-r" style="padding-right:5px;">
        <input name="hotel_country" type="text" class="form-control" id="hotel_country" placeholder="Country">
      </div>  
      <div class="col-md-4 no-pad-l">
        <input name="hotel_city" type="text" class="form-control" id="hotel_city" placeholder="City">
      </div> 	  
    </div>   
	<div class="form-group">
      <label for="hotel_rooms" class="control-label col-md-3 no-pad-r">Number of Room</label>
      <div class="col-md-3">
        <input name="hotel_rooms" type="number" class="form-control" id="hotel_rooms" placeholder="Number of Room">        
      </div>            
    </div>
	<div class="form-group">
      <label for="hotel_currency" class="control-label col-md-3 no-pad-r">Currency</label>
      <div class="col-md-2">
        <input name="hotel_currency" type="text" class="form-control" id="hotel_currency" placeholder="Currency">
      </div>            
    </div>
	<div class="form-group">
      <label for="hotel_memo" class="control-label col-md-3 no-pad-r">Memo</label>
      <div class="col-md-8">
        <textarea name="hotel_memo" class="form-control" id="hotel_memo" placeholder="Memo"></textarea>      
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
