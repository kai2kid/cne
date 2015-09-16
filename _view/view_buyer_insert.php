<div class="bs-callout bs-callout-info">
  <div class="collapse navbar-collapse" style="padding-left:0px;">    	
	  <div class="row">
		  <div class="col-md-6">
			  <label class="title">Add Buyer</label>
			  <form class="form-horizontal" action="buyer_inserting" method="post">
				  <div class="form-group">
				    <label for="buyer_name" class="control-label col-md-2 no-pad-r">Name</label>
				    <div class="col-md-6">
					  <input name="buyer_name" type="text" class="form-control" id="buyer_name" placeholder="Name">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="buyer_name_korean" class="control-label col-md-2 no-pad-r">Korean Name</label>
				    <div class="col-md-6">
					  <input name="buyer_name_korean" type="text" class="form-control" id="buyer_name_korean" placeholder="&#51060;&#47492;">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="buyer_type" class="control-label col-md-2 no-pad-r">Type</label>
				    <div class="col-md-4">
					  <select name="buyer_type" class="form-control min-padding" id="buyer_type">
					    <option value="1" selected="selected">Company</option>
					    <option value="2">Personal</option>
					  </select>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="buyer_address" class="control-label col-md-2 no-pad-r">Address</label>
				    <div class="col-md-7" style="padding-right: 5px;">
					  <input name="buyer_address" type="text" class="form-control" id="buyer_address" placeholder="Address">
				    </div>            
				    <div class="col-md-3 no-pad-l">
					  <input name="buyer_postal" type="text" class="form-control" id="buyer_postal" placeholder="Postal">
				    </div>  
				  </div>
				  <div class="form-group">
				    <label for="buyer_country" class="control-label col-md-2 no-pad-r">&nbsp;</label>
				    <div class="col-md-4 no-pad-r" style="padding-right:5px;">
					  <input name="buyer_country" type="text" class="form-control" id="buyer_country" placeholder="Country">
				    </div>   
				    <div class="col-md-4 no-pad-l">
					  <input name="buyer_city" type="text" class="form-control" id="buyer_city" placeholder="City">
				    </div>	  
				  </div> 
				  <div class="form-group">
				    <label for="buyer_country" class="control-label col-md-2 no-pad-r">Phone / Fax.</label>
				    <div class="col-md-4 no-pad-r" style="padding-right:5px;">
					  <input name="buyer_phone" type="text" class="form-control" id="buyer_country" placeholder="Phone">
				    </div>   
				    <label class="control-label col-md-1 no-pad-l no-pad-r" style="width: 10px; text-align: left;">/</label>
				    <div class="col-md-4 no-pad-l">					
					  <input name="buyer_fax" type="text" class="form-control" id="buyer_city" placeholder="Fax">
				    </div>	  
				  </div> 
				  <div class="form-group">
				    <label for="buyer_website" class="control-label col-md-2 no-pad-r">Website</label>
				    <div class="col-md-5">
					  <input name="buyer_website" type="text" class="form-control" id="buyer_website" placeholder="Website">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="buyer_email" class="control-label col-md-2 no-pad-r">Email</label>
				    <div class="col-md-5">
					  <input name="buyer_email" type="email" class="form-control" id="buyer_email" placeholder="Email">
				    </div>
				  </div>		
				  <div class="form-group">
				    <label for="buyer_memo" class="control-label col-md-2 no-pad-r">Memo</label>
				    <div class="col-md-10">
					  <textarea class="form-control" name="buyer_memo" id="buyer_memo" placeholder="Memo" rows="6" style="resize:none;"></textarea>                
				    </div>            
				  </div>	     
				  <div class="form-group">
				    <label class="control-label col-md-10">&nbsp;</label>
				    <div class="col-md-2">
					  <input type="submit" class="btn btn-primary btn-block" value="Save">
				    </div>            
				  </div>	
			  </form>
		  </div>
		  
		  <!-----PIC---------------------->
		  
		  <div class="col-md-6">	
		  </div>
	  </div>		
  </div>
</div>
