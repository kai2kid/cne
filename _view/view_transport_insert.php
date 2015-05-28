<div class="panel-heading">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 class="panel-title">Add Transport</h3>
</div>
<div class="panel-body">
  <form class="form-horizontal" action="transport_inserting" method="post">
    <div class="form-group">
      <label for="transport_name" class="control-label col-md-3 no-pad-r">Name</label>
      <div class="col-md-5">
        <input name="transport_name" type="text" class="form-control" id="transport_name" placeholder="Name">
      </div>
    </div>    		
    <div class="form-group">
      <label for="transport_phone" class="control-label col-md-3 no-pad-r">Contact Number</label>
      <div class="col-md-3 no-pad-r" style="padding-right:5px;">
        <input name="transport_phone" type="text" class="form-control" id="transport_phone" placeholder="Handphone">
      </div>     
	  <div class="col-md-3 no-pad-l">
        <input name="transport_fax" type="text" class="form-control" id="transport_fax" placeholder="Fax">
      </div> 	  
    </div>       
	 <div class="form-group">
      <label for="transport_website" class="control-label col-md-3 no-pad-r">Website</label>
      <div class="col-md-5">
        <input name="transport_website" type="text" class="form-control" id="transport_website" placeholder="Website">
      </div>
    </div>           
    <div class="form-group">
      <label for="transport_email" class="control-label col-md-3 no-pad-r">Email</label>
      <div class="col-md-5">
        <input name="transport_email" type="email" class="form-control" id="transport_email" placeholder="Email">
      </div>            
    </div>   
    <div class="form-group">
      <label for="transport_address" class="control-label col-md-3 no-pad-r">Address</label>
      <div class="col-md-6" style="padding-right: 5px;">
        <input name="transport_address" type="text" class="form-control" id="transport_address" placeholder="Address">
      </div>            
      <div class="col-md-2 no-pad-l">
        <input name="transport_postal" type="text" class="form-control" id="transport_postal" placeholder="Postal">
      </div>  
    </div>
    <div class="form-group">
      <label for="transport_country" class="control-label col-md-3 no-pad-r">&nbsp;</label>
      <div class="col-md-4 no-pad-r" style="padding-right:5px;">
        <input name="transport_country" type="text" class="form-control" id="transport_country" placeholder="Country">
      </div>  
      <div class="col-md-4 no-pad-l">
        <input name="transport_city" type="text" class="form-control" id="transport_city" placeholder="City">
      </div> 	  
    </div>   	
	<div class="form-group">
      <label for="transport_currency" class="control-label col-md-3 no-pad-r">Currency</label>
      <div class="col-md-2">
        <input name="transport_currency" type="text" class="form-control" id="transport_currency" placeholder="Currency">
      </div>            
    </div>
	<div class="form-group">
      <label for="transport_memo" class="control-label col-md-3 no-pad-r">Memo</label>
      <div class="col-md-8">
        <textarea name="transport_memo" class="form-control" id="transport_memo" placeholder="Memo"></textarea>      
      </div>            
    </div>
  <div class="form-group">
    <label class="control-label col-md-3 no-pad-r">Contact Person</label>
  </div>        
  <div class="form-group">
    <label for="pic_name" class="control-label col-md-3 no-pad-r">Name</label>
    <div class="col-md-5">
      <input name="pic_name" type="text" class="form-control" id="pic_name" placeholder="Name">
    </div>            
  </div>
  <div class="form-group">
    <label for="pic_position" class="control-label col-md-3 no-pad-r">Position</label>
    <div class="col-md-3">
      <input name="pic_position" type="text" class="form-control" id="pic_position" placeholder="Position">
    </div>            
  </div>
  <div class="form-group">
    <label for="pic_phone" class="control-label col-md-3 no-pad-r">Phone</label>
    <div class="col-md-3">
      <input name="pic_phone" type="text" class="form-control" id="pic_phone" placeholder="Phone">
    </div>            
  </div>
  <div class="form-group">
    <label for="pic_email" class="control-label col-md-3 no-pad-r">Email</label>
    <div class="col-md-4">
      <input name="pic_email" type="email" class="form-control" id="pic_email" placeholder="Email">
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
