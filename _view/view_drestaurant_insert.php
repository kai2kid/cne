<div class="panel-heading">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 class="panel-title">Add Menu</h3>
</div>
<div class="panel-body">
  <form class="form-horizontal" action="drestaurant_inserting" method="post">  	
  <input type="hidden" name="restaurant_code" value="<?php echo $model->dataParent["restaurant_code"]; ?>">
	<div class="form-group">
      <label for="menu_name" class="control-label col-md-3 no-pad-r">Name</label>
      <div class="col-md-5">
        <input name="menu_name" type="text" class="form-control" id="menu_name" placeholder="Name">
      </div>
    </div>    		    	            
	<div class="form-group">
      <label for="menu_price" class="control-label col-md-3 no-pad-r">Price</label>
      <div class="col-md-3">
        <input name="menu_price" type="number" class="form-control" id="menu_price" placeholder="Price">        
      </div>            
    </div>	
	<div class="form-group">
      <label for="menu_memo" class="control-label col-md-3 no-pad-r">Memo</label>
      <div class="col-md-8">
        <textarea name="menu_memo" class="form-control" id="menu_memo" placeholder="Memo"></textarea>      
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
