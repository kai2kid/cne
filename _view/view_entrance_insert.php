<div class="panel-heading">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 class="panel-title">Add entrance</h3>
</div>
<div class="panel-body">
  <form class="form-horizontal" action="entrance_inserting" method="post">
    <div class="form-group">
      <label for="entrance_name" class="control-label col-md-3 no-pad-r">Name</label>
      <div class="col-md-5">
        <input name="entrance_name" type="text" class="form-control" id="entrance_name" placeholder="Name">
      </div>
    </div>    		
    <div class="form-group">
      <label for="entrance_phone" class="control-label col-md-3 no-pad-r">Contact Number</label>
      <div class="col-md-3 no-pad-r" style="padding-right:5px;">
        <input name="entrance_phone" type="text" class="form-control" id="entrance_phone" placeholder="Handphone">
      </div>     
	  <div class="col-md-3 no-pad-l">
        <input name="entrance_fax" type="text" class="form-control" id="entrance_fax" placeholder="Fax">
      </div> 	  
    </div>       
	 <div class="form-group">
      <label for="entrance_website" class="control-label col-md-3 no-pad-r">Website</label>
      <div class="col-md-5">
        <input name="entrance_website" type="text" class="form-control" id="entrance_website" placeholder="Website">
      </div>
    </div>           
    <div class="form-group">
      <label for="entrance_email" class="control-label col-md-3 no-pad-r">Email</label>
      <div class="col-md-5">
        <input name="entrance_email" type="email" class="form-control" id="entrance_email" placeholder="Email">
      </div>            
    </div>   
    <div class="form-group">
      <label for="entrance_address" class="control-label col-md-3 no-pad-r">Address</label>
      <div class="col-md-6" style="padding-right: 5px;">
        <input name="entrance_address" type="text" class="form-control" id="entrance_address" placeholder="Address">
      </div>            
      <div class="col-md-2 no-pad-l">
        <input name="entrance_postal" type="text" class="form-control" id="entrance_postal" placeholder="Postal">
      </div>  
    </div>
    <div class="form-group">
      <label for="entrance_country" class="control-label col-md-3 no-pad-r">&nbsp;</label>
      <div class="col-md-4 no-pad-r" style="padding-right:5px;">
        <input name="entrance_country" type="text" class="form-control" id="entrance_country" placeholder="Country">
      </div>  
      <div class="col-md-4 no-pad-l">
        <input name="entrance_city" type="text" class="form-control" id="entrance_city" placeholder="City">
      </div> 	  
    </div>   
	<div class="form-group">
      <label for="entrance_location" class="control-label col-md-3 no-pad-r">Location</label>
      <div class="col-md-3">
        <input name="entrance_location" type="text" class="form-control" id="entrance_location" placeholder="Location">        
      </div>            
    </div>
	<div class="form-group">
      <label for="entrance_hour_open" class="control-label col-md-3 no-pad-r">Opening Time</label>
      <div class="col-md-1 no-pad-r" style="padding-right: 5px;">
        <input name="entrance_hour_open" type="time" class="form-control" id="entrance_hour_open" placeholder="Opening Time">        
      </div>  
		<div class="col-md-1 no-pad-l">
        <input name="entrance_hour_close" type="time" class="form-control" id="entrance_hour_close" placeholder="Closing Time">        
      </div> 	  
    </div>
	<div class="form-group">
      <label for="entrance_currency" class="control-label col-md-3 no-pad-r">Currency</label>
      <div class="col-md-2">
        <input name="entrance_currency" type="text" class="form-control" id="entrance_currency" placeholder="Currency">
      </div>            
    </div>
	<div class="form-group">
      <label for="entrance_memo" class="control-label col-md-3 no-pad-r">Memo</label>
      <div class="col-md-8">
        <textarea name="entrance_memo" class="form-control" id="entrance_memo" placeholder="Memo"></textarea>      
      </div>            
    </div>
	<div class="form-group">
      <label for="entrance_description" class="control-label col-md-3 no-pad-r">Description</label>
      <div class="col-md-8">
        <textarea name="entrance_description" class="form-control" id="entrance_description" placeholder="Description"></textarea>      
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
