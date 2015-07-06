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
    <label for="room_extrabed" class="control-label col-md-3 no-pad-r">Extrabed</label>
    <div class="col-md-3">
      <input name="room_extrabed" type="number" class="form-control" id="room_extrabed" value='0' placeholder="Price">        
    </div>            
  </div>
  <div class="form-group">
    <label for="room_price" class="control-label col-md-3 no-pad-r">Fit (less than 5 rooms)</label>
  </div>  
  <div class="form-group">
    <label for="room_fit_breakfast" class="control-label col-md-3 no-pad-r">Breakfast</label>
    <div class="col-md-3">
      <input name="room_fit_breakfast" type="number" class="form-control" id="room_fit_breakfast" value='0' placeholder="Price">        
    </div>            
  </div>  
  <div class="form-group">
    <label for="room_fit_weekday_low" class="control-label col-md-3 no-pad-r">Low Season Weekday</label>
    <div class="col-md-3">
      <input name="room_fit_weekday_low" type="number" class="form-control" id="room_fit_weekday_low" value='0' placeholder="Price"> 
    </div>            
  </div>  
  <div class="form-group">
    <label for="room_fit_weekend_low" class="control-label col-md-3 no-pad-r">Low Season Weekend</label>
    <div class="col-md-3">
      <input name="room_fit_weekend_low" type="number" class="form-control" id="room_fit_weekend_low" value='0' placeholder="Price"> 
    </div>            
  </div>  
  <div class="form-group">
    <label for="room_fit_weekday_high" class="control-label col-md-3 no-pad-r">High Season Weekday</label>
    <div class="col-md-3">
      <input name="room_fit_weekday_high" type="number" class="form-control" id="room_fit_weekday_high" value='0' placeholder="Price">        
    </div>            
  </div>  
  <div class="form-group">
    <label for="room_fit_weekend_high" class="control-label col-md-3 no-pad-r">High Season Weekend</label>
    <div class="col-md-3">
      <input name="room_fit_weekend_high" type="number" class="form-control" id="room_fit_weekend_high" value='0' placeholder="Price">        
    </div>            
  </div>  
  <div class="form-group">
    <label for="room_fit_peak" class="control-label col-md-3 no-pad-r">Peak Season</label>
    <div class="col-md-3">
      <input name="room_fit_peak" type="number" class="form-control" id="room_fit_peak" value='0' placeholder="Price">        
    </div>            
  </div>
  <div class="form-group">
    <label for="room_price" class="control-label col-md-3 no-pad-r">Group (More than 5 rooms)</label>
  </div>  
  <div class="form-group">
    <label for="room_group_breakfast" class="control-label col-md-3 no-pad-r">Breakfast</label>
    <div class="col-md-3">
      <input name="room_group_breakfast" type="number" class="form-control" id="room_group_breakfast" value='0' placeholder="Price">        
    </div>            
  </div>  
  <div class="form-group">
    <label for="room_group_weekday_low" class="control-label col-md-3 no-pad-r">Low Season Weekday</label>
    <div class="col-md-3">
      <input name="room_group_weekday_low" type="number" class="form-control" id="room_group_weekday_low" value='0' placeholder="Price"> 
    </div>            
  </div>  
  <div class="form-group">
    <label for="room_group_weekend_low" class="control-label col-md-3 no-pad-r">Low Season Weekend</label>
    <div class="col-md-3">
      <input name="room_group_weekend_low" type="number" class="form-control" id="room_group_weekend_low" value='0' placeholder="Price"> 
    </div>            
  </div>  
  <div class="form-group">
    <label for="room_group_weekday_high" class="control-label col-md-3 no-pad-r">High Season Weekday</label>
    <div class="col-md-3">
      <input name="room_group_weekday_high" type="number" class="form-control" id="room_group_weekday_high" value='0' placeholder="Price">        
    </div>            
  </div>  
  <div class="form-group">
    <label for="room_group_weekend_high" class="control-label col-md-3 no-pad-r">High Season Weekend</label>
    <div class="col-md-3">
      <input name="room_group_weekend_high" type="number" class="form-control" id="room_group_weekend_high" value='0' placeholder="Price">        
    </div>            
  </div>  
	<div class="form-group">
    <label for="room_group_peak" class="control-label col-md-3 no-pad-r">Peak Season</label>
    <div class="col-md-3">
      <input name="room_group_peak" type="number" class="form-control" id="room_group_peak" value='0' placeholder="Price">        
    </div>            
  </div>
  <div class="form-group">
    <label for="room_promo" class="control-label col-md-3 no-pad-r" style="color: red;">Promo</label>
    <div class="col-md-3">
      <input name="room_promo" type="number" class="form-control" id="room_promo" value='0' placeholder="Promo">        
    </div>            
  </div>
	<div class="form-group">
    <label for="room_description" class="control-label col-md-3 no-pad-r">Memo</label>
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
