<div class="panel-heading">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 class="panel-title">Add Room</h3>
</div>
<div class="panel-body">
  <form class="form-horizontal" action="dhotel_inserting" method="post">  
  <input type="hidden" name="hotel_code" value="<?php echo $model->dataParent["hotel_code"]; ?>">
	<div class="form-group">
    <label for="room_name" class="control-label col-md-3 no-pad-r">Name</label>
    <div class="col-md-5">
      <input name="room_name" type="text" class="form-control" id="room_name" placeholder="Name">
    </div>
  </div>    		    
	 <div class="form-group">
      <label for="room_type" class="control-label col-md-3 no-pad-r">Type</label>
      <div class="col-md-5">
        <select name="room_type" class="form-control min-padding" id="room_type">
          <option value="B">Budget</option>
          <option value="D">Deluxe</option>
          <option value="SD">Super Deluxe</option>
          <option value="BB">Breakfast Budget</option>
          <option value="BD">Breakfast Deluxe</option>
          <option value="BSD">Breakfast Super Deluxe</option>
        </select>
        
      </div>
    </div>                   
	<div class="form-group">
      <label for="room_price" class="control-label col-md-3 no-pad-r">Price</label>
      <div class="col-md-3">
        <input name="room_price" type="number" class="form-control" id="room_price" value='0' placeholder="Price">        
      </div>            
    </div>	
	<div class="form-group">
      <label for="room_description" class="control-label col-md-3 no-pad-r">Description</label>
      <div class="col-md-8">
        <textarea name="room_description" class="form-control" id="room_description" placeholder="Description"></textarea>      
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
