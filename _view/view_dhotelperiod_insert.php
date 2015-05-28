<div class="panel-heading">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 class="panel-title">Add Season Period</h3>
</div>
<div class="panel-body">
  <form class="form-horizontal" action="dhotelperiod_inserting" method="post">  
    <input type="hidden" name="hotel_code" value="<?php echo $model->dataParent["hotel_code"]; ?>">
    <div class="form-group">
      <label for="period_type" class="control-label col-md-3 no-pad-r">Type</label>
      <div class="col-md-6">
        <select name="period_type" class="form-control min-padding" id="period_type">
          <option value="1">Low Season</option>
          <option value="2">High Season</option>
          <option value="3">Peak Season</option>
        </select>
        
      </div>
    </div>                   
    <div class="form-group">
      <label for="period_start" class="control-label col-md-3 no-pad-r">Start</label>
      <div class="col-md-6" style="display:inline-block;">
        <select name="period_startd" class="form-control selectWidth" id="period_startd" style="width: auto; display:inline-block;">
          <?php for ($d=1; $d <= 31 ; $d++) { ?>
          <option value="<?php echo str_pad($d,2,"0",STR_PAD_LEFT); ?>"><?php echo str_pad($d,2,"0",STR_PAD_LEFT); ?></option>
          <?php } ?>                
        </select>
        <select name="period_startm" class="form-control min-padding" id="period_startm" style="width: auto; display:inline-block;">
          <?php for ($m=1; $m <= 12 ; $m++) { ?>
          <option value="<?php echo str_pad($m,2,"0",STR_PAD_LEFT); ?>"><?php echo monthToText($m); ?></option>                
          <?php } ?>                
        </select>
      </div>            
    </div>  
	  <div class="form-group">
      <label for="period_end" class="control-label col-md-3 no-pad-r">End</label>
      <div class="col-md-6">
        <select name="period_endd" class="form-control selectWidth" id="period_endd" style="width: auto; display:inline-block;">
          <?php for ($d=1; $d <= 31 ; $d++) { ?>
          <option value="<?php echo str_pad($d,2,"0",STR_PAD_LEFT); ?>"><?php echo str_pad($d,2,"0",STR_PAD_LEFT); ?></option>
          <?php } ?>                
        </select>
        <select name="period_endm" class="form-control min-padding" id="period_endm" style="width: auto; display:inline-block;">
          <?php for ($m=1; $m <= 12 ; $m++) { ?>
          <option value="<?php echo str_pad($m,2,"0",STR_PAD_LEFT); ?>"><?php echo monthToText($m); ?></option>                
          <?php } ?>                
        </select>
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
