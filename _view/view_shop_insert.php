<div class="panel-heading">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 class="panel-title">Add Shop</h3>
</div>
<div class="panel-body">
  <form class="form-horizontal" action="shop_inserting" method="post">
    <div class="form-group">
      <label for="shop_name" class="control-label col-md-3 no-pad-r">Name</label>
      <div class="col-md-5">
        <input name="shop_name" type="text" class="form-control" id="shop_name" placeholder="Name">
      </div>
    </div>    	
    <div class="form-group">
      <label for="shop_name_korean" class="control-label col-md-3 no-pad-r">Korean Name</label>
      <div class="col-md-5">
        <input name="shop_name_korean" type="text" class="form-control" id="shop_name_korean" placeholder="&#51060;&#47492;">
      </div>
    </div>                  
    <div class="form-group">
      <label for="shop_phone" class="control-label col-md-3 no-pad-r">Contact Number</label>
      <div class="col-md-3">
        <input name="shop_phone" type="text" class="form-control" id="shop_phone" placeholder="Handphone">
      </div>            
    </div>   
    <div class="form-group">
      <label for="shop_fax" class="control-label col-md-3">&nbsp;</label>
      <div class="col-md-3">
        <input name="shop_fax" type="text" class="form-control" id="shop_fax" placeholder="Fax">
      </div>            
    </div>
	 <div class="form-group">
      <label for="shop_website" class="control-label col-md-3 no-pad-r">Website</label>
      <div class="col-md-5">
        <input name="shop_website" type="text" class="form-control" id="shop_website" placeholder="Website">
      </div>
    </div>           
    <div class="form-group">
      <label for="shop_email" class="control-label col-md-3 no-pad-r">Email</label>
      <div class="col-md-5">
        <input name="shop_email" type="email" class="form-control" id="shop_email" placeholder="Email">
      </div>            
    </div>   
    <div class="form-group">
      <label for="shop_address" class="control-label col-md-3 no-pad-r">Address</label>
      <div class="col-md-6" style="padding-right: 5px;">
        <input name="shop_address" type="text" class="form-control" id="shop_address" placeholder="Address">
      </div>            
      <div class="col-md-2 no-pad-l">
        <input name="shop_postal" type="text" class="form-control" id="shop_postal" placeholder="Postal">
      </div>  
    </div>
    <div class="form-group">
      <label for="hotel_country" class="control-label col-md-3 no-pad-r">&nbsp;</label>
      <div class="col-md-4 no-pad-r" style="padding-right:5px;">
        <input name="shop_country" type="hidden" class="form-control" id="shop_country" placeholder="Country" value="Korea">
        <?php echo $cb_location; ?>
      </div>
    </div>   
	<div class="form-group">
      <label for="shop_items" class="control-label col-md-3 no-pad-r">Item</label>
      <div class="col-md-8">
        <input name="shop_items" type="text" class="form-control" id="shop_items" placeholder="Item Name">        
      </div>            
    </div>
	<div class="form-group">
      <label for="shop_currency" class="control-label col-md-3 no-pad-r">Currency</label>
      <div class="col-md-2">
        <input name="shop_currency" type="text" class="form-control" id="shop_currency" placeholder="Currency">        
      </div>            
    </div>
	<div class="form-group">
      <label for="shop_memo" class="control-label col-md-3 no-pad-r">Memo</label>
      <div class="col-md-8">
        <textarea class="form-control" name="shop_memo" id="shop_memo" placeholder="Memo"></textarea> 
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
