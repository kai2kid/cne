<div class="panel-heading">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 class="panel-title">Delete Season Period</h3>
</div>
<div class="panel-body">
  <form class="form-horizontal" action="dhotelperiod_deleting" method="post">
    <input type="hidden" name="hotel_code" value="<?php echo $data["hotel_code"]; ?>" >
    <input type="hidden" name="period_id" value="<?php echo $data["period_id"]; ?>">
    <div class="form-group">
      <label for="period_type" class="control-label col-md-6 no-pad-r">Do you really want to delete </label>
    </div>          
    
    <div class="form-group">
      <label for="period_type" class="control-label col-md-3 no-pad-r">Type</label>
      <div class="col-md-5">
        <?php 
          switch ($data['period_type']) {
            case "1" : { $ret = "Low Season"; break; }
            case "2" : { $ret = "High Season"; break; }
            case "3" : { $ret = "Peak Season"; break; }
          }
          echo $ret;
        ?>
      </div>
    </div>                   
    <div class="form-group">
      <label for="period_start" class="control-label col-md-3 no-pad-r">Start</label>
      <div class="col-md-3">
        <?php echo formatYearly($data['period_start']); ?>
      </div>            
    </div>  
    <div class="form-group">
      <label for="period_end" class="control-label col-md-3 no-pad-r">End</label>
      <div class="col-md-3">
        <?php echo formatYearly($data['period_end']); ?>
      </div>            
    </div>  
    <div class="form-group">
      <label class="control-label col-md-9">&nbsp;</label>
      <div class="col-md-2">
        <input type="submit" class="btn btn-success btn-block" value="Delete">
      </div>            
    </div>
    
  </form>
</div>