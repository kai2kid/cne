      <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="panel-title">Update Menu</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" action="drestaurant_updating" method="post">
          <input type="hidden" name="restaurant_code" value="<?php echo $data["restaurant_code"]; ?>">
          <div class="form-group">
            <label for="menu_code" class="control-label col-md-3 no-pad-r">Code</label>
            <div class="col-md-5">
              <input name="menu_code" type="text" class="form-control" id="menu_code" value="<?php echo $data['menu_code']; ?>" readonly>
            </div>
          </div>		  
          <div class="form-group">
            <label for="menu_name" class="control-label col-md-3 no-pad-r">Name</label>
            <div class="col-md-5">
              <input name="menu_name" type="text" class="form-control" id="menu_name" placeholder="Name" value="<?php echo $data['menu_name']; ?>">
            </div>
          </div>     			  			
      <div class="form-group">
        <label for="menu_price_lunch" class="control-label col-md-3 no-pad-r">Lunch</label>
        <div class="col-md-3">
        <input name="menu_price_lunch" type="number" class="form-control" id="menu_price_lunch" placeholder="Lunch" value="<?php echo $data['menu_price_lunch']; ?>">        
        </div>            
      </div>        
      <div class="form-group">
        <label for="menu_price_dinner" class="control-label col-md-3 no-pad-r">Dinner</label>
        <div class="col-md-3">
        <input name="menu_price_dinner" type="number" class="form-control" id="menu_price_dinner" placeholder="Dinner" value="<?php echo $data['menu_price_dinner']; ?>">        
        </div>            
      </div>        
      <div class="form-group">
        <label for="menu_price_weekend" class="control-label col-md-3 no-pad-r">Weekend</label>
        <div class="col-md-3">
        <input name="menu_price_weekend" type="number" class="form-control" id="menu_price_weekend" placeholder="Weekend" value="<?php echo $data['menu_price_weekend']; ?>">        
        </div>            
      </div>        
		  <div class="form-group">
			  <label for="menu_memo" class="control-label col-md-3 no-pad-r">Memo</label>
			  <div class="col-md-8">
				<textarea name="menu_memo" class="form-control" id="menu_memo" placeholder="Memo"><?php echo $data['menu_memo']; ?></textarea>      				
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